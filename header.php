<?php
/**
 * Header
 *
 * Main header file
 *
 * @category   Template
 * @package    WordPress
 * @since      1.0.0
 */

?>

<!doctype html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php do_action( 'before_wrapper' ); ?>

<div id="pageWrapper" class="page-wrapper">

	<header id="pageHeader">
		<div class="container">
			<div class="row text-xs-center">

				<div class="brand col-md-3 col-md-push-9">
					<a href="<?php echo esc_url( home_url() ); ?>" id="logo">
						<img src="<?php echo esc_url( get_theme_mod( 'jetwp-settings--logo' ) ); ?>" alt="לוגו">
					</a>
				</div><!-- .brand -->

			</div><!-- .row -->
		</div><!-- .container -->
	</header><!-- #pageHeader -->

	<nav class="navbar" role="navigation">
		<?php jetwp_nav(); ?>
	</nav>
