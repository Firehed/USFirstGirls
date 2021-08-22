<?=form::open(null, 'grid_8')?>
<?=form::email('email', 'username')?>
<?=form::password('password','password')?>
<?=form::hidden('js', 'off')?>
<?=form::submit('signin')?>
<?=form::close()?>
<aside class="grid_4"><?php echo Kohana::lang('site.session.signinreason'); ?></aside>
