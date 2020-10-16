<?php
/**
 * The template for displaying the Privacy Policy
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#privacy-policy-page-display
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */

get_header();
?>

<div class="container">
   <div class="row border-top pb-4">
     <div class="col-md-12">
     <?php
     while ( have_posts() ) : the_post();

        // Include the single page content template.
  			get_template_part( 'template-parts/content', 'privacy' );

     endwhile;
     ?>
    </div><!-- .col-md-x -->

   </div><!-- .row -->

 </div><!-- .container -->

 <?php get_footer(); ?>