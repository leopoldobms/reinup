<?php 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ($css_animation)
	$css_class .= $this->getCSSAnimation($css_animation);
$blockClass = "";
$subBlockClass = "center-block";
$isMiddle = (bool)($title_position == 'middle');
if (!strlen($subtitle_position)){
    $subtitle_position = ( $isMiddle ) ? 'bottom' : 'top';

}

if (($title_position == 'left'))
    $subBlockClass = "";

if ($isMiddle)
	$blockClass="section-list-services";
	
if ($isMiddle){
	$baseBlockClass = 'title-acenter';	
}else{
	$baseBlockClass = 'title-a' . $title_position;	
}

$blockClass .= ' ' . $baseBlockClass;
$ticClass = 'ticarea_' . str_replace(" ","-",strtolower($title));
$blockClass .= ' ' . $ticClass;
//$text_shuffle
	
?>

	<div class="<?php echo esc_attr($blockClass)?> 
                ">
		<?php if ($subtitle && $subtitle_position == 'top'):?>
			<div class="ui-subtitle-block <?php echo esc_attr($subBlockClass)?>">
				<?php echo esc_attr($subtitle)?>
			</div>
		<?php endif;?>

		<?php if ($title):?>
			<h1 class="ui-title-block">
				<?php echo esc_attr($title)?> <span class="color_primary <?php if($text_shuffle):?> shuffle<?php endif;?>"><?php echo esc_attr($ctext)?></span>

				<!--<div class="ticker-area">  
                    <ul>
						<li class="ui-subtitle-block"> <?php echo esc_attr($tickertext)?></li>
						<li class="ui-subtitle-block"> <?php echo esc_attr($tickertext)?></li>
					</ul>
				</div>-->
                   
			</h1>
		<?php endif;?>

		<div class="decor-1 decor-1_mod-a"></div>

		<?php if ($subtitle && $subtitle_position == 'bottom'):?>
			<div class="ui-subtitle-block center-block">
				<?php echo esc_attr($subtitle)?>
			</div>
		<?php endif;?>
		<div class="ui-subtitle-block-content">
			<?php echo wp_kses_post(do_shortcode($content)) ?>
		</div>
	</div>
