<?php function customtheme_add_woocommerce_support()
 {
add_theme_support( 'woocommerce' );
}
add_filter('wpcf7_autop_or_not', '__return_false');
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );
add_filter( 'woocommerce_checkout_fields', 'webendev_woocommerce_checkout_fields' );
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=text', 'do_shortcode');
add_filter( 'wpcf7_form_elements', 'do_shortcode' );

// добавляет поддержку миниатюр в записях
add_theme_support( 'post-thumbnails' ); // для всех типов постов

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


// удаляет слово рубрика
add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
	return $title;
}

// remove the html filtering
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
	
	#col-left {
		width: 50%;
	}
	#col-right{
		width:50%;
	}
    .wp-editor-wrap {
      max-width:1330px;
	  margin:0 auto;
    } 
	
	#attribute_public {
		display:none;
	}
	
	label[for="attribute_public"]{
		display:none !important;
	}
	#edittag {
		margin-top:30px;
		max-width: 1400px;
		padding:30px;
		background-color:#fff;
	}
	
  </style>';
}


//постраничная навигация
function wp_corenavi() {
  global $wp_query;
  $total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
  $a['total'] = $total;
  $a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
  $a['prev_text'] = ''; // текст ссылки "Предыдущая страница"
  $a['next_text'] = ''; // текст ссылки "Следующая страница"

  if ( $total > 1 ) echo '<nav class="pagination">';
  echo paginate_links( $a );
  if ( $total > 1 ) echo '</nav>';
}



/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


class SubMenu_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='sub-menu'><li><a href='#' class='back'>Назад</a></li>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}




class fluent_themes_custom_walker_nav_menu extends Walker_Nav_Menu {

private $blog_sidebar_pos = "";
// add classes to ul sub-menus
function start_lvl( &$output, $depth = 0, $args = Array() ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'dropdown-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? '' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );

    // build html

    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}

// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    global $wp_query, $wpdb;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? '' : '' ), //class for the top level menu which got sub-menu
        ( $depth >=1 ? '' : 'cinar-dropdown-menu' ), //class for the level-1 sub-menu which got level-2 sub-menu
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ), //class for the level-2 sub-menu which got level-3 sub-menu
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    //$attributes .= ' class="' . ( $depth > 0 ? '' : '' ) . '"';

    // Check if menu item is in main menu
    $has_children = $wpdb->get_var("SELECT COUNT(meta_id)
                            FROM wp_postmeta
                            WHERE meta_key='_menu_item_menu_item_parent'
                            AND meta_value='".$item->ID."'");

    if ( $depth == 0 && $has_children > 0  ) {
        // These lines adds your custom class and attribute
        $attributes .= ' class="cinar-dropdown-toggle"';
    }
    $description  = ! empty( $item->description ) ? '<svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.5 1.75L6 6.25L10.5 1.75" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
</svg>' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $description.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; //If you want the description to be output after <a>
    //$item_output .= $description.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; //If you want the description to be output before </a>

    // Add the caret if menu level is 0
    if ( $depth == 0 && $has_children > 0  ) {
        $item_output .= ' <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.5 1.75L6 6.25L10.5 1.75" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
</svg>';
    }

    $item_output .= '</a>';
    $item_output .= $args->after;

    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
}
} //End Walker_Nav_Menu



add_filter('wpcf7_validate_text', 'or_input_validation_filter', 20, 2);

function or_input_validation_filter($result, $tag) {

    if ('sl-zapahshtor' == $tag->name) {
        $slzapahshtor = isset($_POST['sl-zapahshtor']) ? trim($_POST['sl-zapahshtor']) : '';
        if($slzapahshtor == '') {
            $_POST['sl-zapahshtor'] = 'Нет';
        }
           
    }
    return $result;
}

add_filter( 'wpcf7_mail_components', 'remove_blank_lines' );

function remove_blank_lines( $mail ) {
	if ( is_array( $mail ) && ! empty( $mail['body'] ) )
		$mail['body'] = preg_replace( '|\n\s*\n|', "\n\n", $mail['body'] );

	return $mail;
}



/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $objects, $args ) {
    
	
	
	
    // loop
    foreach( $objects as $key => $item ) {
        
        // vars
        $autosubmenu = get_field('megamenu', $item);
        $special = get_field('special', $item);
     
        if( $autosubmenu ) {
			
			$objects[$key]->classes[] = 'megamenu';
			
            
        }
		
		 if( $special ) {
			
			$objects[$key]->classes[] = 'special';
			
            
        }
        
    }
    // return
    return $objects;
    
}

function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}


function highlightLastWord($str) {
    $lastSpacePosition = strrpos($str, ' ');

    if ($lastSpacePosition === false) {
        return $str;
    } else {
        $firstPart = substr($str, 0, $lastSpacePosition);
        $lastWord = substr($str, $lastSpacePosition + 1);

        return $firstPart . ' <span>' . $lastWord . '</span>';
    }
}

function custom_author_base($link, $author_id, $author_nicename) {
    $link = str_replace('/author/', '/user/', $link);
    return $link;
}
add_filter('author_link', 'custom_author_base', 10, 3);


function custom_rewrite_rules($wp_rewrite) {
    $new_rules = array(
        'user/([^/]+)/?$' => 'index.php?author_name=$matches[1]'
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'custom_rewrite_rules');




// Регистрация AJAX-действия
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
add_action('wp_ajax_load_more_posts', 'load_more_posts');

function load_more_posts() {
    $cat = $_POST['cat'];
    $args = array(
        'posts_per_page' => 60,
		'cat' => $cat,
        'offset' => 6
    );
	
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
           	get_template_part( 'parts/senergo/section-post-cart'); 
        endwhile;
    endif;

    die();
}

function get_remote_file_size($url) {
    $response = wp_remote_head($url, array('timeout' => 10));

    if (is_wp_error($response) || !isset($response['headers']['content-length'])) {
        return false;
    }

    return size_format($response['headers']['content-length']);
}


function get_single_post_category_link($post_id = null) {
    // If no post ID is passed, try to get the current post's ID
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    // Get all categories for the specified post
    $categories = get_the_category($post_id);

    if (!empty($categories)) {
        // Assuming you want the first category (you can adjust this based on your needs)
        $first_category = $categories[0];
        return get_category_link($first_category->term_id);
    }

    // Return false if no categories found
    return false;
}

add_filter( 'use_default_gallery_style', '__return_false' );

function filter_ptags_on_images($content) {
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

function add_alignment_to_image_link( $html, $id, $caption, $title, $align, $url, $size, $alt ) {

    // Если в HTML есть классы alignright, alignleft или aligncenter для изображения
    if ( preg_match( '/<img.*?class=".*?(alignright|alignleft|aligncenter).*?".*?>/', $html, $matches ) ) {
        $align_class = $matches[1];
        
        // Если изображение обернуто ссылкой
        if ( strpos( $html, '<a' ) !== false ) {
            $html = str_replace( '<a ', '<a class="' . $align_class . '" ', $html );
        }
    }

    return $html;
}
add_filter( 'image_send_to_editor', 'add_alignment_to_image_link', 10, 8 );

function redirect_to_profile_page() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        $username = $current_user->user_login;
        $profile_url = home_url() . '/user/' . $username;
        return $profile_url;
    } else {
        return '/sitelogin/';
    }
}


function hex2rgba($color, $opacity = false) {
    $default = 'rgb(0,0,0)';

    // Return default if no color provided
    if(empty($color))
          return $default; 

    // Check if color has hash symbol and remove it
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    // Check if color is RGB(A)
    if (strlen($color) == 8 || strlen($color) == 6) {
        $hex = $color;
    } else {
        return $default;
    }

    // Break down HEX to RGB values
    $rgba = array();
    if(strlen($hex) == 8){
        $rgba[] = (int)hexdec(substr($hex, 0, 2));
        $rgba[] = (int)hexdec(substr($hex, 2, 2));
        $rgba[] = (int)hexdec(substr($hex, 4, 2));
        $rgba[] = (int)hexdec(substr($hex, 6, 2)) / 255;
    }else{
        $rgba[] = (int)hexdec(substr($hex, 0, 2));
        $rgba[] = (int)hexdec(substr($hex, 2, 2));
        $rgba[] = (int)hexdec(substr($hex, 4, 2));
        if( $opacity ){
            $rgba[] = $opacity;
        }
    }

    return 'rgba('.implode(",",$rgba).')';
}

function get_acfcss_root($field_group_name) {
   $group_fields = get_field($field_group_name, 'option');
if ($group_fields) {
    foreach ($group_fields as $namearray => $valuearray) {
        foreach ($valuearray as $name => $value) {
            $field_object = acf_get_field($name);
            
            $append_value = '';
            if ($field_object && isset($field_object['append'])) {
                $append_value = $field_object['append'];
            }
            
            echo "--bl_".$field_group_name."_" . $name . ": " . $value . $append_value . ";\n";
        }
    }
}
}



function custom_404_for_specific_category($template) {
    global $post;

    // Укажите ID категории, для которой вы хотите вернуть 404 ошибку
    $blocked_category_id = get_field('404_cat', 'option'); // замените 123 на ID вашей категории

    // Получите все подкатегории для этой категории
    $child_terms = get_term_children($blocked_category_id, 'category');
    $child_terms[] = $blocked_category_id; // Добавьте основную категорию в список

    foreach($child_terms as $term_id) {
        if (is_single() && has_term($term_id, 'category', $post)) {
            global $wp_query;
            $wp_query->set_404();
            status_header(404);
            $template = get_404_template();
            break; // Если нашли совпадение, выходим из цикла
        }
    }

    return $template;
}
add_filter('template_include', 'custom_404_for_specific_category');


function find_path($array, $value, $path = '') {
    foreach ($array as $key => $item) {
        $current_path = $path ? $path . '/' . $key : $key;
        if ($item === $value) {
            return $current_path;  // Возвращает путь, если значение найдено
        } elseif (is_array($item)) {
            $result = find_path($item, $value, $current_path);  // Продолжает рекурсивный поиск, если значение не найдено
            if ($result) {
                return $result;
            }
        }
    }
    return null;
}

function get_acf_with_append($acf_array, $value) {
    $path = find_path($acf_array, $value);  // Получает путь к значению
    if (!$path) {
        return null;
    }

    $keys = explode('/', $path);
    $field_name = end($keys);
    $field_object = acf_get_field($field_name);

    if (!$field_object) {
        return null;
    }

    $append_value = isset($field_object['append']) ? $field_object['append'] : '';
    return $value . $append_value;
}


function get_acf_field_key_by_value($value) {
    global $wpdb;

    $query = $wpdb->prepare(
        "SELECT meta_key
         FROM $wpdb->postmeta
         WHERE meta_value = %s
         AND meta_key LIKE 'field_%'",
        $value
    );

    $acf_key = $wpdb->get_var($query);

    return $acf_key;
}

