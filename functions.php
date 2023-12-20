<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */

 include('functions-nycacc.php');
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
	wp_enqueue_style( 'style-css', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'custom-style-2-css', get_stylesheet_directory_uri() . '/css/custom-style-2.css' );
	wp_enqueue_style( 'custom-style-3-css', get_stylesheet_directory_uri() . '/css/custom-style-3.css' );
	wp_enqueue_style( 'custom-style-1', get_stylesheet_directory_uri() . '/css/custom-style-1.css' );
	wp_enqueue_script( 'custom.js', get_stylesheet_directory_uri() . '/customjs/custom.js', array('jquery'), null, false );
	//wp_enqueue_script('customjs', get_stylesheet_directory_uri() . '/customjs/custom.js', array(), (string) time(), 'true' );
	wp_localize_script( 'custom.js', 'ajax_object', array(
        'ajax_urls' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'ajax_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );
