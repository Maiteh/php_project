<?php
	// code in dit document altijd beperkt houden door klasses

	session_start();
	$_SESSION['loggedin'] = FALSE;	
	
	if(!empty($_POST))
	{
	
			include_once("classes/User.class.php");
			$u = new User();
			$u->Email=$_POST['email'];
			$u->Password=$_POST['password'];
			$u->Firstname=$_POST['firstname'];
			$u->Lastname=$_POST['lastname'];
			$u->Phone=$_POST['phone'];
			$u->Admin= "";
			//$u->UsernameAvailable();
			if(isset($u->error) && !empty($u->error)){

				if(isset($u->error['errorEmail']))
				{
					$er_email = $u->error['errorEmail'];
				}

				if(isset($u->error['errorPassword']))
				{
					$er_password = $u->error['errorPassword'];					
				}

				if(isset($u->error['errorFirstname']))
				{
					$er_firstname = $u->error['errorFirstname'];
				}

				if(isset($u->error['errorLastname']))
				{
					$er_lastname = $u->error['errorLastname'];
				}

				if(isset($u->error['errorPhone']))
				{
					$er_phone = $u->error['errorPhone'];
				}
			}
			else
			{
				if(!empty($_POST['admin']))
				{
					$u->Admin = $_POST['admin'];
				}
				$u->Register();	
				if(isset($u->error['errorAvailable']))
					{
						$er_available = $u->error['errorAvailable'];
					}else{
						session_start();
					$_SESSION['email'] = $u->Email;
					//$_SESSION['loggedin'] = true;
					//header("Location: login.php");
					}
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
			<form  action="" method="post">
				<h3 id="titleRegister">Register</h3>

				<input id="iconEmail" type="text" name="email" value="Email" onfocus="if(this.value == 'Email') { this.value = ''; }">
				<input id="iconPassword" type="password" name="password" value="Password" onfocus="if(this.value == 'Password') { this.value = ''; }">
				<input id="iconUsername" type="text" name="firstname" value="Firstname" onfocus="if(this.value == 'Firstname') { this.value = ''; }">
				<input id="iconUsername" type="text" name="lastname" value="Lastname" onfocus="if(this.value == 'Lastname') { this.value = ''; }">
				<input id="iconPhone" type="text" name="phone" value="Phone nr." onfocus="if(this.value == 'Phone nr.') { this.value = ''; }">
				<input id="checkbox" type="checkbox" name="admin">restaurant owner</input>
				<input type="submit" value="Register" name="btnRegister">
			</form>
		</section>
	
		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>
