<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	
	$c_type = (isset($c_type)) ? $c_type : '';
	
	$picon = '';
	if(function_exists('fil_init')){
		$picon = isset( ${"icon_" . $type} ) ? ${"icon_" . $type} : '';
	}
?>
<div class="ui-subtitle-block center-block text-center">
    <?php echo wp_kses_post($heading)?>
</div>
<div class="staff list-unstyled">
    <?php echo do_shortcode($content); ?>
</div>