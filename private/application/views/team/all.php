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
			<td><?=$team->number?>: <?=$team->name?>
				<?php if ($team->website): ?>
					<a href="<?=$team->website?>" target="_blank">(web)</a>
				<?php endif; ?>
			</td>
			<td><?php echo $team->location; ?></td>
			<td><?php echo $team->recruited; ?></td>
			<td><?php echo text::auto_p($team->methods); ?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>