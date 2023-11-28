<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == 'add'):
			// $plan_id = create_uuid("BRANCH");
			if (query("insert INTO guarantors (guarantor) 
				VALUES(?)", 
				$_POST["guarantor"]) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding Branch",
					"link" => "refresh",
					];
					echo json_encode($res_arr); exit();
		elseif($_POST["action"] == "update"):
			// dump($_POST);
			query("update guarantors set guarantor = ? where tbl_id = ?", $_POST["guarantor"], $_POST["tbl_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Updating Guarantor",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();
		endif;
    }
	else {
		$guarantors = query("select * from guarantors");
		render("public/guarantors_system/guarantors_list.php",[
			"title" => "Guarantors",
			"branch" => $guarantors,
		]);
	}
?>
