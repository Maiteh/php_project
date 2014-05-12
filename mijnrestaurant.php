<?php

	include_once("classes/Restaurant.class.php");
	
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just in time | Mijn Restaurant</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<body >

	<div class="container">
		<h2>Mijn Restaurants</h2>
	</div>

	<div class="container">

<a href="restaurantmaken.php">Restaurant toevoegen</a>

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
		$all = $restaurant->getAll();

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
					<td><a href="mijnreservaties.php" data-toggle="modal" data-target="#deleteModal">&nbsp;Reservaties</a></td>

				</tr>
			<?php
		}

	?>

	</div>

</body>

</html>