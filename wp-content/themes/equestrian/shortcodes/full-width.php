<?php
add_shortcode("full-width-box", "curly_fullwidthbox"); 		

function curly_fullwidthbox( $atts, $content = null ) {

	$margin = null;
	
	switch (isset($atts['margin'])) {
		case 'normal' : $margin = null; break;
		case null	  : $margin = null; break;
		case 'small'  : $margin = ' less-padding'; break;
		case 'large'  : $margin = ' extra-padding'; break;
		case 'none'   : $margin = ' none-padding'; break;
	}
	
	$style = null;
	
	if(isset($atts['image']) && $atts['image'] != 'file_path') $style = ' style="background-image: url('.$atts['image'].'); background-position: top center;  background-attachment: fixed;"';
	
	$html  = '</div></div></div>';
	$html .= '<div><div class="container page-content mobile-padding"><div class="row'.$margin.'"><div class="col-lg-12">';
		$html .= do_shortcode($content);
	$html .= '</div></div></div></div>';
	$html .= '<div class="container page-content mobile-padding"><div class="row"><div class="col-lg-12">';
	
  return $html;
}  


?>