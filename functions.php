<?php

if( ! defined('ABSPATH') ) exit;

require_once __DIR__.'/inc/func.php';
require_once __DIR__ . '/inc/carbon-fields/cb.php';
require_once __DIR__.'/inc/carbon-fields/carbon-category-posts-meta.php';
require_once __DIR__.'/inc/carbon-fields/carbon-specialist-post-type.php';
require __DIR__.'/classes/Primary_Menu_Walker.php';
require __DIR__.'/classes/Mobile_Menu_Walker.php';
require __DIR__.'/classes/MenuWidget.php';
require __DIR__.'/classes/LatestNews.php';
require __DIR__.'/classes/ContactAddressWidget.php';
require __DIR__.'/classes/ContactFormWidget.php';
require_once __DIR__.'/inc/widgets.php';
require_once __DIR__.'/inc/enqueue-style.php';
require_once __DIR__.'/inc/post-type.php';
require_once __DIR__.'/inc/taxonomy-specialist.php';
require_once __DIR__.'/inc/excerpt.php';

add_filter( 'widget_text', 'do_shortcode' );

/**
 * medical functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package medical
 */


if ( ! function_exists( 'medical_setup' ) ) :
	function medical_setup() {
		load_theme_textdomain( 'medical', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
//			'primary_menu' => esc_html__( 'Primary', 'medical' ),
			'primary_menu' => esc_html__( 'Basic Options', 'medical' ),
			'mobile_menu' => esc_html__( 'Mobile', 'medical' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'medical_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'medical_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function medical_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'medical_content_width', 640 );
}
add_action( 'after_setup_theme', 'medical_content_width', 0 );



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
