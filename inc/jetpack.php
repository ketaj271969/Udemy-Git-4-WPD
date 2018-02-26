<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Git4WPD
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function Git4WPD_jetpackGit4WPDetup() {
	// Add theme support for Infinite Scroll.
	add_themeGit4WPDupport( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'Git4WPD_infiniteGit4WPDcroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_themeGit4WPDupport( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_themeGit4WPDupport( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'Git4WPD-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'afterGit4WPDetup_theme', 'Git4WPD_jetpackGit4WPDetup' );

/**
 * Custom render function for Infinite Scroll.
 */
function Git4WPD_infiniteGit4WPDcroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( isGit4WPDearch() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
