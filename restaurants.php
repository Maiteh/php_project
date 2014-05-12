<?php

	session_start();

	if ($_SESSION['admin'] == "yes" && $_SESSION['loggedin'] == true) {
		include_once("classes/Restaurant.class.php");

		if (!empty($_POST)) {
			try {
				$restaurant = new Restaurant();
				$restaurant->Name = $_POST['restoname'];
				$restaurant->Address = $_POST['address'];
				$restaurant->Zip = $_POST['zip'];
				$restaurant->City = $_POST['city'];
				$restaurant->Email = $_POST['email'];
				$restaurant->Phone = $_POST['phone'];
				$restaurant->UserId = $_SESSION['id'];
				$restaurant->Save();

			} catch (Exception $e) {
				$error = $e->getMessage();
			}
		}
	} else {
		header('Location: index.php');
	}
	
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just in time | Restaurants</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body >

<?php include_once('includes/include.nav.php'); ?>

<div class="container">
	<div class="row">
		<h2 class="col-md-3">My Restaurants</h2>
		<button class="btn btn-default" type="button" data-toggle="modal" data-target="#addResto"><span class="glyphicon glyphicon-plus"></span>&nbsp;add</button>
	</div>

	<table class="table table-striped">
		<thead>
			<th>Name</th>
			<th>Address</th>
			<th>Zip</th>
			<th>City</th>
			<th>Email</th>
			<th>Phone</th>
		</thead>
		<tbody>

		<?php

			$restaurant = new Restaurant();
			$all = $restaurant->getAll($_SESSION['id']);

			while ($r = $all->fetch_assoc()) { ?>
				<tr>
					<td><a href="mijnreservaties.php"><?php echo $r['restaurant_name']; ?></td>
					<td><?php echo $r['restaurant_address']; ?></td>
					<td><?php echo $r['restaurant_zip']; ?></td>
					<td><?php echo $r['restaurant_city']; ?></td>
					<td><?php echo $r['restaurant_email']; ?></td>
					<td><?php echo $r['restaurant_phone']; ?></td>
					<td><a href="" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;edit</a></td>
					<td><a href="" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-remove"></span>&nbsp;delete</a></td>
				</tr>
		<?php } ?>

	<div class="modal fade" id="addResto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
     			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Add a Restaurant</h4>
      			</div>
      			<div class="modal-body">

					<form class="form-horizontal" role="form" action="" method="post">
			
						<div class="form-group">
							<label for="restoname">Restaurant name</label>
							<input class="form-control" type="text" name="restoname" id="restaurantnaam" placeholder="My Restaurant">
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input class="form-control" type="text" name="address" id="address" placeholder="Lange Ridderstraat 44">
						</div>

						<div class="form-group">
							<label for="zip">Zip code</label>
							<input class="form-control" type="text" name="zip" id="zip" placeholder="2800">
						</div>

						<div class="form-group">
							<label for="city">City</label>
							<input class="form-control" type="text" name="city" id="city" placeholder="Mechelen">
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="text" name="email" id="email" placeholder="resto@me.com">
						</div>

						<div class="form-group">
							<label for="phone">Phone number</label>
							<input class="form-control" type="text" name="phone" id="phone" placeholder="015 31 64 95">
						</div>
					
				</div>
				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    	<input class="btn btn-primary" type="submit" name="submit" id="submit">
		    	</div>
		    	</form>
			</div>
		</div>
	</div>

</div>
</body>
</html>