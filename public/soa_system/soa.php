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
			// dump($_POST);
			if($_POST["action_code"] == "settle"):
				query("update transaction set account_status = 'SETTLED' where transaction_id = ?", $_POST["transaction_id"]);
			else:
				query("update transaction set account_status = 'UNSETTLED' where transaction_id = ?", $_POST["transaction_id"]);
			endif;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "SOA has been successfully updated",
				"link" => "soa?action=details&id=".$_POST["soa_id"],
				];
				echo json_encode($res_arr); exit();
		}

		if($_POST["action"] == "soa_pdf"){
			$sql = query("select * from site_options");
			// dump($sql);
            $url = $sql[0]["url"];
			$webpath = $url . "/soa?action=generate_soa&soa_id=".$_POST["soa_id"];
			// dump($webpath);
			// dump($webpath);
			$filename = "SOA";
			// dump($filename);
			$path = "reports/".$filename.".pdf";
			$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O Landscape  "'.$webpath.'" '.$path.'';
			// dump($exec);
			exec($exec);
			$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
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
						group by s.soa_id",$_GET["id"]);
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
