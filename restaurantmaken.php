<?php

	include_once("classes/Restaurant.class.php");

if (!empty($_POST)) 
{
	try 
	{
		$restaurant = new Restaurant();
		$restaurant->Naam = $_POST['restaurantnaam'];
		$restaurant->VoorNaam = $_POST['restaurantvoornaam'];
		$restaurant->Adres = $_POST['adres'];
		$restaurant->Postcode = $_POST['postcode'];
		$restaurant->Gemeente = $_POST['gemeente'];
		$restaurant->Website = $_POST['website'];
		$restaurant->Email = $_POST['email'];
		$restaurant->TelNummer = $_POST['telefoonnummer'];
		$restaurant->GsmNummer = $_POST['gsmnummer'];
		$restaurant->Save();
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
	<title>Just in time | Backend</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<body >
<div class="container modal-header">
	<h2>Restaurant toevoegen</h2>
	<a href="mijnrestaurant.php">Mijn restaurants</a>
</div>
<div class="invisible">...</div>

<div class="col-md-8">

	<?php if (isset($error)) 
		{
			echo "<div id='feedback' class='waring'>$error</div>"; 
		}   
	?>
	

	<form class="form-horizontal" role="form" action="" method="post">
			
		<div class="form-group">
			<label  class="col-sm-2 control-label" for="restaurantnaam">Naam</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="restaurantnaam" id="restaurantnaam" placeholder="Naam">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label"  for="restaurantvoornaam">Voornaam</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="restaurantvoornaam" id="restaurantvoornaam" placeholder="Voornaam">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="adres">Adres</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="adres" id="adres" placeholder="Adres">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="postcode">Postcode</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="postcode" id="postcode" placeholder="Postcode">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="gemeente">Gemeente</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="gemeente" id="gemeente" placeholder="Gemeente">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="website">Website</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="website" id="website" placeholder="Website">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="email">Email</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email" id="email" placeholder="Email">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="email">telefoonnummer</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="telefoonnummer" id="telefoonnummer" placeholder="Telefoon nummer">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="email">gsm nummer</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="gsmnummer" id="gsmnummer" placeholder="GSM nummer">
			</div>
		</div>

		<label class="col-sm-2 control-label" for="passwoord"></label>
		<p><input class="btn btn-lg btn-primary" type="submit" name="submit" id="submit"></p>

	</form>

</div>

	
		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>

