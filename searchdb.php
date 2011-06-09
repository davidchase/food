<!DOCTYPE html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title>Search The DB</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/highlight.js"></script>
 </head>
 
 <body> 
<?php include_once('inc/functions.php'); ?> 

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<select name = "when">
					<option selected= "">When Did You Eat?</option>
					<option value="breakfast">Breakfast</option>
					<option value="lunch">Lunch</option>
					<option value="dinner">Dinner</option>
					<option value="snacks">Snacks</option>
					</select>
			<input type="text" name="term" value="" id="search" class="search"> 
			<input type="submit" name="submit" value="Submit" class="submitForm">
		</form>
		<p><?php getFoods();?></p>
		
		<p><h2>Breakfast</h2></p>
		<?php breakfast();?>
		
		<p><h2>Lunch</h2></p>
		<?php lunch();?>
		
		<p><h2>Dinner</h2></p>
		<?php dinner();?>
		
		<p><h2>Snacks</h2></p>
		<?php snack();?>
		
		<p><h2>Totals</h2></p>
		<?php foodtotals();?>
		
		<p><h2>Add New Food</h2></p>
		<?php  require_once('add.php'); ?>
 </body>
 </html>