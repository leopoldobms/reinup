<?php 
	function powerman_color_swatcher(){
		echo '<div class="switcher-wrapper">	
				<div class="demo_changer">
					<div class="demo-icon customBgColor"><i class="fa fa-cog fa-spin fa-2x"></i></div>
					<div class="form_holder">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="predefined_styles">
									<div class="skin-theme-switcher">
										<h4>'.esc_html__("Color", "powerman" ).'</h4>
										<a href="#" data-switchcolor="color1" class="styleswitch" style="background-color:#ff8300;"> </a>
										<a href="#" data-switchcolor="color2" class="styleswitch" style="background-color:#4fb0fd;"> </a>
										<a href="#" data-switchcolor="color3" class="styleswitch" style="background-color:#ffc73c;"> </a>							
										<a href="#" data-switchcolor="color4" class="styleswitch" style="background-color:#dc2c2c;"> </a>
										<a href="#" data-switchcolor="color5" class="styleswitch" style="background-color:#02cc8b;"> </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
	}

?>