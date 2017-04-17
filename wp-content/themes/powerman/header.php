<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-scrolling-animations="false" data-header="fixed-header">
<div class="layout-theme animated-css" data-header="sticky" data-header-top="200">
<!-- Loader -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- Loader end -->


<div id="wrapper">
	<?php echo powerman_get_theme_header();?>
