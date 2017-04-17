<?php
$powerman_custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
$powerman_layout = isset ($powerman_custom['pix_page_layout']) ? $powerman_custom['pix_page_layout'][0] : '2';
$powerman_sidebar = isset ($powerman_custom['pix_selected_sidebar'][0]) ? $powerman_custom['pix_selected_sidebar'][0] : 'sidebar-1';
if (!is_active_sidebar($powerman_sidebar)) $powerman_layout = '1';
?>

<?php get_header();?>
    <section class="section_mod-h section_mod-d border-top">
        <div class="container">
            <div class="row">
                <?php powerman_show_sidebar('left',$powerman_custom) ?>
                <div class="col-xs-12 col-sm-7 <?php if ($powerman_layout == 1):?>col-md-12<?php else:?>col-md-9<?php endif;?> col2-right  ">

                    <?php if ( have_posts() ) : ?>

                        <?php
                        if ( have_posts() )
                            the_post();
                        rewind_posts();
                        get_template_part( 'loop', 'archive' );
                        ?>
                    <?php endif ?>
                    <?php the_posts_pagination( array(
                        'prev_text'          => esc_html__( 'Previous', 'powerman' ),
                        'next_text'          => esc_html__( 'Next', 'powerman' ),
                        'screen_reader_text' => esc_html__( '&nbsp;', 'powerman'),
                        'type' => 'list'
                    ) ); ?>

                </div>
                <?php powerman_show_sidebar('right',$powerman_custom) ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
                    