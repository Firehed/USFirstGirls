<form action="<?php echo url::current(); ?>" method="post" class="grid_8">
	<fieldset>
		<?php echo form::csrf(); ?>
		
		<label for="username"><?php echo Kohana::lang('site.session.username'); ?></label>
		<input type="text" name="username" id="username" />
		
		<label for="email"><?php echo Kohana::lang('site.session.email'); ?></label>
		<input type="text" name="email" id="email" />
		
		<label for="password"><?php echo Kohana::lang('site.session.password'); ?></label>
		<input type="password" name="password" id="password" />
		
		<button type="submit"><?php echo Kohana::lang('site.session.signup'); ?></button>
	</fieldset>
</form>
<aside class="grid_4"><?php echo Kohana::lang('site.session.signupreason'); ?></aside>