<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

$term_name = get_term(get_field('ustanovite_glavnuyu_straniczu_uslug', 'option'))->name;
?>

<section class="section-common section-uslugi">
	<div class="container">
	<? if($term_name) { ?>
		<h2><?=highlightLastWord($term_name)?></h2>
	<? } ?>
	<div class="row su_row">
	<?php
	$i = 0;
	$terms = get_terms( 'category', array( 'parent' => get_field('ustanovite_glavnuyu_straniczu_uslug', 'option'), 'orderby' => 'slug', 'hide_empty' => false ) );
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
