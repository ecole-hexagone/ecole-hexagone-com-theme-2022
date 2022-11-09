<?php
/**
 * Template Name: No prose
 * The template for displaying pages without default prose style
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hexagone_2022
 */

get_header();
?>

	<section id="primary">
		<main id="main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page-no-prose' );
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
