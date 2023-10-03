<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

$voSet = get_field('vo_set',  $maincategory);

?>

<? if($voSet['vo']) {?>
<section class="section-common section-vopros-otvet <?=$args['sclass']?> <?=get_field('section-vopros-otvet', 'styleset')?>">
	<div class="container">
	<? if(!empty($voSet['title'])) { ?>
		<h2><?=$voSet['title']?></h2>
	<? } ?>
			<div class="q_wrap">
			<? foreach ($voSet['vo'] as $row) { ?>
				<div class="q_item_wrap">
				<div class="q_item noselect">
					<div class="q_item_question">
						<?=$row['vopros']?>
						<div class="plusminus_label">Раскрыть ответ</div>
						<div class="plusminus"></div>
					</div>
					<div class="q_item_answer">
						<div class="q_item_answer_in">
						<?=$row['otvet']?>
						</div>
					</div>
				</div>
				</div>
			<?php } ?> 
			</div>
	</div>
</section>
<? } ?>