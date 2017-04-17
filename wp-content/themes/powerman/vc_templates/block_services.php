<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $view_tool
 * @var $tool_image
 * @var $tool_title
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Block_Services
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$img_id = preg_replace( '/[^\d]/', '', $tool_image );
$img_link = wp_get_attachment_image_src( $img_id, 'large' );
$img_link = $img_link[0];
$image_meta = powerman_wp_get_attachment($img_id);

$image_alt = $image_meta['alt'] == '' ? $image_meta['title'] : $image_meta['alt'];

$css_animation_class = $css_animation != '' ? ' wow ' . $css_animation : '';

if ( $view_tool == '0' ) :

    $out = '

		<div class="powerman-store row no-gutter-3">
			<div class="row-height block ' . esc_attr($css_animation_class) . '">
				<!-- Block Starts -->
				<div class="col-lg-6 col-md-6 col-height col-middle picture">
					<img src="'.esc_url($img_link).'" class="img-responsive center-block" alt="'.esc_attr($image_alt).'" >
					<div class="l-arrow"></div>
				</div>
				<div class="col-lg-6 col-md-6 col-height detail">
					<h4>'.wp_kses_post($tool_title).'</h4>
					<div class="description">'.do_shortcode($content).'</div>
				</div>
				<!-- Block Ends -->
			</div>
		</div>
	';

else :

    $out = '
		<div class="powerman-store row no-gutter-3">
			<div class="row-height block ' . esc_attr($css_animation_class) . '">
				<!-- Block Starts -->
				<div class="col-lg-6 col-md-6 col-height detail">
					<h4>'.wp_kses_post($tool_title).'</h4>
					<div class="description">'.do_shortcode($content).'</div>
				</div>
				<div class="col-lg-6 col-md-6 col-height col-middle picture">
					<img src="'.esc_url($img_link).'" class="img-responsive center-block" alt="'.esc_attr($image_alt).'" >
					<div class="r-arrow"></div>
				</div>
				<!-- Block Ends -->
			</div>
		</div>
	';

endif;

echo $out;