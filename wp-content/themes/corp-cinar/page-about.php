<?php
/**
* Template Name: О компании
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header(); ?>

<? get_template_part( 'parts/sections/main-section', null, $params = ['inside' => 1]); ?>

<? get_template_part( 'parts/sections/section-about', null, $args = ['field_group' => 'about_set']); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set']); ?>
<? get_template_part( 'parts/sections/section-docs'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set_2']); ?>
<? get_template_part( 'parts/sections/section-odds'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set_3']); ?>
<? get_template_part( 'parts/sections/section-projects'); ?>
<? get_template_part( 'parts/sections/section-mission'); ?>
<?php get_footer();