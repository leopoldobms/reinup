<?php


$out = $image = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$img = wp_get_attachment_image_src( $image, 'large' );
$img_output = (isset($img[0]))?$img[0]:'';
$cssAnimationHtmlStart = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '';
$cssAnimationHtmlEnd = $css_animation != '' ? '</div>' : '';

$blockClass = ($block_type == 'bordered') ? 'foto-link' : 'video-block__link';
if ( $block_type == 'video' )
	$blockClass = 'video-block__link_type2';



$blockFigureClass = ($block_type == 'bordered') ? 'foto-link__inner' : '';
?>

<?php echo esc_html($cssAnimationHtmlStart) ?>
    <?php if ($overlay && strlen($overlay)):
        $ovOpacity = ($overlayopacity)?$overlayopacity:"0.1";
        ?>

        <span class="vc_row-overlay" style="background-color: rgba(0,0,0,<?php echo esc_attr($ovOpacity) ?>) !important;"></span>
    <?php endif; ?>
    <?php if ($title):?>
        <h2 class="video-block__title"><?php echo esc_attr($title)?></h2>
        <p><?php echo esc_attr($subtitle)?></p>
    <?php endif;?>
    <a class="<?php echo esc_attr($blockClass)?>" href="<?php echo esc_url($url)?>">
        <figure class="<?php esc_attr($blockFigureClass)?> effect-bubba">
            <img class="img-responsive" src="<?php echo esc_url($img_output)?>"  alt="<?php echo esc_attr($title)?>">
            <figcaption>
            </figcaption>
        </figure>
    </a>
<?php echo esc_html($cssAnimationHtmlEnd) ?>