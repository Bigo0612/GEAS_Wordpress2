<?php
/**
 * wonder functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wonder
 */

if ( ! function_exists( 'wonder_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wonder_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on wonder, use a find and replace
         * to change 'wonder' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'wonder', get_template_directory() . '/languages' );

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
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );


        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */

    }
endif;
add_action( 'after_setup_theme', 'wonder_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wonder_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'wonder_content_width', 640 );
}
add_action( 'after_setup_theme', 'wonder_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wonder_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wonder' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wonder' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wonder_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wonder_scripts() {
    wp_enqueue_style('wonder-flexslider', get_template_directory_uri() . '/asset/css/flexslider.css',array(),'1.0.0');
    wp_enqueue_style( 'wonder-style', get_stylesheet_uri(),array(),'1.0.1' );
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery',get_template_directory_uri().'/asset/js/vendor/jquery-1.9.1.min.js',array(),'1.9.1',true);
    wp_enqueue_script('pluginjs',get_template_directory_uri().'/asset/js/plugins.js',array(),'1.0.0',true);
    wp_enqueue_script('mainjs',get_template_directory_uri().'/asset/js/main.js',array(),'1.0.0',true);
}
add_action( 'wp_enqueue_scripts', 'wonder_scripts' );

