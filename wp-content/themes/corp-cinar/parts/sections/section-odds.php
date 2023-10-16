<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
	$section = get_field('odds', get_option('page_on_front'));
	if(!empty(get_field('odds', $id_page_field)['items'])) {
		$section = get_field('odds', $id_page_field);	
	}
	if(!empty($section['items'])): 
	$sectionclass = 'odds';
?>
<section class="section-common section-<?=$sectionclass?>">
    <div class="container">
    
        <h2><?=highlightLastWord($section['title'])?></h2>
		<div class="row row_<?=$sectionclass?>  <? if ( wp_is_mobile() ) echo 'mobile_cur_style_1 row_'.$sectionclass.'_cur simple_dots';  ?>">
        <?php
		$countitems = count($section['items']);
		$i = 0;
        foreach( $section['items'] as $item ):  $i++;
            $photo = $item['photo']['url'];
        ?>
        <div class="<?=$sectionclass?>_item col-xs-12 col-md-4 <? if($i == $countitems) echo 'last_item'; ?>">
            <div class="<?=$sectionclass?>_item_show_side">
				<div class="<?=$sectionclass?>_item_in">
					<div class="<?=$sectionclass?>_item_img">
						<img src="<?=$photo?>" alt="<?=$sectionclass?> <?=$i?>">
					</div>
					<div class="<?=$sectionclass?>_item_info">
						<div class="<?=$sectionclass?>_item_num">
							#<?=$i?>
						</div>
						<div class="<?=$sectionclass?>_item_wrap_title">
							<?=$item['title'] ?>
						</div>
						<div class="<?=$sectionclass?>_item_wrap_text">
							<?=$item['text'] ?>
						</div>
					</div>
				</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
<?php endif; ?>