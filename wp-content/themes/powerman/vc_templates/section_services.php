<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $template
 * @var $cat_serv
 * @var $count
 * @var $buttext
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Services
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if (!$depart_count)
	$depart_count = 3;
if (!$services_count)
	$services_count = 6;

?>
<div class="container">
	<div class="row">
	<?php if ($template == 'services'):?>
	<?php
			
			$args = array(
						'post_type' => 'services', 
						'orderby' => 'menu_order',		 
						'order' => 'ASC',
						'showposts' => $services_count
					);
			
			
			
			
			
			$services = get_posts( $args );
			
			
			
			foreach ( $services as $service ):
					//$powerman_pix_thumbnail = get_the_post_thumbnail($post->ID, 'powerman_pix-powerman_tax_services-thumb', array('class' => "full-width"));
					$powerman_pix_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($service->ID) );
					$serviceIcon = get_post_meta($service->ID, 'pix_service_icon', true);

		?>
					<div class="list-services__item" style="background-image:url( <?php echo esc_url($powerman_pix_thumbnail)?> )">';
						<a class="list-services__link clearfix" href="<?php echo esc_url(get_permalink($service->ID)) ?>">
							<?php if ($serviceIcon):?><i class="icon fa <?php echo esc_attr($serviceIcon)?>"></i><?php endif;?>
							<div class="list-services__inner">
							  <h3 class="list-services__title"><?php echo wp_kses_post($service->post_title) ?></h3>
							  <div class="list-services__description"><?php echo powerman_limit_words($service->post_excerpt, 20) ?></div>
							</div>
						</a>
					</div>
					
					
		<?php
			endforeach;
			
		?>
	<?php else: ?>
	<?php 
		$args = array( 'taxonomy' => 'services_category','number' => $depart_count, 'hide_empty' => '0', 'title_li'=> '', 'show_count' => '0');
		$categories = 	get_categories($args);?>
			<?php foreach ($categories as $cat):  ?>
			<?php 
				
				
				$t_id = $cat->term_id;
				$term_meta = get_option( "taxonomy_term_$t_id" );
				
				if (isset($term_meta['thumbnail_id'])){
					$powerman_pix_thumbnail = wp_get_attachment_url( $term_meta['thumbnail_id'] ); 
				}else{
					$powerman_pix_thumbnail = get_template_directory_uri() . '/images/depr.jpg';
				}
			?>
			<div class="wpb_column vc_column_container vc_col-sm-4">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div>
							<div class="list-services-2__item">
								<div class="list-services-2__bg">
									<img class="img-responsive" src="<?php echo esc_url($powerman_pix_thumbnail)?>" height="290" width="360" alt="<?php echo esc_attr($cat->cat_name)?>">						</div>
								<a class="list-services-2__link clearfix" href="<?php echo esc_url(get_term_link($cat)) ?>">
									<?php if (isset($term_meta['icon'])):?>
										<i class="icon fa <?php echo esc_attr($term_meta['icon'])?>"></i>
									<?php endif;?>	
									<h3 class="list-services-2__title"><?php echo esc_attr($cat->cat_name)?></h3>
									<div class="list-services-2__description"><?php echo wp_kses_post($cat->category_description)?></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach;?>

	<?php endif; ?>
	</div>
</div>
