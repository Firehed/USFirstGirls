<nav class="grid_8">
	<a href="forum" title="<?php echo Kohana::lang('site.nav.forums.title'); ?>"><?php echo Kohana::lang('site.nav.forums.anchor'); ?></a> &raquo;
	<a href="forum/view/<?php echo $forum->id; ?>"><?php echo $forum->name; ?></a>
	<?php echo $pagination; ?>
</nav>
<nav class="grid_4">
	<?php if ($this->user): ?>
	<a href="forum/newTopic/<?php echo $forum->id; ?>">New topic</a>	
	<?php else: ?>
	<a href="signin"  title="<?php echo Kohana::lang('site.nav.signin.title');  ?>"><?php echo Kohana::lang('site.nav.signin.anchor');  ?></a> or 
	<a href="signup"  title="<?php echo Kohana::lang('site.nav.signup.title');  ?>"><?php echo Kohana::lang('site.nav.signup.anchor');  ?></a> to post in the forums.
	<?php endif; ?>
</nav>

<ul id="forumTopics" class="grid_12">
<?php foreach ($topics as $topic): ?>
	<li class="forumTopic">
		<header>
			<h2><a href="forum/topic/<?php echo $topic->id; ?>"><?php echo $topic->title; ?></a></h2>
			<span class="posts"><?php echo $topic->postCount; ?> <?php echo inflector::plural('post', $topic->postCount); ?></span>
		</header>
		<article><?php echo text::limit_words($topic->firstPost->body, 15); ?></article>
		<footer>
			<div class="firstPost">
				Started 
				<time datetime="<?php echo $topic->firstPost->timeCreatedW3C; ?>"><?php echo text::relativeTime($topic->firstPost->timeCreated); ?></time>
				by
				<span class="poster"><?php echo $topic->user->name; ?></span>
			</div> <!-- div .firstPost -->
			<div class="lastPost">
				Last post 
				<time datetime="<?php echo $topic->lastPost->timeCreatedW3C; ?>"><?php echo text::relativeTime($topic->lastPost->timeCreated); ?></time>
				
				by <?php echo $topic->lastPost->user->name; ?> 
			</div> <!-- div .lastPost -->
		</footer>
	</li>
<?php endforeach; ?>
</ul>

