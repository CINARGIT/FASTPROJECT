<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

$term_name = get_term(get_field('ustanovite_glavnuyu_straniczu_uslug', 'option'))->name;
?>

<section class="section-common section-uslugi <?=get_field('vyberite_stili_uslug', 'styleset')?>">
	<div class="container">
	<? if($term_name) { ?>
		<h2><?=$term_name?></h2>
	<? } ?>
	<div class="row su_row">
	<?php
	$i = 0;
	$terms = get_terms( 'category', array( 'parent' => get_field('ustanovite_glavnuyu_straniczu_uslug', 'option'), 'orderby' => 'slug', 'hide_empty' => false ) );
    foreach ( $terms as $term ) {
	$i++;
	?>

		<div class="col-xs-12 col-md-6 su_item">
		<div class="su_item_wrap">
		<div class="su_item_show_side">
			<a href="<?=get_term_link($term)?>" title="<?=$term->name?>" class="su_item_link">
				<span class="su_title">
					<span class="su_title_in">
						<?=$i?>. <?=$term->name?>
					</span>
				</span>
			</a>
			
<? $terms2 = get_terms( 'category', array( 'parent' => $term->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
   if($terms2) { 
?>

<? } ?>	
		</div>		 

<? 
   if($terms2) { 
?>
<ul class="sub_main_list" >
<?php
    foreach ( $terms2 as $term2 ) {
?>




			<li>
				<a href="<?=get_term_link($term2)?>" title="<?=$term2->name?>"><span><?=$term2->name?></span>
	
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="20" cy="20" r="20" />
<path d="M11.75 20L26.75 20" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M20 13L27 20L20 27" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

				</a>
			</li>
       


<? } ?>			
</ul>
<? } ?>				
		
	</div>
        </div>
	
	<? } ?>	
	
	
	
	
    </div>
	</div>
</section>
