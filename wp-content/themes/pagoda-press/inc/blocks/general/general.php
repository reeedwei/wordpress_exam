<?php

add_action( 'customize_register', 'pagoda_press_register_general_customization_section' );
function pagoda_press_register_general_customization_section( $wp_customize ) {

	$wp_customize->add_section( 'pagoda_press_general_customization_section', array(
	    'title'	=> esc_html__( 'General Options', 'pagoda-press' ),
	    'priority'	=> 21
	) );

}


/* Add Default General Settings for Customizer Settings */
require dirname( __FILE__ ) . '/default-general.php';

require dirname( __FILE__ ) . '/sticky-menu/sticky-menu.php';

require dirname( __FILE__ ) . '/breadcrumbs/breadcrumbs.php';

require dirname( __FILE__ ) . '/container-width/container-width.php';

require dirname( __FILE__ ) . '/social-links/social-links.php';