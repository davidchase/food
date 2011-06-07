<?php require_once('config.php'); ?>
<?php
					
					$term = $_POST['term'];
					$when = $_POST['when'];
					
					if(($term != "") &&
					 	($when != "")) {
							$foods = mysql_query("SELECT * FROM foods WHERE food_name  LIKE '%$term%' ") or die(mysql_error());
							while($food = mysql_fetch_array($foods)) {

									$name = $food['food_name'];
									$foodid = $food['food_ID'];

									echo "<div class='results'><a href='http://localhost:8888/food/interact.php?add=$name'>" . $name . "</a></div>";
								}

					} else {

					
							echo "Please Fill The Fields Left to Right";
							echo "<br/>";
					
				}
				
				
?>