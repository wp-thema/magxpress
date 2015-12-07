<?php 
/* Template Name: No Sidebar */
get_header(); ?>
<div class="row">
	<div class="col-md-12 sidebarless detail-column">
<?php if ( !is_home() && function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>	
	
<?php while ( have_posts() ) : the_post();  ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('detail'); ?>>
		
		<header class="<?php if( has_post_thumbnail( get_the_ID() ) ){ echo "thumb"; } ?>">
			<?php the_post_thumbnail(); ?>
			<span class="header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			</span>
		</header>
		
<?php if( get_theme_setting('hide_share') != "on" ){ ?>
<?php get_template_part( 'share' ); ?>
<?php } ?>
		
		
		<div class="entry-content">
		
<?php the_content(); ?>
<?php
	wp_link_pages( array(
		'before'      => '<nav class="page-links pull-right"><ul class="pagination"><li><span>Pages: </span></li><li>',
		'after'       => '</li></ul></nav>',
		'link_before' => '',
		'link_after'  => '',
		'pagelink'    => '<span>%</span>',
		'nextpagelink'     => __( 'Next page' ),
		'previouspagelink' => __( 'Previous page' ),
		'separator'   => '</li><li>',
	) );
?>


<div class="meta">
<?php if( function_exists('the_views') ){ the_views(); echo "<br />"; } ?>
<?php if(function_exists('email_link')) { email_link(); echo "<br />"; } ?>
<?php edit_post_link( __('Edit Post') ); ?>
</div>
		</div>
	</article>
<?php if( get_theme_setting('hide_page_comments') != "on" ){ ?>
	<div id="comments">
		<?php comments_template(); ?> 
	</div>
<?php } ?>
	
<?php endwhile; ?>
	</div>

</div>
<?php get_footer(); ?>