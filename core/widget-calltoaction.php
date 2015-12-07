<?php 
class shailan_calltoaction extends WP_Widget {
function __construct() {
	parent::__construct(
	// Base ID of your widget
	'calltoaction', 
	// Widget name will appear in UI
	__('Call To Action (MagXPress)', 'shailanTM'), 
	// Widget description
	array( 'description' => __( 'Call to action widget.', 'shailanTM' ), ) 
	);
	
	$this->defaults = array(
			'title'		=>'',
			'btn_link'  =>'',
			'btn_text'  =>'',
			'btn_target' =>'_top',
			'text'      =>''
		);
}
// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	global $pool, $post;
	
	extract( $args );
		
		$widget_options = wp_parse_args( $instance, $this->defaults );
		extract( $widget_options, EXTR_SKIP );
	
	$title = apply_filters( 'widget_title', $instance['title'] );
	
?>

<div id="cta-col" class="col-md-12">
	<?php 
		if ( ! empty( $title ) ){
			echo "<h2 class=\"cta-title\">" . $title . "</h2>"; }
	?>
	<p class="pull-right">
	<a id="cta-btn" class="btn btn-lg btn-success" href="<?php echo $btn_link; ?>" target="<?php echo $btn_target; ?>"><?php echo $btn_text; ?></a>
	</p>
	<p id="cta-text" class="lead"><?php echo $text ?></p>
</div>

<hr />
<?php 
	
}
		
// Widget Backend 
public function form( $instance ) {
	
	$widget_options = wp_parse_args( $instance, $this->defaults );
	extract( $widget_options, EXTR_SKIP );
	
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	
	?>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="5"><?php echo esc_attr( $text ); ?></textarea>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'btn_text' ); ?>"><?php _e( 'Button Text:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'btn_link' ); ?>"><?php _e( 'Button Link:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'btn_link' ); ?>" name="<?php echo $this->get_field_name( 'btn_link' ); ?>" type="text" value="<?php echo esc_attr( $btn_link ); ?>" />
	</p>
	<p><label for="<?php echo $this->get_field_id('btn_target'); ?>"> <?php _e('Link Target :'); ?></label>
		<select name="<?php echo $this->get_field_name('btn_target'); ?>" id="<?php echo $this->get_field_id('btn_target'); ?>" >
			<option value="_top" <?php if($btn_target == "_top") { ?> selected="selected" <?php } ?>>Current Window</option>
			<option value="_blank" <?php if($btn_target == "_blank") { ?> selected="selected" <?php } ?>>New Window</option>
		</select>
	</p>
	
	<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	return $new_instance;
}
} // Class wpb_widget ends here
// Register and load the widget
function shailan_calltoaction_register_widget() {
	register_widget( 'shailan_calltoaction' );
}
add_action( 'widgets_init', 'shailan_calltoaction_register_widget' );