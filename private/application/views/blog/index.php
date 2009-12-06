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