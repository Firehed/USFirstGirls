<?php
$alwaysLinks = array(
	'home'   => '',
	'blog'   => 'blog',
	'forums' => 'forum'
);
$loggedInLinks = array(
	'profile' => 'profile',
	'signout' => 'signout'
);
$loggedOutLinks = array(
	'signin' => 'signin',
	'signup' => 'signup'
);

foreach ($alwaysLinks as $key => $url) {
	if (url::current() == $url OR ($url == '' AND url::current() == 'home/index' /*routing hack*/)) {
		?><li><span><?php echo Kohana::lang("site.nav.$key.anchor"); ?></span></li><?php
	}
	else {
		?><li><a href="<?php echo $url; ?>" title="<?php echo Kohana::lang("site.nav.$key.title"); ?>"><?php echo Kohana::lang("site.nav.$key.anchor"); ?></a></li><?php
	}
}

if ($this->user) {
	foreach ($loggedInLinks as $key => $url) {
		if (url::current() == $url) {
			?><li><span><?php echo Kohana::lang("site.nav.$key.anchor"); ?></span></li><?php
		}
		else {
			?><li><a href="<?php echo $url; ?>" title="<?php echo Kohana::lang("site.nav.$key.title"); ?>"><?php echo Kohana::lang("site.nav.$key.anchor"); ?></a></li><?php
		}
	}
}
else {
	foreach ($loggedOutLinks as $key => $url) {
		if (url::current() == $url) {
			?><li><span><?php echo Kohana::lang("site.nav.$key.anchor"); ?></span></li><?php
		}
		else {
			?><li><a href="<?php echo $url; ?>" title="<?php echo Kohana::lang("site.nav.$key.title"); ?>"><?php echo Kohana::lang("site.nav.$key.anchor"); ?></a></li><?php
		}
	}
}
?>

