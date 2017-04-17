<?php


	require_once(get_template_directory() . '/library/core/admin/admin-panel/general.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/header.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/footer.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/blog.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/color.php');

	
	function powerman_customize_register($wp_customize ) {

		
		/** GENERAL SETTINGS **/
		
		powerman_customize_general_tab($wp_customize,'powerman');
		
		
		
		/** HEADER SECTION **/
		
		powerman_customize_header_tab($wp_customize,'powerman');


		/** FOOTER SECTION **/
		
		powerman_customize_footer_tab($wp_customize,'powerman');


		/** BLOG SECTION **/

		powerman_customize_blog_tab($wp_customize,'powerman');


		/** COLOR SECTION */

		powerman_customize_color_tab($wp_customize,'powerman');

		/** Remove unused sections */

		$wp_customize->remove_section('header_image');
		$wp_customize->remove_section('background_image');
		$wp_customize->remove_section('colors');



    }
    
    
	add_action( 'customize_register', 'powerman_customize_register');




	function powerman_sanitize_email($email ) {
		if(is_email( $email )){
			return $email;
		}else{
			return '';
		}
	}

?>