<?php
	$currentPage = $_SERVER['SCRIPT_NAME'];
	$url = explode("/", $currentPage);
	$page = end($url);
?>

<nav class="navbar navbar-inverse" role="navigation">
	
	<div class="container container-fluid">
		<div class="navbar-header">	
      		<a href="dashboard.php" class="navbar-brand logoW"><img src="images/logoW.png" alt="logo"></a>
    	</div>
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      	<ul class="nav navbar-nav">
<<<<<<< HEAD
	      		<li <?php if($page == "restaurants.php"){echo 'class="active"';}?>><a href="restaurants.php">Restaurant</a></li>
	        	<li <?php if($page == "menu.php"){echo 'class="active"';}?>><a href="menu.php">Menu</a></li>
	        	<li <?php if($page == "tafels.php"){echo 'class="active"';}?>><a href="tafels.php">Table</a></li>
=======
	      		<li <?php if($page == "mijnrestaurant.php"){echo 'class="active"';}?>><a href="mijnrestaurant.php">Restaurant</a></li>
	        	<li <?php if($page == "menu.php"){echo 'class="active"';}?>><a href="menu.php">Menu</a></li>
	        	<li <?php if($page == "#"){echo 'class="active"';}?>><a href="#">Table</a></li>
>>>>>>> master
	        </ul>

		    <ul class="nav navbar-nav navbar-right">

		        <li><a href="logout.php">Log out <?php echo $_SESSION['email']; ?></a></li>
		    </ul>
	    </div>
  </div>
</nav>
