<?php



require_once("config.php");

$partialFoods = $_POST['partialFoods'];

$foods = mysql_query("SELECT Shrt_Desc FROM foodinfo WHERE Shrt_Desc LIKE '%$partialFoods%' ");
while($food = mysql_fetch_array($foods)) {
	
	$name = $food['Shrt_Desc'];
	$name = preg_replace('/\s\s+/', ' ', $name);
	
	echo "<div class=\"fname\"><a href=\"".$name."\" class=\"link\" target=\"_blank\">" . $name . "</a></div>";
	
	
	// echo "<ul id='food'>";
	// 	echo "<li class='fname'>"."<strong>"."Name: "."</strong>".$food['food_name']."</li>";
	// 	echo "<br />";
	// 	echo "</ul>";
	
} //end while loop

?>