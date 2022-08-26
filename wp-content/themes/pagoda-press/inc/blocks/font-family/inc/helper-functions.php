<?php


/**
 * Function to check if it's a google font
*/
function pagoda_press_is_google_font( $font ){
    $return = false;
    $websafe_fonts = pagoda_press_get_websafe_font();
    if( $font ){
        if( array_key_exists( $font, $websafe_fonts ) ){
            //Web Safe Font
            $return = false;
        }else{
            //Google Font
            $return = true;
        }
    }
    return $return; 
}



if( ! function_exists( 'pagoda_press_get_websafe_font' ) ) {
    
    /**
     * Function listing WebSafe Fonts and its attributes
    */
    function pagoda_press_get_websafe_font(){
        $standard_fonts = array(
            'georgia-serif' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => 'Georgia, serif',
            ),
            'palatino-serif' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => '"Palatino Linotype", "Book Antiqua", Palatino, serif',
            ),
            'times-serif' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => '"Times New Roman", Times, serif',
            ),
            'arial-helvetica' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => 'Arial, Helvetica, sans-serif',
            ),
            'arial-gadget' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => '"Arial Black", Gadget, sans-serif',
            ),
            'comic-cursive' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => '"Comic Sans MS", cursive, sans-serif',
            ),
            'impact-charcoal'  => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => 'Impact, Charcoal, sans-serif',
            ),
            'lucida' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
            ),
            'tahoma-geneva' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => 'Tahoma, Geneva, sans-serif',
            ),
            'trebuchet-helvetica' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => '"Trebuchet MS", Helvetica, sans-serif',
            ),
            'verdana-geneva'  => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => 'Verdana, Geneva, sans-serif',
            ),
            'courier' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => '"Courier New", Courier, monospace',
            ),
            'lucida-monaco' => array(
                'variants' => array( 'regular', 'italic', '700', '700italic' ),
                'fonts' => '"Lucida Console", Monaco, monospace',
            )
        );
        
        return apply_filters( 'pagoda_press_standard_fonts', $standard_fonts );
    }

}


function pagoda_press_used_google_fonts() {
    $main_font_family = get_theme_mod( 'main_font_family', pagoda_press_get_default_main_font_family() );
    $secondary_font_family = get_theme_mod( 'secondary_font_family', pagoda_press_get_default_secondary_font_family() );
    $site_identity_font_family = esc_attr( get_theme_mod( 'site_identity_font_family', pagoda_press_get_default_site_identity_font_family() ) );

    $args['main_font_family'] = $main_font_family;
    $args['secondary_font_family'] = $secondary_font_family;
    $args['site_identity_font_family'] = $site_identity_font_family;

    return $args;
}



add_action( 'wp_loaded', 'pagoda_press_google_font_local' );
if( ! function_exists( 'pagoda_press_google_font_local' ) ) {
    /**
     * Function that load Google Fonts used in our theme from customer locally.
     * Solves privacy concerns with Google's CDN and their sometimes less-than-transparent policies.
    */
    function pagoda_press_google_font_local() {

        $args = array();
        $fonts = pagoda_press_used_google_fonts();

        foreach( $fonts as $font ) {

            $is_google_font = pagoda_press_is_google_font( $font );

            if( $is_google_font ) {
                array_push( $args, $font );
            }

        }

        new Pagoda_Press_Webfonts_Local( $args );
        
    }
}



if( ! function_exists( 'pagoda_press_fonts_url' ) ) {
    /**
     * Returns Google Fonts Url
    */ 
    function pagoda_press_fonts_url( $fonts = array() ) {

        $fonts_url = "";
        $font_families = array();

        foreach( $fonts as $font ) {
            $is_google_font = pagoda_press_is_google_font( $font );

            if( $is_google_font ) {
                $varient = pagoda_press_check_varient( $font, 'regular', true );

                if( $varient ) {
                    $font_var = ':' . $varient;
                } else {
                    $font_var = '';    
                }
                $font_families[] = $font . $font_var;
            }


        }
            
        $font_families = array_diff( array_unique( $font_families ), array('') );
        
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),            
        );
        
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        return esc_url( $fonts_url );
    }
     
    
}




if( ! function_exists( 'pagoda_press_check_varient' ) ) {
    /**
     * Checks for matched varients in google fonts for typography fields
    */
    function pagoda_press_check_varient( $font_family = 'serif', $font_variants = 'regular', $body = false ){
        $variant = '';
        $var     = array();
        $google_fonts  = pagoda_press_get_google_fonts(); //Google Fonts
        $websafe_fonts = pagoda_press_get_websafe_font(); //Standard Web Safe Fonts
        
        if( array_key_exists( $font_family, $google_fonts ) ){
            $variants = $google_fonts[ $font_family ][ 'variants' ];
            if( in_array( $font_variants, $variants ) ){
                if( $body ){ //LOAD ALL VARIANTS FOR BODY FONT
                    foreach( $variants as $v ){
                        $var[] = $v;
                    }
                    $variant = implode( ',', $var );
                }else{                
                    $variant = $font_variants;
                }
            }else{
                $variant = 'regular';
            }        
        }else{ //Standard Web Safe Fonts
            if( array_key_exists( $font_family, $websafe_fonts ) ){
                $variants = $websafe_fonts[ $font_family ][ 'variants' ];
                if( in_array( $font_variants, $variants ) ){
                    if( $body ){ //LOAD ALL VARIANTS FOR BODY FONT
                        foreach( $variants as $v ){
                            $var[] = $v;
                        }
                        $variant = implode( ',', $var );
                    }else{  
                        $variant = $font_variants;
                    }
                }else{
                    $variant = 'regular';
                }    
            }
        }
        return $variant;
    }
}



if( ! function_exists( 'pagoda_press_get_google_fonts' ) ) {
    /**
     * Get Google Fonts
    */
    function pagoda_press_get_google_fonts(){
        $webfonts_json = @file_get_contents( get_template_directory_uri() . '/inc/blocks/font-family/inc/google-webfonts.json', true );
        $fonts = json_decode( $webfonts_json, true );

        $google_fonts = array();
        
        if ( is_array( $fonts ) ) {
            foreach ( $fonts['items'] as $font ) {
                $google_fonts[ $font['family'] ] = array(
                    'variants' => $font['variants'],
                );
            }
        }    
        return $google_fonts;
    }
}