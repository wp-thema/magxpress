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
			'text'		=>'',
			'col_width'  =>''
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
<div class="col-md-<?php echo $col_width; ?>">
	<?php echo $text; ?>
</div> 
<?php 
	
}
		
// Widget Backend 
public function form( $instance ) {
	
	$widget_options = wp_parse_args( $instance, $this->defaults );
	extract( $widget_options, EXTR_SKIP );
	
	?>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Text:' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="5"><?php echo esc_attr( $text ); ?></textarea>
	</p>
	<p><label for="<?php echo $this->get_field_id('col_width'); ?>"> <?php _e('Column Width :'); ?></label>
		<select name="<?php echo $this->get_field_name('col_width'); ?>" id="<?php echo $this->get_field_id('col_width'); ?>" >
			<option value="1" <?php if($col_width == "1") { ?> selected="selected" <?php } ?>>1</option>
			<option value="2" <?php if($col_width == "2") { ?> selected="selected" <?php } ?>>2</option>
			<option value="3" <?php if($col_width == "3") { ?> selected="selected" <?php } ?>>3</option>
			<option value="4" <?php if($col_width == "4") { ?> selected="selected" <?php } ?>>4</option>
			<option value="5" <?php if($col_width == "5") { ?> selected="selected" <?php } ?>>5</option>
			<option value="6" <?php if($col_width == "6") { ?> selected="selected" <?php } ?>>6</option>
			<option value="7" <?php if($col_width == "7") { ?> selected="selected" <?php } ?>>7</option>
			<option value="8" <?php if($col_width == "8") { ?> selected="selected" <?php } ?>>8</option>
			<option value="9" <?php if($col_width == "9") { ?> selected="selected" <?php } ?>>9</option>
			<option value="10" <?php if($col_width == "10") { ?> selected="selected" <?php } ?>>10</option>
			<option value="11" <?php if($col_width == "11") { ?> selected="selected" <?php } ?>>11</option>
			<option value="12" <?php if($col_width == "12") { ?> selected="selected" <?php } ?>>12</option>
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