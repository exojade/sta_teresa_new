<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		
		if($_POST["action"] == "deceased"):
			$monthArray = generateMonthArray($_POST["from"], $_POST["to"]);

			$from_date = $_POST["year"] . "-" . $_POST["from"] . "-01";
			$to_date = $_POST["year"] . "-" . $_POST["to"] . "-01";
			$to_date = date("Y-m-t", strtotime($to_date));
			$where = " ";
			if(isset($_REQUEST["from"])):
				if($_REQUEST["from"] != "")
					$where = $where . " and death_date >= '" . $from_date . "'";
			endif;
			if(isset($_REQUEST["to"])):
				if($_REQUEST["to"] != "")
					$where = $where . " and death_date <= '" . $to_date . "'";
			endif;
			// dump($where);
			

			$dataset = query("select CONCAT(CAST(MONTH(death_date) AS CHAR)) AS month_year,
			COUNT(*) AS total
			FROM burial_service_contract
			where 1=1 ".$where." 
			GROUP BY month_year");
			// dump($dataset);
			// dump($dataset);
			$Data = [];
			foreach($dataset as $row):
				$Data[$row["month_year"]] = $row;
			endforeach;

			$JSON = [];
			// dump($Data);
			for($i = $_POST["from"]; $i <= $_POST["to"]; $i++):
				if(isset($Data[$i])):
					$JSON[] = $Data[$i]["total"];
				else:
					$JSON[] = 0;
				endif;
			endfor;

			// dump($JSON);






			// $dummy = generateRandomNumbers($_POST["from"], $_POST["to"]);
			// dump($JSON);
			$json_data = array(
				"labels" => $monthArray,
				"dataset" => $JSON,
			);
			echo json_encode($json_data);



			elseif($_POST["action"] == "sales"):
				$monthArray = generateMonthArray($_POST["from"], $_POST["to"]);
	
				$from_date = $_POST["year"] . "-" . $_POST["from"] . "-01";
				$to_date = $_POST["year"] . "-" . $_POST["to"] . "-01";
				$to_date = date("Y-m-t", strtotime($to_date));
				$where = " ";
				if(isset($_REQUEST["from"])):
					if($_REQUEST["from"] != "")
						$where = $where . " and transaction_date >= '" . $from_date . "'";
				endif;
				if(isset($_REQUEST["to"])):
					if($_REQUEST["to"] != "")
						$where = $where . " and transaction_date <= '" . $to_date . "'";
				endif;
				// dump($where);
				
	
				$dataset = query("select CONCAT(CAST(MONTH(transaction_date) AS CHAR)) AS month_year,
				sum(amount) AS total
				FROM transaction
				where 1=1 ".$where." 
				GROUP BY month_year");
				// dump($dataset);
				// dump($dataset);
				$Data = [];
				foreach($dataset as $row):
					$Data[$row["month_year"]] = $row;
				endforeach;
	
				$JSON = [];
				// dump($Data);
				for($i = $_POST["from"]; $i <= $_POST["to"]; $i++):
					if(isset($Data[$i])):
						$JSON[] = $Data[$i]["total"];
					else:
						$JSON[] = 0;
					endif;
				endfor;
	
				// dump($JSON);
	
	
	
	
	
	
				// $dummy = generateRandomNumbers($_POST["from"], $_POST["to"]);
				// dump($JSON);
				$json_data = array(
					"labels" => $monthArray,
					"dataset" => $JSON,
				);
				echo json_encode($json_data);
		endif;
		
    }
	else {
		
		render("public/dashboard_system/indexform.php");
	}
?>
