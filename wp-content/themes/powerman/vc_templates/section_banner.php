<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $buttype
 * @var $border_color 
 * @var $title
 * @var $titlefont
 * @var $type
 * @var $icon_pixelegant
 * @var $icon_pixflaticon
 * @var $icon_pixicomoon
 * @var $icon_pixfontawesome
 * @var $icon_pixsimple
 * @var $icon_fontawesome
 * @var $icon_openiconic
 * @var $icon_typicons
 * @var $icon_entypo
 * @var $icon_linecons
 * @var $but_desc
 * @var $link
 * @var $title2
 * @var $titlefont2
 * @var $icon2
 * @var $but_desc2
 * @var $link2
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Block_Title
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$link = vc_build_link( $button_link );

$href = isset($link['http']) ? $link['http'] : '#';

$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';	
$out .= '<div class="container">';

if($buttype == 'type1') {

	$out .= '<section class="block-banner-1 clearfix">
                <div class="block-banner-1__inner">
                  <h2 class="block-banner-1__title">'.esc_attr($title).'</h2>
                  <div class="block-banner-1__description">'.esc_attr($subtitle).'</div>
                </div>
                <a class="btn btn-default btn-second btn-effect" href="'.esc_url($href).'">
                	'.esc_attr($button_title).'
                </a>
    		</section>';
}elseif ($buttype == 'type2'){
    $out .= '<section class="block-banner-2 clearfix">
                <a class="btn btn-default btn-effect" href="'.esc_url($href).'">'.esc_attr($button_title).'</a>
                <div class="block-banner-2__inner">
                  <h2 class="block-banner-2__title">'.esc_attr($title).' <span class="color_primary">'.esc_attr($titlecolor).'</span></h2>
                  <div class="block-banner-2__description">'.esc_attr($subtitle).'</div>
                </div>
              </section>';
}

$out .= '</div></div>';
	
echo $out;