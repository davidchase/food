<!DOCTYPE html>


<html lang="en">
<head>
	
	<?php require_once('config.php') ?>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script type="text/javascript">
	
			function getFoods(value) { 
			$.post("getFoods.php",{partialFoods:value},
			function(data) { if(value.length == 0) {$("#results").html("");} else { $("#results").html(data);}}
		 )};
		
	</script>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Add Food</title>
</head>
<body>
	
		<div id="wrapper">
			Live Food Search <input type="text" onkeyup="getFoods(this.value)" />
			<br/>
			<div id="results"></div>
		</div>
	
	<?php
		if (!isset($_POST['submit'])) { 
	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
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
		$cholestrol = $_POST['food_cholestrol'];
		$sodium = $_POST['food_sodium'];
		$sugar = $_POST['food_sugars'];
		$type = $_POST['food_type'];

		
		$sql = mysql_query("INSERT INTO foods (food_name, food_serving, food_calories, food_protein, food_lipid, food_carbs,food_cholestrol,food_sodium,food_sugars,food_type) VALUES('$fname', '$serving', '$calories', '$protein', '$lipids', '$carbs','$cholestrol','$sodium','$sugar','$type' ) ") or die(mysql_error());  
		
		echo "Your " .$fname. " has been added to the database";
		echo "<br/>";
		echo "<a href='add_food.php'> Add More &rarr; </a>";
	}
?>


</body>
</html>

