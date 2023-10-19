<?php //The function returns CSS variables from the admin panel "Theme Settings" to pass them into cinar-style.css.

function add_custom_css() { ?>
   <style> 
		:root {
			--theme_font_family: <?=get_field('theme_font_family', 'option')?>;
		}
	</style>
    <?php
}

add_action('wp_head', 'add_custom_css');
add_action('admin_head', 'add_custom_css');
