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
		$servings = $_POST['servings'];
		
		if(!empty($_REQUEST['term']) && ($when != "When Did You Eat?")  && ($servings != "How Many Servings?")   ) {
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
																				<td><a href=".$_SERVER['PHP_SELF']."?id=".$row['0']."&when=$when"."&s=$servings".">Add Me</a></td></tr>\n";
		 }
		 echo "</table>";

		 echo $pages->display_pages();
		 echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
		 }
		
			if(isset($_GET['id'])) {
			$add = $_GET['id'];
			$when = $_GET['when'];
			$s = $_GET['s'];
			$query =  mysql_query("SELECT * FROM foods WHERE food_ID ='$add'") or die(mysql_error()); 
			$row = mysql_fetch_array( $query );
			$query = mysql_query("INSERT INTO $when (id,food_name,food_serving,food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars) 
								  VALUES('$add','$row[1]','$row[2]','$row[3]'*'$s','$row[4]'*'$s','$row[5]'*'$s','$row[6]'*'$s','$row[7]'*'$s','$row[8]'*'$s','$row[9]'*'$s') ") or die(mysql_error());
		}
					
}


/**
 *
 *	Display Foods From Tables
 *
 *
 **/

function breakfast(){
			
					if(isset($_POST['quickAdd'])) {
						$quickCals = $_POST['breakfast_calories'];
						$results =  mysql_query("INSERT INTO breakfast (food_name,food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars) VALUES ('Quick Calories','$quickCals','0','0','0','0','0','0')");
					}
			
			
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
					if($_GET['when'] == 'breakfast') {
					  $query =  mysql_query("DELETE FROM breakfast WHERE id='$remove'");
					}
				}

			$query = mysql_query("SELECT  * FROM breakfast") or die(mysql_error());  
		  	$totals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) 
					  AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal FROM breakfast") or die(mysql_error());  
		echo "Breakfast";	
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
		while($row = mysql_fetch_array($query)) {
			echo "<tr>";
			echo "<td>".'<a id="edit" href="edit.php">'.$row['food_name'].'</a>'. "</td>";
			echo "<td>".$row['food_calories']. "</td>";
			echo "<td>".$row['food_carbs']. "</td>";
			echo "<td>".$row['food_lipid']. "</td>";
			echo "<td>".$row['food_sodium']. "</td>";
			echo "<td>".$row['food_cholesterol']. "</td>";
			echo "<td>".$row['food_protein']. "</td>";
			echo "<td>".$row['food_sugars']. "</td>";
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row['id']."&when=breakfast".">X</a></td>"; 
			echo "</tr>";	
	} 
	
		
		
		while($row = mysql_fetch_array( $totals )) {
			echo "<tr>";
			echo "<td><strong>Totals:</strong></td>";
			echo "<td>".$row['CalorieTotal']. "</td>";
			echo "<td>".$row['CarbTotal']. "</td>";
			echo "<td>".$row['FatTotal']. "</td>";
			echo "<td>".$row['SodiumTotal']. "</td>";
			echo "<td>".$row['CholesterolTotal']. "</td>";
			echo "<td>".$row['ProteinTotal']. "</td>";
			echo "<td>".$row['SugarTotal']. "</td>";
			echo "</tr>";
		
		}
		echo "</table>"; 
		
	
}
function lunch(){
	
			if(isset($_POST['lunch'])) {
				$quickCals = $_POST['lunch_calories'];
				$results =  mysql_query("INSERT INTO lunch (food_name,food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars) VALUES ('Quick Calories','$quickCals','0','0','0','0','0','0')");
			}
	
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
					if($_GET['when'] == 'lunch') {
					  $query =  mysql_query("DELETE FROM lunch WHERE id='$remove'");
					}
				}
			
		  $query = mysql_query("SELECT * FROM lunch") or die(mysql_error());  
		  $totals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal FROM lunch") or die(mysql_error());  
		
		echo "Lunch";
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
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0]."&when=lunch".">X</a></td>"; 
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
		
			if(isset($_POST['dinner'])) {
				$quickCals = $_POST['dinner_calories'];
				$results =  mysql_query("INSERT INTO dinner (food_name,food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars) VALUES ('Quick Calories','$quickCals','0','0','0','0','0','0')");
			}
	
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
					if($_GET['when'] == 'dinner') {
					  $query =  mysql_query("DELETE FROM dinner WHERE id='$remove'");
					}
				}
			
			$query = mysql_query("SELECT * FROM dinner") or die(mysql_error());  
		  $totals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal FROM dinner") or die(mysql_error());  
		
		echo "Dinner";
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
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0]."&when=dinner".">X</a></td>"; 
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
			if(isset($_POST['snacks'])) {
				$quickCals = $_POST['snacks_calories'];
				$results =  mysql_query("INSERT INTO snacks (food_name,food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars) VALUES ('Quick Calories','$quickCals','0','0','0','0','0','0')");
			}
			
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
					if($_GET['when'] == 'snack') {
					  $query =  mysql_query("DELETE FROM snacks WHERE id='$remove'");
					}
				}
			
		  $query = mysql_query("SELECT * FROM snacks") or die(mysql_error());  
		  $totals = mysql_query("SELECT SUM(food_calories) AS CalorieTotal,SUM(food_carbs) AS CarbTotal, SUM(food_lipid) AS FatTotal,SUM(food_sodium) AS SodiumTotal,SUM(food_cholesterol) AS CholesterolTotal,SUM(food_protein) AS ProteinTotal,SUM(food_sugars) AS SugarTotal FROM snacks") or die(mysql_error());  
		
		echo "Snacks";
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
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0]."&when=snack".">X</a></td>"; 
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
	echo "Daily Totals";
	echo "<table border='1' id='table'>";
	echo "<tr> <th></th> 
			   <th>Calories</th>
			   <th>Carbs</th>
				<th>Fats</th>
				<th>Sodium</th>
				<th>Cholesterol</th>
				<th>Protein</th>
				<th>Sugars</th></tr>";
	
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
	$over = $consumed-$allowed;
	
	if($consumed > $allowed) {
		echo '<div class="over">'.$over.'<br/>'. ' Over '. '</div> ';
		echo '<div class="consume">'.$consumed. '<br/>'. 'Calories Consumed'.'</div>'.'<br/>'.'<div class="left">'.$left.' Calories Remaining </div>';
		
	} elseif(empty($consumed)){
		
		echo "<br/>";
	   	echo '<div class="consume">'.'0'. '<br/>'. 'Calories Consumed'.'</div>'.'<br/>'.'<div class="left">'.$left.' Calories Remaining </div>';
	} else {
		echo "<br/>";
		echo '<div class="consume">'.$consumed. '<br/>'. 'Calories Consumed'.'</div>'.'<br/>'.'<div class="left">'.$left.' Calories Remaining </div>';
		
	}
}



/**
 * Add foods to the database
 * 
 * 
 * 
 **/
function addFoods(){

		
		
		if (isset($_POST['addFood'])) { 
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

		$addTo = $_POST['addTo'];
		
		if($_POST['addTo'] != 'Add to Meal Time'){
		$results = mysql_query("INSERT INTO $addTo (food_name, food_serving, food_calories, food_protein, food_lipid, food_carbs,food_cholesterol,food_sodium,food_sugars) 
							VALUES('$fname', '$serving', '$calories', '$protein', '$lipids', '$carbs','$cholesterol','$sodium','$sugar') ") or die('Add to error');  	
		
		$results = mysql_query("INSERT INTO foods (food_name, food_serving, food_calories, food_protein, food_lipid, food_carbs,food_cholesterol,food_sodium,food_sugars,food_type) 
							VALUES('$fname', '$serving', '$calories', '$protein', '$lipids', '$carbs','$cholesterol','$sodium','$sugar','$type' ) ") or die('Error Here If');
							
			  
		} else {
		 $results = mysql_query("INSERT INTO foods (food_name, food_serving, food_calories, food_protein, food_lipid, food_carbs,food_cholesterol,food_sodium,food_sugars,food_type) 
							VALUES('$fname', '$serving', '$calories', '$protein', '$lipids', '$carbs','$cholesterol','$sodium','$sugar','$type' ) ") or die('Error Here!');
		}

		echo "<div class='added'>"."Your " .$fname. " has been added to the database"."</div>";
		echo "<br/>";
		printf("<script>location.href='/food/main.php'</script>");
	}
}


/**
*
* Start Exercise Here
* Pulls from table exercise
*
*
**/

function exercise(){
	
		$form_query = "SELECT DISTINCT exercise FROM exercises ORDER BY id ASC";
	 	$form_result = mysql_query($form_query) or die(mysql_error());
		
		$search = $_POST['search'];
		$minutes = $_POST['how_long'];
		
		if(!empty($_REQUEST['search']) && !empty($_REQUEST['how_long']) ) {
		 include('paginator.class.php');

		 $query = "SELECT COUNT(*) FROM exercises WHERE exercise LIKE '%$search%' ";
		 $result = mysql_query($query) or die(mysql_error());
		 $num_rows = mysql_fetch_row($result);

		 $pages = new Paginator;
		 $pages->items_total = $num_rows[0];
		 $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
		 $pages->paginate();

		 echo $pages->display_pages();
		 echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";

		 $query = "SELECT * FROM exercises WHERE exercise LIKE '%$search%' ORDER BY id ASC $pages->limit";
		 $result = mysql_query($query) or die(mysql_error());

		 echo "<table>";
		 echo "<tr><th>Id</th><th>Fitness</th><th>Calories Burned</th><th>Add</th></tr>";
		 while($row = mysql_fetch_row($result))
		 {
		 	echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\"><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>
																				<td><a href=".$_SERVER['PHP_SELF']."?fitid=".$row['0']."&m=$minutes".">Add Me</a></td></tr>\n";
		 }
		 echo "</table>";

		 echo $pages->display_pages();
		 echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
		 }
		
			if(isset($_GET['fitid'])) {
			$add = $_GET['fitid'];
			$m = $_GET['m']; //minutes
			$h = 60; // hours to minutes
			$query =  mysql_query("SELECT * FROM exercises WHERE id ='$add'") or die(mysql_error()); 
			$row = mysql_fetch_array( $query );
			$total = $row[2]/$h*$m; //total calories based on minutes exercised
			$rounded = ceil($total); //total rounded up
			$query = mysql_query("INSERT INTO fitness (eid,fitness,calories,minutes,miles,notes) 
								  VALUES('$add','$row[1]','$rounded','$m','$row[4]','$notes') ") or die(mysql_error());
		}
	
}

function dispFitness(){
			if(isset($_GET['remove'])) {
					 $remove = $_GET['remove'];
				     $query =  mysql_query("DELETE FROM fitness WHERE id='$remove'");
					
				}
		
		  $query = mysql_query("SELECT * FROM fitness") or die(mysql_error());  
		  $totals = mysql_query("SELECT SUM(calories) AS CalorieBurned,SUM(minutes) AS MinuteTotal, SUM(miles) AS MileTotal FROM fitness") or die(mysql_error());  
		
		echo "Fitness";
		echo "<table border='1' id='table'>";
		echo "<tr>";
		echo "<th>Fitness</th> 
			 <th>Calories Burned</th>
		     <th>Minutes</th>
			 <th>Miles</th>
			 <th>Delete</th>";
		echo "</tr>";
		while($row = mysql_fetch_array( $query )) {
			echo "<tr><td>"; 
			echo $row[2];
			echo "</td><td>"; 
			echo $row[3];
			echo "</td>"; 
			echo "<td>".$row[4]. "</td>";
			echo "<td>".$row[5]. "</td>";
			echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0].">X</a></td>"; 
			echo "</tr>";
	} 
		while($row = mysql_fetch_array( $totals )) {
			echo "<td><strong>Totals:</strong></td>";
			echo "<td>".$row['CalorieBurned']. "</td>";
			echo "<td>".$row['MinuteTotal']. "</td>";
			echo "<td>".$row['MileTotal']. "</td>";
		}
		echo "</table>"; 
	
	
	
}

