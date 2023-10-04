<?
/*
Template Name: buttonsandinputs
Template Post Type: section_preview
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
	<style>
		.exp_littleform_item_wrapper{
			width:340px;
			margin:0 auto;
		}
		
		.exp_littleform_item_wrapper input
		{
			width:100%;
		}
		
	</style>
</head>
<div class="wrapper">
	<section class="section-common" style="background-color:<?=get_field('bg_exp_color', 'option')?>">
		<div class="exp_littleform_item_wrapper">
		<div class="littleform_item">
			<span class="wpcf7-form-control-wrap" data-name="your-name">
				<input size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Поле ввода" value="" type="text" name="your-name">
			</span>
		</div>
		
		<div class="order_button_wrapper">
			<button class="order_button">Кнопка на сайте</button>
		</div>
		
		</div>
	</section>
</div>
<?php wp_footer(); ?>
</body>
</html>
