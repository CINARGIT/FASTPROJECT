<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_cat = $maincategory->term_id;
}

if(empty($args['category'])){
	$mainTitle = get_field('zagolovok', $id_page_field);
	if(empty($mainTitle)) {
		$mainTitle = get_the_title();
	}
	$mainSubtitle = get_field('kratoe_opisanie', $id_page_field);
	$mainBg = get_field('izobrazhenie_na_fone', $id_page_field)['url'];
	$mainformTitle = get_field('zagolovok_formy', $id_page_field);
} else {
	$mainTitle = get_field('mainsectionset', $id_page_field)['zagolovok'];
	if(empty($mainTitle)) {
		$mainTitle = get_cat_name($id_cat);
	}
	$mainSubtitle = get_field('mainsectionset', $id_page_field)['podzagolovok'];
	$mainBg = get_field('mainsectionset', $id_page_field)['image']['url'];
	$mainformTitle = get_field('mainsectionset', $id_page_field)['zagolovok_formy'];
}

if(empty($mainformTitle)){
	$mainformTitle = get_field('zagolovok_formy', get_option('page_on_front'));
}

?>
<section class="main_section <?=get_field('vyberite_stili_uslug', 'option')?>" style="background-image:url(<?=$mainBg?>)">
	<div class="main_section_overlay">
		<div class="container">
			<div class="flex_row">
				<div class="main_section_item main_section_item_center">
					<h1><?=$mainTitle?></h1>
					<div class="main_section_kratoe_opisanie"><?=$mainSubtitle?></div>
						<?php if( have_rows('preimushhestva', get_option('page_on_front')) ): ?>
						<div class="main_section_preimushhestva">
						<?php while( have_rows('preimushhestva', get_option('page_on_front')) ): the_row(); 
						$image = get_sub_field('izobrazhenie');
						?>
						<div class="main_section_preimushhestva_item">
						<div class="main_section_preimushhestva_item_info">
							<div class="main_section_preimushhestva_item_name <? if(!$image['url']) { ?>fixed_no_image<? } ?>"><?=get_sub_field('zagolovok')?></div>
							<div class="main_section_preimushhestva_item_tekst <? if(!$image['url']) { ?>fixed_no_image<? } ?>"><?=get_sub_field('tekst')?></div>
						</div>
						</div>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="main_section_item main_section_item_form_wrap">
					<div class="main_section_item_form">
						<div class="main_section_title"><?=$mainformTitle?></div>
						<div class="main_section_form_in"><?=do_shortcode(get_field('shortkod_formy', get_option('page_on_front')))?>
<div class="confid_box">
Нажимая, вы даете <a href="<?=get_privacy_policy_url()?>" target="_blank">согласие на обработку персональных данных.</a></div>
</div>
					</div>
					<div class="main_section_social">
						<div class="row">
						<? if(!empty(get_field('telegram', 'option'))) { ?>
							<div class="col-xs-12 col-md-6">
								<a href="<?=get_field('telegram', 'option')?>" target="_blank" class="msocial_tg"><span>Написать в Telegram</span></a>
							</div>
						<? } ?>
						<? if(!empty(get_field('whatsapp', 'option'))) { ?>
							<div class="col-xs-12 col-md-6">
								<a href="<?=get_field('whatsapp', 'option')?>" target="_blank" class="msocial_wa"><span>Написать в WhatsApp</span></a>
							</div>
						<? } ?>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
</section>