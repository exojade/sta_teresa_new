<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump(get_defined_constants(true));
		
		if($_POST["action"] == "add_payroll"):
			// dump($_POST);
			$payroll_id = create_uuid("PYR");
			if (query("insert INTO payroll (payroll_id,from_date,to_date,status,benefits) 
				VALUES(?,?,?,?,?)", 
				$payroll_id,$_POST["from_date"], $_POST["to_date"],"pending", $_POST["benefits"]) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}

				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Register Payroll",
					"link" => "refresh",
					];
					echo json_encode($res_arr); exit();
			
			elseif($_POST["action"] == "add_employee"):
				// dump($_POST);
				$payroll = query("select * from payroll where payroll_id = ?", $_POST["payroll_id"]);
				$employee = query("select * from employees where employee_id = ?", $_POST["employee"]);
				$e = $employee[0];
				if (query("INSERT INTO payroll_employee (payroll_id,employee_id,number_days,base_salary,cash_advance,benefits) 
					VALUES(?,?,?,?,?,?)", 
					$_POST["payroll_id"],$_POST["employee"],$_POST["number_days"],$e["base_salary"], $_POST["cash_advance"], $payroll[0]["benefits"]) === false)
					{
						$res_arr = [
							"result" => "failed",
							"title" => "Failed",
							"message" => "Employee already added on this Payroll",
							// "link" => "burial_contract?action=details&id=" . $_POST["contract_id"],
							];
							echo json_encode($res_arr); exit();
					}

					$res_arr = [
						"result" => "success",
						"title" => "Success",
						"message" => "Success on Add Employee",
						"link" => "refresh",
						];
						echo json_encode($res_arr); exit();


			elseif($_POST["action"] == "delete_employee"):
				// dump($_POST);

				query("delete from payroll_employee where payroll_id = ? and employee_id = ?", $_POST["payroll_id"], $_POST["employee"]);
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Deleting Employee",
					"link" => "refresh",
					];
					echo json_encode($res_arr); exit();


			elseif($_POST["action"] == "payslip_pdf"):
						$base_url = the_base_url();
						$webpath = $base_url . "/sta_teresa/payroll?action=payslip_pdf&payroll_id=".$_POST["payroll_id"] . "&employee_id=".$_POST["employee_id"];
						// dump($webpath);
						// dump($webpath);
						$filename = "PAYSLIP";
						// dump($filename);
						$path = "reports/".$filename.".pdf";
						$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
						// dump($exec);
						exec($exec);
						$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
						$json = array('info' => $load);
						echo json_encode($json);
					


			elseif($_POST["action"] == "update"):
				// dump($_POST);

				$employee = query("select * from employees where employee_id = ?", $_POST["employee_id"]);
				query("update payroll_employee set number_days = ?, cash_advance = ?, base_salary = ? where employee_id = ? and payroll_id = ?",
						$_POST["number_days"], $_POST["cash_advance"], $employee[0]["base_salary"], $_POST["employee_id"], $_POST["payroll_id"]);
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Updating Employee",
					"link" => "refresh",
					];
					echo json_encode($res_arr); exit();
			
			elseif($_POST["action"] == "pdf_payroll"):
				// dump($_POST);
				$base_url = the_base_url();
					$options = urlencode(serialize($_POST));
					$webpath = $base_url . "/sta_teresa/payroll?action=pdf_payroll&options=".$options;
					$filename = "PAYROLL_REPORT";
					$path = "reports/".$filename.".pdf";
					$exec = '"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe" -O portrait  "'.$webpath.'" '.$path.'';
					exec($exec);
					$load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
					$json = array('info' => $load);
					echo json_encode($json);
			endif;
    }
	else {

	
		if($_GET["action"] == "list"):

			$payroll = query("select * from payroll");
			$Employees = [];
			$payroll_employee = query("SELECT payroll_id, COUNT(*) AS employees, SUM(base_salary * number_days) AS base_salary, SUM(cash_advance) AS cash_advance, SUM(benefits) AS benefits
			FROM payroll_employee GROUP BY payroll_id
			");

			foreach($payroll_employee as $row):
				$Employees[$row["payroll_id"]] = $row;
			endforeach;


			render("public/payroll_system/payroll_list.php",[
				"title" => "Payroll",
				"payroll" => $payroll,
				"Employees" => $Employees,
			]);
		elseif($_GET["action"] == "details"):
			$payroll_employees = query("select pe.*, e.employee_name from payroll_employee pe left join
									employees e on e.employee_id = pe.employee_id
									where pe.payroll_id = ?", $_GET["id"]);
									// dump($payroll_employees);
			$employees = query("select * from employees");
			render("public/payroll_system/payroll_details.php",[
				"title" => "Payroll",
				"payroll_employees" => $payroll_employees,
				"employees" => $employees,
			]);

		elseif($_GET["action"] == "pdf_payroll"):
				renderview("public/payroll_system/pdf_payroll.php",[
					"title" => "Sales Report",
				]);

		elseif($_GET["action"] == "payslip_pdf"):
		renderview("public/payroll_system/payslip_pdf.php", [
			"title" => "Statement of Account",
			// "contracts" => $contracts,
			// "agency" => $agency,
		]);

		endif;

		
		


		

		
	}
?>
