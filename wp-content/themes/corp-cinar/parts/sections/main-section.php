<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_cat = $maincategory->term_id;
}

$mainQuote = get_field('quote_set', 'option');
$mainBg = get_field('image_main_section_group', 'option')['selected_image']['url'];
$mainSectionContent = get_field('main_section_content_set', $id_page_field);
$mainSectionContentDefault = get_field('main_section_content_set', get_option('page_on_front'));

if(!empty($mainSectionContent['selected_image'])) {
	$mainBg = $mainSectionContent['selected_image'];
}

if(!empty($mainSectionContent['main_section_h1'])){
	$mainSectionContentH1 = $mainSectionContent['main_section_h1'];
} else {
	$mainSectionContentH1 = $mainSectionContentDefault['main_section_h1'];
}

if(!empty($mainSectionContent['aftertitle'])){
	$mainSectionContentAfterTitle = $mainSectionContent['aftertitle'];
} else {
	$mainSectionContentAfterTitle = $mainSectionContentDefault['aftertitle'];
}

if(!empty($mainSectionContent['zagolovok_formy'])){
	$mainSectionContentFormTitle = $mainSectionContent['zagolovok_formy'];
} else {
	$mainSectionContentFormTitle = $mainSectionContentDefault['zagolovok_formy'];
}

if(!empty($mainSectionContent['podzagolovok_formy'])){
	$mainSectionContentFormAfterTitle = $mainSectionContent['podzagolovok_formy'];
} else {
	$mainSectionContentFormAfterTitle = $mainSectionContentDefault['podzagolovok_formy'];
}

if(!empty($mainSectionContent['form_main_select'])){
	$mainSectionContentFormID = $mainSectionContent['form_main_select'];
} else {
	$mainSectionContentFormID = $mainSectionContentDefault['form_main_select'];
}

?>
<section class="main_section" style="background-image:url(<?=$mainBg?>)">
	<div class="main_section_overlay">
		<div class="container">
			<div class="flex_row">
				<div class="main_section_item main_section_item_left">
					<? if(!empty($mainSectionContentH1)) { ?>
						<h1><?=$mainSectionContentH1?></h1>
					<? } ?>
					<? if(!empty($mainSectionContentAfterTitle)) { ?>
						<div class="main_section_kratoe_opisanie"><?=$mainSectionContentAfterTitle?></div>
					<? } ?>
		<?	
		$preimushhestva = $mainSectionContentDefault['preimushhestva'];
		if( $preimushhestva ): ?>
		<div class="main_section_preimushhestva">
        <?php foreach( $preimushhestva as $item ): 
            $image = $item['izobrazhenie'];
        ?>
            <div class="main_section_preimushhestva_item">
                <div class="main_section_preimushhestva_item_in_wrap">
                <div class="main_section_preimushhestva_item_in">
                    <?php if( $image ): ?>
						<div class="main_section_preimushhestva_item_icon">
							<img src="<?=esc_url($image['url']) ?>" alt="<?= esc_attr($item['zagolovok']) ?>">
						</div>
                    <?php endif; ?>
                    <div class="main_section_preimushhestva_item_info">
                        <div class="main_section_preimushhestva_item_name <?php if(!$image) echo 'fixed_no_image'; ?>">
                            <?=$item['zagolovok']?>
                        </div>
                        <div class="main_section_preimushhestva_item_tekst <?php if(!$image) echo 'fixed_no_image'; ?>">
                            <?=$item['tekst']?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
		</div>
		<?php endif; ?>
				</div>
				
				<div class="main_section_item main_section_item_form_wrap main_section_item_right">
					<? if(!empty($mainQuote['author'])) { ?>
					<div class="main_section_quote">
						<div class="main_section_quote_image">
							<img src="<?=$mainQuote['photo']['url']?>" alt="<?=$mainQuote['author']?>">
						</div>
						<div class="main_section_quote_author">
							<?=$mainQuote['author']?>
						</div>
						<div class="main_section_quote_position">
							<?=$mainQuote['author_position']?>
						</div>
						<div class="main_section_quote_text">
							<?=$mainQuote['quote']?>
						</div>
					</div>
					<? } ?>
					<div class="main_section_item_form">
						<div class="main_section_title"><?=$mainSectionContentFormTitle?></div>
						<div class="main_section_aftertitle"><?=$mainSectionContentFormAfterTitle?></div>
						<div class="main_section_form_in"><?=do_shortcode('[contact-form-7 id="'.$mainSectionContentFormID.'"]')?></div>
					</div>
				</div>
				</div>
			</div>
		</div>
</section>