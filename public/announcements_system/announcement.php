<?php
use mikehaertl\pdftk\Pdf;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "add"){
			// dump($_FILES);
			if (query("INSERT INTO chapel (chapel_name,price_amount) 
				VALUES(?,?)", 
				$_POST["chapel"],$_POST["amount"]) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				if(isset($_FILES["chapel_image"])):
				$chapel_id = query("SELECT LAST_INSERT_ID() AS id");
				// dump($chapel_id);
				$chapel_id = $chapel_id[0]["id"];
				$i = 0;
				foreach($_FILES["chapel_image"]["name"] as $image):
					$target = "resources/chapels/".$_FILES["chapel_image"]["name"][$i];
					$image_id = create_uuid("CHAPELIMAGE");
					if(!move_uploaded_file($_FILES['chapel_image']['tmp_name'][$i], $target)){
						echo("Do not have upload files");
						exit();
					}
					if (query("insert INTO chapel_image (chapel_image_id,chapel_id,chapel_image) 
						VALUES(?,?,?)", 
						$image_id,$chapel_id,$target) === false)
						{
							apologize("Sorry, that username has already been taken!");
						}
					$i++;
				endforeach;
				endif;
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding chapel",
					"link" => "chapels?action=list",
					];
					echo json_encode($res_arr); exit();
		}



		if($_POST["action"] == "add_chapel_image"){

			// dump($_FILES);
		
				$chapel_id = $_POST["chapel_id"];
				$i = 0;
				foreach($_FILES["chapel_image"]["name"] as $image):
					$target = "resources/chapels/".$_FILES["chapel_image"]["name"][$i];
					$image_id = create_uuid("CHAPELIMAGE");
					if(!move_uploaded_file($_FILES['chapel_image']['tmp_name'][$i], $target)){
						echo("Do not have upload files");
						exit();
					}
					if (query("insert INTO chapel_image (chapel_image_id,chapel_id,chapel_image) 
						VALUES(?,?,?)", 
						$image_id,$chapel_id,$target) === false)
						{
							apologize("Sorry, that username has already been taken!");
							
						}
					$i++;
				endforeach;
			
			


				

				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding chapel",
					"link" => "chapels?action=list",
					];
					echo json_encode($res_arr); exit();
		}


		if($_POST["action"] == "update"){
			// dump($_POST);
				query("update chapel set chapel_name = ?, price_amount = ? where chapel_id = ?",
						$_POST["chapel"], $_POST["amount"], $_POST["chapel_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Updating the chapel",
				"link" => "chapels?action=list",
				];
				echo json_encode($res_arr); exit();
			
		}

		if($_POST["action"] == "delete_image"){
			query("delete from chapel_image where chapel_image_id = ?", $_POST["image_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on Deleting the Image",
				"link" => "chapels?action=list",
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
