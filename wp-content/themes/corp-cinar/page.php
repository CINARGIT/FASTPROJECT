<?php
/**
 * The template for displaying all page.
 *
 * @package storefront
 */
 
?>
<?php get_header(); ?>

<?php if( have_rows('flex_content') ) {  ?>
	<?php while ( have_rows('flex_content') ) { the_row(); ?>
		<? get_template_part( 'parts/sections/'.get_row_layout()); ?>
	<?php } ?>
<?php } ?>



<?php get_footer(); ?>