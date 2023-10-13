<?php
/**
* Template Name: Главная страница
*/
?>
<?php get_header(); ?>

<? get_template_part( 'parts/sections/main-section'); ?>
<? get_template_part( 'parts/sections/section-about'); ?>
<? get_template_part( 'parts/sections/section-uslugi'); ?>
<? get_template_part( 'parts/sections/section-projects'); ?>
<? get_template_part( 'parts/sections/section-employees'); ?>
<? get_template_part( 'parts/sections/section-custom-calc'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set']); ?>
<? get_template_part( 'parts/sections/section-steps'); ?>
<? get_template_part( 'parts/sections/section-odds'); ?>
<? get_template_part( 'parts/sections/section-form'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set_2']); ?>
<? get_template_part( 'parts/sections/section-odds-2'); ?>
<? get_template_part( 'parts/sections/section-consist'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set_3']); ?>
<? get_template_part( 'parts/sections/section-form-2'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set_4']); ?>
<? get_template_part( 'parts/sections/section-clients'); ?>
<? get_template_part( 'parts/sections/section-reviews'); ?>
<? get_template_part( 'parts/sections/section-vopros-otvet'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set_5']); ?>
<? get_template_part( 'parts/sections/section-achiev'); ?>
<? get_template_part( 'parts/sections/section-text', null ,$args = ['field_group' => 'text_set_6']); ?>
<?php get_footer();	?> 



