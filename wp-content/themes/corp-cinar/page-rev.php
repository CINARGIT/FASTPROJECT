<?php
/**
* Template Name: Отзывы
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
<?php get_header(); ?>
	
<? get_template_part( 'parts/section-bread'); ?>

<section class="section-common section-post-list">

	<div class="container">
<?php 
	the_title( '<h1>', '</h1>' );
?>


		<?php if(get_field('otzyvy', 'option')): $i = 0;?>	
			<div class="page-rev-wrap row">
			<?php while(has_sub_field('otzyvy', 'option')):$i++;  

	$raiting_full = 5;
	$raiting_item = get_sub_field('kolichestvo_zvezd');
	$raiting = (($raiting_full - $raiting_item) * 100) / $raiting_full;
	$raiting = 100 - $raiting;

			?>
				<div class="col-xs-12 col-md-6 rev_item_col">
				<div class="rev_item ">
				
				
					<div class="rev_item_main">
					<div class="rev_item_imya"><?php the_sub_field('imya'); ?></div>
					<div class="rev_item_inf">
						<div class="rating_stars rev_item_kolichestvo_zvezd">
							<div class="rating_full" style="width: <?=$raiting?>%"></div>
						</div>
						<div class="rev_item_data"><?php the_sub_field('data'); ?></div>
					</div>
					<div class="rev_item_tekst_otzyva"><?php the_sub_field('tekst_otzyva'); ?></div>
					</div>
				</div>
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?> 
	

</div>
</section> 
<?php get_footer();	?> 

	