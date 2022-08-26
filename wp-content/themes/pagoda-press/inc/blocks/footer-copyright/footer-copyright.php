<?php

/* Add Default Copyright Text */
require dirname( __FILE__ ) . '/default-footer-copyright.php';

add_action( 'customize_register', 'pagoda_press_customize_register_footer_copyright' );
function pagoda_press_customize_register_footer_copyright( $wp_customize ) {

    $wp_customize->add_section( 'pagoda_press_footer_copyright_section', array(
        'title'          => esc_html__( 'Footer Copyright', 'pagoda-press' ),
        'priority'  => 24
    ) );

    $wp_customize->add_setting( 'footer_copyright_text', array(
        'sanitize_callback'     =>  'wp_kses_post',
        'default'               =>  pagoda_press_get_default_footer_copyright()
    ) );

    $wp_customize->add_control( 'footer_copyright_text', array(
        'label' => esc_html__( 'Copyright Text', 'pagoda-press' ),
        'section' => 'pagoda_press_footer_copyright_section',
        'settings' => 'footer_copyright_text',
        'type'=> 'textarea',
    ) );

}