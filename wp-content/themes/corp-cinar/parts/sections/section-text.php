<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<? 
if(!$args['field_group']) {
	$text_set = get_field('text_set',  $id_page_field);
} else {
	$text_set = get_field($args['field_group'],  $id_page_field);
}


?>

<? if(!empty($text_set['text'])) {  ?>
<section class="section-common section-text">
	<div class="container">
		<? if(!empty($text_set['title'])) { ?>
			<h2><?=highlightLastWord($text_set['title'])?></h2>
		<? } ?>
			<div class="text_box">
				<? if(!empty($text_set['text'])) { ?>
					<?=$text_set['text']?>
				<? } ?>
			<div class="clearfix"></div>	
		</div>
	</div>
</section>
<?php } ?>	