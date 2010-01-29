<header id="forumHeader" class="grid_12">
	<nav class="grid_8 alpha">
		<a href="forum" title="<?php echo Kohana::lang('site.nav.forums.title'); ?>"><?php echo Kohana::lang('site.nav.forums.anchor'); ?></a> &raquo;
		<a href="forum/view/<?php echo $topic->forum_id; ?>"><?php echo $topic->forum->name; ?></a> &raquo;
		<a href="forum/topic/<?php echo $topic->id; ?>"><?php echo $topic->title; ?></a>
		<?php echo $pagination; ?>
	</nav>
	<nav class="grid_4 omega">
		<?php if ($this->user): ?>
		<a href="#foo">Reply to this topic</a>	
		<?php else: ?>
		<a href="signin"  title="<?php echo Kohana::lang('site.nav.signin.title');  ?>"><?php echo Kohana::lang('site.nav.signin.anchor');  ?></a> or 
		<a href="signup"  title="<?php echo Kohana::lang('site.nav.signup.title');  ?>"><?php echo Kohana::lang('site.nav.signup.anchor');  ?></a> to reply.
		<?php endif; ?>
	</nav>
</header>


<ul id="forumPosts" class="grid_9">
<?php foreach ($posts as $post): ?>
	<li class="forumPost">
		<footer class="grid_3 alpha">
			<span class="poster"><?php echo $post->user->name; ?></span>
			<img src="http://www.gravatar.com/avatar/<?php echo md5($post->user->email); ?>.jpg?r=g&amp;s=50" height="50" width="50" />
			
			<span class="postTime">Posted <time datetime="<?php echo $post->timeCreatedW3C; ?>"><?php echo text::relativeTime($post->timeCreated); ?></time></span>
		</footer>
		<article class="grid_6 omega"><?php echo nl2br($post->body); ?></article>
	</li>
<?php endforeach; ?>
</ul>
<div class="grid_3">
	<!-- This space reserved... -->
</div> <!-- div .grid_3 -->

<?php if ($this->user): ?>
<form action="<?php echo url::current(); ?>" method="post" class="grid_7 prefix_2 suffix_3">
	<p>Reply to this topic:</p>
	<fieldset>
		<?php echo form::csrf(); ?>
		
		<label for="body">Message</label>
		<textarea id="body" name="body" rows="10" cols="40"></textarea>
		
		<button type="submit">Post Reply</button>
		
	</fieldset>
</form>
<?php endif; ?>

<nav class="grid_12"><?php echo $pagination; ?></nav>
