<?php
/**
 * Git4WPD functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Git4WPD
 */

if ( ! function_exists( 'Git4WPDGit4WPDetup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the afterGit4WPDetup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function Git4WPDGit4WPDetup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Git4WPD, use a find and replace
		 * to change Git4WPD to the name of your theme in all the template files.
		 */
		load_theme_textdomain( Git4WPD, get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_themeGit4WPDupport( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_themeGit4WPDupport( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_themeGit4WPDupport( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', Git4WPD ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_themeGit4WPDupport( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_themeGit4WPDupport( 'custom-background', apply_filters( 'Git4WPD_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_themeGit4WPDupport( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_themeGit4WPDupport( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'afterGit4WPDetup_theme', 'Git4WPDGit4WPDetup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function Git4WPD_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'Git4WPD_content_width', 640 );
}
add_action( 'afterGit4WPDetup_theme', 'Git4WPD_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Git4WPD_widgets_init() {
	registerGit4WPDidebar( array(
		'name'          => esc_html__( 'Sidebar', Git4WPD ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', Git4WPD ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'Git4WPD_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function Git4WPDGit4WPDcripts() {
	wp_enqueueGit4WPDtyle( 'Git4WPD-style', getGit4WPDtylesheet_uri() );

	wp_enqueueGit4WPDcript( 'Git4WPD-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueueGit4WPDcript( 'Git4WPD-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( isGit4WPDingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueueGit4WPDcript( 'comment-reply' );
	}
}
add_action( 'wp_enqueueGit4WPDcripts', 'Git4WPDGit4WPDcripts' );

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
