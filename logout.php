<?php


	if(!isset($_SESSION["sta_teresa"])) {
		redirect("login");
	}
	
	// log out current user, if any
	logout();
	
	// redirect user
	redirect("static");

?>
