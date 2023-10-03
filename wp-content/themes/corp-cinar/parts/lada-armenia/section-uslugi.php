<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>

<section class="section-common section-uslugi <?=get_field('vyberite_stili_uslug', 'option')?>">
	<div class="container">
	<? if(get_field('zagolovok_uslugi', get_option('page_on_front'))) { ?>
		<h2><?=get_field('zagolovok_uslugi', get_option('page_on_front'))?></h2>
	<? } ?>
	<div class="row">
	<?php
	$terms = get_terms( 'category', array( 'parent' => get_field('ustanovite_glavnuyu_straniczu_uslug', 'option'), 'orderby' => 'slug', 'hide_empty' => false ) );
    foreach ( $terms as $term ) {
	?>

		<div class="col-xs-12 col-md-3 su_item">
		<div class="su_item_wrap">
		<div class="su_item_show_side">
			  <a href="<?=get_term_link($term)?>" title="<?=$term->name?>" class="su_item_link">
				<img src="<?=get_field( 'miniatyura_rubriki',  $term)['sizes']['medium']?>" alt="<?=$term->name?>">
				<span class="su_title">
					<span class="su_title_in">
						<?=$term->name?>
					</span>
				</span>
			</a>
			
<? $terms2 = get_terms( 'category', array( 'parent' => $term->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
   if($terms2) { 
?>
<div class="su_arrow">
	<svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M1.5 1.75L6 6.25L10.5 1.75" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
	</svg>
</div>
<? } ?>	
	</div>		 
		<div class="spec_bg">
			<div class="fill_flex" ></div>
			
<? 
   if($terms2) { 
?>
<ul class="sub_main_list" >
<?php
    foreach ( $terms2 as $term2 ) {
?>




			<li>
				<a href="<?=get_term_link($term2)?>" title="<?=$term2->name?>"><?=$term2->name?></a>
			</li>
       


<? } ?>			
</ul>
<? } ?>				
			</div>
	</div>
        </div>
	
	<? } ?>	
	
	
	
	
    </div>
	</div>
</section>
