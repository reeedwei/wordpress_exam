<?php

add_action( 'customize_register', 'pagoda_press_breadcrumbs' );
function pagoda_press_breadcrumbs( $wp_customize ) {

	$wp_customize->add_setting('pagoda_press_breadcrumbs_option', array(
        'sanitize_callback'     =>  'pagoda_press_sanitize_checkbox',
        'default'               =>  pagoda_press_get_default_breadcrumbs(),
    ));

    $wp_customize->add_control(new Graphthemes_Toggle_Control($wp_customize, 'pagoda_press_breadcrumbs_option', array(
        'label' => esc_html__('Enable Breadcrumbs', 'pagoda-press'),
        'section' => 'pagoda_press_general_customization_section',
        'settings' => 'pagoda_press_breadcrumbs_option',
        'type' => 'toggle',
    )));

}