<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
	$id_page = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_page = $maincategory->term_id;
}

$prefixClass = 'banner_section_style_1';
$section = get_sub_field('banner_section_style_1_group');
?>



<section class="section-common colored section_style_1_common <?=$prefixClass?>" >
	<div class="<?=$prefixClass?>_image" style="background-image:url(<?=$section['image']['url']?>)"></div>
	<div class="container">
		<div class="<?=$prefixClass?>_row">
			<? if(!empty($section['title'])) { ?>
				<div class="<?=$prefixClass?>_title"><?=$section['title']?></div>
			<? } ?>
			<a class="datatextcopy order_button order_button_style_2" role="button" href="#fancy-modal-order-call" data-fancybox="" data-text="<?=$section['button_text']?>"><?=$section['button_text']?></a>
		</div>
	</div>
</section>


