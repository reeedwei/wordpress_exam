<?php

function pagoda_press_customizer_upgrade_to_pro( $wp_customize ) {

	$wp_customize->add_section( new Pagoda_Press_Button_Control( $wp_customize, 'upgrade-to-pro',	array(
		'title'    => esc_html__( '★ Pagoda Press Pro ', 'pagoda-press' ),
		'type'	=> 'button',
		'pro_text' => esc_html__( 'Upgrade to Pro', 'pagoda-press' ),
		'pro_url'  => esc_url( 'https://graphthemes.com/pagoda-press/' ),
		'priority' => 1
	) )	);

	
}
add_action( 'customize_register', 'pagoda_press_customizer_upgrade_to_pro' );


function pagoda_press_enqueue_custom_admin_style() {
        wp_register_style( 'pagoda-press-button', get_template_directory_uri() . '/inc/blocks/includes/button/button.css', false );
        wp_enqueue_style( 'pagoda-press-button' );

        wp_enqueue_script( 'pagoda-press-button', get_template_directory_uri() . '/inc/blocks/includes/button/button.js', array( 'jquery' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'pagoda_press_enqueue_custom_admin_style' );