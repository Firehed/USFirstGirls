<form action="<?php echo url::current(); ?>" method="post">
	<fieldset>
		<?php echo form::csrf(); ?>
		
		<label for="recruited">Girls Recruited</label>
		<input type="text" name="recruited" value="<?php echo $team->recruited; ?>" id="recruited" />
		
		<label for="methods">How did you recruit members</label>
		<textarea name="methods" id="methods" rows="10" cols="40"><?php echo $team->methods; ?></textarea>
		
		<button type="submit">Save</button>
	</fieldset>
</form>