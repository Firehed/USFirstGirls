<form action="" method="post">
	<fieldset>
		<label for="title"><?php echo Kohana::lang('site.admin.blogs.newTitle'); ?></label>
		<input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" id="title" />
		
		<label for="summary"><?php echo Kohana::lang('site.admin.blogs.newSummary'); ?></label>
		<textarea id="summary" name="summary" rows="10" cols="40"><?php echo $this->input->post('summary'); ?></textarea>
		
		<label for="body"><?php echo Kohana::lang('site.admin.blogs.newBody'); ?></label>
		<textarea id="body" name="body" rows="10" cols="40"><?php echo $this->input->post('body'); ?></textarea>
		
		<button type="submit"><?php echo Kohana::lang('site.admin.blogs.newButton'); ?></button>
	</fieldset>
</form>

<?php echo $pagination; ?>

<ul id="blogPosts">
<?php foreach ($posts as $post): ?>
	<li>
		<article class="blogPost">
			<header>
				<h2><a href="blog/post/<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h2>
				Posted on 
				<time datetime="<?php echo $post->timeCreatedW3C; ?>"><?php echo date('D, M j, Y', $post->timeCreated); ?></time>
				by <?php echo $post->user->name; ?>
			</header>
			<div class="summary"><?php echo $post->summary; ?></div>
			<footer>
				<a href="blog/post/<?php echo $post->id; ?>">Read more...</a>
				<!-- Metadata -->
			</footer>
		</article>
	</li>
<?php endforeach; ?>
</ul>