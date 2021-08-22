<?=form::open()?>
<p>Really delete <?=$file->name?>?</p>
<?=form::submit('yes')?>
<a href="admin/files">No - back</a>
<?=form::close()?>