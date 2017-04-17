<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $full_width = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
$output = $after_output = $carousel_type = $bordertype = $section_additional_class = $pscrollreveal = $usecontainer = $secbottomimage = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$section_classes = array();
$scbottomimg = wp_get_attachment_image_src( $secbottomimage, 'full' );
$scbottomimg_output = (isset($scbottomimg[0]))?$scbottomimg[0]:'';


if(function_exists('fil_init')){
    $picon = isset( ${"icon_" . $type} ) ? ${"icon_" . $type} : '';
}


$class_preset_text = ($ptextcolor) ? ' text-'.strtolower($ptextcolor) : '';
$class_scrollreveal = ($pscrollreveal == 'Yes') ? 'scrollreveal' : '';


$class_border_type = ($bordertype) ? ' border-'.strtolower($bordertype) : '';
$section_classes[] = $class_border_type;

if ($bordertype && $bordertype != 'None'){
    //$section_additional_class = 'section_mod-d';
    $section_classes[] = 'section_mod-d';
}







if ($ptextcolor == "Default")
    $class_preset_text = "";

$carouselTypeClass = "";
if ($carousel_type != ""){
    $carouselTypeClass = 'carousel-type-' . esc_attr($carousel_type);
}


wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
    'vc_row',
    'wpb_row', //deprecated
    'vc_row-fluid',
    $pixoverflow,
    $carouselTypeClass,
    $class_preset_text,
    $class_scrollreveal,
    //$class_border_type,
    //$section_additional_class,
    $el_class,
    vc_shortcode_custom_css_class( $css ),
);


$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
    $wrapper_attributes[] = 'data-vc-full-width="true"';
    $wrapper_attributes[] = 'data-vc-full-width-init="false"';
    if ( 'stretch_row_content' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
    } elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $css_classes[] = 'vc_row-no-padding';
    }
    $after_output .= '<div class="vc_row-full-width"></div>';
}

if ( ! empty( $full_height ) ) {
    $css_classes[] = ' vc_row-o-full-height';
    if ( ! empty( $content_placement ) ) {
        $css_classes[] = ' vc_row-o-content-' . $content_placement;
    }
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

if ( $has_video_bg ) {
    $parallax = $video_bg_parallax;
    $parallax_image = $video_bg_url;
    $css_classes[] = ' vc_video-bg-container';
    wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
    wp_enqueue_script( 'vc_jquery_skrollr_js' );
    $wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
    $css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
    if ( strpos( $parallax, 'fade' ) !== false ) {
        $css_classes[] = 'js-vc_parallax-o-fade';
        $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
    } elseif ( strpos( $parallax, 'fixed' ) !== false ) {
        $css_classes[] = 'js-vc_parallax-o-fixed';
    }
}

if ( ! empty ( $parallax_image ) ) {
    if ( $has_video_bg ) {
        $parallax_image_src = $parallax_image;
    } else {
        $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
        $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
        if ( ! empty( $parallax_image_src[0] ) ) {
            $parallax_image_src = $parallax_image_src[0];
        }
    }
    $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div class="vc_row_anchor js_stretch_anchor">';
if( $panchor == "Yes" && isset( $el_id ) && ! empty( $el_id ) ) {
    if(function_exists('fil_init') && $picon != ''){
        $output .= '
		<div class="wrap-anchor">
			<a href="#'.esc_attr( $el_id ).'"><div class="top-icon-block icon-image"><i class="'.esc_attr( $picon ).'"></i></div></a>
		</div>';
    }else{
        $output .= '
		<div class="wrap-anchor">
			<a href="#'.esc_attr( $el_id ).'"><div class="top-icon-block"></div></a>
		</div>';
    }

}elseif( function_exists('fil_init') && $picon != '' ){
    $output .= '<div class="top-icon-block icon-image"><i class="'.esc_attr( $picon ).'"></i></div>';
}
$output .= '</div>';

if ($pixoverlay && strlen($pixoverlay)){
    $wrapper_attributes[] = 'style="position:relative"';
}

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
if ($pixoverlay && strlen($pixoverlay)){
    $ovOpacity = ($pixoverlayopacity)?$pixoverlayopacity:"0.1";

    $background_color = '';

    preg_match_all( '/{([^\}]+)/i', $css, $matches, PREG_OFFSET_CAPTURE );
    if(isset($matches[1][0][0])){

        foreach( explode( ';', $matches[1][0][0] ) as $val ){
            if( substr_count($val, 'background')>0){

                foreach( explode( ' ', $val ) as $val_exp ){

                    if( substr_count($val_exp, '#')>0 ){
                        $background_color = $val_exp;
                    }
                }
            }
        }
    }



    $output .= '<span class="vc_row-overlay" style="background-color: '.$background_color.'; opacity:'.$ovOpacity.';"></span>';
}

$sectionClass = implode(' ',$section_classes);
$styleImg = '';

if ($scbottomimg_output != ''){
    $styleImg = 'style="background:url(\''.$scbottomimg_output.'\') no-repeat 50% 100%;padding-bottom:340px"';
}

$output .= '<section class="'.$sectionClass.'" '.$styleImg.'>';

if ($usecontainer == 'yes'||  empty( $full_width ) ){
    //$output .= '<div class="container">';
}



$output .= wpb_js_remove_wpautop( $content );
if ($usecontainer == 'yes'){
    //$output .= '</div>';
}
$output .= '</section></div>';



$output .= $after_output;

echo $output;