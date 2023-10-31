<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
	$id_page = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_page = $maincategory->term_id;
}

$prefixClass = 'steps_section_style_3';
$section = get_sub_field('steps_section_style_3_group');


?>



<section class="section-common section_coso_style_3_common section-<?=$prefixClass?>">
<style>
	.<?=$prefixClass?>_item_title{
		font-size:<?=$section['items_title_font_size']?>px;
	}
</style>
	<div class="container">
	
	<? if(!empty($section['title'])) { ?>
		<h2 data-text="<?=$section['title']?>"><?=highlightLastWord($section['title'])?></h2>
	<? } ?>
	<? if(!empty($section['short_description'])) { ?>
		<div class="short_description"><?=$section['short_description']?></div>
	<? } ?>
	

    <div class="row">
    <div class="<?=$prefixClass?>_items col-xs-12 col-md-9">
        <?php
		$countitems = count($section['items']);
		$i = 0;
        foreach( $section['items'] as $item ):  $i++;
        ?>
        <div class="<?=$prefixClass?>_item <? if($i == $countitems) echo 'last_item'; ?>">
            <div class="<?=$prefixClass?>_item_in">
				<div class="<?=$prefixClass?>_item_in_wrap">
				<div class="<?=$prefixClass?>_item_image">
					<img src="<?=$item['image']['url']?>" alt="<?=$item['title'] ?>">
				</div>
				<div class="<?=$prefixClass?>_item_info">
					<div class="<?=$prefixClass?>_item_title">
					<div class="<?=$prefixClass?>_item_num">Этап <?=$i?></div>
					<?=$item['title'] ?></div>
					<div class="<?=$prefixClass?>_item_text"><?=$item['text'] ?></div>
				</div>
				</div>
			</div>		
         </div>
        <?php endforeach; ?>
    </div>
	<div class="<?=$prefixClass?>_offer col-xs-12 col-md-3">
		<div class="<?=$prefixClass?>_offer_in" style="background-image:url(<?=$section['offer_image']['sizes']['medium']?>);">
		<div class="<?=$prefixClass?>_offer_overlay">
			<div class="<?=$prefixClass?>_form_title"><?=$section['form_title']?></div>
			<a class="datatextcopy order_button main_header_style_3_order_button <?=$prefixClass?>_order_button" href="#fancy-modal-order-call" data-fancybox="modal_1" data-text="<?=$section['button_text']?>">
				<?=$section['button_text']?>
			</a>
		</div>
		</div>
	</div>
    </div>
	
	
	</div>
</section>
