<?php $i = 0; $items = get_sub_field('main_section_style_3_slider'); $i++; ?>
<?php if( $items ): $prefixClass = 'main_section_style_3';	?>
<?php $gradient = get_sub_field('main_section_style_3_slider_gradient_color'); ?>

<style>

	.<?=$prefixClass?>_slide_bg_overaly{
		padding-top:96px;
		height:752px;
		background: linear-gradient(94deg, <?=$gradient['gradient_color_1']?> 3.21%, <?=$gradient['gradient_color_2']?> 49.95%, <?=$gradient['gradient_color_3']?> 100%); 
	}
	
	.<?=$prefixClass?>{
		color:<?=get_sub_field('main_section_style_3_text_color')?>;
	}

	.<?=$prefixClass?> ul.slick-dots li button{
		background-color:#fff;
	}
	
	.<?=$prefixClass?> .arrow_c svg path{
		stroke:<?=get_sub_field('main_section_style_3_text_color')?>;
	}
	
</style>

<script>

document.addEventListener('DOMContentLoaded', function(){
	jQuery('.main_section_style_3_slider').slick({
		centerMode: false,
		lazyLoad: 'ondemand',
		slidesToShow: 1,
		arrows: true,
		dots: true,
		infinite: false,
		prevArrow:'<div class="arrow_c arrow_prev_slick"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M27 16L4 16" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 7L4 16L13 25" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> </div>',
		nextArrow:'<div class="arrow_c arrow_next_slick"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 16L28 16" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M19 7L28 16L19 25" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> </div>',
	});
	
	jQuery('.main_section_style_3_slider .slick-dots').wrap('<div class="slick-dots-wrapper"></div>');
	
	var prevArrow = jQuery('.main_section_style_3_slider .arrow_prev_slick');
	var nextArrow = jQuery('.main_section_style_3_slider .arrow_next_slick');
	
	if (prevArrow.length && nextArrow.length) {
		prevArrow.add(nextArrow).wrapAll('<div class="arrows-wrapper"><div class="container"><div class="arrows-wrapper-in"></div></div></div>');
	}
});

</script>

<section class="main-slider <?=$prefixClass?>">
		<div class="<?=$prefixClass?>_slider">
			<?php $i = 0; foreach( $items as $item ): $i++; ?>
			<div class="<?=$prefixClass?>_slide">
				<div class="<?=$prefixClass?>_slide_bg" style="background-image:url(<?=$item['image']['url']?>)">
				<div class="<?=$prefixClass?>_slide_bg_overaly">
					<div class="container">
					<div class="<?=$prefixClass?>_slide_title"><?=$item['title']?></div>
					<div class="<?=$prefixClass?>_slide_text"><?=$item['short_description']?></div>
					<div class="<?=$prefixClass?>_buttons_group">
						<div class="<?=$prefixClass?>_button_item">
							<a href="<?=$item['link_button_1']?>" class="<?=$prefixClass?>_btn_1 order_button order_button_style_2"><?=$item['text_button_1']?></a>
						</div>
						<div class="<?=$prefixClass?>_button_item">
							<a href="<?=$item['link_button_2']?>" class="<?=$prefixClass?>_btn_2 order_button order_button_style_3"><?=$item['text_button_2']?></a>
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
			<?php 
			if(0) { 
			if($is_preview) { 
				if($i == 1) { break; }
			} 
			} 
			?>	
		<?php endforeach; ?>
		</div>
</section>
<?php endif; ?>	