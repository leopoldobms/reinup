<div class="row">
    <div class="col-md-8">
        <?php echo do_shortcode('[contact-form-7 id="'.$left_form.'"]')?>
        
    </div>
    <!-- end col -->
    <div class="col-md-4">
        <section class="section_mod-c wow bounceInRight animated" data-wow-duration="2s" data-sr-id="12" style="; visibility: visible; transform: translateY(0) scale(1); opacity: 1; -webkit-transform: translateY(0) scale(1); opacity: 1;transition: transform 0.5s cubic-bezier( 0.6, 0.2, 0.1, 1 ) 0s, opacity 0.5s cubic-bezier( 0.6, 0.2, 0.1, 1 ) 0s; -webkit-transition: -webkit-transform 0.5s cubic-bezier( 0.6, 0.2, 0.1, 1 ) 0s, opacity 0.5s cubic-bezier( 0.6, 0.2, 0.1, 1 ) 0s; ">
            <div class="section__inner">
                <?php powerman_get_staticblock_content($right_block) ?>
            </div>
        </section>
    </div>
    <!-- end col -->
</div>