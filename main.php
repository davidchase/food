<!DOCTYPE html>
<html>
 <head>
 <?php include 'header.php'; ?>
 </head>
 
 <body> 
<div id="wrapper">
	
	<div id="appHeader">
	<?php date_default_timezone_set('UTC'); ?>
	Todays Date: <?php echo date("m/d/y"); ?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="interact">
					<select name = "libre">
						<option selected= "">When Did You Libre?</option>
						<option value="breakfast">Breakfast</option>
						<option value="lunch">Lunch</option>
						<option value="dinner">Dinner</option>
						<option value="snacks">Snacks</option>
					</select>
					<input type="text" name="term" value="Search For Foods" id="search" class="search">
					<select name = "servings">
						<option selected= "">How Many Servings?</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
						<select name = "when">
							<option selected= "">When Did You Eat?</option>
							<option value="breakfast">Breakfast</option>
							<option value="lunch">Lunch</option>
							<option value="dinner">Dinner</option>
							<option value="snacks">Snacks</option>
						</select>
					
					
					
					 
					<input type="submit" name="submit" value="Submit" class="submitForm">
		</form>
		<?php getFoods();?>
		<?php addFoods(); ?>
		<a id="addFood" href="#formUp" title="">Add Food</a>
	</div>
		
		<div id="meal">
		
			<div class="breakfast">
		<?php breakfast();?><a class="quickAdd" href="#breakfast">Quick Add</a>
		
			</div>
			
			<div class="lunch">
		<?php lunch();?><a class="quickAdd" href="#lunch">Quick Add</a>
		
			</div>
		
			<div class="dinner">
		<?php dinner();?><a class="quickAdd" href="#dinner">Quick Add</a>
		
			</div>
		
			<div class="snacks">
		<?php snack();?><a class="quickAdd" href="#snacks">Quick Add</a>
		
			</div>
		
			<div class="totalmeal">
		<?php foodtotals();?>
		
			</div>
		</div>
		
		<?php include('exercise.php'); ?>
		<?php dispFitness(); ?>

		<div class="formHidden">
			<div id="formUp">
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
					<label for="addTo">Optional<span class="small">ie: Breakfast</span></label>
					<select name = "addTo">
							<option selected= "">Add to Meal Time</option>
							<option value="breakfast">Breakfast</option>
							<option value="lunch">Lunch</option>
							<option value="dinner">Dinner</option>
							<option value="snacks">Snacks</option>
						</select>
					<input type="Submit" name="addFood" value="Submit" id="submit">
				
					</form>
				</div>
			</div>
		</div>
		
		
		
		<div class="formHidden">
			<div id="breakfast">
	
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="quickAdd">
				 <label for="quick_calories">Quick Calories</label> <input type="text" name="breakfast_calories" value="" class="quick_calories">
				<input type="Submit" name="quickAdd" value="Submit"  class="quickSubmit">
				</form>
			</div>
			<div id="lunch">
	
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="quickAdd">
				 <label for="quick_calories">Quick Calories</label> <input type="text" name="lunch_calories" value="" class="quick_calories">
				<input type="Submit" name="lunch" value="Submit"  class="quickSubmit">
				</form>
			</div>
				<div id="dinner">

					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="quickAdd">
					 <label for="quick_calories">Quick Calories</label> <input type="text" name="dinner_calories" value="" class="quick_calories">
					<input type="Submit" name="dinner" value="Submit" class="quickSubmit">
					</form>
				</div>
					<div id="snacks">

						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="quickAdd">
						 <label for="quick_calories">Quick Calories</label> <input type="text" name="snacks_calories" value="" class="quick_calories">
						<input type="Submit" name="snacks" value="Submit" class="quickSubmit">
						</form>
					</div>
		</div>
</div>
 </body>
 </html>