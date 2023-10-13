<?php
/**
 * The template for displaying all page.
 *
 * @package storefront
 */
 
?>
<?php get_header(); ?>

<? get_template_part( 'parts/sections/main-section-mini', null, $params = ['inside' => 1]); ?>


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>



<?php get_footer();