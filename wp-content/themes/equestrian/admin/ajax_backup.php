<?php

include '../../../../wp-load.php';

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
	
	foreach ($_POST['data'] as $key => $value) {
		$now = time();
		if ($_POST['data'][$key][0] ==  THEMEPREFIX.'_theme_options_backup_list') {
			$current_list = get_option(THEMEPREFIX.'_theme_options_backup_list');
			update_option(THEMEPREFIX.'_theme_options_backup_list', $current_list.$now.' ');
			
		} else {
			update_option($_POST['data'][$key][0].$now, wp_kses(stripcslashes($_POST['data'][$key][1]), $allowed));
		}
	}
} else {
	print_r('false');
}
?>