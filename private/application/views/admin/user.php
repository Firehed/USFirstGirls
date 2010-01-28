<dl>
	<dt><?php echo Kohana::lang('site.admin.user.username'); ?></dt>
	<dd><?php echo $user->name; ?></dd>
	<dt><?php echo Kohana::lang('site.admin.user.email'); ?></dt>
	<dd><?php echo $user->email; ?></dd>
	<dt><?php echo Kohana::lang('site.admin.user.logins'); ?></dt>
	<dd><?php echo $user->logins; ?></dd>
	<dt><?php echo Kohana::lang('site.admin.user.last_login'); ?></dt>
	<dd><?php echo date('M j Y, g:i:sa', $user->last_login); ?></dd>
</dl>

<form action="" method="post">
	<fieldset>
		<?php echo form::csrf(); ?>


<?php foreach ($roles as $role): ?>
	<input type="hidden" name="role[<?php echo $role->id; ?>]" value="no" />
	<label for="role_<?php echo $role->id; ?>" title="<?php echo $role->description; ?>"><?php echo $role->name; ?></label>
	<input id="role_<?php echo $role->id; ?>" type="checkbox" name="role[<?php echo $role->id; ?>]" value="yes" <?php if ($user->has($role)): ?>checked="checked"<?php endif; ?> />
	
<?php endforeach; ?>

		<button type="submit"><?php echo Kohana::lang('site.admin.user.button'); ?></button>
	</fieldset>
</form>
