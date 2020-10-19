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
  <div class="row border-top">
    <!-- <div class="col-md-2"></div> -->
    <?php
      // Determine whether or not the sidebar is active,
      // so we can adjust the layout arrordingly.
      $sidebar = is_active_sidebar( 'blog-sidebar' );
      $class = $sidebar ? 'col-md-8' : 'col-md-12';
    ?>
    <div class="<?php echo $class ?>">
      <!-- <h1 class="text-dark">Search Results</h1> -->
      <h1 style="visibility: hidden">
        Search Results
      </h1><!-- add space for alignment -->
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

      <nav aria-label="Posts page navigation">
        <?php bursa_posts_page_links(); ?>
      </nav>
    </div><!-- .col-md-x -->

    <?php if( $sidebar ) : ?>
      <aside class="col-md-4">
        <h1 style="visibility: hidden">
          Additional Content
        </h1><!-- add space for alignment -->
        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
      </aside><!-- .col-md-4 -->
    <?php endif ?>
    </div><!-- .row -->

  </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
