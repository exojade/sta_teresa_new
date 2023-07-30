<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump(get_defined_constants(true));
		if($_POST["action"] == 'add'){
			dump($_POST);
			$userid = create_uuid("USERS");
			if (query("insert INTO mtop_users (userId,userName,userPassword,fullName,userLevel) 
				VALUES(?,?,?,?,?)", 
				$userid,$_POST["username"], crypt($_POST["password"],''),
				$_POST["fullname"],$_POST["role"]) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
		
		redirect("users");
		}

		else if($_POST["action"] == 'reset_password'){
			// dump($_POST);
			query("update mtop_users SET userPassword = ? WHERE userId = ?", crypt('!1234#',''), $_POST["user_id"]);
		}
    }
	else {

		$users = query("select * from tblusers");
		render("public/users_system/usersform.php",[
			"title" => "Users",
			"users" => $users,

		]);
	}
?>
