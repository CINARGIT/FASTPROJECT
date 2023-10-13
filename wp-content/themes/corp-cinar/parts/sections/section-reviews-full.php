<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<?php 
$section = get_field('reviews', $id_page_field);

if($section): 
    $sectionclass = 'reviews-full';
    $countitems = count($section['items']);
?>

<section class="section-common section-<?=$sectionclass?>">
    <div class="container">
    
        <h2><?=$section['title']?></h2>
		
		<div class="row row_<?=$sectionclass?> countitems-<?=floor($countitems/2)?>">
        <?php
        $i = 0;
        foreach($section['items'] as $item ):  
            $i++;
            $photo = $item['photo']['sizes']['medium'];
            $extraClass = $i > 6 ? 'hidden-item' : ''; 
        ?>
        <div class="<?=$sectionclass?>_item <?=$extraClass?> col-xs-12 col-md-6">
            <div class="row <?=$sectionclass?>_item_in">
                <div class="<?=$sectionclass?>_item_img col-xs-12 col-md-4">
                    <a href="<?=$photo?>" data-fancybox="reviews-ur"><img src="<?=$photo?>" alt="<?=$item['name'] ?>"></a>
                </div>
                <div class="<?=$sectionclass?>_item_info col-xs-12 col-md-8">
                    <div class="<?=$sectionclass?>_item_title">
                        <?=$item['title']?>
                    </div>
                    <div class="<?=$sectionclass?>_item_text">
                        <?=wp_custom_trim_words($item['text'], 25)?>
                    </div>
                    <div class="<?=$sectionclass?>_item_more">
                        <a href="#review_modal_id_<?=$i?>" data-fancybox="reviews-ur-text">Читать весь отзыв</a>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="review_modal" id="review_modal_id_<?=$i?>">
			 <div class="<?=$sectionclass?>_item_title">
				<?=$item['title']?>
             </div>
			 <div class="<?=$sectionclass?>_item_text">
				<?=$item['text_full']?>
			 </div>
		</div>
		
        <?php endforeach; ?>
		</div>
		
        <?php if($countitems > 6): ?>
            <div class="more_link_box_simple">
                <button class="showMoreBtn"><?=$section['text_more']?></button>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?>





<?php 
$section = get_field('reviews_fiz', $id_page_field);

if($section): 
    $sectionclass = 'reviews_fiz';
    $countitems = count($section['items']);
?>

<section class="section-common section-<?=$sectionclass?>">
    <div class="container">
    
        <h2><?=$section['title']?></h2>
		
		<div class="row row_<?=$sectionclass?> countitems-<?=floor($countitems/2)?>">
        <?php
        $i = 0;
        foreach($section['items'] as $item ):  
            $i++;
            $photo = $item['photo']['sizes']['medium'];
            $extraClass = $i > 6 ? 'hidden-item' : ''; 
        ?>
        <div class="<?=$sectionclass?>_item <?=$extraClass?> col-xs-12 col-md-6">
            <div class="<?=$sectionclass?>_item_in">
                <div class="<?=$sectionclass?>_item_info">
                    <div class="<?=$sectionclass?>_item_title">
                        <?=$item['title']?>
                    </div>
					<div class="<?=$sectionclass?>_item_aftertitle">
                        <?=$item['aftertitle']?>
                    </div>
                    <div class="<?=$sectionclass?>_item_text">
                        <?=$item['text']?>
                    </div>
                </div>
            </div>
        </div>
		
        <?php endforeach; ?>
		</div>
		
        <?php if($countitems > 6): ?>
            <div class="more_link_box_simple">
                <button class="showMoreBtn"><?=$section['text_more']?></button>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?>