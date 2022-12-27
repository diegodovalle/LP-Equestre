<?php
/*
Plugin Name: SEO Pro Panel Extended
Plugin URI: http://www.curlythemes.com
Description: This plugin adds automatic keyword counting to the basic SEO Pro Panel
Version: 1.0
Author: Curly Themes
Author URI: http://www.curlythemes.com
*/
 
function seo_panel_extended(){

	global $post;

	$html = '<tr><th style="width:18%">SEO Keywords Density</th><td>';
	
			require_once('class/class.keywordDensity.php'); 
			
			$obj = new KD();                                      		// New instance
			$obj->domain = get_permalink($post->ID);     	  			// Define Domain
			$results = $obj->result(); 
			
			for($i=1; $i<=5; $i++){
				$html .= ($results[$i]['percent'] > 2.5) ? '<span style="color:red; font-weight: bold;">'.$results[$i]['keyword'].' &nbsp;[ '.$results[$i]['percent'].'% ]</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : '<span style="color: green">'.$results[$i]['keyword'].' &nbsp;[ '.$results[$i]['percent'].'% ] </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				}
			
	$html .=  '<p class="cmb_metabox_description"><strong>Ideal keyword density is 2.5%.</strong> More than 2.5% can be considered as keyword spamming.</p></td></tr>';
	
	return $html;
}
?>