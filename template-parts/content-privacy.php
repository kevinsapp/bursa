<?php
/**
 * The template for displaying all pages
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
        <?php the_content(); ?>
      </div><!-- .col -->
    </div><!-- .row -->

    <div class="row">
      <div class="col">
        <?php wp_link_pages(); ?>
      </div>
    </div>

  </div><!-- .container -->
</article>
