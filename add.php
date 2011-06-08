<!DOCTYPE html>
<?php require_once('config.php'); ?>
<?php include('functions.php') ?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="form.css" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Add New Foods</title>
	</head>
	<body>
			<?php
				//if (!isset($_POST['submit'])) { 
			?>
			
			<div id="stylized" class="myform">
					<h1>Add New Food</h1>
					<p>This will updated the foods database</p>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="form" id="form"> 
					
					
					<label for="food_name">Food Name<span class="small">ie: Whole Egg,Bagel</span></label> <input type="text" name="food_name" value="" id="food_name">
					<label for="food_calories">Calories<span class="small">kcals</span></label><input type="text" name="food_calories" value="" id="calories">
					<label for="protein">Protein<span class="small">g</span></label><input type="text" name="food_protein" value="" id="protein">
					<label for="food_fat">Fat<span class="small"> g</span></label> <input type="text" name="food_lipid" value="" id="fat">
					<label for="food_carbs">Carbs<span class="small"> g</span></label> <input type="text" name="food_carbs" value="" id="carbs">
					<label for="food_cholesterol">Cholesterol<span class="small">mg</span></label> <input type="text" name="food_cholesterol" value="" id="food_cholesterol">
					<label for="food_sodium">Sodium<span class="small">mg</span></label> <input type="text" name="food_sodium" value="" id="food_sodium">
					<label for="food_sugars">Sugar<span class="small">g</span></label> <input type="text" name="food_sugars" value="" id="food_sugars">
					<label for="food_type">Food Type<span class="small">ie: Bread,Fruit</span></label> <input type="text" name="food_type" value="" id="food_type">
					<input type="Submit" name="submit" value="Submit" id="submit">
				
					</form>
			</div>
					<?php addFoods(); ?>
	</body>
</html>

