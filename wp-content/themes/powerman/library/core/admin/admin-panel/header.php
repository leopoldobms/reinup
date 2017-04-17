<?php 
	
	function powerman_customize_header_tab($wp_customize, $theme_name){
	
		$wp_customize->add_section( 'pixtheme_header_settings' , array(
		    'title'      => esc_html__( 'Header', 'powerman' ),
		    'priority'   => 5,
		) );
		
		
		$wp_customize->add_setting( 'pixtheme_header_all_color' , array(
		    'default'     => '#000000',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		
		$wp_customize->add_setting( 'pixtheme_header_settings_email' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'powerman_sanitize_email'
		) );
		
		$wp_customize->add_setting( 'pixtheme_header_settings_phone' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'pixtheme_header_settings_ltext' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'pixtheme_header_settings_btnltext' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'pixtheme_header_settings_btnlurl' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );


		$wp_customize->add_setting( 'pixtheme_header_settings_headerimage' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );
		
		// Social Icons
		$wp_customize->add_setting( 'pixtheme_header_settings_icon1link' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );
		
		$wp_customize->add_setting( 'pixtheme_header_settings_icon2link' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );
		
		$wp_customize->add_setting( 'pixtheme_header_settings_icon3link' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );
		
		$wp_customize->add_setting( 'pixtheme_header_settings_icon4link' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );	
		
		
		$wp_customize->add_setting( 'pixtheme_header_settings_icon1icon' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		
		$wp_customize->add_setting( 'pixtheme_header_settings_icon2icon' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		
		$wp_customize->add_setting( 'pixtheme_header_settings_icon3icon' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		
		$wp_customize->add_setting( 'pixtheme_header_settings_icon4icon' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );	
		
		
		



		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'pixtheme_header_settings_headerimage',
				array(
					'label'      => esc_html__( 'Header Image', 'powerman' ),
					'section'    => 'pixtheme_header_settings',
					'context'    => 'pixtheme_header_settings_headerimage',
					'settings'   => 'pixtheme_header_settings_headerimage',
					'priority'   => 140
				)
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_email', 
			array(
				'label'    => esc_html__( 'Email', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_email',
				'type'     => 'text',				
				'priority'   => 30
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_phone', 
			array(
				'label'    => esc_html__( 'Phone', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_phone',
				'type'     => 'text',				
				'priority'   => 50
			)
		);

		$wp_customize->add_control(
			'pixtheme_header_settings_ltext',
			array(
				'label'    => esc_html__( 'Left Text', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_ltext',
				'type'     => 'text',
				'priority'   => 70
			)
		);

		$wp_customize->add_control(
			'pixtheme_header_settings_btnltext',
			array(
				'label'    => esc_html__( 'Left Button Text', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_btnltext',
				'type'     => 'text',
				'priority'   => 90
			)
		);
		$wp_customize->add_control(
			'pixtheme_header_settings_btnlurl',
			array(
				'label'    => esc_html__( 'Left Button Url', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_btnlurl',
				'type'     => 'text',
				'priority'   => 100
			)
		);
		
		// Social Icons
		
		$wp_customize->add_control(
			'pixtheme_header_settings_icon1link',
			array(
				'label'    => esc_html__( 'Icon #1 Link', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_icon1link',
				'type'     => 'text',
				'priority'   => 100
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_icon1icon',
			array(
				'label'    => esc_html__( 'Icon #1 Icon', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_icon1icon',
				'type'     => 'text',
				'priority'   => 100
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_icon2link',
			array(
				'label'    => esc_html__( 'Icon #2 Link', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_icon2link',
				'type'     => 'text',
				'priority'   => 100
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_icon2icon',
			array(
				'label'    => esc_html__( 'Icon #2 Icon', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_icon2icon',
				'type'     => 'text',
				'priority'   => 100
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_icon3link',
			array(
				'label'    => esc_html__( 'Icon #3 Link', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_icon3link',
				'type'     => 'text',
				'priority'   => 100
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_icon3icon',
			array(
				'label'    => esc_html__( 'Icon #3 Icon', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_icon3icon',
				'type'     => 'text',
				'priority'   => 100
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_icon4link',
			array(
				'label'    => esc_html__( 'Icon #4 Link', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_icon4link',
				'type'     => 'text',
				'priority'   => 100
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_header_settings_icon4icon',
			array(
				'label'    => esc_html__( 'Icon #4 Icon', 'powerman' ),
				'section'  => 'pixtheme_header_settings',
				'settings' => 'pixtheme_header_settings_icon4icon',
				'type'     => 'text',
				'priority'   => 100
			)
		);	

		
	}
		
?>