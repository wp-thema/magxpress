<?php if( is_single() || is_page() ){ ?>
<div class="sidebar" role="complementary">
<aside class="widget <?php post_class(); ?>">

<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<?php if( is_single() ){ ?>
<div class="meta">By <em><strong><?php the_author(); ?></strong></em> on <?php the_date(); ?> <?php edit_post_link('edit post'); ?>
<br /><?php the_modified_date("", "Last update: ", ""); ?>
<br />Categories: <?php the_category(' '); ?><br />
<?php the_tags(); ?>
</div>
<?php } else { ?>
<div class="meta">By <em><strong><?php the_author(); ?></strong></em> on <?php the_date(); ?> <?php edit_post_link('edit post'); ?>
<br /><?php the_modified_date("", "Last update: ", ""); ?>
</div>
<?php } ?>

<?php if( is_single() || is_page() ) printLikes(get_the_ID()); ?>

</aside>
</div>
<?php } ?>