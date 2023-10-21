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