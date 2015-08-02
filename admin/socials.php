<?php
Class RAB_Socials extends RAB_Add_Menu_Backend{

	public function __construct(){
	 	$comment = array(
		  		'page_title' 	=> __('Socials Settings',RAB_DOMAIN),
		  		'menu_title' 	=> __('Social Settings',RAB_DOMAIN),
		  		'slug' 			=> 'rab-social'
	  		);
		parent::__construct($comment);
		//add_action('admin_enqueue_scripts',array($this,'load_wp_admin_rab_style'));
	}

	function rab_main(){
		$option = RAB_Option::get_option_socials();
		extract($option);
		?>
		<div class="rab-content">
			<div class="general">
				<form>
					<div class="form-item">
					 	<label> <?php _e('Facebook url', RAB_DOMAIN); ?></label>
					 	<input type="text"  class="sc-option" name="facebook_url" value ="<?php echo esc_url($facebook_url);?>" />
					</div>

					<div class="form-item">
					 	<label><?php _e('Twitter url', RAB_DOMAIN);?></label>
					 	<input type="text" class="sc-option" name="twitter_url"  value ="<?php echo esc_url($twitter_url);?>"  />
					</div>

					<div class="form-item">
						<label> <?php _e('Google Plus', RAB_DOMAIN);?></label>
					 	<input type="text" class="sc-option" name="google_url" value ="<?php echo esc_url($google_url);?>"  />
					</div>
					<div class="form-item">
						<label><?php _e('Dribble url', RAB_DOMAIN);?></label>
					 	<input type="text" class="sc-option"  name="dribble_url" value ="<?php echo esc_url($dribble_url);?>"  />
					</div>
					<div class="form-item">
						<label><?php _e('LinkedIn url', RAB_DOMAIN);?></label>
					 	<input type="text" class="sc-option" name="linkedin_url" value ="<?php echo esc_url($linkedin_url);?>"  />
					</div>
					<div class="form-item">
						<label><?php _e('Printest url', RAB_DOMAIN);?></label>
					 	<input type="text" class="sc-option" name="printest_url" value ="<?php echo esc_url($printest_url);?>"  />
					</div>
					<div class="form-item">
						<label><?php _e('Flick url',RAB_DOMAIN);?></label>
					 	<input type="text" class="sc-option" name="flick_url" value ="<?php echo esc_url($flick_url);?>"  />
					</div>

				</form>
			</div>
		</div>
		<?php
	}
	function page_load_scripts(){

	}
	function load_wp_admin_rab_style(){
		wp_register_style( 'admin.css', get_template_directory_uri() . '/css/admin/admin.css' );
        wp_enqueue_style( 'admin.css' );
        wp_enqueue_script('backbone');
		wp_enqueue_script('underscore');
		wp_enqueue_script('backend',get_stylesheet_directory_uri().'/js/rab.js');
		wp_enqueue_script('rab-settings',get_stylesheet_directory_uri().'/js/admin/settings.js',array('backbone') );

	}

}
new RAB_Socials();