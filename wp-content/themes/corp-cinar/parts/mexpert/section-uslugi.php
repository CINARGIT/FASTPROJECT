<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

$sOption = get_field('servise_options');

?>

<section class="section-common section-uslugi colored <?=get_field('section-uslugi', 'styleset')?>">
	<div class="container">
	<? if($sOption['title']) { ?>
		<h2><?=$sOption['title']?></h2>
	<? } ?>
	<?php if($sOption['servises'] ): ?>
		<div class="row su_item_row tab-content">
			<div class="col-xs-12 col-md-4 su_items_btns">
			<ul class="su_items_btns_ul tab-links">
			<?php $i = 0; foreach($sOption['servises'] as $sOptionItem): $i++; ?>
				<li class="su_item_title <? if($i == 1) echo 'active'; ?>">
					<a class="su_item_title_in" href="#tab<?=$i?>">
					<span><?=$sOptionItem['title']?></span>
					<div class="su_item_icon">
					<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.16675 19.8334L19.8334 8.16669" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M8.16675 8.16669H19.8334V19.8334" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					</div>
					</a>
					
				</li>
             <?php endforeach; ?>
			</ul>
			</div>
			<div class="col-xs-12 col-md-8 su_items_texts">
			<ul class="su_items_texts_in">
			<?php $i = 0; foreach($sOption['servises'] as $sOptionItem): $i++;?>
				<li class="su_item_text tab <? if($i == 1) echo 'active'; ?>" id="tab<?=$i?>">
					<?=$sOptionItem['text']?>
					<div class="su_item_text_more">
						<a href="<?=$sOptionItem['link']?>">Узнать подробнее</a>
					</div>
				</li>
             <?php endforeach; ?>
			</ul>			 
			</div>
		</div>
	<?php endif; ?>
    </div>
</section>
