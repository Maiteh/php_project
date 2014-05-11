<?php
	session_start();

	include_once('classes/Menu.class.php');

	if (!empty($_POST['submitDish'])) {
		try {

			$m = new Menu();
			$m->Type = $_POST['type'];
			$m->Name = $_POST['name'];
			$m->Price = $_POST['price'];
			$m->Save();
			$feedback = "Your dish was saved!";

		} catch (Exception $e) {
			$error = $e->getMessage();
		}
		
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php include_once('includes/include.nav.php'); ?>
<div class="container">
	<h1>Menu</h1>
	<p>Select your restaurant</p>
	<select>
		
	</select>
	<h2>Add dish</h2>
	<?php if(isset($error)): ?>
		<p class='bg-danger'><?php echo $error; ?></p>
	<?php elseif(isset($feedback)): ?>
		<p class='bg-success'><?php echo $feedback; ?></p>
	<?php endif; ?>
	<form class="form-horizontal" role="form" method="post">

		<div class="form-group">
	  		<label for="type" class="col-sm-2 control-label">Type</label>
	  		<div class="col-sm-8">
			  	<select class="form-control" id="type" name="type">
			  		<option value="none" selected>Choose type of dish</option>
				  	<option value="0">Starter</option>
				  	<option value="1">Main</option>
				  	<option value="2">Desert</option>
				</select>
			</div>
	  	</div>

	  	<div class="form-group">
		    <label for="name" class="col-sm-2 control-label">Dish name</label>
		    <div class="col-sm-8">
	      		<input type="text" class="form-control" id="name" name="name">
	    	</div>
	  	</div>

	  	<div class="form-group">
		   	<label for="price" class="col-sm-2 control-label">Price</label>
		    <div class="col-sm-8">
		      	<input type="text" class="form-control" id="price" name="price" placeholder="3,50">
		    </div>
	  	</div>

	  	<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-8">
	      	<input type="submit" name="submitDish" class="btn btn-default" value="Add dish" />
	    	</div>
	  	</div>

	</form>
</div>
</body>
</html>