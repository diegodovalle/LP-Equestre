<?php

// Scripts Enqueue
function curly_theme_load_scripts() {
	
	// Get Current Color Scheme
	global $_wp_admin_css_colors; 
	$admin_colors = $_wp_admin_css_colors;
	$color_scheme = $admin_colors[get_user_option('admin_color')]->colors;
		
	if (get_current_screen()->id == 'appearance_page_theme-options') {
		wp_enqueue_style('abacus-google-font-open-sans', 'http://fonts.googleapis.com/css?family=Roboto:400,300,700,900', true);
		wp_enqueue_style('curly-options-main-css', get_template_directory_uri().'/admin/css/main.css', true);
		wp_enqueue_style('curly-options-select-css', get_template_directory_uri().'/admin/css/selectric.css', true);
		wp_enqueue_style('curly-options-chosen-css', get_template_directory_uri().'/admin/css/chosen.css', true);
		wp_enqueue_style('curly-options-fontawesome-css','//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', true);
		wp_enqueue_style( 'wp-color-picker' );	
		wp_enqueue_script('wp-color-picker');	
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-position');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-mouse');
		wp_enqueue_script('jquery-ui-button');
		wp_enqueue_media();
		wp_enqueue_script('curly-options-selectric-js', get_template_directory_uri().'/admin/js/jquery.selectric.min.js' , 'jquery', null, true);
		wp_enqueue_script('curly-options-chosen-js', get_template_directory_uri().'/admin/js/jquery.chosen.min.js' , 'jquery', null, true);
		wp_enqueue_script('curly-options-main-js', get_template_directory_uri().'/admin/js/main.js' , 'jquery', null, true);
		
		$js_data = array(
			0 => json_decode(get_option(THEMEPREFIX.'_json_color_scheme'), true),
			1 => get_template_directory_uri(),
			2 => __('Saving', 'CURLYTHEMES'),
			3 => __('You are about to leave this page without saving. All changes will be lost.', 'CURLYTHEMES'),
			4 => __('WARNING: You are about to delete all your settings! Please confirm this action.', 'CURLYTHEMES'),
			5 => THEMEPREFIX,
			6 => __('WARNING: You are about to restore your backup. This will overwrite all your settings! Please confirm this action.', 'CURLYTHEMES'),
			7 => __('WARNING: You are about to delete your backup. All unsaved options will be lost. We recommend that you save your options before deleting a backup. Please confirm this action.', 'CURLYTHEMES'),
			8 => __('WARNING: You are about to create a backup. All unsaved options will be lost. We recommend that you save your options before deleting a backup. Please confirm this action.', 'CURLYTHEMES'),
			9 => __('Delete','CURLYTHEMES')
		);
		
		wp_localize_script('curly-options-main-js', 'js_data', $js_data );
		
		$color_scheme = '
			#tab-list li.ui-state-active a{
				color: '.$color_scheme[3].';
				border-color: '.$color_scheme[3].';
			}
			#save-options-top, #save-options-bottom,
			#theme-options .buttons label.ui-state-active,
			#theme-options .slider.ui-slider .ui-slider-handle,
			#theme-options .buttons.buttons-images label.ui-state-active::after,
			#theme-options .selectricItems li:hover,
			#theme-options .chosen-container .chosen-results li.highlighted,
			#theme-options .switch.on,
			#theme-options .btn,
			#options-saved{
				background: '.$color_scheme[3].';
				color: #fff;
			}
			#options-error{
				background: '.$color_scheme[2].';
				color: #fff;
			}
			#theme-options .btn:hover,
			#save-options-top:hover, #save-options-bottom:hover,
			#theme-options .slider.ui-slider .ui-slider-handle:hover,
			#theme-options .slider.ui-slider .ui-slider-handle:active{
				background: '.$color_scheme[2].';
				color: #fff;
			}
			#theme-options .buttons.buttons-images label.ui-state-active,
			#theme-options .switch.on{
				border-color: '.$color_scheme[3].';
			}
			#tab-list a:hover{
				color: '.$color_scheme[3].';
			}';
		
		wp_add_inline_style('curly-options-main-css', $color_scheme);
		
	} 
}
add_action('admin_enqueue_scripts', 'curly_theme_load_scripts');

// Add Theme Options Menu & Page
function curly_theme_add_appearance_menu(){
     add_submenu_page( 'themes.php', ADMINNAME, ADMINNAME, 'manage_options', 'theme-options', 'curly_theme_submenu_page'); 
}
add_action('admin_menu', 'curly_theme_add_appearance_menu');

// Generate Theme Options Page
function curly_theme_submenu_page() {
	
	include(get_template_directory().'/admin/options.php');

		
	foreach ($options as $key => $value) {
		if ($value['type'] == 'section') { 
			$tabs[] = array('id' => $key, 'name' => $value['name']);
			$parent = $key;
		} else {
			(isset($value['id'])) ? ${'tab_'.$parent}[$key]['id'] = $value['id'] : null;
			(isset($value['type'])) ? ${'tab_'.$parent}[$key]['type'] = $value['type'] : null;
			(isset($value['name'])) ? ${'tab_'.$parent}[$key]['name'] = $value['name'] : null;
			(isset($value['desc'])) ? ${'tab_'.$parent}[$key]['desc'] = $value['desc'] : null;
			(isset($value['std'])) ? ${'tab_'.$parent}[$key]['std'] = $value['std'] : ${'tab_'.$parent}[$key]['std'] = null;
			(isset($value['options'])) ? ${'tab_'.$parent}[$key]['options'] = $value['options'] : null;
			(isset($value['class'])) ? ${'tab_'.$parent}[$key]['class'] = $value['class'] : null;
			(isset($value['prefix'])) ? ${'tab_'.$parent}[$key]['prefix'] = $value['prefix'] : null;
			(isset($value['suffix'])) ? ${'tab_'.$parent}[$key]['suffix'] = $value['suffix'] : null;
			(isset($value['min'])) ? ${'tab_'.$parent}[$key]['min'] = $value['min'] : null;
			(isset($value['max'])) ? ${'tab_'.$parent}[$key]['max'] = $value['max'] : null;
			(isset($value['increment'])) ? ${'tab_'.$parent}[$key]['increment'] = $value['increment'] : null;
			(isset($value['alert'])) ? ${'tab_'.$parent}[$key]['alert'] = $value['alert'] : null;
			(isset($value['source'])) ? ${'tab_'.$parent}[$key]['source'] = $value['source'] : null;
			(isset($value['editor_settings'])) ? ${'tab_'.$parent}[$key]['editor_settings'] = $value['editor_settings'] : null;
		}
	}
	
	$list_items = '<ul id="tab-list">';
	$div_contents = null;
	
	foreach ($tabs as $tab){
		$list_items 	.= '<li><a href="#'.$tab['id'].'">'.$tab['name'].'</a></li>';
		$div_contents 	.= '<div id="'.$tab['id'].'" class="tab">';
			foreach (${'tab_'.$tab['id']} as $tab_content) {
				$div_contents .= curly_generate_options($tab_content);
			}
		$div_contents	.= '</div>';
	}
	
	$list_items .= '</ul>';
	
?>
<div id="theme-options-wrapper">
	<div id="theme-options">
		<?php echo $list_items; ?>
		<?php echo $div_contents; ?>
	</div>
	<a href="#" id="save-options-bottom" title="<?php _e('Save Options','CURLYTHEME') ?>"><?php _e('Save Options','CURLYTHEME') ?></a>
</div>
<a href="#" id="save-options-top" title="<?php _e('Quick Save','CURLYTHEME') ?>"><?php _e('Quick Save','CURLYTHEME') ?></a>
<div id="options-saved"><div class="fa fa-save fa-large fa-5x"></div><strong><?php _e('Saved','CURLYTHEME') ?></strong></div>
<div id="options-error"><div class="fa fa-warning fa-large fa-5x"></div><strong><?php _e('Error','CURLYTHEME') ?></strong></div>

<?php } 

function curly_generate_options( $data ) {
	
	$output = null;
	
	$id	= (isset($data['id'])) ? $data['id'] : null;
	$default = (isset($data['std'])) ? $data['std'] : null;
	$value = (get_option($id, null) !== null) ? esc_html(get_option($id)) : $data['std'];
	$class = (isset($data['class'])) ? $data['class'] : null;
	$desc = (isset($data['desc'])) ? '<span class="description">'.$data['desc'].'</span>' : null;
	$desc .= (isset($data['alert'])) ? '<span class="description alert">'.$data['alert'].'</span>' : null;
	$increment = (isset($data['increment'])) ? $data['increment'] : 1;	
	$name = (isset($data['name'])) ? esc_html($data['name']) : null;
	$options = (isset($data['options'])) ? $data['options'] : null;
	$min = (isset($data['min'])) ? $data['min'] : null;
	$max = (isset($data['max'])) ? $data['max'] : null;
	$prefix = (isset($data['prefix'])) ? $data['prefix'] : null;
	$suffix = (isset($data['suffix'])) ? $data['suffix'] : null;
	$source = (isset($data['source'])) ? $data['source'] : null;
	$editor_settings = (isset($data['editor_settings'])) ? $data['editor_settings'] : null;
	$upload_title = __('Insert ', 'CURLYTHEME') . $name;
	$upload_button = __('Choose as ', 'CURLYTHEME') . $name;
	
	switch ($data['type']) {
		
		// Title
		case 'title' : {
			$output .= '<div class="form-control '.$class.' info-title">';
				$output .= '<h2>'.$name.'</h2>';
				$output .= $desc;
			$output .= '</div>';
		} break; 
		
		// Text Fields
		case 'text' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<input type="text" id="'.$id.'" name="'.$name.'" value="'.$value.'">';
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// Textarea
		case 'textarea' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<textarea id="'.$id.'" name="'.$id.'">'.wp_kses_post($value).'</textarea>';
				$output .= $desc;
			$output .= '</div>';
		} break;	
		
		// Checkbox
		case 'checkbox' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'"><input type="checkbox" id="'.$id.'" name="'.$id.'" '.checked($value, 'true', false).'>'.$name.'</label>';
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// Select
		case 'select' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<select class="select-style" id="'.$id.'" name="'.$id.'">';
					foreach ($options as $key => $option) {
						$output .= '<option value="'.$key.'" '.selected($value, $key, false).'>'.$option.'</option>';
					}
				$output .= '</select>';
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// Color
		case 'color' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<input type="text" id="'.$id.'" name="'.$id.'" class="color-picker" value="'.$value.'">';
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// Image Field
		case 'upload' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<input type="text" id="'.$id.'" name="'.$id.'" value="'.get_option($id).'">';
				$output .= '<input type="hidden" id="'.$id.'_id" name="'.$id.'_id" value="'.get_option($id.'_id').'">';
				$output .= '<a href="#" class="image-upload-button btn" data-upload-title="'.$upload_title.'" data-upload-button="'.$upload_button.'">'.__('Upload','CURLYTHEME').'</a>';
				$output .= '<a href="#" class="image-clear-button btn" style="display:'.(($value != null) ? 'inline-block' : 'none').'">'.__('Clear','CURLYTHEME').'</a>';
				$output .= ($value != null) ? '<img src="'.$value.'" class="image-preview">' : null;
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		case 'upload_min' : {
			$output .= '<div class="form-control '.$class.' upload_file">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<input type="text" id="'.$id.'" name="'.$id.'" value="'.get_option($id).'">';
				$output .= '<a href="#" class="image-upload-button btn" data-upload-title="'.$upload_title.'" data-upload-button="'.$upload_button.'">'.__('Upload','CURLYTHEME').'</a>';
				$output .= '<a href="#" class="image-clear-button btn" style="display:'.(($value != null) ? 'inline-block' : 'none').'">'.__('Clear','CURLYTHEME').'</a>';
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// Slider
		case 'number' : {
			$output .= '<div class="form-control '.$class.'" style="position:relative">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<input type="hidden" id="'.$id.'" name="'.$id.'" value="'.$value.'">';
				$output .= '<div class="slider" id="'.$id.'_slider"></div>';
				$output .= '<div class="slider_value">'.$prefix.$value.$suffix.'</div>';
				$output .= $desc;
			$output .= '</div>';
			$output .= '<script type="text/javascript">jQuery(function() { jQuery( "#'.$id.'_slider" ).slider({ value: '.$value.' , step: '.$increment.' , min:'.$min.' , max:'.$max.' , slide: function( event, ui ) { jQuery(this).siblings(".slider_value").text( "'.$prefix.'" + ui.value + "'.$suffix.'" ); jQuery(this).siblings("input[type=hidden]").val(ui.value); }}); });</script>';
		} break; 
		
		// Buttons
		case 'buttons' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<div class="buttons">';
					foreach ($options as $key => $option) {
						$output .= '<input type="radio" id="'.$id.'_'.$key.'" value="'.$key.'" name="'.$id.'" '.checked($value, $key, false).'>';
						$output .= '<label for="'.$id.'_'.$key.'">'.$option.'</label>';
					}
				$output .= '</div>';
				$output .= $desc;
			$output .= '</div>';
		} break; 
		
		// Images
		case 'images' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<div class="buttons buttons-images">';
					foreach ($options as $key => $option) {
						$output .= '<input type="radio" id="'.$id.'_'.$key.'" value="'.$key.'" name="'.$id.'" '.checked($value, $key, false).'>';
						$output .= '<label for="'.$id.'_'.$key.'"><img src="'.$option.'" alt=""></label>';
					}
				$output .= '</div>';
				$output .= $desc;
			$output .= '</div>';
		} break; 
		
		// Font
		case 'font' : {
			$font_style = array(__('Light', 'CURLYTHEME'), __('Light Italic', 'CURLYTHEME'), __('Normal', 'CURLYTHEME'), __('Bold', 'CURLYTHEME'), __('Italic', 'CURLYTHEME'), __('Bold Italic', 'CURLYTHEME'));
			$font_variant = array(__('Normal', 'CURLYTHEME'), __('Capitalize', 'CURLYTHEME'), __('Uppercase', 'CURLYTHEME'), __('Small Caps', 'CURLYTHEME'));
			$value = (get_option($id, null) !== null) ? get_option($id) : $data['std'][0];
			$value_size = (get_option($id.'_size', null) !== null) ? get_option($id.'_size') : $data['std'][1];
			$value_style = (get_option($id.'_style', null) !== null) ? get_option($id.'_style') : $data['std'][2];
			$value_variant = (get_option($id.'_variant', null) !== null) ? get_option($id.'_variant') : $data['std'][3];
			
			$output .= '<div class="form-control typography">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= '<div class="font-chooser">';
					$output .= '<select class="select-chosen" id="'.$id.'" name="'.$id.'">';
						foreach ($options as $key => $option) {
							$output .= '<option value="'.$key.'" '.selected($value, $key, false).'>'.$option.'</option>';
						}
					$output .= '</select>';
				$output .= '</div>';
				$output .= '<select class="select-style" id="'.$id.'_style" name="'.$id.'_style">';
					foreach ($font_style as $key => $option) {
						$output .= '<option value="'.$key.'" '.selected($value_style, $key, false).'>'.$option.'</option>';
					}
				$output .= '</select>';
				$output .= '<select class="select-style font-variant" id="'.$id.'_variant" name="'.$id.'_variant">';
					foreach ($font_variant as $key => $option) {
						$output .= '<option value="'.$key.'" '.selected($value_variant, $key, false).'>'.$option.'</option>';
					}
				$output .= '</select>';
				$output .= '<div class="font-size">';
					$output .= '<input type="hidden" id="'.$id.'_size" name="'.$id.'_size" value="'.$value_size.'">';
					$output .= '<div class="slider" id="'.$id.'_size_slider"></div>';
					$output .= '<div class="slider_value">'.$value_size.$suffix.'</div>';
				$output .= '</div>';
				$output .= $desc;
			$output .= '</div>';
			$output .= '<script type="text/javascript">jQuery(function() { jQuery( "#'.$id.'_size_slider" ).slider({ value: '.$value_size.' ,  min:'.$min.' , max:'.$max.' , step: '.$increment.' , slide: function( event, ui ) { jQuery(this).siblings(".slider_value").text( ui.value + "'.$suffix.'" ); jQuery(this).siblings("input[type=hidden]").val(ui.value); }}); });</script>';
		} break;
		
		// iframe
		case 'iframe' : {
			$output .= '<div class="content-frame"><iframe src="'.$source.'"></iframe></div>';
		} break;
		
		// Separator
		case 'divider' : {
			$output .= '<hr>';
		} break;
		
		// Switch
		case 'switch' : {
			$output .= '<div class="form-control '.$class.' switch-control">';
				$output .= '<input type="checkbox" class="js-switch" id="'.$id.'" name="'.$id.'" '.checked($value, 'true', false).'><label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// WordPress Editor
		case 'editor' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				ob_start(); wp_editor(get_option($id, $default), $id, $editor_settings);
				$output .= ob_get_clean();
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// Message
		case 'info' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<div class="message">';
				$output .= ($name) ? '<h3>'.$name.'</h3>' : null;
				$output .= $default;
				$output .= '</div>';
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// Back-up
		case 'backup' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				
				// Variables
				$current_list = get_option(THEMEPREFIX.'_theme_options_backup_list');
				$current_list = explode(' ', $current_list);
				$current_list = array_filter($current_list,'strlen');
				
				$css = (count($current_list) > 0) ? 'with-list' :  'no-list';
				
				$output .= '<div class="message '.$css.'">';
					$output .= '<h3 class="even">'.__('Back-up available','CURLYTHEMES').'</h3>';
					$output .= '<p class="even">'.__('You options have been backed up. You can always restore your options by clicking the <strong>Restore</strong> button below:','CURLYTHEMES').'</p>';
					$output .= '<ul class="backup-list even">';
					foreach ($current_list as $backup) {
						$output .= '<li>'.date("M d, Y H:i", $backup).'<a href="#" class="delete-backup" data-backup="'.$backup.'">'.__('Delete','CURLYTHEMES').'</a><a href="#" class="restore-backup" data-backup="'.$backup.'">'.__('Restore','CURLYTHEMES').'</a></li>';
					}
					$output .= '</ul>';
					$output .= '<p class="odd">'.__('You currently have not backups. You can create a backup by clicking the <strong>Backup Now</strong> link below:','CURLYTHEMES').'</p>'; 
					$output .= '<a href="#" id="backup">'.__('Backup Now','CURLYTHEMES').'</a>';
				$output .= '</div>';
				$output .= $desc;
			$output .= '</div>';
		} break;
		
		// Reset
		case 'reset' : {
			$output .= '<div class="form-control '.$class.'">';
				$output .= '<label class="name" for="'.$id.'">'.$name.'</label>';
				$output .= $desc;
				$output .= '<a href="#" id="reset-options-bottom" title="'.__('Reset Options','CURLYTHEMES').'">'.__('Reset Options','CURLYTHEMES').'</a>';
			$output .= '</div>';
		} break;
	}
	return $output;
}
?>