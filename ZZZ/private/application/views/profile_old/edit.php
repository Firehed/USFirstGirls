<?=form::open()?>
<?=form::input('team.number', 'teamNumber', $user->team_number)?>
<?=form::input('nickname', 'name', $user->name)?>
<?=form::submit('save')?>				
<?=form::close()?>
