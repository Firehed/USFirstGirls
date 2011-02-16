<dl class="grid_6 alpha">
	<dt>Your Profile</dt>
	<dd><a href="profile/edit">Edit</a></dd>
	
	<dt>Forum Nickname</dt>
	<dd><?=$user->name?></dd>
	
	<dt>Team Number</dt>
	<dd><?php echo $user->team_number; ?></dd>
	
	<dt>Forum Avatar</dt>
	<dd>
		<img src="<?=$user->avatarUrl?>" height="50" width="50" alt="<?=$user->name?>" /><br />
		<p>To change your forum avatar, sign up at <a href="http://en.gravatar.com/">Gravatar</a> with the email address you use here and we'll update the picture automatically.</p>
	</dd>
</dl>

