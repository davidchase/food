<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" type="text/css" href="sstyle.css" />
	</head>
		<body>
			<div id="wrapper">
				<div class="tabnav">
					<ul class="nav">
						<li><a href="#">Food Entry</a></li>
						<li>Tab Menu 2</li>
						<li>Tab Menu 3</li>
					</ul>
				</div>
					<div class="topbar">
						<?php date_default_timezone_set('UTC'); $tdate = date("D: M j, Y"); echo "Today is ". $tdate;	?>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<select name = "when">
							<option selected= ""> </option>
							<option value="breakfast">Breakfast</option>
							<option value="lunch">Lunch</option>
							<option value="dinner">Dinner</option>
							<option value="snacks">Snacks</option>
							</select> 
							<input type="text" name="term" value="" id="search" class="search"> 
							<input type="submit" name="submit" value="Submit" class="submitForm">
						</form> 
						
						<?php
						include('inc/paginator.class.php');
						require_once('inc/config.php');

						if(isset($_POST['submit'])) {
			
					}
						?>
						
					
					
					
					</div>
			</div>
		</body>
</html>