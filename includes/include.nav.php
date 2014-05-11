<?php
	$currentPage = $_SERVER['SCRIPT_NAME'];
	$url = explode("/", $currentPage);
	$page = end($url);
?>

<nav class="navbar navbar-default" role="navigation">
	
	<div class="container container-fluid">
		<div class="navbar-header">	
      		<a class="navbar-brand" href="#">Just In Time</a>
    	</div>
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      	<ul class="nav navbar-nav">
	      		<li <?php if($page == "restaurant.php"){echo 'class="active"';}?>><a href="#">Restaurant</a></li>
	        	<li <?php if($page == "menu.php"){echo 'class="active"';}?>><a href="menu.php">Menu</a></li>
	        </ul>

		    <ul class="nav navbar-nav navbar-right">
		        <li><a href="logout.phpp">Log out</a></li>
		    </ul>
	    </div>
  </div>
</nav>
