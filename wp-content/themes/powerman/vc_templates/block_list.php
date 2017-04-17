<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ($css_animation)
    $css_class .= $this->getCSSAnimation($css_animation);

$powerman_img = wp_get_attachment_image_src( $image, 'large' );
$powerman_img_output = (isset($powerman_img[0]))?$powerman_img[0]:'';

do_shortcode($content);
powerman_set_global_data('powerman_list_items_count', 0);
$powerman_listItems = powerman_get_global_data('powerman_list_items');

$powerman_isAccordion = ( bool )( $use_accordion == 'Yes' );

$powerman_accordionID = rand(0,100);
?>
<?php if ($powerman_isAccordion):?>
    <div class="panel-group accordion accordion" id="accordion-<?php echo esc_attr($powerman_accordionID)?>">
        <?php $itemId = 1; foreach($powerman_listItems as $item): ?>
            <div class="panel <?php if ($itemId == 1):?>panel-default<?php endif;?>">
                <div class="panel-heading">
                    <a class="btn-collapse <?php if ($itemId == 1):?>collapsed<?php endif;?>" data-toggle="collapse" data-parent="#accordion-<?php echo esc_attr($powerman_accordionID)?>" href="#collapse-<?php echo esc_attr($itemId)?>">
                        <i class="icon <?php echo esc_attr($item['icon'])?>"></i>
                    </a>
                    <h3 class="panel-title"><?php echo esc_attr($item['title'])?></h3>
                </div>
                <div id="collapse-<?php echo esc_attr($itemId)?>" class="panel-collapse collapse <?php if ($itemId == 1):?>in<?php endif;?>">
                    <div class="panel-body">
                        <p><?php echo do_shortcode($item['content'])?></p>
                    </div>
                </div>
            </div><!-- end panel -->
        <?php $itemId++; endforeach;?>

    </div>
<?php else:?>
    <div class="section-list-block">
        <?php if (is_array($powerman_listItems)):?>
            <?php if ($powerman_img_output == ''):?>
                <dl class="list-description list-description_mod-a">
                    <?php foreach($powerman_listItems as $item): ?>
                        <dt><?php echo esc_attr($item['title'])?></dt>
                        <dd><?php echo do_shortcode($item['content'])?></dd>
                    <?php endforeach;?>
                </dl>
            <?php else:?>
                <ul class="list-block list-unstyled">
                    <?php foreach($powerman_listItems as $item): ?>
                        <li class="list-block__item">
                            <a class="list-block__link" href="<?php echo esc_url($item['link'])?>">
                                <div class="list-block__title"><?php echo esc_attr($item['title'])?></div>
                                <div class="list-block__info"><?php echo do_shortcode($item['content'])?></div>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif; ?>
        <?php endif;?>
        <?php if ($powerman_img_output != ''):?>
            <div class="list-block__img">
                <img class="img-responsive" src="<?php echo esc_url($powerman_img_output)?>" height="306" width="140" alt="<?php echo esc_html__('Images','powerman')?>">
            </div>
        <?php endif;?>
    </div>
<?php endif;?>
