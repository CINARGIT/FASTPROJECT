<?
function get_color_settings($groupkey) {
	  return array(
            'key' => 'field_' . $groupkey . '_main_color',
            'label' => 'Настройка основных цветов',
            'name' => 'color',
            'type' => 'group',
            'sub_fields' => array(	
					
		        array(
            'key' => 'field_' . $groupkey . '_bg',
            'label' => 'Цвет фона',
            'name' => 'color_bg',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '25%',
            ),
        ),
        // Поле с цветом 2
        array(
            'key' => 'field_' . $groupkey . '_color_bg_hover',
            'label' => 'Цвет фона при наведение',
            'name' => 'color_bg_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '25%',
            ),
        ),
        // Поле с цветом 3
        array(
            'key' => 'field_' . $groupkey . '_color_text',
            'label' => 'Цвет текста',
            'name' => 'color_text',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '25%',
            ),
        ),
		  // Цвет текста при наведение
        array(
            'key' => 'field_' . $groupkey . '_color_text_hover',
            'label' => 'Цвет текста при наведение',
            'name' => 'color_text_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '25%',
            ),
        ),
		
		 array(
            'key' => 'field_' . $groupkey . '_border_color',
            'label' => 'Цвет рамки',
            'name' => 'border_color',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '25%',
            ),
        ),
		
		array(
            'key' => 'field_' . $groupkey . '_border_color_hover',
            'label' => 'Цвет рамки при наведение',
            'name' => 'border_color_hover',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '25%',
            ),
        ),
			 ),
			 );
}
function get_shadow_settings($groupkey) {
  return array(
            'key' => 'field_' . $groupkey . '_shadow',
            'label' => 'Настройка тени',
            'name' => 'shadow',
            'type' => 'group',
            'sub_fields' => array(	
		
		  array(
            'key' => 'field_' . $groupkey . '_shadow_color',
            'label' => 'Цвет тени',
            'name' => 'shadow_color',
            'type' => 'color_picker',
            'instructions' => 'Выберите цвет тени',
            'required' => 1,
            'default_value' => '#000',
			'wrapper' => array(
                'width' => '25%',
            ),
        ),
		
		
	array(
    'key' => 'field_' . $groupkey . '_shadow_opacity',
    'label' => 'Прозрачность тени',
    'name' => 'shadow_opacity',
    'type' => 'number',
    'instructions' => 'Между 0 (полностью прозрачный) и 1 (непрозрачный)',
    'min' => '0',
    'max' => '1',
    'step' => '0.01',
	'wrapper' => array(
                'width' => '25%',
       ),
),
		
        array(
            'key' => 'field_' . $groupkey . '_shadow_horizontal_offset',
            'label' => 'Горизонтальное смещение',
            'name' => 'horizontal_offset',
            'type' => 'number',
            'instructions' => 'Задайте горизонтальное смещение в пикселях',
            'default_value' => 0,
            'append' => 'px',
			'wrapper' => array(
                'width' => '25%',
            ),
        ),
        array(
            'key' => 'field_' . $groupkey . '_shadow_vertical_offset',
            'label' => 'Вертикальное смещение',
            'name' => 'vertical_offset',
            'type' => 'number',
            'instructions' => 'Задайте вертикальное смещение в пикселях',
            'default_value' => 0,
            'append' => 'px',
			'wrapper' => array(
                'width' => '25%',
            ),
        ),
        array(
            'key' => 'field_' . $groupkey . '_shadow_blur',
            'label' => 'Размытие',
            'name' => 'blur',
            'type' => 'number',
            'instructions' => 'Задайте степень размытия в пикселях',
            'default_value' => 0,
            'append' => 'px',
			'wrapper' => array(
                'width' => '25%',
            ),
        ),
        array(
            'key' => 'field_' . $groupkey . '_shadow_spread',
            'label' => 'Размах',
            'name' => 'spread',
            'type' => 'number',
            'instructions' => 'Задайте распространение тени в пикселях',
            'default_value' => 0,
            'append' => 'px',
			'wrapper' => array(
                'width' => '25%',
            ),
        ),
        ),
        );
}



function get_size_settings($groupkey) {
  return array(
            'key' => 'field_' . $groupkey . '_sizes',
            'label' => 'Настройка размеров',
            'name' => 'sizes',
            'type' => 'group',
            'sub_fields' => array(	
		
			array(
            'key' => 'field_' . $groupkey . '_font_size',
            'label' => 'Размер шрифта',
            'name' => 'font_size',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
            ),
			
		  array(
            'key' => 'field_' . $groupkey . '_height',
            'label' => 'Высота по умолчанию',
            'name' => 'height',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		  array(
            'key' => 'field_' . $groupkey . '_width',
            'label' => 'Ширина по умолчанию',
            'name' => 'width',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		
		 array(
            'key' => 'field_' . $groupkey . '_radius',
            'label' => 'Загругление углов',
            'name' => 'radius',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		 
        ),
        );
}

function get_margin_settings($groupkey) {
  return array(
            'key' => 'field_' . $groupkey . '_margin',
            'label' => 'Отступы',
            'name' => 'margin',
            'type' => 'group',
            'sub_fields' => array(	
		
		array(
            'key' => 'field_' . $groupkey . '_margin_bottom',
            'label' => 'Внешний отcтуп снизу',
            'name' => 'margin_bottom',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_margin_top',
            'label' => 'Внешний отсутп сверху',
            'name' => 'margin_top',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_margin_left',
            'label' => 'Внешний отcтуп слева',
            'name' => 'margin_left',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_margin_right',
            'label' => 'Внешний отcтуп справа',
            'name' => 'margin_right',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_padding_right',
            'label' => 'Внутренний отcтуп справа',
            'name' => 'padding_right',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_padding_left',
            'label' => 'Внутренний отcтуп слева',
            'name' => 'padding_left',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_padding_top',
            'label' => 'Внутренний отcтуп сверху',
            'name' => 'padding_top',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_padding_bottom',
            'label' => 'Внутренний отcтуп снизу',
            'name' => 'padding_bottom',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		 
        ),
        );
}


function get_border_settings($groupkey) {
  return array(
            'key' => 'field_' . $groupkey . '_border',
            'label' => 'Толщина рамок',
            'name' => 'border',
            'type' => 'group',
            'sub_fields' => array(	
		
		array(
            'key' => 'field_' . $groupkey . '_border_bottom',
            'label' => 'Толщина рамки снизу',
            'name' => 'border_bottom',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_border_top',
            'label' => 'Толщина рамки сверху',
            'name' => 'border_top',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . '_border_left',
            'label' => 'Толщина рамки слева',
            'name' => 'border_left',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
		array(
            'key' => 'field_' . $groupkey . 'border_right',
            'label' => 'Толщина рамки справа',
            'name' => 'border_right',
            'type' => 'number',
			'append' => 'px',
            'wrapper' => array(
                'width' => '25%',
            ),
		),
		
	
		 
        ),
        );
}


function get_common_settings($groupkey) {
  return array(
            'key' => 'field_button_common',
            'label' => 'Общие параметры',
            'name' => 'button_сommon',
            'type' => 'group',
            'sub_fields' => array(	
	
		array(
            'key' => 'field_button_transform_сommon',
            'label' => 'Трансформация текста',
            'name' => 'transform',
            'type' => 'select',
            'choices' => array(
                'uppercase' => 'ВСЕ ЗАГЛАВНЫЕ',
                'none' => 'Стандартно',
            ),
			'wrapper' => array(
                'width' => '25%',
            ),
        ),
		
		 array(
            'key' => 'field_button_align_сommon',
            'label' => 'Выравнивание текста',
            'name' => 'align',
            'type' => 'select',
            'choices' => array(
                'flex-start' => 'По левому краю',
                'center' => 'По центру',
                'flex-end' => 'По правому краю',
            ),
			'wrapper' => array(
                'width' => '25%',
            ),
        ),
		
		
		array(
            'key' => 'field_button_object_align_сommon',
            'label' => 'Выравнивание объекта',
            'name' => 'object_align',
            'type' => 'select',
            'choices' => array(
                'flex-start' => 'По левому краю',
                'center' => 'По центру',
                'flex-end' => 'По правому краю',
            ),
			'wrapper' => array(
                'width' => '25%',
            ),
        ),
		
        // Поле с выбором из списка
        array(
            'key' => 'field_button_font_weight_сommon',
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
                'width' => '25%',
            ),
        ),
        ),
        );
}