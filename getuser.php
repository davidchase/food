<?php
$q=$_GET["q"];

$con = mysql_connect('localhost', 'root', 'root');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("search", $con);

$sql="SELECT * FROM foods WHERE food_type = '".$q."'";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Servings</th>
<th>Calories</th>
<th>Carbs</th>
<th>Fats</th>
<th>Sodium</th>
<th>Cholesterol</th>
<th>Protein</th>
<th>Sugars</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
		echo "<tr>";
		echo "<td>" . $row['food_name'] . "</td>";
		echo "<td>" . $row['food_serving'] . "</td>";
		echo "<td>" . $row['food_calories'] . "</td>";
		echo "<td>" . $row['food_carbs'] . "</td>";
		echo "<td>" . $row['food_lipid'] . "</td>";
		echo "<td>" . $row['food_sodium'] . "</td>";
		echo "<td>" . $row['food_cholestrol'] . "</td>";
		echo "<td>" . $row['food_protein'] . "</td>";
		echo "<td>" . $row['food_sugars'] . "</td>";
		echo "</tr>";
  }
echo "</table>";


mysql_close($con);
?>


