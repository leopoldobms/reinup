<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
?>
<?php if ($block_type == 'hor'):?>
    <ul class="advantages advantages_mod-a list-unstyled">
<?php else:?>
    <ul class="advantages list-unstyled">
<?php endif;?>

        <li class="advantages__item clearfix"> <i class="<?php echo esc_attr($icon1)?>"></i>
            <div class="advantages__inner">
                <div class="advantages__name"><?php echo esc_attr($title1)?></div>
                <div class="advantages__text"><?php echo wp_kses_post($content1)?></div>
            </div>
        </li>
        <li class="advantages__item clearfix"> <i class="<?php echo esc_attr($icon2)?>"></i>
            <div class="advantages__inner">
                <div class="advantages__name"><?php echo esc_attr($title2)?></div>
                <div class="advantages__text"><?php echo wp_kses_post($content2)?></div>
            </div>
        </li>
        <li class="advantages__item clearfix"> <i class="<?php echo esc_attr($icon3)?>"></i>
            <div class="advantages__inner">
                <div class="advantages__name"><?php echo esc_attr($title3)?></div>
                <div class="advantages__text"><?php echo wp_kses_post($content3)?></div>
            </div>
        </li>
    </ul>


			