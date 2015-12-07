<!-- Comment form -->
<?php if ( comments_open() ) : ?>
<?php

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$comments_args = array(
// change the title of send button 
'label_submit'=>'Share',
// change the title of the reply section
'title_reply'=>'Share Your Thoughts',
// remove "Text or HTML to be displayed after the set of comment fields"
'comment_notes_after' => '',
// redefine your own textarea (the comment body)
'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" class="form-control" rows="5" placeholder="Your comment.."></textarea></p>',

'fields' => apply_filters( 'comment_form_default_fields', array(
	'author' =>
	  '<p class="comment-form-author">' .
	  '<input id="author" class="form-control" name="author" type="text" placeholder="Name *" value="' . esc_attr( $commenter['comment_author'] ) .
	  '" size="30"' . $aria_req . ' /></p>',
	'email' =>
	  '<p class="comment-form-email">'.
	  '<input id="email" class="form-control" name="email" type="text" placeholder="E-mail *" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	  '" size="30"' . $aria_req . ' /></p>',
	'url' =>
	  '<p class="comment-form-url">' .
	  '<input id="url" class="form-control" name="url" type="text" placeholder="Website" value="' . esc_attr( $commenter['comment_author_url'] ) .
	  '" size="30" /></p>'
	)
  )

); ?>
<?php comment_form( $comments_args ); ?>
<?php endif; // if you delete this the sky will fall on your head ?>