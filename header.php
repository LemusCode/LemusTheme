<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P|Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/header.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/footer.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/loops.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/post.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/sidebar.css">
	<title><?php wp_title(); ?></title>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/changeclass.js"></script>

	<?php wp_head(); ?>
</head>
<body>
	<header>
		<div class="mobile_menu">
			<div class="site_name">
				<a href="<?php echo get_option('home'); ?>" class="blogname"><?php bloginfo('name'); ?></a> 
			</div>
			<div class="show_menu">
				<i class="fa fa-arrow-right" style="display: none;"></i>
				<i class="fa fa-bars"></i>

			</div>
		</div>
		<div class="show_mobile_menu">
			
			<div class="top_menu">
				<div class="social">
					<a href="http://www.facebook.com/lemuscode"><i class="fa fa-facebook-official"></i></a>
					<a href="http://www.facebook.com/lemuscode"><i class="fa fa-instagram"></i></a>
					<a href="http://www.facebook.com/lemuscode"><i class="fa fa-twitter"></i></a>
					<a href="https://lemuscode.mx/feed/"><i class="fa fa-feed"></i></a>
				</div>
				<div class="disclaimer">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'disclaimer',
							'menu_id' => 'Disclaimer',
						) );
						?>
				</div>
			</div>
			<div class="primary_menu hover_display" id="ChangeClass">
				<div class="site_name">
					<a href="<?php echo get_option('home'); ?>" class="blogname"><?php bloginfo('name'); ?></a> 
					<span class="description"><?php bloginfo('description'); ?></span>
				</div>
				<div class="menu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'top',
							'menu_id' => 'Principal',
						) );
						?>
				</div>
			</div>
		</div>
	</header>
	
   

<div class="cuerpo_general"><!--Termina en el Footer-->

	
   