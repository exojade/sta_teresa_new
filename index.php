<?php

    require("includes/config.php");
    require("includes/uuid.php");
    require("includes/checkhit.php");
	
	
		
		
		$request = $_SERVER['REQUEST_URI'];
		$constants = get_defined_constants();
		$request = explode('/sta_teresa',$request);
		$request = $request[1];
		$request = explode('?',$request);
		$request = $request[0];
		$request = explode('/',$request);
		$request = $request[1];
		
		$countering = array("login", "payroll" , "register", "soa", "static", "static_casket_list", "static_casket_details", "static_chapel_list", "static_chapel_details", "reports_page");
	
		if (!in_array($request, $countering)){
			if(empty($_SESSION["sta_teresa"]["userid"]) && empty($_SESSION["sta_teresa"]["application"])){
				require 'public/static_system/index.php';
			}
			else{
				if($request == 'index' || $request == '/')
					require 'public/dashboard_system/main.php';
				else if ($request == 'users')
					require 'public/users_system/users.php';

				else if ($request == 'employees')
					require 'public/employees_system/employees.php';
				else if ($request == 'plan')
					require 'public/plan_system/plan.php';
				else if ($request == 'partners')
					require 'public/partners_system/partners.php';
				else if ($request == 'branch')
					require 'public/branch_system/branch.php';


				else if ($request == 'logout')
					require 'logout.php';
				else if ($request == 'burial_contract')
					require 'public/burial_contract_system/burial_contract.php';
				

				else if ($request == 'caskets')
					require 'public/caskets_system/caskets.php';
				else if ($request == 'chapels')
					require 'public/chapels_system/chapels.php';
				else if ($request == 'announcements')
					require 'public/announcements_system/announcement.php';


				else if ($request == 'payroll')
					require 'public/payroll_system/payroll.php';

				else if ($request == 'reports_page')
					require 'public/report_system/reports.php';


				else if ($request == 'soa')
					require 'public/soa_system/soa.php';
				else
					require 'public/404_system/404.php';
			}
		}
		else{
			
			if ($request == 'login')
				require 'public/login_system/login.php';

			
			
			
			
			
			if ($request == 'static')
				require 'public/static_system/index.php';

			if ($request == 'static_casket_list')
				require 'public/static_system/casket_list.php';

			if ($request == 'static_casket_details')
				require 'public/static_system/casket_details.php';

			if ($request == 'static_chapel_list')
				require 'public/static_system/chapel_list.php';

			if ($request == 'static_chapel_details')
				require 'public/static_system/chapel_details.php';

			if ($request == 'reports_page')
			require 'public/report_system/reports.php';

			else if ($request == 'payroll')
					require 'public/payroll_system/payroll.php';


			if ($request == 'soa')
				require 'public/soa_system/soa.php';
			
			else if ($request == 'register')
				require 'public/register_system/register.php';
		}
		
		
			
		
?>
