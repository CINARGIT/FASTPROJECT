<? 
$about_set = get_field('about_set', get_option('page_on_front'));
if(!empty($about_set['about_text'])) { ?>
<section class="section-common section-about <?=get_field('vyberite_stil_bloka_o_kompanii', get_option('page_on_front'))?>">
	<div class="about_box_wrap">
	<div class="about_box_wrap_img" style="background-image:url(<?=get_field('about_image', get_option('page_on_front'))['url']?>)"></div>
		<div class="container">
			<div class="about_box">
			<h2><?=$about_set['about_head']?></h2>
			<?=$about_set['about_text']?>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>
<? } ?>