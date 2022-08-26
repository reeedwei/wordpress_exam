<?php

add_action( 'customize_register', 'pagoda_press_customizer_theme_info' );

function pagoda_press_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'pagoda_press_theme_info_section' , array(
		'title'       => esc_html__( '❂ Theme Info' , 'pagoda-press' ),
		'priority' => 2
	) );
    

	$wp_customize->add_setting( 'theme_info', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
    
    $theme_info = '';
	
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Theme Details', 'pagoda-press' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://graphthemes.com/pagoda-press/' ) . '" target="_blank">' . esc_html__( 'Click Here', 'pagoda-press' ) . '</a></span><hr>';

	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'How to use', 'pagoda-press' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://graphthemes.com/theme-docs/pagoda-press/' ) . '" target="_blank">' . esc_html__( 'Click Here', 'pagoda-press' ) . '</a></span><hr>';
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'View Demo', 'pagoda-press' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://graphthemes.com/preview/?product_id=pagoda-press' ) . '" target="_blank">' . esc_html__( 'Click Here', 'pagoda-press' ) . '</a></span><hr>';
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Support Forum', 'pagoda-press' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://wordpress.org/support/theme/pagoda-press' ) . '" target="_blank">' . esc_html__( 'Click Here', 'pagoda-press' ) . '</a></span><hr>';

	$wp_customize->add_control( new Pagoda_Press_Custom_Text( $wp_customize ,'theme_info',array(
		'section' => 'pagoda_press_theme_info_section',
		'label' => $theme_info
	) ) );

}