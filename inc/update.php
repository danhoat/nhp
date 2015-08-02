<?php
$current = get_site_transient('update_themes');
// echo '<pre>';
// var_dump($current);
// echo '</pre>';
function test_check_for_update($data) {
	$path 			= 'http://localhost/namhaphat/check_update.json';
	$request 		= wp_remote_post($path);
	$new_version 	= $request['body'];

	if($new_version > RAB_VERSION ){
	  	$data->response['nhp'] = array(
		    'theme'       => 'nhp',
		    'new_version' => $new_version,
		    'url'         => 'http://localhost/namhaphat/',
		    'package'     => 'http://localhost/namhaphat/nhp1.6.zip',
		);
	}
  return $data;
}
add_filter('pre_set_site_transient_update_themes', 'test_check_for_update', 100, 1);

?>