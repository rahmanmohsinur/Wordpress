<!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" lang="bn">
<![endif]-->
<!--[if !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <title><?php the_title(); ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" sizes="16x16 24x24 32x32 48x48">
        <link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" sizes="16x16 24x24 32x32 48x48">
        <link rel="apple-touch-icon-precomposed" href="https://s0.wp.com/i/webclip.png">
        <link rel="alternate" href="http://mohammadmohsin.altervista.org/blog<?php echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH); ?>" hreflang="bn-bd" />
        <!--[if lt IE 8]>
        <link rel='stylesheet' id='highlander-comments-ie7-css'  href='https://s2.wp.com/wp-content/mu-plugins/highlander-comments/style-ie7.css?m=1351637563g&#038;ver=20110606' type='text/css' media='all' />
        <![endif]-->
        <?php wp_head(); ?>
		<style>
		    .p-relative { position: relative; }
			.p-absolute { position: absolute; }
			.card-body { min-height: 244px; }
			.card-body .p-absolute { bottom: 1.25rem; }
			.recent-posts h4 { font-size: 1rem; margin: 0 0; max-height: 38px; overflow: hidden; }
			.list-group-flush .list-group-item { border: 0; background-color: transparent; }
			.link_overlay { position: absolute; left: 0; top: 0; right: 0; bottom: 0; z-index: 1; }
			.list-group-item:hover .text-dark, .list-group-item:hover .text-secondary { color: #1d2124!important; }
			
			@media (min-width: 576px) and (max-width: 767.99px) {
                .navbar-expand-md>.container, .navbar-expand-md>.container-fluid { padding-right: 15px; padding-left: 15px; }
		    }
			
			@media (min-width: 576px) {
			    .navbar { padding: .5rem 0; }
			}
			
			@media (min-width: 1200px) {
                .container { max-width: 98%; max-width: 1320px; }
				.recent-posts img { height: 108px; }
		    }
		</style>
    </head>
  
    <body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
        <meta itemprop="accessibilityControl" content="fullKeyboardControl">
        <meta itemprop="accessibilityControl" content="fullMouseControl">
        <meta itemprop="accessibilityHazard" content="noFlashingHazard">
        <meta itemprop="accessibilityHazard" content="noMotionSimulationHazard">
        <meta itemprop="accessibilityHazard" content="noSoundHazard">
        <meta itemprop="accessibilityAPI" content="ARIA">
        <div class="wrapper">
            <?php include 'nav.php' ?>



