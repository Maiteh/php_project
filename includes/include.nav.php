<?php
	$currentPage = $_SERVER['SCRIPT_NAME'];
	$url = explode("/", $currentPage);
	$page = end($url);
?>

<nav class="navbar navbar-inverse" role="navigation">
	
	<div class="container container-fluid">
		<div class="navbar-header">	
      		<a href="restaurants.php" class="navbar-brand logoW"><img src="images/logoW.png" alt="logo"></a>
    	</div>
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      	<ul class="nav navbar-nav">
	      		<li <?php if($page == "restaurants.php"){echo 'class="active"';}?>><a href="restaurants.php">Restaurants</a></li>
	        </ul>

		    <ul class="nav navbar-nav navbar-right">

		        <li><a href="logout.php">Log out <?php echo $_SESSION['email']; ?></a></li>
		    </ul>
	    </div>
  </div>
</nav>
