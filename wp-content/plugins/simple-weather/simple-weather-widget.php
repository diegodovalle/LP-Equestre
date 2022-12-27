<?php

add_action( 'widgets_init', 'curly_simple_weather_widget' );

function curly_simple_weather_widget() {
	register_widget( 'simple_weather_Widget' );
}

function curly_sw_hex2rgb($hex) {
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

class simple_weather_Widget extends WP_Widget {

	function __construct() {
	
		add_action( 'load-widgets.php', array(&$this, 'curly_admin_scripts') ); 
		
		$this->WP_Widget(
			'simple-weather',
			__('Simple Weather Widget', 'SIMPLEWEATHER'), 
			array( 'classname' => 'simple-weatherr', 'description' => __('This widget displays the weather', 'SIMPLEWEATHER'), 'idbase' => 'simple-weather' ), 
			array( 'width' => 252, 'idbase' => 'simple-weathere'));
	}
	
	function curly_admin_scripts() {
		wp_enqueue_style( 'wp-color-picker' );          
		wp_enqueue_script( 'wp-color-picker' ); 
		wp_enqueue_script('main-simple-weather', plugins_url( '/js/main.js' , __FILE__ ), null, null, true);
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$location_type = $instance['location-type'];
		if($location_type == 'location'){
			$latitude = null;
			$longitude = null;
		}else {
			$latitude = $instance['latitude'];
			$longitude = $instance['longitude'];
		}
		if ($location_type == 'auto') $location = 'auto'; else $location = esc_attr($instance['location']);
		$units = $instance['units'];
		$lang = $instance['lang'];
		$bg = $instance['bg_color'];
		$text = $instance['text_color'];
		$days = $instance['days'];
		$date = 'l';
		
		
		$data_file_days = curly_sw_get_weather_file($location, $latitude, $longitude, $days, $units);
		if (!is_wp_error($data_file_days)){
			$json_data_days = json_decode($data_file_days['body'], true);
		} else {
			$json_data_days = null;
		}
		
		
		$data_file_current = curly_sw_get_weather_file($location, $latitude, $longitude, 0, $units, 1, $lang);
		if (!is_wp_error($data_file_current)){
			$json_data_current = json_decode($data_file_current['body'], true);
		} else {
			$json_data_current = null;
		}
		
		
		echo $before_widget; ?>
		
		<?php if($location || $latitude || $longitude) : ?>
		
		<div class="simple-weather-widget" style="background-color: <?php echo ($bg != null) ? $bg : 'none'; ?>; color: <?php echo isset($text) ? $text : 'inherit'; ?>; <?php if(isset($bg)) echo 'padding: 10px;' ?>;">
			<h4><?php if ( $title ) echo $title; else echo $json_data_current['name'] ?></h4>
			<?php if($json_data_current != null) : ?>
			<div class="temp">
				<span class="degrees"><?php echo ceil($json_data_current['main']['temp']) ?>&deg;</span>
				<span class="details">
					<?php _e('Humidity:' , 'SIMPLEWEATHER') ?> <em class="float-right"><?php echo ceil($json_data_current['main']['humidity']) ?>%</em><br>
					<?php _e('Clouds:' , 'SIMPLEWEATHER') ?> <em class="float-right"><?php echo ceil($json_data_current['clouds']['all']) ?>%</em><br>
					<?php _e('Wind' , 'SIMPLEWEATHER') ?> <small>(<?php echo curly_sw_get_wind_direction($json_data_current['wind']['deg']) ?>)</small>: <em class="float-right"><?php echo ($units == 'metric') ?  ceil($json_data_current['wind']['speed'] * 3.6).'<small>kph</small>' : ceil($json_data_current['wind']['speed'] * 3.6 / 1.609344).'<small>mph</small>' ?></em><br>
				</span>
			</div>
			<small style="text-transform: capitalize;"><?php echo $json_data_current['weather'][0]['description']?></small>
			<?php endif; ?>
			
			<?php if($days != 0 && $json_data_days != null) : ?>
			
			<table style="border-color: rgba(<?php echo isset($text) ? curly_sw_hex2rgb($text) : 'inherit'; ?>, .3);">
				<?php  foreach ($json_data_days['list'] as $key => $value) { ?>
				<tr>
					<td><?php echo date_i18n('l', $value['dt']); ?></td>
					<td><i data-icon="<?php echo curly_sw_get_weather_icon($value['weather'][0]['id']) ?>"></i></td>
					<td class="text-right"><?php echo ceil($value['temp']['day']) ?>&deg;</td>
					<td class="text-right" style="opacity: 0.65;"><?php echo ceil($value['temp']['night']) ?>&deg;</td>
				</tr>
				<?php } ?>
			</table>
			
			<?php endif; ?>
			
		</div>
		
		<?php endif; ?>
		
		<?php 	
		
		echo $after_widget;
	}
	
	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['location-type'] = $new_instance['location-type'];
		$instance['location'] = $new_instance['location'];
		$instance['latitude'] = $new_instance['latitude'];
		$instance['longitude'] = $new_instance['longitude'];
		$instance['units'] = $new_instance['units'];
		$instance['lang'] = $new_instance['lang'];
		$instance['bg_color'] = $new_instance['bg_color'];
		$instance['text_color'] = $new_instance['text_color'];
		$instance['days'] = $new_instance['days'];

		return $instance;
	}
	
	function form( $instance ) {
		
		$defaults = array(  
		           'title' => null,
		           'location' => null,
		           'location-type' => 'location',
		           'latitude' => null,
		           'longitude' => null,
		           'bg_color' => null,
		           'text_color' => '#333333',
		           'units' => 'imperial',
		           'lang' => 'en',
		           'days' => 5
		       );
	
		//Set up some default widget settings.
		$instance = wp_parse_args( (array) $instance, $defaults); ?>
		<div class="widget-content">
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:', 'SIMPLEWEATHER'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'location-type' ); ?>"><?php _e('Location Type:', 'SIMPLEWEATHER'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'location-type' ); ?>" name="<?php echo $this->get_field_name( 'location-type' ); ?>">
                	<option <?php selected( $instance['location-type'], 'location' ); ?> value="location">Location</option>
                    <option <?php selected( $instance['location-type'], 'coordinates' ); ?> value="coordinates">Coordinates</option>
                    <option <?php selected( $instance['location-type'], 'auto' ); ?> value="auto">Auto</option>
                </select>
            </p>
            <p class="loc-cont" style="display: <?php echo ($instance['location-type'] == 'location') ? 'block' : 'none'; ?>;">
                <label for="<?php echo $this->get_field_id( 'location' ); ?>"><?php _e('Location:', 'SIMPLEWEATHER'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'location' ); ?>" name="<?php echo $this->get_field_name( 'location' ); ?>" value="<?php echo $instance['location']; ?>" class="widefat" />
                <small style="color: gray;">Example: London, Uk</small>
            </p> 
            <p class="lat-cont"  style="display: <?php echo ($instance['location-type'] == 'coordinates') ? 'block' : 'none'; ?>;">
                <label for="<?php echo $this->get_field_id( 'latitude' ); ?>"><?php _e('Location Latitude:', 'SIMPLEWEATHER'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'latitude' ); ?>" name="<?php echo $this->get_field_name( 'latitude' ); ?>" value="<?php echo $instance['latitude']; ?>" class="widefat" />
            </p> 
            <p class="lon-cont"  style="display: <?php echo ($instance['location-type'] == 'coordinates') ? 'block' : 'none'; ?>;">
                <label for="<?php echo $this->get_field_id( 'longitude' ); ?>"><?php _e('Location Longitude:', 'SIMPLEWEATHER'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'longitude' ); ?>" name="<?php echo $this->get_field_name( 'longitude' ); ?>" value="<?php echo $instance['longitude']; ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'units' ); ?>"><?php _e('Units:', 'SIMPLEWEATHER'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'units' ); ?>" name="<?php echo $this->get_field_name( 'units' ); ?>">
                	<option <?php selected( $instance['units'], 'imperial' ); ?> value="imperial">Imperial (Farenheit)</option>
                    <option <?php selected( $instance['units'], 'metric' ); ?> value="metric">Metric (Celsius)</option>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'days' ); ?>"><?php _e('Days of forecast:', 'SIMPLEWEATHER'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'days' ); ?>" name="<?php echo $this->get_field_name( 'days' ); ?>">
                	<option <?php selected( $instance['days'], 0 ); ?> value="0">None</option>
                    <option <?php selected( $instance['days'], 1 ); ?> value="1">1</option>
                    <option <?php selected( $instance['days'], 2 ); ?> value="2">2</option>
                    <option <?php selected( $instance['days'], 3 ); ?> value="3">3</option>
                    <option <?php selected( $instance['days'], 4 ); ?> value="4">4</option>
                    <option <?php selected( $instance['days'], 5 ); ?> value="5">5</option>
                    <option <?php selected( $instance['days'], 6 ); ?> value="6">6</option>
                    <option <?php selected( $instance['days'], 7 ); ?> value="7">7</option>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'lang' ); ?>"><?php _e('Language:', 'SIMPLEWEATHER'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'lang' ); ?>" name="<?php echo $this->get_field_name( 'lang' ); ?>">
                	<option <?php selected( $instance['lang'], 'en' ); ?> value="en">English</option>
                    <option <?php selected( $instance['lang'], 'ru' ); ?> value="ru">Russian</option>
                    <option <?php selected( $instance['lang'], 'it' ); ?> value="it">Italian</option>
                    <option <?php selected( $instance['lang'], 'sp' ); ?> value="sp">Spanish</option>
                    <option <?php selected( $instance['lang'], 'ua' ); ?> value="ua">Ukranian</option>
                    <option <?php selected( $instance['lang'], 'de' ); ?> value="de">German</option>
                    <option <?php selected( $instance['lang'], 'pt' ); ?> value="pt">Portuguese</option>
                    <option <?php selected( $instance['lang'], 'ro' ); ?> value="ro">Romanian</option>
                    <option <?php selected( $instance['lang'], 'pl' ); ?> value="pl">Polish</option>
                    <option <?php selected( $instance['lang'], 'fi' ); ?> value="fi">Finnish</option>
                    <option <?php selected( $instance['lang'], 'nl' ); ?> value="nl">Dutch</option>
                    <option <?php selected( $instance['lang'], 'fr' ); ?> value="fr">French</option>
                    <option <?php selected( $instance['lang'], 'bg' ); ?> value="bg">Bulgarian</option>
                    <option <?php selected( $instance['lang'], 'se' ); ?> value="se">Swedish</option>
                    <option <?php selected( $instance['lang'], 'zh_tw' ); ?> value="zh_tw">Chinese Traditional</option>
                    <option <?php selected( $instance['lang'], 'zh_cn' ); ?> value="zh_cn">Chinese Simplified</option>
                    <option <?php selected( $instance['lang'], 'tr' ); ?> value="tr">Turkish</option>
                </select>
            </p>
            <h4><?php _e('Widget Styling' , 'SIMPLEWEATHER') ?></h4> 
            
            <script type="text/javascript">
            	jQuery(document).ready(function($){
            	    function updateColorPickers(){
            	        $('#widgets-right .wp-color-picker').each(function(){
            	            $(this).wpColorPicker({
            	                // you can declare a default color here,
            	                // or in the data-default-color attribute on the input
            	                defaultColor: false,
            	                // a callback to fire whenever the color changes to a valid color
            	                change: function(event, ui){},
            	                // a callback to fire when the input is emptied or an invalid color
            	                clear: function() {},
            	                // hide the color picker controls on load
            	                hide: true
            	            });
            	        }); 
            	    }
            	    updateColorPickers();   
            	    $(document).ajaxSuccess(function(e, xhr, settings) {
            	
            	        if(settings.data.search('action=save-widget') != -1 ) { 
            	            $('.color-field .wp-picker-container').remove();    
            	            updateColorPickers();       
            	        }
            	    });
            	 });
            </script>
            
            <p>
            	<label><?php _e('Background Color' , 'SIMPLEWEATHER') ?></label><br>
            	<input type="text" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo esc_attr($instance['bg_color']); ?>" class="wp-color-picker" />
            </p>
            <p>
            	<label><?php _e('Text Color' , 'SIMPLEWEATHER') ?></label><br>
            	<input class="wp-color-picker" type="text" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" value="<?php echo esc_attr($instance['text_color']); ?>" />
            </p>  
		</div>
	<?php
	}
}
?>