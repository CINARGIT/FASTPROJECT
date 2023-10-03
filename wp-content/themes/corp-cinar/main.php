<?php
/**
* Template Name: Главная страница
*/
?>
<?php get_header(); ?>

<? stylePart('vyberite_stili_glavnogo_ekrana', 'main-section'); ?>
<? stylePart('vyberite_stil_bloka_o_kompanii', 'section-about'); ?>
<? stylePart('odds_style_select', 'section-odds'); ?>
<? stylePart('vyberite_stili_form', 'section-form'); ?>
<? stylePart('blog_select', 'section-blog'); ?>
<? stylePart('section-uslugi', 'section-uslugi'); ?>
<? stylePart('blog_select', 'section-blog', $params = ['blog_type' => 'news']); ?>
<? stylePart('section-vopros-otvet', 'section-vopros-otvet', $params = ['sclass' => 'excludem colored']); ?>
<? stylePart('vyberite_stili_form_2', 'section-form-2'); ?>

<?php get_footer();	?> 



