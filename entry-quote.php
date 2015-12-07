<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<?php if( is_single() ): ?>
<div class="meta">By <em><strong><?php the_author(); ?></strong></em> on <?php the_date(); ?> <?php edit_post_link('edit post'); ?>
<br /><?php the_modified_date("", "Last update: ", ""); ?>
<br />Categories: <?php the_category(' '); ?><br />
<?php the_tags(); ?>
</div>
<?php endif; ?>

<?php the_content(); ?>
<?php if( is_single() || is_page() ) printLikes(get_the_ID()); ?>
<?php if( is_single() ) yarpp_related(); ?>
<?php edit_post_link('edit post'); ?>
</article>