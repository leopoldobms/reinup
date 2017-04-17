<?php
	/**  Theme_Frontend  **/
	
	require_once(get_template_directory() . '/library/theme/frontend/styles_scripts.php');
	require_once(get_template_directory() . '/library/theme/frontend/functions.php');
	require_once(get_template_directory() . '/library/theme/frontend/menu_walker.php');
	require_once(get_template_directory() . '/library/theme/frontend/powermanIsotope_walker.php');
	require_once(get_template_directory() . '/library/theme/frontend/comment_walker.php');
	require_once(get_template_directory() . '/library/theme/frontend/blog.php');
	require_once(get_template_directory() . '/library/theme/frontend/vc_shortcode.php');
	require_once(get_template_directory() . '/library/theme/frontend/post-options.php');
	require_once(get_template_directory() . '/library/theme/frontend/shortcode.php');
    require_once(get_template_directory() . '/library/theme/frontend/powermanPortfolio_walker.php');
    require_once(get_template_directory() . '/library/theme/frontend/woocommerce.php');

	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}


    function powerman_open_comments_on_default($status, $post_type, $comment_type ) {


        if ( 'page' !== $post_type ) {
            return $status;
        }


        return 'open';
    }

    add_filter( 'get_default_comment_status', 'powerman_open_comments_on_default', 10, 3 );


?>