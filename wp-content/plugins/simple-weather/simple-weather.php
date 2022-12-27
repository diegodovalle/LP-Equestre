<?php
/*
Plugin Name: Simple Weather
Plugin URI: http://www.curlythemes.com
Description: This plugin gives you a simple shortcode & widget to display the weather.
Version: 1.1
Author: Curly Themes
Author URI: http://www.curlythemes.com
*/

function curly_sw_init() {
  load_plugin_textdomain( 'SIMPLEWEATHER', false, dirname( plugin_basename( __FILE__ ) ). '/languages/' ); 
}
add_action('plugins_loaded', 'curly_sw_init');

function curly_sw_options_header() {
	if (!is_admin()) {
		wp_enqueue_style('simple-weather', plugins_url( '/css/simple-weather.css' , __FILE__ ), true);
		wp_enqueue_style('meteocons', plugins_url( '/css/meteocons.css' , __FILE__ ), true);
	} 
}
add_action('wp_enqueue_scripts', 'curly_sw_options_header');

function curly_sw_get_weather_icon($code) {
	switch ($code) {
		case 200 : return '0'; break;
		case 201 : return '0'; break;
		case 202 : return '0'; break;
		case 210 : return '0'; break;
		case 211 : return '0'; break;
		case 212 : return '0'; break;
		case 221 : return '0'; break;
		case 230 : return '0'; break;
		case 231 : return '0'; break;
		case 232 : return '0'; break;
		case 300 : return 'R'; break;
		case 301 : return 'R'; break;
		case 302 : return 'R'; break;
		case 310 : return 'R'; break;
		case 311 : return 'R'; break;
		case 312 : return 'R'; break;
		case 321 : return 'R'; break;
		case 500 : return 'Q'; break;
		case 501 : return 'Q'; break;
		case 502 : return 'Q'; break;
		case 503 : return 'Q'; break;
		case 504 : return 'Q'; break;
		case 511 : return 'X'; break;
		case 520 : return 'R'; break;
		case 521 : return 'R'; break;
		case 522 : return 'R'; break;
		case 600 : return 'U'; break;
		case 601 : return 'W'; break;
		case 602 : return 'W'; break;
		case 611 : return 'W'; break;
		case 621 : return 'W'; break;
		case 701 : return 'M'; break;
		case 711 : return 'M'; break;
		case 721 : return 'M'; break;
		case 731 : return 'M'; break;
		case 741 : return 'M'; break;
		case 800 : return 'B'; break;
		case 801 : return 'H'; break;
		case 802 : return 'N'; break;
		case 803 : return 'Y'; break;
		case 804 : return 'Y'; break;
		case 900 : return 'F'; break;
		case 901 : return 'F'; break;
		case 902 : return 'F'; break;
		case 905 : return 'F'; break;
		case 906 : return 'G'; break;
	}
}

function curly_sw_get_wind_direction($deg){
	if ($deg >= 0 && $deg < 22.5) return 'N';
	elseif ($deg >= 22.5 && $deg < 45) return 'NNE';
	elseif ($deg >= 45 && $deg < 67.5) return 'NE';
	elseif ($deg >= 67.5 && $deg < 90) return 'ENE';
	elseif ($deg >= 90 && $deg < 122.5) return 'E';
	elseif ($deg >= 112.5 && $deg < 135) return 'ESE';
	elseif ($deg >= 135 && $deg < 157.5) return 'SE';
	elseif ($deg >= 157.5 && $deg < 180) return 'SSE';
	elseif ($deg >= 180 && $deg < 202.5) return 'S';
	elseif ($deg >= 202.5 && $deg < 225) return 'SSW';
	elseif ($deg >= 225 && $deg < 247.5) return 'SW';
	elseif ($deg >= 247.5 && $deg < 270) return 'WSW';
	elseif ($deg >= 270 && $deg < 292.5) return 'W';
	elseif ($deg >= 292.5 && $deg < 315) return 'WNW';
	elseif ($deg >= 315 && $deg < 337.5) return 'NW';
	elseif ($deg >= 337.5 && $deg < 360) return 'NNW';
}

function curly_sw_get_weather_file($location, $latitude, $longitude, $days = 1, $units = 'internal', $type = 0, $lang = 'en'){
	
	if($location == 'auto'){
		$ip_file = wp_remote_get('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
		$ip_data = json_decode($ip_file['body'], true);
		$location = $ip_data['city'].', '.$ip_data['country_code'];
		$latitude = null;
		$longitude = null;
	}
	
	if(isset($latitude) && isset($longitude)) $loc = 'lat='.$latitude.'&lon='.$longitude;
	else $loc = 'q='.urlencode($location);
	
	if($type == 0) $forecast = 'forecast/daily?'; else $forecast = 'weather?';
	
	return wp_remote_get('http://api.openweathermap.org/data/2.5/'.$forecast.$loc.'&cnt='.$days.'&units='.$units.'&mode=json&lang='.$lang , array('timeout' => 10));
	
}

function curly_sw_weather( $atts ) {
	extract( shortcode_atts( array(
		'latitude' => null,
		'longitude' => null,
		'location' => 'London,uk',
		'days' => 1,
		'units' => 'internal',
		'night' => 'no',
		'date'	=> 'l'
	), $atts ) );
	
	$data_file = curly_sw_get_weather_file($location, $latitude, $longitude, $days, $units);
	
	if (!is_wp_error($data_file)){
		$json_data = json_decode($data_file['body'], true);
	} else {
		$json_data = null;
	}
	
	
	$html = '<div class="simple-weather inline-weather">';
	
	if ($json_data['list'] != null) {
		foreach ( $json_data['list'] as $key => $value) {
			$html .= '<span>'.date_i18n($date, $value['dt']).' <i data-icon="'.curly_sw_get_weather_icon($value['weather'][0]['id']).'"></i> <em>'.ceil($value['temp']['day']).'&deg;';
			$html .= ($night != 'no') ? ' / '.ceil($value['temp']['night']).' &deg; ' : null;
			$html .= '</em></span>';
		}
	}
	
	$html .= '</div>';
	
	return $html;
	
}
add_shortcode( 'simple-weather', 'curly_sw_weather' );

require_once('simple-weather-widget.php');

?>