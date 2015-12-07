<?php 
class shailan_bscolumn extends WP_Widget {
function __construct() {
	parent::__construct(
	// Base ID of your widget
	'bscolumn', 
	// Widget name will appear in UI
	__('BootStrap Column (MagXPress)', 'shailanTM'), 
	// Widget description
	array( 'description' => __( 'Add columns to your front page.', 'shailanTM' ), ) 
	);
	
	$this->defaults = array(
			'title'		=>'',
			'col_width'  =>'',
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

<div class="col-md-<?php $col_width ?>">
	<?php 
		if ( ! empty( $title ) ){
			echo "<h2 class=\"cta-title\">" . $title . "</h2>"; }
	?>
	<?php echo $text ?>
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
	<p><label for="<?php echo $this->get_field_id('col_width'); ?>"> <?php _e('Link Target :'); ?></label>
		<select name="<?php echo $this->get_field_name('col_width'); ?>" id="<?php echo $this->get_field_id('col_width'); ?>" >
			<option value="1" <?php if($col_width == "1") { ?> selected="selected" <?php } ?>>1</option>
			<option value="2" <?php if($btn_target == "2") { ?> selected="selected" <?php } ?>>2</option>
			<option value="3" <?php if($btn_target == "3") { ?> selected="selected" <?php } ?>>3</option>
			<option value="4" <?php if($btn_target == "4") { ?> selected="selected" <?php } ?>>4</option>
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
function shailan_bscolumn_register_widget() {
	register_widget( 'shailan_bscolumn' );
}
add_action( 'widgets_init', 'shailan_bscolumn_register_widget' );