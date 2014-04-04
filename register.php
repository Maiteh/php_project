<?php 

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Just in time | Register</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="css/bootstrap-min.css">   -->
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/media_queries.css">
	<link rel="stylesheet" href="css/custom.css">
	<!-- <script src="js/respond.js"></script> -->

   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	
	<div class="container">
		<!-- row 1 -->
		<header class="row">
			<div class="col-lg-12">
				<img id="logo" class="img-responsive" src="images/logo.png" alt="logo">
			</div>
		</header>
		<!-- end row 1 -->

		<!-- row 2 -->
			<section class="row">
				<form action="" method="post" id="frameRegister" class="col-lg-12">
					<input id="iconUsername" type="text" value="Username" name="username" >
					<input id="iconEmail" type="text" value="Email" name="email" >
					<input id="iconPassword" type="password" value="Password" name="password" >

				</form>
			</section>
		<!-- end row 2 -->


		<?php include("include_footer.php");?>	

	</div><!-- end container -->

<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- end javascript -->

</body>
</html>