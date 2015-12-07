<?php 

add_filter( 'the_content', 'prefix_insert_post_ads' );
function prefix_insert_post_ads( $content ) {
	global $post;
	
	$next_post = get_adjacent_post(true,'',true);
	if( $next_post ){
		$next_post_code = "<div class=\"clear clearfix well\"><strong>". __('UpNext') . " <span class=\"glyphicon glyphicon-chevron-right\"></span></strong> <a href=\"" . $next_post->guid . "\">" . $next_post->post_title . "</a></div>";
		if ( is_single() && $next_post ) {
			$content = prefix_insert_after_paragraph( $next_post_code, 2, $content );
		}
	}
	
	$ad_code = get_theme_setting('post_ads');
	if( is_single() && $ad_code != '' ){
		$content = prefix_insert_after_paragraph( $ad_code, 1, $content );
	}
	
	return $content;
}
 
// Parent Function that makes the magic happen
 
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
	$closing_p = '</p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {
		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}
		if ( $paragraph_id == $index + 1 ) {
			$paragraphs[$index] .= $insertion;
		}
	}
	
	return implode( '', $paragraphs );
}