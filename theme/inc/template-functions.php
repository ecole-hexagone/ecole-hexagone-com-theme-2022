<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Hexagone_2022
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function hexagone_2022_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'hexagone_2022_pingback_header' );

/**
 * Changes comment form default fields.
 *
 * @param array $defaults The default comment form arguments.
 *
 * @return array Returns the modified fields.
 */
function hexagone_2022_comment_form_defaults( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'hexagone_2022_comment_form_defaults' );

/**
 * Filters the default archive titles.
 */
function hexagone_2022_get_the_archive_title() {
	if ( is_category() ) {
		$title = single_term_title( '', false );
	} elseif ( is_tag() ) {
		$title = __( 'Tag Archives: ', 'hexagone-2022' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = __( 'Author Archives: ', 'hexagone-2022' ) . '<span>' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = __( 'Yearly Archives: ', 'hexagone-2022' ) . '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'hexagone-2022' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = __( 'Monthly Archives: ', 'hexagone-2022' ) . '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'hexagone-2022' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = __( 'Daily Archives: ', 'hexagone-2022' ) . '<span>' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$cpt   = get_post_type_object( get_queried_object()->name );
		$title = sprintf(
			/* translators: %s: Post type singular name */
			esc_html__( '%s Archives', 'hexagone-2022' ),
			$cpt->labels->singular_name
		);
	} elseif ( is_tax() ) {
		$tax   = get_taxonomy( get_queried_object()->taxonomy );
		$title = sprintf(
			/* translators: %s: Taxonomy singular name */
			esc_html__( '%s Archives', 'hexagone-2022' ),
			$tax->labels->singular_name
		);
	} else {
		$title = __( 'Archives:', 'hexagone-2022' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'hexagone_2022_get_the_archive_title' );

/**
 * Determines if post thumbnail can be displayed.
 */
function hexagone_2022_can_show_post_thumbnail() {
	return apply_filters( 'hexagone_2022_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Returns the size for avatars used in the theme.
 */
function hexagone_2022_get_avatar_size() {
	return 60;
}

/**
 * Create the continue reading link
 */
function hexagone_2022_continue_reading_link() {

	if ( ! is_admin() ) {
		$continue_reading = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s', 'hexagone-2022' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="sr-only">"', '"</span>', false )
		);

		return '<a class="is-style-hexagone-cta" href="' . esc_url( get_permalink() ) . '">' . $continue_reading . '</a>';
	}
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'hexagone_2022_continue_reading_link' );

// Filter the content more link.
add_filter( 'the_content_more_link', 'hexagone_2022_continue_reading_link' );
