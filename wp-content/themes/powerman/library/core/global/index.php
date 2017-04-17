<?php
	/**  Core_Global  **/





	require_once( get_template_directory() . '/library/core/global/options.php');
	require_once( get_template_directory() . '/library/core/global/functions.php');
	require_once( get_template_directory() . '/library/core/global/sidebars.php');
	

	/* Define global variable $pix_options */
	
	function powerman_global_init(){
		global $powerman_options;
		$powerman_options = isset($_POST['options']) ? $_POST['options'] : get_option('powerman_general_settings');
	}


	
	if (file_exists(get_template_directory() .'/one-click-demo-install/init.php'))
		require get_template_directory() .'/one-click-demo-install/init.php';


	powerman_global_init();
	
	
	
?>