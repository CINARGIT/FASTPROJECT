<header>	
<?php if(get_field('top_contacts', 'option')): $i = 0;?>	
<div class="bl_header_top">
		<div class="container">
			<div class="flex_row">


			<?php while(has_sub_field('top_contacts', 'option')):$i++;  ?>
					<div class="blht_item">	
					
						<div class="blht_item_value">
						<? if(get_sub_field('oformit_ssylkoj') AND !get_sub_field('dvojnoe_znachenie')) { ?>
							<a href="<?=get_sub_field('znachenie')?>" style="color:<?=get_sub_field('color1')?>">
								<? if(get_sub_field('ikonka')['url']) { ?>
								<span class="blht_item_icon">
									<img src="<?=get_sub_field('ikonka')['url']?>" alt="<?=get_sub_field('naimenovanie')?>" class="logo-in-top">
								</span>
							<? } ?>
								<?=get_sub_field('naimenovanie')?>
							</a>
						<? } elseif(get_sub_field('oformit_ssylkoj') AND get_sub_field('dvojnoe_znachenie')) { ?>
							<? if(get_sub_field('ikonka')['url']) { ?>
								<span class="blht_item_icon">
									<img src="<?=get_sub_field('ikonka')['url']?>" alt="<?=get_sub_field('naimenovanie')?>">
								</span>
							<? } ?>
							<span>
								<?=get_sub_field('naimenovanie')?>
							</span>
							<div class="blht_item_double">
								<a href="<?=get_sub_field('znachenie')?>" style="color:<?=get_sub_field('color1')?>"><?=get_sub_field('ankor_sslyki')?></a>
								<a href="<?=get_sub_field('znachenie_2')?>" style="color:<?=get_sub_field('color2')?>"><?=get_sub_field('ankor_sslyki_2')?></a>
							</div>
						<? } elseif(!get_sub_field('oformit_ssylkoj') AND get_sub_field('dvojnoe_znachenie')) { ?>
							<span class="blht_item_icon">
									<img src="<?=get_sub_field('ikonka')['url']?>" alt="<?=get_sub_field('naimenovanie')?>">
								</span>
							<? if(get_sub_field('naimenovanie')) { ?>
								<span>
									<?=get_sub_field('naimenovanie')?>
								</span>
							<? } ?>
							<div class="blht_item_double">
								<span style="color:<?=get_sub_field('color1')?>">
									<?=get_sub_field('znachenie')?>
								</span>
								<span style="color:<?=get_sub_field('color2')?>">
									<?=get_sub_field('znachenie_2')?>
								</span>
							</div>
						<? } else { ?>
							<? if(get_sub_field('ikonka')['url']) { ?>
								<span class="blht_item_icon" >
									<img src="<?=get_sub_field('ikonka')['url']?>" alt="<?=get_sub_field('naimenovanie')?>">
								</span>
							<? } ?>
							<span style="color:<?=get_sub_field('color1')?>">
								<?=get_sub_field('znachenie')?>
							</span>
						<? } ?>
						</div>
					</div>
        <?php endwhile; ?>

	</div>
</div>
</div>
<?php endif; ?>
				
		
	
	
	
	<div class="bl_header_bottom ">
		<div class="container">
			<div class="flex_row">
			<div class="bl_header_bottom_item bl_header_bottom_item_logo_wrap">
				<div class="bl_header_bottom_item_logo">
					<a href="/"><img src="<?=get_field('logo', 'option')['url']?>" alt="<?php bloginfo('name'); ?>"></a>
				</div>
				<div class="bl_header_bottom_item_logo_description">
					<?=get_field('logo_description', 'option')?>
				</div>
			</div>
			
			
			
			
			<div class="bl_header_bottom_item">

<?php 
	if(get_field('main_header_data_content', 'option')): 
	$mhdc = get_field('main_header_data_content', 'option');
?>
					
<?php if($mhdc['main_header_data']): $i = 0;?>	
			<?php foreach ($mhdc['main_header_data'] as $mhdcitem) { ?>
			<? if($mhdcitem['object_type'] == 'contact_item') { ?>
				<div class="bl_header_bottom_item_contact <?=$mhdcitem['data_class']?>" style="margin-right:<?=$mhdcitem['cotact_item']['margin-right']?>px;">
						<? if($mhdcitem['cotact_item']['icon']) { ?>
						<? if($mhdcitem['cotact_item']['ssylka'] and $mhdcitem['cotact_item']['ssylka']) { ?><a href="<?=$mhdcitem['cotact_item']['ssylka']?>"><? } ?>
						<span class="blhb_icon">
							<img src="<?=$mhdcitem['cotact_item']['icon']['url']?>" alt="<?=$mhdcitem['cotact_item']['name']?>">
						</span>
						<? if($mhdcitem['cotact_item']['ssylka'] and $mhdcitem['cotact_item']['ssylka']) { ?></a><? } ?>
						<? } ?>
					
					<? if($mhdcitem['cotact_item']['value']) { ?>
					<div class="blhb_ic_in">
					<? if($mhdcitem['cotact_item']['name']) { ?>
						<div class="blhb_ic_name" style="font-size:<?=$mhdcitem['cotact_item']['name_fontsize']?>px; color:<?=$mhdcitem['cotact_item']['name_color']?>; font-weight:<?=$mhdcitem['cotact_item']['font_weight_name']?>;"><?=$mhdcitem['cotact_item']['name']?></div>
					<? } ?>
					<? if($mhdcitem['cotact_item']['value']) { ?>
						<div class="blhb_ic_value" style="font-size:<?=$mhdcitem['cotact_item']['value_fontsize']?>px; color:<?=$mhdcitem['cotact_item']['value_color']?>; font-weight:<?=$mhdcitem['cotact_item']['font_weight_value']?>;">
						<? if($mhdcitem['cotact_item']['ssylka']) { ?><a href="<?=$mhdcitem['cotact_item']['ssylka']?>"><? } ?>
							<?=$mhdcitem['cotact_item']['value']?>
						<? if($mhdcitem['cotact_item']['ssylka']) { ?></a><? } ?>
						</div>
					<? } ?>
					</div>
					<? } ?>
				<? } elseif($mhdcitem['object_type'] == 'modal_form_buttom') { ?>
					<a class="bl_header_button datatextcopy" href="#fancy-modal-order-call" data-text="<?=$mhdcitem['button']['text']?>" data-fancybox="modal"><span><?=$mhdcitem['button']['text']?></span></a>
				<? } ?>	
				</div>
			<?php } ?>
<?php endif; ?>
<?php endif; ?>			
		
			
				
				<? if(get_field('lang-swithcer', 'option')) { echo '<div class="gtranslate_template">' . do_shortcode('[gtranslate]') . '</div>';  }?>
			</div>
			
			
			
			</div>
		</div>
	</div>
	
	<? get_template_part( 'parts/sections/main-menu'); ?>
	
</header>