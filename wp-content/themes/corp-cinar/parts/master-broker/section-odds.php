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
				<?php if( have_rows('odds', get_option('page_on_front')) ): ?>
					<div class="so_wrap row">
						<?php
						$i = 0;
						$count = 0;
						while( have_rows('odds', get_option('page_on_front')) ): the_row(); 
						$image = get_sub_field('image')['url'];
						$count++;
						$i++;
						if ($i%5 == 0)  {  $i = 0;  }
						?>
					
						<div class="so_item_wrap col-xs-12 col-md-3 <?  if ($i%2 == 1)  {  echo "difcolor";  }?>">
							<div class="so_item">
								
								<div class="so_item_img">
								<div class="so_item_num">
									#<?=$i?>
								</div>
									<img src="<?=$image?>" alt="<?=get_sub_field('nazvanie')?>">
								</div>
								<div class="so_item_name">
									<?=get_sub_field('nazvanie')?>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					</div>	
				<?php endif; ?>
			</div>
</section>