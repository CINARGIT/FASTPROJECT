<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}
?>
<? 
if(!$args['field_group']) {
	$about_set = get_field('about_set',  get_option('page_on_front'));
} else {
	$about_set = get_field($args['field_group'],  $id_page_field);
}
?>


<section class="section-common section-about">
	<div class="about_box_wrap">
		<div class="container">
			<div class="about_box">
		
				<? if(empty($args['content'])) { ?>
					<?=$about_set['about_text']?>
				<? } else { ?>
					<?=apply_filters('the_content', $args['content']);?>
				<? } ?>
				

			<div class="clearfix"></div>	
		</div>
	</div>
</section>
