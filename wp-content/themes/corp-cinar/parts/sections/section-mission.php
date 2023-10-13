<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
	$section = get_field('mission', $id_page_field);	

	if( $section ): 
	$sectionclass = 'mission';
?>
<section class="section-common section-<?=$sectionclass?>">
    <div class="container">
    <div class="row row_<?=$sectionclass?>">
        <h2><?=highlightLastWord($section['title'])?></h2>
        <?php
		$countitems = count($section['items']);
		$i = 0;
        foreach( $section['items'] as $item ):  $i++;
            $photo = $item['photo']['url'];
        ?>
        <div class="<?=$sectionclass?>_item col-xs-12 col-md-4 <? if($i == $countitems) echo 'last_item'; ?>">
            <div class="<?=$sectionclass?>_item_show_side <? if($item['color_text'] == '#ffffff') echo 'alter_shadow'?>">
				<div class="<?=$sectionclass?>_item_in" style="background-color:<?=$item['color']?>; color:<?=$item['color_text']?>;">
					<div class="<?=$sectionclass?>_item_img">
						<img src="<?=$photo?>" alt="<?=$sectionclass?> <?=$i?>">
					</div>
					<div class="<?=$sectionclass?>_item_info">
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