<table>
	<thead>
		<tr>
			<th>Team Number</th>
			<th>Girls Recruited</th>
			<th>Methods used</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($teams as $team): ?>
		<tr>
			<td><?php echo $team->number; ?></td>
			<td><?php echo $team->recruited; ?></td>
			<td><?php echo text::auto_p($team->methods); ?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>