
		<fieldset class="exercise">
			<legend>Exercise</legend>
 		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="fitness">
		<p><label for="search">Search Exercises</label> <input type="text" name="search" value="" id="search"></p>
		<p><label for="how_long">How Long?</label> <input type="text" name="how_long" value="" id="how_long"> <span>minutes</span></p>
		Optional
		<p><label for="miles">Miles</label><input type="text" name="miles" value="" id="miles"></p>
		<input type="submit" name="go" value="Submit" id="go">
		
		
		
		
		</form>
		</fieldset>
		<?php exercise(); ?>
		
		

