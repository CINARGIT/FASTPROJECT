<?php
include get_template_directory() . '/style.php';

function customtheme_add_woocommerce_support()
 {
add_theme_support( 'woocommerce' );
}
add_filter('wpcf7_autop_or_not', '__return_false');
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );
// add_filter('show_admin_bar', '__return_false');
 function cinar_corp() {
	// Add custom fonts, used in the main stylesheet.



wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', array( 'cinar-corp' ),  '20181230' );
wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array( 'cinar-corp' ),  '20181230' );
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( 'cinar-corp' ),  '20181230' );
wp_enqueue_style( 'config', get_template_directory_uri() . '/css/config.css', array( 'cinar-corp' ),  '20181230' );
wp_enqueue_style( 'cinarmode', get_template_directory_uri() . '/css/cinar-mode.css', array( 'cinar-corp' ),  '2302324333181230' );
wp_enqueue_style( 'cinarstyles', get_template_directory_uri() . '/css/cinar-styles.css', array( 'cinar-corp' ),  '2302324333181230' );
wp_enqueue_style( 'blocks', get_template_directory_uri() . '/css/cinar-common-blocks.css', array( 'cinar-corp' ),  '2302324333181230' );
wp_enqueue_style( 'cinar-corp', get_stylesheet_uri(), '2230181230' );
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20181230', true );
wp_enqueue_script( 'sweet-alert', get_template_directory_uri() . '/js/sweet-alert.js', array( 'jquery' ), '20181230', true );
wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '20181230', true );
wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array( 'jquery' ), '20181230', true );
wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20181230', true );

	
	
	wp_localize_script(
		'cinar-corp',
		'screenReaderText',
		array(
			'expand'   => __( 'expand child menu', 'cinarcorp' ),
			'collapse' => __( 'collapse child menu', 'cinarcorp' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'cinar_corp' );


 
 
function wpb_widgets_init() {

	
	register_sidebar( array(
		'name'          => 'Хлебные крошки',
		'id'            => 'bread_widget',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'wpb_widgets_init' );

function kama_breadcrumbs( $sep = ' <span class="sep"> / </span> ', $l10n = array(), $args = array() ){
	$kb = new Kama_Breadcrumbs;
	echo $kb->get_crumbs( $sep, $l10n, $args );
}

class Kama_Breadcrumbs {

	public $arg;

	// Локализация
	static $l10n = array(
		'home'       => 'Главная',
		'paged'      => 'Страница %d',
		'_404'       => 'Ошибка 404',
		'search'     => 'Результаты поиска по запросу - <b>%s</b>',
		'author'     => 'Архив автора: <b>%s</b>',
		'year'       => 'Архив за <b>%d</b> год',
		'month'      => 'Архив за: <b>%s</b>',
		'day'        => '',
		'attachment' => 'Медиа: %s',
		'tag'        => 'Записи по метке: <b>%s</b>',
		'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
		// tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
		// Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
	);

	// Параметры по умолчанию
	static $args = array(
		'on_front_page'   => true,  // выводить крошки на главной странице
		'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
		'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
		'title_patt'      => '<span class="kb_title">%s</span>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
		'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
		'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
										   // или можно указать свой массив разметки:
										   // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
		'priority_tax'    => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
		'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
									  // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
									  // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
									  // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
		'nofollow' => false, // добавлять rel=nofollow к ссылкам?

		// служебные
		'sep'             => '',
		'linkpatt'        => '',
		'pg_end'          => '',
	);

	function get_crumbs( $sep, $l10n, $args ){
		global $post, $wp_query, $wp_post_types;

		self::$args['sep'] = $sep;

		// Фильтрует дефолты и сливает
		$loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );
		$arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );

		$arg->sep = '<span class="breadcrumb-separator">&#8594;</span>'; // дополним

		// упростим
		$sep = & $arg->sep;
		$this->arg = & $arg;

		// микроразметка ---
		if(1){
			$mark = & $arg->markup;

			// Разметка по умолчанию
			if( ! $mark ) $mark = array(
				'wrappatt'  => '<div class="storefront-breadcrumb"><nav class="woocommerce-breadcrumb">%s</nav></div>',
				'linkpatt'  => '<a href="%s">%s</a>',
				'sep_after' => '',
			);
			// rdf
			elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
				'wrappatt'   => '<div class="storefront-breadcrumb" prefix="v: http://rdf.data-vocabulary.org/#"><nav class="woocommerce-breadcrumb">%s</nav></div>',
				'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
				'sep_after'  => '</span>', // закрываем span после разделителя!
			);
			// schema.org
			elseif( $mark === 'schema.org' ) $mark = array(
				'wrappatt'   => '<div class="storefront-breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList"><nav class="woocommerce-breadcrumb">%s</nav></div>',
				'linkpatt'   => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
				'sep_after'  => '',
			);

			elseif( ! is_array($mark) )
				die( __CLASS__ .': "markup" parameter must be array...');

			$wrappatt  = $mark['wrappatt'];
			$arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
			$arg->sep      .= $mark['sep_after']."\n";
		}

		$linkpatt = $arg->linkpatt; // упростим

		$q_obj = get_queried_object();

		// может это архив пустой таксы?
		$ptype = null;
		if( empty($post) ){
			if( isset($q_obj->taxonomy) )
				$ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
		}
		else $ptype = & $wp_post_types[ $post->post_type ];

		// paged
		$arg->pg_end = '';
		if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
			$arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );

		$pg_end = $arg->pg_end; // упростим

		$out = '';

		if( is_front_page() ){
			return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
		}
		// страница записей, когда для главной установлена отдельная страница.
		elseif( is_home() ) {
			$out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
		}
		elseif( is_404() ){
			$out = $loc->_404;
		}
		elseif( is_search() ){
			$out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
		}
		elseif( is_author() ){
			$tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
			$out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
		}
		elseif( is_year() || is_month() || is_day() ){
			$y_url  = get_year_link( $year = get_the_time('Y') );

			if( is_year() ){
				$tit = sprintf( $loc->year, $year );
				$out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
			}
			// month day
			else {
				$y_link = sprintf( $linkpatt, $y_url, $year);
				$m_url  = get_month_link( $year, get_the_time('m') );

				if( is_month() ){
					$tit = sprintf( $loc->month, get_the_time('F') );
					$out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
				}
				elseif( is_day() ){
					$m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
					$out = $y_link . $sep . $m_link . $sep . get_the_time('l');
				}
			}
		}
		// Древовидные записи
		elseif( is_singular() && $ptype->hierarchical ){
			$out = $this->_add_title( $this->_page_crumbs($post), $post );
		}
		// Таксы, плоские записи и вложения
		else {
			$term = $q_obj; // таксономии

			// определяем термин для записей (включая вложения attachments)
			if( is_singular() ){
				// изменим $post, чтобы определить термин родителя вложения
				if( is_attachment() && $post->post_parent ){
					$save_post = $post; // сохраним
					$post = get_post($post->post_parent);
				}

				// учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
				$taxonomies = get_object_taxonomies( $post->post_type );
				// оставим только древовидные и публичные, мало ли...
				$taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );

				if( $taxonomies ){
					// сортируем по приоритету
					if( ! empty($arg->priority_tax) ){
						usort( $taxonomies, function($a,$b)use($arg){
							$a_index = array_search($a, $arg->priority_tax);
							if( $a_index === false ) $a_index = 9999999;

							$b_index = array_search($b, $arg->priority_tax);
							if( $b_index === false ) $b_index = 9999999;

							return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше
						} );
					}

					// пробуем получить термины, в порядке приоритета такс
					foreach( $taxonomies as $taxname ){
						if( $terms = get_the_terms( $post->ID, $taxname ) ){
							// проверим приоритетные термины для таксы
							$prior_terms = & $arg->priority_terms[ $taxname ];
							if( $prior_terms && count($terms) > 2 ){
								foreach( (array) $prior_terms as $term_id ){
									$filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
									$_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );

									if( $_terms ){
										$term = array_shift( $_terms );
										break;
									}
								}
							}
							else
								$term = array_shift( $terms );

							break;
						}
					}
				}

				if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)
			}

			// вывод

			// все виды записей с терминами или термины
			if( $term && isset($term->term_id) ){
				$term = apply_filters('kama_breadcrumbs_term', $term );

				// attachment
				if( is_attachment() ){
					if( ! $post->post_parent )
						$out = sprintf( $loc->attachment, esc_html($post->post_title) );
					else {
						if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
							$_crumbs    = $this->_tax_crumbs( $term, 'self' );
							$parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
							$_out = implode( $sep, array($_crumbs, $parent_tit) );
							$out = $this->_add_title( $_out, $post );
						}
					}
				}
				// single
				elseif( is_single() ){
					if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
						$_crumbs = $this->_tax_crumbs( $term, 'self' );
						$out = $this->_add_title( $_crumbs, $post );
					}
				}
				// не древовидная такса (метки)
				elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
					// метка
					if( is_tag() )
						$out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
					// такса
					elseif( is_tax() ){
						$post_label = $ptype->labels->name;
						$tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
						$out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
					}
				}
				// древовидная такса (рибрики)
				else {
					if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
						$_crumbs = $this->_tax_crumbs( $term, 'parent' );
						$out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );                     
					}
				}
			}
			// влоежния от записи без терминов
			elseif( is_attachment() ){
				$parent = get_post($post->post_parent);
				$parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
				$_out = $parent_link;

				// вложение от записи древовидного типа записи
				if( is_post_type_hierarchical($parent->post_type) ){
					$parent_crumbs = $this->_page_crumbs($parent);
					$_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
				}

				$out = $this->_add_title( $_out, $post );
			}
			// записи без терминов
			elseif( is_singular() ){
				$out = $this->_add_title( '', $post );
			}
		}

		// замена ссылки на архивную страницу для типа записи
		$home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );

		if( '' === $home_after ){
			// Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
			if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
				&& ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
			){
				$pt_title = $ptype->labels->name;

				// первая страница архива типа записи
				if( is_post_type_archive() && ! $paged_num )
					$home_after = sprintf( $this->arg->title_patt, $pt_title );
				// singular, paged post_type_archive, tax
				else{
					$home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );

					$home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация
				}
			}
		}

		$before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );

		$out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );

		$out = sprintf( $wrappatt, $before_out . $out );

		return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );
	}

	function _page_crumbs( $post ){
		$parent = $post->post_parent;

		$crumbs = array();
		while( $parent ){
			$page = get_post( $parent );
			$crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
			$parent = $page->post_parent;
		}

		return implode( $this->arg->sep, array_reverse($crumbs) );
	}

	function _tax_crumbs( $term, $start_from = 'self' ){
		$termlinks = array();
		$term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
		while( $term_id ){
			$term       = get_term( $term_id, $term->taxonomy );
			$termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
			$term_id    = $term->parent;
		}

		if( $termlinks )
			return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
		return '';
	}

	// добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
	function _add_title( $add_to, $obj, $term_title = '' ){
		$arg = & $this->arg; // упростим...
		$title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
		$show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

		// пагинация
		if( $arg->pg_end ){
			$link = $term_title ? get_term_link($obj) : get_permalink($obj);
			$add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
		}
		// дополняем - ставим sep
		elseif( $add_to ){
			if( $show_title )
				$add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
			elseif( $arg->last_sep )
				$add_to .= $arg->sep;
		}
		// sep будет потом...
		elseif( $show_title )
			$add_to = sprintf( $arg->title_patt, $title );

		return $add_to;
	}

}





// добавляет поддержку миниатюр в записях
add_theme_support( 'post-thumbnails' ); // для всех типов постов




// добавляет возможность управлять меню
register_nav_menus(array(
	'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
	'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));

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
    .wp-editor-wrap {
      max-width:990px;
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


add_filter( 'woocommerce_checkout_fields', 'webendev_woocommerce_checkout_fields' );

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



// Добавляет шорткод поиска
function pokaz_formy_poiska() {
 return get_search_form(false);
 }
 add_shortcode('search_form', 'pokaz_formy_poiska');



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



function get_posts_years_array($postcatid) {
    global $wpdb;
    $result = array();
    $years = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT YEAR(p.post_date) FROM {$wpdb->posts} p 
			JOIN {$wpdb->term_relationships} tr ON tr.object_id = p.id 
			JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = tr.term_taxonomy_id 
			WHERE tt.term_id = ".$postcatid." AND p.post_status = 'publish' AND p.post_type = 'post'
			GROUP BY YEAR(p.post_date) DESC"
        ),
        ARRAY_N 
    );
    if ( is_array( $years ) && count( $years ) > 0 ) {
        foreach ( $years as $year ) {
            $result[] = $year[0];
        }
    }
    return $result;
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


add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=text', 'do_shortcode');

function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
			
			$opacity = str_replace(",",".",$opacity);
        
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
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




function get_acf_list() {
	global $post;
	if( have_rows('spisok_form', get_option('page_on_front')) ): 
	$i = 0;
	$content = '
	<div class="littleform_item_selector_wpap">
	<div class="littleform_item_selector"><span>'.get_field('nazvanie_spiska', get_option('page_on_front')).'</span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1.5L8 8.5L15 1.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

	</div>
	<div class="littleform_item_selector_list">';
	while( have_rows('spisok_form', get_option('page_on_front')) ): the_row(); 
		$content .= '<div class="littleform_item_selector_item">'.get_sub_field("naimenovanie").'</div>';
	endwhile; 
	$content .=  '</div>
	<input type="text" style="display:none;" value="'.$content1.'" class="littleform_item_inp" name="your-select1">
	</div>
	';		
	endif; 	
	return $content;
}

add_shortcode('acf_list', 'get_acf_list');


function get_acf_list2() {
	global $post;
	if( have_rows('spisok_form2', get_option('page_on_front')) ): 
	$i = 0;
	$content = '
	<div class="littleform_item_selector_wpap">
	<div class="littleform_item_selector"><span>'.get_field('nazvanie_spiska2', get_option('page_on_front')).'</span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1.5L8 8.5L15 1.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
	</div>
	<div class="littleform_item_selector_list">';
	while( have_rows('spisok_form', get_option('page_on_front')) ): the_row(); 
		$content .= '<div class="littleform_item_selector_item">'.get_sub_field("naimenovanie").'</div>';
	endwhile; 
	$content .=  '</div>
	<input type="text" style="display:none;" value="'.$content1.'" class="littleform_item_inp" name="your-select2">
	</div>
	';		
	endif; 	
	return $content;
}

add_shortcode('acf_list2', 'get_acf_list2');




function get_acf_list3() {
	global $post;
	global $maincategory;

	$i = 0;
	$content = '
	<div class="littleform_item_selector_wpap">
	<div class="littleform_item_selector"><span>'.get_field('catrevset', $maincategory)['nazvanie_spiska3'].'</span>
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1.5L8 8.5L15 1.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
	</div>
	<div class="littleform_item_selector_list">';
	
foreach (get_field('catrevset', $maincategory)['spisok_form3'] as $row) { 
		$content .= '<div class="littleform_item_selector_item">'.$row["naimenovanie"].'</div>';
} 
	
	$content .=  '</div>
	<input type="text" style="display:none;" value="'.$content1.'" class="littleform_item_inp" name="your-select3">
	</div>
	';		

	return $content;
}

add_shortcode('acf_list3', 'get_acf_list3');



function get_current_price() {
	
	$content = '<span>'.number_format(get_field('price', get_the_ID()), 0, ',', ' ').'</span>';

	return $content;
}

add_shortcode('current_price', 'get_current_price');


add_filter( 'wpcf7_form_elements', 'do_shortcode' );


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


// Функция подключаемых секций
function stylePart($stylePart, $styleSection, $params = 0) {
	if(get_field($stylePart, 'styleset') AND empty($params)) { 
		get_template_part( 'parts/'.get_field($stylePart, 'styleset').'/'.$styleSection); 
	} else {
		get_template_part( 'parts/'.get_field($stylePart, 'styleset').'/'.$styleSection, null, $params = $params); 
	}
}

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