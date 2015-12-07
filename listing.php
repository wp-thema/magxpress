<?php 
 $link = urlencode( get_the_permalink() );
 $desc = urlencode( get_the_title() ); 
 $img_obj = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false, '' ); 
 $img_src = urlencode( $img_obj[0] );
?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 entry-wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class('listing clearfix'); ?>>
<a href="<?php the_permalink(); ?>">
<div class="thumb"><?php the_post_thumbnail(); ?><span class="header">
			<span class="cat <?php
$category = get_the_category(); 
echo $category[0]->category_nicename;
?>"><?php
echo $category[0]->cat_name;
?></span>
			<h2 class="entry-title"><?php the_title(); ?></h2>
			</span></div>
<div class="summary">
<?php the_excerpt(); ?>
</div></a>
<div class="listing-footer clearfix">
<div class="pull-left">
<?php if( function_exists('the_views') ){ echo "<span class=\"glyphicon glyphicon-eye-open\"></span> "; the_views(); echo "<br />"; } ?>
</div>
<div class="pull-right">
	<a class="" target="_blank" title="Share on facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $link; ?>&t=<?php echo $desc; ?>">
		<i class="fa fa-facebook fa-lg fb"></i>
	</a>
	<a class="" target="_blank" title="Share on twitter" href="http://twitter.com/share?url=<?php echo $link; ?>&text=<?php echo $desc; ?>">
		<i class="fa fa-twitter fa-lg tw"></i>
	</a>
</div>
</div>
</article>
</div>