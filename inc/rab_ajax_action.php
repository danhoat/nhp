<?php

	add_action( 'wp_ajax_nopriv_rab_contact', 'rab_contact' );
	add_action( 'wp_ajax_rab_contact', 'rab_contact' );

	function rab_contact(){

		$request = $_POST;
		if( is_null($_POST['user_name']) || is_null($request['user_email']) || is_null($request['content']) ){
			wp_send_json(array('success' => true, 'msg' => __('Please enter your information', RAB_DOMAIN)));
		}
		$admin_email 	= get_option('admin_email');
		$message 	= 'Contact from [site_name] :';
		$message 	.= '<p>Information :</p> <label> Full name : </label>[user_name].<br /><label> Phone :</label>[user_phone].<br /> <label> Email : </label>[user_email].<br /> <label> Address : </label>[user_address].<br /><label>Content :</label>[content]';

		$message  	= str_replace("[user_name]", $request['user_name'], $message);
		$message  	= str_replace("[user_address]", $request['user_address'], $message);
		$message  	= str_replace("[user_email]", $request['user_email'], $message);
		$message  	= str_replace("[user_phone]", $request['user_phone'], $message);
		$message  	= str_replace("[content]", $request['content'], $message);

		$headers = array(
			'Reply-To' => $request['user_email']
		);
		$subject 	= sprintf(__('Contact From %s',RAB_DOMAIN ), get_option('blogname') );
		$mail = ra_mailing( $admin_email, $subject, $message, $headers);

		if ( $mail ){

			$subject 	= sprintf(__('Email auto sent from %s',RAB_DOMAIN ), get_option('blogname') );
			$msg 		= __('<p>This is auto email from [site_name] .</p><p> We have just received your message.</p><p> Thank you for your time </p>', RAB_DOMAIN);
			$auto 		= ra_mailing( $request['user_email'], $subject, $msg );
			wp_send_json(array('success' => true, 'msg' => __('Email has been sent successfull', RAB_DOMAIN)));

		} else {

			wp_send_json(array('success' => false, 'msg' => __('Send mail fail', RAB_DOMAIN)));
		}
	}

?>