<?php 
	
	function powerman_customize_general_tab($wp_customize, $theme_name){
	
		$wp_customize->add_section( 'pixtheme_general_settings' , array(
		    'title'      => esc_html__( 'General Settings', 'powerman' ),
		    'priority'   => 0,
		) );
		
		
		
		$wp_customize->add_setting( 'pixtheme_general_color_theme' , array(
		    'default'     => 'color1',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		
		
		
		
		

		
		
		/* logo image */ 
		
		$wp_customize->add_setting( 'pixtheme_general_settings_logo' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );

		$wp_customize->add_setting( 'pixtheme_general_settings_logo_text' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		
		$wp_customize->add_setting( 'pixtheme_general_settings_favicon' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		) );

		
		
		$wp_customize->add_setting( 'pixtheme_general_settings_loader' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		
		$wp_customize->add_setting( 'pixtheme_general_settings_responsive' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		
		$wp_customize->add_setting( 'pixtheme_general_settings_msidebar' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'pixtheme_general_settings_live_editor' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );		
		
		
		
		$wp_customize->add_control(
	       new WP_Customize_Image_Control(
	           $wp_customize,
	           'pixtheme_general_settings_logo',
		           array(
		               'label'      => esc_html__( 'Logo image', 'powerman' ),
		               'section'    => 'pixtheme_general_settings',
		               'context'    => 'pixtheme_general_settings_logo',
		               'settings'   => 'pixtheme_general_settings_logo',
		               'priority'   => 50
		           )
	       )
	   );
		
	   
	   
	   $wp_customize->add_control(
			'pixtheme_general_settings_logo_text', 
			array(
				'label'    => esc_html__( 'Logo Text', 'powerman' ),
				'section'  => 'pixtheme_general_settings',
				'settings' => 'pixtheme_general_settings_logo_text',
				'type'     => 'text',				
				'priority'   => 70
			)
		);
		

	   /*
	   $wp_customize->add_control( new WP_Customize_Site_Icon_Control( $wp_customize, 'pixtheme_general_settings_favicon', array(
			'label'       => esc_html__( 'Favicon', 'powerman' ),
			'description' => sprintf(
				
				__( 'The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least %s pixels wide and tall.' ),
				'<strong>512</strong>'
			),
			'section'     => 'pixtheme_general_settings',
			'context'    => 'pixtheme_general_settings_favicon',
		   'settings'   => 'pixtheme_general_settings_favicon',
		   'priority'   => 90,
			'height'      => 512,
			'width'       => 512,
		) ) );
*/
	   
	   $wp_customize->add_control(
			'pixtheme_general_settings_loader', 
			array(
				'label'    => esc_html__( 'Loader', 'powerman' ),
				'section'  => 'pixtheme_general_settings',
				'settings' => 'pixtheme_general_settings_loader',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__('off', 'powerman' ),
					'usemain' => esc_html__('Use on main', 'powerman' ),
					'useall' => esc_html__('Use on all pages', 'powerman' ),
				),
				'priority'   => 110
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_general_settings_responsive', 
			array(
				'label'    => esc_html__( 'Responsive', 'powerman' ),
				'section'  => 'pixtheme_general_settings',
				'settings' => 'pixtheme_general_settings_responsive',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__('Off', 'powerman' ),
					'on' => esc_html__('On', 'powerman' ),
				),
				'priority'   => 120
			)
		);
		
		$wp_customize->add_control(
			'pixtheme_general_settings_live_editor',
			array(
				'label'    => esc_html__( 'Front Editor Button', 'powerman' ),
				'description' => esc_html__( 'Show button for Visual CSS Style Editor', 'powerman' ),
				'section'  => 'pixtheme_general_settings',
				'settings' => 'pixtheme_general_settings_live_editor',
				'type'     => 'select',
				'choices'  => array(
					'off'    => esc_html__( 'Off', 'powerman' ),
					'on'    => esc_html__( 'On', 'powerman' ),
				),
				'priority'   => 130
			)
		);


		
		
	}
	
	