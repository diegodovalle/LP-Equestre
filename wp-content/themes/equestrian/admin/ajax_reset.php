<?php

include '../../../../wp-load.php';

$data = $_POST['data'];

if (is_user_logged_in()) {
	if (isset($data)) {
		foreach ($data as $key => $value) {
			if (strpos($data[$key][0], '_theme_options_backup_') !== false) {
				$old = get_option(THEMEPREFIX.'_theme_options_backup_list');
				$new = str_replace($data[$key][1], ' ', $old);
				update_option(THEMEPREFIX.'_theme_options_backup_list', $new);
			}
			delete_option($data[$key][0]);
		}
	}
} else {
	print_r('false');
}
?>