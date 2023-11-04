<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		// dump(get_defined_constants(true));
		if($_POST["action"] == "add"):
			// dump($_FILES);

			$target = "resources/partners/".$_FILES["image"]["name"];
			if(!move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				echo("Do not have upload files");
				exit();
			}

			if (query("INSERT INTO partners (partner_name,partner_image) 
				VALUES(?,?)", 
				$_POST["partner_name"],$target) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding partner",
					"link" => "refresh",
					];
					echo json_encode($res_arr); exit();

		elseif($_POST["action"] == "delete"):
			// dump($_POST);
			query("delete from partners where partner_id = ?", $_POST["partner_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Deleting Partner",
				"link" => "refresh",
				];
				echo json_encode($res_arr); exit();
			
		endif;

    }
	else {
		$partners = query("select * from partners");
		render("public/partners_system/partners_list.php",[
			"title" => "Partners",
			"partners" => $partners,
		]);
	}
?>
