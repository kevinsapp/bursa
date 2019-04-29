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
  $class = $sidebar ? 'col-md-8' : 'col-md-12';
?>

 <div class="container">
   <div class="row border-top">
     <div class="<?= $class ?>">
     <?php
     while ( have_posts() ) : the_post();

        // Include the single post content template.
  			get_template_part( 'template-parts/content', 'single' );

     endwhile;
     ?>
    </div><!-- .col-md-x -->

    <?php if( $sidebar ) : ?>
     <aside class="col-md-4">
       <h1 style="visibility: hidden">
         Additional Content
       </h1><!-- add space for alignment -->
       <?php dynamic_sidebar( 'sidebar' ) ?>
     </aside><!-- .col-md-4 -->
    <?php endif ?>

   </div><!-- .row -->

   <div class="row">
     <div class="<?= $class ?> border-top pt-4">
       <?php comments_template(); ?>
     </div>
   </div>
 </div><!-- .container -->

 <?php get_footer(); ?>
