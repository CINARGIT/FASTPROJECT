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

<? stylePart('vyberite_stili_glavnogo_ekrana', 'main-section', $params = ['inside' => 1]); ?>
<? get_template_part( 'parts/senergo/section-oddsabout');  ?>
<? stylePart('vyberite_stil_bloka_o_kompanii', 'section-about', $params = ['field_group' => 'about_set']); ?>
<? stylePart('blog_select', 'section-blog'); ?>
 <? stylePart('vyberite_stili_form_2', 'section-form-2'); ?>
<?php get_footer();