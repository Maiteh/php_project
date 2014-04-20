<?php
	
	include_once("classes/User.class.php");

	session_start();
	$_SESSION['email'] = $user->Email;
	header("Location: backendRestaurant.php");
	
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just in time | Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body >

	<div class="container">
		<header class="row headerLogo">
			<img class="img-responsive col-xs-12" src="images/logo.png" alt="">
		</header>
	
		<section class="formLogin col-md-4 col-md-offset-4">
			<form  action="" method="post">
				<h3 id="titleRegister">Login</h3>
				<input id="iconUsername" type="text" value="Username" name="username">
				<input id="iconPassword" type="password" value="Password" name="password">
				<input type="submit" value="Submit">
			</form>
		</section>
	
		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>

