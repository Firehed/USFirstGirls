<form action="<?php echo url::current(); ?>" method="post" class="grid_8">
	<fieldset>
		<?php echo form::csrf(); ?>
		
		<label for="username"><?php echo Kohana::lang('site.session.username'); ?></label>
		<input type="text" name="username" id="username" value="<?php echo $this->input->post('username'); ?>" />
		
		<label for="email"><?php echo Kohana::lang('site.session.email'); ?></label>
		<input type="text" name="email" id="email" value="<?php echo $this->input->post('email'); ?>" />
		
		<label for="teamNumber"><?php echo Kohana::lang('site.session.teamNumber'); ?></label>
		<input type="text" name="teamNumber" id="teamNumber" value="<?php echo $this->input->post('teamNumber'); ?>" />
		
		<label for="password"><?php echo Kohana::lang('site.session.password'); ?></label>
		<input type="password" name="password" id="password" />
		
		<button type="submit"><?php echo Kohana::lang('site.session.signup'); ?></button>
	</fieldset>
</form>
<aside class="grid_4"><?php echo Kohana::lang('site.session.signupreason'); ?></aside>