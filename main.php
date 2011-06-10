<!DOCTYPE html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title>Main Page</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
	
	<script type="text/javascript" src="js/highlight.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#addFood").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic'
			});
			
				$(".quickAdd").fancybox({
					'titlePosition'		: 'inside',
					'transitionIn'		: 'elastic',
					'transitionOut'		: 'elastic'
				});
		});

	</script>
 </head>
 
 <body> 
<?php include_once('inc/functions.php'); ?> 
<h1><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Home</a></h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<select name = "libre">
						<option selected= "">When Did You Libre?</option>
						<option value="breakfast">Breakfast</option>
						<option value="lunch">Lunch</option>
						<option value="dinner">Dinner</option>
						<option value="snacks">Snacks</option>
					</select>
						<select name = "when">
							<option selected= "">When Did You Eat?</option>
							<option value="breakfast">Breakfast</option>
							<option value="lunch">Lunch</option>
							<option value="dinner">Dinner</option>
							<option value="snacks">Snacks</option>
						</select>
					<input type="text" name="term" value="" id="search" class="search"> 
					<input type="submit" name="submit" value="Submit" class="submitForm">
					<select name = "servings">
						<option selected= "">How Many Servings?</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
		</form>
		<p><?php getFoods();?></p>
		
		<p><h2>Breakfast</h2></p><a class="quickAdd" href="#breakfast">Quick Add</a>
		<?php breakfast();?>
		
		<p><h2>Lunch</h2></p><a class="quickAdd" href="#lunch">Quick Add</a>
		<?php lunch();?>
		
		<p><h2>Dinner</h2></p><a class="quickAdd" href="#dinner">Quick Add</a>
		<?php dinner();?>
		
		<p><h2>Snacks</h2></p><a class="quickAdd" href="#snacks">Quick Add</a>
		<?php snack();?>
		
		<p><h2>Totals</h2></p>
		<?php foodtotals();?>
		
		<p><h2>Add New Food</h2></p>
		<a id="addFood" href="#formUp" title="">Add Food</a>

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
					<input type="Submit" name="addFood" value="Submit" id="submit">
				
					</form>
				</div>
			</div>
		</div>

		<?php addFoods(); ?>
		
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
	
 </body>
 </html>