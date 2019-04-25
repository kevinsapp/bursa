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
   <div class="row">
    <div class="<?= $class ?>">
     <?php while ( have_posts() ) : the_post(); ?>
       <article <?php post_class() ?> >
         <h1 class="text-dark"><?php the_title() ?></h1>
         <?php the_post_thumbnail( 'post-thubmnail', ['class' => 'img-fluid mb-4']); ?>
         <?php the_content() ?>

         <section>
           <small>
             <strong><?php the_author_link() ?></strong><br>
             <time><?php the_date() ?></time><br>
             Categories: <?php the_category(', ') ?><br>
             <?php the_tags() ?>
           </small>
         </secion>
       </article>
     <?php endwhile ?>
    </div><!-- .col-md-x -->

    <?php if( $sidebar ) : ?>
     <aside class="col-md-4">
       <?php dynamic_sidebar( 'sidebar' ) ?>
     </aside><!-- .col-md-4 -->
    <?php endif ?>

   </div><!-- .row -->
 </div><!-- .container -->

 <?php get_footer(); ?>
