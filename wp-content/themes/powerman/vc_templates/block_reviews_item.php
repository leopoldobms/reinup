<?php 
	$image = '';
    $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    extract( $atts );
	
	$img = wp_get_attachment_image_src( $avatar , 'thumbnail' );
	$img_output = $img[0];
?>
<div class="reviews reviews_mod-a">
    <div class="reviews__img">
        <img class="img-responsive" src="<?php echo esc_url($img_output)?>" height="85" width="85" alt="<?php echo esc_attr($name)?>">
    </div>
    <div class="reviews__text">
        <?php echo wp_kses_post($content)?>
    </div>
    <div class="reviews__title">
        <div class="reviews__autor"><?php echo esc_attr($name)?></div>
        <div class="reviews__categorie"><?php echo esc_attr($postition)?></div>
    </div>
</div>
