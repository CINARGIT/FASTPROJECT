<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<section class="section-common section-odds <?=get_field('odds_style_select', 'styleset')?>">
			<div class="container">
			<h2><?=get_field('title_odds', get_option('page_on_front'))?></h2>
				<?php if( have_rows('odds', get_option('page_on_front')) ): ?>
					<?php
						$i = 0;
						$count = 0;
						while( have_rows('odds', get_option('page_on_front')) ): the_row(); 
						$image = get_sub_field('image')['url'];
						?>
						<div class="so_wrap so_item row">
						<div class="so_item_wrap col-xs-12 col-md-4">
							
								<div class="so_item_img">
									<img src="<?=$image?>" alt="<?=get_sub_field('nazvanie')?>">
								</div>
							
						</div>
						<div class="so_item_wrap_text col-xs-12 col-md-8">
							<div class="so_item_name">
								<?=get_sub_field('nazvanie')?>
							</div>
							<div class="so_item_text">
								<?=get_sub_field('text')?>
							</div>
						</div>
						</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
</section>