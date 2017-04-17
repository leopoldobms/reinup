<?php
	
	function powerman_customize_shop_tab($wp_customize, $theme_name){
	
		$wp_customize->add_section( 'pixtheme_shop_settings' , array(
		    'title'      => esc_html__( 'Shop', 'powerman' ),
		    'priority'   => 10,
		) );
		

		$wp_customize->add_setting( 'pixtheme_shop_settings_quickview' , array(
		    'default'     => 'on',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'pixtheme_shop_settings_sku' , array(
			'default'     => 'on',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'pixtheme_shop_settings_categories' , array(
			'default'     => 'on',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'pixtheme_shop_settings_brands' , array(
			'default'     => 'on',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

        $wp_customize->add_setting( 'pixtheme_shop_settings_tags' , array(
            'default'     => 'on',
            'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_setting( 'pixtheme_shop_settings_share' , array(
            'default'     => 'on',
            'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
        ) );

		$wp_customize->add_setting( 'pixtheme_shop_settings_thumbs' , array(
			'default'     => 'on',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'pixtheme_shop_settings_zoom' , array(
			'default'     => 'pretty',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );



        $wp_customize->add_setting( 'pixtheme_shop_settings_gl' , array(
            'default'     => 'grid',
            'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
        ) );



		$wp_customize->add_control(
			'pixtheme_shop_settings_quickview',
			array(
				'label'    => esc_html__( 'Enable QuickView', 'powerman' ),
				'section'  => 'pixtheme_shop_settings',
				'settings' => 'pixtheme_shop_settings_quickview',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__('Off', 'powerman' ),
					'on' => esc_html__('On', 'powerman' ),
				),
			)
		);

		$wp_customize->add_control(
			'pixtheme_shop_settings_sku',
			array(
				'label'    => esc_html__( 'Show Sku on Product Page', 'powerman' ),
				'section'  => 'pixtheme_shop_settings',
				'settings' => 'pixtheme_shop_settings_sku',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__('Off', 'powerman' ),
					'on' => esc_html__('On', 'powerman' ),
				),
			)
		);

		$wp_customize->add_control(
			'pixtheme_shop_settings_categories',
			array(
				'label'    => esc_html__( 'Show Categories on Product Page', 'powerman' ),
				'section'  => 'pixtheme_shop_settings',
				'settings' => 'pixtheme_shop_settings_categories',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__('Off', 'powerman' ),
					'on' => esc_html__('On', 'powerman' ),
				),
			)
		);

        $wp_customize->add_control(
            'pixtheme_shop_settings_tags',
            array(
                'label'    => esc_html__( 'Show Tags on Product Page', 'powerman' ),
                'section'  => 'pixtheme_shop_settings',
                'settings' => 'pixtheme_shop_settings_tags',
                'type'     => 'select',
                'choices'  => array(
					'off'  => esc_html__('Off', 'powerman' ),
					'on' => esc_html__('On', 'powerman' ),
                ),
            )
        );

		$wp_customize->add_control(
			'pixtheme_shop_settings_brands',
			array(
				'label'    => esc_html__( 'Show Brands on Product Page', 'powerman' ),
				'section'  => 'pixtheme_shop_settings',
				'settings' => 'pixtheme_shop_settings_brands',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__('Off', 'powerman' ),
					'on' => esc_html__('On', 'powerman' ),
				),
			)
		);

        $wp_customize->add_control(
            'pixtheme_shop_settings_share',
            array(
                'label'    => esc_html__( 'Show Share on Product Page', 'powerman' ),
                'section'  => 'pixtheme_shop_settings',
                'settings' => 'pixtheme_shop_settings_share',
                'type'     => 'select',
                'choices'  => array(
					'off'  => esc_html__('Off', 'powerman' ),
					'on' => esc_html__('On', 'powerman' ),
                ),
            )
        );

		$wp_customize->add_control(
			'pixtheme_shop_settings_thumbs',
			array(
				'label'    => esc_html__( 'Show Thumbnail on Product Page ( Gallery ) ', 'powerman' ),
				'section'  => 'pixtheme_shop_settings',
				'settings' => 'pixtheme_shop_settings_thumbs',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__('Off', 'powerman' ),
					'on' => esc_html__('On', 'powerman' ),
				),
			)
		);


        $wp_customize->add_control(
            'pixtheme_shop_settings_gl',
            array(
                'label'    => esc_html__( 'Default Category Listing', 'powerman' ),
                'section'  => 'pixtheme_shop_settings',
                'settings' => 'pixtheme_shop_settings_gl',
                'type'     => 'select',
                'choices'  => array(
                    'grid'  => esc_html__( 'Grid', 'powerman' ),
                    'list' => esc_html__( 'List', 'powerman' ),
                ),
            )
        );


		$wp_customize->add_control(
			'pixtheme_shop_settings_zoom',
			array(
				'label'    => esc_html__( 'Default Product Zoom', 'powerman' ),
				'section'  => 'pixtheme_shop_settings',
				'settings' => 'pixtheme_shop_settings_zoom',
				'type'     => 'select',
				'choices'  => array(
					'pretty'  => esc_html__('Pretty Photo', 'powerman' ),
					'cloud' => esc_html__('Cloud Zoom', 'powerman' ),
				),
			)
		);








		
				
	}
?>