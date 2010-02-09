<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<base href="<?php echo url::base(); ?>" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<style type="text/css" media="screen">
			body {
				background-color: #5F0E84;
				color: #FFF;
				font-family: Helvetica, Arial, sans-serif;
				font-size: 10pt;
			}
			b,strong{
				font-weight: bold;
			}
			i,em {
				font-style:italic;
			}
			/* @group Sticky footer*/
			html,body {
				height:100%
			}
			#pushWrapper {
				min-height: 100%;
				height: auto !important;
				height: 100%;
				margin: 0 auto -80px;
				
			}
			#bottom,#push {
				height: 80px;
			}
			/* @end */
			#callToAction {
				font-size: 2em;
				margin-top: 1em;
			}
			.container_12 {
				overflow: hidden;
			}
			
			a {
				color: #7CA4EC;
				text-decoration:none;
			}
			a:hover {
				text-decoration:underline;
			}
			
			a[target=_blank] {
				background: url(img/external.png) no-repeat right center;
				padding-right: 12px;
			}

			#top {
				margin-bottom: 20px;
			}

			#top h1 {
				font-size: 28pt;
			}
				#top h1 a {
					text-decoration:none;
					color: #000;
					text-shadow: 0 1px 3px rgba(255,255,255,.5);
				}
			#top nav ul {
				overflow: hidden;
			}
			#top nav li {
				float: left;
			}
				#top nav li a,
				#top nav li span {
					display: block;
					padding: 10px;
					text-decoration:none;
				}
				#top nav li a {
					color: #FFF;
				}
				#top nav li span {
					background-color: #999;
				}
				
					#top nav li a:hover {
						text-decoration: none;
						background-color: #9d6cb4;
					}

			#alerts,#successMessages {
				clear:both;
				padding: 10px;
				margin: 0 170px 20px;
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				color: #000;
			}
			#alerts {
				border: 1px solid #7F0D0B;
				background-color: #FF6562;
			}
			#successMessages {
				border: 1px solid #007F22;
				background-color: #4EFF7D;
			}

			#main {
				line-height: 1.25;
			}
				#main li {
					padding-bottom: 10px;
				}

			#home {
				font-size: 110%;
			}

			.blogPost {
				margin-bottom: 10px;
			}
				.blogPost h2 {
					font-size: 18pt;
				}
					.blogPost h2 a {
						text-decoration:none;
					}

			#forums nav {
				margin-bottom: 10px;
			}
				#forums nav a {
					font-size:12pt;
					margin-bottom: 10px;
				}

			#forumHeader {
				border-bottom:1px solid #999;
				overflow:auto;
				margin-bottom:10px;
			}
			.forum,
			.forumTopic,
			.forumPost {
				margin-bottom: 10px;
			}
				.forum h2,
				.forumTopic h2 {
					font-size: 11pt;
				}

				.forumTopic header .posts {
					color: #999;
				}
				.forum footer,
				.forumTopic footer,
				.forumPost footer {
					color: #999;
				}
			.forumPost {
				overflow:auto;
				border-bottom: 1px solid #999;
				padding-bottom: 10px;
			}
				.forumPost footer .poster,
				.forumPost footer .postTime {
					display:block;
				}
				.forumPost footer,
				.forumPost article {
					min-height: 90px;
					/* IE6 min-height hack */
					height: auto !important; 
					height: 90px;
				}
			.pagination,
			.pagination a {
				font-size: 9pt!important;
			}

ol ol, ol ul, ul ol, ul ul {
margin-top: 1em;
margin-left: 2em;
}
p {
line-height: 1.4;
padding-bottom: 1em;
}
.blogPost ol, .blogPost ul {
list-style-position: inside;
}
.blogPost ul {
list-style-type: disc;
}
.blogPost ol {
list-style-type: decimal;
}
.blogPost ol p:first-child, .blogPost ul p:first-child {
display: inline;
}


		</style>
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
	<body>
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
				<ul id="alerts">
				<?php foreach ($errors as $error): ?>
					<li><?php echo $error; ?></li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<?php if ($messages): ?>
				<ul id="successMessages">
				<?php foreach ($messages as $message): ?>
					<li><?php echo $message; ?></li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			</header>

			<section id="main" class="container_12">
	<?php echo $controller; ?>
			</section>
			<div id="push"></div>
		</div>
		<footer id="bottom" class="container_12">
			<p class="grid_4">Organized by <a href="http://www.theforceteam.com" title="Team 1073 - The Force Team" target="_blank">Team 1073: The Force Team</a>.</p>
			<ul class="grid_4">
				<li>© 2009-<?=date('Y')?> USFirstGirls.org.</li>
				<li>Site built by <a href="http://www.eric-stern.com" title="Eric Stern - New England Web Developer and Photographer">Eric Stern</a>.</li>
			</ul>
			<p class="grid_4"><a href="https://www.wepay.com/public/donate/394" title="Donate with WePay" target="_blank"><img src="https://www.wepay.com/img/donate.png" height="46" width="231" alt="Donate with WePay" /></a></p>
		</footer>
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
