<?php get_header(); ?>
<div class="row">
	<div class="col-md-8 detail-column">
	
<?php if ( !is_home() && function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>	
	
<?php if ( have_posts() ) :?>
<?php while ( have_posts() ) : the_post();  ?>

	<?php get_template_part( 'content', get_post_format() ); ?>
	<?php get_template_part( 'pagination', 'single' ); ?>
	<?php if( function_exists('related_posts') ): ?>
	<div id="related-posts">
		<?php related_posts(); ?>
	</div>
	<?php endif; ?>
	
<?php if( get_theme_setting('hide_post_comments') != "on" ){ ?>
	<div id="comments">
		<?php comments_template(); ?> 
	</div>
<?php } ?>
	
<?php endwhile; ?>

<?php else : ?>
<?php get_template_part( '404' ); ?>
<?php endif; // end have_posts() check ?>
	</div>
	
	<!-- Sidebar -->
	<div class="col-md-4">
		<div class="sidebar"> 
		<?php dynamic_sidebar( 'primary' ); ?>
		</div>
	</div>
	
</div>
<?php get_footer(); ?>