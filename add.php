<!DOCTYPE html>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>

	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Add New Foods</title>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#addFood").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'showCloseButton'   : 'true'
			});
		});
	</script>
	</head>
	<body>
			<a id="addFood" href="#formUp" title="">Add Food</a>
		<div style="display: none;">
		<div id="formUp" style="border:0;width:450px;height:560px;">
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
					<div class="error"></div>
			</div>
			</div>
			</div>
					<?php addFoods(); ?>
	</body>
</html>

