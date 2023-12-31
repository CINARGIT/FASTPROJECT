<?php
/*
 * Hero Layout Render Template.
 *
 * @array   $layout      Layout settings (without values)
 * @array   $field       Flexible content field settings
 * @bool    $is_preview  True in Administration
 */
 
?>

<?php if( have_rows('flex_head', 'option') ) {  ?>
	<?php while ( have_rows('flex_head', 'option') ) { the_row(); ?>
		<? get_template_part( 'parts/headers/'.get_row_layout()); ?>
	<?php } ?>
<?php } ?>
