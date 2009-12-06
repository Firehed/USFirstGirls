<form action="<?php echo url::current(); ?>" method="post">
	<fieldset>
		<?php echo form::csrf(); ?>
		
		<label for="teamNumber">Team Number</label>
		<input type="text" name="teamNumber" value="<?php echo $user->team_number; ?>" id="teamNumber" />
				
		<button type="submit">Save</button>
	</fieldset>
</form>