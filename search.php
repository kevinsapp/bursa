<?php
/**
 * The template file for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */

get_header();
?>

<div class="container">
  <div class="row">
    <!-- <div class="col-md-2"></div> -->
    <div class="col-md-8">
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class( 'mb-4 border-bottom' ) ?> >
          <h3>
            <a href="<?php the_permalink(); ?>" class="text-dark">
              <?php the_title(); ?>
            </a>
          </h3>
          <?php the_excerpt(); ?>
        </article>
      <?php endwhile ?>
    </div><!-- .col-md-x -->

    <?php if( is_active_sidebar( 'sidebar' ) ) : ?>
     <aside class="col-md-4">
       <?php dynamic_sidebar( 'sidebar' ); ?>
     </aside><!-- .col-md-4 -->
    <?php endif ?>

  </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
