<?
add_filter( "litespeed_media_ignore_remote_missing_sizes", "__return_true" );

function mytheme_tinymce_settings($settings) {
    $opt = array(
        'extended_valid_elements' => 'h2[style|class|id|span],span[style|class|id]',
    );

    $settings = array_merge($settings, $opt);

    return $settings;
}
add_filter('tiny_mce_before_init', 'mytheme_tinymce_settings');


function hide_term_description() {
    echo '<style>.term-description-wrap { display:none; }</style>';
}
add_action( 'admin_head-term.php', 'hide_term_description' );


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

get_template_part( 'parts/cpt'); 
get_template_part( 'parts/acfparts/titles'); 
get_template_part( 'parts/acfparts/menu'); 
get_template_part( 'parts/acfparts/buttonsandinputs'); 

endif;





?>