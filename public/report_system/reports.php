<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		
		if($_POST["action"] == "sales-datatable"):
			// dump($_POST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];

			$where = " ";


            if(isset($_REQUEST["from"])):
                if($_REQUEST["from"] != "")
                    $where = $where . " and transaction_date >= '" . $_REQUEST["from"] . "'";
            endif;

            if(isset($_REQUEST["to"])):
                if($_REQUEST["to"] != "")
                    $where = $where . " and transaction_date <= '" . $_REQUEST["to"] . "'";
            endif;



			$guarantors = query("select * from guarantors");



            $Guarantors = [];
            foreach($guarantors as $row):
                $Guarantors[$row["tbl_id"]] = $row;
            endforeach;
            // $data = query("select * from tblemployee_dtras");

            if($where != ""):
                $query_string = "select * from transaction
                             where 1=1 ".$where."
                             order by transaction_date DESC
                                limit ".$limit." offset ".$offset." ";
                // dump($query_string);
                $data = query($query_string);
                $all_data = query("select * from transaction
                where 1=1 ".$where."
                order by transaction_date DESC");
                // $all_data = $data;
            else:
                $query_string = "select * from transaction
                             where 1=1
                             order by transaction_date DESC
                                limit ".$limit." offset ".$offset." ";
                                // dump($query_string);
                $data = query($query_string);
                $all_data = query("select * from transaction");
                // $all_data = $data;
            endif;
            $i=0;
            foreach($data as $row):
				if($row["payment_type"] != "CASH")
					$data[$i]["payment_type"] = $Guarantors[$row["agency"]]["guarantor"];
					

				$data[$i]["transaction_date"] = readable_date($row["transaction_date"]);
				$data[$i]["amount"] = to_amount($row["amount"]);
				// dump();	
                $i++;
            endforeach;
            $json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);


			elseif($_POST["action"] == "casket-datatable"):
				// dump($_POST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
				


				$where = " ";
				if(isset($_REQUEST["from"])):
					if($_REQUEST["from"] != "")
						$where = $where . " and contract_date >= '" . $_REQUEST["from"] . "'";
				endif;
	
				if(isset($_REQUEST["to"])):
					if($_REQUEST["to"] != "")
						$where = $where . " and contract_date <= '" . $_REQUEST["to"] . "'";
				endif;
	
	
	
	
	
	
				if($where != ""):
					$query_string = "select contract_date, casket_type, count(*) as quantity from burial_service_contract
								 where 1=1 ".$where." GROUP BY contract_date, casket_type
								 order by contract_date DESC
									limit ".$limit." offset ".$offset." ";
					// dump($query_string);
					$data = query($query_string);
					$all_data = query("select contract_date, casket_type, count(*) as quantity from burial_service_contract
					where 1=1 ".$where." GROUP BY contract_date, casket_type
					order by contract_date DESC");
					// $all_data = $data;
				else:
					$query_string = "select contract_date, casket_type, count(*) as quantity from burial_service_contract
								 where 1=1 GROUP BY contract_date, casket_type
								 order by contract_date DESC
									limit ".$limit." offset ".$offset." ";
									// dump($query_string);
					$data = query($query_string);
					$all_data = query("select * from burial_service_contract GROUP BY contract_date, casket_type");
					// $all_data = $data;
				endif;
				// $i=0;
				// foreach($data as $row):
				
				// 	$data[$i]["transaction_date"] = readable_date($row["transaction_date"]);
				// 	$data[$i]["amount"] = to_amount($row["amount"]);
				// 	// dump();	
				// 	$i++;
				// endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);


				elseif($_POST["action"] == "deceased-datatable"):
					// dump($_POST);
					$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
					$offset = $_POST["start"];
					$limit = $_POST["length"];
					$search = $_POST["search"]["value"];
					
	
	
					$where = " ";
					if(isset($_REQUEST["from"])):
						if($_REQUEST["from"] != "")
							$where = $where . " and contract_date >= '" . $_REQUEST["from"] . "'";
					endif;
		
					if(isset($_REQUEST["to"])):
						if($_REQUEST["to"] != "")
							$where = $where . " and contract_date <= '" . $_REQUEST["to"] . "'";
					endif;
		
		
		
		
		
		
					if($where != ""):
						$query_string = "select * from burial_service_contract
									 where 1=1 ".$where." 
									 order by contract_date DESC
										limit ".$limit." offset ".$offset." ";
						// dump($query_string);
						$data = query($query_string);
						$all_data = query("select * from burial_service_contract
						where 1=1 ".$where." 
						order by contract_date DESC");
						// $all_data = $data;
					else:
						$query_string = "select * from burial_service_contract
									 where 1=1 
									 order by contract_date DESC
										limit ".$limit." offset ".$offset." ";
										// dump($query_string);
						$data = query($query_string);
						$all_data = query("select * from burial_service_contract");
						// $all_data = $data;
					endif;
					// $i=0;
					// foreach($data as $row):
					
					// 	$data[$i]["transaction_date"] = readable_date($row["transaction_date"]);
					// 	$data[$i]["amount"] = to_amount($row["amount"]);
					// 	// dump();	
					// 	$i++;
					// endforeach;
					$json_data = array(
						"draw" => $draw + 1,
						"iTotalRecords" => count($all_data),
						"iTotalDisplayRecords" => count($all_data),
						"aaData" => $data
					);
					echo json_encode($json_data);


			elseif($_POST["action"] == "collectible-datatable"):
				// dump($_POST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];


				$Transaction = [];
				$transaction = query("select contract_id, sum(amount) as amount from transaction group by contract_id");
				foreach($transaction as $row):
					$Transaction[$row["contract_id"]] = $row;
				endforeach;
				// dump($Transaction);


				$where = " ";
				if(isset($_REQUEST["from"])):
					if($_REQUEST["from"] != "")
						$where = $where . " and contract_date >= '" . $_REQUEST["from"] . "'";
				endif;
	
				if(isset($_REQUEST["to"])):
					if($_REQUEST["to"] != "")
						$where = $where . " and contract_date <= '" . $_REQUEST["to"] . "'";
				endif;
	
	
				if($where != ""):
					$query_string = "select * from burial_service_contract
									where 1=1 ".$where." and remarks = 'UNPAID'
									order by contract_date DESC
									limit ".$limit." offset ".$offset." ";
					// dump($query_string);
					$data = query($query_string);
					$all_data = query("select * from burial_service_contract
					where 1=1 ".$where." and remarks = 'UNPAID'
					order by contract_date DESC");
					// $all_data = $data;
				else:
					$query_string = "select * from burial_service_contract
									where 1=1 and remarks = 'UNPAID'
									order by contract_date DESC
									limit ".$limit." offset ".$offset." ";
									// dump($query_string);
					$data = query($query_string);
					$all_data = query("select * from burial_service_contract");
					// $all_data = $data;
				endif;
				$i=0;
				foreach($data as $row):
					$data[$i]["contract_date"] = readable_date($row["contract_date"]);
					$payment_total = 0;
					if(isset($Transaction[$row["contract_id"]]))
						$payment_total = $Transaction[$row["contract_id"]]["amount"];
					$data[$i]["balance"] = to_peso($row["total_amount"] - $payment_total);
					$data[$i]["debtor"] = $row["client_lastname"] . ", " . $row["client_firstname"];
					$data[$i]["address"] = $row["address_home"] . ", " . $row["address_barangay"] . ", " . $row["address_city"];
					$data[$i]["deceased"] = $row["deceased_lastname"] . ", " . $row["deceased_firstname"];
					// dump();	
					$i++;
				endforeach;
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);

			
				elseif($_POST["action"] == "pdf_deceased"):

					$where = "";
					if(!empty($_POST["from_date"])):
						$where = $where . " and contract_date >= '" . $_POST["from_date"] . "'";
					endif;

					if(!empty($_POST["to_date"])):
						$where = $where . " and contract_date <= '" . $_POST["to_date"] . "'";
					endif;
					$month = "";
					$day = "";
					$total = 0;
					$casket = query("SELECT * FROM burial_service_contract where 1=1 ".$where." order by contract_date desc");

					$mpdf = new \Mpdf\Mpdf([
						'mode' => 'utf-8', 'format' => 'FOLIO-P',
						'margin_top' => 15,
						'margin_left' => 5,
						'margin_right' => 5,
						'margin_bottom' => 5,
						'margin_footer' => 1,
						'default_font' => 'helvetica'
					]);

					$html = "";
					$html .='
					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<style>
					.table, th, td, thead, tbody{
						border: 2px solid black !important;
						padding: 8px !important;
					}
					</style>
					<div class="text-center" ><img src="resources/stateresa_header.jpg" class="img-responsive"></div>
					<hr>
					<div class="row">
					<div class="col-xs-4 co-sm-4">
						<h4 style="font-weight: 900;" style="float:left;">DECEASED REPORT</h4>
					</div>
					';

					if(!empty($_POST["from_date"])):
						$html.="<div class='col-xs-4 col-sm-4'><h4 style='font-weight:700;'>From: ".readable_date($_POST["from_date"])."</h4></div>";
					endif;
					if(!empty($_POST["to_date"])):
						$html.="<div class='col-xs-4 col-sm-4'><h4 style='font-weight:700;'>To: ".readable_date($_POST["to_date"])."</h4></div>";
					endif;

					$html.='</div>';
					$html .='
					<div class="box-body">
					<table style="width: 100%;">
					<tr style="background-color:#FFCCD5;">
						<th colspan="2">Date</th>
						<th colspan="3">Deceased</th>
						<th rowspan="2">BSC No.</th>
						</tr>
						<tr style="background-color:#FFCCD5;">
						<th>Month</th>
						<th>Day</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						</tr>
						<tbody style="border-color: #000 !important;">
					';

					foreach($casket as $row): 
						$html.='<tr>';
					
						 if($month != full_month($row["contract_date"])):
							$month = full_month($row["contract_date"]);
							$html.="<td>".$month."</td>";
						  else:
							$html.="<td></td>"; 
						  endif;
						  if($day != date_day($row["contract_date"])):
							$day = date_day($row["contract_date"]);
							$html.="<td>".$day."</td>";
						  else:
							$html.="<td></td>"; 
						  endif;
					
						$html.='<td>'.strtoupper($row["deceased_lastname"]).'</td>';
						$html.='<td>'.strtoupper($row["deceased_firstname"]).'</td>';
						$html.='<td>'.strtoupper($row["deceased_middlename"]).'</td>';
						$html.='<td>'.strtoupper($row["contract_id"]).'</td>';
						$html.='</tr>';
					 endforeach;

					 $html.='
					 </tbody>
					 </table>
					 </div>
					 
					 <div style="position: absolute; bottom: 0; left: 0; right: 0; text-align: center; border-top:2px solid black;padding-top:20px;">
					 <div class="row">
						 <div class="col-xs-12">
							 <p><i>"Family Satisfaction is our Prime Objective"</i></p>
						 </div>
					 </div>
				 </div>
					 
				 
				 
					 ';



	
					// $base_url = the_base_url();
					// 		$options = urlencode(serialize($_POST));
					// 		$webpath = $base_url . "/sta_teresa/reports_page?action=pdf_deceased&options=".$options;
					// 		// dump($webpath);
					// 		$filename = "DECEASED_REPORT";
					// 		// dump($filename);
					// 		$path = "reports/".$filename.".pdf";
					// 		$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
					// 		// dump($exec);
					// 		exec($exec);
					// 		$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
					// 		$json = array('info' => $load);
					// 		echo json_encode($json);
	
							$filename = "DECEASED_REPORT";
							// dump($filename);
							$path = "reports/".$filename.".pdf";
							$mpdf->WriteHTML($html);
				$mpdf->Output($path, \Mpdf\Output\Destination::FILE);
							// dump($exec);
							$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
							$json = array('info' => $load);
							echo json_encode($json);



			elseif($_POST["action"] == "pdf_sales"):

				// $base_url = the_base_url();
	
				// $options = urlencode(serialize($_POST));
				// $webpath = $base_url . "/sta_teresa/reports_page?action=pdf_sales&options=".$options;
				// // dump($webpath);
				// // dump($webpath);
				// $filename = "SALES_REPORT";
				// // dump($filename);
				// $path = "reports/".$filename.".pdf";
				// $exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
				// // dump($exec);
				// exec($exec);
				// $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
				// $json = array('info' => $load);
				// echo json_encode($json);


				$mpdf = new \Mpdf\Mpdf([
					'mode' => 'utf-8', 'format' => 'FOLIO-P',
					'margin_top' => 15,
					'margin_left' => 5,
					'margin_right' => 5,
					'margin_bottom' => 5,
					'margin_footer' => 1,
					'default_font' => 'helvetica'
				]);

				$Guarantors=[];
				$guarantors = query("select * from guarantors");
				foreach($guarantors as $row):
				$Guarantors[$row["tbl_id"]] = $row;
				endforeach;

				$where = "";
				if(!empty($_POST["from_date"])):
					$where = $where . " and transaction_date >= '" . $_POST["from_date"] . "'";
				endif;
				if(!empty($_POST["to_date"])):
						$where = $where . " and transaction_date <= '" . $_POST["to_date"] . "'";
				endif;


				$transaction_guarantors = query("select agency from transaction where 1=1 " . $where . " and agency is not null and agency != '' group by agency");
				$transaction = query("SELECT transaction_date, payment_type, agency, SUM(amount) as amount FROM TRANSACTION WHERE 1=1 ".$where."
				GROUP BY transaction_date, payment_type, agency ORDER BY transaction_date DESC");
				// dump($transaction);

				$Transactions = [];
				foreach($transaction as $row):
				$Transactions[$row["transaction_date"]]["transaction_date"] = $row["transaction_date"];
				if($row["payment_type"] == "CASH")
					$Transactions[$row["transaction_date"]][$row["payment_type"]] = $row;
				else
				$Transactions[$row["transaction_date"]][$row["agency"]] = $row;
				
				endforeach;


				$count = count($transaction_guarantors);
				// dump($count);
				$Total = [];
				foreach($transaction_guarantors as $row):
				$Total[$row["agency"]]["total"] = 0;
				endforeach;
				$Total["CASH"] = 0;
				$month = "";
				$day = "";


				$html = "";
				$html .= '
				<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
				<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
				<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
				<style>
					.table, th, td, thead, tbody{
						border: 2px solid black !important;
						padding: 8px !important;
					}
					</style>
					<div class="text-center"><img src="resources/stateresa_header.jpg" class="img-responsive"></div>
					<hr>

					<div class="row">
					<div class="col-xs-3 co-sm-3">
						<h4 style="font-weight: 900;" style="float:left;">SALES REPORT</h4>
					</div>
				';

				if(!empty($_POST["from_date"])):
					$html .= "<div class='col-xs-3 col-sm-3'><h4 style='font-weight:700;'>From: ".readable_date($_POST["from_date"])."</h4></div>";
				endif;
				if(!empty($_POST["to_date"])):
					$html .="<div class='col-xs-3 col-sm-3'><h4 style='font-weight:700;'>To: ".readable_date($_POST["to_date"])."</h4></div>";
				endif;
				$html .= '</div>';


				$html .= '
				<div class="box-body">
					<table style="width: 100%;">
					<tr style="background-color:#FFCCD5;">
						<th colspan="2">Date</th>
						<th rowspan="2">Cash</th>
						<th colspan="'.$count.'">Guarantee Letters</th>
						</tr>
						<tr style="background-color:#FFCCD5;">
							<th>Month</th>
                			<th>Day</th>';
				foreach($transaction_guarantors as $row):
					$html.='<th>'.$Guarantors[$row["agency"]]["guarantor"].'</th>';
				endforeach;
						$html .='
						
						</tr>
					</tr>
					<tbody>
				';

			foreach($Transactions as $row):
					$html.='<tr>';
  
					
					 if($month != full_month($row["transaction_date"])):
						$month = full_month($row["transaction_date"]);
						$html.='<td>'.$month.'</td>';
					  else:
						$html.='<td></td>';
					  endif;
  
  
					  if($day != date_day($row["transaction_date"])):
						$day = date_day($row["transaction_date"]);
						$html.='<td>'.$day.'</td>';
					  else:
						$html.='<td></td>';
					  endif;
				
  
  
					$html .= '<td style="text-align: right;">';
				
					if(isset($row["CASH"])): 
						$Total["CASH"] = $Total["CASH"] + $row["CASH"]["amount"]; 
							$html.=to_peso($row["CASH"]["amount"]); 
						else: 
							$html.=''; 
					endif;
					
					$html.='</td>';
					foreach($transaction_guarantors as $g):
					if(isset($row[$g["agency"]])):
						  $Total[$g["agency"]]["total"] = $Total[$g["agency"]]["total"] + $row[$g["agency"]]["amount"];
						
							$html.='<td style="text-align: right;">'.to_peso($row[$g["agency"]]["amount"]).'</td>';
					  else: 
						$html.='<td></td>';
					 endif;
					 endforeach;
					  $html.='</tr>';
				 endforeach;

				 $html.='
				 </tbody>
				 <tr style="background-color:#FFCCD5;">
				   <th colspan="2" class="text-right">TOTAL</th>
				   <th style="text-align: right;">'.to_peso($Total["CASH"]).'</th>
				 ';

				foreach($Total as $key => $value):
					if($key != "CASH"):
					  $html.='<th style="text-align: right;">'.to_peso($value["total"]).'</th>';
					endif;
				endforeach;

				$html.='
				</tr>
				</table>
				</div>
		
	
				<div style="position: absolute; bottom: 0; left: 0; right: 0; text-align: center; border-top:2px solid black;padding-top:20px;">
				  <div class="row">
					  <div class="col-xs-12">
						  <p><i>"Family Satisfaction is our Prime Objective"</i></p>
					  </div>
				  </div>
				</div>
				';



				// $base_url = the_base_url();
	
				// $options = urlencode(serialize($_POST));
				// $webpath = $base_url . "/sta_teresa/reports_page?action=pdf_sales&options=".$options;
				// dump($webpath);
				// dump($webpath);
				$filename = "THE_SALES_REPORT";
				// dump($filename);
				$path = "reports/".$filename.".pdf";

				
				$mpdf->WriteHTML($html);
				$mpdf->Output($path, \Mpdf\Output\Destination::FILE);
				// $filename = "CASKET_REPORT";
				// $path = "reports/".$filename.".pdf";
			
				// $exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
				// dump($exec);
				// exec($exec);
				$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
				$json = array('info' => $load);
				echo json_encode($json);



			elseif($_POST["action"] == "pdf_casket"):


				$where = "";
				if(!empty($_POST["from_date"])):
					$where = $where . " and contract_date >= '" . $_POST["from_date"] . "'";
				endif;
				if(!empty($_POST["to_date"])):
						$where = $where . " and contract_date <= '" . $_POST["to_date"] . "'";
				endif;
				$month = "";
				$day = "";
				$total = 0;
				$casket = query("SELECT contract_date, casket_type, COUNT(*) AS quantity FROM burial_service_contract where 1=1 ".$where." GROUP BY contract_date, casket_type order by contract_date desc");
				
				$mpdf = new \Mpdf\Mpdf([
					'mode' => 'utf-8', 'format' => 'FOLIO-P',
					'margin_top' => 15,
					'margin_left' => 5,
					'margin_right' => 5,
					'margin_bottom' => 5,
					'margin_footer' => 1,
					'default_font' => 'helvetica'
				]);
				
				$html = "";
				$html .= '
				<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
				<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
				<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
				<style>
					.table, th, td, thead, tbody{
						border: 2px solid black !important;
						padding: 8px !important;
					}
					</style>
					<div class="text-center"><img src="resources/stateresa_header.jpg" class="img-responsive"></div>
					<hr>

					<div class="row">
					<div class="col-xs-3 co-sm-3">
						<h4 style="font-weight: 900;" style="float:left;">CASKET SOLD REPORT</h4>
					</div>
				';

				if(!empty($_POST["from_date"])):
 
					$html .= "<div class='col-xs-3 col-sm-3'><h4 style='font-weight:700;'>From: ".readable_date($_POST["from_date"])."</h4></div>";
				endif;
				if(!empty($_POST["to_date"])):
					$html .="<div class='col-xs-3 col-sm-3'><h4 style='font-weight:700;'>To: ".readable_date($_POST["to_date"])."</h4></div>";
				endif;

				$html .= '</div>';

				$html .= '
				<div class="box-body">
					<table style="width: 100%;">
					<tr style="background-color:#FFCCD5;">
						<th>Month</th>
						<th>Day</th>
						<th>Casket</th>
						<th>Quantity</th>
					</tr>
					<tbody>
				';

				foreach($casket as $row): 
					$total = $total + $row["quantity"];
					
					$html .= ' <tr>';
					  if($month != full_month($row["contract_date"])):
						$month = full_month($row["contract_date"]);
						$html.='<td>'.$month.'</td>';
					  else:
						$html.='<td></td>';
					  endif;


					  if($day != date_day($row["contract_date"])):
						$day = date_day($row["contract_date"]);
						$html.='<td>'.$day.'</td>';
					  else:
						$html.='<td></td>'; 
					  endif;


					  $html .='<td>'.$row["casket_type"].'</td>';  
                  	  $html .='<td>'.$row["quantity"].'</td>';

					$html .= ' </tr>';
				endforeach;

				$html .='
				</tbody>
            </table>
			<br>
			<h4><b>Total Casket Sold:</b> '.$total.'</h4>
            </div>

            <div style="position: absolute; bottom: 0; left: 0; right: 0; text-align: center; border-top:2px solid black;padding-top:20px;">
              <div class="row">
                  <div class="col-xs-12">
                      <p><i>"Family Satisfaction is our Prime Objective"</i></p>
                  </div>
              </div>
            </div>
				';


				


				$mpdf->WriteHTML($html);
				
				$filename = "CASKET_REPORT";
				$path = "reports/".$filename.".pdf";
				$mpdf->Output($path, \Mpdf\Output\Destination::FILE);








				// $base_url = the_base_url();
				// 		$options = urlencode(serialize($_POST));
				// 		$webpath = $base_url . "/sta_teresa/reports_page?action=pdf_casket&options=".$options;
				// 		// dump($webpath);
				// 		// dump($webpath);
				// 		$filename = "CASKET_REPORT";
				// 		// dump($filename);
				// 		$path = "reports/".$filename.".pdf";
				// 		$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
				// 		// dump($exec);
				// 		exec($exec);
				// 		$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
				// 		$json = array('info' => $load);
				// 		echo json_encode($json);


			
			
						// dump($exec);
				
						$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
						$json = array('info' => $load);
						echo json_encode($json);

		

			elseif($_POST["action"] == "pdf_collectibles"):
						
						$base_url = the_base_url();
						$options = urlencode(serialize($_POST));
						$webpath = $base_url . "/sta_teresa/reports_page?action=pdf_collectibles&options=".$options;
						$filename = "COLLECTIBLE_REPORT";
						$path = "reports/".$filename.".pdf";
						$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O landscape  "'.$webpath.'" '.$path.'';
						exec($exec);
						$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
						$json = array('info' => $load);
						echo json_encode($json);
		endif;
		
    }
	else {

		if($_GET["action"] == "casket_report"):
			render("public/report_system/casket_report.php",[
				"title" => "Casket Report",
			]);
		elseif($_GET["action"] == "collectibles_report"):
			render("public/report_system/collectibles_report.php",[
				"title" => "Colllectibles Report",
			]);
		elseif($_GET["action"] == "deceased_report"):
			render("public/report_system/deceased_report.php",[
				"title" => "Deceased Report",
			]);
		elseif($_GET["action"] == "sales_report"):


			render("public/report_system/sales_report.php",[
				"title" => "Sales Report",
			]);

		elseif($_GET["action"] == "pdf_sales"):
				renderview("public/report_system/pdf_sales.php",[
					"title" => "Sales Report",
				]);

		elseif($_GET["action"] == "pdf_casket"):
				renderview("public/report_system/pdf_casket.php",[
					"title" => "Sales Report",
				]);
		elseif($_GET["action"] == "pdf_deceased"):
			renderview("public/report_system/pdf_deceased.php",[
				"title" => "Sales Report",
			]);

		elseif($_GET["action"] == "pdf_collectibles"):
			renderview("public/report_system/pdf_collectibles.php",[
				"title" => "Sales Report",
			]);


		endif;


		

		
	}
?>
