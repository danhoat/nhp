<?php
//$current = get_site_transient('update_themes');
// echo '<pre>';
// var_dump($current);
// echo '</pre>';

function test_check_for_update($data) {
	$path 			= 'http://rabthemes.com/update/check_update.json';
	$request 		= wp_remote_post($path);
	$remote_version = $request['body'];

	if ( version_compare(RAB_VERSION, $remote_version, '<') ) {

  		$data->response['nhp'] = array(
		    'theme'       => 'nhp',
		    'new_version' => $new_version,
		    'url'         => 'http://rabthemes.com/',
		    'package'     => 'http://rabthemes.com/?do=update_product',
	  	);
  	}

  return $data;
}
add_filter('pre_set_site_transient_update_themes', 'test_check_for_update', 100, 1);

?>
?>