<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Git4WPD
 */

if ( ! is_activeGit4WPDidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamicGit4WPDidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
