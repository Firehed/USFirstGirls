<?=form::open()?>
<?=form::input('admin.forums.newName', 'name', $this->input->post('name'))?>
<?=form::input('admin.forums.newDesc', 'description', $this->input->post('description'))?>
<?=form::submit('admin.forums.newButton')?>
<?=form::close()?>
<ul>
<?php foreach ($forums as $forum): ?>
	<li class="forum">
		<header>
			<h2><?php echo $forum->name; ?></h2>
		</header>
		<article><?php echo $forum->description; ?></article>
		<footer>
			<span class="topics"><?php echo $forum->topicCount; ?> <?php echo inflector::plural('topic', $forum->topicCount); ?></span>
			with
			<span class="posts"><?php echo $forum->postCount; ?> <?php echo inflector::plural('post', $forum->postCount); ?></span>
		</footer>
	</li>
<?php endforeach; ?>
</ul>