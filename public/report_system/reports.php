<?php
// use PHPJasper\PHPJasper;  
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		
    }
	else {

		if($_GET["action"] == "casket_report"):
			render("public/report_system/casket_report.php",[
				"title" => "Casket Report",
			]);
		elseif($_GET["action"] == "collectibles_report"):
			render("public/report_system/collectibles_report.php",[
				"title" => "Colllectibles Report",
			]);
		elseif($_GET["action"] == "deceased_report"):
			render("public/report_system/deceased_report.php",[
				"title" => "Deceased Report",
			]);
		elseif($_GET["action"] == "sales_report"):
			render("public/report_system/sales_report.php",[
				"title" => "Sales Report",
			]);
		endif;


		

		
	}
?>
