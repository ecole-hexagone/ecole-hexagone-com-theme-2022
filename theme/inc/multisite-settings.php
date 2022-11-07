<?php
/**
 * Multisite default settings
 * - Permalink format and categories/tags prefix
 * - Default to 12 posts per page
 * - Disable avatars
 * - Disable sample post/page/comment creation
 *
 * @package Hexagone_2022
 */

add_action( 'wp_initialize_site', 'wpdocs_action_wp_initialize_site', 900 );

/**
 * Fires when a site's initialization routine should be executed.
 *
 * @param WP_Site $new_site New site object.
 */
function wpdocs_action_wp_initialize_site( WP_Site $new_site ) : void {
	switch_to_blog( $new_site->blog_id );

	global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%category%/%year%/%monthnum%/%day%/%postname%/');
    $wp_rewrite->set_category_base('.');
    $wp_rewrite->set_tag_base('.');
    $wp_rewrite->flush_rules();

    update_option( 'posts_per_page', 12 );

    update_option( 'show_avatars', 0 );

    // 'Hello World!' post
    wp_delete_post( 1, true );
    // 'Sample page' page
    wp_delete_post( 2, true );

	restore_current_blog();
}