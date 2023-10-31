<?php function add_custom_css() { ?><style> 
		:root {
			--main_color:<?=get_field('main_color', 'option')?>;
			--main_color_hover:<?=get_field('main_color_hover', 'option')?>;
			--main_color_opacity_20:<?=hex2rgba(get_field('main_color', 'option'), 0.20)?>;
			--second_color:<?=get_field('second_color', 'option')?>;
			--second_color_hover:<?=get_field('second_color_hover', 'option')?>;
			--extra_color:<?=get_field('extra_color', 'option')?>;
			--extra_color_2:<?=get_field('extra_color_2', 'option')?>;
			--extra_color_3:<?=get_field('extra_color_3', 'option')?>;
			--extra_color_4:<?=get_field('extra_color_4', 'option')?>;
			--theme_font_family: <?=get_field('theme_font_family', 'option')?>;
			--input_height: <?=get_field('input_height', 'option')?>px;
			--input_border_color: <?=get_field('input_border_color', 'option')?>;
			--input_border_radius: <?=get_field('input_border_radius', 'option')?>px;
			--button_height: <?=get_field('button_height', 'option')?>px;
			--button_border_radius: <?=get_field('button_border_radius', 'option')?>px;
			--button_color_text: <?=get_field('button_color_text', 'option')?>;
			--button_text_transform: <?=get_field('button_text_transform', 'option')?>;
			--button_font_weight: <?=get_field('button_font_weight', 'option')?>;
			--button_font_size: <?=get_field('button_font_size', 'option')?>px;
			--button_border_width: <?=get_field('button_border_width', 'option')?>px;
			--button_border_color: <?=get_field('button_border_color', 'option')?>;
			--text_color: <?=get_field('text_color', 'option')?>;
			--second_text_color: <?=get_field('second_text_color', 'option')?>;
			--h1_size: <?=get_field('h1_size', 'option')?>px;
			--h1_transform: <?=get_field('h1_transform', 'option')?>;
			--h1_color: <?=get_field('h1_color', 'option')?>;
			--h1_weight: <?=get_field('h1_weight', 'option')?>;
			--h2_size: <?=get_field('h2_size', 'option')?>px;
			--h2_transform: <?=get_field('h2_transform', 'option')?>;
			--h2_color: <?=get_field('h2_color', 'option')?>;
			--h2_weight: <?=get_field('h2_weight', 'option')?>;
			--h3_size: <?=get_field('h3_size', 'option')?>px;
			--h3_transform: <?=get_field('h3_transform', 'option')?>;
			--h3_color: <?=get_field('h3_color', 'option')?>;
			--h3_weight: <?=get_field('h3_weight', 'option')?>;
		}
	</style><?php
}
add_action('wp_head', 'add_custom_css');
add_action('admin_head', 'add_custom_css'); ?>
