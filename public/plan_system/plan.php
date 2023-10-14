<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump(get_defined_constants(true));
		if($_POST["action"] == 'add'):
	
			// dump($_POST);
			$plan_id = create_uuid("PLAN");
			if (query("insert INTO plans (plan_id,plan) 
				VALUES(?,?)", 
				$plan_id,$_POST["plan_name"]) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding Plan",
					"link" => "refresh",
					];
					echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "delete_plan"):
			// dump($_POST);
			query("delete from plans where plan_id = ?", $_POST["plan_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Adding Plan",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();
			
		endif;

    }
	else {
		$plans = query("select * from plans");
		render("public/plan_system/plan_list.php",[
			"title" => "Plans",
			"plans" => $plans,
		]);
	}
?>
