
<?php require_once("config.php"); ?>


<?php
$partialFoods = $_POST['partialFoods'];
$foods = mysql_query("SELECT * FROM foods WHERE food_name  LIKE '%$partialFoods%' ") or die(mysql_error());
while($food = mysql_fetch_array($foods)) {


	
	$name = $food['food_name'];
	$foodid = $food['food_ID'];

	echo "<div><a href='http://digital-media-1.baileygp.local/~tstare/food/food_cat?add=$name'>" . $name . "</a></div>";
	
		}
?>


