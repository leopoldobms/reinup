<?php
/**
 * The Template for displaying all single posts.
 */
$powerman_custom =  get_post_custom(get_queried_object()->ID);
$powerman_layout = isset ($powerman_custom['pix_page_layout']) ? $powerman_custom['pix_page_layout'][0] : '2';
$powerman_sidebar = isset ($powerman_custom['pix_selected_sidebar'][0]) ? $powerman_custom['pix_selected_sidebar'][0] : 'sidebar-1';

if (!is_active_sidebar($powerman_sidebar)) $powerman_custom = '1';

get_header();
?>
<section class="section_mod-h section_mod-d border-top">
    <div class="container">
        <div class="row">
            <?php powerman_show_sidebar('left',$powerman_custom) ?>
            <div class="col-xs-12 col-sm-7 <?php if ($powerman_layout == 1):?>col-md-12<?php else:?>col-md-9<?php endif;?> col2-right  ">

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part( 'templates/post-single/content', get_post_format() );

                    // End the loop.
                endwhile;
                ?>
            </div>
            <?php powerman_show_sidebar('right',$powerman_custom) ?>
        </div>
    </div>
</section>
<?php get_footer();?>


