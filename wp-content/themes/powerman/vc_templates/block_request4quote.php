<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );

    $img = wp_get_attachment_image_src( $image , 'full' );
    $bg_image = $img[0];
	$modFormImage = '';
	if ($bg_image)
		$modFormImage = 'style="background:url('.esc_url($bg_image).') !important"';



?>
<?php if ($block_type == 'ver'):?>
    <section class="section-form-request-wrap" style="background:url(<?php echo esc_url($bg_image)?>)">
        <section class="section-form-request">
            <h2 class="form-request__title">
                <?php echo esc_attr($title)?>
                <span class="color_primary"><?php echo esc_attr($ctitle)?></span>
            </h2>
            <div class="form-request form-request_mod-a">
                <?php echo do_shortcode($content)?>
            </div><!-- end form-request -->
        </section>
    </section>
<?php else:?>
	<div class="section_mod-b section_mod-form" <?php echo wp_kses_post($modFormImage)?> >
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="form-request form-request_mod-c" >
              <div class="row">
                <div class="col-md-8">
                  
            
            
            <?php echo do_shortcode('[contact-form-7 id="'.$left_form.'"]')?>
                  
                  
                </div>
                <!-- end col --> 
              </div>
              <!-- end row -->
            </div>
            <!-- end form-request --> 
          </div>
          <!-- end col -->
          <div class="col-md-4">
            <section class="section_mod-c" data-wow-duration="2s" data-sr-id="12" >
              <div class="section__inner">
                
                 <?php powerman_get_staticblock_content($right_block) ?>
                
              </div>
            </section>
          </div>
          <!-- end col --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container --> 
    </div>
	
<?php endif; ?>