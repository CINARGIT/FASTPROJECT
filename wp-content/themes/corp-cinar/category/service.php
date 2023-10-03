<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
$cat_name = $maincategory->name;
if(!empty(get_field('alternativnyj_zagolovok', $maincategory))){
	$cat_name = get_field('alternativnyj_zagolovok', $maincategory);
}
?>

<section class="content-container section-common section-docs section-blog senergo">
	<div class="section-content-in">
	<div class="container">
<h1><?=$cat_name?></h1>

<? $terms = get_terms( 'category', array( 'parent' => $maincategory->term_id, 'orderby' => 'include', 'hide_empty' => false ) );
   if($terms) { 
?>

<div class="row" >
<?php
	$count = 0;
    foreach ( $terms as $term ) {
	$count++;
?>
		<div class="col-xs-12 col-md-4 sumi-item">
		<a href="<?=get_term_link($term)?>" title="<?=$term->name?>">
		<span class="sumi-img">
			<img src="<?=get_field('miniatyura_rubriki', $term)['url']?>" alt="<?=$term->name?>">
			<span class="sumi-img-overlay"></span>
		</span>
		<span class="sumi-content">
		<span class="sumi-title"><?=$term->name?></span>
		<span class="sumi-more">
			Узнать подробнее 
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M5 12H19" stroke="#FEC601" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M12 5L19 12L12 19" stroke="#FEC601" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
		</span>
		</span>
		</a>
		</div>
<? } ?>			
</div>
<? } ?>				
		

	
	
	
	
    </div>
	</div>
</section>


<? stylePart('vyberite_stili_form_2', 'section-form-2'); ?>