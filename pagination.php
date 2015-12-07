<div class="clear"></div>

<div class="col-md-12">
<?php if( function_exists( 'wp_pagenavi' ) ){ 
	wp_pagenavi(); 
} else { ?>

<ul class="pager">
  <li class="previous"><?php next_posts_link( '<span class="glyphicon glyphicon-chevron-left"></span> Older' ); ?></li>
  <li class="next"><?php previous_posts_link( 'Newer <span class="glyphicon glyphicon-chevron-right"></span>' ); ?></li>
</ul>
<?php } ?>
</div>