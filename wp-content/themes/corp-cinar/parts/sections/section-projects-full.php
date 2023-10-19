<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$project_set = get_field('projects_set', get_option('page_on_front'));
?>

<section class="section-common colored section-projects-full">
	<div class="container">
	<? if(!empty($project_set)) { ?>
		<h2><?=highlightLastWord($project_set['title'])?></h2>
	<? } ?>
	<div class="row projects_row_full">
	
<?php
$args = array(
    'cat' => $project_set['projects_cat'],  // замените YOUR_CATEGORY_ID на ваше значение ID категории
    'posts_per_page' => 4,     // получить все записи, измените это значение, если нужно ограничить количество
);

$argsall = array(
    'cat' => $project_set['projects_cat'],  // замените YOUR_CATEGORY_ID на ваше значение ID категории
    'posts_per_page' => -1,     // получить все записи, измените это значение, если нужно ограничить количество
);

$queryall = new WP_Query($argsall);
$query = new WP_Query($args);

if ($query->have_posts()) {
	$countq = count($queryall->posts);
    foreach ($query->posts as $post) {
        setup_postdata($post);

if ( has_post_thumbnail() ) {
    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
} else {
	$thumbnail_url = '';
}

?>   
	<div class="col-xs-12 col-md-6 projects_item">
			<div class="projects_show_side">
				<a href="<?=get_the_permalink($post)?>" title="" class="projects_item_link">
					<span class="projects_item_img">
						<img src="<?=$thumbnail_url?>" alt="<?=get_the_title($post)?>">
					</span>
					<span class="projects_item_info">
						<span class="projects_item_title">
							<?=get_the_title($post)?>
						</span>
						<span class="projects_item_text">
							<?=get_field('des_short' , get_the_ID())?>
						</span>
						<span class="projects_item_atr">
							<strong>Субъект:</strong> <?=get_field('subject' , get_the_ID())?>
						</span>
					</span>
				</a>
			</div>	
     </div>
<?  } wp_reset_postdata(); ?>


   
<? } ?> 
    </div>
	</div>
</section>