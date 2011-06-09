<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('inc/config.php') ?>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script type="text/javascript">
	
			function getFoods(value) { 
			$.post("getFoods.php",{partialFoods:value},
			function(data) { if(value.length == 0) {$("#results").html("");} else { $("#results").html(data);}} // clear if nothing there
		 )};

		
	</script>
	
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Add Food</title>
</head>
<body>
	
		<div id="wrapper">
			<div id="when">
			
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
						<select name="when" onchange="this.form.submit();">
						<option value="">When Did You Eat?</option>
						<option value="breakfast">Breakfast</option>
						<option value="lunch">Lunch</option>
						<option value="dinner">Dinner</option>
						<option value="snacks">Snacks</option>
						</select> <?php $timeofday = $_GET['when']; ?>
				</form>
			<br/>
					
			
			
			Live Food Search <input type="text" onkeyup="getFoods(this.value)" />
			<br/>
			<div id="results"></div>
			
			<?php date_default_timezone_set('UTC'); $tdate = date("D M j Y"); echo "Today is ". $tdate;	?>
					
					
					</div>
		</div>
		
		
		<?php 
			if(isset($_GET['add'])) {
			$add = $_GET['add'];
			$serving = 1;
			$query =  mysql_query("SELECT * FROM foods WHERE food_name='$add'") or die(mysql_error()); 
			$row = mysql_fetch_array( $query );
			$query =  mysql_query("INSERT INTO breakfast (food_name,food_serving,food_calories,food_carbs,food_lipid,food_sodium,food_cholesterol,food_protein,food_sugars) VALUES('$add','$serving','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]') ") or die(mysql_error());

		} 
		?>
		
		
	<?php
		if (!isset($_POST['submit'])) { 
	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form"> 
		<label for="food_name">Food Name</label> <input type="text" name="food_name" value="" id="food_name">
		<label for="food_calories">Calories</label> <input type="text" name="food_calories" value="" id="calories">
		<label for="protein">Protein</label> <input type="text" name="food_protein" value="" id="protein">
		<label for="food_fat">Fat</label> <input type="text" name="food_lipid" value="" id="fat">
		<label for="food_carbs">Carbs</label> <input type="text" name="food_carbs" value="" id="carbs">
		<label for="food_cholesterol">Cholesterol</label> <input type="text" name="food_cholesterol" value="" id="food_cholesterol">
		<label for="food_sodium">Sodium</label> <input type="text" name="food_sodium" value="" id="food_sodium">
		<label for="food_sugars">Sugar</label> <input type="text" name="food_sugars" value="" id="food_sugars">
		<label for="food_type">Food Type</label> <input type="text" name="food_type" value="" id="food_type">
		
		<input type="Submit" name="submit" value="Submit" id="submit">
	</form>

<?php
	} else {
		$serving = 1;
		$fname = $_POST['food_name'];
		$calories = $_POST['food_calories'];
		$protein = $_POST['food_protein'];
		$lipids = $_POST['food_lipid'];
		$carbs = $_POST['food_carbs'];
		$cholesterol = $_POST['food_cholesterol'];
		$sodium = $_POST['food_sodium'];
		$sugar = $_POST['food_sugars'];
		$type = $_POST['food_type'];

		
		$sql = mysql_query("INSERT INTO foods (food_name, food_serving, food_calories, food_protein, food_lipid, food_carbs,food_cholesterol,food_sodium,food_sugars,food_type) VALUES('$fname', '$serving', '$calories', '$protein', '$lipids', '$carbs','$cholesterol','$sodium','$sugar','$type' ) ") or die(mysql_error());  
		
		echo "Your " .$fname. " has been added to the database";
		echo "<br/>";
		echo "<a href='add_food.php'> Add More &rarr; </a>";
	}
?>



<p class="table">Breakfast Time </p>
<?php $query = mysql_query("SELECT * FROM breakfast") or die(mysql_error());  
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
		echo "<td><a href=".$_SERVER['PHP_SELF']."?remove=".$row[0].">Delete</a></td>"; 
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
	echo "</table>"; ?>
	
<p class="table">Lunch Time </p>
	
<?php if(isset($_GET['remove'])) {
	   $remove = $_GET['remove'];
	   $query =  mysql_query("DELETE FROM breakfast WHERE id='$remove'") or die(mysql_error());
} 
?>


</body>
</html>

