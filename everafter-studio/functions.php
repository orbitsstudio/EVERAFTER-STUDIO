<?php
/**
 * Everafter Studio Theme Functions & Definitions
 *
 * @package Everafter_Studio
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EVERAFTER_VERSION', '1.0.0' );
define( 'EVERAFTER_DIR', get_template_directory() );
define( 'EVERAFTER_URI', get_template_directory_uri() );

/**
 * Check PHP version compatibility.
 */
if ( version_compare( PHP_VERSION, '8.1.0', '<' ) ) {
	add_action(
		'admin_notices',
		function () {
			?>
			<div class="notice notice-error">
				<p>
					<?php
					printf(
						/* translators: %s: Current PHP version */
						esc_html__( 'Everafter Studio requires PHP version 8.1 or higher. Your server is running PHP %s. Please upgrade PHP to activate all features.', 'everafter-studio' ),
						esc_html( PHP_VERSION )
					);
					?>
				</p>
			</div>
			<?php
		}
	);
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function everafter_theme_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'everafter-studio', EVERAFTER_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts, pages, and custom post types
	add_theme_support( 'post-thumbnails' );

	// Custom photography image sizes
	add_image_size( 'everafter-hero', 1920, 1080, true );
	add_image_size( 'everafter-card', 900, 600, true );
	add_image_size( 'everafter-portrait', 800, 1060, true );
	add_image_size( 'everafter-square', 800, 800, true );

	// Register Navigation Menus
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Luxury Navigation', 'everafter-studio' ),
			'footer'  => esc_html__( 'Footer Navigation Menu', 'everafter-studio' ),
		)
	);

	// Switch default core markup to output valid HTML5
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
			'navigation-widgets',
		)
	);

	// Add theme support for selective refresh for widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for core custom logo
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 280,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Gutenberg / Block editor alignment
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'everafter_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function everafter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'everafter_content_width', 1280 );
}
add_action( 'after_setup_theme', 'everafter_content_width', 0 );

/**
 * Register widget area.
 */
function everafter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'everafter-studio' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in footer column 1.', 'everafter-studio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'everafter-studio' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here to appear in footer column 2.', 'everafter-studio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'everafter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function everafter_scripts() {
	// 1. Google Fonts: Cormorant Garamond & Inter
	wp_enqueue_style(
		'everafter-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	// 2. Main Theme Stylesheet
	wp_enqueue_style(
		'everafter-style',
		get_stylesheet_uri(),
		array( 'everafter-fonts' ),
		EVERAFTER_VERSION
	);

	// 3. Theme JavaScript
	wp_enqueue_script(
		'everafter-main',
		EVERAFTER_URI . '/assets/js/main.js',
		array(),
		EVERAFTER_VERSION,
		true
	);

	// Localize parameters for AJAX form submission and assets
	wp_localize_script(
		'everafter-main',
		'everafter_params',
		array(
			'ajax_url'  => admin_url( 'admin-ajax.php' ),
			'theme_uri' => EVERAFTER_URI,
			'nonce'     => wp_create_nonce( 'everafter_submit_inquiry_action' ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'everafter_scripts' );

/**
 * Include Required Theme Sub-modules
 */
require_once EVERAFTER_DIR . '/inc/template-functions.php';
require_once EVERAFTER_DIR . '/inc/custom-post-types.php';
require_once EVERAFTER_DIR . '/inc/customizer.php';
require_once EVERAFTER_DIR . '/inc/theme-options.php';
require_once EVERAFTER_DIR . '/inc/contact-form.php';
require_once EVERAFTER_DIR . '/inc/demo-content.php';
