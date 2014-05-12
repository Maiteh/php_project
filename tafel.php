<?php

	session_start();

	if ($_SESSION['admin'] == "yes" && $_SESSION['loggedin'] == true) {
		include_once("classes/Tafels.class.php");
		$t = new Table();
	} else {
		header('Location: index.php');
	}
	
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

	<?php include_once('includes/include.nav.php'); ?>

	<div class="container">
		<h2>Mijn Tafels</h2>
	</div>

	<div class="container">

<a href="tafelmaken.php">Tafel toevoegen</a>

<table class="table table-striped">
		<thead>
			<th>Table number</th>
			<th>Table for </th>
			<th>Occupation time of reservation</th>
		</thead>
	<tbody>

	<?php  
                    $res = $t->AllTables();
                    while($t = $res->fetch_assoc())
                    {
                    	echo "<tr><td>" .$t['Tafel_Nummering'] . "</td>";
                    	echo "<td>" .$t['Tafel_AantalPersonen'] . " Persons </td>";
                    	echo "<td>" .$t['Tafel_BezetTijd'] . " </td></tr>";
                    }
                ?> 

	</div>

</body>

</html>