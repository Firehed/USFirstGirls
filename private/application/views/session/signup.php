<?=form::open(null, 'grid_8')?>
<?=form::email('register.email', 'email', $this->input->post('email'))?>
<?=form::input('register.teamnumber', 'teamNumber', $this->input->post('teamNumber'))?>		
<?=form::password('register.password','password')?>
<?=form::submit('signup')?>		
<?=form::close()?>
<aside class="grid_4"><?php echo Kohana::lang('site.session.signupreason'); ?></aside>