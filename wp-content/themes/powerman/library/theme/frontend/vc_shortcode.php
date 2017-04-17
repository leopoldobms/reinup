<?php 
	add_action( 'init', 'powerman_integrateWithVC', 200 );

/**
 * @return bool
 */
function powerman_integrateWithVC() {
	
	
		
		if (!function_exists('vc_map'))
			return FALSE;
			
		global $theme_name;


		$theme_name = 'powerman';

		$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0');
		$categories = get_categories($args);
		$cats = array();
		$i = 0;


		foreach($categories as $category){
			if ($category && is_object($category)){
				if($i==0){
					$default = $category->slug;
					$i++;
				}
				$cats[$category->name] = $category->term_id;
			}

		}

        $args = array(
            'post_type'        => 'staticblocks',
            'post_status'      => 'publish',
        );
        $staticBlocks = array();
        $staticBlocksData = get_posts( $args );
        foreach($staticBlocksData as $_block){
            $staticBlocks[$_block->post_title] =  $_block->ID;
        }

        $forms = array();
        if (class_exists('WPCF7_ContactForm')){
            $formsCollection = WPCF7_ContactForm::find();
            foreach($formsCollection as $_form){
                $forms[$_form->title()] = $_form->id();
            }
        }


    /** Fonts Icon Loader */

		$vc_icons_data = powerman_init_vc_icons();



		$add_css_animation = array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'CSS Animation', 'powerman' ),
			'param_name' => 'css_animation',
			'admin_label' => true,
			'value' => array(
			esc_html__( 'No', 'powerman' ) => '',
			esc_html__( 'bounce', 'powerman' ) => 'bounce',
			esc_html__( 'flash', 'powerman' ) => 'flash',
			esc_html__( 'pulse', 'powerman' ) => 'pulse',
			esc_html__( 'rubberBand', 'powerman' ) => 'rubberBand',
			esc_html__( 'shake', 'powerman' ) => 'shake',
			esc_html__( 'swing', 'powerman' ) => 'swing',
			esc_html__( 'tada', 'powerman' ) => 'tada',
			esc_html__( 'wobble', 'powerman' ) => 'wobble',
			esc_html__( 'jello', 'powerman' ) => 'jello',
			
			esc_html__( 'bounceIn', 'powerman' ) => 'bounceIn',
			esc_html__( 'bounceInDown', 'powerman' ) => 'bounceInDown',
			esc_html__( 'bounceInLeft', 'powerman' ) => 'bounceInLeft',
			esc_html__( 'bounceInRight', 'powerman' ) => 'bounceInRight',
			esc_html__( 'bounceInUp', 'powerman' ) => 'bounceInUp',
			esc_html__( 'bounceOut', 'powerman' ) => 'bounceOut',
			esc_html__( 'bounceOutDown', 'powerman' ) => 'bounceOutDown',
			esc_html__( 'bounceOutLeft', 'powerman' ) => 'bounceOutLeft',
			esc_html__( 'bounceOutRight', 'powerman' ) => 'bounceOutRight',
			esc_html__( 'bounceOutUp', 'powerman' ) => 'bounceOutUp',
			
			esc_html__( 'fadeIn', 'powerman' ) => 'fadeIn',
			esc_html__( 'fadeInDown', 'powerman' ) => 'fadeInDown',
			esc_html__( 'fadeInDownBig', 'powerman' ) => 'fadeInDownBig',
			esc_html__( 'fadeInLeft', 'powerman' ) => 'fadeInLeft',
			esc_html__( 'fadeInLeftBig', 'powerman' ) => 'fadeInLeftBig',
			esc_html__( 'fadeInRight', 'powerman' ) => 'fadeInRight',
			esc_html__( 'fadeInRightBig', 'powerman' ) => 'fadeInRightBig',
			esc_html__( 'fadeInUp', 'powerman' ) => 'fadeInUp',
			esc_html__( 'fadeInUpBig', 'powerman' ) => 'fadeInUpBig',			
			esc_html__( 'fadeOut', 'powerman' ) => 'fadeOut',
			esc_html__( 'fadeOutDown', 'powerman' ) => 'fadeOutDown',
			esc_html__( 'fadeOutDownBig', 'powerman' ) => 'fadeOutDownBig',
			esc_html__( 'fadeOutLeft', 'powerman' ) => 'fadeOutLeft',
			esc_html__( 'fadeOutLeftBig', 'powerman' ) => 'fadeOutLeftBig',
			esc_html__( 'fadeOutRight', 'powerman' ) => 'fadeOutRight',
			esc_html__( 'fadeOutRightBig', 'powerman' ) => 'fadeOutRightBig',
			esc_html__( 'fadeOutUp', 'powerman' ) => 'fadeOutUp',
			esc_html__( 'fadeOutUpBig', 'powerman' ) => 'fadeOutUpBig',
			
			esc_html__( 'flip', 'powerman' ) => 'flip',
			esc_html__( 'flipInX', 'powerman' ) => 'flipInX',
			esc_html__( 'flipInY', 'powerman' ) => 'flipInY',
			esc_html__( 'flipOutX', 'powerman' ) => 'flipOutX',
			esc_html__( 'flipOutY', 'powerman' ) => 'flipOutY',
			
			esc_html__( 'lightSpeedIn', 'powerman' ) => 'lightSpeedIn',
			esc_html__( 'lightSpeedOut', 'powerman' ) => 'lightSpeedOut',
			
			esc_html__( 'rotateIn', 'powerman' ) => 'rotateIn',
			esc_html__( 'rotateInDownLeft', 'powerman' ) => 'rotateInDownLeft',
			esc_html__( 'rotateInDownRight', 'powerman' ) => 'rotateInDownRight',
			esc_html__( 'rotateInUpLeft', 'powerman' ) => 'rotateInUpLeft',
			esc_html__( 'rotateInUpRight', 'powerman' ) => 'rotateInUpRight',			
			esc_html__( 'rotateOut', 'powerman' ) => 'rotateOut',
			esc_html__( 'rotateOutDownLeft', 'powerman' ) => 'rotateOutDownLeft',
			esc_html__( 'rotateOutDownRight', 'powerman' ) => 'rotateOutDownRight',
			esc_html__( 'rotateOutUpLeft', 'powerman' ) => 'rotateOutUpLeft',
			esc_html__( 'rotateOutUpRight', 'powerman' ) => 'rotateOutUpRight',
			
			esc_html__( 'slideInUp', 'powerman' ) => 'slideInUp',
			esc_html__( 'slideInDown', 'powerman' ) => 'slideInDown',
			esc_html__( 'slideInLeft', 'powerman' ) => 'slideInLeft',
			esc_html__( 'slideInRight', 'powerman' ) => 'slideInRight',
			esc_html__( 'slideOutUp', 'powerman' ) => 'slideOutUp',			
			esc_html__( 'slideOutDown', 'powerman' ) => 'slideOutDown',
			esc_html__( 'slideOutLeft', 'powerman' ) => 'slideOutLeft',
			esc_html__( 'slideOutRight', 'powerman' ) => 'slideOutRight',
			
			esc_html__( 'zoomIn', 'powerman' ) => 'zoomIn',
			esc_html__( 'zoomInDown', 'powerman' ) => 'zoomInDown',
			esc_html__( 'zoomInLeft', 'powerman' ) => 'zoomInLeft',
			esc_html__( 'zoomInRight', 'powerman' ) => 'zoomInRight',
			esc_html__( 'zoomInUp', 'powerman' ) => 'zoomInUp',			
			esc_html__( 'zoomOut', 'powerman' ) => 'zoomOut',
			esc_html__( 'zoomOutDown', 'powerman' ) => 'zoomOutDown',
			esc_html__( 'zoomOutLeft', 'powerman' ) => 'zoomOutLeft',
			esc_html__( 'zoomOutRight', 'powerman' ) => 'zoomOutRight',
			esc_html__( 'zoomOutUp', 'powerman' ) => 'zoomOutUp',
			
			esc_html__( 'hinge', 'powerman' ) => 'hinge',			
			esc_html__( 'rollIn', 'powerman' ) => 'rollIn',
			esc_html__( 'rollOut', 'powerman' ) => 'rollOut',
			
		),
			'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'powerman' )
		);	
		
	
		/** Additional Row Settings */
		
		$attributes1 = array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__("Use Section Anchor", 'powerman' ),
				'param_name' => 'panchor',
				'value' => array(
					esc_html__("No", 'powerman' ) ,
						esc_html__("Yes", 'powerman' )
				),
				'description' => esc_html__( "Need Row ID. ", 'powerman' )
			),
			/*array(
				'type' => 'dropdown',
				'heading' => esc_html__("Carousel Type", 'powerman' ),
				'param_name' => 'carousel_type',
				'value' => array(
					esc_html__("None", 'powerman' ) ,
						esc_html__("Bottom", 'powerman' ),
							esc_html__("Top", 'powerman' )
				),
				'description' => esc_html__( "Carousel Type. ", 'powerman' )
			),*/

		);
			
		$attributes2 = array(

			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Overflow', 'powerman' ),
				'param_name' => 'pixoverflow',
				'value' => array(
					esc_html__( "Yes", 'powerman' ) => '',
					esc_html__( "No", 'powerman' ) => 'vc-overflow-no',

				),
				'description' => esc_html__( 'Yes / No', 'powerman' ),
				'group' => esc_html__( 'Row Options', 'powerman' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Overlay', 'powerman' ),
				'param_name' => 'pixoverlay',
				'value' => array(
					esc_html__( "No", 'powerman' ) => '',
					esc_html__( "Yes", 'powerman' ) => 'vc_row-overlay',

				),
				'description' => esc_html__( 'Yes / No', 'powerman' ),
				'group' => esc_html__( 'Row Options', 'powerman' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Overlay Opacity', 'powerman' ),
				'param_name' => 'pixoverlayopacity',
				'value' => "0.1",
				'description' => esc_html__( 'Values 0.1 - 0.9', 'powerman' ),
				'group' => esc_html__( 'Row Options', 'powerman' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( "Text Color", 'powerman' ),
				'param_name' => 'ptextcolor',
				'value' => array(
                    esc_html__( "Default", 'powerman' ),
                        esc_html__( "White", 'powerman' ),
                            esc_html__( "Black", 'powerman' )
				     ),
				'description' => esc_html__( "Text Color", 'powerman' ),
				'group' => esc_html__( 'Row Options', 'powerman' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( "Scroll Reveal", 'powerman' ),
				'param_name' => 'pscrollreveal',
				'value' => array(
					esc_html__( "No", 'powerman' ),
					esc_html__( "Yes", 'powerman' )
				),
				'description' => esc_html__( "Scroll Reveal", 'powerman' ),
				'group' => esc_html__( 'Row Options', 'powerman' ),
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__( "Border", 'powerman' ),
				'param_name' => 'bordertype',
				'value' => array(
					esc_html__( "None", 'powerman' ),
					esc_html__( "Top", 'powerman' ),
					esc_html__( "Bottom", 'powerman' )
				),
				'description' => esc_html__( "Border type", 'powerman' ),
				'group' => esc_html__( 'Row Options', 'powerman' ),
			)


			

	      
		);
		if(!function_exists('fil_init')){
			$attributes = array_merge($attributes1, $attributes2);
		}else{
			$attributes = array_merge($attributes1, powerman_get_vc_icons($vc_icons_data), $attributes2);
		}


		vc_add_params( 'vc_row', $attributes );


        $icon_attributes = array(
            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Content", 'powerman' ),
                "param_name" => "content",
                "value" => esc_html__( "", 'powerman' ),
                "description" => esc_html__( "", 'powerman' )
            ),
        );

        vc_add_params( 'vc_icon', $icon_attributes );
		
		
		/** Woocommerce products carousel */ 
		
		$attributes = array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Use Carousel', 'powerman' ),
				'param_name' => 'use_carousel',
				'value' => array(
					esc_html__( "no", 'powerman' ) => esc_html__( 'No', 'powerman' ),
					esc_html__( "yes", 'powerman' ) => esc_html__( 'Yes', 'powerman' ),
				),
				'description' => esc_html__( 'Use carousel? ', 'powerman' ),
			),
            /*array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Carousel Type', 'powerman' ),
                'param_name' => 'carousel_type',
                'value' => array(
                    'Bottom', 'Top', 'Hide',
                ),
                'description' => esc_html__( 'Select Carousel Type ', 'powerman' )
            ),*/
		);

		
		@vc_add_params( 'featured_products', $attributes );
		@vc_add_params( 'products', $attributes );
		@vc_add_params( 'sale_products', $attributes );
		@vc_add_params( 'recent_products', $attributes );		
		@vc_add_params( 'best_selling_products', $attributes );
		@vc_add_params( 'top_rated_products', $attributes );
		@vc_add_params( 'product_category', $attributes );



		vc_map(
			array(
				"name" => esc_html__( "Title Block", 'powerman' ),
				"base" => "block_title",
				"class" => "pix-theme-icon",
				"category" => esc_html__( 'powerman' , 'powerman'),
				"params" => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Position Type', 'powerman' ),
                        'param_name' => 'title_position',
                        'value' => array(
                            esc_html__( 'Left', 'powerman' ) => 'left',
                            esc_html__( 'Middle', 'powerman' ) => 'middle',
                            esc_html__( 'Right', 'powerman' ) => 'right',
                        ),
                        'description' => '',
                    ),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Title", 'powerman' ),
						"param_name" => "title",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Title param.", 'powerman' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Contain Colored Text?', 'powerman' ),
						'param_name' => 'iscolored',
						'value' => array(
							esc_html__( 'No', 'powerman' ) => 'no',
							esc_html__( 'Yes', 'powerman' ) => 'yes',
						),
						'description' => '',
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__( 'Colored Text', 'powerman' ),
						'param_name' => 'ctext',
						'value' => esc_html__( '', 'powerman' ),
						'description' => esc_html__( 'Colored Text in Title', 'powerman' ),
						'dependency' => array(
							'element' => 'iscolored',
							'value' => 'yes',
						)
					),
					array(
						'type' => 'colorpicker',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__( 'Color', 'powerman' ),
						'param_name' => 'ctext_color',
						'value' => esc_html__( '', 'powerman' ),
						'description' => esc_html__( 'Colored  in Title', 'powerman' ),
						'dependency' => array(
							'element' => 'iscolored',
							'value' => 'yes',
						)
					),

					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Sub-title", 'powerman' ),
						"param_name" => "subtitle",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Sub-title param.", 'powerman' )
					),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Sub-title Position', 'powerman' ),
                        'param_name' => 'subtitle_position',
                        'value' => array(
                            esc_html__( 'Top', 'powerman' ) => 'top',
                            esc_html__( 'Bottom', 'powerman' ) => 'bottom',
                        ),
                        'description' => '',
                    ),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Ticker Text", 'powerman' ),
						"param_name" => "tickertext",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Ticker Text param.", 'powerman' )
					),
					array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Text shuffle', 'powerman' ),
					'param_name' => 'text_shuffle',
					'value' => array(
						esc_html__( 'No', 'powerman' ) => '',
						esc_html__( 'Yes', 'powerman' ) => 'shuffle',
					),
					'description' => '',
				),


					array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Content", 'powerman' ),
						"param_name" => "content",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "", 'powerman' )
					),

					$add_css_animation
				)
			)
		);


        vc_map(
            array(
                "name" => esc_html__( "Title Box", 'powerman' ),
                "base" => "box_title",
                "class" => "pix-theme-icon",
                "category" => esc_html__( 'powerman' , 'powerman'),
                "params" => array(

                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Title", 'powerman' ),
                        "param_name" => "title",
                        "value" => esc_html__( "", 'powerman' ),
                        "description" => esc_html__( "Title param.", 'powerman' )
                    ),

                    array(
                        "type" => "textarea_html",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Content", 'powerman' ),
                        "param_name" => "content",
                        "value" => esc_html__( "", 'powerman' ),
                        "description" => esc_html__( "", 'powerman' )
                    ),

                    $add_css_animation
                )
            )
        );


		powerman_vc_map(
			array(
				'name' => esc_html__( 'List Block', 'powerman' ),
				'base' => 'block_list',
				"class" => "pix-theme-icon",
				'as_parent' => array('only' => 'block_list_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element' => true,
				'show_settings_on_create' => false,
				'category' => esc_html__( 'powerman', 'powerman'),
				'params' => array(

					array(
						'type' => 'attach_image',
						'heading' => esc_html__( 'Image', 'powerman' ),
						'param_name' => 'image',
						'value' => '',
						'description' => esc_html__( 'Image', 'powerman' )
					),

                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Use Accordion', 'powerman' ),
                        'param_name' => 'use_accordion',
                        'value' => array(
                            esc_html__( "no", 'powerman' ) => esc_html__( 'No', 'powerman' ),
                            esc_html__( "yes", 'powerman' ) => esc_html__( 'Yes', 'powerman' ),
                        ),
                        'description' => esc_html__( 'Use accordion? ', 'powerman' ),
                    )
				),
				'js_view' => 'VcColumnView',

			),
			$add_css_animation,
			powerman_get_vc_icons($vc_icons_data)
		);



		powerman_vc_map(
            array(
                'name' => esc_html__( 'List Item', 'powerman' ),
                'base' => 'block_list_item',
                "class" => "pix-theme-icon",
                'as_child' => array('only' => 'block_list'),
                'content_element' => true,
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'powerman' ),
                        'param_name' => 'title',
                        'description' => esc_html__( 'Item Title.', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Link', 'powerman' ),
                        'param_name' => 'link',
                        'description' => esc_html__( 'Item Link.', 'powerman' )
                    ),

                    array(
                        "type" => "textarea_html",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Description", 'powerman' ),
                        "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                        "value" => esc_html__( "<p>I am test text block. Click edit button to change this text.</p>", 'powerman' ),
                        "description" => esc_html__( "Enter your full description.", 'powerman' )
                    ),
                )
            ),
            $add_css_animation ,
            powerman_get_vc_icons($vc_icons_data)
        );


		vc_map(
			array(
				'name' => esc_html__( 'Banner', 'powerman' ),
				'base' => 'section_banner',
				'class' => 'pix-theme-icon',
				'category' => esc_html__( 'powerman', 'powerman'),
				'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Type', 'powerman' ),
						'param_name' => 'buttype',
						'value' => array(
							esc_html__( 'Type #1', 'powerman' ) => 'type1',
							esc_html__( 'Type #2', 'powerman' ) => 'type2'
						),
						'description' => '',
					),


					/** One Button Type */

					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__( 'Title', 'powerman' ),
						'param_name' => 'title',
						'value' => esc_html__( 'Title', 'powerman' ),
						'description' => esc_html__( 'Title', 'powerman' ),

					),

                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'heading' => esc_html__( 'Sub-Title', 'powerman' ),
                        'param_name' => 'subtitle',
                        'value' => esc_html__( 'Sub-Title', 'powerman' ),
                        'description' => esc_html__( 'Sub Title', 'powerman' ),

                    ),

					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__( 'Title Colored Text', 'powerman' ),
						'param_name' => 'titlecolor',
						'value' => esc_html__( '+33 (800) 12345', 'powerman' ),
						'description' => esc_html__( 'Title Colored Text', 'powerman' ),

					),



					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__( 'Button Title', 'powerman' ),
						'param_name' => 'button_title',
						'value' => esc_html__( 'View Collection', 'powerman' ),
						'description' => esc_html__( 'Button Title', 'powerman' )
					),

					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__( 'Button Link', 'powerman' ),
						'param_name' => 'button_link',
						'value' => esc_html__( 'http://templines.com/', 'powerman' ),
						'description' => esc_html__( 'Button Link', 'powerman' ),
					),

                    $add_css_animation,

				)
			)
		);


        vc_map(
            array(
                "name" => esc_html__( 'Services Block', 'powerman' ),
                "base" => 'block_services',
                "class" => 'pix-theme-icon',
                'category' => esc_html__( 'powerman', 'powerman' ),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Image and Description Position', 'powerman' ),
                        'param_name' => 'view_tool',
                        'value' => array(
                            esc_html__('Image->Description', 'powerman') => 0,
                            esc_html__('Description->Image', 'powerman') => 1,
                        ),
                        'description' => esc_html__( 'Image->Description or Description->Image', 'powerman' )
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'powerman' ),
                        'param_name' => 'tool_image',
                        'description' => esc_html__( 'Select image.', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'powerman' ),
                        'param_name' => 'tool_title',
                        'description' => esc_html__( 'Title info.', 'powerman' )
                    ),
                    $add_css_animation,
                    array(
                        "type" => "textarea_html",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Info", 'powerman' ),
                        "param_name" => "content",
                        "value" => wp_kses_post(esc_html__( "<p>I am test text block. Click edit button to change this text.</p>", 'powerman' ) ),
                        "description" => esc_html__( "Enter information.", 'powerman' )
                    ),
                )
            )
        );

        powerman_vc_map(
            array(
                'name' => esc_html__( 'Custom Services', 'powerman' ),
                'base' => 'box_icon',
                "class" => "pix-theme-icon",
                'category' => esc_html__( 'powerman', 'powerman' ),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Type', 'powerman' ),
                        'param_name' => 'boxtype',
                        'value' => array( 
                            esc_html__( 'Service', 'powerman' ) => 'type1',
                            esc_html__( 'Department', 'powerman' ) => 'type2',
							esc_html__( 'Simple', 'powerman' ) => 'type3'
                        ),
                        'description' => '',
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'powerman' ),
                        'param_name' => 'image',
                        'description' => esc_html__( 'Image.', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'powerman' ),
                        'param_name' => 'title',
                        'description' => esc_html__( 'Title', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Url', 'powerman' ),
                        'param_name' => 'url',
                        'description' => esc_html__( 'Enter text which will be used as caurusel title. Leave blank if no title is needed.', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Short Description', 'powerman' ),
                        'param_name' => 'short_description',
                        'description' => esc_html__( 'Enter text which will be used as caurusel title. Leave blank if no title is needed.', 'powerman' )
                    ),

                )
            ),
            $add_css_animation,
            powerman_get_vc_icons($vc_icons_data)

        );

        powerman_vc_map(
            array(
                "name" => esc_html__( "Amount Box", 'powerman' ),
                "base" => "box_amount",
                "class" => "pix-theme-icon",
                "category" => esc_html__( 'powerman', 'powerman'),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Title", 'powerman' ),
                        "param_name" => "title",
                        "value" => esc_html__( "Project", 'powerman' ),
                        "description" => esc_html__( "Title.", 'powerman' )
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Amount", 'powerman' ),
                        "param_name" => "amount",
                        "value" => esc_html__( "999", 'powerman' ),
                        "description" => esc_html__( "Amount.", 'powerman' )
                    )

                )
            ),
            false,
            powerman_get_vc_icons($vc_icons_data)
        );


        vc_map(
            array(
                "name" => esc_html__( "Portfolio", 'powerman' ),
                "base" => "section_portfolio",
                "class" => "pix-theme-icon",
                "category" => esc_html__( 'powerman', 'powerman'),
                "params" => array(

                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'Categories', 'powerman' ),
                        'param_name' => 'cats',
                        'value' => $cats,
                        'description' => esc_html__( 'Select categories to show', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Items Count', 'powerman' ),
                        'param_name' => 'count',
                        'description' => esc_html__( 'Select number images for portfolio.', 'powerman' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Columns Number', 'powerman' ),
                        'param_name' => 'perrow',
                        'value' => array(
                            esc_html__( "2 Columns", 'powerman' ) => '2',
                            esc_html__( "3 Columns", 'powerman' ) => '3',
                            esc_html__( "4 Columns", 'powerman' ) => '4',
                            esc_html__( "Tiles", 'powerman' ) => 'default',
                        ),
                        'description' => '',
                    ),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Filter Position', 'powerman' ),
						'param_name' => 'fposition',
						'value' => array(
							esc_html__( "Left", 'powerman' ) => 'left',
							esc_html__( "Center", 'powerman' ) => 'center',
							esc_html__( "Right", 'powerman' ) => 'right',
						),
						'description' => '',
					),

                    $add_css_animation,
                )
            )
        );



        powerman_vc_map(
            array(
                'name' => esc_html__( 'Block Staff', 'powerman' ),
                'base' => 'block_staff',
                "class" => "pix-theme-icon",
                'as_parent' => array('only' => 'block_staff_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
                'content_element' => true,
                'show_settings_on_create' => false,
                'category' => esc_html__( 'powerman', 'powerman'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Heading', 'powerman' ),
                        'param_name' => 'heading',
                        'description' => esc_html__( 'Enter text which will be used as caurusel title. Leave blank if no title is needed.', 'powerman' )
                    ),

                ),
                'js_view' => 'VcColumnView',

            ),
            $add_css_animation,
            powerman_get_vc_icons($vc_icons_data)
        );
        vc_map( array(
            'name' => esc_html__( 'Staff Member', 'powerman' ),
            'base' => 'block_staff_item',
            "class" => "pix-theme-icon",
            'as_child' => array('only' => 'block_staff'),
            'content_element' => true,
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Avatar', 'powerman' ),
                    'param_name' => 'avatar',
                    'description' => esc_html__( 'Accordion section title.', 'powerman' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Name', 'powerman' ),
                    'param_name' => 'name',
                    'description' => esc_html__( 'Accordion section title.', 'powerman' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Position', 'powerman' ),
                    'param_name' => 'postition',
                    'description' => esc_html__( 'Accordion section title.', 'powerman' )
                ),

            )
        ) );


        powerman_vc_map(
            array(
                'name' => esc_html__( 'Block Reviews', 'powerman' ),
                'base' => 'block_reviews',
                "class" => "pix-theme-icon",
                'as_parent' => array('only' => 'block_reviews_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
                'content_element' => true,
                'show_settings_on_create' => false,
                'category' => esc_html__( 'powerman', 'powerman'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Carousel title', 'powerman' ),
                        'param_name' => 'title',
                        'description' => esc_html__( 'Enter text which will be used as caurusel title. Leave blank if no title is needed.', 'powerman' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Type', 'powerman' ),
                        'param_name' => 'c_type',
                        'value' => array(
                            esc_html__("Type #1", 'powerman' ) => 'type1' ,
                            esc_html__("Type #2", 'powerman' ) => 'type2'
                        ),
                        'description' => esc_html__( 'Select reviews display type', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Max reviews', 'powerman' ),
                        'param_name' => 'max_reviews',
                        'description' => esc_html__( 'Max reviews', 'powerman' )
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'Auto Slides', 'powerman' ),
                        'param_name' => 'auto_slides',
                        'description' => esc_html__( 'Auto Slides', 'powerman' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Enable Carousel', 'powerman' ),
                        'param_name' => 'is_carousel',
                        'value' => array(esc_html__( "Yes", 'powerman' ) , esc_html__( "No", 'powerman' )),
                        'description' => esc_html__( 'Select reviews display type', 'powerman' )
                    )

                ),
                'js_view' => 'VcColumnView',

            ),
            $add_css_animation,
            powerman_get_vc_icons($vc_icons_data)
        );
        vc_map( array(
            'name' => esc_html__( 'Review', 'powerman' ),
            'base' => 'block_reviews_item',
            "class" => "pix-theme-icon",
            'as_child' => array('only' => 'block_reviews'),
            'content_element' => true,
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Avatar', 'powerman' ),
                    'param_name' => 'avatar',
                    'description' => esc_html__( 'Accordion section title.', 'powerman' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Name', 'powerman' ),
                    'param_name' => 'name',
                    'description' => esc_html__( 'Accordion section title.', 'powerman' )
                ),
                array(
                    "type" => "textarea_html",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__( "Review Text", 'powerman' ),
                    "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                    "value" => esc_html__( "<p>I am test text block. Click edit button to change this text.</p>", 'powerman' ),
                    "description" => esc_html__( "Enter your full description.", 'powerman' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Position', 'powerman' ),
                    'param_name' => 'postition',
                    'description' => esc_html__( 'Accordion section title.', 'powerman' )
                ),

            )
        ) );



		vc_map(
			array(
				"name" => esc_html__( "3Box ", 'powerman' ),
				"base" => "threebox",
				"class" => "pix-theme-icon",
				"category" => esc_html__( 'powerman' , 'powerman'),
				"params" => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Type', 'powerman' ),
                        'param_name' => 'block_type',
                        'description' => esc_html__( 'Block type.', 'powerman' ),
                        'value' => array(
                            esc_html__( 'Vertical', 'powerman' ) => '',
                            esc_html__( 'Horizontal', 'powerman' ) => 'hor',
                        ),
                        'admin_label' => true,
                    ),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Title #1", 'powerman' ),
						"param_name" => "title1",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Title param.", 'powerman' )
					),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Icon #1", 'powerman' ),
						"param_name" => "icon1",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Example: icon-support ", 'powerman' )
					),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Content #1", 'powerman' ),
                        "param_name" => "content1",
                        "value" => esc_html__( "", 'powerman' ),
                        "description" => esc_html__( "Content param.", 'powerman' )
                    ),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Title #2", 'powerman' ),
						"param_name" => "title2",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Title param.", 'powerman' )
					),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Icon #2", 'powerman' ),
						"param_name" => "icon2",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Example: icon-support ", 'powerman' )
					),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Content #2", 'powerman' ),
                        "param_name" => "content2",
                        "value" => esc_html__( "", 'powerman' ),
                        "description" => esc_html__( "Content param.", 'powerman' )
                    ),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Title #3", 'powerman' ),
						"param_name" => "title3",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Title param.", 'powerman' )
					),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => esc_html__( "Icon #3", 'powerman' ),
						"param_name" => "icon3",
						"value" => esc_html__( "", 'powerman' ),
						"description" => esc_html__( "Example: icon-support ", 'powerman' )
					),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Content #3", 'powerman' ),
                        "param_name" => "content3",
                        "value" => esc_html__( "", 'powerman' ),
                        "description" => esc_html__( "Content param.", 'powerman' )
                    ),

					$add_css_animation
				)
			)
		);

        vc_map(
            array(
                "name" => esc_html__( "Mailchimp Box", 'powerman' ),
                "base" => "box_mailchimp",
                "class" => "pix-theme-icon",
                "category" => esc_html__( 'powerman', 'powerman'),
                "show_settings_on_create" => false,
                "content_element" => true,
            )
        );


        vc_map(
            array(
                "name" => esc_html__( "Request a quote ", 'powerman' ),
                "base" => "block_request4quote",
                "class" => "pix-theme-icon",
                "category" => esc_html__( 'powerman' , 'powerman'),
                "params" => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Type', 'powerman' ),
						'param_name' => 'block_type',
						'description' => esc_html__( 'Block type.', 'powerman' ),
						'value' => array(
                            esc_html__( 'Horizontal', 'powerman' ) => 'hor',
							esc_html__( 'Vertical', 'powerman' ) => 'ver',

						),
						'admin_label' => true,
					),

                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Title #1", 'powerman' ),
                        "param_name" => "title",
                        "value" => esc_html__( "", 'powerman' ),
                        "description" => esc_html__( "Title param.", 'powerman' ),
                        'dependency' => array(
                            'element' => 'block_type',
                            'value' => 'ver',
                        )
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Colored Title", 'powerman' ),
                        "param_name" => "ctitle",
                        "value" => esc_html__( "", 'powerman' ),
                        "description" => esc_html__( "Title param.", 'powerman' ),
                        'dependency' => array(
                            'element' => 'block_type',
                            'value' => 'ver',
                        )
                    ),
                    array(
                        "type" => "textarea_html",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Content", 'powerman' ),
                        "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                        "value" => esc_html__( "<p>I am test text block. Click edit button to change this text.</p>", 'powerman' ),
                        "description" => esc_html__( "Enter your full description.", 'powerman' ),
                        'dependency' => array(
                            'element' => 'block_type',
                            'value' => 'ver',
                        )
                    ),

                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Left Form', 'powerman' ),
                        'param_name' => 'left_form',
                        'description' => esc_html__( 'Block type.', 'powerman' ),
                        'value' => $forms,
                        'admin_label' => true,
                        'dependency' => array(
                            'element' => 'block_type',
                            'value' => 'hor',
                        )
                    ),

                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Right Static Block', 'powerman' ),
                        'param_name' => 'right_block',
                        'description' => esc_html__( 'Block type.', 'powerman' ),
                        'value' => $staticBlocks,
                        'admin_label' => true,
                        'dependency' => array(
                            'element' => 'block_type',
                            'value' => 'hor',
                        )
                    ),




                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'powerman' ),
                        'param_name' => 'image',
                        'value' => '',
                        'description' => esc_html__( 'Select image from media library.', 'powerman' )
                    ),
                    $add_css_animation
                )
            )
        );


        vc_map(
            array(
                "name" => esc_html__( "Brands", 'powerman' ),
                "base" => "block_brand",
                "class" => "pix-theme-icon",
                "category" => esc_html__( 'powerman', 'powerman'),
                "params" => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'powerman' ),
                        'param_name' => 'image',
                        'value' => '',
                        'description' => esc_html__( 'Select image from media library.', 'powerman' )
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "url", 'powerman' ),
                        "param_name" => "url",
                        "value" => esc_html__( "https://wordpress.com", 'powerman' ),
                        "description" => esc_html__( ".", 'powerman' )
                    )
                )
            )
        );

        vc_map(
            array(
                "name" => esc_html__( "Hover Block", 'powerman' ),
                "base" => "hoverblock",
                 "class" => "pix-theme-icon",
                "category" => esc_html__('powerman' , 'powerman'),
                "params" => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Type', 'powerman' ),
                        'param_name' => 'block_type',
                        'description' => esc_html__( 'Block type.', 'powerman' ),
                        'value' => array(
                            esc_html__( 'Simple', 'powerman' ) => '',
                            esc_html__( 'Bordered', 'powerman' ) => 'bordered',
                            esc_html__( 'Video', 'powerman' ) => 'video',
                        ),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'powerman' ),
                        'param_name' => 'image',
                        'value' => '',
                        'description' => esc_html__( 'Select image from media library.', 'powerman' )
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Title", 'powerman' ),
                        "param_name" => "title",
                        "value" => '',
                        "description" => esc_html__( "Block title", 'powerman' )
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Sub-title", 'powerman' ),
                        "param_name" => "subtitle",
                        "value" => '',
                        "description" => esc_html__( "Block subtitle", 'powerman' )
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "url", 'powerman' ),
                        "param_name" => "url",
                        "value" => esc_html__( "https://wordpress.com", 'powerman' ),
                        "description" => esc_html__( ".", 'powerman' )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Overlay', 'powerman' ),
                        'param_name' => 'overlay',
                        'value' => array(
                            esc_html__( "No", 'powerman' ) => '',
                            esc_html__( "Yes", 'powerman' ) => 'vc_row-overlay',

                        ),
                        'description' => esc_html__( 'Yes / No', 'powerman' ),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Overlay Opacity', 'powerman' ),
                        'param_name' => 'overlayopacity',
                        'value' => "0.1",
                        'description' => esc_html__( 'Values 0.1 - 0.9', 'powerman' ),
                        'admin_label' => true,
                    ),
                    $add_css_animation


                )
            )
        );

        powerman_vc_map(
            array(
                "name" => esc_html__( "Posts Grid", 'powerman' ),
                "base" => "section_blog_posts",
                "class" => "pix-theme-icon",
                "category" => esc_html__( 'powerman', 'powerman'),
                "params" => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Type', 'powerman' ),
                        'param_name' => 'block_type',
                        'description' => esc_html__( 'Block type.', 'powerman' ),
                        'value' => array(
                            esc_html__( 'Vertical', 'powerman' ) => '',
                            esc_html__( 'Horizontal', 'powerman' ) => 'hor',
                        ),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Block Title', 'powerman' ),
                        'param_name' => 'title',
                        'description' => esc_html__( 'Block title.', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Items Count', 'powerman' ),
                        'param_name' => 'count',
                        'description' => esc_html__( 'Select image from media library.', 'powerman' )
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__( 'Show date & comments', 'powerman' ),
                        'param_name' => 'show_dc',
                        'description' => esc_html__( 'Show date & comments', 'powerman' )
                    )
                ),
            ),
            $add_css_animation,
            powerman_get_vc_icons($vc_icons_data)

        );


        vc_map( array(
            'name' => esc_html__( 'Price Table', 'powerman' ),
            'base' => 'pricetable',
            'class' => 'pix-theme-icon',
            'as_parent' => array('only' => 'pricecol'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            'content_element' => true,
            'show_settings_on_create' => true,
            'category' => esc_html__( 'powerman', 'powerman'),
            'params' => array(

            ),
            'js_view' => 'VcColumnView',

        ) );
        powerman_vc_map(
            array(
                'name' => esc_html__( 'Price Column', 'powerman' ),
                'base' => 'pricecol',
                'class' => 'pix-theme-icon',
                'as_child' => array('only' => 'pricetable'),
                'content_element' => true,
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'powerman' ),
                        'param_name' => 'title',
                        'description' => esc_html__( 'Social title.', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Price', 'powerman' ),
                        'param_name' => 'price',
                        'description' => esc_html__( 'Price', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Price Title', 'powerman' ),
                        'param_name' => 'price_title',
                        'description' => esc_html__( 'Price Title', 'powerman' )
                    ),


                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Button Text', 'powerman' ),
                        'param_name' => 'btntext',
                        'description' => esc_html__( 'Button text.', 'powerman' )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Link', 'powerman' ),
                        'param_name' => 'link',
                        'description' => esc_html__( 'Item link.', 'powerman' )
                    ),
                    array(
                        "type" => "textarea_html",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__( "Content", "powerman" ),
                        "param_name" => "content",
                        "value" => esc_html__( "<p>I am test text block. Click edit button to change this text.</p>", "powerman" ),
                        "description" => esc_html__( "Enter information.", "powerman" )
                    ),
                )
            ),
            $add_css_animation,
            powerman_get_vc_icons($vc_icons_data)

        );


		/// section_services
			vc_map(
				array(
					"name" => esc_html__( "Services", 'powerman' ),
					"base" => "section_services",
					"class" => "pix-theme-icon",
					"category" => esc_html__( "powerman", 'powerman'),
					"params" => array(
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Use Template With', 'powerman' ),
							'param_name' => 'template',
							'value' => array(
								esc_html__( "Services", 'powerman' ) => 'powerman_tax_services',
								esc_html__( "Departmens", 'powerman' ) => 'departments',
								
							),
							'description' => 'In "With Department Menu" template you can\'t select departments.',
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Count', 'powerman' ),
							'param_name' => 'depart_count',
							
							'description' => esc_html__( 'Select count of departments', 'powerman' ),
							'dependency' => array(
								'element' => 'template',
								'value' => array('departments'),
							),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Count', 'powerman' ),
							'param_name' => 'services_count',
							
							'description' => esc_html__( 'Select count of powerman_tax_services', 'powerman' ),
							'dependency' => array(
								'element' => 'template',
								'value' => array('powerman_tax_services'),
							),
						),
						/*array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Items Count', 'powerman' ),
							'param_name' => 'count',
							'description' => esc_html__( 'Select number powerman_tax_services to show.', 'powerman' ),
							'dependency' => array(
								'element' => 'template',
								'value' => array('menu', 'landing'),
							),
						),*/

						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Button text', 'powerman' ),
							'param_name' => 'buttext',
							'value' => esc_html__( 'READ MORE', 'powerman' ),
							'description' => '',
						),
						$add_css_animation,
					)
				)
			);



        if ( class_exists( 'WPBakeryShortCode' ) ) {

            class WPBakeryShortCode_Block_Title extends WPBakeryShortCode {
            }


            class WPBakeryShortCode_Block_List extends WPBakeryShortCodesContainer {
            }

            class WPBakeryShortCode_Block_List_Item extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Block_Services extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Block_Staff extends WPBakeryShortCodesContainer {
            }

            class WPBakeryShortCode_Block_Staff_Item extends WPBakeryShortCode {
            }
			

            class WPBakeryShortCode_Block_Reviews extends WPBakeryShortCodesContainer {
            }

            class WPBakeryShortCode_Block_Reviews_Item extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Block_Request4quote extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Block_Brand extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Box_Mailchimp extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Box_Title extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Box_Icon extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Box_Amount extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Hoverblock extends WPBakeryShortCode {
            }
		
			class WPBakeryShortCode_Section_Banner extends WPBakeryShortCode {
			}

            class WPBakeryShortCode_Section_Portfolio extends WPBakeryShortCode {
            }

            class WPBakeryShortCode_Section_Blog_Posts extends WPBakeryShortCode {
            }
			
			class WPBakeryShortCode_Section_Services extends WPBakeryShortCode {

			}

            class WPBakeryShortCode_Pricetable extends WPBakeryShortCodesContainer {
            }

            class WPBakeryShortCode_Pricecol extends WPBakeryShortCode {
            }


			class WPBakeryShortCode_Threebox extends WPBakeryShortCode {
			}








		}
		

		
	}
	
?>