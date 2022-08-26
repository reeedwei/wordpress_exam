<?php


add_action( 'customize_register', 'pagoda_press_post_detail_featured_image' );
function pagoda_press_post_detail_featured_image( $wp_customize ) {

	$wp_customize->add_setting( 'post_detail_hide_show_featured_image', array(
        'sanitize_callback'     =>  'pagoda_press_sanitize_checkbox',
        'default'               =>  pagoda_press_get_default_post_detail_featured_image()
    ) );

    $wp_customize->add_control( new Graphthemes_Toggle_Control( $wp_customize, 'post_detail_hide_show_featured_image', array(
        'label' => esc_html__( 'Show/Hide Featured Image','pagoda-press' ),
        'section' => 'pagoda_press_post_detail_customization_section',
        'settings' => 'post_detail_hide_show_featured_image',
        'type'=> 'toggle',
    ) ) );

}


add_action( 'customize_register', 'pagoda_press_post_detail_featured_image_size' );
function pagoda_press_post_detail_featured_image_size( $wp_customize ) {

    $wp_customize->add_setting( 'post_detail_featured_image_size', array(
        'default'     => pagoda_press_get_default_post_detail_featured_image_size(),
        'sanitize_callback' => 'pagoda_press_sanitize_select',
    ) );

    $wp_customize->add_control( 'post_detail_featured_image_size', array(
        'settings'    => 'post_detail_featured_image_size',
        'label'       =>  esc_html__( 'Post Thumbnail Options:', 'pagoda-press' ),
        'section'     => 'pagoda_press_post_detail_customization_section',
        'type'        => 'select',
        'active_callback' => function(){
            return get_theme_mod( 'post_detail_hide_show_featured_image', pagoda_press_get_default_post_detail_featured_image() );
        },
        'choices'     => array(
            'thumbnail' => esc_html__( 'Thumbnail', 'pagoda-press' ),
            'medium' => esc_html__( 'Medium', 'pagoda-press' ),
            'large' => esc_html__( 'Large', 'pagoda-press' ),
            'full' => esc_html__( 'Full / Original', 'pagoda-press' ),
        )
    ) );

}