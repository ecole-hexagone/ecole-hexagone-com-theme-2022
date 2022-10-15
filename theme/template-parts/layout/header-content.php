<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hexagone_2022
 */

?>

<header id="masthead" class="header" x-data="{ open: false }">
	<div class="navbar">
		<button
			class="focus:ring focus:outline-none lg:hidden"
			@click="open = !open"
			aria-controls="primary-menu"
		>
			<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6 -scale-x-100 rtl:scale-x-100">
				<path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
				<path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
			</svg>
		</button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id' => 'primary-menu',
				'container' => 'nav',
				'container_class' => 'navbar-menu hidden lg:block',
				'container_id' => 'site-navigation',
				'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
		<!-- .custom-logo will be styled -->
		<?php the_custom_logo(); ?>
		<nav id="langs-navigation" class="navbar-menu">
			<ul>
				<li>
					<a class="flex-button lg:justify-end lg:w-28" href="#" title="<?php esc_attr_e( 'Languages', 'hexagone-2022' ); ?>">
						<svg
							class="h-5 w-5"
							fill="none"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"
							/>
						</svg>
					</a>
					<?php do_action('wpml_add_language_selector'); ?>
				</li>
			</ul>
		</nav>
	</div>
</header><!-- #masthead -->
