<?
$cat_name = $maincategory->name;
if(!empty(get_field('alternativnyj_zagolovok', $maincategory))){
	$cat_name = get_field('alternativnyj_zagolovok', $maincategory);
}

?>

<? get_template_part( 'parts/sections/main-section-mini', null, $params = ['inside' => 1]); ?>

<section class="section-common section-projects-full">
	<div class="container">
	<div class="section-content-in">

<?
	


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
			echo '<li><a href="'.$category_link.'" class="sp-category-btn unselectable '.$currentlinkall.'"><span>Все</span></a></li>';
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
			<? 
			$i= 0;
			if (have_posts()) : while (have_posts()) : the_post(); 
			$i++;
				$post_content = get_post_field('post_content', get_the_ID());
				get_template_part('category/item/project-item');
				get_template_part('parts/sections/section-projects-modal-item', null, $params = ['post_content' => $post_content]); 
			endwhile; 
			else: 
				echo '<div class="no-posts">Нет записей</div>'; 
			endif;
			?>
     </div>
	 
	 <? if($maincategory->count > 12) { ?>
		<button id="loadMoreBtn" class="loadMoreBtn_style">Показать больше проектов</button>
	 <? } ?>
	 
	</div>
            
            
</section>


