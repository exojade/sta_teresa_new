<?php
use mikehaertl\pdftk\Pdf;
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "add"){
			// dump($_FILES);
			$target = "resources/caskets/".$_FILES["casket_image"]["name"];
			if(!move_uploaded_file($_FILES['casket_image']['tmp_name'], $target)){
				echo("Do not have upload files");
				exit();
			}
			if (query("INSERT INTO casket (casket,amount,casket_image) 
				VALUES(?,?,?)", 
				$_POST["casket"],$_POST["amount"],$target) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding Casket",
					"link" => "caskets?action=list",
					];
					echo json_encode($res_arr); exit();
		}


		if($_POST["action"] == "update"){
			// dump($_POST);
			if($_FILES["casket_image"]["size"] != 0):
				$target = "resources/caskets/".$_FILES["casket_image"]["name"];
				if(!move_uploaded_file($_FILES['casket_image']['tmp_name'], $target)){
					echo("Do not have upload files");
					exit();
				}
				query("update casket set casket = ?, amount = ?, casket_image = ? where casket_id = ?",
						$_POST["casket"], $_POST["amount"], $target, $_POST["casket_id"]);
			else:
				query("update casket set casket = ?, amount = ? where casket_id = ?",
						$_POST["casket"], $_POST["amount"], $_POST["casket_id"]);
				
			endif;

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Updating the Casket",
				"link" => "caskets?action=list",
				];
				echo json_encode($res_arr); exit();
			
		}
		
    }
	else {

		$caskets = query("select * from chapel");
		if($_GET["action"] == "list"){
			render("public/chapels_system/chapels_list.php", [
				"title" => "Chapels Databank",
				"caskets" => $caskets,
			]);
		}

		
			
	}
?>
