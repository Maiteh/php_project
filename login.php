<?php

	if (!empty($_POST['btnLogin'])) 
	{
		try
		{
			include_once ("classes/User.class.php");
			$u = new User();
			$u->Email=$_POST['email'];
			$u->Password=$_POST['password'];

			//var_dump($user);

			$u->canLogin();
			if ($u->canLogin() == "yes") {
				//echo "admin check gelukt";
				session_start();
				$_SESSION['email'] = $u->Email;
				$_SESSION['admin'] = "yes";
				$_SESSION['loggedin'] = true;
		
				header("Location: menu.php");

			} elseif ($u->canLogin() == "no") {
				session_start();
				$_SESSION['email'] = $u->Email;
				$_SESSION['admin'] = "no";
				$_SESSION['loggedin'] = true;

				header("Location: index.php");
			}

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
	<title>Just in time | Login</title>
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

				<?php 
					if(isset($error))
					{
						echo "<p class='error'>$error</p>";
					}
				?>

				<h3 id="titleRegister">Login</h3>

				<input id="iconUsername" type="text" name="email" placeholder="E-mail">
				<input id="iconPassword" type="password" name="password" placeholder="Password">
				<input type="submit" value="Login" name="btnLogin">
			</form>
			<a href="register.php">Not registered yet?</a>
		</section>
	
		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/fb_login.js"></script>
</div>
</body>
<html>
