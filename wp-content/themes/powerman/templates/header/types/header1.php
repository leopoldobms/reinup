<?php 

	
	$powerman_logo = powerman_get_option('general_settings_logo');
	$powerman_logo_text = powerman_get_option('general_settings_logo_text');
	$powerman_phone = powerman_get_option('header_settings_phone');
	$powerman_email = powerman_get_option('header_settings_email');
	$powerman_ltext = powerman_get_option('header_settings_ltext');
	$powerman_lbtn_text = powerman_get_option('header_settings_btnltext');
	$powerman_lbtn_url = powerman_get_option('header_settings_btnlurl');


	
	
?>

	<header class="header">
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="header-links">
							<?php
							$powermanmenuParameters = array(
								'container'       => false,
								'echo'            => false,
								'items_wrap'      => '%3$s',
								'depth'           => 0,
								'theme_location' => 'top_nav',
							);
							echo strip_tags(wp_nav_menu( $powermanmenuParameters ), '<a>' );
							?>
						</div>
						<span class="top-header__info"><?php echo esc_attr($powerman_ltext)?></span>
						<?php if ($powerman_lbtn_text):?>
							<a target="_blank"  class="btn btn-success btn-effect" href="<?php echo esc_url($powerman_lbtn_url)?>" target="_blank"><?php echo esc_attr($powerman_lbtn_text)?></a>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
		<!-- end top-header -->

		<div class="header-main border-top"> 
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="header-main__inner clearfix">
							<a href="<?php echo esc_url(home_url('/')) ?>" class="header__logo">
								<?php if($powerman_logo):?>
									<img class="img-responsive" src="<?php echo esc_url($powerman_logo) ?>" alt="<?php echo esc_attr($powerman_logo_text)?>" />
								<?php elseif ( get_header_image() ):?>
									<img class="img-responsive" src="<?php header_image(); ?>" alt="<?php echo esc_attr($powerman_logo_text)?>" />
									<div class="logo-desc"> <?php echo isset($powerman_logo_text) ? esc_attr($powerman_logo_text) : '' ?></div>
								<?php else:?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="<?php echo esc_attr($powerman_logo_text)?>" />
									<div class="logo-desc"> <?php echo isset($powerman_logo_text) ? esc_attr($powerman_logo_text) : '' ?></div>
								<?php endif?>
							</a>
							<div class="header-contacts">
							<?php if ($powerman_phone): ?>
							<span class="header-contacts__item">
								<i class="icon icon-call-in"></i>
								<span class="header-contacts__inner">
									<span class="header-contacts__title"><?php esc_html_e('call us 24/7','powerman')?></span>
									<span class="header-contacts__info"><?php echo esc_attr($powerman_phone)?></span>
								</span>
							</span>
							<?php endif;?>
							<?php if ($powerman_email):?>
							<span class="header-contacts__item">
								<i class="icon icon-envelope-open"></i>
								<span class="header-contacts__inner">
									<span class="header-contacts__title"><?php esc_html_e('email us','powerman')?></span>
									<a class="header-contacts__info" href="mailto:<?php echo esc_attr($powerman_email)?>"><?php echo esc_attr($powerman_email)?></a>
								</span>
							</span>
							<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header-main -->


		<div class="yamm-wrap">

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="top-nav">
							<ul class="social-links">
								<?php for ($i = 1; $i <= 4; $i++):?>
									<?php if (powerman_get_option('header_settings_icon' . $i . 'icon')):?>
									<li><a class="icon <?php echo powerman_get_option('header_settings_icon' . $i . 'icon')?>" href="<?php echo powerman_get_option('header_settings_icon' . $i . 'link')?>"></a></li>
									<?php endif;?>
								<?php endfor;?>
							</ul>
							<div class="navbar yamm">
								<div class="navbar-header hidden-md hidden-lg hidden-sm">
									<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
									<a href="javascript:void(0);" class="navbar-brand">
                                        <?php echo esc_html__('Menu','powerman')?>
                                    </a> </div>
								<nav id="navbar-collapse-1" class="navbar-collapse collapse">
									<?php powerman_load_block('header/menu')?>
								</nav>
							</div>
						</div>
						<!-- end top-nav -->
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->
			</div>
		</div>
		<!-- end container -->
	</header>
<!-- end header -->
<?php if (!is_page_template( 'page-home.php' ) && !is_front_page()):?>
    <div id="pageTitleBox" class="section-title section-bg section-bg-img section-bg-img_mod-a <?php echo powerman_get_subheader_class()?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__inner">
                        <h1 class="ui-title-page"><?php echo powerman_get_page_title()?></h1>
                        <?php powerman_show_breadcrumbs()?>
                    </div><!-- end section__inner -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
<?php endif;?>
