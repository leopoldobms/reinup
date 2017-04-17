<?php
    function powerman_customize_blog_tab($wp_customize, $theme_name){

        $wp_customize->add_section( 'pixtheme_blog_settings' , array(
            'title'      => esc_html__( 'Blog', 'powerman' ),
            'priority'   => 12,
        ) );


        $wp_customize->add_setting( 'pixtheme_blog_settings_readmore' , array(
            'default'     => esc_html__( 'Read more', 'powerman' ),
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_setting( 'pixtheme_blog_settings_footer_nws' , array(
            'default'     => 'off',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );







        $wp_customize->add_control(
            'pixtheme_blog_settings_readmore',
            array(
                'label'    => esc_html__( 'Read More button text', 'powerman' ),
                'section'  => 'pixtheme_blog_settings',
                'settings' => 'pixtheme_blog_settings_readmore',
                'type'     => 'textfield',
                'priority'   => 10
            )
        );


        $wp_customize->add_control(
            'pixtheme_blog_settings_footer_nws',
            array(
                'label'    => esc_html__( 'Display Newsletter Block in footer', 'powerman' ),
                'section'  => 'pixtheme_blog_settings',
                'settings' => 'pixtheme_blog_settings_footer_nws',
                'type'     => 'select',
                'choices'  => array(
                    'off'  => esc_html__( 'Off', 'powerman' ),
                    'on' => esc_html__( 'On', 'powerman' ),
                ),
                'priority'   => 120
            )
        );


    }
?>