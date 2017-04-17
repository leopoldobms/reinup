<?php
	
	function powerman_category_header_search(){
	
		$show_header_search = powerman_get_option('header_settings_catsearch');
		if ($show_header_search != 'on')
			return '';
		
	
		$taxonomy     = 'product_cat';
		$args = array(
			'taxonomy'     => $taxonomy,
		);
		$all_categories = get_terms( $args );
		if (!count($all_categories))
			return '';		
 		$_result = '';
 		$_result .='<select class="formDropdown font-additional font-weight-normal" name="product_cat" id="filterby">';
		$_result .='<option value="">'.esc_html__('Filter by','powerman').'</option>';
 		foreach($all_categories as $_category){
	 		$_result .= '<option value="'.esc_attr($_category->slug).'">'.esc_attr($_category->name).'</option>';
 		} 
 		$_result .= '</select><i class="fa fa-angle-down customColor"></i>';
  	 	return $_result;
	}


    function powerman_post_read_more(){

        $btn_name = powerman_get_option('blog_settings_readmore');
        $name = ($btn_name) ? $btn_name : esc_html__('Read More','powerman');
        return esc_attr($name);
    }

    function powerman_show_sidebar($type, $custom){



        $sidebar = 'sidebar-1';$layout = 2;
        $layouts = array(
            1 => 'full',
            2 => 'right',
            3 => 'left',
        );

        if (is_array($custom) && isset($custom['pix_selected_sidebar'])) {
            $sidebar = isset ($custom['pix_selected_sidebar'][0]) ? $custom['pix_selected_sidebar'][0] : 'sidebar-1';
            $layout = isset ($custom['pix_page_layout']) ? $custom['pix_page_layout'][0] : '2';

        }

        if (isset($layouts[$layout]) && $type === $layouts[$layout]) {
            echo '<div class="col-xs-12 col-sm-5 col-md-3"><aside class="sidebar">';
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar)) {
            }
            echo '</aside></div>';
        }else{
            echo '';
        }

    }

    function powerman_show_breadcrumbs(){
        if (!is_page_template( 'page-home.php' ) && !is_front_page()){
            if (class_exists( 'WooCommerce' )){
				woocommerce_breadcrumb();
			}else{
				echo '<ol class="breadcrumb">';
				echo '<li><a href="'.esc_url(home_url('/')).'">'.esc_html__('Home','powerman').'</a></li>';
				echo '<li class="active">';
					if (is_category() || is_single()) {

						the_category(' / ');
						if (is_single()) {
							echo '</li><li class="active">';
							echo powerman_get_page_title();
							echo '</li>';
						}
					}else{
						echo powerman_get_page_title();
					}


				echo '</li>';
				echo '</li>';

				echo '</ol>';
			}
            
        }
    }


    function powerman_get_page_title(){
        $page_title = '';

        if ( is_404() ) {
            $page_title = esc_html__( 'Page not found','powerman' );

            // If it's a search, use a dynamic search results title.
        } elseif ( is_search() ) {
            /* translators: %s: search phrase */
            $page_title = sprintf( esc_html__( 'Search Results for &#8220;%s&#8221;','powerman' ), get_search_query() );

            // If on the front page, use the site title.
        } elseif ( is_front_page() ) {
            $page_title = get_bloginfo( 'name', 'display' );

            // If on a post type archive, use the post type archive title.
        } elseif ( is_post_type_archive() ) {
            $page_title = post_type_archive_title( '', false );

            // If on a taxonomy archive, use the term title.
        } elseif ( is_tax() ) {
            $page_title = single_term_title( '', false );

            /*
             * If we're on the blog page that is not the homepage or
             * a single post of any post type, use the post title.
             */
        } elseif ( is_home() || is_singular() ) {
            $page_title = single_post_title( '', false );

            // If on a category or tag archive, use the term title.
        } elseif ( is_category() || is_tag() ) {
            $page_title = single_term_title( '', false );

            // If on an author archive, use the author's display name.
        } elseif ( is_author() && $author = get_queried_object() ) {
            $page_title = $author->display_name;

            // If it's a date archive, use the date as the title.
        } elseif ( is_year() ) {
            $page_title = get_the_date( esc_html_x( 'Y', 'yearly archives date format','powerman' ) );

        } elseif ( is_month() ) {
            $page_title = get_the_date( esc_html_x( 'F Y', 'monthly archives date format','powerman' ) );

        } elseif ( is_day() ) {
            $page_title = get_the_date();
        }

        if (get_queried_object() && isset(get_queried_object()->post_title)){
            $page_title = get_queried_object()->post_title;
        }
        if ($page_title == ''){
            if (isset(get_queried_object()->name))
                $page_title = get_queried_object()->name;
            else{
                $page_title = get_the_title();
            }
        }


        return esc_attr($page_title);
    }


    function powerman_get_blog_tpl_path(){
        $blogType = (int)powerman_get_option('blog_settings_type',1);
        if (!is_numeric($blogType)){
            return 'templates';
        }
        $templatesPath = 'templates/post-parts/' . $blogType ;
        return esc_attr($templatesPath);
    }


    function powerman_get_staticblock_content($blockId){

        if (is_array($blockId)){
            // SORT ORDER

            // Prepare sortable array
            $_blocks = array();

            foreach($blockId as $bId){
                if ($bId == 'global'){
                    $bId = powerman_get_option('footer_block');
                }
                $_block = get_post($bId);
                $_blocks[$_block->menu_order][] = $_block;
            }



            foreach ($_blocks as $blockMenuOrder){
                foreach($blockMenuOrder as $block) {
                    $shortcodes_custom_css = get_post_meta($block->ID, '_wpb_shortcodes_custom_css', true);
                    if (!empty($shortcodes_custom_css)) {
                        echo '<style type="text/css" data-type="vc_shortcodes-custom-css">';
                        echo esc_html($shortcodes_custom_css);
                        echo '</style>';
                    }

                    echo apply_filters('the_content', $block->post_content);
                }
            }
        }else{

            if (!$blockId || $blockId == 'global'){
                return '';
            }



            $block = get_post($blockId);
            $shortcodes_custom_css = get_post_meta( $blockId, '_wpb_shortcodes_custom_css', true );
            if ( ! empty( $shortcodes_custom_css ) ) {
                echo '<style type="text/css" data-type="vc_shortcodes-custom-css">';
                echo esc_html($shortcodes_custom_css);
                echo '</style>';
            }
            echo apply_filters('the_content', $block->post_content);
        }



    }


    function powerman_get_subheader_class(){

        $hsID = "";



        if (get_queried_object()){
            if (isset(get_queried_object()->taxonomy) && get_queried_object()->taxonomy == 'product_cat'){

                $thumbnail_id = get_woocommerce_term_meta( get_queried_object()->term_id, 'thumbnail_id', true );

                $image = wp_get_attachment_url( $thumbnail_id );

                if ( $image ) {

                    $hsID = "hs_".get_queried_object()->term_id;
                }

            }
            else{

                if (isset(get_queried_object()->post_type) && get_queried_object()->post_type == 'product'){

                    $product_cat_id = false;
                    $terms = get_the_terms( get_queried_object()->ID, 'product_cat' );
                    if ($terms && is_array($terms)){
	                    foreach ($terms as $term) {
	                        $product_cat_id = $term->term_id;
	                        break;
	                    }
	                    
                    }

                    if ($product_cat_id){
                        $thumbnail_id = get_woocommerce_term_meta( $product_cat_id, 'thumbnail_id', true );

                        $image = wp_get_attachment_url( $thumbnail_id );

                        if ( $image ) {

                            $hsID = "hs_".get_queried_object()->ID;
                        }
                    }

                }else{




                }
            }

        }





        if (isset(get_queried_object()->post_type)){
            $type = get_queried_object()->post_type;
            if ($type == 'page' || $type == 'post') {
                $_page = get_post(get_queried_object()->ID);
                $thumbnail_id = get_post_thumbnail_id( $_page->ID);

                $image = wp_get_attachment_url( $thumbnail_id );

                if ( $image ) {
                    $page_bg = "background-image:url(".$image.")";
                    $hsID = "hs_".$_page->ID;
                }
            }
        }


        return 'custom-theme-bg-'.esc_attr($hsID);
    }


    function powerman_wp_get_attachment($attachment_id){
        $attachment = get_post( $attachment_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    }
	
	function powerman_limit_words($string, $word_limit)
	{
		$words = explode(" ",$string);
		return implode(" ",array_splice($words,0,$word_limit));
	}
	
	add_image_size('powerman-powerman_tax_services-thumb', 350, 233, true);
	 

?>