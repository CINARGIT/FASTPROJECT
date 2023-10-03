<?php
/**
* Template Name: Калькулятор
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header(); ?>

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
?>

<? 
if(get_field('vyberite_stili_form', 'styleset')) { 
	get_template_part( 'parts/'.get_field('vyberite_stili_form', 'styleset').'/section-form'); 
}
?>

<? 
if(!empty(get_field('vyberite_stili_form_2', get_option('page_on_front')))) { 
	get_template_part( 'parts/'.get_field('vyberite_stili_form_2', get_option('page_on_front')).'/section-form-2'); 
}
?>




<?php get_footer();