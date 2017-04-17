<?php header("Content-type: text/css; charset: UTF-8");
$powerman_parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $powerman_parse_uri[0] . 'wp-load.php' );


$powerman_first_color = powerman_get_option('color_first_color');
$powerman_second_color = powerman_get_option('color_second_color');

$powerman_header_color = powerman_get_option('color_header_color');
$powerman_footer_color = powerman_get_option('color_footer_color');
$powerman_title_color = powerman_get_option('color_title_color');
$powerman_price_color = powerman_get_option('color_price_color');
$powerman_buttons_color = powerman_get_option('color_buttons_color');
$powerman_menu_color = powerman_get_option('color_menu_color');
$powerman_prefooter_color = powerman_get_option('color_prefooter_color');


$powerman_live_preview = array();
if(class_exists('WP_Session')) {
    $powerman_wp_session = WP_Session::get_instance();
    $powerman_customize_live_preview = array();
    if (isset($powerman_wp_session['customize_live_preview'])){
        $powerman_customize_live_preview = $powerman_wp_session['customize_live_preview'];


        $powerman_first_color = isset($powerman_customize_live_preview['pixtheme_color_first_colo'])?$powerman_customize_live_preview['pixtheme_color_first_colo']:powerman_get_option('color_first_color');
        $powerman_second_color = isset($powerman_customize_live_preview['pixtheme_color_second_colo'])?$powerman_customize_live_preview['pixtheme_color_second_colo']:powerman_get_option('color_second_color');

        $powerman_header_color = isset($powerman_customize_live_preview['pixtheme_color_header_colo'])?$powerman_customize_live_preview['pixtheme_color_header_colo']:powerman_get_option('color_header_color');
        $powerman_footer_color = isset($powerman_customize_live_preview['pixtheme_color_footer_colo'])?$powerman_customize_live_preview['pixtheme_color_footer_colo']:powerman_get_option('color_footer_color');
        $powerman_title_color = isset($powerman_customize_live_preview['pixtheme_color_title_colo'])?$powerman_customize_live_preview['pixtheme_color_title_colo']:powerman_get_option('color_title_color');
        $powerman_price_color = isset($powerman_customize_live_preview['pixtheme_color_price_colo'])?$powerman_customize_live_preview['pixtheme_color_price_colo']:powerman_get_option('color_price_color');
        $powerman_buttons_color = isset($powerman_customize_live_preview['pixtheme_color_buttons_colo'])?$powerman_customize_live_preview['pixtheme_color_buttons_colo']:powerman_get_option('color_buttons_color');
        $powerman_menu_color = isset($powerman_customize_live_preview['pixtheme_color_menu_colo'])?$powerman_customize_live_preview['pixtheme_color_menu_colo']:powerman_get_option('color_menu_color');
        $powerman_prefooter_color = isset($powerman_customize_live_preview['pixtheme_color_prefooter_colo'])?$powerman_customize_live_preview['pixtheme_color_prefooter_colo']:powerman_get_option('color_prefooter_color');




    }
//    foreach ($powerman_wp_session){

    //  }


}else {
    $powerman_customize_live_preview = get_option( 'powerman_customize_live_preview' );
    update_option('powerman_customize_live_preview', '');

    $powerman_first_color = isset($powerman_customize_live_preview['pixtheme_color_first_colo'])?$powerman_customize_live_preview['pixtheme_color_first_colo']:powerman_get_option('color_first_color');
    $powerman_second_color = isset($powerman_customize_live_preview['pixtheme_color_second_colo'])?$powerman_customize_live_preview['pixtheme_color_second_colo']:powerman_get_option('color_second_color');

    $powerman_header_color = isset($powerman_customize_live_preview['pixtheme_color_header_colo'])?$powerman_customize_live_preview['pixtheme_color_header_colo']:powerman_get_option('color_header_color');
    $powerman_footer_color = isset($powerman_customize_live_preview['pixtheme_color_footer_colo'])?$powerman_customize_live_preview['pixtheme_color_footer_colo']:powerman_get_option('color_footer_color');
    $powerman_title_color = isset($powerman_customize_live_preview['pixtheme_color_title_colo'])?$powerman_customize_live_preview['pixtheme_color_title_colo']:powerman_get_option('color_title_color');
    $powerman_price_color = isset($powerman_customize_live_preview['pixtheme_color_price_colo'])?$powerman_customize_live_preview['pixtheme_color_price_colo']:powerman_get_option('color_price_color');
    $powerman_buttons_color = isset($powerman_customize_live_preview['pixtheme_color_buttons_colo'])?$powerman_customize_live_preview['pixtheme_color_buttons_colo']:powerman_get_option('color_buttons_color');
    $powerman_menu_color = isset($powerman_customize_live_preview['pixtheme_color_menu_colo'])?$powerman_customize_live_preview['pixtheme_color_menu_colo']:powerman_get_option('color_menu_color');
    $powerman_prefooter_color = isset($powerman_customize_live_preview['pixtheme_color_prefooter_colo'])?$powerman_customize_live_preview['pixtheme_color_prefooter_colo']:powerman_get_option('color_prefooter_color');


}


?>


 

a,
.color_primary,
.list-services__item:hover .list-services__title,
.list-progress_mod-a .percent,
.gallery__categorie,
.reviews__title:before,
.advantages__item:hover .icon,
.footer-list__link:hover,
.price:hover .price__title,
.price:hover .price__number,
.pagination > li:first-child > a:hover,
.pagination > li:first-child > span:hover,
.pagination > li:last-child > a:hover,
.pagination > li:last-child > span:hover,
.main-slider .icon.color_primary,
.list-widget__link:hover:before,
.list-widget__link:hover:hover:before,
.post-nav__item .icon,
.post-nav__item:hover .post-nav__name,
.p-404 .icon {color: <?php echo esc_attr($powerman_first_color)?>;}


.bg-color_primary,
.header-main__inner,
.social-links > li > a:hover,
.decor-1,
.section-banner-1,
.btn:after,
.list-services__item:hover .icon,
.staff__item:hover .staff__title,
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span,
.filter li a:hover,
.section_mod-b,
.footer-form,
.header.sticky .navbar,
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus,
.list-services-2__bg,
.post .entry-date__inner,
.form-request_mod-a,
.section-bg-img_mod-c:after,
.accordion .panel-default .panel-heading,
.price .icon,
.pagination > .active > a,
.pagination > .active > span,
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus,
.form-request_mod-b .btn,
.yamm .navbar-toggle ,  html body .section_mod-form ,
{background-color: <?php echo esc_attr($powerman_first_color)?>;}


html .header-main .row .header-main__inner
{background-color: <?php echo esc_attr($powerman_first_color)?> !important;}


.social-links > li > a:hover{background-color: <?php echo esc_attr($powerman_first_color)?> !important;}


html .tp-parallax-wrap .btn:after{
background-color: <?php echo esc_attr($powerman_first_color)?> !important;
}

html .ui-title-block + .decor-1{
background-color: <?php echo esc_attr($powerman_first_color)?> !important;
}

html .list-services-2__item:hover .list-services-2__bg{
background-color: <?php echo esc_attr($powerman_first_color)?> !important;

}

html .filter li a:hover{
background-color: <?php echo esc_attr($powerman_first_color)?>;
}


.bg-color_primary, .header-main__inner, .social-links > li > a:hover, .decor-1, .section-banner-1, .btn:after, .list-services__item:hover .icon, .staff__item:hover .staff__title, .owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span, .filter li a:hover, .section_mod-b, .footer-form, .header.sticky .navbar, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .list-services-2__bg, .post .entry-date__inner, .form-request_mod-a, .section-bg-img_mod-c:after, .accordion .panel-default .panel-heading, .price .icon, .pagination > .active > a, .pagination > .active > span, .pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus, .form-request_mod-b .btn, .yamm .navbar-toggle{
background-color: <?php echo esc_attr($powerman_first_color)?>;
}






a,
.color_primary,
.list-services__item:hover .list-services__title,
.list-progress_mod-a .percent,
.gallery__categorie,
.reviews__title:before,
.advantages__item:hover .icon,
.footer-list__link:hover,
.price:hover .price__title,
.price:hover .price__number,
.pagination > li:first-child > a:hover,
.pagination > li:first-child > span:hover,
.pagination > li:last-child > a:hover,
.pagination > li:last-child > span:hover,
.main-slider .icon.color_primary,
.list-widget__link:hover:before,
.list-widget__link:hover:hover:before,
.post-nav__item .icon,
.post-nav__item:hover .post-nav__name,
.p-404 .icon {color: <?php echo esc_attr($powerman_first_color)?>;}


.bg-color_primary,
.header-main__inner,
.social-links > li > a:hover,
.decor-1,
.section-banner-1,
.btn:after,
.list-services__item:hover .icon,
.staff__item:hover .staff__title,
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span,
.filter li a:hover,
.section_mod-b,
.footer-form,
.header.sticky .navbar,
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus,
.list-services-2__bg,
.post .entry-date__inner,
.form-request_mod-a,
.section-bg-img_mod-c:after,
.accordion .panel-default .panel-heading,
.price .icon,
.pagination > .active > a,
.pagination > .active > span,
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus,
.form-request_mod-b .btn,
.yamm .navbar-toggle {background-color: <?php echo esc_attr($powerman_first_color)?>;}

.social-links > li > a:hover,
.list-block__link:hover,
.list-services__item:hover .icon,
.filter li a:hover,
.advantages__item:hover .icon,
.foto-link,
.price__number,
.btn-info:hover,
.pagination > .active > a,
.pagination > .active > span,
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus,
.list-contacts__title {border-color: <?php echo esc_attr($powerman_first_color)?>;}


.footer-list__link:hover:before,
.list-description dt:before,
.list-mark li:before,
blockquote,
.comments-list .comment-btn:before {border-left-color: <?php echo esc_attr($powerman_first_color)?>;}

.price .icon:after {
	border-top-color: <?php echo esc_attr($powerman_first_color)?>;
}

.yamm .nav > li:hover {
	box-shadow: 0 4px 0 0 <?php echo esc_attr($powerman_first_color)?>;
}

html body blockquote:not([class]) {
    border-left-color:<?php echo esc_attr($powerman_first_color)?>;
}



html .text-black .decor-1.decor-1_mod-c{

background-color: <?php echo esc_attr($powerman_first_color)?>;
}


html .widget-title:after{
background-color: <?php echo esc_attr($powerman_first_color)?>;

}

html .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{

background-color: <?php echo esc_attr($powerman_first_color)?> !important;

}



.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current{
background-color: <?php echo esc_attr($powerman_first_color)?> !important;
}



html .related h2:after , html .page-title:after {
background-color: <?php echo esc_attr($powerman_first_color)?> !important;
}


.social-links > li > a:hover,
.list-block__link:hover,
.list-services__item:hover .icon,
.filter li a:hover,
.advantages__item:hover .icon,
.foto-link,
.price__number,
.btn-info:hover,
.pagination > .active > a,
.pagination > .active > span,
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus,
.list-contacts__title {border-color: <?php echo esc_attr($powerman_first_color)?>;}


.footer-list__link:hover:before,
.list-description dt:before,
.list-mark li:before,
blockquote,
.comments-list .comment-btn:before {border-left-color: <?php echo esc_attr($powerman_first_color)?>;}

.price .icon:after {
    border-top-color: <?php echo esc_attr($powerman_first_color)?>;
}

.yamm .nav > li:hover {
    box-shadow: 0 4px 0 0 <?php echo esc_attr($powerman_first_color)?>;
}

html .vc_row-overlay {
    background: <?php echo esc_attr($powerman_first_color)?> !important;
}

html body  blockquote {
    border-left-color: <?php echo esc_attr($powerman_first_color)?>;
}

html body .yp-demo-link {
    background: <?php echo esc_attr($powerman_first_color)?> !important;
}

html body .share-list li {
    border-color:<?php echo esc_attr($powerman_first_color)?>;
}

html ul.page-numbers li .current {
    background-color:<?php echo esc_attr($powerman_first_color)?>;
}

html ul.page-numbers li:hover a {
   background-color:<?php echo esc_attr($powerman_first_color)?>;
}




