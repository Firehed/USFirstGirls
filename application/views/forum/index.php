<ul id="forums" class="grid_12">
<?php foreach ($forums as $forum): ?>
	<li class="forum">
		<header>
			<h2><a href="forum/view/<?php echo $forum->id; ?>"><?php echo $forum->name; ?></a></h2>
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