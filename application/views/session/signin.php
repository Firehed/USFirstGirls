<form action="<?php echo url::current(); ?>" method="post" class="grid_8">
	<fieldset>
		<?php echo form::csrf(); ?>
		<label for="username">Username/Email</label>
		<input type="text" name="username" id="username" />
		
		<label for="password">Password</label>
		<input type="password" name="password" id="password" />
		
		<label for="remember">Remember me?</label>
		<input type="checkbox" name="remember" id="remember" checked="checked"/>

		<label for="submit">Sign in</label>
		<input type="submit" name="submit" id="submit" />
		
	</fieldset>
</form>
<aside class="grid_4">
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	
</aside>