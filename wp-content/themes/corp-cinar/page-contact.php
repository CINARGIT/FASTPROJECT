<?php
/**
* Template Name: Контакты
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header();?>

<? get_template_part( 'parts/sections/main-section-mini', null, $params = ['inside' => 1]); ?>
<? get_template_part( 'parts/sections/section-contact'); ?>
<? get_template_part( 'parts/sections/section-form-contact'); ?>

<?php get_footer();	?> 

	