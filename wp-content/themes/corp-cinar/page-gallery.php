<?php
/**
* Template Name: Галерея
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header();
$title = get_the_title();
$words = explode(" ", $title ); 

	$wcount = -2;
	if(!empty($words)){
		$wordscount = count($words);
		if($wordscount <= 2) {
			$wcount = -1;
		}
	} 
	
$last_two_word = implode(' ',array_splice($words, $wcount )); 
$except_last_two = implode(' ', $words);
$title = '<h1 class="main-h1">'.$except_last_two.' <span>'.$last_two_word.'</span></h1>';
?>


<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
?>

<section class="section-common stroys section-content">
	<div class="container">
		<?=$title?>
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
	<div class="content-container">

	


	
	<div class="section-content-in">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
	</div>	
	

	</div>
	</div>
</section>




<? 
if(!empty(get_field('vyberite_stili_form_2', get_option('page_on_front')))) { 
	get_template_part( 'parts/'.get_field('vyberite_stili_form_2', get_option('page_on_front')).'/section-form-2'); 
}
?>



<?php get_footer();