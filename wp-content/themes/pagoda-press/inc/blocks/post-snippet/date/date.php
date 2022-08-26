<?php

add_action( 'customize_register', 'pagoda_press_post_snippet_date' );
function pagoda_press_post_snippet_date( $wp_customize ) {

	$wp_customize->add_setting( 'post_snippet_hide_show_date', array(
        'sanitize_callback'     =>  'pagoda_press_sanitize_checkbox',
        'default'               =>  pagoda_press_get_default_post_snippet_date()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'post_snippet_hide_show_date', array(
        'label' => esc_html__( 'Show/Hide Date','pagoda-press' ),
        'section' => 'pagoda_press_post_snippet_customization_section',
        'settings' => 'post_snippet_hide_show_date',
        'type'=> 'toggle',
    ) ) );

}