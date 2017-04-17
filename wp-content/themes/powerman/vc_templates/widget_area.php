<?php
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
?>
<div class="custom-widget-area">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('custom-area-1')) {} ?>
</div>

