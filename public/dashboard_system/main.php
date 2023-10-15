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
			SUM(CASE WHEN deceased_gender = 'MALE' THEN 1 ELSE 0 END) AS male_count,
    SUM(CASE WHEN deceased_gender = 'FEMALE' THEN 1 ELSE 0 END) AS female_count,
			COUNT(*) AS total
			FROM burial_service_contract
			where 1=1 ".$where." 
			GROUP BY month_year");
			// dump($dataset);
			$Data = [];
			foreach($dataset as $row):
				$Data[$row["month_year"]] = $row;
			endforeach;

			$JSON = [];
			$Gender = [];
			$male = 0;
			$female = 0;
			// dump($Data);
			for($i = $_POST["from"]; $i <= $_POST["to"]; $i++):
				if(isset($Data[$i])):
					$JSON[] = $Data[$i]["total"];
					$male = $male + $Data[$i]["male_count"];
					$female = $female + $Data[$i]["female_count"];
				else:
					$JSON[] = 0;
				endif;
			
			endfor;

		
			$Gender = array(
				array(
					'value' => $male,
					'color' => '#f56954',
					'highlight' => '#f56954',
					'label' => 'Male'
				),
				array(
					'value' => $female,
					'color' => '#00a65a',
					'highlight' => '#00a65a',
					'label' => 'Female'
				)
			);
			

			// dump($JSON);






			// $dummy = generateRandomNumbers($_POST["from"], $_POST["to"]);
			// dump($JSON);
			$json_data = array(
				"labels" => $monthArray,
				"dataset" => $JSON,
				"gender" => $Gender,
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
		
		$ambot = query("select count(*) as count, t.agency , g.guarantor from transaction t
		left join guarantors g on g.tbl_id = t.agency where t.payment_type = 'GUARANTEE'
		and (t.soa_id is null or t.soa_id = '') group by t.agency");
		// dump($guarantors);

		$soa = query("select * from soa where remarks = 'UNPAID'");

		$clients = query("SELECT
		contract_id, CONCAT(client_lastname, ', ', client_firstname) AS client,
	 
		CASE
			WHEN valid_date IS NOT NULL THEN
				CASE
					WHEN CURDATE() > valid_date THEN 'OVERDUE'
					ELSE remarks
				END
			ELSE remarks
		END AS remarks
	FROM
		burial_service_contract
		WHERE remarks = 'UNPAID'");

		render("public/dashboard_system/indexform.php",[
			"title" => "Plans",
			"ambot" => $ambot,
			"soa" => $soa,
			"clients" => $clients,
		]);
	}
?>
