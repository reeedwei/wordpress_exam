<?php

add_action( 'customize_register', 'pagoda_press_post_detail_author' );
function pagoda_press_post_detail_author( $wp_customize ) {

	$wp_customize->add_setting( 'post_detail_hide_show_author', array(
        'sanitize_callback'     =>  'pagoda_press_sanitize_checkbox',
        'default'               =>  pagoda_press_get_default_post_detail_author()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'post_detail_hide_show_author', array(
        'label' => esc_html__( 'Show/Hide Author','pagoda-press' ),
        'section' => 'pagoda_press_post_detail_customization_section',
        'settings' => 'post_detail_hide_show_author',
        'type'=> 'toggle',
    ) ) );

}