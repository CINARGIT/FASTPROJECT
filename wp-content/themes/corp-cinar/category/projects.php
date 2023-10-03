<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
$cat_name = $maincategory->name;
if(!empty(get_field('alternativnyj_zagolovok', $maincategory))){
	$cat_name = get_field('alternativnyj_zagolovok', $maincategory);
}
?>

<section class="section-common senergo section-content section-blog section-case section-case-in section-standart section-blog-page">
	<div class="container">
	<div class="section-content-in">
	<h1><?=$cat_name?></h1>
	
	
<?
	
if(!empty($_GET['current'])){
$currentyear = $_GET['current'];
} else{
$currentyear = '';
}

	if( is_category() ){
		$maincategory = get_queried_object();
		$idofcat = $maincategory->term_id;
	} else {
		$categories = get_the_category();
		$idofcat = $categories[0]->cat_ID;
	}
	
	if(category_has_parent($idofcat)) {
		$idofcat = $maincategory->category_parent;
	} else {
		$idofcat = $idofcat;
	}
		
// если мы в категории
if( is_category() ){
	// получим ID текущей категории
	$current_cat_id = $idofcat;
	$current_cat_slug = get_queried_object()->slug;
	$category_link = get_category_link($idofcat);
	$category_name = get_cat_name($idofcat);
	$args = array(
		'child_of'     => $current_cat_id,
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 0,
		'hierarchical' => 1,
		'number'       => 0, // сколько выводить?
		// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
	);
	$categories = get_categories( $args );
	if( $categories ){
		$currentlinkall = 'current_link_none';
		if($currentCatID == $idofcat) $currentlinkall = 'active';
		
		echo '
		
		<ul class="section-blog-cat-row">';
			echo '<li><a href="'.$category_link.'" class="sp-category-btn unselectable '.$currentlinkall.'"><span>Все '.$category_name.'</span></a></li>';
		foreach( $categories as $cat ){	
		?>
			<li><a href="<?=get_category_link($cat->term_id)?>" class="sp-category-btn unselectable <? if($currentCatID == $cat->term_id) echo 'active' ?>"><span><?=$cat->name?></span></a></li>
		
		<?php
		}
		echo '</ul>';
	}
}
?>			
	
	
	</div>
	
	
	<div class="row sb_items_row">
					<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
                    <?
                                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
                                $thumbnail = $thumbnail['0'];
			$raiting_full = 5;
			$raiting_item = get_field('oczenka', $post->ID);
			$raiting = (($raiting_full - $raiting_item) * 100) / $raiting_full;
			$raiting = 100 - $raiting;
                              ?>



	<div class="col-xs-12 col-md-6 sb_item_col">
		<div class="item_col_wrap">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<span class="spr_item_cart">
				<span class="sb_item_cart_part sb_item_cart_part_top">
				
				
					<span class="sb_item_img">
						<img src="<?=$thumbnail?>" alt="<?php the_title();?>">
					</span>
				
				
					
				<span class="sb_item_cart_inf">
				<? if(!empty(get_field('aftertitle'))) { ?>
				<span class="sb_item_aftertitle">
					<?=get_field('aftertitle')?>
				</span>
				<? } ?>
			
				<span class="sb_item_title"><?php the_title();?></span>
			
					<span class="sb_item_sd">
						<? 
							if(!empty(get_field('kratoe_opisanie', get_the_id()))) { 
								echo get_field('kratoe_opisanie', get_the_id());
							} else {
								echo get_the_excerpt();
							}
						 ?>
					</span>
					
					<span class="sb_item_sd_bs row">
						<span class="col-xs-12 col-md-6">
						<span class="sb_item_sd_bs_item sb_item_sd_bs_do">
							<span class="sb_item_sd_bs_label">Было</span>
							<span class="sb_item_sd_bs_v"><?=get_field('bylo')?></span>
						</span>
						</span>
						<span class="col-xs-12 col-md-6">
						<span class="sb_item_sd_bs_item sb_item_sd_bs_posle">
							<span class="sb_item_sd_bs_label">Стало</span>
							<span class="sb_item_sd_bs_v"><?=get_field('stalo')?></span>
						</span>
						</span>
					</span>
					
				</span>
				</span>
				<span class="sb_item_more">Читать подробнее о проекте</span>
			</span>
		</a>
		</div>
	</div>




					
                    <?php endwhile; // конец цикла
                    else: echo '<div class="col-xs-12 col-md-6 sb_item_col">Нет записей</div>'; endif; // если записей нет, напишим "простите" ?>
                </div>
				
					<?php wp_corenavi(); ?>
				
                </div>
            
            
</section>


