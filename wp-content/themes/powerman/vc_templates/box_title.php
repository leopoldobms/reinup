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

$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';
?>
<h3 class="footer__title"><?php echo esc_attr($title)?></h3>
<?php if (strlen($title)):?>
    <span class="decor-1 decor-1_mod-b"></span>
<?php endif;?>
<?php echo wp_kses_post(do_shortcode($content)) ?>