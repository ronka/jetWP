<?php
/**
 * Footer
 *
 * Main footer file
 *
 * @category   Template
 * @package    WordPress
 * @since      1.0.0
 */

?>

	<footer id="mainFooter">
		<div class="container">
			<div class="row">
				<?php // translators: Footer text. ?>
				<?php printf( __( '© %1$s All copyright reserved %2$s' ), date( 'Y' ), bloginfo( 'name' ) ); ?>
			</div>
		</div>
	</footer>

</div><!-- #pageWrapper -->

<?php do_action( 'after_wrapper' ); ?>

<?php wp_footer(); ?>
</body>
</html>
