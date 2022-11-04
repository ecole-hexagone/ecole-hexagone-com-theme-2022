<?php
/**
 * Hexagone 2022 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hexagone_2022
 */

if ( ! defined( 'HEXAGONE_2022_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'HEXAGONE_2022_VERSION', '1.2' );
}

if ( ! function_exists( 'hexagone_2022_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hexagone_2022_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Hexagone 2022, use a find and replace
		 * to change 'hexagone-2022' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hexagone-2022', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'hexagone-2022' ),
				'menu-2' => __( 'Footer Menu', 'hexagone-2022' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );

		// Hexa: Remove support for custom font sizes
		add_theme_support( 'disable-custom-font-sizes' );

		// Hexa: Add support for custom logo
		add_theme_support( 'custom-logo' );

		// Hexa: Add support for block styles
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'hexagone_2022_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hexagone_2022_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'hexagone-2022' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'hexagone-2022' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hexagone_2022_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hexagone_2022_scripts() {
	wp_enqueue_style( 'hexagone-2022-style', get_stylesheet_uri(), array(), HEXAGONE_2022_VERSION );
	wp_enqueue_script( 'hexagone-2022-script', get_template_directory_uri() . '/js/script.min.js', array(), HEXAGONE_2022_VERSION, true );

	// Hexa: Remove comments
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	// Hexa: Add styles for core blocks
	$styled_blocks = [];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "hexagone-2022-$block_name",
			'src'    => get_theme_file_uri( "css/blocks/core/$block_name.css" ),
			$args['path'] = get_theme_file_path( "css/blocks/core/$block_name.css" ),
		);
		wp_enqueue_block_style( "core/$block_name", $args );
	}

	// Hexa: Add styles for custom blocks
	$styled_blocks = [];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "hexagone-2022-$block_name",
			'src'    => get_theme_file_uri( "css/blocks/hexagone-2022/$block_name.css" ),
			$args['path'] = get_theme_file_path( "css/blocks/hexagone-2022/$block_name.css" ),
		);
		wp_enqueue_block_style( "hexagone-2022/$block_name", $args );
	}
}
add_action( 'wp_enqueue_scripts', 'hexagone_2022_scripts' );

function hexagone_2022_blocks_scripts() {
    wp_enqueue_script(
        'hexagone-2022-blocks-script', get_template_directory_uri() . '/js/blocks.script.min.js', array( ), HEXAGONE_2022_VERSION, true
    );
}
add_action( 'enqueue_block_editor_assets', 'hexagone_2022_blocks_scripts' );

/**
 * Add the block editor class to TinyMCE.
 *
 * This allows TinyMCE to use Tailwind Typography styles.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function hexagone_2022_tinymce_add_class( $settings ) {
	$settings['body_class'] = 'block-editor-block-list__layout';
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'hexagone_2022_tinymce_add_class' );

function update_themes_github_com($update, $theme_data, $theme_stylesheet, $locales) {
	$current = filter_var($theme_data['Version'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	$user = 'ecole-hexagone'; // The GitHub username hosting the repository
	$repo = 'ecole-hexagone-com-theme-2022'; // Repository name as it appears in the URL

	$request = wp_remote_get( 'https://api.github.com/repos/'.$user.'/'.$repo.'/releases/latest' );
	if( is_wp_error( $request ) ) {
		return false;
	}
	$body = wp_remote_retrieve_body( $request );

	$file = json_decode( $body );

	if ($file) {
	  $new_version = filter_var($file->tag_name, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	  // Only return a response if the new version number is higher than the current version
	  if($new_version > $current) {
			$update = array(
				'theme'        => 'hexagone-2022',
				'version'      => $new_version,
				'url'          => $theme_data['UpdateURI'],
				'package'      => $file->assets[0]->browser_download_url
			);
	  }
	}

	return $update;
}
add_filter('update_themes_github.com', 'update_themes_github_com', 100, 4 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Multisite generic settings
 */
require get_template_directory() . '/inc/multisite-settings.php';

/**
 * Plugins-specific overrides
 */
require get_template_directory() . '/inc/plugins-overrides.php';