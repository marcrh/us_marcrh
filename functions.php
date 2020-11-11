<?php
/**
 * us_marcrh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package us_marcrh
 */

if ( ! defined( 'US_MARCRH_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'US_MARCRH_VERSION', '1.0.0' );
}

if ( ! function_exists( 'us_marcrh_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function us_marcrh_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on us_marcrh, use a find and replace
		 * to change 'us_marcrh' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'us_marcrh', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'us_marcrh' ),
			)
		);

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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'us_marcrh_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 48,
			    'width'       => 48,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		
	}
endif;
add_action( 'after_setup_theme', 'us_marcrh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function us_marcrh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'us_marcrh_content_width', 640 );
}
add_action( 'after_setup_theme', 'us_marcrh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function us_marcrh_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'us_marcrh' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'us_marcrh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'us_marcrh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function us_marcrh_scripts() {
	wp_enqueue_style( 'us_marcrh-style', get_stylesheet_uri(), array(), US_MARCRH_VERSION );
	wp_style_add_data( 'us_marcrh-style', 'rtl', 'replace' );

	

	wp_enqueue_script( 'us_marcrh-materialize', get_template_directory_uri() . '/js/materialize/bin/materialize.min.js', array(), US_MARCRH_VERSION, true );
	wp_enqueue_script( 'us_marcrh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), US_MARCRH_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	
}
add_action( 'wp_enqueue_scripts', 'us_marcrh_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Changes the class on the custom logo in the header.php
 */
function us_marcrh_custom_logo_class( $html ) {
    return str_replace('custom-logo-link', 'brand-logo', $html );
}
add_filter('get_custom_logo', 'us_marcrh_custom_logo_class', 10);

add_action( 'wpcf7_enqueue_styles', function() { wp_deregister_style( 'contact-form-7' ); } );
add_action( 'wpcf7_enqueue_scripts', function() { wp_deregister_script( 'jquery-form' ); } );