<?php

add_action( 'customize_register', 'pagoda_press_post_detail_related_articles' );
function pagoda_press_post_detail_related_articles( $wp_customize ) {

	$wp_customize->add_setting( 'post_detail_hide_show_related_articles', array(
        'sanitize_callback'     =>  'pagoda_press_sanitize_checkbox',
        'default'               =>  pagoda_press_get_default_post_detail_related_articles()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'post_detail_hide_show_related_articles', array(
        'label' => esc_html__( 'Show/Hide Related Articles','pagoda-press' ),
        'section' => 'pagoda_press_post_detail_customization_section',
        'settings' => 'post_detail_hide_show_related_articles',
        'type'=> 'toggle',
    ) ) );

}

add_action( 'customize_register', 'pagoda_press_post_detail_related_articles_title' );
function pagoda_press_post_detail_related_articles_title( $wp_customize ) {
    $wp_customize->add_setting( 'post_detail_related_articles_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  pagoda_press_get_default_post_detail_related_articles_title()
    ) );

    $wp_customize->add_control( 'post_detail_related_articles_title', array(
        'settings' => 'post_detail_related_articles_title',
        'type' => 'text',
        'section' => 'pagoda_press_post_detail_customization_section',
        'label' => esc_html__( 'Related Articles Title', 'pagoda-press' ),
        'active_callback' => function() {
            return get_theme_mod( 'post_detail_hide_show_related_articles', pagoda_press_get_default_post_detail_related_articles() );
        }
    ) );
}