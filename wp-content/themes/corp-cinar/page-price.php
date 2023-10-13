<?php
/**
* Template Name: Цены
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header(); ?>

<? get_template_part( 'parts/sections/main-section', null, $params = ['inside' => 1]); ?>
<? get_template_part( 'parts/sections/section-custom-calc', null, $params = ['bgcolor' => '#121E2D']); ?>
<? get_template_part( 'parts/sections/section-links'); ?>
<? get_template_part( 'parts/sections/section-text-row'); ?>
<? get_template_part( 'parts/sections/section-form-2'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set']); ?>
<?php get_footer();