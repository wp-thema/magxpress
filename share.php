<?php 
if( is_page() ){
	$hide_share = ( get_theme_setting('hide_page_share') == "on" );
} else {
	$hide_share = ( get_theme_setting('hide_share') == "on" );
}
 
 $hide_author = ( get_theme_setting('hide_author') == "on" );
 $hide_date = ( get_theme_setting('hide_date') == "on" );
 $link = urlencode( get_the_permalink() );
 $desc = urlencode( get_the_title() ); 
 $img_obj = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false, '' ); 
 $img_src = urlencode( $img_obj[0] );
?>
<?php if( !( $hide_share && ( ( $hide_author && $hide_date ) || is_page() ) ) ){ ?>
<div class="share clearfix">  
	<?php if( !$hide_share ){ ?>
	<div class="buttons">
	<a class="btn btn-facebook" target="_blank" title="Share on facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $link; ?>&t=<?php echo $desc; ?>">
		<i class="fa fa-facebook fa-lg fb"></i> <?php _e('Share'); ?>
	</a>
	<a class="btn btn-twitter" target="_blank" title="Tweet this post" href="http://twitter.com/share?url=<?php echo $link; ?>&text=<?php echo $desc; ?>">
		<i class="fa fa-twitter fa-lg tw"></i> <?php _e('Tweet'); ?>
	</a>
	<a  class="btn btn-pinterest" target="_blank" title="Pin on Pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $link; ?>&media=<?php echo $img_src; ?>&description=<?php echo $desc; ?>" count-layout="horizontal">
		<i class="fa fa-pinterest fa-lg pinterest"></i> <?php _e('Pin'); ?>
	</a>
	<a class="btn btn-social-icon btn-google" target="_blank" title="Share on Google+" href="https://plusone.google.com/_/+1/confirm?hl=en&url=<?php echo $link; ?>">
		<i class="fa fa-google-plus fa-lg google"></i>
	</a>
	</div>
	<?php } ?>
	
	<?php if( !is_page() ): ?>
	<div class="header-meta clearfix">
		<?php if( !$hide_author ){ ?>
		<span class="author vcard">
			<span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?></span>
			<em class="fn"><?php the_author_posts_link(); ?></em>
		</span><br />
		<?php } ?>
		<?php if( !$hide_date ){ ?>
		<span class="entry-date"><?php the_date(); ?></span>
		<?php } ?>
	</div>
	<?php endif; ?>
</div>
<?php } ?>