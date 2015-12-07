<?php 
global $settings_key;
$settings_key = "sur2";

include_once('core/magxpress-core.php');

/* Quick options */

$thumb_width = 360;
$thumb_height = 180;

$content_width = 750;
if ( !wp_is_mobile() ) {
	$content_width = 750;
} else {
	$content_width = 300;
}

/* Theme Setup */
if( !function_exists( 'magxpress_theme_setup' ) ){
	function magxpress_theme_setup() {
		global $thumb_width, $thumb_height;
		load_theme_textdomain( 'sur', get_template_directory() . '/languages' );
		add_editor_style();
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', array( 'image', 'quote', 'status', 'video', 'gallery' ) );
		register_nav_menu( 'primary', __( 'Primary Menu', 'sur' ) );
		add_theme_support( 'custom-background', array(
			'default-color' => 'E7E6E3',
		) );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( $thumb_width, $thumb_height, true );
		add_image_size( 'singletop', 750, 375, true );
	}
	add_action( 'after_setup_theme', 'magxpress_theme_setup' );
}

/* Sidebars */
function magx_register_sidebars() {
	
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'sur' ),
		'id' => 'primary',
		'description' => __( 'Appears on posts and pages except the front page.', 'sur' ),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Jumbotron', 'sur' ),
		'id' => 'jumbotron',
		'description' => __( 'Showcase your work with sliders, text widgets etc.', 'sur' ),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Front Page Widgets', 'sur' ),
		'id' => 'frontpage-top',
		'description' => __( 'Displays front page widgets.', 'sur' ),
		'before_widget' => '<aside id="%1$s" class="front-widget clearfix %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'magx_register_sidebars' );

/* Embed Sizes */
function mycustom_embed_defaults($embed_size){
    $embed_size['width'] = 750; // Adjust values to your needs
    $embed_size['height'] = 442;
    return $embed_size; // Return new size
}
add_filter('embed_defaults', 'mycustom_embed_defaults');

function separator_shortcode(){
	return "<div class=\"separator\"></div>";
} add_shortcode( "sep", "separator_shortcode" );
function note_shortcode($atts, $content){
	return "<div class=\"alert alert-info\">".$content."</div>";
} add_shortcode( "note", "note_shortcode" );
function warning_shortcode($atts, $content){
	return "<div class=\"alert alert-warning\">".$content."</div>";
} add_shortcode( "warning", "warning_shortcode" );
function danger_shortcode($atts, $content){
	return "<div class=\"alert alert-danger\">".$content."</div>";
} add_shortcode( "danger", "danger_shortcode" );
function success_shortcode($atts, $content){
	return "<div class=\"alert alert-success\">".$content."</div>";
} add_shortcode( "success", "success_shortcode" );


function suppress_if_blurb( $title ) {
	
	if( $title == '' ){
		$title = "&#x87;";
	}
	
    return $title;
}
add_filter('the_title', 'suppress_if_blurb', 10, 2);

function new_excerpt_more( $more ) {
	return '..';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function magx_archive_header(){	
	if( is_category() ){			
		$category = get_category( get_query_var('cat') ); 
		echo "<h1 class=\"page-title\"><span class=\"icon\"></span>";	
		printf( __( 'Posts categorized <span class="alt">%s</span>' ), '<span>' . single_cat_title( '', false ) . '</span>' );		
		echo "</h1>";   		
		$category_description = category_description();	
		if ( ! empty( $category_description ) ){
			echo '<div class="archive-meta">' . $category_description . '</div>';
		}				
		echo "<div class=\"sep\"></div>";				
	} elseif ( is_tag() ){
		echo "<h1 class=\"page-title\"><span class=\"icon\"></span>";
		printf( __( 'Posts tagged <span class="alt">%s</span>' ), '<span>' . single_tag_title( '', false ) . '</span>' );
		echo "</h1>";
		
		$tag_description = tag_description();
		if ( ! empty( $tag_description ) ){
			echo '<div class="archive-meta">' . $tag_description . '</div>';
		}	
	} elseif ( is_author() ){		
	
		echo "<div class=\"author-profile\">";
		
		$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
	
		echo "<span class=\"avatar\">" . get_avatar( $curauth->ID, 100 ) . "</span>";
	
		echo "<h1 class=\"page-title\"><span class=\"icon\"></span>";
		printf( __( '%s' ), '<span>' . $curauth->display_name  . '</span>' );
		echo "</h1>";
		
		echo "<div class=\"author-bio\">" . $curauth->description . "</div>";
		
		$links = "<div class=\"contact\">";
		
		if( $curauth->user_url ){
			$links .= " <a class=\"btn btn-social-icon btn-success\" href=\"". $curauth->user_url . "\"><i class=\"fa fa-globe fa-lg\"></i></a>";
		}
		
		if( $curauth->facebook ){
			$links .= " <a class=\"btn btn-social-icon btn-facebook\" href=\"http://facebook.com/". $curauth->facebook . "\"><i class=\"fa fa-facebook fa-lg tw\"></i></a>";
		}
		
		if( $curauth->twitter ){
			$links .= " <a class=\"btn btn-social-icon btn-twitter\" href=\"http://twitter.com/". $curauth->twitter . "\"><i class=\"fa fa-twitter fa-lg tw\"></i></a>";
		}
		
		if( $curauth->googleplus ){
			$links .= " <a class=\"btn btn-social-icon btn-google-plus\" href=\"http://plus.google.com/+". $curauth->googleplus . "\"><i class=\"fa fa-google-plus fa-lg tw\"></i></a>";
		}
		
		$links .= "</div>";
	
		echo $links; 
		
		echo "</div>";
		
		echo "<h2 class=\"page-title\"><span class=\"icon\"></span>";
		printf( __( 'Posts added by %s' ), '<span class="alt">' . $curauth->display_name  . '</span>' );
		echo "</h2>";
		
	}
}

add_filter('widget_title', 'do_shortcode');
