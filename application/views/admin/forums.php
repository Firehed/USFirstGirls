<form action="<?php echo url::current(); ?>" method="post">
	<fieldset>
		<?php echo form::csrf(); ?>

		<label for="name"><?php echo Kohana::lang('site.admin.forums.newName'); ?></label>
		<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" id="name" />

		<label for="description"><?php echo Kohana::lang('site.admin.forums.newDesc'); ?></label>
		<input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" id="description" />
		
		<button type="submit"><?php echo Kohana::lang('site.admin.forums.newButton'); ?></button>
	</fieldset>
</form>
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