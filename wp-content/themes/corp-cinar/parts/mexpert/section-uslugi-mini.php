<? 
global $maincategory;
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}

?>
<?php
$args = array(
    'posts_per_page' => 6,
	'cat' => $maincategory->term_id,
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) : 
?>
<section class="section-common section-uslugi-mini <?=get_field('vyberite_stili_uslug', 'styleset')?>">
	<div class="container">

	<? if(!get_field('service_set', $id_page_field)['title']) { ?>
	<h2>Наши услуги</h2>
	<? } else { ?>
	<h2><?=get_field('service_set', $id_page_field)['title']?></h2>
	<? } ?>

<?php
    echo '<div class="row" id="post-container">';
    while ($the_query->have_posts()) : $the_query->the_post();
       get_template_part( 'parts/senergo/section-post-cart');
    endwhile;
    echo '</div>';
    ?>
<div class="sumi-load-more-wrap">
    <button id="load-more" class="sumi-load-more" data-cat="<?=$maincategory->term_id?>">Показать все</button>
</div>

</div>
</section>
<?php
endif;
wp_reset_postdata();
?>