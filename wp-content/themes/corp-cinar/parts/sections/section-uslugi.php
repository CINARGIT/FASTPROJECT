<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_cat = $maincategory->term_id;
}

$term_name = get_term(get_field('ustanovite_glavnuyu_straniczu_uslug', 'option'))->name;
$section = get_field('services', $id_page_field);
$sectionDefault = get_field('services', get_option('page_on_front'));

if(!empty($section['items'])) {
	$terms = get_terms( 'category', array( 'include' => $section['items'], 'orderby' => 'slug', 'hide_empty' => false ) );
} else {
	$terms = get_terms( 'category', array( 'parent' => $id_cat, 'orderby' => 'slug', 'hide_empty' => false ) );	
}

if(!empty($terms)) {
?>

<section class="section-common section-uslugi">
	<div class="container">
	<? if(!empty($section['title'])) { ?>
		<h2><?=highlightLastWord($section['title'])?></h2>
	<? } else { ?>
		<h2><?=highlightLastWord($sectionDefault['title'])?></h2>
	<? } ?>
	<div class="row su_row">
	<?php
	$i = 0;
	
    foreach ( $terms as $term ) {
	$i++;
	?>
	<div class="col-xs-12 col-md-3 su_item">
		<div class="su_item_wrap">
			<div class="su_item_show_side">
				<a href="<?=get_term_link($term)?>" title="<?=$term->name?>" class="su_item_link">
					<span class="su_item_img">
						<img src="<?=get_field('miniatyura_rubriki', $term)['url']?>" alt="<?=$term->name?>">
					</span>
					<span class="su_item_info">
						<span class="su_item_title">
							<?=$term->name?>
						</span>
						<span class="su_item_price">
							<?=get_field('price', $term)?>
						</span>
					</span>
				</a>
			</div>		 
		</div>
     </div>
	<? } ?>	
    </div>
	</div>
</section>
<? } ?>	