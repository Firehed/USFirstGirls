<form action="<?php echo url::current(); ?>" method="post">
	<fieldset>
		<?php echo form::csrf(); ?>

		<label for="title">Topic Title</label>
		<input type="text" name="title" id="title" value="<?php echo $this->input->post('title'); ?>" />
		
		<label for="body">Message</label>
		<textarea id="body" name="body" rows="10" cols="40"><?php echo $this->input->post('body'); ?></textarea>
		
		<button type="submit">New Topic</button>
		
	</fieldset>
</form>