<?php
/**
 * Bursa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Outsiders_Republic
 * @subpackage Bursa
 * @since 1.0.0
 */

 // TODO: set up backwards compatability warning. see twentynineteen theme.

 /**
  * Sets up theme defaults and registers support for various WordPress features.
  */
function bursa_setup() {
  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1024, 9999 );

  // This theme users wp_nav_menu() in one location.
  register_nav_menu( 'main', 'Main Menu' );

  /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'bursa_setup' );

/**
 * Add custom CSS classes to nav menu list items.
 *
 * @since Bursa 1.0
 *
 * @param array $classes CSS classes for the nav menu list item.
 * @return array The filtered CSS classes for the nav menu list item.
 */
function bursa_nav_item_css_class( $classes ) {
  if( in_array( 'menu-item', $classes ) ) {
    array_push( $classes, 'nav-item' );
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'bursa_nav_item_css_class' );

/**
 * Add 'class' attribute and custom CSS classes to nav links (anchors).
 *
 * @since Bursa 1.0
 *
 * @param array $atts HTML attributes applied to the menu item's <a> element.
 * @return array The filtered HTML attributes applied to the menu item's <a> element.
 */
function bursa_nav_link_attributes( $atts ) {
  if( $atts['aria-current'] == 'page' ) {
    $atts['class'] = 'nav-link active';
  } else {
    $atts['class'] = 'nav-link';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'bursa_nav_link_attributes' );

/**
 * Register widget areas.
 */
function bursa_widgets_init() {
  // Sidebar
  register_sidebar(
    array(
      'name'          => __( 'Sidebar', 'bursa' ),
      'id'            => __( 'sidebar' ),
      'description'   => __( 'Add widgets here to appear in the sidebar.', 'bursa' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h5 class="widget-title text-dark">',
      'after_title'   => '</h5>',
    )
  );

  // Footer widget area
  register_sidebar(
    array(
      'name'          => __( 'Footer Content', 'bursa' ),
      'id'            => __( 'footer-content' ),
      'description'   => __( 'Add widgets here to appear in the footer.', 'bursa' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );
}
add_action( 'widgets_init', 'bursa_widgets_init' );


/*******************************************************************************
 * Custom functions
 ******************************************************************************/

/**
 * Return a specified number of sticky posts.
 *
 * @since Bursa 1.0
 *
 * @param integer $cout number of posts returned by the query.
 * @return WP_Query an instance of WP_Query
 */
function bursa_featured_posts( $cout = 1 ) {
  $args = array(
    'posts_per_page' => $cout,
    'post__in'  => get_option( 'sticky_posts' ),
    'ignore_sticky_posts' => 1
  );
  $query = new WP_Query( $args );

  return $query;
}
