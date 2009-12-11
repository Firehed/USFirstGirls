<form action="<?php echo url::current(); ?>" method="post">
	<fieldset>
		<?php echo form::csrf(); ?>
		
		<label for="name">Team Name</label>
		<input type="text" name="name" value="<?php echo $team->name; ?>" id="name" />
		
		<label for="location">Location</label>
		<input type="text" name="location" value="<?php echo $team->location; ?>" id="location" />
		
		<label for="recruited">Girls recruited this year</label>
		<input type="text" name="recruited" value="<?php echo $team->recruited; ?>" id="recruited" />
		
		<label for="methods">How did you recruit members</label>
		<textarea name="methods" id="methods" rows="10" cols="40"><?php echo $team->methods; ?></textarea>
		
		<label for="girlsOnTeam">Number of girls on your team (total)</label>
		<input type="text" name="girlsOnTeam" value="<?php echo $team->girls; ?>" id="girlsOnTeam" />
		
		<label for="teamSize">Number of students on your team</label>
		<input type="text" name="teamSize" value="<?php echo $team->size; ?>" id="teamSize" />
		
		<button type="submit">Save</button>
	</fieldset>
</form>