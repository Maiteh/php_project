<?php

	if (!empty($_POST['btnLogin'])) 
	{
		try
		{
			include_once ("classes/User.class.php");
			$u = new User();
			$u->Email=$_POST['email'];
			$u->Password=$_POST['password'];

			if ($u->canLogin() == "yes") {
				// admin gebruiker
				session_start();

				$row = $u->getId();
				$id = $row['Klant_ID'];

				$_SESSION['email'] = $u->Email;
				$_SESSION['admin'] = "yes";
				$_SESSION['loggedin'] = true;
				$_SESSION['id'] = $id;
<<<<<<< HEAD

=======
		
>>>>>>> origin/master
				header("Location: mijnrestaurant.php");

			} elseif ($u->canLogin() == "no") {
				// geen admin (klant)
				session_start();
				$_SESSION['email'] = $u->Email;
<<<<<<< HEAD
				//$_SESSION['admin'] = "no";
				//$_SESSION['loggedin'] = true;
=======
				$_SESSION['admin'] = "no";
				$_SESSION['loggedin'] = true;
>>>>>>> origin/master

				header("Location: mijnrestaurant.php");
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
</div>
</body>
<html>
