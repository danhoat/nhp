<?php
/**
 * ovveride wp_mail WordPress default.
 * @return boolean
 */
	function ra_mailing( $to, $subject, $message, $header = false ){

		add_filter( 'wp_mail_content_type', 'set_html_content_type' );

		$message  	= ra_filter_mail_content( $message );
		$body 		= ra_get_header_email();
		$body 		.= $message;
		$body 		.= ra_get_footer_email();

		$send 		= wp_mail( $to, $subject, $body, $header );

		// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
		remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

		return $send;
	}



	function set_html_content_type() {
		return 'text/html';
	}

	if( !function_exists( 'ra_get_header_email' ) ):
		function ra_get_header_email(){
			$header = '<html><head><style>p{line-height:13px;}label {   direction: ltr;    display: inline-block; font-weight: bold; min-width: 72px;  padding-right: 20px;    text-align: right;}</style></head><body><table><tr><td>';
			return $header;
		}
	endif;

	if( !function_exists( 'ra_get_footer_email' ) ):
		function ra_get_footer_email(){
			$footer ='</td></tr><tr><td>
					<table width="390" cellspacing="0" cellpadding="0" border="0" align="left"><tr><td>Copyright © Zoho Corporation 2014, All rights reserved.</td></tr></table>
					<table width="184" cellspacing="0" cellpadding="0" border="0" align="right">
						<tr>
							<td>
								<a target="_blank" href="https://www.facebook.com/zoho">
									<img width="8" height="16" style="line-height:0px;font-size:0px;border:0px;margin-left:20px;padding:3px" src="https://www.zoho.com/docs/images/email-templates/facebook.png" alt="img" class="CToWUd">
								</a>
								<a target="_blank" href="https://twitter.com/zoho"><img width="16" height="13" style="line-height:0px;font-size:0px;border:0px;margin-left:20px;padding:3px" src="https://www.zoho.com/docs/images/email-templates/twitter.png" alt="img" class="CToWUd"></a>
								<a target="_blank" href="https://www.linkedin.com/groups/ZOHO-Docs-2125232"><img width="15" height="15" style="line-height:0px;font-size:0px;border:0px;margin-left:20px;padding:3px" src="https://www.zoho.com/docs/images/email-templates/linkedin.png" alt="img" class="CToWUd">
								</a>
							</td>
						</tr>
					</table>
				</td>
				</tr>';
			$footer .= '</table></body></html>';
			return $footer;
		}
	endif;

	function ra_filter_mail_content( $message ){

		$site_name = '<a href= "'.home_url().'" > '.get_option('blogname').' </a>';;

		$message  	= str_replace("[site_name]", $site_name, $message);

		return apply_filters ( 'ra_mail_content', $message );


	}
?>