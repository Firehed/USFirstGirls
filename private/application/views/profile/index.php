<dl class="grid_6 alpha">
	<dt>Your Profile</dt>
	<dd><a href="profile/edit">Edit</a></dd>
	
	<dt>Team Number</dt>
	<dd><?php echo $user->team_number; ?></dd>
</dl>

<dl class="grid_6 omega">
	<dt>Your Team's Profile</dt>
	<dd><a href="team/edit">Edit</a></dd>
	
	<dt>Girls Recruited</dt>
	<dd><?php echo $team->recruited; ?> (<?php echo $team->girls; ?>/<?php echo $team->size; ?>)</dd>

	<dt>Methods Used to Recruit Members</dt>
	<dd><?php echo $team->methods; ?></dd>
</dl>
