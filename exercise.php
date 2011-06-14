
		<fieldset class="exercise">
			<legend>Exercise</legend>
 		<form action="exercise.php" method="POST" id="fitness" name="fitness">
		<p><label for="search">Search Exercises</label> <input type="text" name="search" value="" id="search"></p>
		<p><label for="how_long">How Long?</label> <input type="text" name="how_long" value="" id="how_long"> <span>minutes</span></p>
		Optional
		<p><label for="miles">Miles</label><input type="text" name="miles" value="" id="miles"></p>
		<a href="#" id="go">Submit</a>
		</form>
		
		</fieldset>
		<?php exercise(); ?>
		
		

