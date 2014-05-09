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
		<h2>Mijn Restaurant</h2>
	</div>

	<div class="container">
	
	<?php

		$restaurant = new Restaurant();
		$all = $restaurant->getAll();

		var_dump($all);

		foreach($all->fetch_assoc() as $rest) 
		{
			echo $rest;
		}

	?>

	</div>

</body>

</html>