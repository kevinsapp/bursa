<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
  <header class="container">
    <div class="row border-bottom bg-dark shadow-sm rounded-bottom">
      <div class="col py-2">
        <h2 class="mb-0">
          <a href="<?php echo home_url(); ?>" class="text-white">
            <?php bloginfo('name'); ?>
          </a>
        </h2>
        <p class="text-muted text-white-50 mb-0">
            <?php bloginfo('description'); ?>
        </p>
      </div><!-- .col -->
    </div><!-- .row -->


    <div class="row py-2">
      <div class="col pl-0">
        <div class="nav-scroller py-1 mb-2">
          <?php
            wp_nav_menu(
              array(
                'theme_location' => 'header',
                'container' => 'nav',
                'menu_class' => 'nav lead'
              )
            );
          ?><!-- .nav -->
        </div>
      </div>
    </div><!-- .row -->
  </header><!-- header.container -->
