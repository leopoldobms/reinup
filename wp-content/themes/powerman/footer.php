<?php
$powerman_footerStaticBlockID = false;

if (powerman_get_global_data('powerman_footer_type_page')){
    $powerman_ftype = powerman_get_global_data('powerman_footer_type_page');
    if (is_array($powerman_ftype)){
        $powerman_ftype = reset($powerman_ftype);
    }
    $powerman_footer_type_page = esc_attr($powerman_ftype);
    if (is_array($powerman_footer_type_page)){
        foreach($powerman_footer_type_page as $key => $pftp){
            if ($pftp == 'global')
                unset($powerman_footer_type_page[$key]);
        }

    }
    $powerman_footerStaticBlockID = $powerman_footer_type_page;
}



$powerman_footerStaticBlockGlobalID = powerman_get_option('footer_block');


$powerman_bottomBlock = html_entity_decode(powerman_get_option('footer_settings_bblock',''));



?>


<footer class="footer">
    <div class="footer-main">
        <div class="section__inner">
            <div class="container">
                <?php powerman_get_staticblock_content($powerman_footerStaticBlockGlobalID) ?>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end section__inner -->
    </div>
    <!-- end footer-main -->

    <div class="footer-form">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php do_action('powerman_display_after_footer') ?>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end footer-form -->

    <div class="copyright border-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <?php echo wp_kses_post($powerman_bottomBlock)?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->
</footer>
</div></div>

<?php wp_footer(); ?>

</body></html>