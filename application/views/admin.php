<nav class="grid_2">
	<ul>
		<?php if ($this->_allowed('user')): ?><li>Users</li><?php endif; ?>
		<?php if ($this->_allowed('forum')): ?><li>Forums</li><?php endif; ?>
		<?php if ($this->_allowed('blog')): ?><li>Blog</li><?php endif; ?>
	</ul>
</nav>
<div id="adminContent" class="grid_10">
<?php echo $method; ?>	
</div> <!-- div #adminContent .grid_10 -->
