<?php get_header(); ?>
<div class="row hfeed">
		<div class="col-md-12 archive-header">
			<?php magx_archive_header(); ?>
		</div>
		<?php if ( have_posts() ) :?>
			<?php
				while ( have_posts() ) : the_post(); 
					get_template_part( 'listing', get_post_format() );
				endwhile; ?>
			<?php sur_content_nav( 'nav-below' ); ?>
		<?php else : ?>
			<?php get_template_part( '404' ); ?>
		<?php endif; // end have_posts() check ?>
</div>
<?php get_footer(); ?>