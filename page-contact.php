<?php 
/* Template Name: Contact */

wp_enqueue_script( 'google-maps-api', '//maps.google.com/maps/api/js?sensor=false', array('jquery'), '1.0', true );
wp_enqueue_script( 'gmap', get_template_directory_uri() . '/scripts/jquery.gmap.min.js', array('jquery', 'google-maps-api'), '1.0', true ); 

get_header(); ?>

<div class="row">
	<div class="col-md-12 sidebarless detail-column">
	
<?php if ( !is_home() && function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>	
	
<?php while ( have_posts() ) : the_post();  ?>
	<div id="contact" <?php post_class('contact'); ?>>
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>
	</div>

</div>


<?php get_footer(); ?>