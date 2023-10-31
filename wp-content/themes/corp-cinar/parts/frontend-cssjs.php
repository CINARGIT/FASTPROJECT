<?php function cinar_corp() {
	// Add custom fonts, used in the main stylesheet.

wp_enqueue_style( 'cinar-corp', get_stylesheet_uri(), '2230181230' );
wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array( 'cinar-corp' ),  '20181230' );
wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array( 'cinar-corp' ),  '20181230' );
wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.min.css', array( 'cinar-corp' ),  '20181230' );
wp_enqueue_style( 'cinar-config', get_template_directory_uri() . '/css/cinar-config.css', array( 'cinar-corp' ),  '20181230' );
wp_enqueue_style( 'cinar-styles', get_template_directory_uri() . '/css/cinar-styles.css', array( 'cinar-corp' ),  time() );
wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array( 'jquery' ), '20181230', true );
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20181230', true );
wp_enqueue_script( 'sweet-alert', get_template_directory_uri() . '/js/sweet-alert.js', array( 'jquery' ), '20181230', true );
wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '20181230', true );
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