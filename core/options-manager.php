<?php
/* 
	Theme Options Manager
==============================================*/
global $settings_key;
class Shailan_Options_Manager{
	
	function __construct(){
	
		global $settings_key;
	
		// Get theme data
		$this->stylesheet = get_stylesheet();
		$theme_data = wp_get_theme();	
		
		$this->name = $theme_data->Name;
		$this->key = $settings_key; // sanitize_title( $theme_data->Name, 'theme');
		$this->URL = $theme_data->ThemeURI;
		
		// Load default options
		require_once( "default-options.php" );
		$this->default_options = $options;
		$this->settings = $this->get_settings();
		
		add_action( 'admin_init', array(&$this, 'theme_admin_init') );
		add_action( 'admin_menu', array(&$this, 'theme_admin_header') );
		add_action( 'init', array(&$this, 'enqueue_scripts') );		
	
	}
	
	function Shailan_Options_Manager(){ 
		$this->__construct();
	}
	
	function enqueue_scripts(){
		if( is_admin() ) {
			wp_enqueue_script( "jquery" );
			wp_enqueue_style( "stf-admin-styles", get_template_directory_uri() . "/core/admin.css", false, "1.0", "all");
		}
	}
	
	function get_settings(){
		$settings = get_option( $this->key . '_settings' );		
		
		if(FALSE === $settings){
			$settings = array();
			foreach($this->default_options as $option){
				if( isset( $option['std'] ) ){
					$settings[ $option['id'] ] = $option['std'];
				}
			}
			update_option( $this->name . '_settings' , $settings);
			
			return $settings;
		} else { 
			return $settings;
		}		
	}
	
	function theme_admin_init(){
		wp_enqueue_style("stf-options-page", get_template_directory_uri() . "/core/options.css", false, "1.0", "all");
		wp_enqueue_script("jquery");
		wp_enqueue_script("jwysiwyg", get_template_directory_uri() . "/core/jquery.wysiwyg.js", "jquery", "1.0", false);
		wp_enqueue_style("jwysiwyg-css", get_template_directory_uri() . "/core/jquery.wysiwyg.css", false, "1.0", "all");
	}
	
		function theme_admin_header(){
		global $menu;
	
		if ( isset($_GET['page']) && $_GET['page'] == $this->key . "-options" ) {
		
			if ( @$_REQUEST['action'] && 'save' == $_REQUEST['action'] ) {
				$settings = get_option( $this->key . '_settings' ); 
				if(FALSE === $settings){ $settings = array(); }
				
				// Set updated values
				foreach($this->default_options as $option){					
					if($option['type'] == 'checkbox' && empty( $_REQUEST[ $option['id'] ] )) {
						$settings[ $option['id'] ] = 'off';
					} elseif ( array_key_exists( 'id', $option ) ) {
						$settings[ $option['id'] ] = $_REQUEST[ $option['id'] ]; 
					}
				}
				
				// Save the settings
				update_option( $this->key . '_settings', $settings);
				
				// Update instance settings array
				$this->settings = $settings;
									
				header("Location: admin.php?page=" .$this->key . "-options&saved=true");
				die;
			} else if( @$_REQUEST['action'] && 'reset' == $_REQUEST['action'] ) {
				
				// Start a new settings array
				$settings = array();
				
				delete_option( $this->key . '_settings' );
				
				// Set standart values
				foreach($this->default_options as $option){
					$settings[$option['id']] = $option['std']; }
				
				// Save the settings
				update_option( $this->key . '_settings', $settings);
				
				// Update instance settings array
				$this->settings = $settings;
				
				header("Location: admin.php?page=" .$this->key . "-options&reset=true");
				die;
			}
		}
		
		// $menu[56] = array( '', 'read', 'separator1', '', 'wp-menu-separator' );
		add_menu_page( $this->name . " Options", "Theme Settings", "administrator", $this->key . "-options", array(&$this, 'theme_admin_page'), get_template_directory_uri() . "/images/layout_content.png", 4 );
		
	}
	
	function theme_admin_page(){
	
		$options = $this->default_options;
		$current = $this->get_settings();
		$title = $this->name . ' Settings';	
		
		$navigation = "";
		$footer_text = "<a href=\"" . $this->URL . "\">". $this->name . "</a> is powered by <a href=\"http://shailan.com/\" title=\"Shailan \">Shailan</a>";
		
		// Render theme options page		
		include_once( "options-page.php" );
		
	}
	
	
} // Class
$options_manager = new Shailan_Options_Manager();