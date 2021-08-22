<header id="forumHeader" class="grid_12">
	<nav class="grid_8 alpha">
		<a href="forum" title="<?php echo Kohana::lang('site.nav.forums.title'); ?>"><?php echo Kohana::lang('site.nav.forums.anchor'); ?></a> &raquo;
	</nav>
	<nav class="grid_4 omega">
		<?php if ($this->user): ?>
		<?php else: ?>
		<a href="signin"  title="<?php echo Kohana::lang('site.nav.signin.title');  ?>"><?php echo Kohana::lang('site.nav.signin.anchor');  ?></a> or 
		<a href="signup"  title="<?php echo Kohana::lang('site.nav.signup.title');  ?>"><?php echo Kohana::lang('site.nav.signup.anchor');  ?></a> to post in the forums.
		<?php endif; ?>
	</nav>
</header>
<ul id="forums" class="grid_12">
<?php foreach ($forums as $forum): ?>
	<li class="forum" id="forum<?=$forum->id?>">
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