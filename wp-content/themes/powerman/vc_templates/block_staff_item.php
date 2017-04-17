<?php 
	$image = '';
    $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    extract( $atts );
	
	$img = wp_get_attachment_image_src( $avatar , 'full' );		
	$img_output = $img[0];
?>
<div class="staff__item">
    <div class="staff__img">
        <img class="img-responsive" src="<?php echo esc_url($img_output)?>" height="407" width="262" alt="<?php echo esc_attr($name)?>">
        <div class="staff__hover">
            <ul class="social-links">
                <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
                <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
                <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a></li>
                <li><a class="icon fa fa-pinterest-p" href="javascript:void(0);"></a></li>
            </ul>
        </div>
    </div>
    <div class="staff__title">
        <div class="staff__name"><?php echo esc_attr($name)?></div>
        <div class="staff__categories"><?php echo esc_attr($postition)?></div>
    </div>
</div>