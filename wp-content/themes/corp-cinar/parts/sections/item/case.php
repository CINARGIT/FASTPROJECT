
	<? 
	global $cOption;
	
	if($args['openinmodal']) {
		$link = '#fmrid-'.$args['content']->ID;
		
			$raiting_full = 5;
			$raiting_item = get_field('oczenka', $args['content']->ID);
			$raiting = (($raiting_full - $raiting_item) * 100) / $raiting_full;
			$raiting = 100 - $raiting;
	?>
	
	<div class="fancy-modal fancy-modal-micro lada-armenia" id="fmrid-<?=$args['content']->ID?>">
 
    <div class="rs_item_сontent">
		<div class="rs_item_name"><?php echo $args['content']->post_title; ?></div>
		
							<div class="rs_item_info_part_1">
								<div class="rating_stars">
									<div class="rating_full" style="width: <?=$raiting?>%"></div>
								</div>
								<div class="rs_item_date"><?php echo get_the_date('d F Y', $args['content']->ID); ?></div>
							</div>	
		
		<div class="rs_item_rew">
			<?=$args['content']->post_content;?>
		</div>
	</div>
  
	</div>
	
	<? } else {  
		$link = esc_url( get_permalink( $args['content'] ) );
	}   ?>
	
	<div class="col-xs-12 col-md-<?=$args['col']?> sb_item_col">
		<div class="item_col_wrap">
		<a href="<?php echo $link; ?>" <? if($args['openinmodal']) echo 'data-fancybox="review"';?>>
			<span class="sb_item_cart">
				<span class="sb_item_cart_part sb_item_cart_part_top">
				
				
				<? if(empty($args['dop_gallery_img'])) { ?>
				<? if(get_the_post_thumbnail_url( $args['content'], 'medium' )) { ?>
					<span class="sb_item_img">
						<img src="<?=get_the_post_thumbnail_url( $args['content'], 'medium' )?>" alt="<?php  echo $args['content']->post_title; ?>">
					
					</span>
				<? } ?>
				<? } else {  ?>
				
					<span class="sb_item_img">
						<img src="<?=get_the_post_thumbnail_url( $args['content'], 'medium' )?>" alt="<?php  echo $args['content']->post_title; ?>">
					</span>
			
			
					
				<? } ?>
				<span class="sb_item_cart_inf">
				<? if($args['dateoption']) { ?>
				<span class="sb_item_date sb_item_atr"><?php echo get_the_date('d.m.Y', $args['content']->ID); ?></span>
				<? } ?>
				<span class="sb_item_title"><?php echo $args['content']->post_title; ?></span>
				<? if(get_field('aftertitle', $args['content'])) { ?><span class="sb_item_aftertitle"><?=get_field('aftertitle', $args['content'])?></span><? } ?>
					<?php if(get_field('atributy', $args['content'])): $i = 0;?>	
						<span class="sb_item_atr">
						<?php while(has_sub_field('atributy', $args['content'])):$i++; 	if(get_sub_field('minicart-on')) { ?>
						<span class="sb_item_atr_row">
						<span class="sb_item_atr_col sb_item_atr_col_value">
						<?php the_sub_field('znachenie'); ?>
						</span>
						</span>
						<?php } endwhile; ?>
						</span>
					<?php endif; ?>
					<span class="sb_item_sd">
						<? 
							if(!empty(get_field('kratoe_opisanie', $args['content']))) { 
								echo get_field('kratoe_opisanie', $args['content']);
							} else {
								echo get_the_excerpt($args['content']);
							}
						 ?>
					</span>
					<span class="sb_item_sd_bs">
						<span class="sb_item_sd_bs_item sb_item_sd_bs_do">
							<span class="sb_item_sd_bs_label">Было</span>
							<span class="sb_item_sd_bs_v"><?=get_field('bylo', $args['content'])?></span>
						</span>
						<span class="sb_item_sd_bs_item sb_item_sd_bs_posle">
							<span class="sb_item_sd_bs_label">Стало</span>
							<span class="sb_item_sd_bs_v"><?=get_field('stalo', $args['content'])?></span>
						</span>
					</span>
				</span>
				</span>
				<span class="sb_item_more"><?=$args['labelTextMore']?></span>
			</span>
		</a>
		</div>
	</div>