<?php
add_shortcode("progress", "curly_progress"); 		

function curly_progress( $atts, $content = null ) {
	extract(shortcode_atts(array(  
        "color"  => 'red',
		'percent'  => null
    ), $atts)); 
    
    $css = null;
	
	switch ($color){
		case 'red' : $css = ' progress-bar-danger';break;
		case 'blue' : $css = ' progress-bar-info';break;
		case 'green' : $css = ' progress-bar-success';break;
		case 'orange' : $css = ' progress-bar-warning';break;
	}
	
	return '<div class="progress progress-striped active"><div class="progress-bar'.$css.'" style="width: '.$percent.'%"><span class="pull-left">&nbsp;&nbsp;'.$content.'</span><span class="pull-right">'.$percent.'% &nbsp;</span></div></div>';
	 
}  


?>