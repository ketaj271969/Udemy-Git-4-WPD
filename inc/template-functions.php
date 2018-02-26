<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Git4WPD
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function Git4WPD_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! isGit4WPDingular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'Git4WPD_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function Git4WPD_pingback_header() {
	if ( isGit4WPDingular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'Git4WPD_pingback_header' );
