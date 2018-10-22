<?php
/**
 * 404
 *
 * Main 404 page
 *
 * @category   Template
 * @package    WordPress
 * @since      1.0.0
 */

get_header(); ?>

	<main id="mainContent">

		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center mt-50">

					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can\'t be found.', 'twentyseventeen' ); ?></h1>

				</div>

			</div><!-- .row -->
		</div><!-- .container -->

	</main><!-- #main-content -->

<?php get_footer(); ?>
