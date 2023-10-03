<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>

<?php if( have_rows('odds_about', $id_page_field) ): ?>
<section class="section-common pbexclude section-oddsabout senergo">
			<div class="container">
				
				<div class="soa_row row">
					<?php
						$i = 0;
						$count = 0;
						while( have_rows('odds_about', $id_page_field) ): the_row(); 
						$icon = get_sub_field('icon')['url'];
						?>
						<div class="soa_item_wrap col-xs-12 col-md-4">
							<div class="soa_item_in">
							<div class="soa_item_in_wrap">
								<div class="soa_item_img">
									<img src="<?=$icon?>" alt="<?=get_sub_field('title')?>">
								</div>
								<div class="soa_item_title"><?=get_sub_field('title')?></div>
								<div class="soa_item_text"><?=get_sub_field('text')?></div>
							</div>
							</div>
						</div>
				<?php endwhile; ?>
				</div>
				
			</div>
</section>
<?php endif; ?>