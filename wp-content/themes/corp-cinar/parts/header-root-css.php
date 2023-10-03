<style> 
	:root {
		--bl_header_button_font_weight: <?=get_field('main_header_data_content', 'option')['button_set']['font_weight']?>;
		--bl_header_button_text-color: <?=get_field('main_header_data_content', 'option')['button_set']['button_text-color']?>;
		--bl_header_button_color_hover: <?=get_field('main_header_data_content', 'option')['button_set']['button_color_hover']?>;
		--bl_header_button_color: <?=get_field('main_header_data_content', 'option')['button_set']['button_color']?>;
		--bl_header_button_border-radius: <?=get_field('main_header_data_content', 'option')['button_set']['button_border-radius']?>px;
		--bl_header_button_font-size: <?=get_field('main_header_data_content', 'option')['button_set']['button_font-size']?>px;
		--bl_header_button_height: <?=get_field('main_header_data_content', 'option')['button_set']['button_height']?>px;
		--bl_header_button_width: <?=get_field('main_header_data_content', 'option')['button_set']['button_width']?>px;
		--bl_header_bottom-margin-top: <?=get_field('main_header_data_content', 'option')['margin-top']?>px;
		--bl_header_bottom-margin-bottom: <?=get_field('main_header_data_content', 'option')['margin-bottom']?>px;
		<?
		foreach (get_field('menu_option', 'option') as $name => $value) {
			if(!$value) $value = 0;
				if (!is_array($value)) {
					echo "--bl_header_menu_" . $name . ": " . $value . ";\n";
				}
		}
		foreach (get_field('menu_option', 'option')['menu_sizes'] as $name => $value) {
			if(!$value) $value = 0;
			if (!is_array($value)) {
				echo "--bl_header_menu_" . $name . ": " . $value . "px;\n";
			}
		}
		?>
		
	}
</style>

