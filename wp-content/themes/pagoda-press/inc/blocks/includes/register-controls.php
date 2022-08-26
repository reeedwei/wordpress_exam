<?php

add_action( 'customize_register', 'pagoda_press_register_custom_controls' );
function pagoda_press_register_custom_controls( $wp_customize ) {

    require_once PAGODA_PRESS_BLOCKS_DIR_PATH . '/includes/button/class-button-control.php';
    $wp_customize->register_control_type( 'Pagoda_Press_Button_Control' );

    require_once PAGODA_PRESS_BLOCKS_DIR_PATH . '/includes//custom-html/class-custom-html.php';

    require_once PAGODA_PRESS_BLOCKS_DIR_PATH . '/includes/toggle/class-toggle-control.php';
    $wp_customize->register_control_type( 'Graphthemes_Toggle_Control' );

    require_once PAGODA_PRESS_BLOCKS_DIR_PATH . '/includes//multicheck/class-multi-check-control.php';
    $wp_customize->register_control_type( 'Graphthemes_Multi_Check_Control' );

}