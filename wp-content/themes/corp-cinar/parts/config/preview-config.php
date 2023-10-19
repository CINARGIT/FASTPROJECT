<? function my_acf_layout_enqueue($field, $layout, $is_preview){
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/css/css/slick.css');
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/css/cinar-styles.css');
    wp_enqueue_style('preview', get_stylesheet_directory_uri() . '/css/cinar-preview.css');
}

add_action('acfe/flexible/enqueue/layout=top_header_style_1', 'my_acf_layout_enqueue', 10, 3);
