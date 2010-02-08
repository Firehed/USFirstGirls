<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Size</th>
			<th>Link</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($files as $file): ?>
		<tr id="file_<?=$file->id?>">
			<td><a href="<?=$file->path?>" target="_blank"><?=$file->name?></a></td>
			<td><?=text::bytes($file->size)?></td>
			<td><?=$file->path?></td>
			<td><a href="admin/fileDelete/<?=$file->id?>">X</a></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>
