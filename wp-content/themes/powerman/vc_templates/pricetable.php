<?php
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>


<?php echo do_shortcode($content); ?>
