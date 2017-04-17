<?php 
	
	function powerman_customize_footer_tab($wp_customize, $theme_name){
	
		$args = array(
			'post_type'        => 'staticblocks',
			'post_status'      => 'publish',
		);
		$staticBlocks = array();
		$staticBlocks[] = esc_html__('Select block', 'powerman' );
		$staticBlocksData = get_posts( $args );
		foreach($staticBlocksData as $_block){
			$staticBlocks[$_block->ID] = $_block->post_title;
		}	
	
	
		$wp_customize->add_section( 'pixtheme_footer_settings' , array(
		    'title'      => esc_html__( 'Footer', 'powerman' ),
		    'priority'   => 6,
		) );
		

		
		$wp_customize->add_setting( 'pixtheme_footer_block' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

        $wp_customize->add_setting( 'pixtheme_footer_settings_bblock' , array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_setting( 'pixtheme_footer_settings_show_newsletter' , array(
            'default'     => 'yes',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );


		
		$wp_customize->add_control(
			'pixtheme_footer_block', 
			array(
				'label'        => esc_html__( 'Footer Block', 'powerman' ),
				'section'  => 'pixtheme_footer_settings',
				'settings' => 'pixtheme_footer_block',
				'type'     => 'select',
				'choices'  => $staticBlocks,
				'priority'   => 20
			)
		);


		$wp_customize->add_control(
			'pixtheme_footer_settings_bblock',
			array(
				'label'    => esc_html__( 'Bottom Block', 'powerman' ),
				'section'  => 'pixtheme_footer_settings',
				'settings' => 'pixtheme_footer_settings_bblock',
				'type'     => 'textarea',
				'priority'   => 30
			)
		);

        $wp_customize->add_control(
            'pixtheme_footer_settings_show_newsletter',
            array(
                'label'    => esc_html__( 'Show Newsletter', 'powerman' ),
                'section'  => 'pixtheme_footer_settings',
                'settings' => 'pixtheme_footer_settings_show_newsletter',
                'type'     => 'select',
                'choices'  => array(
                    'yes'  => 'Yes',
                    'no' => 'No',
                ),
                'priority'   => 40
            )
        );




		
	}
		
?>