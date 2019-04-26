<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> >

<head>
  <meta charset="<?php bloginfo( 'charset' ) ?>" />
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="<?php bloginfo( 'description' ) ?>" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
  <title><?php bloginfo('name') ?> <?php wp_title() ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() ?>" media="all">
  <?php wp_head() ?>
</head>

<body <?php body_class() ?> >
  <header class="container">
    <div class="row border-bottom bg-dark shadow-sm rounded-bottom">
      <div class="col py-2">
        <h2 class="mb-0">
          <a href="<?php echo home_url() ?>" class="text-white">
            <?php bloginfo('name') ?>
          </a>
        </h2>
        <p class="text-muted text-white-50 mb-0">
            <?php bloginfo('description') ?>
        </p>
      </div><!-- .col -->
    </div><!-- .row -->


    <div class="row py-2">
      <div class="col pl-0">
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'main',
              'container' => 'nav',
              'menu_class' => 'nav lead'
            )
          );
        ?><!-- .nav -->
      </div>
    </div><!-- .row -->
  </header><!-- header.container -->
