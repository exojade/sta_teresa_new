<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == 'add'):
			$plan_id = create_uuid("BRANCH");
			if (query("insert INTO branch (branch_id,branch,address) 
				VALUES(?,?,?)", 
				$plan_id,$_POST["branch"], $_POST["address"]) === false)
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
		elseif($_POST["action"] == "delete_branch"):
			// dump($_POST);
			query("delete from branch where branch_id = ?", $_POST["branch_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Deleting Branch",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();
		endif;
    }
	else {
		$branch = query("select * from branch");
		render("public/branch_system/branch_list.php",[
			"title" => "Branch",
			"branch" => $branch,
		]);
	}
?>
