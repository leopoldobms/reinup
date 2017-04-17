<?php 
/*** The taxonomy for portfolio category. ***/
get_header(); 
	
 	$powerman_pix_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$powerman_services_page = powerman_get_option('powerman_powerman_services_page', '');
	$powerman_all_services = '';
	if ( '' != $powerman_services_page ) {
		$powerman_all_services = get_the_permalink($powerman_services_page);
	}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="services">
	<?php
		$powerman_pix_services = get_objects_in_term( $powerman_pix_term->term_id, 'services_category');
		$args = array(
					'post_type' => 'services',
					'orderby' => 'menu_order',
					'post__in' => $powerman_pix_services,			 
					'order' => 'ASC',
					'showposts' => 30
				);
			
			$powerman_tax_services = get_posts( $args );
			
			foreach ($powerman_tax_services as $service ):
				$powerman_pix_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($service->ID) );
				$powerman_serviceIcon = get_post_meta($service->ID, 'pix_service_icon', true);
	?>
				<div class="list-services__item" style="background-image:url( <?php echo esc_url($powerman_pix_thumbnail)?> )">';
					<a class="list-services__link clearfix" href="<?php echo esc_url(get_permalink($service->ID)) ?>">
						<?php if ($powerman_serviceIcon):?><i class="icon <?php echo esc_attr($powerman_serviceIcon)?>"></i><?php endif;?>
						<div class="list-services__inner">
						  <h3 class="list-services__title"><?php echo wp_kses_post($service->post_title) ?></h3>
						  <div class="list-services__description"><?php echo powerman_limit_words($service->post_excerpt, 20) ?></div>
						</div>
					</a>
				</div>
				
				
    <?php
			endforeach;
		
	?>
      

                    
		
			</div>     
		</div>   
    </div>               
</div>


<?php get_footer() ?>