<?php
/**
* Template Name: Продукт/услуга
* Template Post Type: post, page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php 
	get_header(); 
?>

<div class="senergo main-single-content" style="background-image:url(<?=get_field('bg_img')['url']?>)">
<div class="main-single-content-overlay">
	<div class="container">
		<div class="main-single-cat-back">
		<a href="<?=get_single_post_category_link(get_the_id());?>">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M19 12H5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M12 19L5 12L12 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg> 
			Вернуться назад
		</a>
		</div>
		<div class="main-single-date">Опубликовано <?=get_the_date('F j Y');?></div>
		<h1><? echo get_the_title(); ?></h1>
	</div>
</div>
</div>

<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
?>

	
<div class="senergo section-text">
	<div class="container">
	<div class="container-in">
	<? if(!empty(get_field('bylo'))) { ?>
		<div class="row pr-short-des">
			<div class="col-xs-12 col-md-6 pr-short-col">
				<div class="sb_item_img">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_id()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
				</div>
					<div class="sb_item_sd_bs row">
						<div class="col-xs-12 col-md-6 ">
						<div class="sb_item_sd_bs_item sb_item_sd_bs_do">
							<div class="sb_item_sd_bs_label">Было</div>
							<div class="sb_item_sd_bs_v"><?=get_field('bylo')?></div>
						</div>
						</div>
						<div class="col-xs-12 col-md-6 ">
						<div class="sb_item_sd_bs_item sb_item_sd_bs_posle">
							<div class="sb_item_sd_bs_label">Стало</div>
							<div class="sb_item_sd_bs_v"><?=get_field('stalo')?></div>
						</div>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-md-6  pr-short-col">
				<div class="pr-short-des-text">
				<?=get_field('des_short')?>
				</div>
			</div>
		
	</div>
	<? } ?>
	
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

<? if(empty(get_field('bylo'))) { ?>
<div class="section-common senergo section-blog section-standart section-blog-page">
	<div class="container">
	<h2>Вам может быть интересно</h2>
	<div class="row">
<?php 
  
$args = array('posts_per_page' => 3, 'post_type' => 'post', 'cat' => get_the_category(get_the_id())[0]->term_id);
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();

   $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
   $thumbnail = $thumbnail['0'];
?>

<div class="col-xs-12 col-md-4 sb_item_col">       
	<a href="<?php echo esc_url( get_permalink() ); ?>">
			<span class="sb_item_cart">
				<span class="sb_item_cart_part sb_item_cart_part_top">
					<span class="sb_item_img"><img src="<?=$thumbnail?>" alt="<?php the_title();?>"></span>
			<span class="sb_item_cart_inf">
					<span class="sb_item_date sb_item_atr"><?php echo get_the_date('d.m.Y', $post->ID); ?></span>
					<span class="sb_item_title"><?php the_title();?></span>
					<span class="sb_item_sd">
						<?php echo wp_trim_words(get_the_excerpt($loop->ID), 15, '...' ); ?>
					</span>
				</span>
				</span>
				<span class="sb_item_more">Узнать подробнее</span>
			</span>
		</a>
</div>

<? endwhile; ?>
</div>
</div>
</div>
<? } ?>

<?php get_footer();