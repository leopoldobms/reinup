<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $cats
 * @var $per_row
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Banner
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
global $post;
$out = $cnt = '';

if( $cats == '' ):
	$out .= '<p>'.esc_html__('No departments selected. To fix this, please login to your WP Admin area and set the departments you want to show by editing this shortcode and setting one or more departments in the multi checkbox field "Departments".', 'powerman');
else: 
$cnt = $per_row != 2 ? 'col-md-4 col-lg-4' : '';
$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';
$out .= '

	<div class="row our-services">
       
	';		
		
	$args = array( 'taxonomy' => 'services_category', 'hide_empty' => '0', 'include' => $cats);							
	$categories = get_categories ($args);								
	if( $categories ):
		foreach($categories as $cat) :
			$t_id = $cat->term_id;
			$cat_meta = get_option("services_category_$t_id");
			$link = !isset($cat_meta['pix_serv_url']) || $cat_meta['pix_serv_url'] == '' ? get_term_link( $cat ) : $cat_meta['pix_serv_url'];
						
$out .= '
		
		<div class="col-sm-6 '.esc_attr($cnt).'">
    		<a href="'.esc_url($link).'">
        		<span><i class="glyph-icon '.esc_attr($cat_meta['pix_icon']).'"></i></span>
        		<h4>'.wp_kses_post($cat->name).'</h4>
                <p>'.powerman_limit_words($cat->description, 20).'</p>
            </a>
        </div>
        				
		';
		
		 endforeach;
	endif;
	 
$out .= '            
    	
	</div>
	';
		
	if (isset($showcont) && $showcont != ''): 
		while ($wp_query->have_posts()) : 							
			$wp_query->the_post(); 
	$out .= '<div class="portfolio-modal modal fade" id="myModal'.esc_attr($post->ID).'"  >
				<div class="modal-content"> </div>
			</div>';
		endwhile;
	endif;
		
$out .= '</div>';
endif;	
echo $out;