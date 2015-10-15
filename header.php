<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package thebank
 * @since thebank 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 7]>         <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="<?php echo get_template_directory_uri(); ?>/images/misc/favicon.png" rel="shortcut icon" type="image/x-icon">

    <?php wp_head(); ?>

	<script type="text/javascript">
	   var site_url = '<?php bloginfo('url'); ?>';
	</script>    

</head>
<body <?php body_class(); ?>>
<div id="tortilla">
	
	<header id="header" role="banner">
		<a class="menu-btn" href="#"><span></span></a>	
		<div class="inner container">
			<h1 class="logo-container">
				<a class="logo icon" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a>
			</h1>	
			<?php wp_nav_menu( array( 'depth' => 0, 'theme_location' => 'primary', 'menu_class' => 'clearfix menu', 'container' => 'nav', 'container_class' => 'primary-navigation navigation' )); ?>
			<a href="http://thebank.co.uk" class="icon icon-logo2-bank"></a>
		</div>
		<?php include_module('subnavigation'); ?>			
	</header><!-- #header -->

	<div id="main" class="site-main" role="main">
