<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump(get_defined_constants(true));
		
		if($_POST["action"] == "add_payroll"):
			// dump($_POST);
			$payroll_id = create_uuid("PYR");
			if (query("insert INTO payroll (payroll_id,from_date,to_date,status) 
				VALUES(?,?,?,?)", 
				$payroll_id,$_POST["from_date"], $_POST["to_date"],"pending") === false)
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
				$employee = query("select * from employees where employee_id = ?", $_POST["employee"]);
				$e = $employee[0];
				if (query("INSERT INTO payroll_employee (payroll_id,employee_id,number_days,base_salary,cash_advance,benefits) 
					VALUES(?,?,?,?,?,?)", 
					$_POST["payroll_id"],$_POST["employee"],$_POST["number_days"],$e["base_salary"], $_POST["cash_advance"], "488") === false)
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
		endif;


		

		
	}
?>
