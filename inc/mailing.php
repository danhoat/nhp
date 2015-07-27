<?php
/**
 * ovveride wp_mail WordPress default.
 * @return boolean
 */
	function ra_mailing( $to, $subject, $message ){

		add_filter( 'wp_mail_content_type', 'set_html_content_type' );
		$message  	= ra_filter_mail_content( $message );
		$body 		= ra_get_header_email();
		$body 		.= $message;
		$body 		.= ra_get_footer_email();

		$send 		= wp_mail( $to, $subject, $body );

		// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
		remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
		return $send;
	}



	function set_html_content_type() {
		return 'text/html';
	}

	if( !function_exists( 'ra_get_header_email' ) ):
		function ra_get_header_email(){
			$header = '<html><head><style></style></head><body>';
			return $header;
		}
	endif;

	if( !function_exists( 'ra_get_footer_email' ) ):
		function ra_get_footer_email(){
			$footer = '</body></html>';
			return $footer;
		}
	endif;

	function ra_filter_mail_content( $message ){

		$site_name = '<a href= "'.home_url().'" >'.get_option('blogname').'</a>';;

		$message  	= str_replace("[site_name]", $site_name, $message);

		return apply_filters ( 'ra_mail_content', $message );


	}
?>