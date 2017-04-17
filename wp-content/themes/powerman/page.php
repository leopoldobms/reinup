<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 *
 */


$powerman_custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
$powerman_layout = isset ($powerman_custom['pix_page_layout']) ? $powerman_custom['pix_page_layout'][0] : '2';
$powerman_sidebar = isset ($powerman_custom['pix_selected_sidebar'][0]) ? $powerman_custom['pix_selected_sidebar'][0] : 'sidebar-1';
if (!is_active_sidebar($powerman_sidebar)) $powerman_layout = '1';
?>

<?php get_header();?>


<div class="container">


            <div class="row">
                <?php powerman_show_sidebar('left',$powerman_custom) ?>
                <div class="col-xs-12 col-sm-7 <?php if ($powerman_layout == 1):?>col-md-12<?php else:?>col-md-9<?php endif;?> col2-right  ">

                    <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                        $powerman_page = $post;
                        ?>
                        <div class="rtd">  <?php the_content(); ?> </div>
                        <?php if('open' == $powerman_page->comment_status) : ?>
                            <div class="section-comment ">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?>

                </div>
                <?php powerman_show_sidebar('right',$powerman_custom) ?>
            </div>

    
</div>

<?php get_footer(); ?>