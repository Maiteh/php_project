<?php
	// code in dit document altijd beperkt houden door klasses
	include_once("classes/Tafels.class.php");
	$t = new Table();
	$allTables = $t->AllTables();
	if(!empty($_POST))
	{
			$t->Number=$_POST['number'];
			$t->Person=$_POST['person'];
			$t->Occupation=$_POST['occupation'];
			

			if(isset($t->error) && !empty($t->error)){

				if(isset($t->error['errorNumber']))
				{
					$er_number = $t->error['errorNumber'];
				}

				if(isset($t->error['errorPerson']))
				{
					$er_person = $t->error['errorPerson'];					
				}

				if(isset($t->error['errorOccupation']))
				{
					$er_occupation = $t->error['errorOccupation'];
				}

			}
			else
			{
					$t->AddTable();	
					//header("Location: index.php");
			}
	}		
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Just in time | Tables</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body >

	<div class="container">
		<header class="row headerLogo">
			<img class="img-responsive col-xs-12" src="images/logo.png" alt="">
		</header>
	
		<section class="formRegister col-md-4 col-md-offset-4">
			<form  action="" method="post">
				<h3 id="titleRegister">Register</h3>

				<p class="error"><?php if (isset($er_number)) { echo $er_number; echo "hallo test122";}?></p>
				<input id="iconUsername" type="text" name="number" placeholder="number"  value="<?php if(isset($_POST['number'])){ echo $_POST['number'];} ?>">

				<p class="error"><?php if (isset($er_person)) { echo $er_person;} ?></p>
				<input id="iconUsername" type="text" name="person"  placeholder="How many persons fit this table ?"  value="<?php if(isset($_POST['person'])){ echo $_POST['person']; } ?>">

				<p class="error"><?php if (isset($er_occupation)) { echo $er_occupation;} ?></p>
				<input id="iconUsername" type="text" name="occupation" placeholder="How long should this table be occupied ? in minutes !"  value="<?php if(isset($_POST['occupation'])){ echo $_POST['occupation']; } ?>">


				<input type="submit" value="Submit">
			</form>
		</section>

		<section class="formRegister col-md-4 col-md-offset-4">
		<table>
			<thead>
				<tr>
					<th>Table number</th>
					<th>Amount of persons</th>
					<th>Occupation time for reservation</th>
				</tr>
			</thead>
			<tbody>
				<?php  

                        if (isset($_POST)) 
                        {
                            $res = $t->AllTables();
                            while($t = $res->fetch_assoc())
                            {
                            echo "<tr><td>" .$t['Tafel_Nummering'] . "</td>";
                            echo "<td>" .$t['Tafel_AantalPersonen'] . " Persons </td>";
                            echo "<td>" .$t['Tafel_BezetTijd'] . " </td></tr>";
                            }
                          }
                          ?> 
             </tbody>
         </table>

		
	</section>

		<?php include("includes/include.footer.php"); ?>
		
	</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
	
</body>
<html>