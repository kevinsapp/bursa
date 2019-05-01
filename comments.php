<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 *
 * Much of the code in this file is based on comments.php from the
 * Twenty_Sixteen WordPress theme.
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
  // Code based on comments.php from the WordPress theme Twenty_Sixteen
  if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'bursa' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'bursa'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

    <ul class="comment-list mt-4">
      <?php
        wp_list_comments(
          array(
            'style'       => 'ul',
            'short_ping'  => true,
            // 'avatar_size' => 42,
          )
        );
      ?>
    </ul><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'bursa' ); ?></p>
	<?php endif; ?>

  <?php
    comment_form(
      array(
        'fields' => array(
          'author' => '<div class="form-group"><label for="author">Name <span class="required">*</span></label><input id="author" class="form-control" name="author" type="text" value="" size="30" maxlength="245" required="required"></div>',
          'email' =>  '<div class="form-group"><label for="email">Email <span class="required">*</span></label><input id="email" class="form-control" name="email" type="email" value="" size="30" maxlength="100" required="required"></div>',
          'url' =>  '<div class="form-group"><label for="url">Website</label><input id="url" class="form-control" name="url" type="url" value="" size="30" maxlength="200"></div>',
          'cookies' =>  '<div class="form-group form-check"><input id="wp-comment-cookies-consent" class="form-check-input" name="wp-comment-cookies-consent" type="checkbox"><label class="form-check-label" for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></div>'
        ),
        'comment_field' => '<div class="form-group"><label for="comment">Comment <span class="required">*</span></label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></div>',
        'class_submit' => 'btn btn-dark',
    		// 'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
    		// 'title_reply_after'  => '</h2>',
        'title_reply' => 'Leave a Comment',
        'format' => 'html5'
    	)
    );
  ?>
</div>
