<?php
use mikehaertl\pdftk\Pdf;





    if($_SERVER["REQUEST_METHOD"] === "POST") {


		if($_POST["action"] == "generate_soa"){
			$agency = query("select * from guarantors where tbl_id = ?", $_POST["id"]);
			$agency = $agency[0];
			$contracts = query("select * from transaction where agency = ?
								and (soa_id = '' or soa_id is null)", $_POST["id"]);
			// dump($contracts);
			if(empty($contracts)){
				$res_arr = [
					"result" => "failed",
					"title" => "Failed",
					"message" => "No Pending Contracts",
					// "link" => "burial_contract?action=list",
					];
					echo json_encode($res_arr); exit();
			}

			else{

			$soa_id = create_uuid("SOA");
			if (query("insert INTO soa 
			(
				soa_id,agency_id,agency,remarks,date_created
			) 
			VALUES(?,?,?,?,?)", 
			$soa_id,$_POST["id"],$agency["guarantor"],"UNPAID",date("Y-m-d H:i:s")) === false)
			{
				$res_arr = [
					"result" => "failed",
					"title" => "Error on creating SOA",
					"message" => "Error on creating SOA",
					// "link" => "burial_contract?action=list",
					];
					echo json_encode($res_arr); exit();
			}

			query("update transaction set soa_id = ? where agency = ? and (soa_id is null or soa_id = '')",
					$soa_id, $_POST["id"]);

					$res_arr = [
						"result" => "success",
						"title" => "Success",
						"message" => "SOA has been successfully created",
						"link" => "soa?action=list&id=".$_POST["id"],
						];
						echo json_encode($res_arr); exit();


			}
		}

		if($_POST["action"] == "update_transaction"){
			
			if($_POST["action_code"] == "settle"):
				query("update transaction set account_status = 'SETTLED' where transaction_id = ?", $_POST["transaction_id"]);
			else:
				query("update transaction set account_status = 'UNSETTLED' where transaction_id = ?", $_POST["transaction_id"]);
			endif;
			// $soa = query
			$soa = query("select s.*, 
						sum(case when account_status = 'UNSETTLED' then amount else 0 end) as balance,
						sum(amount) as total_amount
						from soa s
						left join transaction t
						on s.soa_id = t.soa_id
						where s.soa_id = ?
						group by s.soa_id",$_POST["soa_id"]);
			$balance = $soa[0]["balance"];
			if($balance == 0):
				query("update soa set remarks = 'PAID' where soa_id = ?", $_POST["soa_id"]);
			else:
				query("update soa set remarks = 'UNPAID' where soa_id = ?", $_POST["soa_id"]);
			endif;
			// dump($soa);





			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "SOA has been successfully updated",
				"link" => "soa?action=details&id=".$_POST["soa_id"],
				];
				echo json_encode($res_arr); exit();
		}

		if($_POST["action"] == "soa_pdf"){

			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8', 'format' => 'FOLIO-L',
				'margin_top' => 15,
				'margin_left' => 5,
				'margin_right' => 5,
				'margin_bottom' => 5,
				'margin_footer' => 1,
				'default_font' => 'helvetica'
			]);

			$mpdf->showImageErrors = true;
			// $logo = $_SERVER['DOCUMENT_ROOT'] . "/AdminLTE/dist/img/header_soa.png";


			$guarantor = query("select * from soa s
                    left join guarantors g
                    on g.tbl_id = s.soa_id
                    where soa_id = ?", $_POST["soa_id"]);
					
			$agency = $guarantor[0]["agency"];
			$contracts = query("select * from transaction t
								left join burial_service_contract c
								on t.contract_id = c.contract_id
								where soa_id = ?", $_POST["soa_id"]);
			// dump($contracts);

								$html = <<< EOD

								<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
								<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
								<style>
								.table, th, td, thead, tbody{
									border: 2px solid black !important;
									padding: 8px !important;
								}
							

							
								</style>
								
							
								<div style="text-align:center;">
									<div class="text-center"><img src="AdminLTE/dist/img/header_soa.png"></div>
								</div>
								<h3 class="text-center">STATEMENT OF ACCOUNT</h3>
								<h4 class="text-center">$agency</h4>
								<div class="box-body">
								<table  style="width: 100%; ">
								<tr style="background-color:#FFCCD5;">
									<th>Date</th>
									<th>Deceased</th>
									<th>Address</th>
									<th>Particulars</th>
									<th>Amount</th>
								</tr>
								<tbody>

								EOD;
								$total = 0; 
								foreach($contracts as $contract): $total = $total + $contract["amount"];
								$amount = to_peso($contract["amount"]);
								$contract_date = $contract["contract_date"];
								$html .= <<< EOD
								<tr>
								<td>$contract_date</td>
								<td>$contract_date</td>
								<td>$contract_date</td>
								<td>$contract_date</td>
								<td>$amount</td>
								</tr>
								EOD;
								endforeach;
								$total = to_peso($total);
								$html .= <<< EOD
								<tr>
									<td colspan="4" class="text-right"><b>TOTAL</b></td>
									<td>$total</td>
								</tr>

								EOD;

								$html .= <<< EOD
								</tbody>
								</table>
								</div>
								EOD;

								$html .= <<< EOD
								<div style="position:absolute; bottom:0; margin-bottom:10px; width: 100%">
								<div class="row">
								<div class="col-xs-3">
									<h4><b>Prepared By:</b></h4>
									<br>
									<br>
									<br>
									<h4 class="text-center"><b>ANGELIQUE E. LAO</b></h4>
									<h4 class="text-center">MANAGER</h4>
								</div>
								</div>
								</div>
								EOD;

// dump($html);

$mpdf->WriteHTML($html);


								$mpdf->Output("resources/SOA.pdf", \Mpdf\Output\Destination::FILE);



			// $base_url = the_base_url();
			// $webpath = $base_url . "/sta_teresa/soa?action=generate_soa&soa_id=".$_POST["soa_id"];
			// dump($webpath);
			// dump($webpath);
			$filename = "SOA";
			// dump($filename);
			$path = "reports/".$filename.".pdf";
			// $exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O Landscape  "'.$webpath.'" '.$path.'';
			// // dump($exec);
			// exec($exec);
			$load[] = array('path'=>"resources/SOA.pdf", 'filename' => "SOA.pdf", 'result' => 'success');
			$json = array('info' => $load);
			echo json_encode($json);
		}

		
    }
	else {

	
		if($_GET["action"] == "list"){
			$guarantor = query("select * from guarantors where tbl_id = ?", $_GET["id"]);
			$agency = $guarantor[0]["guarantor"];
			$soa = query("select s.*, 
						sum(case when account_status = 'UNSETTLED' then amount else 0 end) as balance,
						sum(amount) as total_amount
						from soa s
						left join transaction t
						on s.soa_id = t.soa_id
						where s.agency_id = ?
						group by s.soa_id
						order by remarks DESC, date_created DESC
						",$_GET["id"]);
			// dump($soa);
			if(isset($soa[0])){
				if($soa[0]["soa_id"] == "")
				$soa = [];
			}
			
			render("public/soa_system/soa_list.php", [
				"title" => "Statement of Account",
				"soa" => $soa,
				"agency" => $agency,
			]);
		}


		if($_GET["action"] == "details"){
			$soa = query("select s.*, 
						sum(case when account_status = 'UNSETTLED' then amount else 0 end) as balance,
						sum(amount) as total_amount
						from soa s
						left join transaction t
						on t.soa_id = s.soa_id
						where s.soa_id = ?",$_GET["id"]);
			// dump($soa);
			if(isset($soa)){
				if($soa[0]["soa_id"] == "")
				$soa = [];
			}

			$transaction = query("select * from transaction t 
								left join burial_service_contract b
								on b.contract_id = t.contract_id
								where t.soa_id = ?", $_GET["id"]);

			// dump($soa);
			
			render("public/soa_system/soa_details.php", [
				"title" => "Statement of Account",
				"soa" => $soa,
				"transaction" => $transaction,
				// "agency" => $agency,
			]);
		}


		if($_GET["action"] == "generate_soa"){
			// $guarantor = query("select * from guarantors where tbl_id = ?", $_GET["id"]);
			// $agency = $guarantor[0]["guarantor"];

			// $contracts = query("select * from transaction t
			// 					left join burial_service_contract c
			// 					on t.contract_id = c.contract_id
			// 					where agency = ?", $agency);

			renderview("public/soa_system/generate_soa.php", [
				"title" => "Statement of Account",
				// "contracts" => $contracts,
				// "agency" => $agency,
			]);
		}
	}
?>
