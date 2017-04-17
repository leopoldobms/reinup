<?php 
	function powerman_get_option($slug, $_default = false){
		
		global $theme_slug;
		
		if ($stgs = powerman_getCustomizeSettings()){

			$slug_option_name = 'pixtheme_'.$slug;
					
			if (isset($stgs->$slug_option_name))
				return esc_attr($stgs->$slug_option_name);
		}
		
		$slug = 'pixtheme_' . $slug;


		$pix_options = get_option('theme_mods_'.$theme_slug);


		if (isset($pix_options[$slug])){
			return esc_attr($pix_options[$slug],'default');
		}else{
			if ($_default)
				return esc_attr($_default,'default');	  	 		
			else
				return false;	
		}
		
	}
	
	
	function powerman_getCustomizeSettings(){
		if (isset($_POST['wp_customize']) && $_POST['wp_customize'] == 'on'){
			$settings = json_decode(stripslashes($_POST['customized']));
			return $settings;	
		}else{
			return false;
		}

	}
	
	
	function powerman_pix_log($data, $name = 'default'){

		if (powermanDeveloperLog == false)
			return;
				

		
	}


	function powerman_load_modules($modules = array()){
		if (!is_array($modules))
			return false;
			

		foreach($modules as $_module){
            $_moduleDir = get_template_directory() . '/library/modules/' . $_module . '/';
			if (file_exists($_moduleDir) && is_dir($_moduleDir) && file_exists($_moduleDir . $_module . '.php')){
                require_once($_moduleDir . $_module . '.php');
            }
		}

	}


	function powerman_get_global_data($slug){

		return isset($GLOBALS[$slug]) ? $GLOBALS[$slug] : 0;

	}

	function powerman_set_global_data($slug, $data, $index = false){

		if ($index !== false){

			$GLOBALS[$slug][$index] = $data;
		}else{
			$GLOBALS[$slug] = $data;
		}


	}



	
?>