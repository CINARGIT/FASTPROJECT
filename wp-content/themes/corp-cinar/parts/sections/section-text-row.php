<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<? $section = get_field('text_set_row',  $id_page_field); ?>

<? if(!empty($section)) {  ?>

	<?php
		$i = 0; foreach( $section as $item ):  $i++;
     ?>
	<section class="section-common section-text section-text-big">
	<div class="container">
		<? if(!empty($item['text_set']['title'])) { ?>
			<h2><?=highlightLastWord($item['text_set']['title'])?></h2>
		<? } ?>
			<div class="text_box">
				<? if(!empty($item['text_set']['text'])) { ?>
					<?=$item['text_set']['text']?>
				<? } ?>
			<div class="clearfix"></div>	
		</div>
		<? if($item['text_set']['contact_form_btn_switcher']) {?>
		<div class="text_box_contact_form_btn_wrap">
			<a class="order_button datatextcopy" href="#fancy-modal-order-call" data-text="<?=$item['text_set']['contact_form_btn']['title']?>" data-fancybox="modal"><span><?=$item['text_set']['contact_form_btn']['title']?></span></a>
		</div>
		<? } ?>
	</div>
	</section>
    <?php endforeach; ?>
<?php } ?>	