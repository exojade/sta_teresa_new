<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump(get_defined_constants(true));
		if($_POST["action"] == 'add'){
			// dump($_FILES);
			$userid = create_uuid("USERS");
			$target = "resources/users/".$_FILES["image_url"]["name"];
			if(!move_uploaded_file($_FILES['image_url']['tmp_name'], $target)){
				echo("Do not have upload files");
				exit();
			}
			if (query("insert INTO tblusers (user_id,username,password,fullname,role,image_url) 
				VALUES(?,?,?,?,?,?)", 
				$userid,$_POST["username"], crypt($_POST["password"],''),
				$_POST["fullname"],$_POST["role"], $target) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding Announcement",
					"link" => "users",
					];
					echo json_encode($res_arr); exit();
		}

		else if($_POST["action"] == 'reset_password'){
			// dump($_POST);
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
			$target = "resources/users/".$_FILES["image_url"]["name"];
			if(!move_uploaded_file($_FILES['image_url']['tmp_name'], $target)){
				echo("Do not have upload files");
				exit();
			}
			query("update tblusers SET image_url = ? WHERE user_id = ?", $target, $_POST["user_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Updating Profile Image",
				"link" => "users",
				];
				echo json_encode($res_arr); exit();
		}
    }
	else {

		$employees = query("select * from employees");
		render("public/employees_system/employees_list.php",[
			"title" => "Employees",
			"employees" => $employees,

		]);
	}
?>
