<table>
	<thead>
		<tr>
			<th>Team</th>
			<th>Location</th>
			<th>Girls Recruited</th>
			<th>Methods used</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($teams as $team): ?>
		<tr>
			<td><?php echo $team->number; ?>: <?php echo $team->name; ?></td>
			<td><?php echo $team->location; ?></td>
			<td><?php echo $team->recruited; ?></td>
			<td><?php echo text::auto_p($team->methods); ?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>