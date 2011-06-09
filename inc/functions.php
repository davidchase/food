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
<?php require_once('inc/config.php') ?>


<?php

function getFoods(){
		global $term;
		global $row;

		
		$form_query = "SELECT DISTINCT food_name FROM foods ORDER BY food_ID ASC";
	 	$form_result = mysql_query($form_query) or die(mysql_error());
		
		$term = $_POST['term'];
		$when = $_POST['when'];
		
		if(!empty($_REQUEST['term']) && ($when != "When Did You Eat?")  ) {
		 include('paginator.class.php');

		 $query = "SELECT COUNT(*) FROM foods WHERE food_name LIKE '%$term%' ";
		 $result = mysql_query($query) or die(mysql_error());
		 $num_rows = mysql_fetch_row($result);

		 $pages = new Paginator;
		 $pages->items_total = $num_rows[0];
		 $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
		 $pages->paginate();

		 echo $pages->display_pages();
		 echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";

		 $query = "SELECT * FROM foods WHERE food_name LIKE '%$term%' ORDER BY food_ID ASC $pages->limit";
		 $result = mysql_query($query) or die(mysql_error());

		 echo "<table>";
		 echo "<tr><th>Id</th><th>Name</th><th>Servings</th><th>Calories</th><th>Carbs</th><th>Fats</th><th>Sodium</th><th>Cholesterol</th><th>Protein</th><th>Sugars</th><th>Add</th></tr>";
		 while($row = mysql_fetch_row($result))
		 {
		 	echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\"><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>
																				<td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td>
																				<td><a href=".$_SERVER['PHP_SELF']."?id=".$row['0']."&when=$when".">Add Me</a></td></tr>\n";
		 }
		 echo "</table>";

		 echo $pages->display_pages();
		 echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
		 }
		
			if(isset($_GET['id'])) {
			$add = $_GET['id'];
			$when = $_GET['when'];
			$query =  mysql_query("SELECT * FROM foods WHERE food_ID ='$add'") or die(mysql_error()); 
			$row = mysql_fetch_array( $query );
			$query =  mysql_query("INSERT INTO $when (id,food_name,food_serving,food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars) VALUES('$add','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]') ") or die(mysql_error());
		}
					
}


/**
 *
 *	Display Foods From Tables
 *
 *
 **/

function breakfast(){
	
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
					if($_GET['when'] == 'breakfast') {
					  $query =  mysql_query("DELETE FROM breakfast WHERE id='$remove'");
					}
				}
			
			$query = mysql_query("SELECT * FROM breakfast") or die(mysql_error());  
		  $totals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal FROM breakfast") or die(mysql_error());  
		echo "<table border='1' id='table'>";
		echo "<tr> <th>Name</th> 
				   <th>Calories</th>
				   <th>Carbs</th>
					<th>Fats</th>
					<th>Sodium</th>
					<th>Cholesterol</th>
					<th>Protein</th>
					<th>Sugars</th>
					<th>Delete</th></tr>";
		while($row = mysql_fetch_array( $query )) {
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
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0]."&when=breakfast".">Delete</a></td>"; 
			echo "</tr>";
	} 
		while($row = mysql_fetch_array( $totals )) {
			echo "<td><strong>Totals:</strong></td>";
			echo "<td>".$row['CalorieTotal']. "</td>";
			echo "<td>".$row['CarbTotal']. "</td>";
			echo "<td>".$row['FatTotal']. "</td>";
			echo "<td>".$row['SodiumTotal']. "</td>";
			echo "<td>".$row['CholesterolTotal']. "</td>";
			echo "<td>".$row['ProteinTotal']. "</td>";
			echo "<td>".$row['SugarTotal']. "</td>";
			
			
		}
		echo "</table>"; 

	
}
function lunch(){
	
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
					if($_GET['when'] == 'lunch') {
					  $query =  mysql_query("DELETE FROM lunch WHERE id='$remove'");
					}
				}
			
		  $query = mysql_query("SELECT * FROM lunch") or die(mysql_error());  
		  $totals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal FROM lunch") or die(mysql_error());  
		echo "<table border='1' id='table'>";
		echo "<tr> <th>Name</th> 
				   <th>Calories</th>
				   <th>Carbs</th>
					<th>Fats</th>
					<th>Sodium</th>
					<th>Cholesterol</th>
					<th>Protein</th>
					<th>Sugars</th>
					<th>Delete</th></tr>";
		while($row = mysql_fetch_array( $query )) {
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
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0]."&when=lunch".">Delete</a></td>"; 
			echo "</tr>";
	} 
		while($row = mysql_fetch_array( $totals )) {
			echo "<td><strong>Totals:</strong></td>";
			echo "<td>".$row['CalorieTotal']. "</td>";
			echo "<td>".$row['CarbTotal']. "</td>";
			echo "<td>".$row['FatTotal']. "</td>";
			echo "<td>".$row['SodiumTotal']. "</td>";
			echo "<td>".$row['CholesterolTotal']. "</td>";
			echo "<td>".$row['ProteinTotal']. "</td>";
			echo "<td>".$row['SugarTotal']. "</td>";

		}
		echo "</table>"; 

	
}
function dinner(){
	
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
					if($_GET['when'] == 'dinner') {
					  $query =  mysql_query("DELETE FROM dinner WHERE id='$remove'");
					}
				}
			
			$query = mysql_query("SELECT * FROM dinner") or die(mysql_error());  
		  $totals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal FROM dinner") or die(mysql_error());  
		echo "<table border='1' id='table'>";
		echo "<tr> <th>Name</th> 
				   <th>Calories</th>
				   <th>Carbs</th>
					<th>Fats</th>
					<th>Sodium</th>
					<th>Cholesterol</th>
					<th>Protein</th>
					<th>Sugars</th>
					<th>Delete</th></tr>";
		while($row = mysql_fetch_array( $query )) {
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
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0]."&when=dinner".">Delete</a></td>"; 
			echo "</tr>";
	} 
		while($row = mysql_fetch_array( $totals )) {
			echo "<td><strong>Totals:</strong></td>";
			echo "<td>".$row['CalorieTotal']. "</td>";
			echo "<td>".$row['CarbTotal']. "</td>";
			echo "<td>".$row['FatTotal']. "</td>";
			echo "<td>".$row['SodiumTotal']. "</td>";
			echo "<td>".$row['CholesterolTotal']. "</td>";
			echo "<td>".$row['ProteinTotal']. "</td>";
			echo "<td>".$row['SugarTotal']. "</td>";

		}
		echo "</table>"; 

	
}
function snack(){
	
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
					if($_GET['when'] == 'snack') {
					  $query =  mysql_query("DELETE FROM snacks WHERE id='$remove'");
					}
				}
			
		  $query = mysql_query("SELECT * FROM snacks") or die(mysql_error());  
		  $totals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal FROM snacks") or die(mysql_error());  
		echo "<table border='1' id='table'>";
		echo "<tr> <th>Name</th> 
				   <th>Calories</th>
				   <th>Carbs</th>
					<th>Fats</th>
					<th>Sodium</th>
					<th>Cholesterol</th>
					<th>Protein</th>
					<th>Sugars</th>
					<th>Delete</th></tr>";
		while($row = mysql_fetch_array( $query )) {
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
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0]."&when=snack".">Delete</a></td>"; 
			echo "</tr>";
	} 
		while($row = mysql_fetch_array( $totals )) {
			echo "<td><strong>Totals:</strong></td>";
			echo "<td>".$row['CalorieTotal']. "</td>";
			echo "<td>".$row['CarbTotal']. "</td>";
			echo "<td>".$row['FatTotal']. "</td>";
			echo "<td>".$row['SodiumTotal']. "</td>";
			echo "<td>".$row['CholesterolTotal']. "</td>";
			echo "<td>".$row['ProteinTotal']. "</td>";
			echo "<td>".$row['SugarTotal']. "</td>";

		}
		echo "</table>"; 

	
}

function foodtotals(){
	 $foodtotals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal
	 						FROM ((SELECT food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars FROM breakfast) 
							UNION ALL(SELECT food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars FROM lunch)
							UNION ALL(SELECT food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars FROM dinner)
							UNION ALL(SELECT food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars FROM snacks)) AS TOTAL ") or die(mysql_error());
		  
	echo "<table border='1' id='table'>";
	echo "<tr> <th></th> 
			   <th>Total Calories</th>
			   <th>Total Carbs</th>
				<th>Total Fats</th>
				<th>Total Sodium</th>
				<th>Total Cholesterol</th>
				<th>Total Protein</th>
				<th>Total Sugars</th></tr>";
	
	while($row = mysql_fetch_array($foodtotals)) {
			echo "<td><strong>Daily Totals:</strong></td>";
			echo "<td>".$row['CalorieTotal']. "</td>";
			echo "<td>".$row['CarbTotal']. "</td>";
			echo "<td>".$row['FatTotal']. "</td>";
			echo "<td>".$row['SodiumTotal']. "</td>";
			echo "<td>".$row['CholesterolTotal']. "</td>";
			echo "<td>".$row['ProteinTotal']. "</td>";
			echo "<td>".$row['SugarTotal']. "</td>";
			
			$consumed = $row['CalorieTotal'];
			}
	echo "</table>";
	$allowed = 2000;
	$left = $allowed-$consumed;
	if(empty($consumed)) {
		echo "<br/>";
	   echo 'Your consumed a total of '.'0'.' calories '. ' today! '.'<br/>'.'You can eat a total of '.$left.' calories for the day. ';
	} else {

	echo "<br/>";
	echo 'Your consumed a total of '.$consumed. ' calories '. 'today! '.'<br/>'.'You can eat a total of '.$left.' calories for the day. ';
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





