<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$textSet = get_field('text_set', $id_page_field);
?>
<? if(!empty($textSet['text'])) { ?>
<section class="section-common <?=get_field('text_section', 'styleset')?> section-text">
	<div class="container">
	
	<? if(!empty($textSet['title'])) { ?>
		<h2><?=$textSet['title']?></h2>
	<? } ?>
	<div class="container-in">
	<?=$textSet['text']?>
	</div>
	</div>
</section>
<? } ?>