<? 
if(!is_archive()) { 
	$id_page_field = get_the_id();
} else {
	global $maincategory;
	$id_page_field = $maincategory;
}


?>
<?php if( have_rows('bloki', get_option('page_on_front')) ): $cur = 0; ?>
<?php
while( have_rows('bloki', get_option('page_on_front')) ): the_row();
$cOption = get_sub_field('nastrojki');
$labelTextMore = $cOption['label_text_more'];
$blogType = $cOption['vyberite_tip_bloka'];
$sectionBg = $cOption['vyberite_fon_bloka'];
if(empty($sectionBg)) { 
	$sectionBg = '#ffffff';
}

$curOn = $cOption['vklyuchit_karusel'];
$openInModal = $cOption['otkryvat_v_modalnom_okne'];

if(!empty($cOption['item_template'])) {
	$itemTemplate = $cOption['item_template'];
} else {
	$itemTemplate = $blogType;
}

if(!empty($args['blog_type'])) {
	$showmode = false;
	if($args['blog_type'] == $blogType) {
		$showmode = true;
	}
} else {
	$showmode = $cOption["skryt_v_obshhem_vyvode"];
	if(!$showmode) { $showmode = true; } else {$showmode = false; }
}


if($showmode) {
		$cur++;
		$col = 	$cOption['qty_col'];
		if($col){
			$col = 	12/$col;
		} else {
			$col = 12;
		}
	?>
	
	
	<section class="section-common section-blog section-<?=$blogType?> <? if($sectionBg != '#ffffff') echo 'colored'; ?> <?=get_field('blog_select', get_option('page_on_front'))?>" style="background-color:<?=$sectionBg?>">
	<div class="container">
		
		<h2><?=get_sub_field('zagolovok')?></h2>
		<? if(get_sub_field('podzagolovok')) { ?>
			<div class="sp_des"><?=get_sub_field('podzagolovok')?></div>
		<? } ?>	


		
	
	<?php
	$myposts = get_posts(array(
    'showposts' => $cOption['all_qty'],
    'post_type' => 'post',
    'tax_query' => array(
     array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => get_sub_field('vyberite_rubriku'),
		)
    )));
	
	
	if($myposts) {
		
	?>
	<div class="<? if($curOn) { echo 'cur_list_row_wrap'; } else { echo 'uncur_list_row_wrap'; } ?>">
	<div class="<? if($curOn) { echo 'cur_list_row cur_list_'.$blogType . $cur; } else { echo 'row'; }?>">
	<? 
	 foreach ($myposts as $mypost) {
		get_template_part( 'parts/'.get_field('blog_select', get_option('page_on_front')).'/item/'.$itemTemplate, null, $params = ['content' => $mypost, 'col' => $col, 'labelTextMore' => $labelTextMore, 'openinmodal' => $openInModal]);		
	 }
	?>	
	</div>	
	</div>	
	
	
	<div class="sp_all_btn_wrap">
		<a href="<?=get_term_link(get_sub_field('vyberite_rubriku'))?>" class="sp_all_btn alter_style_btn"><?=get_sub_field('blok_show_more')?></a>
	</div>
	
	<? } ?>	

	

	
<? if($curOn) { ?>
<script>
document.addEventListener('DOMContentLoaded', function(){
jQuery('.cur_list_<?=$blogType . $cur?>').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: <?=$cOption['qty_col']?>,
  arrows: true,
  dots: false,
  prevArrow:'<div class="arrow_c arrow_prev_slick"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5833 13H5.41667" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 5.4165L5.41667 12.9998L13 20.5832" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  nextArrow:'<div class="arrow_c arrow_next_slick"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.41663 13H20.5833" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 5.4165L20.5833 12.9998L13 20.5832" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 2,
		slidesToScroll: 2,
		arrows: false,
		dots: true,
      },
      breakpoint: 490,
      settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		centerMode:true,
		dots: true,
      },
    },
]
});
});
</script>
<? } ?>
		</div>
</section>	


	<? } ?>	
	<?php endwhile; ?>
		
<?php endif; ?>	
	

