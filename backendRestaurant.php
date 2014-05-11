<?php
	
	// session_start();
	// session_destroy();
	// header("Location: login.php");

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just in time | Backend</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body >

	<div class="container">
		<header class="row">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand logoW"><img src="images/logoW.png" alt="logo"></a>
				</div>
				<div class="navbar-collapse collapse" i>
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Restaurant beheer</a></li>
						<li><a href="#">Tafel beheer</a></li>
						<li><a href="#">Menu beheer</a></li>
						<li><a href="#">Reservaties</a></li>
					</ul>	
					<h4>Welcom</h4>
					<a href="#"><img src="images/logout.png" alt="logout" class="navbar-form pull-right logout" ></a>
				</div>
			</nav>
		</header>
	
		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>

