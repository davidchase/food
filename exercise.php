
		<fieldset>
			<legend>Exercise</legend>
 		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="fitness">
		<label for="search">Search Exercises</label><br/><input type="text" name="search" value="" id="search"><br/>
		<label for="how_long">How Long?</label> <br/> <input type="text" name="how_long" value="" id="how_long"> <span>minutes</span> <br/>
		<p>Optional</p>
		<label for="miles">Miles</label> <br/> <input type="text" name="miles" value="" id="miles"><br/>
		<input type="submit" name="go" value="Submit" id="go">
		
		
		
		
		</form>
		</fieldset>
		<?php exercise(); ?>
		
		

