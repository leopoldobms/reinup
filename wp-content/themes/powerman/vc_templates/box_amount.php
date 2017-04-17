<?php
$out = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$iconClass = isset( ${"icon_" . $type} ) ? esc_attr( ${"icon_" . $type} ) : 'fa fa-adjust';
?>
<div class="list-progress list-progress_mod-a list-unstyled list-progress__item clearfix">
<i class="icon <?php echo esc_attr($iconClass)?>"></i>
<div class="list-progress__inner">
    <span class="chart" data-percent="<?php echo esc_attr($amount)?>">
        <span class="percent"><?php echo esc_attr($amount)?></span>
        <canvas height="0" width="0"></canvas>
    </span>
    <div class="decor-1 decor-1_mod-c"></div>
    <span class="list-progress__name"><?php echo esc_attr($title)?></span>
</div>
</div>