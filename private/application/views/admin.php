<nav class="grid_2">
	<ul>
	<?php foreach ($this->pages as $page): ?>
		<?php if ($this->_allowed($page)):  ?><li><a href="admin/<?php echo $page; ?>"  title="<?php echo Kohana::lang("site.admin.$page.title");  ?>"><?php echo Kohana::lang("site.admin.$page.anchor");  ?></a></li><?php endif; ?>
	<?php endforeach; ?>
	</ul>
</nav>
<div id="adminContent" class="grid_10">
<?php echo $method; ?>	
</div> <!-- div #adminContent .grid_10 -->
