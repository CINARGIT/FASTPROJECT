<?php function add_custom_css() { ?><style> 
		:root {
			--main_color:<?=get_field('main_color', 'option')?>;
			--main_color_hover:<?=get_field('main_color_hover', 'option')?>;
			--second_color:<?=get_field('second_color', 'option')?>;
			--second_color_hover:<?=get_field('second_color_hover', 'option')?>;
			--theme_font_family: <?=get_field('theme_font_family', 'option')?>;
			--input_height: <?=get_field('input_height', 'option')?>px;
			--input_border_color: <?=get_field('input_border_color', 'option')?>;
			--input_border_radius: <?=get_field('input_border_radius', 'option')?>px;
			--button_height: <?=get_field('button_height', 'option')?>px;
			--button_border_radius: <?=get_field('button_border_radius', 'option')?>px;
			--button_color_text: <?=get_field('button_color_text', 'option')?>;
			--button_text_transform: <?=get_field('button_text_transform', 'option')?>;
			--button_font_weight: <?=get_field('button_font_weight', 'option')?>;
			--button_font_size: <?=get_field('button_font_size', 'option')?>;
			--button_border_width: <?=get_field('button_border_width', 'option')?>px;
			--button_border_color: <?=get_field('button_border_color', 'option')?>;
		}
	</style><?php
}
add_action('wp_head', 'add_custom_css');
add_action('admin_head', 'add_custom_css'); ?>
