<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { 
		return;
	}
?>

<?php get_template_part( 'commentform' ); ?>

<?php if ( have_comments() ) : ?>
	
	<nav><ul class="pager pager-comments">
		<li class="previous"><?php previous_comments_link() ?></li>
		<li class="next"><?php next_comments_link() ?></li>
	</ul></nav>
	
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 80,
			) );
		?>
	</ol><!-- .comment-list -->
	
	<nav><ul class="pager pager-comments">
		<li class="previous"><?php previous_comments_link() ?></li>
		<li class="next"><?php next_comments_link() ?></li>
	</ul></nav>
	
 <?php else : // this is displayed if there are no comments so far ?>
 
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.'); ?></p>
	<?php endif; ?>
	
<?php endif; ?>

