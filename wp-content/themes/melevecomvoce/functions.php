<?php

/**
 * Me Leve Com Voce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Me Leve Com Voce
 */

if (!function_exists('melevecomvoce_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function melevecomvoce_setup()
{
		/*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on Me Leve Com Voce, use a find and replace
   * to change 'melevecomvoce' to the name of your theme in all the template files.
   */
  load_theme_textdomain('melevecomvoce', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

		/*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support('title-tag');

		/*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
  register_nav_menus(array(
    'menu-1' => esc_html__('Primary', 'melevecomvoce'),
  ));

		/*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));

		// Set up the WordPress core custom background feature.
  add_theme_support('custom-background', apply_filters('melevecomvoce_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  )));

		// Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support('custom-logo', array(
    'height' => 250,
    'width' => 250,
    'flex-width' => true,
    'flex-height' => true,
  ));
}
endif;
add_action('after_setup_theme', 'melevecomvoce_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function melevecomvoce_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('melevecomvoce_content_width', 640);
}
add_action('after_setup_theme', 'melevecomvoce_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
function melevecomvoce_scripts()
{
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

  wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css');

  wp_enqueue_style('font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i');

  wp_enqueue_style('melevecomvoce-style', get_stylesheet_uri(), array('font-awesome', 'animate-css', 'font-roboto'));

  wp_enqueue_script('melevecomvoce-wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array('jquery'), '20151215', true);


  wp_enqueue_script('melevecomvoce-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '20151215', true);


  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'melevecomvoce_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom admin menu.
 */
require get_template_directory() . '/inc/options-page.php';

/**
 * Custom menu.
 */
require get_template_directory() . '/inc/custom-menu.php';

/**
 * Custom breadcrumb.
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Related Posts
 */
require get_template_directory() . '/inc/related-posts.php';

/**
 * Mandatory Excerpt
 */
require get_template_directory() . '/inc/mandatory_excerpt.php';


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
  require get_template_directory() . '/inc/woocommerce.php';
}
