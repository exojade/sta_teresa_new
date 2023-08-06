<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump(get_defined_constants(true));
		if($_POST["action"] == 'add'){
			// dump($_POST);
			if($_FILES["image_url"]["size"] != 0):
				$target = "resources/users/".$_FILES["image_url"]["name"];
				if(!move_uploaded_file($_FILES['image_url']['tmp_name'], $target)):
					echo("Do not have upload files");
					exit();
				endif;
			else:
				$target = "resources/employees/default.png";
			endif;
			$employee_id = create_uuid("EMP");
			if (query("insert INTO employees (employee_id,employee_name,branch,base_salary,profile) 
				VALUES(?,?,?,?,?)", 
				$employee_id,$_POST["employee_name"], $_POST["branch"],
				$_POST["base_salary"], $target) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding Announcement",
					"link" => "employees",
					];
					echo json_encode($res_arr); exit();
		}
		else if($_POST["action"] == 'reset_password'){
			query("update tblusers SET password = ? WHERE user_id = ?", crypt('!1234#',''), $_POST["user_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Resetting Password",
				"link" => "users",
				];
				echo json_encode($res_arr); exit();
		}


		else if($_POST["action"] == 'change_image'){
			// dump($_FILES);
			$target = "resources/employees/".$_FILES["image_url"]["name"];
			if(!move_uploaded_file($_FILES['image_url']['tmp_name'], $target)){
				echo("Do not have upload files");
				exit();
			}
			query("update employees SET profile = ? WHERE employee_id = ?", $target, $_POST["employee_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Updating Profile Image",
				"link" => "employees",
				];
				echo json_encode($res_arr); exit();
		}
    }
	else {

	
		if($_GET["action"] == "list"):
			render("public/payroll_system/payroll_list.php",[
				"title" => "Payroll",
			]);
		elseif($_GET["action"] == "details"):
			render("public/payroll_system/payroll_details.php",[
				"title" => "Payroll",
			]);
		endif;


		

		
	}
?>
