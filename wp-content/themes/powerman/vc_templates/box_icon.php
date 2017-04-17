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


$link = vc_build_link( $url );

$href = isset($link['http']) ? $link['http'] : '#';

$img = wp_get_attachment_image_src( $image, 'large' );
$img_output = (isset($img[0]))?$img[0]:'';


$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';
$iconClass = isset( ${"icon_" . $type} ) ? esc_attr( ${"icon_" . $type} ) : 'fa fa-adjust';

if ($boxtype == 'type2'){
    $out .= '<div class="list-services-2__item">
        <div class="list-services-2__bg"><img class="img-responsive" src="'.esc_url($img_output).'" height="290" width="360" alt="'.esc_attr($title).'"></div>
        <a class="list-services-2__link clearfix" href="'.esc_url($href).'">
            <i class="icon '.esc_attr($iconClass).'"></i>
            <h3 class="list-services-2__title">'.esc_attr($title).'</h3>
            <div class="list-services-2__description">'.wp_kses_post($short_description).'</div>
        </a>
    </div>';

}elseif ($boxtype == 'type3'){

    $out .='
    <div class=" advantages__item clearfix">
        <i class="icon '.esc_attr($iconClass).'"></i>
        <div class="advantages__inner">
            <div class="advantages__name">'.esc_attr($title).'</div>
            <div class="advantages__text">'.wp_kses_post($short_description).'</div>
        </div>
    </div>';

}
else{
    $out .= '<div class="list-services__item" style="background-image:url(\''.esc_url($img_output).'\')">';
    $out .='
    <a class="list-services__link clearfix" href="'.esc_url($href).'">
        <i class="icon '.esc_attr($iconClass).'"></i>
        <div class="list-services__inner">
          <h3 class="list-services__title">'.esc_attr($title).'</h3>
          <div class="list-services__description">'.wp_kses_post($short_description).'</div>
        </div>
    </a>';
    $out .= '</div>';
}


$out .= '</div>';
echo $out;