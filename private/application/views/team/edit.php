<?=form::open()?>
<?=form::input('team.name', 'name', $team->name)?>
<?=form::input('team.location', 'location', $team->location)?>		
<?=form::input('team.recruited', 'recruited', $team->recruited)?>		
<?=form::textarea('team.methods', 'methods', $team->methods)?>		
		
<?=form::input('team.girls', 'girlsOnTeam', $team->girls)?>
<?=form::input('team.size', 'teamSize', $team->size)?>
		
<?=form::submit('save')?>
<?=form::close()?>