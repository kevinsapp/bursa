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

  <?php get_template_part( 'template-parts/content', 'feature' ); ?>

  <?php
    // Shows posts in the default order and ignores that some of them are sticky.
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
          <p>
            <?php the_content() ?>&nbsp;&rarr;
            <a href="<?php the_permalink() ?>">
              Continue reading <span class="font-italic">"<?php the_title() ?>"</span>
            </a>
          </p>
        </article>
      <?php endwhile ?>
    </col><!-- .col -->
  </div><!-- .row -->
</main><!-- main.container -->

<?php get_footer(); ?>
