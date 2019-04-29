<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

  <?php
    comment_form(
      array(
        'fields' => array(
          'author' => '<div class="form-group"><label for="author">Name <span class="required">*</span></label><input id="author" class="form-control" name="author" type="text" value="" size="30" maxlength="245" required="required"></div>',
          'email' =>  '<div class="form-group"><label for="email">Email <span class="required">*</span></label><input id="email" class="form-control" name="email" type="email" value="" size="30" maxlength="245" required="required"></div>',
          'url' =>  '<div class="form-group"><label for="url">Website</label><input id="url" class="form-control" name="url" type="url" value="" size="30" maxlength="245"></div>',
          'cookies' =>  '<div class="form-group form-check"><input id="wp-comment-cookies-consent" class="form-check-input" name="wp-comment-cookies-consent" type="checkbox"><label class="form-check-label" for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></div>'
        ),
        'comment_field' => '<div class="form-group"><label for="comment">Comment <span class="required">*</span></label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></div>',
        'class_submit' => 'btn btn-dark',
    		// 'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
    		// 'title_reply_after'  => '</h2>',
        'format' => 'html5'
    	)
    );
  ?>
</div>
