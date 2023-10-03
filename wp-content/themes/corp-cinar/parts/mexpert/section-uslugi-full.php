<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

?>

<section class="section-common section-uslugi section-uslugi-full <?=get_field('vyberite_stili_uslug', 'styleset')?>">
	<div class="container">

	<div class="su_row">
	<?php
	$i = 0;
	$terms = get_terms( 'category', array( 'parent' => $maincategory->term_id, 'orderby' => 'include', 'hide_empty' => false ) );
    foreach ( $terms as $term ) {
	$i++;
	?>

		<div class="su_item">
		<div class="su_item_wrap">
		<div class="su_item_show_side">
		
<h2><?=$term->name?></h2>
<? $terms2 = get_terms( 'category', array( 'parent' => $term->term_id, 'orderby' => 'include', 'hide_empty' => false ) );
   if($terms2) { 
?>

<? } ?>	
		</div>		 

<? 
   if($terms2) { 
?>
<ul class="sub_main_list" >
<?php
	$count = 0;
    foreach ( $terms2 as $term2 ) {
	$count++;
?>




			<li>
				<a href="<?=get_term_link($term2)?>" title="<?=$term2->name?>"><span><?=$term2->name?></span>
	
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="20" cy="20" r="20" />
<path d="M11.75 20L26.75 20" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M20 13L27 20L20 27" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

				</a>
				
<? $terms3 = get_terms( 'category', array( 'parent' => $term2->term_id, 'orderby' => 'include', 'hide_empty' => false ) );
   if($terms3) { 
?>	
<ul>
<?php
    foreach ( $terms3 as $term3 ) {
?>

<? $terms4 = get_terms( 'category', array( 'parent' => $term3->term_id, 'orderby' => 'include', 'hide_empty' => false ) ); ?>	

	<li class="child_3 <? if($terms4) { echo 'haschild_4'; }?>">
				
				<div class="child_wrap">
				<div class="child_wrap_in">
				<a href="<?=get_term_link($term3)?>" title="<?=$term3->name?>"><span><?=$term3->name?></span>
	
				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="20" cy="20" r="20" />
<path d="M11.75 20L26.75 20" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M20 13L27 20L20 27" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

				</a>
				
<?php
	if($terms4) {
?>
<div class="child_4_wrap">
<ul>
<?php
    foreach ( $terms4 as $term4 ) {
?>
<li class="child_4_item">
	<a href="<?=get_term_link($term4)?>" title="<?=$term4->name?>"><?=$term4->name?></a>
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
