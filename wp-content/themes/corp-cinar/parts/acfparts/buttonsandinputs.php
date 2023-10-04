<?
function insert_iframe_buttonsandinputs() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Ищем наше поле "Сообщение" по уникальному идентификатору
        var messageField = $('#iframe_buttonsandinputs');
        
        if (messageField.length) {
            // Вставляем iframe
            var iframe = '<iframe src="/section_preview/knopki-i-polya/" width="100%" height="300"></iframe>';
            messageField.html(iframe);
        }
    });
    </script>
    <?php
}

add_action('admin_footer', 'insert_iframe_buttonsandinputs');


acf_add_local_field_group(array(
    'key' => 'group_custom',
    'title' => 'Настройка кнопок и полей',
    'fields' => array(
		array(
                'key' => 'field_iframe_buttonsandinputs',
                'label' => 'Предварительный просмотр',
                'name' => 'iframe_buttonsandinputs',
                'type' => 'message',
                 'message' => '<div id="iframe_buttonsandinputs"></div>',
                'new_lines' => 'wpautop', // это преобразует переносы строк в теги <br> и <p>
                'esc_html' => 0, // это позволит вам вставлять HTML, как например <iframe>
            ),

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
            'key' => 'field_border_color_hover',
            'label' => 'Цвет рамки при наведение',
            'name' => 'border_color_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '20%',
            ),
        ),
		
		
		array(
            'key' => 'field_button_transform',
            'label' => 'Трансформация текста',
            'name' => 'transform',
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
            'key' => 'field_align',
            'label' => 'Выравнивание',
            'name' => 'align',
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
		
        // Поле с выбором из списка
        array(
            'key' => 'field_button_font_weight',
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
            'key' => 'field_button_sizes',
            'label' => 'Размеры в PX',
            'name' => 'titles_sizes',
            'type' => 'group',
            'sub_fields' => array(	
		
		array(
            'key' => 'field_border_size',
            'label' => 'Размер рамки',
            'name' => 'border_size',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
		),
		
		
		  array(
            'key' => 'field_weight',
            'label' => 'Ширина по умолчанию',
            'name' => 'weight',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
		),

		
		  array(
            'key' => 'field_button_height',
            'label' => 'Высота по умолчанию',
            'name' => 'height',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
	 ),
	 
	  array(
            'key' => 'field_button_border_radius',
            'label' => 'Загругление углов',
            'name' => 'border_radius',
            'type' => 'number',
            'wrapper' => array(
                'width' => '20%',
            ),
	 
	 ),
	 		
 	 array(
            'key' => 'field_font_size',
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
?>