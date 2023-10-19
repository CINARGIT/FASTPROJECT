<? if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
	$section = get_field('consist', get_option('page_on_front'));
	if( $section ): 
	$sectionclass = 'consist';
	$countitems = count($section['items']);
?>
<section class="section-common section-<?=$sectionclass?>">
    <div class="container">
        <h2><?=highlightLastWord($section['title'])?></h2>
		<? if(!empty($section['aftertitle'])) { ?>
			<blockquote class="full-blockquote">
				<?=$section['aftertitle']?>
			</blockquote>
		<? } ?>
		
		<style>
			.row_<?=$sectionclass?> ul.slick-dots li{
				width:<?=100 / floor($countitems/2)?>%;
			}
		</style>
		
		<div class="row_<?=$sectionclass?> countitems-<?=floor($countitems/2)?>">
        <?php
		$i = 0;
        foreach( $section['items'] as $item ):  $i++;
            $photo = $item['photo']['url'];
        ?>
        <div class="<?=$sectionclass?>_item <? if($i == $countitems) echo 'last_item'; ?>">
			<div class="<?=$sectionclass?>_item_in">
				<div class="<?=$sectionclass?>_item_img">
					<div class="<?=$sectionclass?>_item_num"><span>#<?=$i?></span></div>
					<img src="<?=$photo?>" alt="<?=$sectionclass?> <?=$i?>">
				</div>
				<div class="<?=$sectionclass?>_item_info">
					<div class="<?=$sectionclass?>_item_text">
						<?=$item['text'] ?>
					</div>
				</div>
			</div>
        </div>
        <?php endforeach; ?>
		</div>
		<div class="slide-counter">4 мероприятия из <?=$countitems?></div>
    </div>
</section>
<?php endif; ?>