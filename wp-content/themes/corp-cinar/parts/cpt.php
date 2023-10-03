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


function custom_cpt_template_location($template) {
    global $post;

    // Проверяем, является ли это нашим произвольным типом записи
    if ($post->post_type == 'section_preview') {
        // Путь к папке с шаблонами
        $template_path = get_stylesheet_directory() . '/cpt-templates/';

        // Проверка наличия выбранного шаблона
        $custom_template = get_post_meta($post->ID, '_wp_page_template', true);

        // Если пользователь выбрал конкретный шаблон для записи
        if ($custom_template && file_exists($template_path . $custom_template)) {
            return $template_path . $custom_template;
        }
    }

    return $template;
}

add_filter('template_include', 'custom_cpt_template_location');