<?php
/**
 * Add a new page under Appearance
 */

function pagoda_press_getting_started_menu() {

	add_theme_page( esc_html__( 'Getting Started', 'pagoda-press' ), esc_html__( 'Getting Started', 'pagoda-press' ), 'edit_theme_options', 'pagoda-press-get-started', 'pagoda_press_getting_started_page' );
}
add_action( 'admin_menu', 'pagoda_press_getting_started_menu' );

/**
 * Enqueue styles for the help page.
 */
function pagoda_press_admin_scripts() {

	wp_enqueue_style( 'pagoda-press-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css', array(), PAGODA_PRESS_VERSION );
}
add_action( 'admin_enqueue_scripts', 'pagoda_press_admin_scripts' );

/**
 * Add the theme page
 */
function pagoda_press_getting_started_page() { ?>

<div class="main-info">

	<?php get_template_part( 'inc/getting-started/template-parts/main', 'info' ); ?>

</div>
<div class="top-wrapper">

	<?php get_template_part( 'inc/getting-started/template-parts/free-vs', 'pro' ); ?>

	<?php get_template_part( 'inc/getting-started/template-parts/faq' ); ?>


</div>
	<?php
}