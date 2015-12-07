<?php get_header(); ?>

<!-- Front Page Top Widgets -->
<?php if( is_front_page() && is_active_sidebar('frontpage-top') ){ ?>
<div class="row">
	<?php dynamic_sidebar( 'frontpage-top' ); ?>
</div>
<?php } ?>

<div class="row hfeed">
		<?php if ( have_posts() ) :?>
			<?php
				while ( have_posts() ) : the_post(); 
					get_template_part( 'listing', get_post_format() );
				endwhile; ?>
			<?php get_template_part( 'pagination' ); ?>
		<?php else : ?>
			<?php get_template_part( '404' ); ?>
		<?php endif; // end have_posts() check ?>
</div><!-- /row -->
<?php get_footer(); ?>