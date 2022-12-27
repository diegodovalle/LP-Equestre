<?php

include '../../../../wp-load.php';

$data = get_option($_POST['data'][0][0]);
$data = json_decode($data, true);

if (is_user_logged_in()) {

	$allowed = array(
		'h1' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'h2' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'h3' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'h4' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'h5' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'h6' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'a' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array(), 'href' => array(), 'target' => array()),
		'div' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'span' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'strong' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'em' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array()),
		'script' => array('type' => array()),
		'img' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array(), 'src' => array(), 'alt' => array()),
		'iframe' => array('title' => array(), 'class' => array(), 'id' => array(), 'style' => array(), 'src' => array())
	);
	
	foreach ($data as $key => $value) {
		update_option($value['option'], wp_kses(stripcslashes($value['value']), $allowed));
	}
} else {
	print_r('false');
}
?>