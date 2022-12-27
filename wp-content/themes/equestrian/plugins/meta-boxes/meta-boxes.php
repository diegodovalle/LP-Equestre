<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );

function cmb_sample_metaboxes( array $meta_boxes ) {

	$prefix = THEMEPREFIX;
	
	$meta_boxes[] = array(
		'id'         => 'contact_page_metabox',
		'title'      => 'Contact Details',
		'pages'      => array( 'page'),
		'show_on'    => array( 'key' => 'page-template', 'value' => array('page-templates/contact.php','page-templates/contact-2.php','page-templates/contact-3.php')),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, 
		'fields' => array(
		
			array(
				'name' => __('Side Content', 'CURLYTHEME'),
				'id'   => $prefix . 'contact_side',
				'type' => 'wysiwyg',
			),
			array(
				'name' => __('Map Coodinates<br> Latitude', 'CURLYTHEME'),
				'desc' => __('Latitude Coordinates (Please use decimal coordinates)', 'CURLYTHEME'),
				'id'   => $prefix . 'latitude',
				'type' => 'text_medium',
			),
			array(
				'name' => __('Map Coodinates<br> Longitude', 'CURLYTHEME'),
				'desc' => __('Longitude Coordinates (Please use decimal coordinates)', 'CURLYTHEME'),
				'id'   => $prefix . 'longitude',
				'type' => 'text_medium',
			),
			array(
				'name' => __('Map Type', 'CURLYTHEME'),
				'desc' => __('Choose your map type', 'CURLYTHEME'),
				'id'   => $prefix . 'map_type',
				'std' => 'roadmap',
				'type' => 'radio_inline',
				'options' => array(
					array( 'name' => __('Roadmap', 'CURLYTHEME'), 'value' => 'roadmap', ),
					array( 'name' => __('Satellite', 'CURLYTHEME'), 'value' => 'satellite', ),
					array( 'name' => __('Hybrid', 'CURLYTHEME'), 'value' => 'hybrid', ),
					array( 'name' => __('Terrain', 'CURLYTHEME'), 'value' => 'terrain', ),
				),
			),
			array(
				'name' => __('Map Height', 'CURLYTHEME'),
				'desc' => __('Map height in pixels. Default is 500px.', 'CURLYTHEME'),
				'id'   => $prefix . 'map_height',
				'std'  => 500,
				'type' => 'text_small',
			),
			array(
				'name' => __('Map Level Zoom', 'CURLYTHEME'),
				'desc' => __('Map level zoom. Default level is 15', 'CURLYTHEME'),
				'id'   => $prefix . 'map_zoom',
				'std'  => 15,
				'type' => 'text_small',
			),
			array(
				'name' => __('Map Marker', 'CURLYTHEME'),
				'desc' => __('Use this image to mark your location', 'CURLYTHEME'),
				'id'   => $prefix . 'map_marker',
				'type' => 'file',
			),
			array(
				'name' => __('Map Color', 'CURLYTHEME'),
				'desc' => __('Choose map saturation color. Leave Blank for Default colors. Only works with map type set to roadmap.', 'CURLYTHEME'),
				'id'   => $prefix . 'map_color',
				'type' => 'colorpicker',
			),
			
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'individual_page_metabox',
		'title'      => 'Individual Page Settings',
		'pages'      => array( 'page', 'post' ),
		'context'    => 'normal',
		'priority'   => 'core',
		'show_names' => true, 
		'fields' => array(
			array(
				'name' => __('Page Heading Background Image', 'CURLYTHEME'),
				'desc' => __('Please set a background image for this page only. Recommended size is 1600px * 500px', 'CURLYTHEME'),
				'id'   => $prefix . 'page_settings_heading_image',
				'type' => 'file',
				'save_id' => true
			),
			array(
				'name' => __('Use Large Header', 'CURLYTHEME'),
				'desc' => __('Use this image as a large header (Title & Breadcrumbs will not be visible anymore)', 'CURLYTHEME'),
				'id'   => $prefix . 'large_header',
				'type' => 'checkbox',
			),
			array(
				'name' => __('Hide Page Heading', 'CURLYTHEME'),
				'desc' => __('Check this to this the page heading(Title & Breadcrumbs will not be visible anymore)', 'CURLYTHEME'),
				'id'   => $prefix . 'page_heading',
				'type' => 'checkbox',
			),
			array(
				'name' => __('Mobile Header', 'CURLYTHEME'),
				'desc' => __('Push slider below header on mobile devices', 'CURLYTHEME'),
				'id'   => $prefix . 'header_push',
				'type' => 'checkbox',
			),
		)
	);

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

?>