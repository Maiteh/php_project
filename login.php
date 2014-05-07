<?php

	session_start();
	$_SESSION['loggedin'] = FALSE;	

	if (!empty($_POST['btnLogin'])) 
	{
		try
		{
			include 'classes/User.class.php';
			$u = new User();
			$u->Email = $_POST['email'];
			$u->Password = $_POST['password'];
			$u->canLoginKlant();			
		} 
		catch (Exception $e) 
		{
			$error = $e->getMessage();
		}
	}
	
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

				<?php 
					if(isset($error))
					{
						echo "<p class='error'>$error</p>";
					}

					echo "<p class='error'>$feedback</p>";
				?>

				<input id="iconEmail" type="text" value="Email" name="email" onfocus="if(this.value == 'Email') { this.value = ''; }">
				<input id="iconPassword" type="password" value="Password" name="password" onfocus="if(this.value == 'Password') { this.value = ''; }">
				<input type="submit" value="Login" value="btnLogin">
			</form>
		</section>
	
		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>

=