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

			elseif($_POST["action"] == "pdf_sales"):
			// dump($_POST);
				$sql = query("select * from site_options");
			// dump($sql);
				$url = $sql[0]["url"];
				$options = urlencode(serialize($_POST));
				$webpath = $url . "/reports_page?action=pdf_sales&options=".$options;
				// dump($webpath);
				// dump($webpath);
				$filename = "SALES_REPORT";
				// dump($filename);
				$path = "reports/".$filename.".pdf";
				$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
				// dump($exec);
				exec($exec);
				$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
				$json = array('info' => $load);
				echo json_encode($json);


			elseif($_POST["action"] == "pdf_casket"):
					// dump($_POST);
						$sql = query("select * from site_options");
					// dump($sql);
						$url = $sql[0]["url"];
						$options = urlencode(serialize($_POST));
						$webpath = $url . "/reports_page?action=pdf_casket&options=".$options;
						// dump($webpath);
						// dump($webpath);
						$filename = "CASKET_REPORT";
						// dump($filename);
						$path = "reports/".$filename.".pdf";
						$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
						// dump($exec);
						exec($exec);
						$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
						$json = array('info' => $load);
						echo json_encode($json);

			elseif($_POST["action"] == "pdf_deceased"):
						// dump($_POST);
						$sql = query("select * from site_options");
					// dump($sql);
						$url = $sql[0]["url"];
						$options = urlencode(serialize($_POST));
						$webpath = $url . "/reports_page?action=pdf_deceased&options=".$options;
						// dump($webpath);
						// dump($webpath);
						$filename = "DECEASED_REPORT";
						// dump($filename);
						$path = "reports/".$filename.".pdf";
						$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
						// dump($exec);
						exec($exec);
						$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
						$json = array('info' => $load);
						echo json_encode($json);

			elseif($_POST["action"] == "pdf_collectibles"):
						$sql = query("select * from site_options");
						$url = $sql[0]["url"];
						$options = urlencode(serialize($_POST));
						$webpath = $url . "/reports_page?action=pdf_collectibles&options=".$options;
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
