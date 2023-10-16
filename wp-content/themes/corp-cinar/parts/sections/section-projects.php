<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
$project_set = get_field('projects_set', get_option('page_on_front'));
?>

<section class="section-common colored section-projects">
	<div class="container">
	<? if(!empty($project_set)) { ?>
		<h2><?=highlightLastWord($project_set['title'])?></h2>
	<? } ?>
	<div class="row projects_row">
	
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

$i = 0;

if ($query->have_posts()) {
	$countq = count($queryall->posts);
    foreach ($query->posts as $post) {
        setup_postdata($post);

if ( has_post_thumbnail() ) {
    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
} else {
	$thumbnail_url = '';
}
$i++;
$post_content = get_post_field('post_content', get_the_ID());
?>   
	<div class="col-xs-12 col-md-6 projects_item">
			<div class="projects_show_side">
				<a href="#project_modal_<?=get_the_ID()?>" class="projects_item_link" data-fancybox="projects">
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
					</span>
				</a>
				
				<? get_template_part('parts/sections/section-projects-modal-item', null, $params = ['post_content' => $post_content]); ?>
				
			</div>	
     </div>
<?  } wp_reset_postdata(); ?>

	<div class="links_more_wrap">
		<a href="<?=get_category_link($project_set['projects_cat'][0])?>"><?=$project_set['more_button']?> (<?=$countq?>)</a>
    </div>
   
<? } ?> 
    </div>
	</div>
</section>
