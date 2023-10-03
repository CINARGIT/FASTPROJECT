<?php
/**
 * Category Template: Список продуктов
 */
$maincategory = get_queried_object();
$idofcat = $maincategory->term_id;
$currentCatID = $maincategory->term_id;
?>
<?php get_header(); ?>

<?php
$parent_term_id = $idofcat; // term id of parent term (edited missing semi colon)
$taxonomies = array( 
    'category',
);
$args = array(
    'parent'         => $parent_term_id,
    // 'child_of'      => $parent_term_id, 
	'hide_empty' => false,
); 

$terms = get_terms($taxonomies, $args); ?>
<? get_template_part( 'parts/section-bread'); ?>



<section class="section-common section-post-list">

	<div class="container">
	<h1><?=single_cat_title()?></h1>
	<div class="s-post_content_row def_flex_row flex_row flex_row_left ">
			<?php
			$i = 0;
			while ( have_posts() ) :
			$i++;
			the_post();
			?>
				
			<?
			endwhile;
			?>
			
			<?php
			$i = 0;
			if ( have_posts() ) : // если имеются записи в блоге
		
			query_posts('cat='.$idofcat);  // указываем ID рубрик, которые необходимо вывести.
			while (have_posts()) : the_post(); $i++; // запускаем цикл обхода материалов блога
			?> 
				        <div class="def_4 usluga_item_prod">
            <a href="<?php the_permalink($usluga->ID); ?>">
				<span class="usluga_item_prod_img">
					<img src="<?=get_the_post_thumbnail_url($usluga->ID, 'medium')?>" alt="<?=get_the_title($usluga->ID)?>">
				</span>
				<span class="usluga_item_prod_info">
					<span class="usluga_item_prod_info_in">
						<span class="usluga_item_prod_title">
							<?=get_the_title($usluga->ID)?>
						</span>
						<span class="usluga_item_prod_opisanie_czeny">
							<?=get_field('opisanie_czeny', $usluga->ID)?>
						</span>
						<span class="usluga_item_prod_czena">
							<?=get_field('czena', $usluga->ID)?>
						</span>
					</span>
				</span>
				<span class="usluga_item_prod_more">
						Подробнее
				</span>
			</a>
        </div>
			<?php 
			endwhile;  // завершаем цикл.
			wp_reset_query();
			endif;
			?>
	<?php wp_corenavi(); ?>
</div>
</div>
</section> 
<? get_template_part( 'parts/section-big-form'); ?>
<?php get_footer();	?> 