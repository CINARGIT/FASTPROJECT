<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_cat = $maincategory->term_id;
}

$mainSectionContent = get_field('main_section_content_set', $id_page_field);
$mainSectionContentDefault = get_field('main_section_content_set', 'option');

if(!empty($mainSectionContent['selected_image']['url'])) {
	$mainBg = $mainSectionContent['selected_image']['url'];
} else {
	$mainBg = $mainSectionContentDefault['selected_image']['url'];
}

if(!empty($mainSectionContent['main_section_h1'])){
	$mainSectionContentH1 = $mainSectionContent['main_section_h1'];
} elseif(!is_archive()) {
	$mainSectionContentH1 = get_the_title();
} else {
	$mainSectionContentH1 = get_cat_name($id_cat);
} 

if(!empty($mainSectionContent['aftertitle'])){
	$mainSectionContentAfterTitle = $mainSectionContent['aftertitle'];
} else {
	$mainSectionContentAfterTitle = $mainSectionContentDefault['aftertitle'];
}


if(!empty($mainSectionContent['form_main_select'])){
	$mainSectionContentFormID = $mainSectionContent['form_main_select'];
} else {
	$mainSectionContentFormID = $mainSectionContentDefault['form_main_select'];
}

?>
<section class="main_section main_section_inside_mini main_section_inside" style="background-image:url(<?=$mainBg?>)">
	<div class="main_section_overlay">
		<div class="container">
		<? get_template_part( 'parts/sections/breadcrumbs'); ?>
		<? if(!empty($mainSectionContentH1)) { ?>
			<h1><?=$mainSectionContentH1?></h1>
		<? } ?>		
		<?	
		$preimushhestva = $mainSectionContentDefault['preimushhestva'];
		if( $preimushhestva ): ?>
		<div class="row">
        <?php foreach( $preimushhestva as $item ): 
        ?>
            <div class="col-xs-12 col-md-2">
                <div class="main_section_preimushhestva_item_in_wrap">
                <div class="main_section_preimushhestva_item_in">
                 
                    <div class="main_section_preimushhestva_item_info">
                        <div class="main_section_preimushhestva_item_name">
                            <?=$item['zagolovok']?>
                        </div>
                        <div class="main_section_preimushhestva_item_tekst">
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
		</div>
</section>