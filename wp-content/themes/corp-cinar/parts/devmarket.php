<? //devmarket main functions

//Подключить основные CSS переменные и передать их во FRONT и в АДМИН панель
get_template_part( 'parts/header-root-css'); 


//Подключить основные стили и передать их в АДМИН панель
add_action('admin_head', 'my_acf_layout_enqueue');
function my_acf_layout_enqueue(){
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/css/slick.css');
    wp_enqueue_style('bootstrap-grid', get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css');
    wp_enqueue_style('cinar-config', get_stylesheet_directory_uri() . '/css/cinar-config.css');
    wp_enqueue_style('cinar-styles', get_stylesheet_directory_uri() . '/css/cinar-styles.css');
    wp_enqueue_style('preview', get_stylesheet_directory_uri() . '/css/cinar-preview.css');
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '20181230', true );
}


function get_acf_group_id_by_key($key) {
    // Используем WP_Query для поиска поста с указанным post_name и post_type
    $args = array(
        'name'        => $key,
        'post_type'   => 'acf-field-group',
        'post_status' => 'publish',
        'numberposts' => 1
    );

    $my_posts = get_posts($args);

    if ($my_posts) {
        return $my_posts[0]->ID;  // Если нашли, возвращаем ID
    }

    return null;  // Если не нашли, возвращаем null
}


add_action('admin_menu', 'custom_acf_merge_menu');

function custom_acf_merge_menu() {
    add_menu_page(
        'DevMarket Import', // Заголовок страницы
        'ACF DevMarket Importer', // Название меню
        'manage_options',   // Кто может видеть этот пункт меню (администраторы)
        'custom-acf-merge', // Slug страницы
        'custom_acf_merge_page', // Callback функция для отображения содержимого страницы
        'dashicons-migrate', // Иконка меню
        80 // Позиция в меню
    );
}


function custom_acf_exporter() {
    // Задайте ключ группы полей
    $group_key = 'group_6537167707957';
    
    // Получите группу полей по ключу
    $field_group = acf_get_field_group($group_key);
    if( !$field_group ) {
        wp_send_json_error(array('message' => 'ACF группа полей не найдена.'));
        return;
    }
    
    // Получите все поля для этой группы
    $fields = acf_get_fields($group_key);
    $field_group['fields'] = $fields;
    
    // Отправьте данные в формате JSON
    wp_send_json_success($field_group);
}

add_action('wp_ajax_custom_acf_export', 'custom_acf_exporter');
add_action('wp_ajax_nopriv_custom_acf_export', 'custom_acf_exporter');

function custom_acf_merge_page() {
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline" style="margin-bottom:20px;">Импорт блоков в DevMarket</h1>
			<div class="postbox">
				<div class="inside">
		
					<?php display_json_content(); ?>

    <form method="post" action="">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">Просмотр JSON</th>
                    <td>
					  <!-- Выпадающий список -->
                        <select name="data_selector">
                            <option value="group_65316fe91a7a8">Редактор блоков</option>
                            <option value="group_652ff2520ebc6">Шапки сайта</option>
                            <!-- Добавьте другие опции по мере необходимости -->
                        </select> 
					
                        <input type="submit" name="fetch_acf_data" class="button button-primary" value="Смотреть">
						<p>Просмотреть данные редактора полей</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
	
        <?php
        if (isset($_POST['fetch_acf_data'])) {
            $field_group_key = $_POST['data_selector'];
            $json_data = get_acf_group_as_json($field_group_key);
            
            if ($json_data) {
                echo '<pre style="background-color:#f7f7f7; padding: 10px; margin-top:20px; border: 1px solid #ddd;">' . esc_html($json_data) . '</pre>';
            } else {
                echo '<p>No fields found for the specified field group key.</p>';
            }
        }
        ?>
		
	
        
			</div>
		</div>
    </div>
    <?php
}


function get_acf_group_as_json($field_group_key) {
	$json_path = get_stylesheet_directory() . '/acf-json/'.$field_group_key.'.json';
	$json_data = file_get_contents($json_path);
    // Применяем фильтр для 
    return $json_data;
}


function merge_and_save_layouts() {
   	if(empty($_POST['data_selector'])) { 
		$field_group_key = 'group_65316fe91a7a8';
	} else {
		$field_group_key = $_POST['data_selector'];
	}

    $current_acf_data = get_acf_group_as_json($field_group_key);
    $current_data_array = json_decode($current_acf_data, true);
    $current_layouts = $current_data_array['fields'][0]['layouts'];

    if(isset($_FILES['import_json_file'])) {
        $json_file = $_FILES['import_json_file']['tmp_name'];
        $json_data = file_get_contents($json_file);
        $imported_array = json_decode($json_data, true);

    
        $imported_layouts = $imported_array[0]['fields'][0]['layouts'];
        $new_layouts = array_diff_key($imported_layouts, $current_layouts);
        
        if(!empty($new_layouts)) {
            // Объединяем текущие и новые layouts
            $merged_layouts = array_merge($current_layouts, $new_layouts);
            // Обновляем поля в импортированном массиве
            $imported_array[0]['fields'][0]['layouts'] = $merged_layouts;
            // Сохраняем измененные данные
            save_acf_group_from_json($field_group_key, json_encode($imported_array));
            echo '<p>Layouts успешно объединены и сохранены!</p>';
        } else {
            echo '<p>Нет новых Layouts для объединения.</p>';
        }
    }
}

function display_json_content() {
	if(empty($_POST['data_selector'])) { 
		$field_group_key = 'group_65316fe91a7a8';
	} else {
		$field_group_key = $_POST['data_selector'];
	}
    $current_acf_data = get_acf_group_as_json($field_group_key);
    $current_layouts = json_decode($current_acf_data, true)['fields'][0]['layouts'];
    $upload_dir = wp_upload_dir();
    $merged_json_file = $upload_dir['basedir'] . '/merged_acf_layouts.json'; 
	//$merged_json_file =  get_stylesheet_directory() . '/acf-json/'.$field_group_key.'.json';	
	

    if(isset($_FILES['import_json_file'])) {
        $json_file = $_FILES['import_json_file']['tmp_name'];
        $json_data = file_get_contents($json_file);
        $imported_array = json_decode($json_data, true);
        $imported_layouts = $imported_array[0]['fields'][0]['layouts'];

        $new_layouts = array_diff_key($imported_layouts, $current_layouts);

        // Объединяем текущие и новые layouts
        $merged_layouts = array_merge($current_layouts, $new_layouts);

        // Обновляем поля в импортированном массиве
        $imported_array[0]['fields'][0]['layouts'] = $merged_layouts;

        // Сохраняем объединенный JSON
		
        $merged_json = json_encode($imported_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        // Сохраняем объединенный JSON в файле
        file_put_contents($merged_json_file, $merged_json);

        if(!empty($new_layouts)) {
	?>	
			
	<?php
    // Отображаем кнопку "Внедрить" только если файл был загружен
		if (isset($_FILES['import_json_file']) && file_exists($merged_json_file)) {
		file_put_contents($merged_json_file, $merged_json);
	?>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="submit" name="import_merged_json" class="button button-secondary" value="Внедрить новые блоки в DevMarket">
		<button type="button" onclick="resetFileInput();" class="button button-primary">Сбросить</button>
	</form>
	
	<?php       // Отображение объединенного JSON
        echo '<h3>Объединенный JSON:</h3>';
        echo '<textarea style="width:100%; height:400px;">' . $merged_json . '</textarea>';
	?>	
	<?php } ?>	
		
		<?php	
            echo '<h3>Новые блоки для административной панели:</h3>';
            echo '<pre style="background-color:#fff; padding: 10px; margin-top:20px; border: 1px solid #ddd;">' . print_r($new_layouts, true) . '</pre>';
        } else {
            echo '<div class="notice notice-warning"><p>Нет новых блоков для объединения.</p></div>';
        }
    }

    if (isset($_POST['import_merged_json']) && file_exists($merged_json_file)) {
        // Удаляем старую группу полей перед импортом новой
        $field_group = acf_get_field_group($field_group_key);
        $field_group_id = get_acf_group_id_by_key($field_group_key);
        acf_delete_field_group($field_group_id);
      

        // Теперь импортируем объединенный JSON
        $merged_json_data = file_get_contents($merged_json_file);
        $merged_array = json_decode($merged_json_data, true);
		$merged_json_file_final =  get_stylesheet_directory() . '/acf-json/'.$field_group_key.'.json';	
		file_put_contents($merged_json_file_final, $merged_json_data);		
		
		file_put_contents($merged_json_file, $merged_json_data);
        foreach ($merged_array as $field_group) {
            acf_import_field_group($field_group);
        }
		
        echo '<div class="updated notice notice-success is-dismissible"><p>Данные успешно импортированы в ACF!</p></div>';
    }

    ?>
	
	<?php
    // Отображаем кнопку "Внедрить" только если файл был загружен
		if (!isset($_FILES['import_json_file']) OR empty($new_layouts)) {
	?>
   <form method="post" action="" enctype="multipart/form-data">
        <table class="form-table"> <!-- Используем стандартную таблицу для форм в админке WordPress -->
            <tbody>
                <tr>
                    <th scope="row"><label for="import_json_file">Выбрать JSON файл</label></th> <!-- Заголовок поля -->
                    <td>
					
				
					
                        <p class="fileselect"> <input type="file" name="import_json_file" id="import_json_file" required></p>
						<p class="description">Выберите ACF JSON файл с новыми блоками для импорта в DevMarket</p> <!-- Описание поля -->
						<p class="submit">
						<div class="inside-s">
						    <!-- Выпадающий список -->
                        <select name="data_selector">
                            <option value="group_65316fe91a7a8">Редактор блоков</option>
                            <option value="group_652ff2520ebc6">Шапки сайта</option>
                            <!-- Добавьте другие опции по мере необходимости -->
                        </select> 
						<input type="submit" name="submit_json_file" class="button button-primary" value="Импорт">
						</div>
						</p>
                    </td>
					
                </tr>
               
            </tbody>
        </table>

       
    </form>
	<?php
    // Отображаем кнопку "Внедрить" только если файл был загружен
		}
	?>


<script>
function resetFileInput() {
    document.querySelector("[name='import_json_file']").value = '';
	location.reload();
}
</script>

	
    <?php
}

//Вывести DevMarket в отдельный пунтк меню

add_action('admin_menu', 'add_acf_menu_item');

function add_acf_menu_item() {
    $devmarketid = get_acf_group_id_by_key('group_65316fe91a7a8');
	add_menu_page(
        'DevMarket',          // Название страницы
        'DevMarket',          // Текст меню
        'edit_posts',                // Требуемые права для доступа
        'post.php?post='.$devmarketid.'&action=edit',  // URL для страницы редактирования группы полей
        '',
        'dashicons-admin-customizer', // Иконка меню
        75                            // Позиция в меню
    );
}



add_filter('admin_body_class', 'add_acf_group_id_to_admin_body');

function add_acf_group_id_to_admin_body($classes) {
    global $post;

    if ($post && 'acf-field-group' == get_post_type($post->ID)) {
        // Добавляем ID группы полей ACF в виде класса
        $classes .= ' acf-group-' . $post->ID;
    }

    return $classes;
}


function add_acf_key_to_admin_body_class($classes) {
    global $post;

    // Проверяем, является ли это ACF группой полей
    if (isset($post) && 'acf-field-group' == $post->post_type) {
        // Добавляем post_name (ключ ACF группы) к классам body
        $classes .= ' ' . sanitize_html_class($post->post_name);
    }

    return $classes;
}

add_filter('admin_body_class', 'add_acf_key_to_admin_body_class');



function my_admin_inline_styles_devmarket() {

	$devmarketid = get_acf_group_id_by_key('group_65316fe91a7a8');
	
    echo '<style>
        
        .group_65316fe91a7a8 #acf-field-group-fields>.inside>.acf-field-list-wrap>.acf-thead,
        .group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.handle{
			display:none;
		}
		
        .group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings{
			display:block !important;
		}
		
        .group_65316fe91a7a8 .acf-field-setting-fc_layout .acf-fc-meta .acf-fc-meta-right{
			width:100%;
			margin-left:0px;
			margin-right:0px;
		}
		
		#post-'.$devmarketid.'.iedit,
        .group_65316fe91a7a8 .acf-field-setting-fc_layout .acf-fc-meta .acf-fc-meta-max,
        .group_65316fe91a7a8 .acf-field-setting-fc_layout .acf-fc-meta .acf-fc-meta-max,
        .group_65316fe91a7a8 .acf-field-setting-fc_layout .acf-fc-meta .acf-fc-meta-min,
        .group_65316fe91a7a8 .acf-field-setting-fc_layout .acf-fc-meta .acf-fc-meta-left,
        .group_65316fe91a7a8 #export-action,
        .group_65316fe91a7a8 #major-publishing-actions,
        .group_65316fe91a7a8 #delete-action,
        .group_65316fe91a7a8 #acf-field-group-fields>.inside>.acf-field-list-wrap>.acf-tfoot,
		.group_65316fe91a7a8 ul[data-name="acfe_flexible_render_style"],
		.group_65316fe91a7a8 ul[data-name="acfe_flexible_render_script"],
        .group_65316fe91a7a8 #submitpost .add-field{
            display:none !important;
        }
		
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main{
			padding-top:0px;
		}
		
		.group_65316fe91a7a8 div[data-name="acfe_display_title"], 
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-tab-wrap,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-tab-wrap .acf-settings-type-conditional-logic,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-tab-wrap .acf-settings-type-presentation,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-tab-wrap .acf-settings-type-validation,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_settings,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_grid_container,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acfe-field-group-layout-block,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_layouts_state,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_remove_button,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_add_actions,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_layouts_locations,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_layouts_settings,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_layouts_thumbnails,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_layouts_previews,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_layouts_templates,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_stylised_button,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_advanced,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-type-settings>.acf-field-setting-acfe_flexible_async,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-setting-name,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-setting-hide_field,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.settings>.acf-field-editor>.acf-field-settings>.acf-field-settings-main>.acf-field-setting-type,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.handle>.acf-tbody>.li-field-label>.row-options>.duplicate-field,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.handle>.acf-tbody>.li-field-label>.row-options>.move-field,
		.group_65316fe91a7a8 div[data-key="field_65316fe9245b0"]>.handle>.acf-tbody>.li-field-label>.row-options>.delete-field{
			display:none !important;
		}
		
		.group_65316fe91a7a8 #misc-publishing-actions .dashicons,
		.group_65316fe91a7a8 #acf-field-group-acfe-side{
		.group_65316fe91a7a8 .acf-settings-type-presentation{
			display:none !important;
		}
		
		.group_65316fe91a7a8 .misc-pub-section.misc-pub-acfe-field-group-export{
			font-size:20px;
		}
		
    </style>
	
	<script>
	</script>
	';
}

add_action('admin_head', 'my_admin_inline_styles_devmarket');

  
function my_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );