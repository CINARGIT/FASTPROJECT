<?
if(get_field('selectbreadcrumb', 'option')) { 
	get_template_part( 'parts/'.get_field('selectbreadcrumb', 'option').'/breadcrumbs');
} 
?>

<section class="section-common senergo section-content section-blog section-standart section-blog-page">
	<div class="container">
	<div class="section-content-in">
	<h1><?=$maincategory->name?></h1>
	
	
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
		<div class="section-blog-cat-wrap">
		<ul class="section-blog-cat-row">';
			echo '<li><a href="'.$category_link.'" class="sp-category-btn unselectable '.$currentlinkall.'"><span>Все '.$category_name.'</span></a></li>';
		foreach( $categories as $cat ){	
		?>
			<li><a href="<?=get_category_link($cat->term_id)?>" class="sp-category-btn unselectable <? if($currentCatID == $cat->term_id) echo 'active' ?>"><span><?=$cat->name?></span></a></li>
		
		<?php
		}
		echo '</ul></div>';
	}
}
?>			
	
	
	</div>
	
	
	<div class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
                <?
                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
                    $thumbnail = $thumbnail['0'];
					$raiting_full = 5;
					$raiting_item = get_field('oczenka', $post->ID);
					$raiting = (($raiting_full - $raiting_item) * 100) / $raiting_full;
					$raiting = 100 - $raiting;
                ?>
<div class="col-xs-12 col-md-4 sb_item_col">       
	<a href="<?php echo esc_url( get_permalink( $args['content'] ) ); ?>">
			<span class="sb_item_cart">
				<span class="sb_item_cart_part sb_item_cart_part_top">
					<span class="sb_item_img"><img src="<?=$thumbnail?>" alt="<?php the_title();?>"></span>
			<span class="sb_item_cart_inf">
					<span class="sb_item_date sb_item_atr"><?php echo get_the_date('d.m.Y', $post->ID); ?></span>
					<span class="sb_item_title"><?php the_title();?></span>
					<span class="sb_item_sd">
						<?php echo wp_trim_words(get_the_excerpt($loop->ID), 15, '...' ); ?>
					</span>
				</span>
				</span>
				<span class="sb_item_more">Читать подробнее</span>
			</span>
		</a>
</div>
					
                    <?php endwhile; // конец цикла
                    else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишим "простите" ?>
                </div>
				
					<?php wp_corenavi(); ?>
				
                </div>
            
            
</section>



