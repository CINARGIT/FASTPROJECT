<?php
/**
* Template Name: Упрощенно: Продукт/услуга
* Template Post Type: post, page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header(); ?>
<?
if(get_field('vyberite_stili_glavnogo_ekrana', get_option('page_on_front'))) { 
	get_template_part( 'parts/'.get_field('vyberite_stili_glavnogo_ekrana', get_option('page_on_front')).'/main-section');
} 
?>

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
?>

<section class="section-common lada-armenia section-content">
	<div class="container">
	<div class="content-container">
	<div class="section-content-in">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
	</div>
	
<?php 
$images = get_field('galereya');

$size = 'large'; // (thumbnail, medium, large, full or custom size)
if( $images ): ?>
    	<div class="gallery_content">
			<?php foreach( $images as $image ): ?>
						<a href="<?php echo esc_url($image['sizes']['large']); ?>" data-fancybox="gallery">
							 <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</a>
					
             <?php endforeach; ?>  
       </div>
<?php endif; ?>
	
	
	</div>
	</div>
</section>


<? get_template_part( 'parts/lada-armenia/section-form', null, $params = ['product' => true]); ?>


<? get_template_part( 'parts/lada-armenia/section-product', null, $params = ['id_cat' => get_the_category(get_the_ID()), 'cat_title' => 'Вам может <span>быть интересно</span>']); ?>

<? get_template_part( 'parts/lada-armenia/section-form-2'); ?>




<?php get_footer();