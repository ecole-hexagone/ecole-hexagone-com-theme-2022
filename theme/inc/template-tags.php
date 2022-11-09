<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Hexagone_2022
 */

if ( ! function_exists( 'hexagone_2022_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function hexagone_2022_posted_on() {
		$time_string = '<time datetime="%1$s">%2$s</time>';
		
		// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// 	// Hexa:
		// 	$time_string = __( '<time datetime="%1$s">%2$s</time> - Last modification: <time datetime="%3$s">%4$s</time>', 'hexagone-2022' );
		// }

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			// '<a href="%1$s" rel="bookmark">%2$s</a>',
			// esc_url( get_permalink() ),
			// $time_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			// Hexa:
			'%1$s',
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}
endif;

if ( ! function_exists( 'hexagone_2022_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function hexagone_2022_posted_by() {
		printf(
			/* translators: 1: posted by label, only visible to screen readers. 2: author link. 3: post author. */
			// '<span class="sr-only">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span>',
			// esc_html__( 'Posted by', 'hexagone-2022' ),
			// esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			// esc_html( get_the_author() )

			// Hexa:
			/* translators: 1: posted by label, only visible to screen readers. 2: post author. */
			'<span class="sr-only">%1$s</span><span class="author vcard">%2$s</span>',
			esc_html__( 'Posted by', 'hexagone-2022' ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'hexagone_2022_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function hexagone_2022_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="sr-only"> on %s</span>', 'hexagone-2022' ), get_the_title() ) );
		}
	}
endif;

if ( ! function_exists( 'hexagone_2022_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function hexagone_2022_entry_meta() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by.
			hexagone_2022_posted_by();

			// Hexa:
			echo "&nbsp;-&nbsp;";

			// Posted on.
			hexagone_2022_posted_on();

			// /* translators: used between list items, there is a space after the comma. */
			// $categories_list = get_the_category_list( __( ', ', 'hexagone-2022' ) );
			// if ( $categories_list ) {
			// 	printf(
			// 		/* translators: 1: posted in label, only visible to screen readers. 2: list of categories. */
			// 		'<span class="sr-only">%1$s</span>%2$s',
			// 		esc_html__( 'Posted in', 'hexagone-2022' ),
			// 		$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			// 	);
			// }

			// /* translators: used between list items, there is a space after the comma. */
			// $tags_list = get_the_tag_list( '', __( ', ', 'hexagone-2022' ) );
			// if ( $tags_list ) {
			// 	printf(
			// 		/* translators: 1: tags label, only visible to screen readers. 2: list of tags. */
			// 		'<span class="sr-only">%1$s</span>%2$s',
			// 		esc_html__( 'Tags:', 'hexagone-2022' ),
			// 		$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			// 	);
			// }
		}
	}
endif;

if ( ! function_exists( 'hexagone_2022_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function hexagone_2022_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// // Posted by.
			// hexagone_2022_posted_by();

			// // Hexa:
			// echo "&nbsp;-&nbsp;";

			// // Posted on.
			// hexagone_2022_posted_on();

			// /* translators: used between list items, there is a space after the comma. */
			// $categories_list = get_the_category_list( __( ', ', 'hexagone-2022' ) );
			// if ( $categories_list ) {
			// 	printf(
			// 		/* translators: 1: posted in label, only visible to screen readers. 2: list of categories. */
			// 		'<span class="sr-only">%1$s</span>%2$s',
			// 		esc_html__( 'Posted in', 'hexagone-2022' ),
			// 		$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			// 	);
			// }

			// /* translators: used between list items, there is a space after the comma. */
			// $tags_list = get_the_tag_list( '', __( ', ', 'hexagone-2022' ) );
			// if ( $tags_list ) {
			// 	printf(
			// 		/* translators: 1: tags label, only visible to screen readers. 2: list of tags. */
			// 		'<span class="sr-only">%1$s</span>%2$s',
			// 		esc_html__( 'Tags:', 'hexagone-2022' ),
			// 		$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			// 	);
			// }
		}
	}
endif;

if ( ! function_exists( 'hexagone_2022_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views
	 */
	function hexagone_2022_post_thumbnail() {
		if ( ! hexagone_2022_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure>
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

			<?php
		else :
			?>

			<figure>
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				</a>
			</figure>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'hexagone_2022_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function hexagone_2022_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => __( 'Newer posts', 'hexagone-2022' ),
				'next_text' => __( 'Older posts', 'hexagone-2022' ),
			)
		);
	}
endif;
