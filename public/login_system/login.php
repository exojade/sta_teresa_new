<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      
        $rows = query("SELECT * FROM tblusers WHERE username = ?", $_POST["username"]);
        if (count($rows) == 1)
        {
            $row = $rows[0];
			if (crypt($_POST["password"], $row["password"]) == $row["password"]){
				$_SESSION["sta_teresa"] = [
					"userid" => $row["user_id"],
					"uname" => $row["username"],
					"role" => $row["role"],
					"fullname" => $row["fullname"],
					"application" => "sta_teresa"
				];
				echo("proceed");
            }
			else {
				echo("wrong_password");
			}
		}
    }
    else
    {
	
        renderview("public/login_system/loginform.php", 
		["title" => "Log In"]);
    }
?>