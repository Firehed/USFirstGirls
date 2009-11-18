<form action="<?php echo url::current(); ?>" method="post" class="grid_8">
	<fieldset>
		<?php echo form::csrf(); ?>
		<label for="username"><?php echo Kohana::lang('site.session.usernameemail'); ?></label>
		<input type="text" name="username" id="username" />
		
		<label for="password"><?php echo Kohana::lang('site.session.password'); ?></label>
		<input type="password" name="password" id="password" />
		
		<label for="remember"><?php echo Kohana::lang('site.session.remember'); ?></label>
		<input type="checkbox" name="remember" id="remember" checked="checked"/>

		<button type="submit"><?php echo Kohana::lang('site.session.signin'); ?></button>
		
	</fieldset>
</form>
<aside class="grid_4"><?php echo Kohana::lang('site.session.signinreason'); ?></aside>