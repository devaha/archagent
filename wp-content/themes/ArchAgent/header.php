<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // Adding In Fonts From TypeKit ?>
		<script src="//use.typekit.net/qpd2ddk.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>

		<?php // Font Awesome CDN ?>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
	

	</head>

	<body <?php body_class(); ?>>

			<?php // Top Navigation Toolbar ?>
			<header id="nav-toolbar">
				<ul>
					<?php if( have_rows('social_media', 'option') ): ?>

					    <?php while( have_rows('social_media', 'option') ): the_row(); ?>

					        <a href="<?php the_sub_field('link_to_social_media_account'); ?>" target="_blank"><li class="tb-<?php the_sub_field('social_media_platform'); ?>"><i class="fa fa-<?php the_sub_field('social_media_platform'); ?>"></i></li></a>

					    <?php endwhile; ?>

					<?php endif; ?>
					<a href=""><li id="tb-rocket"><i class="fa fa-rocket"></i></li></a>
					<a href="tel:<?php the_field('phone_number', 'option'); ?>"><li id="tb-phone"><i class="fa fa-phone"></i><span class="tb-text"><?php the_field('phone_number', 'option'); ?></span></li></a>
					<li id="tb-newsletter">
						<div id="tb-newsletter-button">
							<i class="fa fa-envelope"></i>
							<span class="tb-text">Newsletter</span>
						</div>
						<div id="tb-newsletter-dropdown" class="tb-dropdown">
							
						</div>
					</li>
					<li id="tb-search">
						<div id="tb-search-button">
							<i class="fa fa-search"></i>
							<span class="tb-text">Search</span>
						</div>
						<div id="tb-search-dropdown" class="tb-dropdown">
							<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div>
									<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
									<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="search-field" placeholder"Search"/>
									<input type="submit" id="searchsubmit" value="" />
								</div>
							</form>
						</div>
					</li>
					<a href=""><li id="tb-login"><i class="fa fa-lock"></i><span class="tb-text">Login</span></li></a>
				</ul>
			</header>

			<?php // Mobile Navigation ?>
			<nav id="mobile-nav-container">
				<div id="mobile-logo-container">
						<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php the_field('site_logo', 'option'); ?>" class="mobile-logo" alt="ArchAgent Mobile Logo"></a>
				</div>
				<nav role="navigation" id="mobile-nav" class="">
					<?php bones_main_nav(); ?>
				</nav>
			</nav>
			<div id="mobile-nav-button"><div id="burger"></div></div>
			<?php // Begin Container ?>
			<div id="container">

			<?php // Main Navigation ?>
			<header id="outer-header" class="header full" role="banner">
				<div id="inner-header" class="semi tiny-twelvecol">
					<div id="logo-container" class="tiny-twelvecol medium-threecol large-threecol first">
						<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php the_field('site_logo', 'option'); ?>" class="logo" alt="ArchAgent Logo"></a>
					</div>
					<nav role="navigation" id="main-nav" class="medium-ninecol large-ninecol last">
						<?php bones_main_nav(); ?>
					</nav>
				</div>
			</header>
