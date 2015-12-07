<?php 
/* Template Name: Blank Template */
get_header(); ?>
<?php if ( have_posts() ) :?>
<?php while ( have_posts() ) : the_post();  ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php else : ?>
<?php get_template_part( '404' ); ?>
<?php endif; // end have_posts() check ?>
<?php get_footer(); ?>