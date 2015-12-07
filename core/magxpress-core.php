<?php 

/* MagXPress Core Functions */

/* Includes */
include_once('shailan-shortcodes.php');
include_once('shailan-toc.php'); 
include_once('wp_bootstrap_navwalker.php');
include_once('metabox-post.php');

/* Widgets */
include_once('widget-latest.php');
include_once('widget-calltoaction.php');
include_once('widget-bscolumn.php');
include_once('widget-newrow.php');
include_once('widget-separator.php');

if( is_admin() ){
	include_once('options-manager.php');
}

function get_theme_setting( $key, $default = FALSE ){
	global $settings_key;
	$settings_array = (array) get_option( $settings_key . '_settings' );
	
	if( isset($settings_array[$key]) ){
		$value = $settings_array[$key];
		return stripslashes( $value ) ;
	} else { 	
		return $default;
	}
}
/* Theme Settings Interface */
function themeinfo( $key ){
	global $settings_key;
	$settings_array = get_option( $settings_key . '_settings' );		
	if( array_key_exists( $key, $settings_array ) ){
		echo stripslashes($settings_array[ $key ]);
	}
}

/*- Theme Scripts And Styles */
function magx_scripts_styles() {
	global $wp_styles;
	/* Enqueue comment reply script */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	/* jQuery and theme script */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'magxpress-theme-script', get_template_directory_uri() . '/scripts.js', array('jquery'), '1.0', true );
	
	wp_enqueue_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery'), '1.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'magx_scripts_styles' );

function magx_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'magx_add_editor_styles' );
