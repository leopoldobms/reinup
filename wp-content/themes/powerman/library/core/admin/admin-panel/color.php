<?php
function powerman_customize_color_tab($wp_customize, $theme_name){

    $wp_customize->add_section( 'pixtheme_color_settings' , array(
        'title'      => esc_html__( 'Color', 'powerman' ),
        'priority'   => 14,
    ) );

    $wp_customize->add_setting( 'pixtheme_color_first_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_setting( 'pixtheme_color_second_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_setting( 'pixtheme_color_header_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_setting( 'pixtheme_color_footer_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_setting( 'pixtheme_color_title_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );


    $wp_customize->add_setting( 'pixtheme_color_buttons_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_setting( 'pixtheme_color_menu_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_setting( 'pixtheme_color_prefooter_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );





    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixtheme_color_first_color', array(
        'label'        => esc_html__( 'Global Color', 'powerman' ),
        'section'    => 'pixtheme_color_settings',
        'settings'   => 'pixtheme_color_first_color',
    ) ) );












}

?>