<?php 
class shailan_newrow extends WP_Widget {
function __construct() {
	parent::__construct(
	// Base ID of your widget
	'newrow', 
	// Widget name will appear in UI
	__('BootStrap New Row (MagXPress)', 'shailanTM'), 
	// Widget description
	array( 'description' => __( 'Create a new row.', 'shailanTM' ), ) 
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
</div><!-- end row -->
<div class="row">
<?php 
	
}
		
// Widget Backend 
public function form( $instance ) {
	
	$widget_options = wp_parse_args( $instance, $this->defaults );
	extract( $widget_options, EXTR_SKIP );
	
	?>
	
	<p>
		Closes current row, and opens a new row on your front page widget area.
	</p>
	
	
	<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	return $new_instance;
}
} // Class wpb_widget ends here
// Register and load the widget
function shailan_newrow_register_widget() {
	register_widget( 'shailan_newrow' );
}
add_action( 'widgets_init', 'shailan_newrow_register_widget' );