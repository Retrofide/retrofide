<?php
	ob_start();
	session_start();
	
	$timezone = date_default_timezone_set("America/Chicago");

	$con = mysqli_connect("localhost", "root", "", "retrofide");

	if(mysqli_connect_errno()) {
		echo "Failed to Connect" . mysql_connect_errno();
	}


?>