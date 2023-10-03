<?
function create_custom_post_type() {
    $labels = array(
        'name'               => _x( 'Секции', 'post type general name', 'textdomain' ),
        'singular_name'      => _x( 'Секция', 'post type singular name', 'textdomain' ),
        'add_new'            => _x( 'Добавить новую', 'book', 'textdomain' ),
        'add_new_item'       => __( 'Добавить новую', 'textdomain' ),
        'edit_item'          => __( 'Редактировать', 'textdomain' ),
        'new_item'           => __( 'Новый', 'textdomain' ),
        'all_items'          => __( 'Все', 'textdomain' ),
        'view_item'          => __( 'Посмотреть', 'textdomain' ),
        'search_items'       => __( 'Поиск', 'textdomain' ),
        'not_found'          => __( 'не найдены', 'textdomain' ),
        'not_found_in_trash' => __( 'В корзине не найдены', 'textdomain' ),
        'menu_name'          => __( 'Секции', 'textdomain' )
    );

    $args = array(
        'labels'        => $labels,
        'description'   => 'Секции для предварительного просмотра',
        'public'        => true,
        'menu_position' => 155,
        'supports'      => array( 'title', 'page-attributes'),
        'has_archive'   => true,
        'show_in_rest'  => true, // Если вы хотите использовать Gutenberg редактор
        'hierarchical'  => false, // Измените на true, если это должна быть иерархическая структура, как у страниц
        'rewrite'       => array( 'slug' => 'section_preview' ),
    );

    register_post_type( 'section_preview', $args );
}
add_action( 'init', 'create_custom_post_type' );


function custom_single_template($template) {
    global $post;

    // Если это наш тип записи
    if ($post->post_type == 'section_preview') {
        
        // Получаем значение метаполя с именем шаблона
        $custom_template_name = get_post_meta($post->ID, '_wp_page_template', true);
        
        if ($custom_template_name) {
            
            // Указываем путь к папке с шаблонами
            $custom_template_path = get_stylesheet_directory() . '/parts/preview/' . $custom_template_name;
            
            // Если файл существует, то используем его
            if (file_exists($custom_template_path)) {
                return $custom_template_path;
            }
        }
    }
    
    // Возвращаем оригинальный шаблон, если наши условия не выполнены
    return $template;
}

add_filter('single_template', 'custom_single_template');


function custom_add_metabox() {
    add_meta_box(
        'custom_template_metabox',      // ID метабокса
        'Выбор шаблона',                // Заголовок метабокса
        'custom_template_metabox_cb',   // Callback функция для вывода содержимого метабокса
        'section_preview',              // Тип записи, для которой добавляется метабокс
        'side',                         // Местоположение метабокса
        'default'                       // Приоритет
    );
}

add_action('add_meta_boxes', 'custom_add_metabox');


function custom_template_metabox_cb($post) {
    $value = get_post_meta($post->ID, '_wp_page_template', true);
    
    echo '<select name="custom_page_template" id="custom_page_template">';
    
    // Исходное значение
    echo '<option value="">— Выберите шаблон —</option>';

    // Получение списка файлов из папки parts/preview
    $template_directory = get_stylesheet_directory() . '/parts/preview/';
    $files = array_diff(scandir($template_directory), array('.', '..'));
    
    foreach ($files as $file) {
        // Фильтруем только .php файлы
        if (strpos($file, '.php') !== false) {
            echo '<option value="' . $file . '" ' . selected($value, $file, false) . '>' . $file . '</option>';
        }
    }

    echo '</select>';
}

function custom_save_metabox_data($post_id) {
    if (array_key_exists('custom_page_template', $_POST)) {
        update_post_meta(
            $post_id,
            '_wp_page_template',
            $_POST['custom_page_template']
        );
    }
}

add_action('save_post_section_preview', 'custom_save_metabox_data');