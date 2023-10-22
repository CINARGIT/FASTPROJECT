<? //devmarket main functions

//Подключить основные CSS переменные и передать их во FRONT и в АДМИН панель
get_template_part( 'parts/header-root-css'); 

//Подключить основные стили и передать их в АДМИН панель
function my_acf_layout_enqueue(){
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/css/slick.css');
    wp_enqueue_style('bootstrap-grid', get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css');
    wp_enqueue_style('cinar-config', get_stylesheet_directory_uri() . '/css/cinar-config.css');
    wp_enqueue_style('cinar-styles', get_stylesheet_directory_uri() . '/css/cinar-styles.css');
    wp_enqueue_style('preview', get_stylesheet_directory_uri() . '/css/cinar-preview.css');
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '20181230', true );
}

add_action('admin_head', 'my_acf_layout_enqueue');

function hide_delete_button_for_specific_acf_group() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('div.row-actions:contains("group_65341863d56bf")').find('.trash').hide();
            $('div.row-actions:contains("group_65341863d56bf")').find('.acfdeactivate').hide();
            $('div.row-actions:contains("group_65341863d56bf")').find('.acfduplicate').hide();
        });
    </script>
    <?php
}

add_action('admin_footer-edit.php', 'hide_delete_button_for_specific_acf_group');

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
    $fields = acf_get_fields($field_group_key);

    if (!$fields) {
        return false;
    }

    // Получаем информацию о группе полей.
    $field_group = acf_get_field_group($field_group_key);
    
    // Создаем новый массив с ключом и названием.
    $data = array(
        "key" => $field_group_key,
        "title" => $field_group['title'],
        "fields" => $fields
    );

    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    return $json_data;
}

function merge_and_save_layouts() {
   	if(empty($_POST['data_selector'])) { 
		$field_group_key = 'group_65316fe91a7a8';
	} else {
		$field_group_key = $_POST['data_selector'];
	}
    $current_acf_data = get_acf_group_as_json($field_group_key);
    $current_layouts = json_decode($current_acf_data, true)['fields'][0]['layouts'];

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
            // Замените этот код на ваш код для сохранения данных, если он отличается
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
	?>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="submit" name="import_merged_json" class="button button-secondary" value="Внедрить новые блоки в DevMarket">
		<button type="button" onclick="resetFileInput();" class="button button-primary">Сбросить</button>
	</form>
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
        if ($field_group) {
            acf_delete_field_group($field_group['ID']);
        }

        // Теперь импортируем объединенный JSON
        $merged_json_data = file_get_contents($merged_json_file);
        $merged_array = json_decode($merged_json_data, true);
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
