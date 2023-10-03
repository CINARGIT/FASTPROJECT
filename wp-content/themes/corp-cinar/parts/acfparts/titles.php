<?
//Настройка заголовков

acf_add_local_field_group(array(
    'key' => 'group_titles_set',
    'title' => 'Настройка заголовков',
    'fields' => array(
     
	        // Вкладка
        array(
            'key' => 'field_tab_menu',
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
?>