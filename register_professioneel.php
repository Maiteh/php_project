<?php
	
	if (!empty($_POST)) 
	{
		include_once("classes/User.class.php");

		try 
		{
			$user = new User();
			$user->Username = $_POST['username']; 
			$user->Email = $_POST['email'];	
			$user->Password = $_POST['password'];	
			
			$user->Register();	
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
	
		<section class="formRegister col-md-4 col-md-offset-4">
			<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<h3 id="titleRegister">Register</h3>
				<a href="register.php"> Particulier </a> | <a href="#"> Professioneel</a>
				
		
					<?php 
						if(isset($error))
						{
							echo "<p class='error'>$error</p>";
						}
					?>
				<input id="iconUsername" type="text" value="Username" name="username">
				<input id="iconEmail" type="text" value="Email" name="email">
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
