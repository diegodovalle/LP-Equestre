<?php
add_shortcode("map-maker", "curly_mapmaker"); 		

function curly_mapmaker( $atts, $content = null ) {

	global $latitude, $longitude, $marker, $coloring, $color, $zoom, $type;
	
	extract( shortcode_atts( array(
		      'latitude'    => null,
		      'longitude'   => null,
		      'color' 		=> null,
		      'height' 		=> 400,
		      'zoom'   		=> 15,
		      'type'   		=> 'roadmap',
		      'marker'		=> null
	     ), $atts ) );
	
	if(!wp_script_is('google-maps')) wp_enqueue_script('google-maps');
	if(!wp_script_is('map-maker')) wp_enqueue_script('map-maker');
	
	if($color == null || $color == '#'){ $coloring = 0; $color = '#ffffff'; } else $coloring = 1;
	
	$marker = (!$marker) ? get_template_directory_uri()  .'/images/defaults/map-pin.png' : $marker;
	
    $html = '<div class="map-container" style="width: 100%; height: '.$height.'px;display:block; z-index:1; position: relative">
			  <div id="map" style="width:100%; height: 100%"></div>
			  </div>';	  

	function curly_shortcode_map() {
		
		global $latitude, $longitude, $marker, $coloring, $color, $zoom, $type;

		$html = '<script type="text/javascript">
						jQuery(document).ready(function(){
							var myMarkers = {"markers": [
									{"latitude": "'.$latitude.'", "longitude":"'.$longitude.'", "icon": "'.$marker.'", "baloon_text": "This is <strong>Texas</strong>"}
								]
							};
							
							if(jQuery(window).width() > 959) var drag = 1; else var drag = 0;
				
							jQuery("#map").mapmarker({
								zoom : '.$zoom.',							// Zoom
								center: "'.$latitude.', '.$longitude.'",		// Center of map
								type: "'.strtoupper($type).'",					// Map Type
								controls: "HORIZONTAL_BAR",			// Controls style
								dragging: drag,							// Allow dragging?
								mousewheel:0,						// Allow zooming with mousewheel
								markers: myMarkers,
								featureType:"all",
								visibility: "on",
								elementType:"all",
								styling: '.$coloring.',
								hue:"'.$color.'",
								saturation:-50,
								lightness:20,
								gamma:0,
								navigation_control:0
							});
				
						});
				  </script>';
		echo $html;
	}
	add_action('wp_footer', 'curly_shortcode_map', 20);
			  
	return $html;								 		 
}
?>