<?php
	session_start();
	if ($_SESSION['admin'] == "yes" && $_SESSION['loggedin'] == true) {
		
		include_once('classes/Restaurant.class.php');
		$r = new Restaurant();
		include_once('classes/Menu.class.php');
		$m = new Menu();

		if (!empty($_GET['resto_id'])) {
			$restoId = $_GET['resto_id'];
			$m->RestaurantId = $restoId;
		}

		if (!empty($_POST['submitDish'])) {
			try {
				// Save menu
				$m->Menu = $_POST['menu'];
				$m->Starter = $_POST['starter'];
				$m->Main = $_POST['main'];
				$m->Dessert = $_POST['dessert'];
				$m->Price = floatval($_POST['price']);
				$m->RestaurantId = $restoId;
				$m->Save();
				$feedback = "Your menu was saved!";

			} catch (Exception $e) {
				$error = $e->getMessage();
			}
		} else if (!empty($_POST['deleteDish'])) {
			try {
				// Delete menu
				$m->RestaurantId = $restoId;
				$m->deleteMenu();
				$feedback = "Your menu was deleted!";

			} catch (Exception $e) {
				$error = $e->getMessage();
			}
		}

	} else {
		header('Location: index.php');
	}
	

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just In Time | Menu</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php include_once('includes/include.nav.php'); ?>
<div class="container">

	<div class="row">
		<h2 class="col-md-3">Your menu's</h2>
		<button class="btn btn-default" type="button" data-toggle="modal" data-target="#addMenu"><span class="glyphicon glyphicon-plus"></span>&nbsp;add</button>
	</div>

	<?php if(isset($error)): ?>
		<div class='bg-danger'><?php echo $error; ?></div>
	<?php elseif(isset($feedback)): ?>
		<div class='bg-success'><?php echo $feedback; ?></div>
	<?php endif; ?>

	<?php 
		$allMenus = $m->getMenus();
		
		if(mysqli_num_rows($allMenus) > 0) { ?>
	<table class="table table-striped">
		<thead>
			<th>Menu</th>
			<th>Starter</th>
			<th>Main</th>
			<th>Dessert</th>
			<th>Price</th>
		</thead>
		<tbody>
	<?php	while($menu = $allMenus->fetch_assoc()) { ?>
				<tr>
					<td><?php echo $menu['menu_name']; ?></td>
					<td><?php echo $menu['menu_starter']; ?></td>
					<td><?php echo $menu['menu_main']; ?></td>
					<td><?php echo $menu['menu_dessert']; ?></td>
					<td>&euro;<?php echo $menu['menu_price']; ?></td>
					<td><a href="#" data-toggle="modal" data-target="#"><span class="glyphicon glyphicon-pencil"></span>&nbsp;edit</a></td>
					<td><a href="#deleteMenu" data-toggle="modal" data-target="#deleteMenu"><span class="glyphicon glyphicon-remove"></span>&nbsp;delete</a></td>
				</tr>
					
	<?php 	} ?>
		</tbody>
	</table>
	<?php	} else {
			echo "<p>No menu's saved</p>";	
		}
	?>
	
	<div class="modal fade" id="deleteMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
     			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Delete menu</h4>
      			</div>
      			<div class="modal-body">
      				<p>
      					Are you sure you want to delete this menu?
      				</p>

      				<form role="form" method="post">
      					<input type="hidden" name="id" value="<?php echo $restoId; ?>">
      			</div>
      			<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    	<input type="submit" name="deleteDish" class="btn btn-primary" value="Delete menu" />
		    	</div>
		    	</form>
    		</div>
		</div>
	</div>

	<div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
     			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Add a menu</h4>
      			</div>
      			<div class="modal-body">

					<form class="form-horizontal" role="form" method="post">

						<div class="form-group">
					  		<label for="menu" class="col-sm-2 control-label">Menu name</label>
					  		<div class="col-sm-8">
								<input type="text" class="form-control" id="menu" name="menu">		 	
							</div>
					  	</div>

						<div class="form-group">
					  		<label for="starter" class="col-sm-2 control-label">Starter</label>
					  		<div class="col-sm-8">
								<input type="text" class="form-control" id="starter" name="starter">		 	
							</div>
					  	</div>

					  	<div class="form-group">
						    <label for="main" class="col-sm-2 control-label">Main</label>
						    <div class="col-sm-8">
					      		<input type="text" class="form-control" id="main" name="main">
					    	</div>
					  	</div>

					  	<div class="form-group">
						    <label for="dessert" class="col-sm-2 control-label">Dessert</label>
						    <div class="col-sm-8">
					      		<input type="text" class="form-control" id="dessert" name="dessert">
					    	</div>
					  	</div>

					  	<div class="form-group">
						   	<label for="price" class="col-sm-2 control-label">Price</label>
						    <div class="col-sm-8">
						      	<input type="text" class="form-control" id="price" name="price" placeholder="3.50">
						    </div>
					  	</div>

					
				</div>
				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    	<input type="submit" name="submitDish" class="btn btn-primary" value="Add menu" />
		    	</div>
		    	</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
     			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">Add a menu</h4>
      			</div>
      			<div class="modal-body">

					<form class="form-horizontal" role="form" method="post">

						<div class="form-group">
					  		<label for="menu" class="col-sm-2 control-label">Menu name</label>
					  		<div class="col-sm-8">
								<input type="text" class="form-control" id="menu" name="menu">		 	
							</div>
					  	</div>

						<div class="form-group">
					  		<label for="starter" class="col-sm-2 control-label">Starter</label>
					  		<div class="col-sm-8">
								<input type="text" class="form-control" id="starter" name="starter">		 	
							</div>
					  	</div>

					  	<div class="form-group">
						    <label for="main" class="col-sm-2 control-label">Main</label>
						    <div class="col-sm-8">
					      		<input type="text" class="form-control" id="main" name="main">
					    	</div>
					  	</div>

					  	<div class="form-group">
						    <label for="dessert" class="col-sm-2 control-label">Dessert</label>
						    <div class="col-sm-8">
					      		<input type="text" class="form-control" id="dessert" name="dessert">
					    	</div>
					  	</div>

					  	<div class="form-group">
						   	<label for="price" class="col-sm-2 control-label">Price</label>
						    <div class="col-sm-8">
						      	<input type="text" class="form-control" id="price" name="price" placeholder="3.50">
						    </div>
					  	</div>

					
				</div>
				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    	<input type="submit" name="submitDish" class="btn btn-primary" value="Add menu" />
		    	</div>
		    	</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>