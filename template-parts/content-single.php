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

<article <?php post_class(); ?> >

  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="text-dark mb-0"><?php the_title(); ?></h1>

        <!-- post meta -->
        <div class="row">
          <div class="col">
            <div class="card border-0">
              <div class="card-body">
                <div class="row">
                  <?php
                    echo get_avatar(
                      get_the_author_meta( 'ID' ),
                      '48',
                      '',
                      '',
                      array( 'class' => array( 'rounded-circle', 'mr-2' ) )
                    );
                  ?>
                  <small class="card-text text-muted pt-1">
                    <strong><?php the_author_link(); ?></strong><br>
                    <time><?php the_date(); ?></time>
                  </small>
                </div><!-- .row -->
              </div><!-- .card-body -->
            </div><!-- .card -->
          </div><!-- .col -->
        </div><!-- .row -->


        <div class="text-centered">
        <?php the_post_thumbnail( 'post-thubmnail', ['class' => 'img-fluid mb-4 mx-auto d-block']); ?>
        </div>

        <?php the_content(); ?>
      </div><!-- .col -->
    </div><!-- .row -->

    <div class="row">
      <div class="col">
        <?php wp_link_pages(); ?>
      </div>
    </div>

    <!-- categories and tags -->
    <div class="row">
      <div class="col">
        <span class="text-muted">
          Categories: <?php the_category(', '); ?> <?php the_tags( '| Tags: '); ?>
        </span>
      </div>
    </div>

  </div><!-- .container -->
</article>
