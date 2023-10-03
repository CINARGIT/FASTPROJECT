<?
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_cat = $maincategory->term_id;
}
?>

<div class="breadcrumbs_wrap <?=get_field('selectbreadcrumb', 'option')?>">
    <div class="container ">
    <div class="breadcrumbs_in">
		<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div> 
    </div> 
</div> 

<? if(!empty($args['h1'])) { ?>



<div class="section-common <?=get_field('selectbreadcrumb', 'option')?> <? if(!empty($args['class'])) { ?><?=$args['class']?><? } ?>">

<? if(!empty($args['image'])) { ?>
	<div class="container container-image">
		<img src="<?=$args['image']?>" alt="<?=get_the_title?>" class="main-image-top">
	</div>
<? } ?>
	<div class="container container-main">
		<? if(!empty($args['date'])) { ?>
			<div class="date-main"><?=$args['date']?></div>
		<? } ?>
		<h1 class="h1-main <? if(!empty($args['h1-align'])) { ?><?=$args['h1-align']?><? } ?> "><?=$args['h1']?></h1>
	</div>
</div>

<? } ?>