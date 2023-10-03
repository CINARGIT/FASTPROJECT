<?php
/**
* Template Name: Видео
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

<section class="section-common lada-armenia section-video section-video-page section-content">
	<div class="container">
	<div class="content-container">
		<?=$title?>
		<div class="sv_video_cur">
		<?php
			while( have_rows('mainvideo') ): the_row(); 
			$image = get_sub_field('oblozhka')['sizes']['large'];
		?>
			<div class="sv_item_wrap">
			<div class="sv_item_name"><?=get_sub_field('nazvanie')?></div>
				<div class="sv_item">
					<a href="<?=get_sub_field('youtube')?>" data-fancybox="video">
					<span class="sv_item_overlay">
						<span class="sv_item_play">
							<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M39.9999 0C17.9086 0 0 17.9086 0 39.9999C0 62.0913 17.9086 79.9998 39.9999 79.9998C62.0913 79.9998 79.9998 62.0913 79.9998 39.9999C79.9764 17.9185 62.0815 0.0236049 39.9999 0ZM56.8454 41.2744C56.5686 41.83 56.1183 42.2802 55.5627 42.5571V42.5713L32.7057 54C31.2941 54.7053 29.5781 54.1329 28.8726 52.7213C28.6721 52.32 28.5688 51.8771 28.5713 51.4285V28.5715C28.5706 26.9935 29.8491 25.7138 31.4272 25.7129C31.8709 25.7127 32.3087 25.8159 32.7057 26.0143L55.5627 37.4429C56.975 38.1467 57.5494 39.8621 56.8454 41.2744Z" />
							</svg>
						</span>
					</span>
					<img src="<?=$image?>" alt="<?=get_sub_field('nazvanie')?>">
					</a>
			</div>
			</div>
		<?php endwhile; ?>
		</div>
		
		<div class="sv_video_row_mini row">
		<?php
			while( have_rows('dopvideo') ): the_row(); 
			$image = get_sub_field('oblozhka')['sizes']['medium'];
		?>
			<div class="col-xs-12 col-md-4">
			<div class="sv_item_wrap">
				<div class="sv_item">
					<a href="<?=get_sub_field('youtube')?>" data-fancybox="video">
					<span class="sv_item_overlay">
						<span class="sv_item_play">
							<svg width="48" height="48" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M39.9999 0C17.9086 0 0 17.9086 0 39.9999C0 62.0913 17.9086 79.9998 39.9999 79.9998C62.0913 79.9998 79.9998 62.0913 79.9998 39.9999C79.9764 17.9185 62.0815 0.0236049 39.9999 0ZM56.8454 41.2744C56.5686 41.83 56.1183 42.2802 55.5627 42.5571V42.5713L32.7057 54C31.2941 54.7053 29.5781 54.1329 28.8726 52.7213C28.6721 52.32 28.5688 51.8771 28.5713 51.4285V28.5715C28.5706 26.9935 29.8491 25.7138 31.4272 25.7129C31.8709 25.7127 32.3087 25.8159 32.7057 26.0143L55.5627 37.4429C56.975 38.1467 57.5494 39.8621 56.8454 41.2744Z" />
							</svg>
						</span>
					</span>
					<img src="<?=$image?>" alt="<?=get_sub_field('nazvanie')?>">
					</a>
			</div>
			</div>
			</div>
		<?php endwhile; ?>	
		</div>
		
	<div class="content-container">
	<div class="section-content-in">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
	</div>	
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