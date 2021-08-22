<?php echo $pagination; ?>

<table id="forumPosts">
	<thead>
		<tr>
			<th>Poster</th>
			<th>Time</th>
			<th>Body</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>
<?php foreach ($posts as $post): ?>
		<tr>
			<td><a href="admin/user/<?php echo $post->user_id ?>"><?=$post->user->name?></a></td>
			<td><?=text::relativeTime($post->timeCreated)?></td>
			<td><?=text::limit_chars($post->body, 80)?></td>
			<td>
				<a href="forum/topic/<?=$post->forum_topic_id?>#post<?=$post->id?>">View</a>
				<a onclick="return confirm('Really delete this post?')" href="admin/forumPostDelete/<?=$post->id?>">Delete</a>
			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>