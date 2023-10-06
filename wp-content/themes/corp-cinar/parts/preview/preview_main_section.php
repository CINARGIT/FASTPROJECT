<?
/*
Template Name: Меню
Template Post Type: main_section
*/
?> 
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, user-scalable=no, shrink-to-fit=no" />
	<title><?php echo wp_get_document_title();?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<? get_template_part( 'parts/header-root-css'); ?>
</head>
<div class="wrapper">
	<? get_template_part( 'parts/sections/main-section'); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>