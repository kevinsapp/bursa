<?php
/**
 * The template for displaying the featured posts section
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */
?>

<?php $featured_posts = bursa_featured_posts() ?>
<?php while ( $featured_posts->have_posts() ) : $featured_posts->the_post(); ?>
  <div class="row">
   <div class="col px-0">
     <?php
       $featured_img_url = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );
     ?>
     <div class="jumbotron p-4 p-md-5 rounded text-white" style="background-image: url(<?php echo $featured_img_url ?>);">
       <div class="col-md-8 bg-dark rounded" id="bursa-featured-text-area">
         <h1 class="display-4"><?php the_title() ?></h1>
         <p class="lead my-3">
           <?php echo strip_tags( get_the_excerpt() ); ?>
         </p>
         <p class="lead">
           <a href="<?php the_permalink() ?>" class="text-white font-weight-bold stretched-link">
             Continue reading...
           </a>
         </p>
       </div>
     </div><!-- .jumbotron -->
   </div>
  </div>
<?php endwhile ?>
