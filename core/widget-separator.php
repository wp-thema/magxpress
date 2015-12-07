<?php 
class shailan_separator extends WP_Widget {
function __construct() {
	parent::__construct(
	// Base ID of your widget
	'separator', 
	// Widget name will appear in UI
	__('Separator (MagXPress)', 'shailanTM'), 
	// Widget description
	array( 'description' => __( 'Add a separator.', 'shailanTM' ), ) 
	);
	
	$this->defaults = array(
		);
}
// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	global $pool, $post;
	
	extract( $args );
	$widget_options = wp_parse_args( $instance, $this->defaults );
	extract( $widget_options, EXTR_SKIP );
	
?>
<hr />
<?php 
	
}
		
// Widget Backend 
public function form( $instance ) {
	
	$widget_options = wp_parse_args( $instance, $this->defaults );
	extract( $widget_options, EXTR_SKIP );
	
	?>
	
	<p>
		Adds a horizontal separator to your page.
	</p>
	
	
	<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	return $new_instance;
}
} // Class wpb_widget ends here
// Register and load the widget
function shailan_separator_register_widget() {
	register_widget( 'shailan_separator' );
}
add_action( 'widgets_init', 'shailan_separator_register_widget' );