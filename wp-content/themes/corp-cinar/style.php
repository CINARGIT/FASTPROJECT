<? function my_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/css/editor-style.css?v=75' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );


function disable_table_styles_tinymce( $init ) {
    $screen = get_current_screen();
    
    // Проверьте, зарегистрирован ли скрипт TinyMCE
    if ( $screen && wp_script_is( 'editor', 'enqueued' ) ) {
        $init['valid_styles'] = [ '*' => '' ];
        $init['table_class_list'] = [];
    }
    
    return $init;
}

add_filter( 'tiny_mce_before_init', 'disable_table_styles_tinymce' );


function custom_page_template($templates) {
    $theme_directory = get_stylesheet_directory();
    $new_templates = array();

    // Рекурсивный поиск файлов в папке темы
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($theme_directory));

    foreach ($files as $file) {
        if ($file->isDir()) {
            continue;
        }

        $path = $file->getPath() . '/' . $file->getFilename();
        $path = str_replace($theme_directory, '', $path);

        if (!in_array($path, $templates)) {
            $new_templates[] = $path;
        }
    }

    return array_merge($templates, $new_templates);
}

add_filter('theme_page_templates', 'custom_page_template');
add_filter( "litespeed_media_ignore_remote_missing_sizes", "__return_true" );



function custom_excerpt_length($post, $word_count) {
    $excerpt = $post->post_excerpt;
    if ('' == $excerpt) {
        $excerpt = $post->post_content;
    }

    $excerpt = strip_shortcodes($excerpt); // удаляем все шорткоды
    $excerpt = wp_strip_all_tags($excerpt, true); // удаляем все HTML-теги

    $words = explode(' ', $excerpt, $word_count + 1);
    if (count($words) > $word_count) {
        array_pop($words); // удаляем последнее слово, чтобы обеспечить точное ограничение количества слов
        $excerpt = implode(' ', $words) . '...';
    }

    return $excerpt;
}


function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function my_acf_prepare_field( $field ) {

    // Don't show this field once it contains a value.
  	if( is_front_page() ) {
        return false;
    } 
}


?>