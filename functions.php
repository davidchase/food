<?php /**
 * 
 *
 * @author Dev
 * @version 1.0
 * @copyright Bailey Brand Group, 8 June, 2011
 * @package default
 **/

/**
 * All Functions will go on this page for the app.
 **/
 ?>
<?php require_once('config.php') ?>

<?php

function getFoods(){
		global $term;
		global $when;
		
		$term = $_POST['term'];
		$when = $_POST['when'];

		if(($term != "") &&
		 	($when != "")) {
			 	$foods = mysql_query("SELECT * FROM foods WHERE food_name  LIKE '%$term%' ") or die(mysql_error());
				echo "<table border='1' id='table'>";
				echo "<tr> <th>Name</th> 
						   <th>Calories</th>
						   <th>Carbs</th>
							<th>Fats</th>
							<th>Sodium</th>
							<th>Cholesterol</th>
							<th>Protein</th>
							<th>Sugars</th>
							<th>Add</th></tr>";
							
							while($row = mysql_fetch_array( $foods )) {
								echo "<tr><td>"; 
								echo $row['food_name'];
								echo "</td><td>"; 
								echo $row['food_calories'];
								echo "</td>"; 
								echo "<td>".$row['food_carbs']. "</td>";
								echo "<td>".$row['food_lipid']. "</td>";
								echo "<td>".$row['food_sodium']. "</td>";
								echo "<td>".$row['food_cholesterol']. "</td>";
								echo "<td>".$row['food_protein']. "</td>";
								echo "<td>".$row['food_sugars']. "</td>";
								echo "<td><a href='http://localhost:8888/food/food_cat.php?add=$row[2]'>" . "+" . "</a></td>";
								echo "</tr>";
					
						}		echo "</table>";	
			} else {
				echo "<div class='when'>"."When did you eat?"."</div>";
				echo "<br/>";
				}
		}



/**
 * Add foods to the database
 * 
 * 
 * 
 **/
function addFoods(){
		if (isset($_POST['submit'])) { 
		$serving = 1;
		$fname = empty($_POST['food_name']) ? die ("<div class='error'>"."ERROR: Please Enter a name value"."</div>") : mysql_real_escape_string($_POST['food_name']);
		$calories = !is_numeric($_POST['food_calories']) ? die ("<div class='error'>"."ERROR: Please Enter calorie value"."</div>") : mysql_real_escape_string($_POST['food_calories']);
		$protein = !is_numeric($_POST['food_protein']) ? die ("<div class='error'>"."ERROR: Please Enter protein value"."</div>") : mysql_real_escape_string($_POST['food_protein']);
		$lipids = !is_numeric($_POST['food_lipid']) ? die ("<div class='error'>"."ERROR: Please Enter fat value"."</div>") : mysql_real_escape_string($_POST['food_lipid']);
		$carbs = !is_numeric($_POST['food_carbs']) ? die ("<div class='error'>"."ERROR: Please Enter carb value"."</div>") : mysql_real_escape_string($_POST['food_carbs']);
		$cholesterol = !is_numeric($_POST['food_cholesterol']) ? die ("<div class='error'>"."ERROR: Please Enter cholesterol value"."</div>") : mysql_real_escape_string($_POST['food_cholesterol']);
		$sodium = !is_numeric($_POST['food_sodium']) ? die ("<div class='error'>"."ERROR: Please Enter sodium value"."</div>") : mysql_real_escape_string($_POST['food_sodium']);
		$sugar = !is_numeric($_POST['food_sugars']) ? die ("<div class='error'>"."ERROR: Please Enter sugar value"."</div>") : mysql_real_escape_string($_POST['food_sugars']);
		$type = empty($_POST['food_type']) ? die ("<div class='error'>"."ERROR: Please Enter a food type"."</div>") : mysql_real_escape_string($_POST['food_type']);


		$results = mysql_query("INSERT INTO foods (food_name, food_serving, food_calories, food_protein, food_lipid, food_carbs,food_cholesterol,food_sodium,food_sugars,food_type) 
							VALUES('$fname', '$serving', '$calories', '$protein', '$lipids', '$carbs','$cholesterol','$sodium','$sugar','$type' ) ") or die(mysql_error());  

		echo "<div class='added'>"."Your " .$fname. " has been added to the database"."</div>";
		echo "<br/>";
	}
}





