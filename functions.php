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
  // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

  /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1024, 9999 );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'header', __( 'Header Navigation Menu', 'bursa' ) );

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

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
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
  // Blog Sidebar
  register_sidebar(
    array(
      'name'          => __( 'Blog Sidebar', 'bursa' ),
      'id'            => __( 'blog-sidebar', 'bursa' ),
      'description'   => __( 'Add widgets here to appear along the right side of your blog page.', 'bursa' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h5 class="widget-title text-dark">',
      'after_title'   => '</h5>',
    )
  );

	// Post Sidebar
  register_sidebar(
    array(
      'name'          => __( 'Post Sidebar', 'bursa' ),
      'id'            => __( 'post-sidebar', 'bursa' ),
      'description'   => __( 'Add widgets here to appear along the right side of your posts.', 'bursa' ),
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
      'id'            => __( 'footer-content', 'bursa' ),
      'description'   => __( 'Add widgets here to appear in the footer.', 'bursa' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );
}
add_action( 'widgets_init', 'bursa_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function bursa_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bursa_content_width', 768 );
}
add_action( 'after_setup_theme', 'bursa_content_width', 0 );

/**
 * Enqueue styles and scripts.
 *
 * @since 1.0.0
 */
function bursa_scripts() {
  // Bootstrap styles
  $bootstrap_url = 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css';
  wp_enqueue_style( 'bootstrap4', $bootstrap_url, array(), null );
  // Theme stylesheet.
	wp_enqueue_style( 'bursa-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'bursa_scripts' );

/*******************************************************************************
 * Custom functions
 ******************************************************************************/

/**
 * Return sticky posts.
 *
 * @since Bursa 1.0
 *
 * @return WP_Query an instance of WP_Query
 */
function bursa_query_sticky_posts() {
  $args = array(
    'post__in'            => get_option( 'sticky_posts' ),
    'ignore_sticky_posts' => 1
  );

	return new WP_Query( $args );
}

/**
 * Return a paginated collection of posts excluding sticky posts.
 *
 * @since Bursa 1.0
 *
 * @return WP_Query an instance of WP_Query
 */
function bursa_query_posts_exclude_sticky() {
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}

	$args = array(
		'post__not_in'	=> get_option( 'sticky_posts' ),
		'paged' 				=> $paged,
	);

	return new WP_Query( $args );
}

/**
 * Prints posts pagination links.
 *
 * @since Bursa 1.0
 *
 * @param WP_Query $query an instance of WP_Query; generally a custom query.
 */
function bursa_posts_page_links( WP_Query $query = NULL ) {
	/*
	 * IMPORTANT: This function replaces the global $wp_query with the $query
	 * passed in by the caller. This seems to be necessary in order to get
	 * posts pagination links to work with a custom query (instance of WP_Query).
	 *
	 * See the following StackOverflow Q&A for a detailed description of the
	 * problem and solution.
	 * https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops
	 */
	if( is_null( $query ) ) {
		// Print posts pagination links.
		echo bursa_get_posts_page_links();
	} else {
		// Specify a reference the global $wp_query
	 	global $wp_query;

		// Make a local (backup) copy of the global $wp_query.
		$orig_query = $wp_query;

		// NULLify the global $wp_query.
		$wp_query = NULL;

		// Replace the global $wp_query with the caller's query.
		$wp_query = $query;

		// Print posts pagination links.
		echo bursa_get_posts_page_links();

		// Restore the global $wp_query from the local copy.
		$wp_query = $orig_query;
	}
}

/**
 * Returns posts pagination links, wrapped in <ul><li></li></ul>.
 * <li>'s and <a>'s include Bootstrap pagination related classes.
 * Useful for for blog, archive, and search pages, etc.
 *
 * @since Bursa 1.0
 *
 * @return string and HTML string of pagination links wrapped in other elements.
 */
function bursa_get_posts_page_links() {
	$html = '';
	$links = paginate_links( array( 'type' => 'array' ) );

	if( isset( $links ) ) {
		$html = '<ul class="pagination">';

		foreach ( $links as $link ) {
			$link = preg_replace( '/page-numbers/', 'page-numbers page-link', $link );
			if ( strpos( $link, 'current' ) ) {
				$html .= '<li class="page-item active">' . $link . '</li>';
			} else {
				$html .= '<li class="page-item">' . $link . '</li>';
			}
		}

		$html .= '</ul>'; // close the <ul> tag
	}

	return $html;
}
