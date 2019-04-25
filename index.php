<?php
/**
 * TThe main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */

get_header();
?>

<main role="main" class="container">

  <?php $fp = bursa_featured_posts() ?>
  <div class="row">
    <div class="col px-0">
      <?php while ( $fp->have_posts() ) : $fp->the_post(); ?>
        <?php
          $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        ?>
        <div class="jumbotron p-4 p-md-5 rounded text-white" style="background-image: url(<?php echo esc_url( $featured_img_url ) ?>);">
          <div class="col-md-8 bg-dark rounded or-featured-text-area" style="background: rgba(52, 58, 64, 0.8) !important;">
            <h1 class="display-4"><?php the_title() ?></h1>
            <p class="lead my-3">
              <?php echo strip_tags( get_the_excerpt() ); ?>
            </p>
            <p class="lead">
              <a href="<?php the_permalink() ?>" class="text-white font-weight-bold stretched-link">
                Continue Reading...
              </a>
            </p>
          </div>
        </div><!-- .jumbotron -->
      <?php endwhile ?>
    </div>
  </div>

  <?php
    // Ignores that posts are sticky and show the posts in the default order.
    $posts_args = array( 'post__not_in' => get_option( 'sticky_posts' ) );
    $posts_query = new WP_Query( $posts_args );
  ?>
  <div class="row">
    <!-- <div class="col-md-2"></div> -->
    <div class="col-md-8">
      <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
        <article <?php post_class( 'mb-4 border-bottom' ) ?> >
          <h1>
            <a href="<?php the_permalink() ?>" class="text-dark">
              <?php the_title() ?>
            </a>
          </h1>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail( 'post-thubmnail', ['class' => 'img-fluid mb-4']); ?>
          </a>
          <?php the_content() ?>
        </article>
      <?php endwhile ?>
    </col><!-- .col -->
  </div><!-- .row -->
</main><!-- main.container -->

<?php get_footer(); ?>
