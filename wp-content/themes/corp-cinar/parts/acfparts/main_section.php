<?
if( function_exists('acf_add_options_sub_page') ) {
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Главный экран',
        'menu_title'	=> 'Главный экран',
		'menu_slug' 	=> 'main_section_set',
        'parent_slug'	=> 'theme-general-settings',
    ));
}


?>

<?
function insert_iframe_main_section() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Ищем наше поле "Сообщение" по уникальному идентификатору
        var messageField = $('#iframe_main_section');
        
        if (messageField.length) {
            // Вставляем iframe
            var iframe = '<iframe src="/section_preview/glavnyj-ekran/" width="100%" height="600"></iframe>';
            messageField.html(iframe);
        }
    });
    </script>
    <?php
}
add_action('admin_footer', 'insert_iframe_main_section');
acf_add_local_field_group(array(
    'key' => 'group_main_section_custom',
    'title' => 'Настройка главного экрана',
    'fields' => array(
	
	
		array(
                'key' => 'field_iframe_main_section',
                'label' => 'Предварительный просмотр',
                'name' => 'iframe_main_section',
                'type' => 'message',
                 'message' => '<div id="iframe_main_section"></div>',
                'new_lines' => 'wpautop', // это преобразует переносы строк в теги <br> и <p>
                'esc_html' => 0, // это позволит вам вставлять HTML, как например <iframe>
        ),
		
		array(
            'key' => 'field_image_main_section',
            'label' => 'Изображения для фона',
            'name' => 'image_main_section_group',
            'type' => 'group',
            'sub_fields' => array(			
		 array(
            'key' => 'field_image_upload_main_section',
            'label' => 'Выберите изображение для фона по умолчанию',
            'name' => 'selected_image',
            'type' => 'image',
            'return_format' => 'array', // Можно использовать 'url', 'id' или 'array'
            'preview_size' => 'thumbnail', // Размер превью
            'library' => 'all', // 'all' (все изображения) или 'uploadedTo' (только загруженные на этот пост)
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
			),
		),
		),
		

		 // Вкладка
        array(
            'key' => 'field_tab_main_section_h1',
            'label' => 'Настройка H1',
            'name' => 'my_tab_h1',
            'type' => 'tab',
        ),
	
  
		array(
            'key' => 'field_main_section_option',
            'label' => 'Параметры кнопки по умолчанию',
            'name' => 'main_section_h1_option',
            'type' => 'group',
            'sub_fields' => array(	
		
				get_text_common_settings('main_section'),
				get_common_settings('main_section'),
				get_color_mini_settings('main_section'),
				get_margin_settings('main_section'),
			),
		),
	

	), 
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'main_section_set',
            ),
        ),
    ),
));
?>