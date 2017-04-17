<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$powerman_img = wp_get_attachment_image_src( $image , 'full' );
$powerman_img_output = $powerman_img[0];

?>
<div class="list-clients__item">
	<a href="<?php echo esc_url($url)?>">
		<img src="<?php echo esc_url($powerman_img_output)?>" height="70" width="124" alt="<?php echo esc_attr('url')?>">
	</a>
    <span class="helper"></span>
</div>
