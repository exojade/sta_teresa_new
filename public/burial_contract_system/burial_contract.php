<?php
use mikehaertl\pdftk\Pdf;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		
		if($_POST["action"] == "new_contract"){
			$from_date = date("Y-m-1");
			$to_date = date("Y-m-t");
			$count = query("select count(*) as count from burial_service_contract where 
			contract_date between ? and ?", $from_date, $to_date);
			$count = $count[0]["count"] + 2;
			$contract_id = date("Ym"). sprintf("%04d", $count);
			if (query("insert INTO burial_service_contract 
			(
				contract_id,client_firstname,client_middlename,client_lastname,client_suffix,
				address_home, address_barangay, address_city, zipcode,
				branch, embalming_cost, embalming_days, casket_type, casket_cost,
				arrangement_type, arrangement_cost, coach_type, coach_cost,
				extra, extra_cost, burial_date, total_amount,
				deceased_firstname, deceased_lastname, deceased_middlename, deceased_suffix,
				death_date, contract_date, remarks, deceased_gender, client_relationship,
				deceased_city, deceased_address, deceased_barangay, deceased_zipcode,
				death_address
			) 
			VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
					?,?,?,?,?)", 
			$contract_id,$_POST["client_firstname"],$_POST["client_middlename"],$_POST["client_lastname"],$_POST["client_suffix"],
			$_POST["address"],$_POST["barangay"],$_POST["city"],$_POST["zipcode"],
			$_POST["branch"],$_POST["embalming_cost"],$_POST["embalming_days"],$_POST["casket_type"],$_POST["casket_cost"],
			$_POST["arrangement"],$_POST["arrangment_cost"],$_POST["coach_type"],$_POST["coach_cost"],
			$_POST["extras"],$_POST["extras_cost"], $_POST["burial_date"], $_POST["total"],
			$_POST["deceased_firstname"],$_POST["deceased_lastname"],$_POST["deceased_middlename"],$_POST["deceased_suffix"],
			$_POST["death_date"],date("Y-m-d"), "UNPAID", $_POST["gender"], $_POST["client_relationship"],
			$_POST["deceased_city"], $_POST["deceased_address"], $_POST["deceased_barangay"], $_POST["deceased_zipcode"],
			$_POST["death_address"]
			
			
			) === false)
			{
				apologize("Sorry, that username has already been taken!");
			}

	
			$res_arr = [
                "result" => "success",
                "title" => "Success",
                "message" => "Success on Adding a Burial Contract",
                "link" => "burial_contract?action=list",
                ];
                echo json_encode($res_arr); exit();
		}

		if($_POST["action"] == "add_transaction"){


			// dump($_POST);

			//check balance
			$contract = query("select total_amount from burial_service_contract where contract_id = ?", $_POST["contract_id"]);
			$payment = query("select sum(amount) as payment from transaction where contract_id = ?", $_POST["contract_id"]);
			$balance = $contract[0]["total_amount"] - $payment[0]["payment"];
			
			if($balance < $_POST["amount"]){
				$res_arr = [
					"result" => "failed",
					"title" => "Failed",
					"message" => "Payment is greater than balance!",
					// "link" => "burial_contract?action=details&id=" . $_POST["contract_id"],
					];
					echo json_encode($res_arr); exit();
			}

			if(($balance - $_POST["amount"]) == 0){
				query("update burial_service_contract set remarks = 'PAID' where contract_id = ?",
						$_POST["contract_id"]);
			}

			$account_status = "";
			if($_POST["payment_type"] == "GUARANTEE"){
				$account_status = "UNSETTLED";
			}

			if(!isset($_POST["agency"]))
				$_POST["agency"] = "";

			if (query("insert INTO transaction 
			(
				contract_id,amount,payment_type,agency,transaction_type,transaction_date,account_status
			) 
			VALUES(?,?,?,?,?,?,?)", 
			$_POST["contract_id"],$_POST["amount"],$_POST["payment_type"],
			$_POST["agency"],"PAYMENT", date("Y-m-d"), $account_status
			) === false)
			{
				apologize("Sorry, that username has already been taken!");
			}

			$res_arr = [
                "result" => "success",
                "title" => "Success",
                "message" => "Success on Adding a Burial Contract",
                "link" => "burial_contract?action=details&id=" . $_POST["contract_id"],
                ];
                echo json_encode($res_arr); exit();
		}


		if($_POST["action"] == "update_obituary"){
			// dump($_POST);
			if($_FILES["obituary_image"]["size"] != 0):
				$target = "resources/obituary/".$_FILES["obituary_image"]["name"];
				if(!move_uploaded_file($_FILES['obituary_image']['tmp_name'], $target)){
					echo("Do not have upload files");
					exit();
				}
				query("update burial_service_contract set obituary_message = ?, 
						valid_date = ?, obituary_image = ? where contract_id = ?",
						$_POST["obituary_message"], $_POST["valid_date"], $target, $_POST["contract_id"]);
			else:
				query("update burial_service_contract set obituary_message = ?, valid_date = ? where contract_id = ?",
						$_POST["obituary_message"], $_POST["valid_date"], $_POST["contract_id"]);
				
			endif;
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Updating the Obituary",
				"link" => "burial_contract?action=details&id=" . $_POST["contract_id"],
				];
				echo json_encode($res_arr); exit();







		}

		if($_POST["action"] == "update_contract"){


			// dump($_POST);
			query("update burial_service_contract set 
						client_firstname = '".$_POST["client_firstname"]."',
						client_middlename = '".$_POST["client_middlename"]."',
						client_lastname = '".$_POST["client_lastname"]."',
						client_suffix = '".$_POST["client_suffix"]."',
						address_home = '".$_POST["address_home"]."',
						address_barangay = '".$_POST["address_barangay"]."',
						address_city = '".$_POST["address_city"]."',
						zipcode = '".$_POST["zipcode"]."',
						branch = '".$_POST["branch"]."',
						embalming_cost = '".$_POST["embalming_cost"]."',
						embalming_days = '".$_POST["embalming_days"]."',
						casket_type = '".$_POST["casket_type"]."',
						casket_cost = '".$_POST["casket_cost"]."',
						arrangement_type = '".$_POST["arrangement_type"]."',
						arrangement_cost = '".$_POST["arrangement_cost"]."',
						coach_type = '".$_POST["coach_type"]."',
						extra = '".$_POST["extra"]."',
						extra_cost = '".$_POST["extra_cost"]."',
						burial_date = '".$_POST["burial_date"]."',
						total_amount = '".$_POST["total_amount"]."',
						deceased_firstname = '".$_POST["deceased_firstname"]."',
						deceased_lastname = '".$_POST["deceased_lastname"]."',
						deceased_middlename = '".$_POST["deceased_middlename"]."',
						deceased_suffix = '".$_POST["deceased_suffix"]."',
						death_date = '".$_POST["death_date"]."',
						deceased_gender = '".$_POST["deceased_gender"]."',
						client_relationship = '".$_POST["client_relationship"]."',
						deceased_city = '".$_POST["deceased_city"]."',
						deceased_address = '".$_POST["deceased_address"]."',
						deceased_barangay = '".$_POST["deceased_barangay"]."',
						deceased_zipcode = '".$_POST["deceased_zipcode"]."'
						where contract_id = '".$_POST["contract_id"]."'
					");


			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on updating Contract",
				"link" => "burial_contract?action=details&id=" . $_POST["contract_id"],
				];
				echo json_encode($res_arr); exit();
		}



		if($_POST["action"] == "embalmer_pdf"){
			// dump($_POST);
			$contract = query("select * from burial_service_contract where contract_id
								= ?", $_POST["contract_id"]);
			$contract = $contract[0];
			// 
			// dump($contract);

			$pdf = new Pdf('reports/embalmer_certificate.pdf');
			
            $result = $pdf->fillForm([
              "deceased"    => strtoupper($contract["deceased_firstname"] . " " . $contract["deceased_lastname"]),
			  "address"    => strtoupper($contract["deceased_address"] . " " . $contract["deceased_barangay"]. " " . $contract["deceased_city"]),
			  "death"    => ($contract["death_date"]),
			  "death_address"    => strtoupper($contract["death_address"]),
			  "client_name"    => strtoupper($_POST["issued_client_name"]),
			  "relationship"    => strtoupper($_POST["relationship"]),
			  "day"    => (date("d")),
			  "month"    => (date("F")),
			  "year"    => (date("Y")),
				])
            //   ->needAppearances()
              ->flatten()
              ->saveAs("reports/".$_POST["contract_id"]."_embalmer.pdf");
        
              $filename = $_POST["contract_id"]."_embalmer.pdf";
              $path = "reports/".$_POST["contract_id"]."_embalmer.pdf";
              $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
              $json = array('info' => $load);
              echo json_encode($json);



		}




		if($_POST["action"] == "promissory_note_pdf"){
			// dump($_POST);
			

			$total = query("select total_amount, concat(deceased_firstname, ' ', deceased_middlename, ' ', deceased_lastname) as deceased from burial_service_contract where contract_id = ?", $_POST["contract_id"]);
			$payments = query("select sum(amount) as sum from transaction where contract_id = ?", $_POST["contract_id"]);
			$balance = $total[0]["total_amount"] - $payments[0]["sum"];
			// 
			// dump($payments);

			$pdf = new Pdf('reports/promissory.pdf');
			
            $result = $pdf->fillForm([
              "amount"    => to_peso($balance),
			  "proxy"    => strtoupper($_POST["issued_client_name"]),
			  "address_1"    => strtoupper($_POST["address"]),
			  "amount_words"    => strtoupper(convert_number_to_words($balance)),
			  "date_valid"    => strtoupper($_POST["date_valid"]),
			  "deceased"    => strtoupper($total[0]["deceased"]),
				])
            //   ->needAppearances()
              ->flatten()
              ->saveAs("reports/".$_POST["contract_id"]."_promisorry.pdf");
        
              $filename = $_POST["contract_id"]."_promisorry.pdf";
              $path = "reports/".$_POST["contract_id"]."_promisorry.pdf";
              $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
              $json = array('info' => $load);
              echo json_encode($json);
		}



		if($_POST["action"] == "demand_pdf"){
			$total = query("select total_amount, concat(deceased_firstname, ' ', deceased_middlename, ' ', deceased_lastname) as deceased ,
							concat(client_firstname, ' ', client_middlename, ' ', client_lastname) as client,
							address_city, address_home, address_barangay, zipcode
							from burial_service_contract where contract_id = ?", $_POST["contract_id"]);
			$payments = query("select sum(amount) as sum from transaction where contract_id = ?", $_POST["contract_id"]);
			$balance = $total[0]["total_amount"] - $payments[0]["sum"];


			$date=strtotime(date('Y-m-d'));  // if today :2013-05-23

			$newDate = date('F d, Y',strtotime('+15 days',$date));
			// dump($newDate);

			$pdf = new Pdf('reports/demand_letter.pdf');
            $result = $pdf->fillForm([
              "client_name"    => strtoupper($total[0]["client"]),
			  "address_1"    => strtoupper($total[0]["address_home"] . " " . $total[0]["address_barangay"]),
			  "address_2"    => strtoupper($total[0]["address_city"] . " " . $total[0]["zipcode"]),
			  "date"    => date("F d, Y"),
			  "date_valid"    => $newDate,
			  "amount"    => to_peso($balance),
			  "deceased"    => strtoupper($total[0]["deceased"]),
				])
            //   ->needAppearances()
              ->flatten()
              ->saveAs("reports/".$_POST["contract_id"]."_demand.pdf");
        
              $filename = $_POST["contract_id"]."_demand.pdf";
              $path = "reports/".$_POST["contract_id"]."_demand.pdf";
              $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
              $json = array('info' => $load);
              echo json_encode($json);
		}

		if($_POST["action"] == "generate_overdue"){
			// dump($_POST);
			$count = query("select count(*) as count from overdue where contract_id = ?", $_POST["contract_id"]);
			$count = $count[0]["count"];
			$count++;
			$invoice_number = "INV".$_POST["contract_id"] . "-".$count;

			$burial_contract = query("select * from burial_service_contract where contract_id = ?",
								$_POST["contract_id"]);
			$burial_contract = $burial_contract[0];
			$transaction = query("select sum(amount) as total_amount from transaction where contract_id = ?",
			$_POST["contract_id"]);
			$balance = $burial_contract["total_amount"] - $transaction[0]["total_amount"];
			// dump($balance);
			$client_name = $burial_contract["client_firstname"] . " " . $burial_contract["client_lastname"];
			$date_created = date("Y-m-d");
			$deadline = date('Y-m-d', strtotime('+5 days'));
			
			if (query("insert INTO overdue 
			(
				invoice_number,contract_id,date_created,deadline,amount_paid,balance
			) 
			VALUES(?,?,?,?,?,?)", 
			$invoice_number,$_POST["contract_id"], $date_created, 
			$deadline,$transaction[0]["total_amount"],$balance
			) === false)
			{
				apologize("Sorry, that username has already been taken!");
			}

			$res_arr = [
                "result" => "success",
                "title" => "Success",
                "message" => "Success on Adding a Burial Contract",
                "link" => "burial_contract?action=details&id=".$_POST["contract_id"],
                ];
                echo json_encode($res_arr); exit();
		}


		if($_POST["action"] == "print_overdue"){
			// dump($_POST);

			$overdue = query("select * from overdue where invoice_number = ?", 
					$_POST["invoice_id"]);
			$overdue = $overdue[0];

			$burial_contract = query("select * from burial_service_contract
								where contract_id = ?", $overdue["contract_id"]);
			$burial_contract = $burial_contract[0];

			$pdf = new Pdf('reports/overdue.pdf');

			$result = $pdf->fillForm([
				"deceased_name"    => strtoupper($burial_contract["deceased_firstname"] . " " . $burial_contract["deceased_lastname"]),
				"invoice_number"    => $overdue["invoice_number"],
				"contract_number"    => $overdue["contract_id"],
				"invoice_date"    => $overdue["date_created"],
				"due_date"    => $overdue["deadline"],
				"balance"    => to_peso($overdue["balance"]),
				"amount_paid"    => to_peso($overdue["amount_paid"]),
				"total_fee"    => to_peso($burial_contract["total_amount"]),
				"client_name"    => strtoupper($burial_contract["client_firstname"] . " " . $burial_contract["client_lastname"]),
				])
			//   ->needAppearances()
				->flatten()
				->saveAs("reports/".$_POST["invoice_id"]."_overdue.pdf");
		
				$filename = $_POST["invoice_id"]."_overdue.pdf";
				$path = "reports/".$_POST["invoice_id"]."_overdue.pdf";
				$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
				$json = array('info' => $load);
				echo json_encode($json);


		}

		if($_POST["action"] == "embalmer_pdf"){
			// dump($_POST);
			$contract = query("select * from burial_service_contract where contract_id
								= ?", $_POST["contract_id"]);
			$contract = $contract[0];
			// 
			// dump($contract);

			$pdf = new Pdf('reports/embalmer_certificate.pdf');
			
            $result = $pdf->fillForm([
              "deceased"    => strtoupper($contract["deceased_firstname"] . " " . $contract["deceased_lastname"]),
			  "address"    => strtoupper($contract["deceased_address"] . " " . $contract["deceased_barangay"]. " " . $contract["deceased_city"]),
			  "death"    => ($contract["death_date"]),
			  "death_address"    => strtoupper($contract["death_address"]),
			  "client_name"    => strtoupper($_POST["issued_client_name"]),
			  "relationship"    => strtoupper($_POST["relationship"]),
			  "day"    => (date("d")),
			  "month"    => (date("F")),
			  "year"    => (date("Y")),
				])
            //   ->needAppearances()
              ->flatten()
              ->saveAs("reports/".$_POST["contract_id"]."_embalmer.pdf");
        
              $filename = $_POST["contract_id"]."_embalmer.pdf";
              $path = "reports/".$_POST["contract_id"]."_embalmer.pdf";
              $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
              $json = array('info' => $load);
              echo json_encode($json);



		}


		if($_POST["action"] == "sss_pdf"){
			
			

			$total = query("select total_amount, concat(deceased_firstname, ' ', deceased_middlename, ' ', deceased_lastname) as deceased from burial_service_contract where contract_id = ?", $_POST["contract_id"]);
			$transaction = query("select * from transaction t
									left join guarantors g
									on g.tbl_id = t.agency
									where contract_id = ?
									and payment_type != 'CASH'", $_POST["contract_id"]);
									// dump($transaction);

			$payments = [];
			for($i = 0; $i < 9; $i++):
				if(isset($transaction[$i])):
					$payments[$i+1]["entity"] = strtoupper($transaction[$i]["guarantor"]);
					$payments[$i+1]["amount"] = "(".to_peso($transaction[$i]["amount"]).")";
					$payments[$i+1]["encode"] = strtoupper($transaction[$i]["guarantor"]) . " - P" . "".to_peso($transaction[$i]["amount"])."";	
				else:
					$payments[$i+1]["entity"] = "";
					$payments[$i+1]["amount"] = "";
					$payments[$i+1]["encode"] = "";
				endif;
			endfor;

			$cash = query("select sum(amount) as amount from transaction where contract_id = ?
			and payment_type = 'CASH'", $_POST["contract_id"]);

			// 
			// dump($transaction);

			$pdf = new Pdf('reports/sss.pdf');
			
            $result = $pdf->fillForm([
              "non_cash_total"    => to_peso($total[0]["total_amount"]),
			  "client_name"    => strtoupper($_POST["issued_client_name"]),
			  "relationship"    => strtoupper($_POST["relationship"]),
			  "cash"    => strtoupper(convert_number_to_words($cash[0]["amount"])) . "(" . to_peso($cash[0]["amount"]) .  ")",
			//   "date_valid"    => strtoupper($_POST["date_valid"]),
			  "deceased"    => strtoupper($total[0]["deceased"]),
			  "non_cash_1"    => $payments[1]["encode"],
			  "non_cash_2"    => $payments[2]["encode"],
			  "non_cash_3"    => $payments[3]["encode"],
			  "non_cash_4"    => $payments[4]["encode"],
			  "non_cash_5"    => $payments[5]["encode"],
			  "non_cash_6"    => $payments[6]["encode"],
			  "non_cash_7"    => $payments[7]["encode"],
			  "non_cash_8"    => $payments[8]["encode"],
			  "non_cash_9"    => $payments[9]["encode"],
			  "day"    => (date("d")),
			  "month"    => (date("F")),
			  "year"    => (date("Y")),
				])
            //   ->needAppearances()
              ->flatten()
              ->saveAs("reports/".$_POST["contract_id"]."_sss.pdf");
              $filename = $_POST["contract_id"]."_sss.pdf";
              $path = "reports/".$_POST["contract_id"]."_sss.pdf";
              $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
              $json = array('info' => $load);
              echo json_encode($json);



		}

		if($_POST["action"] == "burial_contract_pdf"){
			$burial_contract = query("select * from burial_service_contract where
										contract_id = ?", $_POST["contract_id"]);
			$burial_contract = $burial_contract[0];

			// dump($burial_contract);

			$cash = query("select * from transaction where contract_id = ?
							and payment_type = 'CASH'", $_POST["contract_id"]);
			$total_cash = 0;
			foreach($cash as $c):
				$total_cash = $total_cash + $c["amount"];
			endforeach;

			$guarantee = query("select * from transaction t
								left join guarantors g
								on g.tbl_id = t.agency where contract_id = ?
								and payment_type = 'GUARANTEE'",$_POST["contract_id"]);
			$total_guarantee = 0;
			foreach($guarantee as $g):
				$total_guarantee = $total_guarantee + $g["amount"];
			endforeach;

			$payment_total = $total_cash + $total_guarantee;
			$balance = $burial_contract["total_amount"] - $payment_total;
			$total_payment = "";
			$total_payment_words = "";
			if($payment_total != 0){
				$total_payment = "(" . to_peso($payment_total) . ")";
				$total_payment_words = strtoupper(convert_number_to_words($payment_total));
			}
			
			
			// dump($guarantee);
			$payments = [];
			for($i = 0; $i < 8; $i++):
				if(isset($guarantee[$i])):
					$payments[$i+1]["entity"] = strtoupper($guarantee[$i]["guarantor"]);
					$payments[$i+1]["amount"] = "(".to_peso($guarantee[$i]["amount"]).")";
				else:
					$payments[$i+1]["entity"] = "";
					$payments[$i+1]["amount"] = "";
				endif;
			endfor;

			// dump($payments);

			if($burial_contract["branch"] == "PANABO")
				$header="Km. 31 Gredu, Panabo City";
			else
				$header="Km. 24 Bunawan, Davao City";


			
			$pdf = new Pdf('reports/burial_contract.pdf', [
	// 			'command' => 'C:/Program Files (x86)/PDFtk/bin/pdftk.exe',
    // // or on most Windows systems:
    // // 'command' => 'C:\Program Files (x86)\PDFtk\bin\pdftk.exe',
    // 'useExec' => true, 
			]);

			// dump($pdf);

		

            $result = $pdf->fillForm([
              "client_name"    => strtoupper($burial_contract["client_firstname"] . " "
									. $burial_contract["client_middlename"] . " " . $burial_contract["client_lastname"]),
			  "address"    => strtoupper($burial_contract["address_home"] . ", "
									. $burial_contract["address_barangay"] . ", " . $burial_contract["address_city"] . " ".
									$burial_contract["zipcode"]
								),
			  "branch"    => strtoupper($burial_contract["branch"]),
			  "deceased"    => strtoupper($burial_contract["deceased_firstname"] . " "
									. $burial_contract["deceased_middlename"] . " " . $burial_contract["deceased_lastname"]),
			  "embalming_days"    => strtoupper($burial_contract["embalming_days"]),
			  "embalming_cost"    => to_peso($burial_contract["embalming_cost"]),
			  "casket"    => strtoupper($burial_contract["casket_type"]),
			  "casket_cost"    => to_peso($burial_contract["casket_cost"]),
			  "arrangement"    => strtoupper($burial_contract["arrangement_type"]),
			  "arrangement_cost"    => to_peso($burial_contract["arrangement_cost"]),
			  "coach_type"    => strtoupper($burial_contract["coach_type"]),
			  "coach_cost"    => to_peso($burial_contract["coach_cost"]),
			  "extra"    => strtoupper($burial_contract["extra"]),
			  "extra_cost"    => to_peso($burial_contract["extra_cost"]),
			  "total_cost"    => to_peso($burial_contract["total_amount"]),
			  "balance_cost"    => to_peso($balance),
			  "total_words"    => strtoupper(convert_number_to_words($burial_contract["total_amount"])),
			  "burial_date"    => strtoupper($burial_contract["burial_date"]),
			  "downpayment_cash"    => "(" . to_peso($total_cash) . ")",
			  "non_cash_amount_1"    => $payments[1]["amount"],
			  "non_cash_entity_1"    => $payments[1]["entity"],
			  "non_cash_amount_2"    => $payments[2]["amount"],
			  "non_cash_entity_2"    => $payments[2]["entity"],
			  "non_cash_amount_3"    => $payments[3]["amount"],
			  "non_cash_entity_3"    => $payments[3]["entity"],
			  "non_cash_amount_4"    => $payments[4]["amount"],
			  "non_cash_entity_4"    => $payments[4]["entity"],
			  "non_cash_amount_5"    => $payments[5]["amount"],
			  "non_cash_entity_5"    => $payments[5]["entity"],
			  "non_cash_amount_6"    => $payments[6]["amount"],
			  "non_cash_entity_6"    => $payments[6]["entity"],
			  "non_cash_amount_7"    => $payments[7]["amount"],
			  "non_cash_entity_7"    => $payments[7]["entity"],
			  "non_cash_amount_8"    => $payments[8]["amount"],
			  "non_cash_entity_8"    => $payments[8]["entity"],
			  "header"    => strtoupper($header),

			  "total_payment"    => $total_payment,
			  "total_payment_words"    => $total_payment_words,
			  "balance_words"    => strtoupper(convert_number_to_words($balance)),



				])
            //   ->needAppearances()
              ->flatten()
              ->saveAs("reports/".$burial_contract["contract_id"].".pdf");

		
        
              $filename = $burial_contract["contract_id"].".pdf";
              $path = "reports/".$burial_contract["contract_id"].".pdf";
              $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
              $json = array('info' => $load);
              echo json_encode($json);
		}
		
    }
	else {

		$Transactions = [];
		$transactions = query("select * from transaction order by transaction_id desc");
		foreach($transactions as $t):
			$Transactions[$t["contract_id"]][$t["transaction_id"]] = $t;
		endforeach;
		$contracts = query("select * from burial_service_contract order by contract_date");
		if($_GET["action"] == "list"){
			render("public/burial_contract_system/burial_contract_list.php", [
				"title" => "Burial List",
				"contracts" => $contracts,
				"Transactions" => $Transactions,
			]);
		}

		if($_GET["action"] == "new"){
			render("public/burial_contract_system/new_burial_contract.php");
		}

		if($_GET["action"] == "details"){

			$contract = query("select * from burial_service_contract where contract_id = ?", $_GET["id"]);
			$contract = $contract[0];
			$transaction = query("select * from transaction t
									left join guarantors g
									on g.tbl_id = t.agency where contract_id = ?
									order by transaction_date asc", $_GET["id"]);

			$guarantors = query("select * from guarantors");
			
			$total_payment = 0;
			foreach($transaction as $t):
				$total_payment = $total_payment + $t["amount"];
			endforeach;

			$balance = $contract["total_amount"] - $total_payment;
			render("public/burial_contract_system/burial_contract_details.php",
			[
				"title" => $contract["contract_id"],
				"contract" => $contract,
				"transaction" => $transaction,
				"balance" => $balance,
				"guarantors" => $guarantors,
			]
			);
		}
			
	}
?>
