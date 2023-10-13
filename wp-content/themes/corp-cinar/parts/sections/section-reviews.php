<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
	$section = get_field('reviews', get_option('page_on_front'));
	if( $section ): 
	$sectionclass = 'reviews';
	$countitems = count($section['items']);
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
        foreach($section['items'] as $item ):  $i++;
            $photo = $item['photo']['sizes']['medium'];
        ?>
        <div class="<?=$sectionclass?>_item">
            <div class="<?=$sectionclass?>_item_in">
                <div class="<?=$sectionclass?>_item_img">
                    <img src="<?=$photo?>" alt="<?=$item['name'] ?>">
                </div>
                <div class="<?=$sectionclass?>_item_info">
					<div class="<?=$sectionclass?>_item_title">
						<?=$item['title']?>
					</div>
					<div class="<?=$sectionclass?>_item_text">
						<?=$item['text']?>
					</div>
					<div class="<?=$sectionclass?>_item_more">
						<a href="#">Читать весь отзыв</a>
					</div>
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