<?php

include("includes/config.php");
include("includes/classes/Console.php");
include("includes/classes/Publisher.php");
include("includes/classes/Game.php");
include("includes/classes/Song.php");
include("includes/classes/Artist.php");


// session_destroy();

	if(isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
		echo "<script>userLoggedIn = '$userLoggedIn';</script>";
	} else {
		header("Location: register.php");
	}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Welcome to Retrofide!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="assets/js/sweetalert2.js"></script>

</head>
<body>

	<div id="backgroundContainer">

	<div id="mainContainer">

		<div id="topContainer">
			
			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">
				
				<div id="mainContent">