<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<base href="<?=url::base()?>" />
		<title><?=$title?></title>
		<?=$links?>
		<link rel="stylesheet" href="style.css?<?=filemtime(DOCROOT.'style.css')?>" type="text/css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<script>
			// HTML5 "shiv"
			document.createElement('header');
			document.createElement('footer');
			document.createElement('section');
			document.createElement('aside');
			document.createElement('nav');
			document.createElement('article');
		</script>
		<!--[if lt IE 8]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
		<![endif]-->
	</head>
	<body id="js_<?=$this->session->get('js', 'unknown')?>">
		<div id="pushWrapper">
			<header id="top" class="container_12">
				<a href="" title="<?php echo Kohana::lang('site.nav.home.title'); ?>"><img src="img/logoColoredSquares.gif" width="220" height="147" alt="US FIRST Logo" class="grid_3"/></a>
				<div class="grid_9">
					<h1 class="grid_4 alpha"><a href="" title="<?php echo Kohana::lang('site.nav.home.title'); ?>"><?php echo Kohana::lang('site.home.title'); ?></a></h1>
					<nav class="grid_5 omega">
						<ul>
							<?php echo new View('topNav'); ?>
						</ul>
					</nav>
					<h2 class="grid_9 alpha omega" id="callToAction"><?php echo Kohana::lang('site.home.callToAction'); ?></h2>
				</div>

<?php if ($errors): ?>
				<ul id="alerts"><?php foreach ($errors as $error): ?><li><?php echo $error; ?></li><?php endforeach; ?></ul>
<?php endif; ?>

<?php if ($messages): ?>
				<ul id="successMessages"><?php foreach ($messages as $message): ?><li><?php echo $message; ?></li><?php endforeach; ?></ul>
<?php endif; ?>

			</header>

			<section id="main" class="container_12">
	<?php echo $controller; ?>
			</section>
			<div id="push"></div>
		</div>
		<footer id="bottom" class="container_12">
			<ul class="grid_4">
				<li>Organized by <a href="http://www.theforceteam.com" title="Team 1073 - The Force Team" target="_blank">Team 1073: The Force Team</a></li>
				<li>Site built by <a href="http://www.eric-stern.com" title="Eric Stern - New England Web Developer and Photographer">Eric Stern</a></li>
			</ul>
			<ul class="grid_4">
				<li>© 2009-<?=date('Y')?> USFirstGirls.org</li>
				<li><a href="contact">Contact us</a></li>
				<li>Join us on <a href="http://www.facebook.com/USFirstGirls" title="USFirstGirls on Facebook" target="_blank">Facebook</a> and <a href="http://twitter.com/USFirstGirls" title="USFirstGirls on Twitter" target="_blank">Twitter</a>!</li>
			</ul>
			<ul class="grid_4">
				<li><a href="https://www.wepay.com/public/donate/394" title="Donate with WePay" target="_blank"><img src="https://www.wepay.com/img/donate.png" height="46" width="231" alt="Donate with WePay" /></a></li>
				<li><a href="donate">Learn more about donating</a></li>
			</ul>
		</footer>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" charset="utf-8">//<![CDATA[
// JS on all pages
$(function(){
	// Javascript detection
	if ($("body#js_unknown").length == 1) {
		$("body").attr('id', 'js_on');
		$.get('ajax/jsSupport');
	}

	// Alert message flash
	$("#alerts").slideDown('slow').prependTo($('body')).delay($('#alerts li').length * 2500).slideUp('slow');

	// Success message flash
	$("#successMessages").slideDown('slow').prependTo($('body')).delay($('#successMessages li').length * 2500).slideUp('slow');

});

// Any additional per-page JS
<?=$JS?>

		//]]></script>
		
		<!-- Google Analytics -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12895211-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script');
				ga.src = 'https://ssl.google-analytics.com/ga.js';
				ga.setAttribute('async', 'true');
				document.documentElement.firstChild.appendChild(ga);
			})();
		</script>
		<!-- End Google Analytics -->
	</body>
</html>
