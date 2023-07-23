<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $rows = query("select * FROM tbl_users WHERE username = ?", $_POST["username"]);
        if (count($rows) == 1)
            echo("already_exist");
		else {
			$constants = get_defined_constants(true);
			$db2 = $constants["user"]["DATABASE2"];
			$sql = query("select * from $db2.sys_user where username = ?", $_POST["username"]);
			if(count($sql) == 1){
				if (query("insert INTO tbl_users (user_id, username, password, role, fullname) 
				VALUES(?,?,?,?,?)", 
				$sql[0]["objid"],$sql[0]["username"],crypt($_POST["password"],""),'no_role',$sql[0]["name"]
				) === false){
					
				}
				echo("done_register");
			}
			else
				echo("non_existing");
		}  
    }
    else
    {
	
        renderview("public/register_system/registerform.php", ["title" => "Log In"]);
    }
?>