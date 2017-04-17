<?php
	/**  Core_Frontend  **/
	
	require_once(get_template_directory() . '/library/core/frontend/color-swatcher.php');
	require_once(get_template_directory() . '/library/core/frontend/functions.php');
	require_once(get_template_directory() . '/library/core/frontend/vc.php');
		
		
	/* Setup language support & image settings */
	function powerman_setup()
	{
	    global $powerman_options;
	    // Language support 
	    load_theme_textdomain('powerman', get_template_directory() . '/languages');
	    $locale      = get_locale();
	    $locale_file = get_template_directory() . "/languages/$locale.php";
	    if (is_readable($locale_file)) {
	        require_once($locale_file);
	    }
	    
	    // ADD SUPPORT FOR POST THUMBS 
	    add_theme_support('post-thumbnails');
	    
	    // Define various thumbnail sizes
	    $width  = (!empty($powerman_options['pix_portfolio_width'])) ? $powerman_options['pix_portfolio_width'] : 340;
	    $height = (!empty($powerman_options['pix_portfolio_height'])) ? $powerman_options['pix_portfolio_height'] : 250;
	    add_image_size('portfolio-thumb', $width, $height, true);
	    add_image_size('portfolio-thumb-2x', $width * 2, $height, true);
	    add_image_size('preview-thumb', 100, 100, true);
	    add_image_size('event-thumb', 320, 170, true);
	    add_theme_support("title-tag");
	    add_theme_support('automatic-feed-links');

	}
	
	/* Register 3 navi types */
	function powerman_custom_menus()
    {		
		
		    
	    add_theme_support('menus');
	    
	    /* Register Navigations */
        register_nav_menus(array(
            'primary_nav' => esc_html__('Primary Navigation', 'powerman'),
            'top_nav' => esc_html__('Top Navigation', 'powerman'),
            'footer_nav' => esc_html__('Footer Navigation', 'powerman')
        ));
    }
	
	
	add_action('after_setup_theme', 'powerman_setup');
	add_action('init', 'powerman_custom_menus');
?>