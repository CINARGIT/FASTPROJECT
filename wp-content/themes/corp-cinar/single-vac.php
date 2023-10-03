<?php
/**
* Template Name: Вакансия
* Template Post Type: post, page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header(); ?>

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
?>

	
<div class="stroys section-single-content">
	<div class="container">
		<div class="container-vac">
		
			<div class="container-vac_row">
				<div class="container-vac_item">
					<h1><?=get_the_title()?></h1>
					<div class="vac_aftertitle"><?=get_field('aftertitle')?></div>
				</div>
				
				<div class="container-vac_item">
					<a class="bl_header_bottom_item_order order_button datatextcopy" href="#fancy-modal-order-call" data-text="Откликнуться на вакансию" data-fancybox="vac"><span>Откликнуться на вакансию</span></a>
				</div>
			</div>
	<div class="row row_block">		
<?php $bloks = get_field('bloki'); if($bloks): ?>
	
    <?php foreach($bloks as $row): 
        $name = $row['zagolovok']; 
        $text = $row['text'];
    ?>
	<div class="col-xs-12 col-md-6 vac_list_col">
		<div class="vac_list_name">
			<?=$name?>
		</div>
		<div class="vac_list_text">
			<?=$text?>
		</div>
	</div>
     <?php endforeach; ?>
	
<?php endif; ?>
</div>
		</div>
	</div>
</div>

<div class="section-common stroys section-content section-blog section-standart section-blog-page">
	<div class="container">
	<h2>Открытые <span>вакансии</span></h2>
	<div class="row">
<?php 
  
$args = array('posts_per_page' => 3, 'post_type' => 'post', 'cat' => get_the_category(get_the_id())[0]->term_id);
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();

   $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
   $thumbnail = $thumbnail['0'];
?>

<div class="col-xs-12 col-md-6 vac_item_col">       
		<div class="vac_item_box">
			<div class="vac_item_inf">
			<div class="vac_item_title">
				<?php the_title();?>
			</div>
			<div class="vac_item_price">
				<?=get_field('aftertitle', $post->ID)?>
			</div>
			</div>
			
			<a class="order_button" href="<?php echo esc_url( get_permalink( $args['content'] ) ); ?>">
				Подробнее
			</a>
		</div>
</div>

<? endwhile; ?>
</div>
</div>
</div>


<?php get_footer();