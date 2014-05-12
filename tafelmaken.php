<?php
	// code in dit document altijd beperkt houden door klasses
	session_start();

	if ($_SESSION['admin'] == "yes" && $_SESSION['loggedin'] == true) {
		include_once("classes/Tafels.class.php");
		$t = new Table();
	} else {
		header('Location: index.php');
	}
	if(!empty($_POST))
	{
			$t->Number=$_POST['number'];
			$t->Person=$_POST['person'];
			$t->Occupation=$_POST['occupation'];
			

			if(isset($t->error) && !empty($t->error)){

				if(isset($t->error['errorNumber']))
				{
					$er_number = $t->error['errorNumber'];
				}

				if(isset($t->error['errorPerson']))
				{
					$er_person = $t->error['errorPerson'];					
				}

				if(isset($t->error['errorOccupation']))
				{
					$er_occupation = $t->error['errorOccupation'];
				}

			}
			else
			{
					$t->AddTable();	
					//header("Location: index.php");
			}
	}		
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just in time | Mijn Restaurant</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body >

	<?php include_once('includes/include.nav.php'); ?>

	<div class="container">
		<h2>Mijn Tafels</h2>
	</div>

	<div class="container">
	
		<section class="col-md-6 col-md-offset-6">
			<form  action="" method="post">

				<p class="error"><?php if (isset($er_number)) { echo $er_number; echo "hallo test122";}?></p>
				<input class="tafel" type="text" name="number" placeholder="number"  value="<?php if(isset($_POST['number'])){ echo $_POST['number'];} ?>">

				<p class="error"><?php if (isset($er_person)) { echo $er_person;} ?></p>
				<input class="tafel" type="text" name="person"  placeholder="How many persons fit this table ?"  value="<?php if(isset($_POST['person'])){ echo $_POST['person']; } ?>">

				<p class="error"><?php if (isset($er_occupation)) { echo $er_occupation;} ?></p>
				<input class="tafel" type="text" name="occupation" placeholder="How long should this table be occupied ? in minutes !"  value="<?php if(isset($_POST['occupation'])){ echo $_POST['occupation']; } ?>">


				<input type="submit" value="Submit">
			</form>
		</section>

		

		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>