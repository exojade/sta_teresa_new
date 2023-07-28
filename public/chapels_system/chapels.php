<?php
use mikehaertl\pdftk\Pdf;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "add"){
			if (query("INSERT INTO casket (casket,amount) 
				VALUES(?,?)", 
				$_POST["casket"],$_POST["amount"]) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				if(isset($_FILES["casket_image"])):
				$casket_id = query("SELECT LAST_INSERT_ID() AS id");
				// dump($casket_id);
				$casket_id = $casket_id[0]["id"];
				$i = 0;
				foreach($_FILES["casket_image"]["name"] as $image):
					$target = "resources/caskets/".$_FILES["casket_image"]["name"][$i];
					$image_id = create_uuid("CASKETIMAGE");
					if(!move_uploaded_file($_FILES['casket_image']['tmp_name'][$i], $target)){
						echo("Do not have upload files");
						exit();
					}
					if (query("insert INTO casket_image (casket_image_id,casket_id,image_url) 
						VALUES(?,?,?)", 
						$image_id,$casket_id,$target) === false)
						{
							apologize("Sorry, that username has already been taken!");
						}
					$i++;
				endforeach;
				endif;
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding Casket",
					"link" => "caskets?action=list",
					];
					echo json_encode($res_arr); exit();
		}



		if($_POST["action"] == "add_casket_image"){

			// dump($_FILES);
		
				$casket_id = $_POST["casket_id"];
				$i = 0;
				foreach($_FILES["casket_image"]["name"] as $image):
					$target = "resources/caskets/".$_FILES["casket_image"]["name"][$i];
					$image_id = create_uuid("CASKETIMAGE");
					if(!move_uploaded_file($_FILES['casket_image']['tmp_name'][$i], $target)){
						echo("Do not have upload files");
						exit();
					}
					if (query("insert INTO casket_image (casket_image_id,casket_id,image_url) 
						VALUES(?,?,?)", 
						$image_id,$casket_id,$target) === false)
						{
							apologize("Sorry, that username has already been taken!");
							
						}
					$i++;
				endforeach;
			
			


				

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
				query("update casket set casket = ?, amount = ? where casket_id = ?",
						$_POST["casket"], $_POST["amount"], $_POST["casket_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Updating the Casket",
				"link" => "caskets?action=list",
				];
				echo json_encode($res_arr); exit();
			
		}

		if($_POST["action"] == "delete_image"){
			query("delete from casket_image where casket_image_id = ?", $_POST["image_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Deleting the Image",
				"link" => "caskets?action=list",
				];
				echo json_encode($res_arr); exit();
			// dump($_POST);

		}
		
    }
	else {

		$chapels = query("select * from chapel");
		$chapels_image = query("select * from chapel_image");
		$Chapel_image = [];
		foreach($chapels_image as $c):
			$Chapel_image[$c["chapel_id"]][$c["chapel_image_id"]] = $c;
		endforeach;
		if($_GET["action"] == "list"){
			render("public/chapels_system/chapels_list.php", [
				"title" => "Chapels Databank",
				"chapels" => $chapels,
				"chapels_image" => $chapels_image,
				"Chapel_image" => $Chapel_image,
			]);
		}
	}
?>
