<?php

session_start();

include_once("classes/Reservatie.class.php");

if (!empty($_POST)) 
{
	try 
	{
		$reservatie = new Reservatie();
		$reservatie->Datum = $_POST['datum'];
		$reservatie->Personen = $_POST['personen'];
		$reservatie->Tijd = $_POST['uur'];
		$reservatie->Naam = $_POST['naam'];
		$reservatie->Telefoon = $_POST['telefoon'];
		$reservatie->Email = $_POST['email'];
		//$reservatie->Datum = $_POST['datumveld'];
		$reservatie->Save();
	} 

	catch (Exception $e) 
	{
		$error = $e->getMessage();
	}
}

?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Reservatie maken</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <script>
  $(function() 
  {
    $( "#datepicker" ).datepicker();
	    //$( "#datepicker" ).datepicker
	    //({
	  	//	beforeShowDay: $.datepicker.noWeekends
		//});
  })

  function datum()
  {
  	alert("test")
  	var selected = $( "#datepicker" ).datepicker( "option", "currentText" );
    var datum = $.datepicker.parseDate( "yy-mm-dd", "2007-01-26" );
    //http://api.jqueryui.com/datepicker/#option-currentText
    document.getElementById("datumveld").value=datum;
  }
  </script>

<!-- http://jqueryui.com/datepicker/#inline -->

</head>

<body>
<?php include_once('includes/include.nav.php'); ?>
<div class="container">
	<h1>Maak een reservatie</h1>
	<div class="invisible">...</div>
	<h4>Vul het formulier in om een reservatie te plaatsen</h4>
</div>
<div class="invisible">...</div>
<div class="invisible">...</div>
<div class="invisible">...</div>

<div class="container">

	<div class="col-md-4">
		<h4>Kies een datum</h4>
		<div id="datepicker"></div>
	</div>

	<div class="col-md-8">
		<h3>Reservatie informatie</h3>

		<form class="form-horizontal" role="form" action="" method="pos">
		<input type="text" name="datum" id="datumveld" class="invisible">

			<div class="form-group">
				<label  class="col-sm-2 control-label" for="restaurantnaam">Aantal mensen</label>
				<div class="col-sm-4">
					<select class="form-control" name="personen">
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					  <option>6</option>
					</select>
				</div>

				<label  class="col-sm-2 control-label" for="uur">Uur</label>
				<div class="col-sm-4">
					<select class="form-control" name="uur">
					  <option>16.00u</option>
					  <option>16.30u</option>
					  <option>17.00u</option>
					  <option>17.30u</option>
					  <option>18.00u</option>
					  <option>18.30u</option>
					  <option>19.00u</option>
					  <option>19.30u</option>
					  <option>20.00u</option>
					  <option>20.30u</option>
					  <option>21.00u</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label  class="col-sm-2 control-label" for="naam">Naam</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="naam" id="naam" placeholder="Naam">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label"  for="telefoon">Tel nr.</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="telefoon" id="telefoon" placeholder="">
				</div>

				<label class="col-sm-2 control-label"  for="email">E-mail</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="email" id="email" placeholder="uwemail@mail.com">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label"  for="datum"></label>
				<div class="col-sm-4">
					<button type="submit" class="btn btn-primary" onClick="datum()">Plaats Reservatie</button></div>
				</div>
			</div>

		</form>

	</div>

</div>

 
 
</body>
</html>