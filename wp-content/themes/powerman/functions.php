<?php

    /* Load CORE files */

    require_once(get_template_directory() . '/library/core/global/index.php');

    require_once(get_template_directory() . '/library/core/admin/index.php');

    require_once(get_template_directory() . '/library/core/frontend/index.php');

    require_once(get_template_directory() . '/library/modules/index.php');


    /* Load THEME files */

    require_once(get_template_directory() . '/library/theme/frontend/index.php');


    /* Load Plugins */

    require_once(get_template_directory() . '/library/plugins.php');
	
	if (powerman_get_option('general_settings_live_editor','off') == 'on'){
		add_site_option( 'YP_PART_OF_THEME', 'true' );
		define("WT_DEMO_MODE","true");
	}

?>