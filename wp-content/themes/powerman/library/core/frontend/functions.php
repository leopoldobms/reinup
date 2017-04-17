<?php 

	
	
	function powerman_css_vars(){
		
		$css = '';
		$header_color  = powerman_get_option('header_all_color');
		$footer_color  = powerman_get_option('footer_all_color');
		if ($footer_color){
			
			$css .= '.footer-top { background-color: '.$header_color.' !important}';
			$css .= '.footer-bottom { background-color: '.$header_color.' !important}';			
		}

		
		if ($header_color)
			$css .= '.top-header { background-color: '.$header_color.' !important}';
		$css .= '';
		
		if ($css != '')
			wp_add_inline_style('powerman-master', $css);
	}

	
	function powerman_get_theme_header(){
		$headerType = 1;
		global $wp_query;

		
		$pix_header_type_page = get_post_meta(get_the_ID(), 'pix_page_header_type', true);
		if ($pix_header_type_page && $pix_header_type_page != 'global'){
			$headerType = (int)$pix_header_type_page;
		}else{
			if (powerman_get_option('header_settings_type')){
				$headerType = powerman_get_option('header_settings_type');
			}
		}


		if (isset($wp_query->queried_object->ID)){
			powerman_set_global_data('powerman_footer_type_page' , get_post_meta($wp_query->queried_object->ID, 'pix_page_footer_staticblock', true));
		}else{
			powerman_set_global_data('powerman_footer_type_page' , get_post_meta(get_the_ID(), 'pix_page_footer_staticblock', true));
		}


		
		require( get_template_directory() . '/templates/header/types/header' . $headerType . '.php');

	}
	
	
	function powerman_load_block($block_name){
		

		
		$blockData = explode('/',$block_name);
		$blockType = (isset($blockData[0]))?$blockData[0]:'';
		$blockName = (isset($blockData[1]))?$blockData[1]:'';
	
		
		if (file_exists(get_template_directory() . '/templates/' . $blockType . '/' . $blockName . '.php')){
			include_once(get_template_directory() . '/templates/' . $blockType . '/' . $blockName . '.php');
		}
		
		
		
	}
	
	
	function powerman_addJsMultiple($jsData, $type = 'bottom'){
		

		if (is_array($jsData) && !empty($jsData)){
			$templateUrl = get_template_directory_uri();
			$templateDir = get_template_directory();
			$posJs = false;
			
			if ($type == 'assets'){
				$posJs = true;
				foreach ($jsData as $jKey => $_js){
					if (is_array($_js)){
						if (!powerman_checkAvailableJsToPage($_js))
							continue;
						$_js = $jKey;
					}
					if (!is_dir($templateDir . '/assets/' . $_js . '/'))
						continue;
					if ($handle = opendir($templateDir . '/assets/' . $_js . '/')) {
						while (false !== ($entry = readdir($handle))) {
							if ($entry != '.' && $entry != '..'){
								$slug = str_replace(' ', '-',$entry);
								if (strpos($entry,'.js') && !strpos($entry,'.json'))
									wp_enqueue_script('powerman-' . $slug, $templateUrl . '/assets/' . $_js . '/' . $entry, array('jquery'), '1.11.2', $posJs);
							}
					    }					    
				    }
			    }
			}else{
				
				foreach ($jsData as $jKey => $_js){
					if (is_array($_js)){
						if (!powerman_checkAvailableJsToPage($_js))
							continue;
						$_js = $jKey;
					}
					if (file_exists($templateDir . '/js/' . $_js)){
						if ($type == 'bottom')
							$posJs = true;
						$slug = str_replace(' ', '-',$_js);
						wp_enqueue_script('powerman-' . $slug, $templateUrl . '/js/' . $_js, array(), '1.11.2', $posJs);
					}
				}	
			}
			
		}
	
	}



	function powerman_woo_get_page_id(){

		global $post;

		if( is_shop() || is_product_category() || is_product_tag() )
			$id = get_option( 'woocommerce_shop_page_id' );
		elseif( is_product() || !empty($post->ID) )
			$id = $post->ID;
		else
			$id = 0;
		return $id;
	}


	function powerman_checkAvailableJsToPage($types){
		foreach($types as $type){
			if (function_exists('is_product') && is_product() && $type == 'product'){
				return true;
			}
		}
		return false;
	}
	
	
	
	
	
	
?>