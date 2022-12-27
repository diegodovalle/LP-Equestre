<?php

/*	Definitions
	================================================= */
	define('THEMENAME', 'Equestrian');
	define('THEMEPREFIX', 'eque');
	define('ADMINNAME', (get_option(THEMEPREFIX.'_theme_options_name', 'Equestrian Options' != null) ? get_option(THEMEPREFIX.'_theme_options_name', 'Equestrian Options') : 'Theme Options'));

/*	Theme Update Class
	================================================= */
	$username = get_option(THEMEPREFIX.'_theme_options_username', null);
	$apikey = get_option(THEMEPREFIX.'_theme_options_api', null);

	if ($username && $apikey) {
		load_template( trailingslashit( get_template_directory() ) . 'plugins/theme-update/envato-wp-theme-updater.php' );
		Envato_WP_Theme_Updater::init( $username, $apikey, 'Curly Themes' );	
	}

/*	Content Width
	================================================= */	
	if ( ! isset( $content_width ) )
		$content_width = 670;

/*	Load Equestrian Options Panel
	================================================= */
	load_template( trailingslashit( get_template_directory() ) . 'admin/admin-page.php' );

/*	Load Plugins
	================================================= */
	load_template( trailingslashit( get_template_directory() ) . 'plugins/tgm-plugin-activation/class-tgm-plugin-activation.php' );
	load_template( trailingslashit( get_template_directory() ) . 'plugins/widgets/recent.php' );
	load_template( trailingslashit( get_template_directory() ) . 'plugins/widgets/search.php' );
	
	/* Meta Boxes */
	if (get_option(THEMEPREFIX.'_seo') != "true") { 
		load_template( trailingslashit( get_template_directory() ) . 'plugins/meta-boxes/seo.php' ); 
	}
	load_template( trailingslashit( get_template_directory() ) . 'plugins/meta-boxes/sliders.php' );
	load_template( trailingslashit( get_template_directory() ) . 'plugins/meta-boxes/meta-boxes.php' );

	function cmb_initialize_cmb_meta_boxes() {
		if ( ! class_exists( 'cmb_Meta_Box' ) ) { 
			load_template( trailingslashit( get_template_directory() ) . 'plugins/meta-boxes/init.php' );
		}
	}
	
	/* Custom CSS */
	load_template( trailingslashit( get_template_directory() ) . 'css/dynamic-css.php' );
	
	/* Activate Font List */
	load_template( trailingslashit( get_template_directory() ) . 'css/jsons.php' );
	
	/* Admin Customizer */
	load_template( trailingslashit( get_template_directory() ) . 'plugins/admin-customizer/admin-customizer.php' );
	
	function register_required_plugins() {
	
		$plugins = array(
		
			array(
			    'name' 					=> 'LayerSlider WP',
			    'slug' 					=> 'LayerSlider',
			    'source' 				=> get_template_directory() . '/plugins/layersliderwp-5.1.1.installable.zip',
			    'required' 				=> false,
			    'version' 				=> '5.0.2',
			    'force_activation' 		=> false,
			    'force_deactivation' 	=> false
			),
			array(
				'name'     				=> 'Sidebar Generator', // The plugin name
				'slug'     				=> 'sidebars', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory() . '/plugins/sidebars.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'SEO Panel Extended', // The plugin name
				'slug'     				=> 'seo-panel-extended', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory() . '/plugins/seo-panel-extended.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Envato WordPress Toolkit', // The plugin name
				'slug'     				=> 'envato-wordpress-toolkit-master', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory() . '/plugins/envato-wordpress-toolkit-master.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Simple Weather', // The plugin name
				'slug'     				=> 'simple-weather', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory() . '/plugins/simple-weather.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Simple QR Codes', // The plugin name
				'slug'     				=> 'simple-qr', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory() . '/plugins/simple-qr.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Simple Text Rotator', // The plugin name
				'slug'     				=> 'simple-qr', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory() . '/plugins/simple-text-rotator.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
		);
		
		$config = array(
			'domain'       		=> 'CURLYTHEME',         		// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', 'CURLYTHEME'),
				'menu_title'                       			=> __( 'Install Plugins', 'CURLYTHEME'),
				'installing'                       			=> __( 'Installing Plugin: %s', 'CURLYTHEME'), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', 'CURLYTHEME'),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', 'CURLYTHEME'),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'CURLYTHEME'),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'CURLYTHEME'), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa( $plugins, $config );
	
	}
	add_action( 'tgmpa_register', 'register_required_plugins' );
	
	// Register your custom function to override some LayerSlider data
	add_action('layerslider_ready', 'my_layerslider_overrides');
	function my_layerslider_overrides() {
	    $GLOBALS['lsAutoUpdateBox'] = false;
	}
	
/*  Shortcodes
	================================================= */
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/columns.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/dividers.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/buttons.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/alert.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/quotes.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/lists.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/abbr.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/dropcap.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/highlight.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/action.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/tabs.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/toggle-box.php' );				
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/accordion.php' );			
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/youtube.php' ); 			
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/vimeo.php' ); 	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/boxes.php' ); 	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/marker.php' ); 
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/testimonials.php' ); 
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/slider.php' ); 	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/person.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/clear.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/progress.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/icon.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/client-list.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/pretty-photo.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/agenda.php' );			
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/pricing.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/map-maker.php' );	
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/picture-zoom.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/full-width.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/slider-ios.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/slider-roundabout.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/photo-frame.php' );
	load_template( trailingslashit( get_template_directory() ) . 'shortcodes/countdown.php' );

/*	Add Theme Support & Filters
	================================================= */	
	add_theme_support('post-thumbnails', array('post'));	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	$defaults_header = array(
		'random-default'         => true,
		'width'                  => 1600,
		'height'                 => 500,
		'header-text'            => false,
		'uploads'                => true
	);
	add_theme_support( 'custom-header', $defaults_header );
	add_filter('widget_text', 'do_shortcode');

/*	Load Scripts & Styles
	================================================= */	
	function curly_load_my_scripts(){
		if (!is_admin()) {
		
			// Register Scripts	
			wp_register_script('carousel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', null, true);
			wp_register_script('fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', null, true);
			wp_register_script('picture-zoom', get_template_directory_uri() . '/js/jquery.zoom-min.js', null, true);
			wp_register_script('google-maps', 'http://maps.googleapis.com/maps/api/js?sensor=false', null, null, true);
			wp_register_script('map-maker', get_template_directory_uri() . '/js/mapmarker.jquery.js', null, null, true);
			wp_register_script('roundabout', get_template_directory_uri() . '/js/jquery.roundabout.min.js', 'jquery', null, true); 
			wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery', null);
			wp_register_script('drag', get_template_directory_uri() . '/js/jquery.event.drag-2.2.js', 'jquery', null, true); 
			wp_register_script('drop', get_template_directory_uri() . '/js/jquery.event.drop-2.2.js', 'jquery', null, true); 
			wp_register_script('ios', get_template_directory_uri() . '/js/jquery.iosslider.min.js', 'jquery', null, true);
			wp_register_script('countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', 'jquery', null, true); 
			
			// Register Styles
			wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', null, null, 'all'); 
			wp_register_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', null, null, 'all');
			wp_register_style( 'flip', get_template_directory_uri() . '/css/flip.css', null, null, 'all');
			wp_register_style( 'lightbox-css', get_template_directory_uri() . '/css/lightbox.css', null, null, 'all');
			wp_register_style( 'ios-slider', get_template_directory_uri() . '/css/slider-ios.css', null, null, 'all');
			wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', null, null, 'all');
			wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css', null, null, 'all');
			wp_register_style( 'ie8fixes', get_template_directory_uri() . '/css/ie-fix.css', null, null, 'all');
		
			// Enqueue Scripts
			wp_enqueue_script('jquery', '/wp-includes/js/jquery/jquery.js', '', '', true);  
			wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', null, true);
			wp_enqueue_script('dropdown', get_template_directory_uri() . '/js/dropdown-menu.min.js', 'jquery', null, true);
			wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox-2.6.min.js', 'jquery',  null, true);
			wp_enqueue_script('equalize', get_template_directory_uri() . '/js/equalize.min.js', 'jquery', null, true);
			wp_enqueue_script('hoverint', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js', 'jquery', null, true);
			wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js', 'jquery', null, true);
			wp_enqueue_script('waypoints-sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js', 'jquery', null, true);
			wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', 'jquery', null, true);
			$translation_array = array( 
				'color_menu_text' => get_option(THEMEPREFIX.'_color_menu_text', '#FFF') , 
				'color_menu_text_hover' => get_option(THEMEPREFIX.'_color_menu_hover_text', '#E09C95'),
				'sticky_menu' => get_option(THEMEPREFIX.'_sticky_menu', false),
				'responsive' => get_option(THEMEPREFIX.'_general_responsive', 'true'),
				'menu_hover' => get_option(THEMEPREFIX.'_hover_menu', 'false')
			);
			wp_localize_script( 'main', 'data', $translation_array );

			
			// Enqueue Styles
			wp_enqueue_style('bootstrap-css');
			wp_enqueue_style('fontawesome');
			wp_enqueue_style('lightbox-css');
			wp_enqueue_style('vertical-slider');
			wp_enqueue_style('ios-slider');
			wp_enqueue_style('style');
			wp_enqueue_style('flip');
			if(get_option(THEMEPREFIX.'_general_animations', 'false') == 'false'){ 
				wp_enqueue_style('animate');
			}
			
			$GLOBALS['wp_styles']->add_data( 'ie8fixes', 'conditional', 'lte IE 8' );
			   wp_enqueue_style( 'ie8fixes' );
			
			wp_add_inline_style( 'style', curly_minify_css(curly_custom_css().curly_header_css()) ); 
		}
	}
	add_action('wp_enqueue_scripts', 'curly_load_my_scripts');

/*	Minify CSS
	================================================= */	
	function curly_minify_css($string) {
		$string = preg_replace('!/\*.*?\*/!s','', $string);
		$string = preg_replace('/\n\s*\n/',"\n", $string);
		
		// space
		$string = preg_replace('/[\n\r \t]/',' ', $string);
		$string = preg_replace('/ +/',' ', $string);
		$string = preg_replace('/ ?([,:;{}]) ?/','$1',$string);
		
		// trailing;
		$string = preg_replace('/;}/','}',$string);
		
		return $string;
	}	
	
	
/*	Enqueue Admin Scripts
    ================================================= */    	
	function curly_admin_enqueue($hook) {	
		wp_enqueue_script('thickbox');
	 	wp_enqueue_style('thickbox');
	}
	add_action( 'admin_init', 'curly_admin_enqueue' );	

/*	HTML5 Shim
	================================================= */	
	function add_ie_html5_shim () {
	    echo '<!--[if lt IE 9]>';
	    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
	    echo '<script src="'.get_template_directory_uri() .'/js/respond.min.js"></script>';
	    echo '<![endif]-->';
	}
	add_action('wp_head', 'add_ie_html5_shim');

/*	Fix XUA
	================================================= */		
	function curly_fix_xua(){
		if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1');
	}
	add_action('send_headers', 'curly_fix_xua');
	
/*	Convert Hex to RGB
	================================================= */	
	if (!function_exists('curly_hex2rgb')) {
		function curly_hex2rgb($hex) {
		   $hex = str_replace("#", "", $hex);
		
		   if(strlen($hex) == 3) {
		      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		   } else {
		      $r = hexdec(substr($hex,0,2));
		      $g = hexdec(substr($hex,2,2));
		      $b = hexdec(substr($hex,4,2));
		   }
		   $rgb = array($r, $g, $b);
		   return implode(",", $rgb);
		}
	}

/*	Calculate Color Brightness
	================================================= */	
	if (!function_exists('curly_brightness')) {
		function curly_brightness($hexStr) {
			$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); 
			$rgbArray = array();
			if (strlen($hexStr) == 6) { 
				$colorVal = hexdec($hexStr);
				$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
				$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
				$rgbArray['blue'] = 0xFF & $colorVal;
			} elseif (strlen($hexStr) == 3) {
				$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
				$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
				$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
			} else {
				return false;
			}
			return (($rgbArray['red']*299) + ($rgbArray['green']*587) + ($rgbArray['blue']*114))/1000;
		}
	}

/*	Calculate Color Contrast
	================================================= */	
	if (!function_exists('curly_contrast')) {
		function curly_contrast($color, $test1, $test2) {
			return (abs(curly_brightness($test1) - curly_brightness($color)) > abs(curly_brightness($test2) - curly_brightness($color))) ? $test1 : $test2;
		}
	}

/*	Color Manipulation
	================================================= */	
	if (!function_exists('curly_darken')) {
		function curly_darken($color, $dif=20){
		    $color = str_replace('#', '', $color);
		    if (strlen($color) != 6){ return '000000'; }
		    $rgb = '';
		    for ($x=0;$x<3;$x++){
		        $c = hexdec(substr($color,(2*$x),2)) - $dif;
		        $c = ($c < 0) ? 0 : dechex($c);
		        $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
		    }
		    return '#'.$rgb;
		}
	}	

/*	Custom Menu Walker (Subemnu Icon)
	================================================= */
	add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
	function add_menu_parent_class( $items ) {
		
		$parents = array();
		foreach ( $items as $item ) {
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}
		
		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents ) ) {
				$item->classes[] = 'menu-parent-item'; 
			}
		}
		
		return $items;    
	}
	
/*	Register Theme Navigation
	================================================= */	
	register_nav_menus( array(
			'menuMainMenu' => 'Main Menu'
	));

/*	Register Sidebars
	================================================= */	
	if ( function_exists('register_sidebar'))
		register_sidebar(array(
		'name'			 => __('Sidebar - Blog', 'CURLYTHEME'),
		'id'			 => 'sidebar_blog',
		'before_widget'	 => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' 	 => '</div>',
		'before_title'	 => '<h5 class="special-title"><span>',
		'after_title'		 => '</span></h5>',
	));
	
	if ( function_exists('register_sidebar'))
		register_sidebar(array(
		'name'			 => __('Sidebar - Page' , 'CURLYTHEME'),
		'id'			 => 'sidebar_page',
		'before_widget'	 => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' 	 => '</div>',
		'before_title'	 => '<h5 class="special-title"><span>',
		'after_title'		 => '</h5>',
	));
	
	if ( function_exists('register_sidebar'))
		register_sidebar(array(
		'name'			 => __('Pre-Footer Left' , 'CURLYTHEME'),
		'id'			 => 'pre_footer_sidebar_left',
		'before_widget'	 => '<div id="%1$s" class="col-lg-8 col-md-8 pre-footer-widget %2$s">',
		'after_widget' 	 => '</div>',
		'before_title'	 => '<h4 class="special-title"><span>',
		'after_title'		 => '</span></h4>',
	));	
	
	if ( function_exists('register_sidebar'))
		register_sidebar(array(
		'name'			 => __('Pre-Footer Right' , 'CURLYTHEME'),
		'id'			 => 'pre_footer_sidebar_right',
		'before_widget'	 => '<div id="%1$s" class="col-lg-4 col-md-4 pre-footer-widget %2$s">',
		'after_widget' 	 => '</div>',
		'before_title'	 => '<h4 class="special-title"><span>',
		'after_title'		 => '</span></h4>',
	));	
	
	if ( function_exists('register_sidebar'))
		register_sidebar(array(
		'name'			 => __('Footer Left Sidebar' , 'CURLYTHEME'),
		'id'			 => 'footer_sidebar_left',
		'before_widget'	 => '<div id="%1$s" class="col-lg-5 col-md-5 col-sm-4 footer-widget %2$s">',
		'after_widget' 	 => '</div>',
		'before_title'	 => '<h5 class="special-title"><span>',
		'after_title'		 => '</span></h5>',
	));	
	
	if ( function_exists('register_sidebar'))
		register_sidebar(array(
		'name'			 => __('Footer Center Sidebar' , 'CURLYTHEME'),
		'id'			 => 'footer_sidebar_center',
		'before_widget'	 => '<div id="%1$s" class="col-lg-4 col-md-4 col-sm-4 footer-widget %2$s">',
		'after_widget' 	 => '</div>',
		'before_title'	 => '<h5 class="special-title"><span>',
		'after_title'		 => '</span></h5>',
	));	
	
	if ( function_exists('register_sidebar'))
		register_sidebar(array(
		'name'			 => __('Footer Right Sidebar', 'CURLYTHEME'),
		'id'			 => 'footer_sidebar_right',
		'before_widget'	 => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-4 footer-widget %2$s">',
		'after_widget' 	 => '</div>',
		'before_title'	 => '<h5 class="special-title"><span>',
		'after_title'		 => '</span></h5>',
	));	
	
	if ( function_exists('register_sidebar'))
		register_sidebar(array(
		'name'			 => 'Absolute Footer',
		'id'			 => 'absolute_footer',
		'before_widget'	 => '',
		'after_widget' 	 => '',
		'before_title'	 => '',
		'after_title'	 => '',
	));	

/*	Generate Fonts
	================================================= */
	function curly_generate_fonts(){
	
		$json_fonts_data = json_decode(get_option(THEMEPREFIX.'_json_font_list'), true);

		// Fonts
		$fonts_body			=	get_option(THEMEPREFIX.'_fonts_body', 0);
		$fonts_h1			=	get_option(THEMEPREFIX.'_fonts_h1', 0);
		$fonts_h2			=	get_option(THEMEPREFIX.'_fonts_h2', 3);
		$fonts_h3			=	get_option(THEMEPREFIX.'_fonts_h3', 0);
		$fonts_h4			=	get_option(THEMEPREFIX.'_fonts_h4', 2);
		$fonts_h5			=	get_option(THEMEPREFIX.'_fonts_h5', 0);
		$fonts_h6			=	get_option(THEMEPREFIX.'_fonts_h6', 0);
		$fonts_menu			=	get_option(THEMEPREFIX.'_fonts_menu', 0);
		$fonts_blockquotes	=	get_option(THEMEPREFIX.'_fonts_blockquotes', 0);
		
		$fonts = array();

		array_push($fonts, $fonts_body);
		array_push($fonts, $fonts_h1);
		array_push($fonts, $fonts_h2);
		array_push($fonts, $fonts_h3);
		array_push($fonts, $fonts_h4);
		array_push($fonts, $fonts_h5);
		array_push($fonts, $fonts_h6);
		array_push($fonts, $fonts_menu);
		array_push($fonts, $fonts_blockquotes);
		
		$fonts = array_values(array_unique($fonts));
		
		for($i = 0; $i < count($fonts); $i++){
			if (isset($fonts[$i])) {
				if ($json_fonts_data[$fonts[$i]][0] == 1) {
					$fonts[$i] = str_replace(' ', '+' ,$json_fonts_data[$fonts[$i]][1]).':300,400,700';
				} else {
					$fonts[$i] = null;
				}
			}
		}
		$fonts	=	array_values(array_filter($fonts));
		
		$subset	=	get_option(THEMEPREFIX.'_fonts_subset',0);
		
		function subset_fonts($subset){
			switch ($subset){
				case 0 		: return 'latin'; break;
				case 1 		: return 'latin,cyrillic-ext,cyrillic'; break;
				case 2 		: return 'latin,greek-ext,greek'; break;
				case 3 		: return 'latin,greek'; break;
				case 4 		: return 'latin,vietnamese'; break;
				case 5 		: return 'latin,latin-ext'; break;
				case 5 		: return 'latin,cyrillic'; break;
			}
		}
		
		if (count($fonts) > 0) {
			$html =  " <script type=\"text/javascript\">\n
						WebFontConfig = {
					    google: { families: [";
			
						for($i=0; $i<count($fonts); $i++){
							$html .= "'".$fonts[$i].':'.subset_fonts($subset)."'";
							if($i < count($fonts)-1) { $html .= ','; }
						}		   
						 			    
			$html .= " ] }
					  };
					  (function() {
					    var wf = document.createElement('script');
					    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
					      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
					    wf.type = 'text/javascript';
					    wf.async = 'true';
					    var s = document.getElementsByTagName('script')[0];
					    s.parentNode.insertBefore(wf, s);
					})(); </script>";
			
			echo $html;
		}
	}
	add_action('wp_footer', 'curly_generate_fonts');

/*	Sanitize Font Names
	================================================= */
	function curly_font_names($font){
		return str_replace(' ', '+' ,$font);
	}

/*	Output Fonts
	================================================= */
	function curly_get_fonts() {
		$json_fonts_data = json_decode(get_option(THEMEPREFIX.'_json_font_list'), true);
		
		$font_list = array();
		
		for ($i = 0; $i < count($json_fonts_data); $i++) {
			$font_list[$i] = $json_fonts_data[$i][1];
		}
		
		asort($font_list);
		
		return $font_list;
	}

/*	Generate Font Size Range
	================================================= */
	function curly_get_font_sizes($start, $stop){
		$sizes = array();
		for ($i=$start; $i<=$stop; $i++){ $sizes[$i] = $i.' px'; }
		return $sizes;
	}

/*	Generate Font Style
	================================================= */
	function curly_get_font_style($style){
		switch ($style) {
			case 0 : return 'font-weight: 300;';break;
			case 1 : return 'font-weight: 300;font-style: italic;';break;
			case 2 : return 'font-weight: normal;font-style: normal;';break;
			case 3 : return 'font-weight: 700;'; break;
			case 4 : return 'font-style: italic;';break;
			case 5 : return 'font-style: italic; font-weight: bold;';break;
		}
	}

/*	Generate Font Variant
	================================================= */
	function curly_get_font_variant($style){
		switch ($style) {
			case 0 : return 'text-transform: none;';break;
			case 1 : return 'text-transform: capitalize;';break;
			case 2 : return 'text-transform: uppercase;';break;
			case 3 : return 'font-variant: small-caps;';break;
		}
	}

/*	Allow Font Upload
	================================================= */	
	function curly_custom_mime_types($mimes)
	{
		$mimes['ttf'] = 'font/ttf';
		$mimes['woff'] = 'font/woff';
		$mimes['svg'] = 'font/svg';
		$mimes['eot'] = 'font/eot';
	
		return $mimes;
	}
	add_filter('upload_mimes', 'curly_custom_mime_types');

/*	Output Logo / Title
	================================================= */	
	function curly_get_logo(){
		$title 			= 	get_option(THEMEPREFIX.'_title', get_option('blogname'));
		$logo 			= 	get_option(THEMEPREFIX.'_logo');
		$logo_id 		= 	get_option(THEMEPREFIX.'_logo_id');
		$logo_retina 	= 	get_option(THEMEPREFIX.'_logo_retina');
		if (!$logo_retina) { $logo_retina = get_option(THEMEPREFIX.'_logo'); }
		$blog_title		= 	get_bloginfo('name');
		
		if($logo) { 
			if (!$logo_id) {
				$logo_path = preg_replace('/(http:\/\/.+)wp-content/','',$logo);
				$logo_path = WP_CONTENT_DIR.$logo_path;
				list($width, $height, $type, $attr) = getimagesize($logo_path);
			} else {
				$picture_details = wp_get_attachment_image_src($logo_id, 'full');
				$attr = ' width="'.$picture_details[1].'" height="'.$picture_details[2].'" ';
			}
			
			return '<div class="logo"><a href="'.home_url() .'" title="'.$blog_title.'"><img src="'.$logo.'" alt="'.$blog_title.'" class="logo-nonretina"><img src="'.$logo_retina.'" alt="'.$blog_title.'" '.$attr.' class="logo-retina"></a></div>'; 
		} else { 
			return '<h1 class="logo"><a href="'.home_url().'" title="'.$blog_title.'">'.$title.'<small>'.get_bloginfo('description').'</small></a></h1>'; 
		}
	}
	
/*	Generate Breadcrumbs
	================================================= */	
	function curly_breadcrumbs() {
		
		global $post;
		
		$active					=		get_option(THEMEPREFIX.'_bc', true);
		$strings_before			=		get_option(THEMEPREFIX.'_bc_text_before');
		$strings_home			=		get_option(THEMEPREFIX.'_bc_text_home', get_option('blogname'));
		$strings_category		=		get_option(THEMEPREFIX.'_bc_text_category', __("Archive by Category '%s'" , 'CURLYTHEME'));
		$strings_search			=		get_option(THEMEPREFIX.'_bc_text_search', __("Search Results for '%s'" , 'CURLYTHEME'));
		$strings_tag			=		get_option(THEMEPREFIX.'_bc_text_tag', __("Posts Tagged '%s'" , 'CURLYTHEME'));
		$strings_author			=		get_option(THEMEPREFIX.'_bc_text_author', __("Articles Posted by '%s'" , 'CURLYTHEME'));
		$strings_404			=		get_option(THEMEPREFIX.'_bc_text_404', __("Page not found" , 'CURLYTHEME'));
		$strings_separator		=		get_option(THEMEPREFIX.'_bc_separator', '&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;');
		
		if ($strings_before) $strings_before = '<li class="bc-before">'.$strings_before.'</li>';
		
		$home			 = home_url();
		$wrap_before	 = '<li>';
		$wrap_after 	 = '</li>';
		$link 			 = $wrap_before . '<a href="%1$s">%2$s</a>' . $strings_separator. $wrap_after;
		$html 			 = '<ul class="theme-bc">'.$strings_before. sprintf($link, $home, $strings_home);
	
		if ( is_page() && !$post->post_parent ) {
			$html .= $wrap_before.get_the_title().$wrap_after;
	
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$bc = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$bc[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
				$parent_id  = $page->post_parent;
			}
			$bc = array_reverse($bc);
			for ($i = 0; $i < count($bc); $i++) {
				$html .= $bc[$i];
			}
			$html .= $wrap_before.get_the_title().$wrap_after;
	
		} elseif (is_home()){
			$html .= $wrap_before.get_the_title(get_option('page_for_posts', true)).$wrap_after;
		} elseif ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE);
				$cats = str_replace('<a', $wrap_before . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>'.$strings_separator.$wrap_after, $cats);
				$html .= $cats;
			}
			$html .= $wrap_before.sprintf($strings_category, single_cat_title('', false)).$wrap_after;
	
		} elseif ( is_search() ) {
			$html .= $wrap_before.sprintf($strings_search, get_search_query()).$wrap_after;
	
		} elseif ( is_day() ) {
			$html .= $wrap_before.sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')).$wrap_after;
			$html .= $wrap_before.sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')).$wrap_after;
			$html .= $wrap_before.get_the_time('d').$wrap_after;
	
		} elseif ( is_month() ) {
			$html .= $wrap_before.sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')).$wrap_after;
			$html .= $wrap_before.get_the_time('F').$wrap_after;
	
		} elseif ( is_year() ) {
			$html .= $wrap_before.get_the_time('Y').$wrap_after;
	
		} elseif ( is_single() && !is_attachment() ) {
				$html .= $wrap_before.get_the_title(get_option('page_for_posts')).$wrap_after;
		} elseif(is_tax()){
				
			$html .= $wrap_before.wp_title(' ', false).$wrap_after ;
			
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			$html .= $wrap_before.$post_type->labels->singular_name.$wrap_after;
	
		} elseif ( is_attachment() ) {
			$html .= $wrap_before.wp_title(' ', false).$wrap_after ;
	
		} elseif ( is_tag() ) {
			$html .= $wrap_before.sprintf($strings_tag, single_tag_title('', false)).$wrap_after;
	
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			$html .= $wrap_before.sprintf($strings_author, $userdata->display_name).$wrap_after;
	
		} elseif ( is_404() ) {
			$html .=  $wrap_before.$strings_404.$wrap_after;
		}
		
		
		function checkForPaged(){
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) return true;
		}
	
		if ( get_query_var('paged') ) if ( checkForPaged() == true) $html .= ' ('.__('Page') . ' ' . get_query_var('paged').')';
		
		$html .= '</ul>';
		
		return ($active == "true") ? $html : null;
	}

/*	Page Heading
	================================================= */
	function curly_get_page_title(){
		global $post;
		
		if (is_page() || is_single() || is_attachment() ) 
			if(get_post_type() == "post")
				return get_the_title(get_option('page_for_posts'));
			else
			return get_the_title();
		elseif	(is_home())
			return get_the_title(get_option('page_for_posts', true) );
		elseif (is_category() || is_tax())
			return single_cat_title('' , false);
		elseif (is_archive()){
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'CURLYTHEME' ), '<span>' . get_the_date() . '</span>' );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'CURLYTHEME' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'CURLYTHEME' ) ) . '</span>' );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'CURLYTHEME' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'CURLYTHEME' ) ) . '</span>' );
			else :
				_e( 'Archives', 'CURLYTHEME' );
			endif;
		}
		elseif (is_search())
			return __('Search Results' , 'CURLYTHEME');
		elseif (is_404())
			return __('Page not found' , 'CURLYTHEME');	
		else
			return get_the_title();
	}
	
/*	SEO Page Titles
	=================================================*/
	function curly_get_page_seo_title(){
	
		global $post;
		
		$blog	= get_bloginfo('name');
		$desc	= get_bloginfo('description');
		
		if (is_single()) {
			
			$title  = get_post_meta($post->ID, 'seotitle', true);
			$format	= get_option(THEMEPREFIX.'_seo_title_post', 0);
			
			if(!$title) $title = $title = $post->post_title;
			
			switch($format){
				case '0'	: 	$title =  $title; break;
				case '1' 	: 	$title =  $title.' | '.$blog; break;
				case '2' 	: 	$title =  $title.' | '.$desc; break;
			}
			
		} elseif (is_page()) {
		
			$title  = get_post_meta($post->ID, 'seotitle', true);
			$format	= get_option(THEMEPREFIX.'_seo_title_page', 0);
			
			if(!$title) $title = $post->post_title;
			
			switch($format){
				case '0'	: 		$title = $title; break;
				case '1'	: 		$title = $title.' | '.$blog; break;
				case '2'	: 		$title = $title.' | '.$desc; break;
			}
		
		} elseif (is_category()) {
		
			$title  = single_cat_title('',false);
			$format	= get_option(THEMEPREFIX.'_seo_title_category', 1);
			$cate	= category_description();
			
			switch($format){
				case '1'	:  $title = $title.' | '.$blog; break;
				case '2'	:  $title = $title.' | '.$desc; break;
				case '3'   	:  $title = $title.' | '.strip_tags($cate); break;
			}
		
		
		} elseif (is_tag()){
			
			$title  = single_tag_title('',false);
			$format	= get_option(THEMEPREFIX.'_seo_title_tag', 1);
			
			switch($format){
				case '1'   	  :  $title = $title.' | '.$blog; break;
				case '2'	  :  $title = $title.' | '.$desc; break;
			}
		
		} elseif (is_search()){
			
			global $query_string;
			$title  = substr(strip_tags($query_string), 2);
			$format	= get_option(THEMEPREFIX.'_seo_title_search', 1);
			
			switch($format){
				case '1'   	   :  $title = $title.' | '.$blog; break;
				case '2'	   :  $title = $title.' | '.$desc; break;
			}
			
		}elseif (is_archive()){
			
			$title  = single_month_title('',false);
			$format	= get_option(THEMEPREFIX.'_seo_title_archive', 1);
			
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			    if (is_shop()) {
			    	$title = get_the_title(get_option('woocommerce_shop_page_id'));
			    }
			}
			
			switch($format){
				case '1'   	   :  $title = $title.' | '.$blog; break;
				case '2'	   :  $title = $title.' | '.$desc; break;
			}
		
		} elseif (is_404()){
			$title	= get_option(THEMEPREFIX.'_seo_title_search', __('404 Error. Page Not Found.', 'CURLYTHEME'));
		} elseif (is_home()){
			$title	= get_the_title(get_option('page_for_posts')).' | '.$blog;
		}
		
		return $title;
	}
	
	if( get_option(THEMEPREFIX.'_seo') != "true" && get_option(THEMEPREFIX.'_seo_title_rewrite') != 'true') { 
		add_filter( 'wp_title', 'curly_get_page_seo_title', 10, 2 );
	}

/*	Add Shortcodes Buttons to TinyMCE
	================================================= */
	add_action('init', 'curly_add_button');
	add_action('init', 'curly_add_button2');

	function curly_add_button() {  
	   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
	   {  
	     add_filter('mce_external_plugins', 'curly_add_plugin');  
	     add_filter('mce_buttons_3', 'curly_register_button');  
	   }  
	}  
	
	function curly_add_button2() {  
	   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
	   {  
	     add_filter('mce_external_plugins', 'curly_add_plugin2');  
	     add_filter('mce_buttons_4', 'curly_register_button2');  
	   }  
	}  
	
	function curly_register_button($buttons) {  
	   array_push($buttons, "column_12", "column_13", "column_23", "column_14", "column_24", "column_34", "clear", "divider",  "button", "alert", "blockquotee", "lists", "abbrr", "dropcap", "highlight", "action", "accordion", "tabs");  
	   return $buttons;  
	}  
	
	function curly_register_button2($buttons) {  
	   array_push($buttons, "person","testimonials", "youtube", "vimeo", "toggle" ,"slider"  ,"marker", "boxes", "progress", "pricing", "icon", "clients",  "lightbox", "lightbox", "photoframe",  "picturezoom", "agenda", "countdown", "mapmaker"); 
	   return $buttons;  
	}  

	function curly_add_plugin($plugin_array) {  
	   $plugin_array['column_12']	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['column_13']	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['column_23']	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['column_14'] 	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['column_24'] 	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['column_34'] 	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['divider']   	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['button']   	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['alert']   	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['blockquotee']  = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['lists']  		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['abbrr']  		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['dropcap']  	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['highlight']  	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['action']  	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['accordion'] 	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['tabs'] 		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	
	   return $plugin_array;  
	}
	
	function curly_add_plugin2($plugin_array) {  
	   $plugin_array['person']  	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['testimonials'] = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['youtube'] 	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['vimeo']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['toggle']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['slider']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['marker']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['boxes']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['progress']	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['pricing']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['clear']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['icon']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['clients']		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['lightbox']	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['photoframe']	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['picturezoom']  = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['agenda'] 		 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['countdown'] 	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   $plugin_array['mapmaker'] 	 = get_template_directory_uri().'/shortcodes/tinymce/buttons.js';
	   
	   return $plugin_array;  
	}

/*	Shortcode Sanitizer
	================================================= */
	function curly_shortcode_sanitizer($content) {
		$needle = join("|",array("column", '\/column', "list", "tabs", "tab", "toggle", "accordion", "testimonials", "testimonial", "clear", "divider", "button", "blockquote", "highlight", "call2action", "toggle-box", "slider", "slide", "youtube", "vimeo", "progress", "icon", "clients", "client", "pretty-photo", "agenda", "event-day", "event", "pricing-table", "pricing-column", "pricing-header", "pricing-row", "pricing-footer", "map-maker", "picture-zoom", "full-width-box", '\/full-width-box', "box", "\/box", "ios-slider", "ios-slide", "roundabout-slider", "roundabout-slide", "person", "photo-frame", "gallery", "countdown"));
	
		$html = preg_replace("/(<p>)?\[($needle)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		$html = preg_replace("/(<p>)?\[\/($needle)](<\/p>|<br \/>)/","[/$2]",$html);
	
		return $html;
	}
	add_filter('the_content', 'curly_shortcode_sanitizer');
	add_filter('widget_text', 'curly_shortcode_sanitizer');

/*	Generate Slider
	================================================= */
	function curly_get_slider(){
		global $post;
		
		// Slider
		$slider		 			 = get_post_meta($post->ID, 'slider', true);
		$display   	 			 = get_post_meta($post->ID, 'display', true);
		$height  	 			 = get_post_meta($post->ID, 'height', true);
		$slider_text_color   	 = get_post_meta($post->ID, 'slider_text_color', true);
		$slider_color   	 	 = get_post_meta($post->ID, 'slider_color', true);
		$slider_shortcode   	 = get_post_meta($post->ID, 'slider_shortcode', true);
		
		// Slides
		$links  	 	= get_post_meta($post->ID, 'slides_link', true);
		$images  	 	= get_post_meta($post->ID, 'slides_images', true);
		$titles  	 	= get_post_meta($post->ID, 'slides_title', true);
		$subtitles   	= get_post_meta($post->ID, 'slides_subtitle', true);
		$descriptions	= get_post_meta($post->ID, 'slides_description', true);
		$buttons		= get_post_meta($post->ID, 'slides_buttons', true);
		$buttons_texts  = get_post_meta($post->ID, 'slides_buttons_texts', true);
		
		$settings = null;
		
		if($display == 'off') $css_display = ' boxed_small';
		
		if($slider != 'no-slider'){
			
			// iOS Slider
			if($slider == 'ios-slider'){
				if($slider_text_color != "#") $settings .= ' textcolor="'.$slider_text_color.'"';
				if($slider_text_color != "#") $settings .= ' bgcolor="'.$slider_color.'"';
				if($height == "on") $settings .= ' height="tall"';
				$out = '[ios-slider'.$settings.']';
				for($i=0; $i<count($links); $i++) {
					$out .= '[ios-slide title="'.$titles[$i].'" subtitle="'.$subtitles[$i].'"  link="'.$links[$i].'"  textcolor="'.$slider_text_color.'" bgcolor="'.$slider_color.'" image="'.wp_get_attachment_url($images[$i]).'"][/ios-slide]';
				}
				$out .= '[/ios-slider]';
				
				if($display == "off"){ $before = null; $after = null;}
				echo $before.do_shortcode($out).$after;
			}
			
			// Round About Slider
			elseif($slider == 'roundabout-slider'){
				if($slider_text_color != "#") $settings .= ' textcolor="'.$slider_text_color.'"';
				if($slider_text_color != "#") $settings .= ' bgcolor="'.$slider_color.'"';
				if($height == "on") $settings .= ' height="tall"';
				$out = '[roundabout-slider'.$settings.']';
				for($i=0; $i<count($links); $i++) {
					$out .= '[roundabout-slide image="'.wp_get_attachment_url($images[$i]).'"  title="'.$titles[$i].'" link="'.$links[$i].'"][/roundabout-slide]';
				}
				$out .= '[/roundabout-slider]';
				
				$before = null; $after = null;
				echo $before.do_shortcode($out).$after;
			}
			
			// Layer Slider
			elseif($slider == 'layer-slider'){
				$out = $slider_shortcode;
				if($display == "off"){ $before = '<div class="layer-slider-container">'; $after = '</div>';}
				echo $before.do_shortcode($out).$after;
			}
		}
	}

/*	Get Attachement ID
	================================================= */
	function curly_get_attachment_id_by_src($image_src) {
	
	    global $wpdb;
	    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	    $id = $wpdb->get_var($query);
	    return $id;
	
	}    

/*	Convert HEX Color Code to RGB Color Code
	================================================= */
	function hexToRgb($hex) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   return implode(",", $rgb);
	}

/*	Custom Pagination
	================================================= */
	function curly_get_pagination($pages = null){
		global $wp_query;
		global $paged;
		
		if($pages ==  null) $pages = $wp_query->max_num_pages;
		
		if($paged == 0) $paged++;
		if($pages > 1)
		{
		   $html = '<ul class="pagination">';
		   if($paged > 1) $html .= '<li><a class="pagination-prev" href="'.get_pagenum_link($paged - 1).'"><span>'.__('&laquo;', 'CURLYTHEME').'</span></a></li>';
		   for ($i=1; $i <= $pages; $i++){
			  $html .= ($paged == $i) ? '<li class="active"><span>'.$i.'</span></li>' : '<li><a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a></li>';
		   }
		   if ($paged < $pages) $html .= '<li><a class="pagination-next" href="'.get_pagenum_link($paged + 1).'">'.__('&raquo;', 'CURLYTHEME').'</a></li>';  
		   $html .= '</ul>';
		   return $html;
	     }
		 else return null;
	}

/*	Check for Heading
	================================================= */
	function curly_check_heading() {
	
	$heading = get_option(THEMEPREFIX.'_page_heading', 'true');
	
	if (is_page() || is_single()) {
		global $post;
		
		$heading_temp = get_post_meta($post->ID, THEMEPREFIX.'page_heading', true);
		
		if (isset($heading_temp)) {
			switch ($heading_temp) {
				case 'on' : $heading = 'false'; break;
				case 'off' : $heading = 'true'; break;
			}
		}
	}
	
	return $heading;
		
	}

/*	Hide Comments
	================================================= */
	if (get_option(THEMEPREFIX.'_general_comments_pages') == "true") {
		add_filter( 'comments_open', 'curly_comments_open', 10, 2 );
		
		function curly_comments_open( $open, $post_id ) {
			$post = get_post( $post_id );
			
				if ( 'page' == $post->post_type )
					$open = false;
			
				return $open;
		}	
	}

/*	Get Comments
	================================================= */
	function comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'CURLYTHEME' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'CURLYTHEME'), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
			// Proceed with normal comments.
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<header class="comment-meta comment-author vcard">
					<?php
						echo get_avatar( $comment, 40 );
						printf( '<cite class="fn">%1$s </cite>',
								get_comment_author_link()
						);
						printf( '<time datetime="%1$s">@ %2$s</time>',
								get_comment_time( 'c' ),
								sprintf( __( '%1$s at %2$s', 'CURLYTHEME' ), get_comment_date(), get_comment_time() )
						);
					?>
				</header><!-- .comment-meta -->
	
				<section class="comment-content comment">
					<div>
						<?php comment_text(); ?>
					</div>
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <i class="fa fa-share-alt"></i>', 'CURLYTHEME' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					<?php edit_comment_link( __( 'Edit', 'CURLYTHEME' ), '<span class="edit-link">', '</span>' ); ?>
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<span class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'CURLYTHEME' ); ?></span>
					<?php endif; ?>
				</section>
			</article>
		<?php
			break;
		endswitch; 
	}

/*	Custom Excerpt
	================================================= */
	function curly_custom_excerpt_length() {
		$length					=	get_option(THEMEPREFIX.'_blog_listing_excerpt');
		if (!$length) $length = 60;
		return $length;
	}
	add_filter( 'excerpt_length', 'curly_custom_excerpt_length', 999 );

/*	Sanitize Category Links
	================================================= */
	function curly_remove_category_list_rel( $output ) {
	    return str_replace( ' rel="category tag"', '', $output );
	}
	add_filter( 'wp_list_categories', 'curly_remove_category_list_rel' );
	add_filter( 'the_category', 'curly_remove_category_list_rel' );

/*	Enqueue Comments Reply
	================================================= */
	function curly_xtreme_enqueue_comments_reply() {
	    if( get_option( 'thread_comments' ) )  {
	        wp_enqueue_script( 'comment-reply' );
	    }
	}
	add_action( 'comment_form_before', 'curly_xtreme_enqueue_comments_reply' );

/*	Check for Shortcodes
	================================================= */
	function curly_has_shortcode($shortcode = '') {
		$post_to_check = get_post(get_the_ID());
		$found = false;
		if (!$shortcode) {
			return $found;
		}
		if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) {
			$found = true;
		}
		return $found;
	}
	
/*	Language Switcher
	================================================= */
	function curly_language_selector_flags(){
		if(function_exists('icl_get_languages')){
			$html = '<div class="curly-lang-switcher"><i class="fa fa-globe"></i>  '.get_option(THEMEPREFIX.'_header_2nd_text_line' , __('Choose Language' , 'CURLYTHEME')).'<ul>';
		    $languages = icl_get_languages('skip_missing=0&orderby=code');
		    if(!empty($languages)){
		        foreach($languages as $l){
		        	$html .= '<li>';
		            if(!$l['active']) $html .= '<a href="'.$l['url'].'">';
		            $html .= '<i class="fa fa-angle-right"></i> '.$l['native_name'];
		            if(!$l['active']) $html .= '</a>';
		            $html .= '</li>';
		        }
		    }
		    $html .= '</ul></div>';
	    }
	    
	   return (isset($html)) ? $html : null;
	}

/*	3rd Party Integration
	================================================= */

/*	WPML
	================================================= */
	define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
	define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
	define('ICL_DONT_LOAD_LANGUAGES_JS', true);

/*	WooCommerce
	================================================= */
	add_theme_support( 'woocommerce' );
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
		/* Register WooCommerce Sidebar */
	    if ( function_exists('register_sidebar'))
	    	register_sidebar(array(
	    	'name'			 => 'Sidebar - Shop',
	    	'id'				 => 'sidebar_shop',
	    	'before_widget'	 => '<div id="%1$s" class="sidebar_widget %2$s">',
	    	'after_widget' 	 => '</div>',
	    	'before_title'	 => '<h5 class="special-title"><span>',
	    	'after_title'		 => '</span></h5>',
	    ));
	    
	    //add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	    
	    /* Breadcrumbs */
	    remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
	    
	    function curly_woocommerce_breadcrumbs() {
	    	$before = (get_option(THEMEPREFIX.'_bc_text_before')) ? '<li>'.get_option(THEMEPREFIX.'_bc_text_before').'</li>' : null;
	        return array(
	                'delimiter'   => get_option(THEMEPREFIX.'_bc_separator', '&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;'),
	                'wrap_before' => '<ul class="theme-bc" itemprop="breadcrumb">'.$before,
	                'wrap_after'  => '</ul>',
	                'before'      => '<li>',
	                'after'       => '</li>',
	                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	            );
	    }
	    
	    add_filter( 'woocommerce_breadcrumb_defaults', 'curly_woocommerce_breadcrumbs' );
	    
	    /* Pagination */
   		remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
   		function woocommerce_pagination() {
   		    echo curly_get_pagination();      
   		}
   		add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);
	}
	
/*	Localization
	================================================= */
function curly_theme_localization() {
    load_theme_textdomain('CURLYTHEME', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'curly_theme_localization');	
?>