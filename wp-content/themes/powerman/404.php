<?php /*** The template for displaying 404 pages (not found) ***/ ?>

<?php get_header();?>

<div class="section_mod-d section_mod-j border-top">
    <section class="p-404">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <i class="icon flaticon-hammer6"></i>
                    <div class="ui-subtitle-block"><?php echo esc_html__('handyman powerman_tax_services','powerman')?></div>
                    <h2 class="p-404__title"><?php echo esc_html__('powerman','powerman')?></h2>
                    <div class="decor-1 decor-1_mod-a"></div>
                </div><!-- end col -->
                <div class="col-md-7">
                    <img class="p-404__img img-responsive" src="<?php echo get_template_directory_uri()?>/media/p-404/1.png" height="274" width="371" alt="error 404">
                    <div class="p-404__subtitle"><?php echo esc_html__('Sorry, the page could not be found!','powerman')?></div>
                    <div class="p-404__info"><?php echo esc_html__('Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmo labore dolore aliqua tenim ad minim veniam quis nostrud laboris alquap.','powerman')?></div>
                    <a class="p-404__btn btn btn-info btn-effect" href="javascript:void(0);"><?php echo esc_html__('back to home','powerman')?></a>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end p-404 -->
</div>

<?php get_footer(); ?>
