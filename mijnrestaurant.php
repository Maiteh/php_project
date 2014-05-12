<?php

	include_once("classes/Restaurant.class.php");
	include_once("classes/Feedback.class.php");

	session_start();

	if ($_SESSION['admin'] == "yes" && $_SESSION['loggedin'] == true) 
	{ } else 
    {
		header('Location: index.php');
	}

	if (!empty($_POST['feedback'])) 
	{
		try 
		{
			$feedback = new Feedback();
			$feedback->Comment = $_POST['feedback'];
			$feedback->Save();

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
	<title>Just in time | Mijn Restaurant</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body >

	<?php include_once('includes/include.nav.php'); ?>

	<div class="container">
		<h2>Mijn Restaurants</h2>
	</div>

<div class="container">

<<<<<<< HEAD
<table class="table table-striped">
		<thead>
			<th>Naam</th>
			<th>Voornaam</th>
			<th>Adres</th>
			<th>Gemeente</th>
			<th>Phone</th>
		</thead>
	<tbody>
=======
	<a href="restaurantmaken.php">Restaurant toevoegen</a>
>>>>>>> Robbert

	<table class="table table-striped">
			<thead>
				<th>Naam</th>
				<th>Voornaam</th>
				<th>Adres</th>
				<th>Gemeente</th>
				<th>Tel nr.</th>
			</thead>
		<tbody>

		<?php

			$restaurant = new Restaurant();
			$all = $restaurant->getAll($_SESSION['id']);

			while ($r = $all->fetch_assoc()) 
			{
				?>
					<tr>
						<td><a href="mijnreservaties.php"><?php echo $r['Restaurant_Naam']; ?></td>
						<td><?php echo $r['Restaurant_Adres']; ?></td>
						<td><?php echo $r['Restaurant_Postcode']; ?></td>
						<td><?php echo $r['Restaurant_Gemeente']; ?></td>
						<td><?php echo $r['Restaurant_Telefoonnr']; ?></td>
						<td><a href="" data-toggle="modal" data-target="#editModal">&nbsp;Menu</a></td>
						<td><a href="" data-toggle="modal" data-target="#deleteModal">&nbsp;Tafels</a></td>
						<td><a href="" data-toggle="modal" data-target="#feedbackmaken">&nbsp;Feedback</a></td>
					</tr>
				<?php
			}
	?>

</div>

	<div class="modal fade" id="feedbackmaken" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">

	      <form class="form-horizontal" role="form" action="" method="post">
			
			<div class="invisible">...</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input class="form-control" type="text" name="feedback" id="feedback" placeholder="Geef uw feedback hier">
					</div>
			<div class="invisible">...</div>
			<div class="invisible">...</div>

			<button type="submit" class="btn btn-primary">Plaats Feedback</button>
		  </form>

		</div>
	    </div>
	  </div>
	</div>

</body>

</html>