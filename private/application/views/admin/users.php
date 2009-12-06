<form action="<?php echo url::current(); ?>" method="post">
	<fieldset>
		<?php echo form::csrf(); ?>
		<label for="search"><?php echo Kohana::lang('site.admin.users.search'); ?></label>
		<input type="text" name="search" value="<?php echo $this->input->post('search'); ?>" id="search" />

		<button type="submit"><?php echo Kohana::lang('site.admin.users.submit'); ?></button>
	</fieldset>
</form>