<?php

	include_once("classes/Reservatie.class.php");
	
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
		<h2>Reservaties</h2>
		<a href="mijnrestaurant.php">Mijn restaurants</a>
	</div>

	<div class="container">

<table class="table table-striped">
		<thead>
			<th>Datum</th>
			<th>Personen</th>
			<th>Uur</th>
			<th>Naam</th>
			<th>Tel nr.</th>
			<th>E-mail</th>
		</thead>
	<tbody>

	<?php

		$reservaties = new Reservatie();
		$all = $reservaties->getAll();

		while ($r = $all->fetch_assoc()) 
		{
						?>
				<tr>
					<td><?php echo $r['Reservatie_Datum']; ?></td>
					<td><?php echo $r['Reservatie_Personen']; ?></td>
					<td><?php echo $r['Reservatie_Uur']; ?></td>
					<td><?php echo $r['Reservatie_Naam']; ?></td>
					<td><?php echo $r['Reservatie_Telnr']; ?></td>
					<td><?php echo $r['Reservatie_Email']; ?></td>
					<td><a href="" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;edit</a></td>
					<td><a href="" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-remove"></span>&nbsp;delete</a></td>
				</tr>
			<?php
		}

	?>

	</div>

</body>

</html>