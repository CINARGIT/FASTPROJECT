<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

?>

<section class="section-common section-uslugi section-uslugi-full section-uslugi-mini <?=get_field('vyberite_stili_uslug', 'styleset')?>">
	<div class="container">

	<h2><?=get_field('service_set', $id_page_field)['title']?></h2>
<? $terms = get_terms( 'category', array( 'parent' => $maincategory->term_id, 'orderby' => 'include', 'hide_empty' => false ) );
   if($terms) { 
?>

<ul class="sub_main_list sub_main_list_gap" >
<?php
	$count = 0;
    foreach ( $terms as $term ) {
	$count++;
?>




			<li class="child_3 haschild_4">
			<div class="child_wrap">
			<div class="child_wrap_in">
			<a href="<?=get_term_link($term)?>" title="<?=$term->name?>"><span><?=$term->name?></span>
	
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="20" cy="20" r="20" />
<path d="M11.75 20L26.75 20" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M20 13L27 20L20 27" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

				</a>
<? $terms2 = get_terms( 'category', array( 'parent' => $term->term_id, 'orderby' => 'include', 'hide_empty' => false ) ); ?>	
<? if($terms2) { ?>
<div class="child_4_wrap">
<ul>
<?php foreach ( $terms2 as $term2 ) { ?>
<li class="child_4_item">
	<a href="<?=get_term_link($term2)?>" title="<?=$term2->name?>"><?=$term2->name?></a>
</li>
<? } ?>
</ul>
</div>
<? } ?>
	</div>
	</div>
</li>
<? } ?>			
</ul>
<? } ?>				
		

	
	
	
	
    </div>
	</div>
</section>
