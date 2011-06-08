<!DOCTYPE html>
<html>
<head>
	<?php require_once('config.php'); ?>
	<title>Interactions</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

</head>
	<body>
	
		
		
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<select name = "when">
						<option selected= ""> </option>
						<option value="breakfast">Breakfast</option>
						<option value="lunch">Lunch</option>
						<option value="dinner">Dinner</option>
						<option value="snacks">Snacks</option>
						</select> 
						<input type="text" name="term" value="" id="search"> 
						
						<input type="submit" name="submit" value="Submit">
						
						
						<div id="results"></div>
				</form>
				
				
					<?php
										$term = $_POST['term'];
										$when = $_POST['when'];

										if(($term != "") &&
										 	($when != "")) {
												$foods = mysql_query("SELECT * FROM foods WHERE food_name  LIKE '%$term%' ") or die(mysql_error());
												while($food = mysql_fetch_array($foods)) {

														$name = $food['food_name'];
														$foodid = $food['food_ID'];

														echo "<div class='results'><a href='http://localhost:8888/food/interact.php?add=$name'>" . $name . "</a></div>";
													}

										} else {


												echo "Please Fill The Fields Left to Right";
												echo "<br/>";

									}


					?>
				
				
				
				
				<?php 
				   	if(isset($_GET['add'])) {
					
					$when = $_POST['when'];
					
					$add = $_GET['add'];
					$query =  mysql_query("SELECT * FROM foods WHERE food_name='$add'") or die(mysql_error()); 
					$row = mysql_fetch_array( $query );
					$query =  mysql_query("INSERT INTO breakfast (food_name,food_serving,food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars) VALUES('$add','$serving','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]') ") or die(mysql_error());
				
			}
				 ?>
				
				
			
		
	</body>
</html>