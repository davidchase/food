<?php require_once("config.php"); ?>

<?php
$partialFoods = $_POST['partialFoods'];
$foods = mysql_query("SELECT * FROM foods WHERE food_name  LIKE '%$partialFoods%' ");
while($food = mysql_fetch_array($foods)) {
	
	$name = $food['food_name'];
	$foodid = $food['food_ID'];
	
	echo "<a href='http://localhost:8888/food/food_cat.php?add=$name&breakfast=yes'>" . $name . "</a>";
	
	
}

?>



