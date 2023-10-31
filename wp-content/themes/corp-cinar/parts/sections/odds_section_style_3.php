<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
	$id_page = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_page = $maincategory->term_id;
}

$prefixClass = 'odds_section_style_3';
$section = get_sub_field('odds_section_style_3_group');
?>

<section class="section-common section_coso_style_3_common colored section-<?=$prefixClass?>">
<style>
	.<?=$prefixClass?>_item_title{
		font-size:<?=$section['items_title_font_size']?>px;
	}
	
	.<?=$prefixClass?>_item_in:before{
		background-color:<?=$section['laylot_color']?>;
	}
	
	.<?=$prefixClass?>_item.other_item .<?=$prefixClass?>_item_in:before{
		background-color:<?=$section['laylot_color_alter']?>;
	}
	
</style>
	<div class="container">
	<? if(!empty($section['title'])) { ?>
		<h2><?=highlightLastWord($section['title'])?></h2>
	<? } ?>
	</div>
    <div class="row_<?=$prefixClass?>">
        <?php
		$countitems = count($section['items']);
		$i = 0;
        foreach( $section['items'] as $item ):  $i++;
        ?>
        <div class="<?=$prefixClass?>_item <? if($i == $countitems) echo 'last_item';    if ($i % 2 == 0) echo 'other_item'; ?>">
			<img src="<?=$item['image']['url']?>" alt="<?=wp_strip_all_tags($item['title'])?>" class="<?=$prefixClass?>_item_image">
			<div class="<?=$prefixClass?>_item_in">
				<div class="<?=$prefixClass?>_item_in_wrap">
				<div class="<?=$prefixClass?>_item_info">
					<div class="<?=$prefixClass?>_item_num"><?=$i?></div>
					<div class="<?=$prefixClass?>_item_title"><?=$item['title']?></div>
					<div class="<?=$prefixClass?>_item_text"><?=$item['text']?></div>
				</div>
				</div>
			</div>		
         </div>
        <?php endforeach; ?>
    </div>
</section>
