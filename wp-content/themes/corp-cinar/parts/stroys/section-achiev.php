<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$achievSet = get_field('achiev_set', get_option('page_on_front'));
?>
<? if(!empty($achievSet['achiev'])) { ?>
<section class="section-common colored <?=get_field('achiev_style', 'styleset')?> section-achiev">
	<div class="container">
	<div class="container-in">
	<? if(!empty($achievSet['title'])) { ?>
		<h2><?=$achievSet['title']?></h2>
	<? } ?>

<?php
$i = 0; 
if( $achievSet['achiev'] ): 
$achievCount = count($achievSet['achiev']);
$i++;
?>
<div class="achiev_wrap <? if($achievCount > 4) { echo 'cur_achiev_wrap'; }?>">
    	<div class="achiev_row <? if($achievCount > 4) { echo 'cur_achiev_row'; } else { echo 'row'; } ?>">
			<?php foreach( $achievSet['achiev'] as $image ): ?>
				<div class="achiev_item_wrap col-xs-12 col-md-3">
					<div class="achiev_item">
						<a href="<?php echo esc_url($image['sizes']['large']); ?>" data-fancybox="gallery">
							 <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</a>
					</div>
				</div>
             <?php endforeach; ?>  
        </div>
	   <? if(!empty($achievSet['text_more'])) { ?>
		<div class="sp_all_btn_wrap">
			<a href="<?=$achievSet['link_more']?>" class="sp_all_btn alter_style_btn"><?=$achievSet['text_more']?></a>
		</div>
	   <? } ?>
 </div>
<?php endif; ?>

	<div class="achiev_list_num_wrap">
		<div class="achiev_list_num_item"></div>
	</div>
	
	</div>
	</div>
</section>
<? } ?>