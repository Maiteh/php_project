<?php

	session_start();
	$_SESSION['loggedin'] = FALSE;	

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
			$u->RedirectPage();
			

			//header("Location: index.php");

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

				<?php 
					if(isset($error))
					{
						echo "<p class='error'>$error</p>";
					}
				?>

				<h3 id="titleRegister">Login</h3>

				<input id="iconUsername" type="text" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } else { echo "E-mail"; } ?>" name="email" onfocus="if(this.value == 'E-mail') { this.value = ''; }">
				<input id="iconPassword" type="password" value="Password" name="password" onfocus="if(this.value == 'Password') { this.value = ''; }">
				<input type="submit" value="Submit" name="btnLogin">
			</form>
		</section>
	
		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>
