
<?php require_once("config.php"); ?>


<?php
$partialFoods = $_POST['partialFoods']; // connects with the jquery code
$foods = mysql_query("SELECT * FROM foods WHERE food_name  LIKE '%$partialFoods%' ") or die(mysql_error());
while($food = mysql_fetch_array($foods)) {


	
	$name = $food['food_name'];
	$foodid = $food['food_ID'];

	echo "<div><a href='http://localhost:8888/food/interact.php?add=$name'>" . $name . "</a></div>";
	
		}
		
?>


