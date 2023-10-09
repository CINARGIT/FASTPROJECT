<? function my_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );

 function my_custom_tinymce_button($buttons) {
    array_push($buttons, "|", "mybutton");
    return $buttons;
}

function my_custom_tinymce_plugin($plugin_array) {
    $plugin_array['mybutton'] = get_template_directory_uri() . '/js/my_button.js';
    return $plugin_array;
}

function my_custom_tinymce() {
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) return;

    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'my_custom_tinymce_plugin');
        add_filter('mce_buttons', 'my_custom_tinymce_button');
    }
}
add_action('init', 'my_custom_tinymce');

function refresh_on_new_category() {
    if ( 'edit-category' === get_current_screen()->id ) {
        echo '<script>
            jQuery(document).ready(function($) {
                $("#addtag").on("submit", function(e) {
                    var form = $(this);
                    e.preventDefault();

                    $.post(ajaxurl, form.serialize(), function(response) {
                        if (response) {
                            location.reload();
                        }
                    });
                });
            });
        </script>';
    }
}
add_action('admin_footer', 'refresh_on_new_category');


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



function remove_ls_characters($value, $post_id, $field) {
    if (strpos($value, "\xe2\x80\xa8") !== false) {
        $value = str_replace("\xe2\x80\xa8", "", $value);
    }
    return $value;
}

add_filter('acf/update_value', 'remove_ls_characters', 10, 3);

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
if( function_exists('acf_add_local_field_group') ):


if( function_exists('acf_add_options_page') ) {
	
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройка темы', 
		'menu_title'	=> 'Настройка темы',
		'post_id' => 'options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	

}

get_template_part( 'parts/acffunctions/common-setting'); 
get_template_part( 'parts/cpt'); 
get_template_part( 'parts/acfparts/main_theme_editor');
get_template_part( 'parts/acfparts/main_section');  
get_template_part( 'parts/acfparts/buttonsandinputs'); 
get_template_part( 'parts/acfparts/titles'); 
get_template_part( 'parts/acfparts/menu'); 

endif;





?>