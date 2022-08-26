<?php

add_action( 'customize_register', 'pagoda_press_show_hide_site_tagline' );
function pagoda_press_show_hide_site_tagline( $wp_customize ) {

    $wp_customize->add_setting( 'show_hide_site_tagline', array(
        'sanitize_callback'     =>  'pagoda_press_sanitize_checkbox',
        'default'               =>  pagoda_press_get_default_site_tagline_show_hide()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'show_hide_site_tagline', array(
        'label' => esc_html__( 'Show/Hide Site Tagline','pagoda-press' ),
        'section' => 'title_tagline',
        'settings' => 'show_hide_site_tagline',
        'type'=> 'toggle',
    ) ) );

}