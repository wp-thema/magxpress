<?php 
class shailan_latest extends WP_Widget {
function __construct() {
	parent::__construct(
	// Base ID of your widget
	'latest', 
	// Widget name will appear in UI
	__('Latest Updates (MagXPress)', 'shailanTM'), 
	// Widget description
	array( 'description' => __( 'Display latest posts with thumbs.', 'shailanTM' ), ) 
	);
}
// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	global $pool, $post;
	//$title = apply_filters( 'widget_title', $instance['title'] );
	$title = $instance['title'];
	
	echo $args['before_widget'];
	
	if ( ! empty( $title ) ){
		echo $args['before_title'] . $title . $args['after_title']; }
	$pool = (array) $pool;
$query_args = array( 
	'posts_per_page' => 5
);  
$latest = get_posts( $query_args );
foreach( $latest as $post ) : setup_postdata( $post ); 
	
	$pool[] = get_the_ID(); 
	
?>
<div class='entry'>
	<a style="text-decoration:none" href="<?php the_permalink(); ?>">
		
	<?php if(has_post_thumbnail()): ?>
		<div class="thumb">
			<?php the_post_thumbnail( array(120, 80) ); ?>
		</div>
	<?php else: ?>
		<div class="thumb no-img">
		</div>
	<?php endif; ?>
	
	<div class="summary">
		<h4 class="entry-title"><a style="text-decoration:none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	</div>
	</a>
</div>
<?php 
endforeach; 
wp_reset_postdata();
	
	echo $args['after_widget'];
	
}
		
// Widget Backend 
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'Latest Updates', 'shailanTM' );
	}
	
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	return $new_instance;
}
} // Class wpb_widget ends here
// Register and load the widget
function shailan_latest_register_widget() {
	register_widget( 'shailan_latest' );
}
add_action( 'widgets_init', 'shailan_latest_register_widget' );