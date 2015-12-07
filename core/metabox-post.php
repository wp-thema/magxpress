<?php 
/*add_action( 'add_meta_boxes', 'sur_post_custom_metas' );*/
add_action( 'save_post', 'sur_save_post_metas', 99 );

add_action( 'edit_form_after_title', 'sur_post_custom_metas' );
function sur_post_custom_metas( $post ) {
	global $post;
	if( get_post_type($post) === "post" || get_post_type($post) === "page" ){
		
	// Use nonce for verification
	wp_nonce_field( 'sur_post_custom_metas', 'sur_noncename' );
	$sur_custom_bg = get_post_meta($post->ID, 'sur_custom_bg', true);
	$sur_hide_title = get_post_meta($post->ID, 'sur_hide_title', true);
	$sur_hide_breadcrumbs = get_post_meta($post->ID, 'sur_hide_breadcrumbs', true);
	
?>
	<table class="form-table">
	<tr>
		<th><label for="sur_custom_bg">Background URL</label></th>
		<td><input type="text" id="sur_custom_bg" name="sur_custom_bg" value="<?php echo $sur_custom_bg; ?>" size="120" class="" /></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="checkbox" id="sur_hide_breadcrumbs" name="sur_hide_breadcrumbs" value="hide" <?php checked( $sur_hide_breadcrumbs, 'hide') ?>/> <label for="sur_hide_breadcrumbs">Hide Breadcrumbs</label>&nbsp;
			<input type="checkbox" id="sur_hide_title" name="sur_hide_title" value="hide" <?php checked( $sur_hide_title, 'hide') ?>/> <label for="sur_hide_title">Hide Title</label> &nbsp; <em>Title and Breadcrumbs are automatically hidden on Blank Template.</em>
		</td>
	</tr>
	</table>
<?php
	}
}
/* When the post is saved, saves our custom data */
function sur_save_post_metas( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;
  if ( !wp_verify_nonce( @$_POST['sur_noncename'], 'sur_post_custom_metas' ) )
      return;
  // Check permissions
  if ( 'post' == $_POST['post_type'] || 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
	
	$sur_hide_title = @$_POST['sur_hide_title'];
	update_post_meta( $post_id, 'sur_hide_title', $sur_hide_title );	
	$sur_hide_breadcrumbs = @$_POST['sur_hide_breadcrumbs'];
	update_post_meta( $post_id, 'sur_hide_breadcrumbs', $sur_hide_breadcrumbs );
	$sur_custom_bg = @$_POST['sur_custom_bg'];
	update_post_meta( $post_id, 'sur_custom_bg', $sur_custom_bg );
	
	}
}