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
            'key' => 'field_bg_exp_color',
            'label' => 'Установить фон секции для предварительно просмотра',
            'name' => 'bg_exp_color',
            'type' => 'color_picker',
            'wrapper' => array(
                'width' => '100%',
            ),
        ),
	
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
            'label' => 'Кнопка по умолчанию',
            'name' => 'my_tab',
            'type' => 'tab',
        ),
	
  
		array(
            'key' => 'field_button_option',
            'label' => 'Параметры кнопок по умолчанию',
            'name' => 'button_option',
            'type' => 'group',
            'sub_fields' => array(	
				get_common_settings('button'),
				get_color_settings('button'),
				get_size_settings('button'),
				get_margin_settings('button'),
				get_border_settings('button'),
				get_shadow_settings('button'),
			),
		),
	
		// Вкладка
        array(
            'key' => 'field_tab2',
            'label' => 'Поля ввода по умолчанию',
            'name' => 'my_tab2',
            'type' => 'tab',
        ),
	
		array(
            'key' => 'field_input_option',
            'label' => 'Параметры полей ввода по умолчанию',
            'name' => 'input_option',
            'type' => 'group',
            'sub_fields' => array(	
				get_common_settings('input'),
				get_color_settings('input'),
				get_size_settings('input'),
				get_margin_settings('input'),
				get_border_settings('input'),
				get_shadow_settings('input'),
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