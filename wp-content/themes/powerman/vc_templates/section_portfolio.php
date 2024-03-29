<?php
global $post;
$out = $cnt = '';
$fposition = 'left';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( $cats == '' ):
    $out .= '<p>'.esc_html__('No categories selected. To fix this, please login to your WP Admin area and set the categories you want to show by editing this shortcode and setting one or more categories in the multi checkbox field "Categories".', 'powerman');
else:



    $out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';
    $out .= '
        <div id="pix-portfolio"  class="portfolio-view "  >



            <div class="container">
                <div class="row">


        <div class="isotope-portfolio-row">
          <div class="text-'.esc_attr($fposition).' filter ">

                    <ul  id="filter"  class="portfolio-filter non-paginated">
                        <li><a href="#" class="current" data-filter="*">'. esc_html__('All' , 'powerman').'</a></li>';
    $MyWalker = new PowermanPortfolioWalker();
    $args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '1', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '0', 'echo' => 0);
    $categories = wp_list_categories ($args);
    $out .= '
                        '.$categories.'
                    </ul>

                </div>

            </div>

            </div>

            </div>



        <div>
            <div class="isotope-frame portfolio-col-'.esc_attr($perrow).'">
                <div class="isotope-filter isotope" >';

    $portfolio_posts_to_query = get_objects_in_term( explode( ",", $cats ), 'portfolio_category');
    $args = array(
        'post_type' => 'portfolio',
        'orderby' => 'menu_order',
        'post__in' => $portfolio_posts_to_query,
        'order' => 'ASC'
    );
    if( is_numeric($count) )
        $args['showposts'] = $count;
    else
        $args['numberposts'] = -1;

    $wp_query = new WP_Query( $args );

    if ($wp_query->have_posts()):
        while ($wp_query->have_posts()) :
            $wp_query->the_post();
            $cnt++;
            $custom = get_post_custom($post->ID);
            $powerman_pix_format = '';
            if (isset($custom['post_types_select']) && isset($custom['post_types_select'][0])){
                $powerman_pix_format = $custom['post_types_select'][0];
            }


            $cats = wp_get_object_terms($post->ID, 'portfolio_category');

            if ($cats){
                $cat_slugs = '';
                $cat_href = '';
                foreach( $cats as $cat ){
                    $cat_slugs .= $cat->slug . " ";
                    $cat_href .= '<a href="'.esc_url(get_term_link( $cat )).'">' . wp_kses_post($cat->name) . "</a>, ";
                }
            }

            $link = '';
            $thumb_size = get_post_meta( get_the_ID(), 'thumb_size', true );
            $img_size = $thumb_size != '' ? 'garden_pix-'.$thumb_size : 'garden_pix-portfolio-thumb';
            $img_size = $perrow == 'default' ? $img_size : 'garden_pix-portfolio-thumb-col2';

            $thumbnail = get_the_post_thumbnail($post->ID, $img_size, array('class' => 'cover'));

            $out .= '<div class="gallery__item isotope-item '.esc_attr($cat_slugs).' '.esc_attr($img_size).'" >';

            switch ($powerman_pix_format){

                case 'image':

                    $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
                    $link = $full_image[0]; //rel="prettyPhoto[pp_gal_'.esc_attr($post->ID).']" <a href="" class="zoomPhoto"> 114
                    $out .= '
                        <div class="ih-item square effect13 left_to_right">
                            <a href="'.esc_url(get_the_permalink(get_the_ID())).'">
                                <div class="img">
                                    <img src="'.esc_url($link).'" alt="'.wp_kses_post(get_the_title()).'">
                                </div>
                                <div class="info">
                                    <i class="icon icon-magnifier-add"></i>
                                    <div class="gallery__title">'.wp_kses_post(get_the_title()).'</div>
                                    <div class="gallery__categorie">'. wp_kses_post($cat->name) .'</div>
                                </div>
                            </a>
                        </div>
                        ';
                    break;


                case 'video':
                	$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
                    $link = $full_image[0]; 
                    $video_embed_code = get_post_meta( get_the_ID(), 'post_video_href', true );
                    $video_width = get_post_meta( get_the_ID(), 'post_video_width', true );
                        $video_height = get_post_meta( get_the_ID(), 'post_video_height', true );
                    $out .= '
                        <div class="ih-item square effect13 left_to_right">
                            <a href="'.esc_url(get_the_permalink(get_the_ID())).'">
                                <div class="img">
                                    <img src="'.esc_url($link).'" alt="'.wp_kses_post(get_the_title()).'">
                                </div>
                                <div class="info">
                                    <i class="icon icon-magnifier-add"></i>
                                    <div class="gallery__title">'.wp_kses_post(get_the_title()).'</div>
                                    <div class="gallery__categorie">'. wp_kses_post($cat->name) .'</div>
                                </div>
                            </a>
                        </div>
                        ';
                    /*$out .= '
                        <div class="detail-item">
                    <div class="name"><a href="'.esc_url(get_the_permalink(get_the_ID())).'">'.wp_kses_post(get_the_title()).'</a></div>
                            <p>'.powerman_limit_words(get_the_excerpt(), 20).'</p>';
                    if ( get_post_meta( get_the_ID(), 'post_video_href', true ) !== '' ):
                        $video_embed_code = get_post_meta( get_the_ID(), 'post_video_href', true );
                        $video_width = get_post_meta( get_the_ID(), 'post_video_width', true );
                        $video_height = get_post_meta( get_the_ID(), 'post_video_height', true );

                        $out .= '				<a  href="'.esc_url($video_embed_code).'?width='.esc_attr($video_width).'&amp;height='. esc_attr($video_height).'" class="btn btn-primary btn-lg  video-popab"   >
                                    <i class="fa fa-play-circle"></i>
                                </a>';
                    endif;
                    $out .= '
                        </div>';*/
                    break;

                default:
                    $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
                    $link = $full_image[0]; //rel="prettyPhoto[pp_gal_'.esc_attr($post->ID).']" <a href="" class="zoomPhoto"> 114
                    $out .= '
                        <div class="ih-item square effect13 left_to_right">
                            <a  href="'.esc_url(get_the_permalink(get_the_ID())).'">
                                <div class="img">
                                    <img src="'.esc_url($link).'" alt="'.wp_kses_post(get_the_title()).'">
                                </div>
                                <div class="info">
                                    <i class="icon icon-magnifier-add"></i>
                                    <div class="gallery__title">'.wp_kses_post(get_the_title()).'</div>
                                    <div class="gallery__categorie">'. wp_kses_post($cat->name) .'</div>
                                </div>
                            </a>
                        </div>
                        ';

                    break;
            }
            $out .= '
                </div>';

        endwhile;
    endif;

    $out .= '
                </div>	<!--end-->
            </div> <!--end isotop frame-->
        </div>';

    $out .= '
        </div>

    ';
    $out .= '</div>';
endif;
echo $out;