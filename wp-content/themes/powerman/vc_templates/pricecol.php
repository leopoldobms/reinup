<?php
$image = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$iconClass = isset( ${"icon_" . $type} ) ? esc_attr( ${"icon_" . $type} ) : 'fa fa-adjust';
?>
<section class="price-table">
    <h3 class="price__title"><?php echo esc_attr($title)?></h3>
    <div class="price__number"><?php echo esc_attr($price)?><span class="price__info"><?php echo esc_attr($price_title)?></span></div>
    <?php echo do_shortcode($content)?>
    <a class="btn btn-info btn-effect" href="<?php echo esc_attr($link)?>"><?php echo esc_attr($btntext)?></a>
    <span class="price-list__label"><i class="icon <?php echo esc_attr($iconClass) ?>"></i></span>
</section>