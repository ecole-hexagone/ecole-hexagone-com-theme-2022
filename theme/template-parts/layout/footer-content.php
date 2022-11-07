<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hexagone_2022
 */

?>

<footer id="colophon" class="footer">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'hexagone-2022' ); ?>">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside>
	<?php endif; ?>

	<div class="py-2 text-center text-xs md:py-4 ">
		<?php
		/* translators: 1: École Hexagone, 2: year. */
		printf(
			__( 'Copyright 2020-%2$s © - %1$s', 'hexagone-2022' ),
			__( 'École Hexagone', 'hexagone-2022' ),
			date('Y')
		);
		?>
	</div>

</footer><!-- #colophon -->
