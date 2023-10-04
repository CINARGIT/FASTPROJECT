<?
//Настройка заголовков

if( function_exists('acf_add_options_sub_page') ) {
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Типографика',
        'menu_title'	=> 'Типографика',
		'menu_slug' 	=> 'titles_set',
        'parent_slug'	=> 'theme-general-settings',
    ));
}


function insert_iframe_titles() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Ищем наше поле "Сообщение" по уникальному идентификатору
        var messageField = $('#iframe_titles');
        
        if (messageField.length) {
            // Вставляем iframe
            var iframe = '<iframe src="/section_preview/zagolovoki/" width="100%" height="200"></iframe>';
            messageField.html(iframe);
        }
    });
    </script>
    <?php
}
add_action('admin_footer', 'insert_iframe_titles');

acf_add_local_field_group(array(
    'key' => 'group_titles_set',
    'title' => 'Настройка заголовков',
    'fields' => array(
     
	        // Вкладка
        array(
            'key' => 'field_tab_menu',
            'label' => 'Заголовки h2 внутри базовых секций',
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
                'key' => 'field_iframe_titles',
                'label' => 'Предварительный просмотр',
                'name' => 'iframe_titles',
                'type' => 'message',
                 'message' => '<div id="iframe_titles"></div>',
                'new_lines' => 'wpautop', // это преобразует переносы строк в теги <br> и <p>
                'esc_html' => 0, // это позволит вам вставлять HTML, как например <iframe>
            ),
		
		
	
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
                'width' => '20%',
            ),
        ),
		
			 array(
            'key' => 'field_titles_text_transform',
            'label' => 'Трансформация текста',
            'name' => 'titles_transform',
            'type' => 'select',
            'choices' => array(
                'uppercase' => 'ВСЕ ЗАГЛАВНЫЕ',
                'none' => 'Стандартно',
            ),
			'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		
		     // Поле с выбором из списка
        array(
            'key' => 'field_titles_align',
            'label' => 'Выравнивание',
            'name' => 'titles_align',
            'type' => 'select',
            'choices' => array(
                'left' => 'По левому краю',
                'center' => 'По центру',
                'right' => 'По правому краю',
            ),
			'wrapper' => array(
                'width' => '20%',
            ),
        ),
	
	
	array(
            'key' => 'field_titles_sizes',
            'label' => 'Размеры в PX',
            'name' => 'titles_sizes',
            'type' => 'group',
            'sub_fields' => array(	
		
		  array(
            'key' => 'field_titles_margin_bottom',
            'label' => 'Отступ снизу заголовка',
            'name' => 'margin_bottom',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		  array(
            'key' => 'field_titles_margin_top',
            'label' => 'Отступ сверху заголовка',
            'name' => 'margin_top',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		array(
            'key' => 'field_titles_font_size',
            'label' => 'Размер шрифта',
            'name' => 'font_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		array(
            'key' => 'field_section_padding_top',
            'label' => 'Отступ сверху секции',
            'name' => 'section_padding_top',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),
		
		array(
            'key' => 'field_section_padding_bottom',
            'label' => 'Отступ снизу секции',
            'name' => 'section_padding_bottom',
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
                'value' => 'titles_set',
            ),
        ),
    ),
));
?>