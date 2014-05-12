<?php
	
	session_start();

	if ($_SESSION['admin'] == "yes" && $_SESSION['loggedin'] == true) {

	} else {
		header('Location: index.php');
	}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just in time | Backend</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body >

		<?php include("includes/include.nav.php"); ?>
	
		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>

