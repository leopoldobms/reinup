<?php 
	
	function powerman_load_styles(){


	    if (powerman_get_global_data('pagenow') != 'wp-login.php' && !is_admin()) {
		    
		    wp_enqueue_style('style', get_stylesheet_uri());
		    
		    wp_enqueue_style('powerman-master', get_template_directory_uri() . '/css/master.css');

		    if (powerman_get_option('general_settings_swatcher') == 'On'){
				wp_enqueue_style('powerman-color-switcher', get_template_directory_uri(). '/assets/switcher/css/switcher.css');
		    }

			wp_enqueue_style('owl.carousel', get_template_directory_uri(). '/assets/owl-carousel/owl.carousel.css');
			wp_enqueue_style('owl.theme', get_template_directory_uri(). '/assets/owl-carousel/owl.theme.css');

			wp_enqueue_style('flexslider', get_template_directory_uri(). '/assets/flexslider/flexslider.css');
			wp_enqueue_style('prettyPhoto', get_template_directory_uri(). '/assets/prettyphoto/css/prettyPhoto.css');

			powerman_css_vars();

			if (!class_exists('VC'))
				wp_enqueue_style('font-awesome', get_template_directory_uri(). '/fonts/font-awesome/css/font-awesome.css');

			powerman_enqueue_styles_customizer();
	    }
	}
	
	
	function powerman_load_scripts(){


		// Fix revslider
		
		
		$js_include_top_important = $js_include_top_base = array();


		$js_include_top_base = array(
			'jquery-migrate.min.js',
			'jquery-cookie.js',
			'jquery-ui.min.js',
			'bootstrap.min.js'
		);
		
		$js_include_top = array_merge($js_include_top_important,$js_include_top_base);
		
		$js_include_bottom = array(
			'modernizr.custom.js',
			'imagesloaded.pkgd.min.js',
			'jquery.placeholder.min.js',
			'classie.js',
			'cssua.min.js',
            'wow.min.js',
            'waypoints.min.js'
		);
		
		$js_include_assets = array(
			'isotope',
            'prettyphoto/js',
            'rendro-easy-pie-chart/dist',
            'bootstrap/js',
			'fancybox',
			'owl-carousel',
			'magnific',
			'scrollreveal',
			'letters',
			'lighter' => array('product'),
			'cloud-zoom' => array('product'),
			//'flexslider' => array('product') // Need For Quickview
			'flexslider'
		);


		/** flexslider - name for js asset => array() - pages where display this asset */


		powerman_addJsMultiple($js_include_top,'top');
		powerman_addJsMultiple($js_include_assets,'assets');
		powerman_addJsMultiple($js_include_bottom,'bottom');

		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		
		if (powerman_get_option('shop_settings_quickview')){
	        $vars = 'var _quickViewEnabled = true';
	    }else{
	        $vars = 'var _quickViewEnabled = false';
	    }
		

        wp_enqueue_script( 'powerman-custom-js', get_template_directory_uri() . '/js/custom.js',array(),'1.11.2',true );
        wp_add_inline_script( 'powerman-custom-js', $vars );
        
		wp_enqueue_script( 'powerman-custom-admin', get_template_directory_uri() . '/js/custom-admin.js',array(),'1.11.2',true );



		wp_enqueue_script( 'powerman-html5-lt', get_template_directory_uri() . '/js/html5.js' );
		wp_script_add_data( 'powerman-html5-lt', 'conditional', 'lt IE 9' );

	}
	
	 
	
	
	function powerman_browser_body_class($classes = '') {
		$classes[] = 'animated-css';
		$classes[] = 'layout-switch';	
		
		if (powerman_get_option('header_settings_type')){
	    	$headerType = powerman_get_option('header_settings_type');
		    $classes[] =  'home-construction-v' . $headerType;
		    
	    }
		
		return $classes;
	}
		
		
	add_action('wp_enqueue_scripts', 'powerman_load_styles');
	add_action('wp_enqueue_scripts', 'powerman_load_scripts');
	add_filter('body_class', 'powerman_browser_body_class');
	add_filter('woocommerce_enqueue_styles', 'powerman_load_woo_styles');
    add_filter('wp_enqueue_scripts', 'powerman_init_subheader_image');

	function powerman_load_woo_styles($styles){
		if (isset($styles['woocommerce-general']) && isset($styles['woocommerce-general']['src'])){
			$styles['woocommerce-general']['src'] = get_template_directory_uri() . '/assets/woocommerce/css/woocommerce.css';
		}
		return $styles;
	}

    function powerman_init_subheader_image(){
        $useDefaultHeaderImg = true;

        if (get_queried_object()){

            if (isset(get_queried_object()->taxonomy) && get_queried_object()->taxonomy == 'product_cat'){

                $thumbnail_id = get_woocommerce_term_meta( get_queried_object()->term_id, 'thumbnail_id', true );

                $image = wp_get_attachment_url( $thumbnail_id );

                if ( $image ) {

                    $page_bg = ".custom-theme-bg-hs_".get_queried_object()->term_id." {background-image:url(".$image.")}";
                    wp_add_inline_style( 'powerman-master', $page_bg );
                    $useDefaultHeaderImg = false;
                }
            }else{

                if (isset(get_queried_object()->post_type) && get_queried_object()->post_type == 'product'){

                    $product_cat_id = false;
                    $terms = get_the_terms( get_queried_object()->ID, 'product_cat' );
                    if ($terms){
	                    foreach ($terms as $term) {
	                        $product_cat_id = $term->term_id;
	                        break;
	                    }
                    }
                    
                    if ($product_cat_id){
                        $thumbnail_id = get_woocommerce_term_meta( $product_cat_id, 'thumbnail_id', true );

                        $image = wp_get_attachment_url( $thumbnail_id );

                        if ( $image ) {
                            $page_bg = ".custom-theme-bg-hs_".get_queried_object()->ID." {background-image:url(".$image.")}";
                            wp_add_inline_style( 'powerman-master', $page_bg );
                            $useDefaultHeaderImg = false;
                        }
                    }

                    $page_desc = '';
                }

            }
        }

        if (function_exists('is_shop') && is_shop()){
            $_page = get_post(wc_get_page_id( 'shop' ));
			if ( $_page ){
				
				
				$thumbnail_id = get_post_thumbnail_id( $_page->ID);

				$image = wp_get_attachment_url( $thumbnail_id );

			}else{
				$image = false;
			}
            if ( $image ) {
                $page_bg = ".custom-theme-bg-hs_".$_page->ID." {background-image:url(".$image.")}";
                wp_add_inline_style( 'powerman-master', $page_bg );
                $useDefaultHeaderImg = false;
            }
        }

        if ($useDefaultHeaderImg == true && isset(get_queried_object()->post_type)){



            $type = get_queried_object()->post_type;

            if ($type == 'page' || $type == 'post'){
                $_page = get_post(get_queried_object()->ID);

                $thumbnail_id = get_post_thumbnail_id( $_page->ID);

                $image = wp_get_attachment_url( $thumbnail_id );

                if ( $image ) {
                    $page_bg = ".custom-theme-bg-hs_".$_page->ID." {background-image:url(".$image.")}";
                    wp_add_inline_style( 'powerman-master', $page_bg );
                    $useDefaultHeaderImg = false;
                }
            }
        }

        if ($useDefaultHeaderImg == true){
            $headerImg = powerman_get_option('header_settings_headerimage');
            if ($headerImg){
                $page_bg = "#pageTitleBox {background-image:url(".$headerImg.") !important}";
                wp_add_inline_style( 'powerman-master', $page_bg );

            }

        }
    }


	function powerman_enqueue_styles_customizer(){

        $stgsColoredSaved = false;

		if ($stgs = powerman_getCustomizeSettings()){

			$settings = json_decode(stripslashes($_POST['customized']));
			$settings_array = array();
			foreach($settings as $key => $val){
				$key = substr(str_replace("powerman_customize_options[", "", $key), 0, -1);
				$settings_array[$key] = $val;
			}
			if(class_exists('WP_Session')) {
				$powerman_wp_session = WP_Session::get_instance();
                $powerman_wp_session['customize_live_preview'] = $settings_array;
			}else {
				update_option('powerman_customize_live_preview', $settings_array);
			}





		}
	
        
      

		$color_theme = powerman_get_option('general_color_theme');
		if (isset($_GET['color_theme'])){
			$colortheme = esc_attr($_GET['color_theme']);
			if (intval($colortheme)){
				$color_theme = 'color' . $colortheme;
			}
		}

		$stgsColored = isset($stgs->pixtheme_color_second_color) || isset($stgs->pixtheme_color_first_color) ||
			isset($stgs->pixtheme_color_header_color) || isset($stgs->pixtheme_color_footer_color) ||
			isset($stgs->pixtheme_color_title_color) || isset($stgs->pixtheme_color_price_color) ||
			isset($stgs->pixtheme_color_buttons_color) || isset($stgs->pixtheme_color_menu_color) ||
			isset($stgs->pixtheme_color_prefooter_color);
		$stgsColoredSaved = (
			powerman_get_option('color_second_color') || powerman_get_option('color_first_color') ||
			powerman_get_option('color_header_color') || powerman_get_option('color_footer_color') ||
			powerman_get_option('color_title_color') || powerman_get_option('color_price_colo') ||
			powerman_get_option('color_buttons_color') || powerman_get_option('color_menu_color') ||		    			    			    		powerman_get_option('color_prefooter_color')
		);

		if ($stgsColoredSaved == false){
			if ($stgsColored == false){
				if ($color_theme)
					wp_enqueue_style('powerman-' . $color_theme, get_template_directory_uri() . '/css/' . $color_theme . '.css');
				else{

					wp_enqueue_style('powerman-color', get_template_directory_uri() . '/css/color.css');
				}
			}




		}
        
        
          wp_enqueue_style('powerman-dynamic-styles', get_template_directory_uri() . '/css/dynamic-styles.php');

        
	}

	
?>