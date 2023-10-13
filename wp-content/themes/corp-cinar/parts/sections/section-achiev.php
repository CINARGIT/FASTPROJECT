<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
	$section = get_field('achiev_set', get_option('page_on_front'));
	if(!empty($section['achiev'])): 
	$sectionclass = 'achiev';
	$countitems = count($section['achiev']);
?>
<section class="section-common colored section-<?=$sectionclass?>">
    <div class="container">
    
        <h2><?=highlightLastWord($section['title'])?></h2>
		
		<style>
			.row_<?=$sectionclass?> ul.slick-dots li{
				width:<?=100 / floor($countitems/2)?>%;
			}
		</style>
		
		<div class="row_<?=$sectionclass?> countitems-<?=floor($countitems/2)?>">
        <?php
		$i = 0;
        foreach($section['achiev'] as $item ):  $i++;
            $photo = $item['sizes']['medium'];
            $photo_full = $item['sizes']['large'];
        ?>
        <div class="<?=$sectionclass?>_item">
			<div class="<?=$sectionclass?>_item_img_wrap">
			<div class="<?=$sectionclass?>_item_img">
                <a href="<?=$photo_full?>" data-fancybox="<?=$sectionclass?>">
					<img src="<?=$photo?>" alt="<?=$item['name'] ?>">
				</a>
             </div>
             </div>
        </div>
        <?php endforeach; ?>
		</div>
		<div class="more_link_box">
			<a href="<?=$section['link_more']?>"><?=$section['text_more']?></a>
		</div>
    </div>
</section>
<?php endif; ?>