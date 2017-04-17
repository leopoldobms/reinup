<?php 
	if ( function_exists('wp_nav_menu')) {
	
		$powerman_class = 'nav navbar-nav navbar-main';
	
		wp_nav_menu(array(
			'theme_location'  => 'primary_nav',
			'container'       => false,
			'menu_id'		  => 'main-menu',
			'menu_class'      => $powerman_class
		));
	}
	
?>
