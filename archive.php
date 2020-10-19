<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */

get_header();
?>

  <div class="container">
    <div class="row border-top">
      <?php
        // Determine whether or not the sidebar is active,
        // so we can adjust the layout arrordingly.
        $sidebar = is_active_sidebar( 'blog-sidebar' );
        $class = $sidebar ? 'col-md-8' : 'col-md-12';
      ?>
      <div class="<?php echo $class ?>">
        <h1 class="text-dark">
          <?php
            if ( is_category() ) :
              single_cat_title();
            elseif ( is_tag() ) :
              single_tag_title();
            elseif ( is_author() ) :
              the_author();
            elseif ( is_day() ) :
              get_the_date();
            elseif ( is_month() ) : ?>
              Archive for the Month of <?php echo get_the_date('F Y') ?><?php
            elseif ( is_year() ) : ?>
              Archive for the Year <?php echo get_the_date('Y') ?><?php
            else : ?>
              Selection<?php
            endif
          ?>
        </h1>

        <div class="card-columns">
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="card">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_post_thumbnail_caption() ?>">
              </a>

              <div class="card-body">
                <h5 class="card-title">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h5>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <p class="card-text">
                  <small>
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                      <?php the_author(); ?>
                    </a>
                    <time class="text-muted"><?php the_date() ?></time>
                  </small>
                </p>
                <small class="text-muted mt-3">
                  <?php the_tags( '', '' ); ?><br>
                  Categories: <?php the_category(', '); ?>
                </small>
              </div>
            </div>
          <?php endwhile ?>

          <nav aria-label="Posts page navigation">
            <?php bursa_posts_page_links(); ?>
          </nav>
        </div>
      </div><!-- .col -->

      <?php if( $sidebar ) : ?>
       <aside class="col-md-4">
         <h1 style="visibility: hidden">
           Additional Content
         </h1><!-- add space for alignment -->
         <?php dynamic_sidebar( 'blog-sidebar' ); ?>
       </aside><!-- .col-md-4 -->
      <?php endif ?>
    </div><!-- .row -->

  </div><!-- .container -->

<?php get_footer(); ?>
