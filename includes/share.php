<?php
/**
 * Share handler
 *
 * Add facebook og tags
 *
 * @category   Functions
 * @package    WordPress
 * @since      1.0.0
 */

?>

<?php
/**
 * Generate facebook og tags
 *
 * @return void
 */
function fb_opengraph() {
	global $post;
	$excerpt = '';
	$img_src = '';
	$title   = $post->post_title;

	if ( is_singular() ) {
		if ( has_post_thumbnail( $post->ID ) ) {
			$img_src = get_the_post_thumbnail_url( $post );
		} else {
			$img_src = esc_url( get_theme_mod( 'settings-logo' ) );
		}
		if ( ! empty( $post->post_excerpt ) ) {
			$excerpt = wp_strip_all_tags( $post->post_excerpt );
			$excerpt = str_replace( '', '\'', $excerpt );
		} else {
			$excerpt = get_bloginfo( 'description' );
		}
	}

	?>
	<meta property="og:title" content="<?php echo esc_html( $title ); ?>"/>
	<meta property="og:description" content="<?php echo esc_html( $excerpt ); ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
	<meta property="og:site_name" content="<?php echo esc_html( get_bloginfo() ); ?>"/>
	<meta property="og:image" content="<?php echo esc_html( $img_src ); ?>"/>
	<?php

}
add_action( 'wp_head', 'fb_opengraph', 5 );
