<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_cat = $maincategory->term_id;
}

if(empty($args['category'])){
	$sTitle = get_field('zagolovok_razdela_f1', get_option('page_on_front'));
	$sDes = get_field('kratkoe_opisanie_f1', get_option('page_on_front'));
	$sCats = get_field('otmette_populyarnye_rubriki', get_option('page_on_front'));
	$sCatsLink = get_field('ssylka_na_razdel_pn', get_option('page_on_front'));
	$sCatsLinkText = get_field('tekst_ssylki_pn', get_option('page_on_front'));
} else {
	$sTitle = get_field('zagolovok_pop2', get_option('page_on_front'));
	$sDes = get_field('kratkoe_opisanie_pop2', get_option('page_on_front'));
	$sCats = get_field('otmette_populyarnye_rubriki_2', get_option('page_on_front'));
	$sCatsLink = get_field('ssylka_na_razdel_pn2', get_option('page_on_front'));
	$sCatsLinkText = get_field('tekst_ssylki_pn2', get_option('page_on_front'));
}

?>

<section class="section-common section-cats <?=get_field('vyberite_stili_uslug', get_option('page_on_front'))?>">
	<div class="container">
	<? if($sTitle) { ?>
		<h2><?=$sTitle?></h2>
	<? } ?>
	<div class="sp_des"><?=$sDes?></div>
	<div class="row">
	<?php
	$terms = get_terms( 'category', array( 'include' => $sCats, 'orderby' => 'include', 'hide_empty' => false ) );
    foreach ( $terms as $term ) {
		$category = get_category($term->term_id);
		$count = $category->category_count;
		$countLabel = get_field('obshhee_nazvanie_tovarov_v_mn_chisle_2_forma', 'option');
		if($count == 1) $countLabel = get_field('obshhee_nazvanie_tovarov_v_ed_chisle', 'option');
	?>

	<div class="col-xs-12 col-md-4 sc_item">
			  <a href="<?=get_term_link($term)?>" title="<?=$term->name?>" class="su_item_link">
			  <span class="sc_overlay">
				<img src="<?=get_field( 'miniatyura_rubriki',  $term)['sizes']['medium']?>" alt="<?=$term->name?>">
				<span class="sc_title_wrap">
				<span class="sc_title">
					<span class="sc_title_in">
						<?=$term->name?>
					</span>
					<span class="sc_subtitle">
						<?=$count?> <?=$countLabel?>
					</span>
				</span>
				</span>
			</span>
			</a>
    </div>
	<? } ?>	
    </div>
	
	<div class="sp_all_btn_wrap">
		<a href="<?=$sCatsLink?>" class="sp_all_btn alter_style_btn"><?=$sCatsLinkText?></a>
	</div>
	
	</div>
</section>
