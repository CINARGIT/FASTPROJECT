<?

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
                'key' => 'field_message_iframe',
                'label' => 'Предварительный просмотр',
                'name' => 'message_iframe',
                'type' => 'message',
                'message' => '<div id="custom_preview"></div>',
                'new_lines' => 'wpautop', // это преобразует переносы строк в теги <br> и <p>
                'esc_html' => 0, // это позволит вам вставлять HTML, как например <iframe>
            ),
		
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
            'key' => 'field_menu_item_border_color',
            'label' => 'Цвет рамки пункта меню',
            'name' => 'border_menu_item_color',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		array(
            'key' => 'field_menu_item_border_color_hover',
            'label' => 'Цвет рамки пункта меню при наведение',
            'name' => 'border_menu_item_color_hover',
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
            'key' => 'field_menu_text_transform',
            'label' => 'Трансформация текста',
            'name' => 'text_transform',
            'type' => 'select',
            'choices' => array(
                'uppercase' => 'ВСЕ ЗАГЛАВНЫЕ',
                'none' => 'Стандартно',
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
            'key' => 'field_menu_item_border_bottom_size',
            'label' => 'Толщина рамки пункта меню снизу',
            'name' => 'border_bottom_menu_item_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		array(
            'key' => 'field_menu_item_border_top_size',
            'label' => 'Толщина рамки пункта меню снизу',
            'name' => 'border_top_menu_item_size',
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
		
		array(
            'key' => 'field_menu_item_margin_left',
            'label' => 'Наружный отступ пункта меню слева',
            'name' => 'menu_item_margin_left',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		
		array(
            'key' => 'field_menu_item_margin_right',
            'label' => 'Наружный отступ пункта меню справа',
            'name' => 'menu_item_margin_right',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		
		array(
            'key' => 'field_menu_item_padding_left',
            'label' => 'Внутренний отступ пункта меню слева',
            'name' => 'menu_item_padding_left',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		array(
            'key' => 'field_menu_item_padding_right',
            'label' => 'Внутренний отступ пункта меню справа',
            'name' => 'menu_item_padding_right',
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


?>