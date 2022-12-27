<?php
add_shortcode('accordion', 'curly_accordion');
	function curly_accordion( $atts, $content = null ) {
	if(isset($GLOBALS['accordionID'])) $GLOBALS['accordionID']++; else $GLOBALS['accordionID'] = 0;
	$GLOBALS['accordionSlideID'] = $GLOBALS['accordionID'] * 100;
    $html = '<div class="panel-group"  id="accordion'.$GLOBALS['accordionID'].'">';
	$html .= do_shortcode($content).'</div>';
	return $html;
}
add_shortcode('toggle', 'curly_toggle');
	function curly_toggle( $atts, $content = null ) {
		$GLOBALS['accordionSlideID']++;
		if(($GLOBALS['accordionSlideID'] % 100) == 1) $opened = ' in'; else $opened = null;
		$html = '<div class="panel">';
			$html .= '<div class="panel-heading"><h6><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$GLOBALS['accordionID'].'" href="#slide'.$GLOBALS['accordionSlideID'].'">'.$atts['title'].'</a></h6></div>';
			$html .= '<div id="slide'.$GLOBALS['accordionSlideID'].'" class="panel-collapse collapse'.$opened.'"><div class="panel-body">
			       '.do_shortcode($content).'</div></div>';
		$html .= '</div>';	
	return $html;
}
?>