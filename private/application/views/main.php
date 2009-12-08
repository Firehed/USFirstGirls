<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<base href="<?php echo url::base(); ?>" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<style type="text/css" media="screen">
			body {
/*				background-color: #FFF;*/
/*				background: #FFF url(img/squares2.png) top center;*/
				background: #FFF url(img/squaresFaded.png) top center;
				font-family: Helvetica, Arial, sans-serif;
				font-size: 10pt;
			}
			.container_12 {
				overflow: hidden;
			}
			a[target=_blank] {
				background: url(img/external.png) no-repeat right center;
				padding-right: 12px;
			}

			#top h1 {
				font-size: 28pt;
			}
				#top h1 a {
					text-decoration:none;
					color: #000;
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
					color: #999;
				}
					#top nav li a:hover {
						color: #444;
						text-decoration: underline;
					}

			#alerts,#successMessages {
				clear:both;
				padding: 10px;
				margin: 0 170px 20px;
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
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

			.blogPost {
				margin-bottom: 10px;
			}
				.blogPost h2 {
					font-size: 18pt;
				}
					.blogPost h2 a {
						color: #000;
						text-decoration:none;
					}
						.blogPost h2 a:hover {
							text-decoration: underline;
						}

			#forums nav {
				margin-bottom: 10px;
			}
				#forums nav a {
					color: #000;
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
					.forum h2 a,
					.forumTopic h2 a {
						color: #000;
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

			.pagination,
			.pagination a {
				font-size: 9pt!important;
			}
			
			#bottom {
				margin-top: 10px;
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
	</head>
	<body>
		<header id="top" class="container_12">
			<a href="" title="<?php echo Kohana::lang('site.nav.home.title'); ?>"><img src="img/FIRSTlogoR_color_rgb_140.gif" width="140" height="122" alt="US FIRST Logo" class="grid_2"/></a>
			<h1 class="grid_5"><a href="" title="<?php echo Kohana::lang('site.nav.home.title'); ?>"><?php echo Kohana::lang('site.home.title'); ?></a></h1>
			<nav class="grid_5">
				<ul>
					<?php echo new View('topNav'); ?>
				</ul>
			</nav>
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
	
		<footer id="bottom" class="container_12">
			<nav class="grid_3">
				<ul>
					<li><a href="teams" title="USFirstGirls.org Teams">Teams</a></li>
				</ul>
			</nav>
			<nav class="grid_3">
				<ul>
					<li><a href="http://www.usfirst.org" title="FIRST Robotics official site" target="_blank">US FIRST Official Site</a></li>
					<li><a href="http://www.theforceteam.com" title="Team 1073 - The Force Team" target="_blank">The Force Team</a></li>
				</ul>
			</nav>
			<nav class="grid_3">
				<ul>
					<li>Site by <a href="http://www.eric-stern.com" title="Eric Stern - New England Web Developer and Photographer">Eric Stern</a> with input and feedback from the members and mentors of The Force Team</li>
				</ul>
			</nav>
			<p class="grid_3">© USFirstGirls.org</p>
		</footer>
	</body>
</html>
