<?php

$powerman_custom =  get_post_custom(get_the_ID());
$powerman_layout = isset ($powerman_custom['_page_layout']) ? $powerman_custom['_page_layout'][0] : '1';
$powerman_blogType = (int)powerman_get_option('blog_settings_type',1);
?>

<?php if ( ! have_posts() ) : ?>
    <div  class="post error404 not-found">
        <h1 class="entry-title"><?php esc_html_e( 'Not Found', 'powerman' ); ?></h1>
        <div class="entry-content">
            <p><?php esc_html_e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'powerman' ); ?></p>
            <?php get_search_form(); ?>
        </div><!-- .entry-content -->
    </div><!-- #post-0 -->
<?php endif; ?>
<main class="main-content">
    <div class="post-wrap_mod-b">
        <div class="blog <?php if ($powerman_blogType === 1):?>blog-additional<?php endif;?>">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php
                $powerman_format  = get_post_format();
                
                $powerman_format = !in_array($powerman_format, array("quote", "gallery", "video")) ? 'standard' : $powerman_format;
                ?>
                <article class="post post_mod-b clearfix <?php if (is_sticky( get_the_ID() )): ?>post-sticky<?php endif;?> blog-item-<?php echo esc_attr(get_post_format())?>"">
                    <?php get_template_part( 'templates/post-parts/post-format/blog', $powerman_format); ?>
                </article>

            <?php endwhile;?>
        </div>
    </div>
</main>