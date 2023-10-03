<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
	$showposts = 8;
} else {
	global $maincategory;
	$id_page_field = $maincategory;
	$id_cat = $maincategory->term_id;
	$showposts = 4;
}



$showmore = true;


if(!empty($args['id_cat'])){
	$maincategory = $args['id_cat'][0];
	$id_cat = $maincategory->term_id;
	$showposts = 8;
	$showmore = false;
	if(!empty($args['cat_title'])){
		$force_pr_cat_title = $args['cat_title'];
	}
}

if(empty($args['category']) AND empty($args['id_cat'])){
	$catList = get_field('pops_cat_set')['otmette_populyarnye_rubriki'];
} else {
	$args = array(
		'hide_empty' => true,
		'orderby' => 'name',
		'depth' => 1,
		'parent' => $id_cat,
		'order' => 'ASC',
		'taxonomy' => 'category',
		'exclude' => get_field('exclude', $id_page_field),
	);
$term_children = get_categories($args);
$catList = [];
if($term_children) {
foreach ( $term_children as $child ) {
  array_push($catList, $child->cat_ID);  
}
} elseif(empty($args['id_cat'])) {
	array_push($catList, $id_cat);
	$showmore = false;
}   
}




?>



	<?php
	$terms = get_terms( 'category', array( 'include' => $catList, 'depth' => 1, 'orderby' => 'include', 'hide_empty' => true ) );
    foreach ( $terms as $term ) {
		
	if(!empty(get_field('alternativnyj_zagolovok', 'category_'.$term->term_id))) {
		$pr_cat_title = get_field('alternativnyj_zagolovok', 'category_'.$term->term_id); 
	} elseif(empty($force_pr_cat_title)) {
		$pr_cat_title = $term->name;
	} else {
		$pr_cat_title = $force_pr_cat_title;
	}
	?>
	<section class="section-common section-product <?=get_field('vyberite_stil_produkczii', 'styleset')?>">
	<div class="container">
	<h2><?=$pr_cat_title?></h2>
		<? if(get_field('korotkoe_opisanie', 'category_'.$term->term_id)) { ?>
			<div class="sp_des"><?=get_field('korotkoe_opisanie', 'category_'.$term->term_id)?></div>
		<? } ?>	
		
	
	<?php
	$myposts = get_posts(array(
    'showposts' => $showposts,
    'post_type' => 'post',
    'tax_query' => array(
     array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => $term->term_id
		)
    )));
	?>
	<div class="row">
	<? foreach ($myposts as $mypost) { ?>
	<div class="col-xs-12 col-md-3 sp_item_col">
		<a href="<?php echo esc_url( get_permalink( $mypost ) ); ?>">
			<span class="sp_item_cart">
				<span class="sp_item_cart_part sp_item_cart_part_top">
				<span class="sp_item_img"><img src="<?=get_the_post_thumbnail_url( $mypost, 'medium' )?>" alt="<?php the_sub_field('nazvanie'); ?>"></span>
				<span class="sp_item_cart_inf">
				<span class="sp_item_title"><?php  echo $mypost->post_title; ?></span>
					<?php if(get_field('atributy', $mypost)): $i = 0;?>	
						<span class="sp_item_atr">
						<?php while(has_sub_field('atributy', $mypost)):$i++; 	if(get_sub_field('minicart-on')) { ?>
						<span class="sp_item_atr_row">
						<span class="sp_item_atr_col sp_item_atr_col_label">
							<?php the_sub_field('nazvanie'); ?>
						</span>
						<span class="sp_item_atr_col sp_item_atr_col_value">
						<?php the_sub_field('znachenie'); ?>
						</span>
						</span>
						<?php } endwhile; ?>
						</span>
					<?php endif; ?> 
					<span class="sp_item_sd"><?=get_field('kratoe_opisanie', $mypost)?></span>
				</span>
				</span>
				<span class="sp_item_cart_part sp_item_cart_part_bottom">
					<span class="sp_item_cart_inf">
						<span class="sp_item_price"><? if(get_field('price', $mypost)) { ?>от <?=number_format(get_field('price', $mypost), 0, ',', ' ');?> руб.<? } ?></span>
						<span class="sp_item_more order_button"><?=get_field('nadpis_na_kartochki_tovara', 'option')?></span>
					</span>
				</span>
			</span>
		</a>
	</div>
	<?php } ?>	
	</div>	
	
	<? if($showmore) { ?>
	<div class="sp_all_btn_wrap">
		<a href="<?=get_term_link($term)?>" class="sp_all_btn alter_style_btn"><?=get_field('nadpis_na_knopke_smotret_vse', 'option')?></a>
	</div>
	<?php } ?>	
	
    </div>
</section>
	<? } ?>	
