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
        <div class="card mb-3 border-0">
          <div class="row">
            <div class="col-md-4 rounded" style="background: url(<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ); ?>) 50% 50% no-repeat; min-height: 225px;">
              <a href="<?php the_permalink() ?>" class="stretched-link"></a>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title"><?php the_title() ?></h3>
                <p class="card-text">
                  <?php the_content() ?>&nbsp;&rarr;
                  <a href="<?php the_permalink() ?>" class="stretched-link">
                    Continue reading <span class="font-italic">"<?php the_title() ?>"</span>
                  </a>
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile ?>
    </col><!-- .col -->
  </div><!-- .row -->
</main><!-- main.container -->

<?php get_footer(); ?>
