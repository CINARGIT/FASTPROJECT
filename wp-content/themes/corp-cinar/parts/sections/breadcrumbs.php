<?
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_cat = $maincategory->term_id;
}
?>

<div class="breadcrumbs_wrap">
    <div class="breadcrumbs_in">
		<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div> 
</div> 
