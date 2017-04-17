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


<?php if ($c_type == 'type2'):?>
<div class="slider-reviews owl-carousel owl-theme owl-theme_mod-b enable-owl-carousel"
     data-pagination="true"
     data-single-item="true"
     data-auto-play="7000"
     data-transition-style="fade"
     data-main-text-animation="true"
     data-after-init-delay="3000"
     data-after-move-delay="1000"
     data-stop-on-hover="true">

    <?php echo do_shortcode($content); ?>
<?php else:?>
<div class="slider-reviews slider-reviews_mod-a owl-carousel owl-theme owl-theme_mod-a enable-owl-carousel"
     data-min480="1"
     data-min768="2"
     data-min992="2"
     data-min1200="2"
     data-pagination="true"
     data-navigation="false"
     data-auto-play="4000"
     data-stop-on-hover="true">

    <?php echo do_shortcode($content); ?>

</div>
<?php endif;?>
<!-- end slider-reviews -->

