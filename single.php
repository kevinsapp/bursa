<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */

get_header();
?>

<?php
  // Determine whether or not the sidebar is active,
  // so we can adjust the layout arrordingly.
  $sidebar = is_active_sidebar( 'sidebar' );
?>

 <div class="container">
   <div class="row border-top pb-4">
     <?php if( ! $sidebar ) : // no sidebar ?>
       <div class="col-md-2"></div>
     <?php endif; ?>

     <div class="col-md-8">
     <?php
     while ( have_posts() ) : the_post();

        // Include the single post content template.
  			get_template_part( 'template-parts/content', 'single' );

        // TODO: remove this. just using for testing.
        the_post_navigation();

     endwhile;
     ?>
    </div><!-- .col-md-x -->

    <?php if( $sidebar ) : ?>
     <aside class="col-md-4">
       <h1 style="visibility: hidden">
         Additional Content
       </h1><!-- add space for alignment -->
       <?php dynamic_sidebar( 'sidebar' ); ?>
     </aside><!-- .col-md-4 -->
    <?php endif ?>

   </div><!-- .row -->

   <div class="row">
     <?php if( ! $sidebar ) : // no sidebar ?>
       <div class="col-md-2"></div>
     <?php endif; ?>

     <div class="col-md-8 border-top pt-4">
       <?php comments_template(); ?>
     </div>
   </div>
 </div><!-- .container -->

 <?php get_footer(); ?>
