<?php
/**
 * 
 * Thème enfant de WPréform
 * 
 */


/*----------  CSS & JS  ----------*/

add_action( 'wp_enqueue_scripts', 'pc_enqueue_project_dependencies' );

    function pc_enqueue_project_dependencies() {
		
		$css_front_path = '/css/front.css';
		wp_enqueue_style( 
			'wproject-screen', 
			get_stylesheet_directory_uri().$css_front_path, 
			null, 
			filemtime(get_stylesheet_directory().$css_front_path), 
			'screen'
		);
		$css_print_path = '/css/print.css';
		wp_enqueue_style( 
			'wproject-print', 
			get_stylesheet_directory_uri().$css_print_path, 
			null, 
			filemtime(get_stylesheet_directory().$css_print_path), 
			'print'
		);

		// gravity forms
		if ( is_plugin_active( 'gravityforms/gravityforms.php' ) && !is_user_logged_in() ) { wp_deregister_style( 'dashicons' ); }

		// $js_path = '/scripts/pc-project.min.js';
		// wp_enqueue_script( 
		// 	'wproject',
		// 	get_stylesheet_directory_uri().$js_path,
		// 	array( 'wpreform' ),
		// 	filemtime(get_stylesheet_directory().$js_path),
		// 	array( 'strategy' => 'defer', 'in_footer' => true )
		// );

	}

// gravity forms
if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) { add_filter( 'gform_disable_css', '__return_true' ); }


/*----------  Admin  ----------*/

add_action( 'admin_enqueue_scripts', 'pc_enqueue_admin_project_dependencies' );

	function pc_enqueue_admin_project_dependencies() {

		$path = '/css/project-admin.css';
		wp_enqueue_style( 
			'wproject',
			get_stylesheet_directory_uri().$path,
			array( 'wpreform' ),
			filemtime(get_stylesheet_directory().$path),
			'screen'
		);
		
	}	


/*===============================
=            Include            =
===============================*/	

// if ( class_exists( 'woocommerce' ) ) {

// 	add_theme_support( 'woocommerce' );
// 	include 'woocommerce/_project/woocommerce.php';	

// }

include 'include/admin/admin.php';

include 'include/medias.php';
include 'include/form-contact.php';
include 'include/init.php';