<<<<<<< HEAD
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

=======
<?php 

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Just in time | Register</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="css/bootstrap-min.css">   -->
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/media_queries.css">
	<link rel="stylesheet" href="css/custom.css">
	<!-- <script src="js/respond.js"></script> -->

   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	
	<div class="container">
		<!-- row 1 -->
		<header class="row">
			<div class="col-lg-12">
				<img id="logo" class="img-responsive" src="images/logo.png" alt="logo">
			</div>
		</header>
		<!-- end row 1 -->

		<!-- row 2 -->
			<section class="row">
				<form action="" method="post" id="frameRegister" class="col-lg-12">
					<input id="iconUsername" type="text" value="Username" name="username" >
					<input id="iconEmail" type="text" value="Email" name="email" >
					<input id="iconPassword" type="password" value="Password" name="password" >

				</form>
			</section>
		<!-- end row 2 -->


		<?php include("includes/include.footer.php");?>	

	</div><!-- end container -->

<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- end javascript -->

</body>
</html>
>>>>>>> FETCH_HEAD
