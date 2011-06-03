<?php



require_once("config.php");

$partialFoods = $_POST['partialFoods'];



$foods = mysql_query("SELECT * FROM foods WHERE food_name  LIKE '%$partialFoods%' ");
while($food = mysql_fetch_array($foods)) {
	
	$name = $food['food_name'];
	$foodid = $food['food_ID'];
	
	echo "<div class='link'>" . $name . "</div>";
}

?>


