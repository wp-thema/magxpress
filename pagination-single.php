<div class="upnext clearfix">
<?php 
	$post_permalink = get_permalink(); 
	$pID = get_adjacent_post(false,'',false);
	$previous_post = get_permalink( $pID );
	$nID = get_adjacent_post(false,'',true);
	$next_post = get_permalink( $nID );
	
	if( $post_permalink != $previous_post ):
?>
<div class="prev-post col-md-6 text-right">
<div class="sqr pull-left mr pagination-thumb prev-thumb"><a href="<?php echo $previous_post; ?>" title="Previous post" data-toggle="tooltip" data-placement="left"><?php echo get_the_post_thumbnail( $pID->ID, array( 120, 120) ); ?></a></div> <span class="text-muted">Previous Post</span><br /><a href="<?php echo $previous_post; ?>" title="Previous post" data-toggle="tooltip" data-placement="left"><?php echo get_the_title( $pID ); ?></a></div>
<?php endif; ?>
<?php if( $post_permalink != $next_post ): ?>
<div class="next-post col-md-6">
<div class="sqr pull-right ml pagination-thumb next-thumb"><a href="<?php echo $next_post; ?>" title="Previous post" data-toggle="tooltip" data-placement="left"><?php echo get_the_post_thumbnail( $nID->ID, array( 120, 120) ); ?></a></div> <span class="text-muted">Next Post</span><br /><a href="<?php echo $next_post; ?>" title="Previous post" data-toggle="tooltip" data-placement="left"><?php echo get_the_title( $nID ); ?></a>
</div>
<?php endif; ?>
</div>