<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */

get_header();
?>

<article <?php post_class() ?> >
  <h1 class="text-dark"><?php the_title() ?></h1>
  <?php the_post_thumbnail( 'post-thubmnail', ['class' => 'img-fluid mb-4']); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <section class="text-muted mb-4">
          <?php
            echo get_avatar(
              get_the_author_meta( 'ID' ),
              '60',
              $default,
              $alt,
              array( 'class' => array( 'rounded-circle' ) )
            );
          ?>
          <br />
          <small>
            <strong><?php the_author_link() ?></strong><br>
            <time><?php the_date() ?></time><br>
            Categories: <?php the_category(', ') ?><br>
            <?php the_tags() ?>
          </small>
        </secion>
      </div><!-- .col -->

      <div class="col-md-9">
        <?php the_content() ?>
      </div><!-- .col -->
    </div><!-- .row -->
  </div><!-- .container -->
</article>
