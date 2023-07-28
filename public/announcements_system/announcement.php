<?php
use mikehaertl\pdftk\Pdf;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "add"){
			// dump($_POST);
			$target = "resources/announcements/".$_FILES["bg-image"]["name"];
			if(!move_uploaded_file($_FILES['bg-image']['tmp_name'], $target)){
				echo("Do not have upload files");
				exit();
			}
			if (query("insert INTO announcements (title,announcement,date_added,timestamp,time_added,status,background_image) 
				VALUES(?,?,?,?,?,?,?)", 
				$_POST["title"],$_POST["announcement"],date("Y-m-d"), time(), date("h:i:s a"), $_POST["status"], $target) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
				
		
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on Adding Announcement",
					"link" => "announcements?action=list",
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

		$announcements = query("select * from announcements");
		if($_GET["action"] == "list"){
			render("public/announcements_system/announcement_list.php", [
				"title" => "Chapels Databank",
				"announcements" => $announcements,
			]);
		}
	}
?>
