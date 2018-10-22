<?php
/**
 * Sidebar
 *
 * Main sidebar file for the theme.
 *
 * @category   Template
 * @package    WordPress
 * @since      1.0.0
 */

?>

<?php if ( is_active_sidebar( 'widget-area-1' ) ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'widget-area-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
