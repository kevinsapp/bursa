<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */
?>
  <footer>
    <div class="container py-4">
      <div class="row">
        <div class="col">
          <?php dynamic_sidebar( 'footer-content' ); ?>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
