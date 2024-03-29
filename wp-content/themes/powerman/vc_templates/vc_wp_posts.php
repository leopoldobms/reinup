<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $number
 * @var $show_date
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Wp_Posts
 */
$title = $number = $show_date = $el_class = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$output = '<div class="vc_wp_posts wpb_content_element' . esc_attr( $el_class ) . '">';
$type = 'WP_Widget_Recent_Posts';
$args = array(
    'before_widget' => '<div class="widget %s">',
    'after_widget'  => "</div>",
    'before_title'  => '<h3 class="footer__title">',
    'after_title'   => '</h3><div class="decor-1 decor-1_mod-b"></div>',
);




global $wp_widget_factory;
// to avoid unwanted warnings let's check before using widget
if ( is_object( $wp_widget_factory ) && isset( $wp_widget_factory->widgets, $wp_widget_factory->widgets[ $type ] ) ) {
    ob_start();
    the_widget( $type, $atts, $args );
    $output .= ob_get_clean();

    $output .= '</div>';

    echo $output;
} else {
    echo $this->debugComment( 'Widget ' . esc_attr( $type ) . 'Not found in : vc_wp_posts' );
}
