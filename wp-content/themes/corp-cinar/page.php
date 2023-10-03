
<?php
/**
 * The template for displaying all page.
 *
 * @package storefront
 */
 
?>

<?php 
	get_header(); 
?>



	
<div class="senergo section-text">

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs', null, $params = ['h1' => get_the_title(), 'class' => 'senergo pbmin']);
} 
?>
	<div class="container">
	<div class="container-in">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
	<div class="clearfix"></div>
	
		<?php 
$images = get_field('gallery');

$size = 'medium'; // (thumbnail, medium, large, full or custom size)
if( $images ): ?>
    	<div class="gallery_row row">
			<?php foreach( $images as $image ): ?>
				<div class="col-xs-12 col-md-3 sg_item_wrap">
					<div class="sg_item">
						<a href="<?php echo esc_url($image['sizes']['large']); ?>" data-fancybox="gallery">
							<img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</a>
					</div>
				</div>
             <?php endforeach; ?>  
       </div>
<?php endif; ?>
	
	
	
	</div>
	</div>
	
</div>


<?php get_footer();