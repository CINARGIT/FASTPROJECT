<? 
$about_set = get_field('about_set',  get_option('page_on_front'));
?>
<section class="section-common section-about <?=get_field('vyberite_stil_bloka_o_kompanii', 'styleset')?>">
	<div class="about_box_wrap">
		<div class="container">
			<? if(empty($args['title'])) { ?>
				<h2><?=$about_set['about_head']?></h2>
			<? } else { ?>
				<?=$args['title'];?>
			<? } ?>
			<div class="about_box">
			<? if(empty($args['content'])) { ?>
				<?=$about_set['about_text']?>
			<? } else { ?>
				<?=apply_filters('the_content', $args['content']);?>
			<? } ?>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>
