<?php


$out = $css_class = $cnt = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class .= $this->getCSSAnimation($css_animation);

if (!isset($block_type)) $block_type = false;

$args = array(
    'posts_per_page'   => $count,
    'offset'           => 0,
    'category'         => '',
    'category_name'    => '',
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'post',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'post_status'      => 'publish',
    'suppress_filters' => true
);
$posts_array = get_posts( $args );
$picon = '';
if(function_exists('fil_init')){
    $picon = isset( ${"icon_" . $type} ) ? ${"icon_" . $type} : '';
}
?>

<?php if ($block_type != 'hor'):?>

    <div class="blog-preview">

        <h3 class="title-primary font-additional font-weight-bold text-uppercase zoomIn" style="visibility: visible; "><?php echo esc_attr($title)?></h3>
        <?php if (strlen($picon)):?>
            <div class="starSeparator">
                <span aria-hidden="true" class="<?php echo esc_attr($picon)?>"></span>
            </div>
        <?php endif;?>
        <?php for( $i=0; $i < sizeof($posts_array); $i++ ):
            $post = $posts_array[$i];


            if (function_exists('rwmb_meta')){
                $powerman_content = rwmb_meta('post_quote_content');
                $powerman_source = rwmb_meta('post_quote_source');
            }else{
                $powerman_content = get_post_meta( $post->ID, 'post_quote_content', true );
                $powerman_source = get_post_meta( $post->ID, 'post_quote_source', true );
            }
            $powerman_format = get_post_format();
            $powerman_format = !in_array($powerman_format, array("quote", "gallery", "video")) ? "standard" : $powerman_format;
            $icon = array("standard" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");

            $custom =  get_post_custom($post->ID);
            $thumbnailId = (isset($custom['post_standard']))?reset($custom['post_standard']):false;

            if (!$thumbnailId){
                $thumbnailId = get_post_thumbnail_id($post->ID);
            }


            $thumbnailSrc = wp_get_attachment_url($thumbnailId);


            ?>






            <div class="blog-preview_item">
                <a href="<?php echo esc_url(get_the_permalink($post->ID))?>" class="blog-preview_image">
                    <?php if ( has_post_thumbnail($post->ID) ):?>
                        <img class="attachment-post-thumbnail wp-post-image" src="<?php echo esc_url($thumbnailSrc)?>"/>
                    <?php else:?>
                        <img src="<?php echo get_template_directory_uri() . '/images/noimage.jpg'?>" alt="<?php echo esc_attr(get_the_title($post->ID))?>"/>
                    <?php endif ?>
                    <?php if ($show_dc):?>
                        <div class="blog-preview_posted">
                            <span class="blog-preview_date font-additional font-weight-bold text-uppercase"><?php echo esc_attr(date('d',strtotime($post->post_date))) . ' ' . esc_attr(date('M',strtotime($post->post_date))) ?></span>
                            <span class="blog-preview_comments font-additional font-weight-normal text-uppercase"><?php echo esc_attr($post->comment_count)?> <?php echo esc_html__('comment(s)','powerman')?></span>
                        </div>
                    <?php endif;?>
                </a>
                <div class="blog-preview_info">
                    <h4 class="blog-preview_title font-additional font-weight-bold text-uppercase"><?php echo esc_attr(get_the_title($post->ID))?></h4>
                    <div class="blog-preview_desc font-main font-weight-normal"><?php $content = get_the_content($post->ID);
                        $trimmed_content = preg_replace("#\[.*?\]#is",'',$content);
                        $trimmed_content = wp_trim_words( $trimmed_content, 60);

                        ?>
                        <p><?php echo esc_html($trimmed_content); ?></p></div>
                    <a class="blog-preview_btn button-border font-additional font-weight-normal before-bg text-uppercase hvr-rectangle-out hover-focus-bg" href="<?php echo esc_url(get_the_permalink($post->ID))?>"><?php echo esc_html__('MORE','powerman')?></a>
                </div>
            </div>



        <?php endfor;?>
    </div>

<?php else:?>
    <div class="post-wrap_mod-a">
        <?php for( $i=0; $i < sizeof($posts_array); $i++ ):
        $post = $posts_array[$i];

        setup_postdata($post);
        if (function_exists('rwmb_meta')){
            $powerman_content = rwmb_meta('post_quote_content');
            $powerman_source = rwmb_meta('post_quote_source');
        }else{
            $powerman_content = get_post_meta( $post->ID, 'post_quote_content', true );
            $powerman_source = get_post_meta( $post->ID, 'post_quote_source', true );
        }
        $powerman_format = get_post_format();
        $powerman_format = !in_array($powerman_format, array("quote", "gallery", "video")) ? "standard" : $powerman_format;
        $icon = array("standard" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");

        $custom =  get_post_custom($post->ID);
        $thumbnailId = (isset($custom['post_standard']))?reset($custom['post_standard']):false;

        if (!$thumbnailId){
            $thumbnailId = get_post_thumbnail_id($post->ID);
        }


        $thumbnailSrc = wp_get_attachment_url($thumbnailId);
        $authorName = get_the_author_meta('display_name', $post->post_author);

        ?>
            <article class="post post_mod-a clearfix">
                <div class="entry-media">
                    <?php if ( has_post_thumbnail($post->ID) ):?>
                        <a href="<?php echo esc_url($thumbnailSrc)?>" rel="prettyPhoto">
                            <img class="img-responsive" src="<?php echo esc_url($thumbnailSrc)?>" height="256" width="360" alt="<?php echo esc_attr(get_the_title($post->ID))?>">
                        </a>

                    <?php endif ?>

                </div>

                <div class="entry-main">
                    <div class="entry-header">
                        <h3 class="entry-title"><a href="<?php echo esc_url(get_the_permalink($post->ID))?>"><?php echo esc_attr(get_the_title($post->ID))?></a></h3>
                        <div class="entry-meta">
                            <span class="entry-meta__item"><i class="icon icon-user"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo esc_attr($authorName)?></a></span>
                            <span class="entry-meta__item"><i class="icon icon-bubble"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo esc_attr($post->comment_count)?></a></span>
                            <span class="entry-meta__item"><i class="icon icon-share"></i><a class="entry-meta__link" href="<?php echo esc_url(get_the_permalink($post->ID))?>#blog_post_share"><?php echo esc_attr__('Share','powerman')?></a></span>
                        </div>
                        <div class="entry-date"><span class="entry-date__inner"><?php echo esc_attr(date('d',strtotime($post->post_date))) . ' ' . esc_attr(date('M',strtotime($post->post_date))) ?></span></div>
                    </div>
                </div>
            </article><!-- end post -->
        <?php endfor;?>

    </div>

<?php endif;?>

