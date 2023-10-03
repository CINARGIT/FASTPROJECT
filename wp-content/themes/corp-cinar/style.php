<?
add_filter( "litespeed_media_ignore_remote_missing_sizes", "__return_true" );

function mytheme_tinymce_settings($settings) {
    $opt = array(
        'extended_valid_elements' => 'h2[style|class|id|span],span[style|class|id]',
    );

    $settings = array_merge($settings, $opt);

    return $settings;
}
add_filter('tiny_mce_before_init', 'mytheme_tinymce_settings');


function hide_term_description() {
    echo '<style>.term-description-wrap { display:none; }</style>';
}
add_action( 'admin_head-term.php', 'hide_term_description' );


function remove_ls_characters($value, $post_id, $field) {
    if (strpos($value, "\xe2\x80\xa8") !== false) {
        $value = str_replace("\xe2\x80\xa8", "", $value);
    }
    return $value;
}

add_filter('acf/update_value', 'remove_ls_characters', 10, 3);

function custom_excerpt_length($post, $word_count) {
    $excerpt = $post->post_excerpt;
    if ('' == $excerpt) {
        $excerpt = $post->post_content;
    }

    $excerpt = strip_shortcodes($excerpt); // удаляем все шорткоды
    $excerpt = wp_strip_all_tags($excerpt, true); // удаляем все HTML-теги

    $words = explode(' ', $excerpt, $word_count + 1);
    if (count($words) > $word_count) {
        array_pop($words); // удаляем последнее слово, чтобы обеспечить точное ограничение количества слов
        $excerpt = implode(' ', $words) . '...';
    }

    return $excerpt;
}


function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function my_acf_prepare_field( $field ) {

    // Don't show this field once it contains a value.
  	if( is_front_page() ) {
        return false;
    } 
}
if( function_exists('acf_add_local_field_group') ):


acf_add_local_field_group(array(
    'key' => 'group_custom',
    'title' => 'Настройка кнопок и полей',
    'fields' => array(
     
	        // Вкладка
        array(
            'key' => 'field_tab1',
            'label' => 'Кнопки',
            'name' => 'my_tab',
            'type' => 'tab',
        ),
	
  
 array(
            'key' => 'field_group1',
            'label' => 'Общие параметры кнопок',
            'name' => 'sub_group',
            'type' => 'group',
            'sub_fields' => array(	
		
		        array(
            'key' => 'field_color_picker',
            'label' => 'Цвет фона',
            'name' => 'color_bg',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
        // Поле с цветом 2
        array(
            'key' => 'field_color_bg_hover',
            'label' => 'Цвет фона при наведение',
            'name' => 'color_bg_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
        // Поле с цветом 3
        array(
            'key' => 'field_color_text',
            'label' => 'Цвет текста',
            'name' => 'color_text',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		  // Цвет текста при наведение
        array(
            'key' => 'field_color_text_hover',
            'label' => 'Цвет текста при наведение',
            'name' => 'color_text_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		 array(
            'key' => 'field_border_color',
            'label' => 'Цвет рамки',
            'name' => 'border_color',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		array(
            'key' => 'field_border_size',
            'label' => 'Размер рамки в PX',
            'name' => 'border_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
		),
		
		
		  array(
            'key' => 'field_weight',
            'label' => 'Ширина по умолчанию в PX',
            'name' => 'weight',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),

		
		  array(
            'key' => 'field_height',
            'label' => 'Высота по умолчанию в PX',
            'name' => 'height',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
	 ),
	 		
 	 array(
            'key' => 'field_font_size',
            'label' => 'Размер шрифта в PX',
            'name' => 'font_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
	 ),
	
		

        // Поле с выбором из списка
        array(
            'key' => 'field_font_weight',
            'label' => 'Толщина шрифта',
            'name' => 'font_weight',
            'type' => 'select',
            'choices' => array(
                '300' => 'Тонкий (300)',
                '400' => 'Нормальный (400)',
                '500' => 'Средний (500)',
                '600' => 'Полужирный (600)',
                '700' => 'Жирный (700)',
                '800' => 'Полутяжелый (800)',
                '900' => 'Тяжелый (900)'
            ),
			'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		
    ),
	
		),	
    // Вкладка
        array(
            'key' => 'field_tab2',
            'label' => 'Поля ввода',
            'name' => 'my_tab2',
            'type' => 'tab',
			 
        ),
	

 array(
            'key' => 'field_inputset',
            'label' => 'Общие параметры полей ввода',
            'name' => 'inputset',
            'type' => 'group',
            'sub_fields' => array(	
		
	 array(
            'key' => 'field_input_color_picker',
            'label' => 'Цвет фона',
            'name' => 'color_bg',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
        // Поле с цветом 2
        array(
            'key' => 'field_input_color_bg_hover',
            'label' => 'Цвет фона при фокусе',
            'name' => 'color_bg_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
        // Поле с цветом 3
        array(
            'key' => 'field_input_color_text',
            'label' => 'Цвет текста',
            'name' => 'color_text',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		  // Цвет текста при наведение
        array(
            'key' => 'field_input_color_text_hover',
            'label' => 'Цвет текста при фокусе',
            'name' => 'color_text_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
			 array(
            'key' => 'field_input_border_color',
            'label' => 'Цвет рамки',
            'name' => 'border_color',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		array(
            'key' => 'field_input_border_size',
            'label' => 'Размер рамки в PX',
            'name' => 'border_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
		),
		  array(
            'key' => 'field_input_weight',
            'label' => 'Ширина по умолчанию в PX',
            'name' => 'weight',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),

		array(
            'key' => 'field_input_height_textarea',
            'label' => 'Высота Textarea в PX',
            'name' => 'height_textarea',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		  array(
            'key' => 'field_height',
            'label' => 'Высота по умолчанию в PX',
            'name' => 'height',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		  ),
	 		
 	 array(
            'key' => 'field_input_font_size',
            'label' => 'Размер шрифта в PX',
            'name' => 'font_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
	 ),
	
		

        // Поле с выбором из списка
        array(
            'key' => 'field_input_font_weight',
            'label' => 'Толщина шрифта',
            'name' => 'font_weight',
            'type' => 'select',
            'choices' => array(
                '300' => 'Тонкий (300)',
                '400' => 'Нормальный (400)',
                '500' => 'Средний (500)',
                '600' => 'Полужирный (600)',
                '700' => 'Жирный (700)',
                '800' => 'Полутяжелый (800)',
                '900' => 'Тяжелый (900)'
            ),
			'wrapper' => array(
                'width' => '100%',
            ),
        ),
		
		
		
		
		), 		
		
		),
		
	), 
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'button_set',
            ),
        ),
    ),
));



//Настройка меню


acf_add_local_field_group(array(
    'key' => 'group_menu_set',
    'title' => 'Настройка меню',
    'fields' => array(
     
	        // Вкладка
        array(
            'key' => 'field_tab',
            'label' => 'Меню',
            'name' => 'my_tab',
            'type' => 'tab',
        ),
	
		array(
            'key' => 'field_menu_option',
            'label' => 'Общие параметры дизайна меню',
            'name' => 'menu_option',
            'type' => 'group',
            'sub_fields' => array(	
		
		  array(
            'key' => 'field_menu_color_picker',
            'label' => 'Цвет фона',
            'name' => 'color_bg',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
	
        array(
            'key' => 'field_menu_color_text',
            'label' => 'Цвет текста',
            'name' => 'color_text',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		  // Цвет текста при наведение
        array(
            'key' => 'field_menu_color_text_hover',
            'label' => 'Цвет текста при наведение',
            'name' => 'color_text_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		array(
            'key' => 'field_menu_border_color',
            'label' => 'Цвет рамки',
            'name' => 'border_color',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		array(
            'key' => 'field_menu_color_menu_item_bg',
            'label' => 'Цвет фона пунктов меню',
            'name' => 'color_menu_item_bg',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		array(
            'key' => 'field_menu_color_menu_item_bg_hover',
            'label' => 'Цвет фона пунктов меню при наведение',
            'name' => 'color_menu_item_bg_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		    // Поле с выбором из списка
        array(
            'key' => 'field_menu_font_weight',
            'label' => 'Толщина шрифта',
            'name' => 'font_weight',
            'type' => 'select',
            'choices' => array(
                '300' => 'Тонкий (300)',
                '400' => 'Нормальный (400)',
                '500' => 'Средний (500)',
                '600' => 'Полужирный (600)',
                '700' => 'Жирный (700)',
                '800' => 'Полутяжелый (800)',
                '900' => 'Тяжелый (900)'
            ),
			'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		
		array(
            'key' => 'field_menu_sizes',
            'label' => 'Размеры в PX',
            'name' => 'menu_sizes',
            'type' => 'group',
            'sub_fields' => array(	
		
		
		array(
            'key' => 'field_menu_border_bottom_size',
            'label' => 'Толщина рамки снизу',
            'name' => 'border_bottom_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		array(
            'key' => 'field_menu_border_top_size',
            'label' => 'Толщина рамки сверху',
            'name' => 'border_top_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		array(
            'key' => 'field_menu_border_left_size',
            'label' => 'Толщина рамки слева',
            'name' => 'border_left_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		array(
            'key' => 'field_menu_border_right_size',
            'label' => 'Толщина рамки справа',
            'name' => 'border_right_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		array(
            'key' => 'field_menu_weight',
            'label' => 'Ширина по умолчанию',
            'name' => 'weight',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		array(
            'key' => 'field_menu_height',
            'label' => 'Высота по умолчанию',
            'name' => 'height',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		array(
            'key' => 'field_menu_font_size',
            'label' => 'Размер шрифта',
            'name' => 'font_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		),
		),
		
		
    ),
	),	
	), 
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'menu_set',
            ),
        ),
    ),
));


//Настройка заголовков

acf_add_local_field_group(array(
    'key' => 'group_titles_set',
    'title' => 'Настройка заголовков',
    'fields' => array(
     
	        // Вкладка
        array(
            'key' => 'field_tab',
            'label' => 'Заголовки',
            'name' => 'my_tab',
            'type' => 'tab',
        ),
	
		array(
            'key' => 'field_titles_option',
            'label' => 'Общие параметры дизайна заголовков',
            'name' => 'titles_option',
            'type' => 'group',
            'sub_fields' => array(	
		
	
        array(
            'key' => 'field_titles_color_text',
            'label' => 'Цвет текста',
            'name' => 'color_text',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		array(
            'key' => 'field_titles_color_text_2',
            'label' => 'Цвет текста (вторая половина)',
            'name' => 'color_text_2',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
	
		
		  array(
            'key' => 'field_titles_margin_bottom',
            'label' => 'Отступ снизу',
            'name' => 'margin_bottom',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		  array(
            'key' => 'field_titles_margin_top',
            'label' => 'Отступ сверху',
            'name' => 'margin_top',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
	 		
 	 array(
            'key' => 'field_titles_font_size',
            'label' => 'Размер шрифта в PX',
            'name' => 'font_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
	 ),
	
		

        // Поле с выбором из списка
        array(
            'key' => 'field_titles_font_weight',
            'label' => 'Толщина шрифта',
            'name' => 'font_weight',
            'type' => 'select',
            'choices' => array(
                '300' => 'Тонкий (300)',
                '400' => 'Нормальный (400)',
                '500' => 'Средний (500)',
                '600' => 'Полужирный (600)',
                '700' => 'Жирный (700)',
                '800' => 'Полутяжелый (800)',
                '900' => 'Тяжелый (900)'
            ),
			'wrapper' => array(
                'width' => '100%',
            ),
        ),
		
		
    ),
	
		),	
  
		
	), 
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'titles_set',
            ),
        ),
    ),
));



endif;





?>