<?php

/*	Main CSS
    ================================================= */ 
	function curly_custom_css() {
	
	$json_fonts_data = json_decode(get_option(THEMEPREFIX.'_json_font_list'), true);
	
	$output = null;

/*	Font Sizes
	================================================= */
	$font_body = array(
		get_option(THEMEPREFIX.'_fonts_body', 29), 
		get_option(THEMEPREFIX.'_fonts_body_size', 14), 
		get_option(THEMEPREFIX.'_fonts_body_style', 0), 
		get_option(THEMEPREFIX.'_fonts_body_variant', 0)
	);
	$font_h1 = array(
		get_option(THEMEPREFIX.'_fonts_h1', 53), 
		get_option(THEMEPREFIX.'_fonts_h1_size', 36), 
		get_option(THEMEPREFIX.'_fonts_h1_style', 3), 
		get_option(THEMEPREFIX.'_fonts_h1_variant', 0)
	);
	$font_h2 = array(
		get_option(THEMEPREFIX.'_fonts_h2', 53), 
		get_option(THEMEPREFIX.'_fonts_h2_size', 36), 
		get_option(THEMEPREFIX.'_fonts_h2_style', 0), 
		get_option(THEMEPREFIX.'_fonts_h2_variant', 0)
	);
	$font_h3 = array(
		get_option(THEMEPREFIX.'_fonts_h3', 53), 
		get_option(THEMEPREFIX.'_fonts_h3_size', 24), 
		get_option(THEMEPREFIX.'_fonts_h3_style', 3), 
		get_option(THEMEPREFIX.'_fonts_h3_variant', 0)
	);
	$font_h4 = array(
		get_option(THEMEPREFIX.'_fonts_h4', 53), 
		get_option(THEMEPREFIX.'_fonts_h4_size', 18), 
		get_option(THEMEPREFIX.'_fonts_h4_style', 2), 
		get_option(THEMEPREFIX.'_fonts_h4_variant', 2)
	);
	$font_h5 = array(
		get_option(THEMEPREFIX.'_fonts_h5', 53), 
		get_option(THEMEPREFIX.'_fonts_h5_size', 15), 
		get_option(THEMEPREFIX.'_fonts_h5_style', 3), 
		get_option(THEMEPREFIX.'_fonts_h5_variant', 0)
	);
	$font_h6 = array(
		get_option(THEMEPREFIX.'_fonts_h6', 53), 
		get_option(THEMEPREFIX.'_fonts_h6_size', 15), 
		get_option(THEMEPREFIX.'_fonts_h6_style', 3), 
		get_option(THEMEPREFIX.'_fonts_h6_variant', 0)
	);
	$font_blockquote = array(
		get_option(THEMEPREFIX.'_fonts_blockquote', 29), 
		get_option(THEMEPREFIX.'_fonts_blockquote_size', 14), 
		get_option(THEMEPREFIX.'_fonts_blockquote_style', 4), 
		get_option(THEMEPREFIX.'_fonts_blockquote_variant', 0)
	);
	$font_menu = array(
		get_option(THEMEPREFIX.'_fonts_menu', 53), 
		get_option(THEMEPREFIX.'_fonts_menu_size', 16), 
		get_option(THEMEPREFIX.'_fonts_menu_style', 3), 
		get_option(THEMEPREFIX.'_fonts_menu_variant', 2)
	);

/*	Colors
	================================================= */
	if (!get_option(THEMEPREFIX.'_color_text')) {
		
		$json_data = json_decode(get_option(THEMEPREFIX.'_json_color_scheme'), true);
		
		$color_menu = $json_data['default']['menuBg'];
		$color_menu_link = $json_data['default']['menuLink'];
		$color_menu_hover = $json_data['default']['menuHover'];
		$color_submenu = $json_data['default']['submenuBg']; 
		$color_submenu_link = $json_data['default']['submenuLink']; 
		$color_submenu_hover = $json_data['default']['submenuHover'];
		$color_footer_text = $json_data['default']['footerText'];
		$color_footer_link = $json_data['default']['footerLink'];
		$color_footer_title = $json_data['default']['footerTitle'];
		$color_primary = $json_data['default']['primary'];
		$color_text = $json_data['default']['text'];
		$color_link = $json_data['default']['link'];
		$color_hover = $json_data['default']['linkHover'];
		$body_bg_color = $json_data['default']['background'];
	} else {
		$color_menu = get_option(THEMEPREFIX.'_color_menu_bg_top');
		$color_menu_link = get_option(THEMEPREFIX.'_color_menu_text');
		$color_menu_hover = get_option(THEMEPREFIX.'_color_menu_hover_text');
		$color_submenu = get_option(THEMEPREFIX.'_color_menu_submenu'); 
		$color_submenu_link = get_option(THEMEPREFIX.'_color_submenu_text'); 
		$color_submenu_hover = get_option(THEMEPREFIX.'_color_submenu_hover_text');
		$color_footer_text = get_option(THEMEPREFIX.'_footer_text_color');
		$color_footer_link = get_option(THEMEPREFIX.'_footer_link_color');
		$color_footer_title = get_option(THEMEPREFIX.'_footer_title_color');
		$color_primary = get_option(THEMEPREFIX.'_color_primary');
		$color_text = get_option(THEMEPREFIX.'_color_text');
		$color_link = get_option(THEMEPREFIX.'_color_links');
		$color_hover = get_option(THEMEPREFIX.'_color_links_hover');
		$body_bg_color = get_option(THEMEPREFIX.'_bg_color');
	}

/*	Load Background
	================================================= */
	$bg_pattern = get_option(THEMEPREFIX.'_bg_pattern', 11) ;
	$bg_image = get_option(THEMEPREFIX.'_bg_image') ;
	$bg_repeat = get_option(THEMEPREFIX.'_bg_repeat') ;
	$bg_position = get_option(THEMEPREFIX.'_bg_position') ;
	$bg_fixed = get_option(THEMEPREFIX.'_bg_fixed') ;
	
	switch($bg_pattern){
		case 1  : $bg_pat = 'bg-01.jpg'; $bg_pat_retina = 'bg-01@2X.jpg'; $bg_pat_size = '500px 333px'; break;
		case 2  : $bg_pat = 'bg-02.png'; $bg_pat_retina = 'bg-02@2X.png'; $bg_pat_size = '16px 16px'; break;
		case 3  : $bg_pat = 'bg-03.jpg'; $bg_pat_retina = 'bg-03@2X.jpg'; $bg_pat_size = '500px 500px'; break;
		case 4  : $bg_pat = 'bg-04.jpg'; $bg_pat_retina = 'bg-04@2X.jpg'; $bg_pat_size = '188px 188px'; break;
		case 5  : $bg_pat = 'bg-05.jpg'; $bg_pat_retina = 'bg-05@2X.jpg'; $bg_pat_size = '250px 250px'; break;
		case 6  : $bg_pat = 'bg-06.jpg'; $bg_pat_retina = 'bg-06@2X.jpg'; $bg_pat_size = '588px 375px'; break;
		case 7  : $bg_pat = 'bg-07.jpg'; $bg_pat_retina = 'bg-07@2X.jpg'; $bg_pat_size = '200px 200px'; break;
		case 8  : $bg_pat = 'bg-08.jpg'; $bg_pat_retina = 'bg-08@2X.jpg'; $bg_pat_size = '304px 306px'; break;
		case 9  : $bg_pat = 'bg-09.jpg'; $bg_pat_retina = 'bg-09@2X.jpg'; $bg_pat_size = '400px 343px'; break;
		case 10 : $bg_pat = 'bg-10.jpg'; $bg_pat_retina = 'bg-10@2X.jpg'; $bg_pat_size = '50px 197px'; break;
		case 11 : $bg_pat = 'bg-11.jpg'; $bg_pat_retina = 'bg-11@2X.jpg'; $bg_pat_size = '50px 197px'; break;
	}

/*	Load Fonts
	================================================= */
	$font_body[0]				=	$json_fonts_data[$font_body[0]][1];
	$font_h1[0]					=	$json_fonts_data[$font_h1[0]][1];
	$font_h2[0]					=	$json_fonts_data[$font_h2[0]][1];
	$font_h3[0]					=	$json_fonts_data[$font_h3[0]][1];
	$font_h4[0]					=	$json_fonts_data[$font_h4[0]][1];
	$font_h5[0]					=	$json_fonts_data[$font_h5[0]][1];
	$font_h6[0]					=	$json_fonts_data[$font_h6[0]][1];
	$font_blockquote[0]			=	$json_fonts_data[$font_blockquote[0]][1];
	$font_menu[0]				=	$json_fonts_data[$font_menu[0]][1];
	
/*	Custom Fonts
	================================================= */
	$woff						=		get_option(THEMEPREFIX.'_font_upload_woff');
	$ttf						=		get_option(THEMEPREFIX.'_font_upload_ttf');
	$svg						=		get_option(THEMEPREFIX.'_font_upload_svg');
	$eot						=		get_option(THEMEPREFIX.'_font_upload_eot');

	if($woff && $ttf && $svg && $eot) {
		$output .= '@font-face {
						font-family: \'Custom Uploaded Font\';
						src: url(\''.$eot.'\');
						src: '.((strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) ? 'url(\''.$woff.'\') format(\'woff\'),' : null).'
							url(\''.$eot.'?#iefix\') format(\'embedded-opentype\'),
							url(\''.$svg.'#Custom%20Uploaded%20Font\') format(\'svg\'),
							'.((strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false) ? 'url(\''.$woff.'\') format(\'woff\'),' : null).'
							url(\''.$ttf.'\') format(\'truetype\');
						font-weight: normal;
						font-style: normal;
					}';
	}
	

/*	General
	================================================= */
	$output .= (get_option(THEMEPREFIX.'_general_responsive', 'true') != 'false') ? null : '.container { width: 1170px !important; max-width: none !important}' ;
	$output .= 'body{
					color: '.$color_text.';
					background-color:		'.$body_bg_color.';';
					if($bg_pattern == 0) {
						$output .= ($bg_image) ? 'background-image: url(\''.$bg_image.'\');' : null;
						$output .= ($bg_repeat) ? 'background-repeat: '.$bg_repeat.';' : null;
						$output .= ($bg_position) ? 'background-position: '.$bg_position.';' : null;
						$output .= ($bg_fixed == 'true') ? 'background-attachment: fixed;' : null;
					} else {
						$output .= 'background: url(\''.get_template_directory_uri() .'/images/bg/'.$bg_pat.'\') repeat;';
					}
	$output .= '}';
	
	$output .= 'body a,
				a:visited,
				a.btn-link,
				a.btn-link:visited{
					color: '.$color_link.';
				}
				a:hover,
				a.btn-link:hover{
					color: '.$color_hover.';
				}
				.btn-link{
					border: 2px solid '.$color_link.';
				}
				.btn-link:hover{
					border: 2px solid '.$color_hover.';
				}';
	
	if(get_option(THEMEPREFIX.'_general_wide') && get_option(THEMEPREFIX.'_general_wide') != "true"){
		$output .= '.site{
						max-width: 1200px;
						'.((get_option(THEMEPREFIX.'_general_align') == "true") ? 'margin: 0' : 'margin: 0 auto').'
					}
					.site .stuck,
					.site header,
					.site footer::before{
						max-width: 1200px
					}
					.site header.header-01 .stuck,
					.site header.header-02 .stuck{ 
						max-width: 100% 
					}';
	}
	
	$output .= '*::selection {
					background: '.$color_primary.';
					color: '.curly_contrast($color_primary, '#FFFFFF', '#000000').';
				}
				*::-moz-selection {
					background: '.$color_primary.';
					color: '.curly_contrast($color_primary, '#FFFFFF', '#000000').';
				}';
	
/*	Header
	================================================= */
	switch (get_option(THEMEPREFIX.'_header_shading_pattern', 1)) {
		case 0 : $shading_img = 'bg-header-none.png'; break;
		case 1 : $shading_img = 'bg-header.png'; break;
		case 2 : $shading_img = 'bg-header-02.png'; break;
		case 3 : $shading_img = 'bg-header-03.png'; break;
		case 4 : $shading_img = 'bg-header-04.png'; break;
		case 5 : $shading_img = 'bg-header-05.png'; break;
		case 6 : $shading_img = 'bg-header-06.png'; break;
		case 7 : $shading_img = 'bg-header-07.png'; break;
		case 8 : $shading_img = 'bg-header-08.png'; break;
		case 9 : $shading_img = 'bg-header-09.png'; break;
		case 10: $shading_img = 'bg-header-10.png'; break;
		default: $shading_img = 'bg-header.png';
	}
	
	$header_bg 		= get_option(THEMEPREFIX.'_header_shading_color', '#000000');
	$header_text 	= get_option(THEMEPREFIX.'_header_text_color', curly_contrast($header_bg, '#FFFFFF', '#000000'));
	$menu_hover		= get_option(THEMEPREFIX.'_hover_menu');
	
	$output .= '#header,
				#header h1,
				#header small,
				#header .logo a{
					color: '.$header_text.';
				}
				#header-holder{
					background-color: rgba( '.curly_hex2rgb($header_bg).' , '.(get_option(THEMEPREFIX.'_header_shading_opacity', 55) / 100).');
					background-image: url(\''.get_template_directory_uri() .'/images/header/'.$shading_img.'\');
				}';
	
	$output .= '#header .logo{
					margin: '.get_option(THEMEPREFIX.'_header_margin_top').'px 0 '.get_option(THEMEPREFIX.'_header_margin_bottom').'px 0;
				}
				#header #navigation{
					background: '.( !empty($color_menu) ? $color_menu : 'transparent' ).'
				}
				#header #navigation.stuck{
					background: '.( !empty($color_menu) ? $color_menu : $header_bg ).'
				}';		
	if ($menu_hover != "true") {
		$output	.= '#navigation a{ color: '.$color_menu_link.'}
					#navigation ul ul{ background: '.$color_submenu.'; border-left: 5px solid rgba( '.curly_hex2rgb($color_submenu_link).', .2);}
					#navigation ul ul a{
						color: '.$color_submenu_link.';
						border-bottom: 1px solid rgba( '.curly_hex2rgb($color_submenu_link).', .1);
					}
					#navigation ul ul a:hover{
						color: '.$color_submenu_hover.';
					}
					#navigation > div > ul > li.current-menu-item > a,
					#navigation > div > ul > li.current_page_ancestor > a,
					#navigation > div > ul > li.current_page_parent > a{
						color: '.$color_menu_hover.'
					}
					#navigation > div > ul > li.current-menu-item > a:after,
					#navigation > div > ul > li.current_page_ancestor > a:after,
					#navigation > div > ul > li.current_page_parent > a:after{
						color: '.$color_menu.'
					}';
	} else {
		$output	.= '#navigation a{ color: '.$color_menu_link.'}
					#navigation a:hover{ color: '.$color_menu_hover.'}
					#navigation ul ul{ background: '.$color_submenu.'; border-left: 5px solid rgba( '.curly_hex2rgb($color_submenu_link).', .2);}
					#navigation ul ul a{
						color: '.$color_submenu_link.';
						border-bottom: 1px solid rgba( '.curly_hex2rgb($color_submenu_link).', .1);
					}
					#navigation ul ul a:hover{
						color: '.$color_submenu_hover.';
					}
					#navigation > div > ul > li.current-menu-item > a,
					#navigation > div > ul > li.current_page_ancestor > a,
					#navigation > div > ul > li.current_page_parent > a{
						color: '.$color_menu_hover.'
					}
					#navigation > div > ul > li.current-menu-item > a:after,
					#navigation > div > ul > li.current_page_ancestor > a:after,
					#navigation > div > ul > li.current_page_parent > a:after{
						color: '.$color_menu.'
					}';
	}			
	

/*	Header 01
	================================================= */
	$output .= '#page-heading.header-01{
					border-bottom: 1px solid rgba( '.curly_hex2rgb($color_text).' , .1);
				}
				#header.header-01 #header-holder{
					padding: '.get_option(THEMEPREFIX.'_header_margin_top').'px 0 '.get_option(THEMEPREFIX.'_header_margin_bottom').'px 0;
					border-bottom: 5px solid '.$color_primary.';
				}
				#header.header-01 .stuck{
					background: '.$color_menu.' !important
				}';	

/*	Header 02
	================================================= */
	$output .= '#header.header-01.header-02 #header-holder{
					padding: 10px 0 '.get_option(THEMEPREFIX.'_header_margin_bottom').'px 0;
					border-bottom: 5px solid '.$color_primary.';
				}
				#header.header-01.header-02 .container:first-of-type{
					margin-bottom: '.get_option(THEMEPREFIX.'_header_margin_top').'px;
				}
				#header.header-01.header-02 hr{
					border-color: rgba('.$header_text.', .35)
				}';												

/*	Footer
	================================================= */
	$footer_bg_image = get_option(THEMEPREFIX.'_bg_footer_image', null);
	$footer_bg_repeat = get_option(THEMEPREFIX.'_bg_footer_repeat', null);
	$footer_bg_position = get_option(THEMEPREFIX.'_bg_footer_position', null);
	$footer_bg = get_option(THEMEPREFIX.'_footer_bg_color', null);
	
	$output .= 'footer{
					padding: '.get_option(THEMEPREFIX.'_footer_margin', 40).'px 0 '.get_option(THEMEPREFIX.'_footer_margin_bottom', 60).'px 0;
					color: '.$color_footer_text.';
					'.(($footer_bg) ? 'background-color: '.$footer_bg.';background-image: none;' : null).'
					'.(($footer_bg_image) ? 'background-image:url(\''.$footer_bg_image.'\');' : null).'
					'.(($footer_bg_image) ? 'background-repeat: '.$footer_bg_repeat.';' : null).'
					'.(($footer_bg_image) ? 'background-position: '.$footer_bg_repeat.';' : null).'
				}';
	
	$output .= 'footer a, footer a:visited{ color: '.$color_footer_text.'}
				footer a:hover{ color: rgba( '.curly_hex2rgb($color_footer_link).', 6) }
				footer h5{ color: '.$color_footer_title.'}
				footer .special-title{ border-color: rgba( '.curly_hex2rgb($color_footer_text).', .3)}
				
				footer::before{
					margin-top: '.(-(int)(get_option(THEMEPREFIX.'_footer_margin', 40)) - 50).'px;
					'.(($footer_bg_image || $footer_bg) ? 'display: none;' : null).'
				}
				.footer + .absolute-footer .col-lg-12:first-child{
					border-top: 1px solid rgba( '.curly_hex2rgb($color_footer_text).', .3);
					padding-top: 40px;
					margin-top: 10px;
				}
				.pre-footer{
					background: rgba( '.curly_hex2rgb($color_text).', .07);
				}
				
				#back-top a{
					background: rgba( '.curly_hex2rgb($color_text) .', .8);
					color: '.curly_contrast($color_text, '#000000', '#FFFFFF').'
				}
				#back-top a:hover{
					background: '.$color_text .'
				}';

/*	Typography
	================================================= */
	$output .= 'body, ul, li, p, input, textarea, select{
		font-family: '.$font_body[0].', sans-serif;
		font-size: '.$font_body[1].'px;
		line-height: '.ceil(($font_body[1] * 1.5)).'px;
		'.curly_get_font_style($font_body[2]).'
		'.curly_get_font_variant($font_body[3]).'
	}
	h1{
		color: '.get_option(THEMEPREFIX.'_color_h1').';
		font-family: '.$font_h1[0].', sans-serif;
		font-size: '.($font_h1[1]).'px;
		line-height: '.ceil($font_h1[1] * 1.2).'px;
		'.curly_get_font_style($font_h1[2]).'
		'.curly_get_font_variant($font_h1[3]).'
	}
	h2{
		color: '.get_option(THEMEPREFIX.'_color_h2').';
		font-family: '.$font_h2[0].', sans-serif;
		font-size: '.ceil($font_h2[1]).'px;
		line-height: '.ceil($font_h2[1] * 1.2).'px;
		'.curly_get_font_style($font_h2[2]).'
		'.curly_get_font_variant($font_h2[3]).'
	}
	h3{
		color: '.get_option(THEMEPREFIX.'_color_h3').';
		font-family: '.$font_h3[0].', sans-serif;
		font-size: '.ceil($font_h3[1]).'px;
		line-height: '.ceil($font_h3[1] * 1.2).'px;
		'.curly_get_font_style($font_h3[2]).'
		'.curly_get_font_variant($font_h3[3]).'
	}
	h4{
		color: '.get_option(THEMEPREFIX.'_color_h4').';
		font-family: '.$font_h4[0].', sans-serif;
		font-size: '.ceil($font_h4[1]).'px;
		line-height: '.ceil($font_h4[1] * 1.35).'px;
		'.curly_get_font_style($font_h4[2]).'
		'.curly_get_font_variant($font_h4[3]).'
	}
	h5{
		color: '.get_option(THEMEPREFIX.'_color_h5').';
		font-family: '.$font_h5[0].', sans-serif;
		font-size: '.ceil($font_h5[1]).'px;
		line-height: '.ceil($font_h5[1] * 1.35).'px;
		'.curly_get_font_style($font_h5[2]).'
		'.curly_get_font_variant($font_h5[3]).'
	}
	h6{
		color: '.get_option(THEMEPREFIX.'_color_h6').';
		font-family: '.$font_h6[0].', sans-serif;
		font-size: '.ceil($font_h6[1]).'px;
		line-height: '.ceil($font_h6[1] * 1.35).'px;
		'.curly_get_font_style($font_h6[2]).'
		'.curly_get_font_variant($font_h6[3]).'
	}
	#navigation li a{
		font-family: '.$font_menu[0].', sans-serif;
		font-size: '.$font_menu[1].'px;
		line-height: '.ceil($font_menu[1] * 1.5).'px;
		'.curly_get_font_style($font_menu[2]).'
		'.curly_get_font_variant($font_menu[3]).'
	}
	#navigation li li a{
		font-size: '.ceil($font_menu[1]*0.9).'px;
		line-height: '.ceil($font_menu[1] * 1.5).'px;
	}
	blockquote,
	blockquote p,
	.blockquote,
	.blockquote p{
		font-family: '.$font_blockquote[0].', sans-serif;
		font-size: '.ceil($font_blockquote[1]).'px;
		line-height: '.ceil($font_blockquote[1] * 1.5).'px;
		'.curly_get_font_style($font_blockquote[2]).'
		'.curly_get_font_variant($font_blockquote[3]).'
	}
	.btn, .btn-link,
	input[type="button"],
	input[type="submit"]{
		font-family: '.$font_menu[0].', sans-serif;
	}';

/*	Theme Features
	================================================= */
	$output .= '.special-title{ border-color: rgba( '.curly_hex2rgb($color_text).', .2)}
				.special-title:after{ border-color: '.$color_primary.'}';	

/*	Shortcodes
	================================================= */

/*	Shortcodes - Accordion
	================================================= */
	$output .= '.panel{
					border-bottom: 1px solid rgba( '.curly_hex2rgb($color_text).', .15);
				}
				footer .panel{
					border-bottom: 1px solid rgba( '.curly_hex2rgb($color_footer_text).', .15);
				}';

/*	Shortcodes - Button
	================================================= */
	$output .= '.btn,
				.btn:visited,
				input[type="button"],
				input[type="submit"]{
					background: '.$color_primary.';
					color: '.curly_contrast($color_primary, '#000000', '#FFFFFF').';
				}
				.btn:hover,
				input[type="button"]:hover,
				input[type="submit"]:hover{
					background: '.curly_darken($color_primary).';
					color: '.curly_contrast(curly_darken($color_primary), '#000000', '#FFFFFF').';
				}';							

/*	Shortcodes - Action Boxes
	================================================= */
	$output .= '.action-box{
					background: rgba( '.curly_hex2rgb($color_text).', .075);
				}';

/*	Shortcodes - Event Agenda
	================================================= */
	$output .= '.event-agenda .row{
					border-bottom: 1px solid rgba( '.curly_hex2rgb($color_text).', .15);
				}
				.event-agenda .row:hover{
					background: rgba( '.curly_hex2rgb($color_text).', .05);
				}';					

/*	Shortcodes - Box
	================================================= */
	$output .= '.well{
					border-top: 3px solid rgba('.curly_hex2rgb($color_text).', .25);
				}';

/*	Shortcodes - Slider
	================================================= */
	$output .= '.carousel .carousel-control{
					background: rgba('.curly_hex2rgb($color_text).', .45);
				}';

/*	Shortcodes - Divider
	================================================= */
	$output .= '.divider.one				{ border-top: 1px solid rgba( '.curly_hex2rgb($color_text).', .25); height: 1px; }
				.divider.two				{ border-top: 1px dotted rgba( '.curly_hex2rgb($color_text).', .25); height: 1px; }
				.divider.three				{ border-top: 1px dashed rgba( '.curly_hex2rgb($color_text).', .25); height: 1px; }
				.divider.four				{ border-top: 3px solid rgba( '.curly_hex2rgb($color_text) .', .25); height: 1px; }
				.divider.fire				{ border-top: 1px solid rgba( '.curly_hex2rgb($color_text) .', .25); height: 1px; }';

/*	Shortcodes - Tabs
	================================================= */
	$output .= '.tab-content{
					border-bottom: 1px solid rgba( '.curly_hex2rgb($color_text).', .15);
					border-top: 3px solid '.$color_primary.';
				}
				.nav-tabs .active>a, 
				.nav-tabs .active>a:hover, 
				.nav-tabs .active>a:focus{
					background: rgba( '.curly_hex2rgb($color_primary).', 1) !important;
					border-bottom: 1px solid red;
					color: '.curly_contrast(curly_darken($color_primary), '#000000', '#FFFFFF').' !important;
				}
				.nav-tabs li a:hover{
					background: rgba( '.curly_hex2rgb($color_text).', .07);
				}';				

/*	Shortcodes - Toggle
	================================================= */
	$output .= 'h6[data-toggle="collapse"] i{
					color: '.$color_primary.';
					margin-right: 10px
				}';

/*	Shortcodes - Progress
	================================================= */
	$output .= '.progress{
					height: '.( $font_body[1] * 1.5 + 6).'px;
					line-height: '.($font_body[1] * 1.5 + 6).'px;
				}
				.progress .progress-bar{
					font-size: '.$font_body[1].'px;
					font-weight: bold;
				}';

/*	Shortcodes - Blockquote
	================================================= */
	$output .= 'blockquote{
					border-color: '.$color_primary.';
				}
				.blockquote:before{
					color: '.$color_link.';
				}
				.blockquote cite{
					display: block;
					color: '.$color_link.';
					font-weight:bold;
					margin-top: 10px
				}
				.blockquote cite:before{
					content: \'\2014\';
					margin-right: 10px
				}
				.blockquote img{
					-webkit-border-radius: 300px;
					-moz-border-radius: 300px;
					border-radius: 300px;
					margin: 0 0 10px 10px;
					border: 5px solid rgba( '.curly_hex2rgb($color_text).', .2);
					width: 90px;
					height: 90px
				}';

/*	Shortcodes - Testimonials
	================================================= */
	$output .= '.testimonials blockquote{
					background: '.curly_darken($color_text, -200).';
				}
				.testimonials blockquote:after{
					color: '.curly_darken($color_text, -200).';
				}
				.testimonials blockquote:before,
				.testimonials cite{ color: '.$color_primary.'; }';

/*	Shortcodes - Lists
	================================================= */
	$output .= '*[class*=\'list-\'] li:before{
					color: '.$color_primary.';
				}';

/*	Shortcodes - Highlighted Paragraph
	================================================= */
	$output .= '.lead.different{
					font-family: '.$font_blockquote[0].', sans-serif;
				}';

/*	Shortcodes - Person
	================================================= */
	$output .= '.person img{
					border: 5px solid rgba( '.curly_hex2rgb($color_text).', .2);
				}';	

/*	Shortcodes - Icons
	================================================= */
	$output .= '.fa-boxed{
					background-color: rgba( '.curly_hex2rgb($color_text).', .5);
					color: '.curly_contrast($color_text, '#000000', '#FFFFFF').';
				}
				a:hover .fa-boxed{
					background-color: '.$color_link.';
					color: '.curly_contrast($color_link, '#000000', '#FFFFFF').';
				}';

/*	Shortcodes - Pricing Tables
	================================================= */	
	$output .= '.wl-pricing-table .content-column{
					background-color: rgba( '.curly_hex2rgb($color_text).', .05);
				}
				.wl-pricing-table .content-column h4 *:after, 
				.wl-pricing-table .content-column h4 *:before{ 
					border-top: 3px double rgba( '.curly_hex2rgb($color_text).', .2);
				}
				
				.wl-pricing-table.light .content-column.highlight-column{
					background-color: '.$color_text.';
					color: '.curly_contrast($color_text, '#000000', '#FFFFFF').';
				}
				.wl-pricing-table.light .content-column.highlight-column h3,
				.wl-pricing-table.light .content-column.highlight-column h4{
					color: '.curly_contrast($color_text, '#000000', '#FFFFFF').';
				}
				.wl-pricing-table.light .content-column.highlight-column h4 *:after, 
				.wl-pricing-table.light .content-column.highlight-column h4 *:before{ 
					border-top: 3px double rgba('.curly_hex2rgb(curly_contrast($color_text, '#000000', '#FFFFFF')).', .2)
				}';

/*	WordPress Classes
	================================================= */
	$output .= '.avatar{
					-webkit-border-radius: 300px;
					-moz-border-radius: 300px;
					border-radius: 300px;
				}
				article table td{
					border-bottom: 1px solid rgba( '.curly_hex2rgb($color_text).', .05);
				}
				article table thead  th{
					border-bottom: 4px solid '.$color_primary.';
				}    
				article table tfoot td{
					border-top: 4px solid rgba( '.curly_hex2rgb($color_text).', .05);
				}
				article table tbody tr:hover td{
					background: rgba( '.curly_hex2rgb($color_text).', .05) !important;
				}    
				.bypostauthor .comment div{
					background: rgba( '.curly_hex2rgb($color_text).', .05);
				}';		

/*	Blog
	================================================= */
	$output .= '.post-calendar-date{
					background: '.curly_contrast($color_text, "#000000", '#FFFFFF').';
					color: '.$color_text.';
				}
				.post-calendar-date em{
					color: '.$color_primary.';
				}
				.meta-data{
					font-size: '.($font_body[1] * 0.85).'px;
					color: '.$color_link.';
				}
				.single .meta-data{
					font-size: '.$font_body[1].'px;
				}
				.blog-sort{
					background: rgba( '.curly_hex2rgb($color_text).', .07);
				}
				#blog-entries .sticky{
					background: rgba( '.curly_hex2rgb($color_text).', .07);
					padding: 20px;
					-webkit-border-radius: 3px;
					-moz-border-radius: 3px;
					border-radius: 3px;
				}
				#filters a{
					color: '.$color_text.';
				}
				#filters a:hover,
				#filters a.active:before{
					color: '.$color_link.';
				}
				.nav-links {
					color: '.$color_text.'
				}
				ul.pagination > li > a,
				ul.pagination > li > span{
					border-color : rgba('.curly_hex2rgb($color_text).', .1);
					border-top: none;
					border-bottom: none;
					border-left: none;
					background: rgba( '.curly_hex2rgb($color_text).', .07);
					font-weight: bold;
					color: '.$color_text.';
				}
				ul.pagination > li > a:hover{
					background: rgba( '.curly_hex2rgb($color_text).', .15);
				}
				ul.pagination > li:last-child a{
					border-right: none
				}
				ul.pagination > .active > a,
				ul.pagination > .active > span,
				ul.pagination > .active:hover > span{
					background: '.$color_menu.';
					border-color: '.$color_menu.';
					color: '.curly_contrast($color_menu, '#000000', '#FFFFFF').';
				}
				.tag-list span{
					color: '.$color_link.';
				}
				.social-box{
					background: rgba('.curly_hex2rgb($color_text).', .05);
					-webkit-border-radius: 3px;
					-moz-border-radius: 3px;
					border-radius: 3px;
				}
				.about-author{
					border-top: 4px solid '.$color_primary.';
					border-bottom: 1px solid rgba('.curly_hex2rgb($color_text).', .1);
				}
				.comment > div{
					border: 1px solid rgba('.curly_hex2rgb($color_text).', .2);
					-webkit-border-radius: 3px;
					-moz-border-radius: 3px;
					border-radius: 3px;
				}
				#commentform input[type="submit"]{
					background: '.$color_primary.';
					border:1px solid '.$color_primary.';
					color: '.curly_contrast($color_primary, '#000000', '#FFFFFF').';
					-webkit-border-radius: 3px;
					-moz-border-radius: 3px;
					border-radius: 3px;
				}
				.label-format{ background: '.$color_primary.'; color: '.curly_contrast($color_primary, '#000000', '#FFFFFF').' }';					

/*	Custom Recent Posts
	================================================= */
	$output .= '.recent-posts time{
					background: '.curly_contrast($color_text, '#000000', '#FFFFFF').';
					color: '.$color_text.';
				}
				.recent-posts time em{
					color: '.$color_primary.';
				}
				.recent-posts h6{
					line-height: '.($font_h6[1] * 1.2).'px;
				}
				.recent-posts h6 + span a{
					color: '.$color_text.';
					font-size: '.($font_body[1] * 0.85).'px;
				}';			

/*	Media Queries - Landscape phones and down
	================================================= */	
	$output .= '@media (max-width: 767px) {
					#navigation a{ 
						padding: 10px 20px; 
						border-bottom: 1px solid rgba( '.curly_hex2rgb($color_menu_link).', 0.2)
					}
					#navigation ul ul,
					#navigation ul li:hover > ul{
						background: '.curly_darken($color_menu, 10).';
					}
					#navigation ul ul a,
					#navigation ul ul li:last-child > a{
						color: '.$color_menu_link.'!important;
						border-bottom: 1px solid rgba( '.curly_hex2rgb($color_menu_link).', 0.2);
					}
					.nav-click{
						border-left: 1px solid rgba( <?php echo curly_hex2rgb($color_menu_link); ?> , 0.2)
					}
					#header.header-01 #navigation{
						background: '.$color_menu.'
					}
					#header.header-01 .table-cell{
						margin-bottom: '.get_option(THEMEPREFIX.'_header_margin_bottom').'px ;
						margin-top: '.get_option(THEMEPREFIX.'_header_margin_top').'px ;
					}
					#page-heading.header-01 .page-heading{ padding-top: 30px }
					#header.header-01 #header-holder{ border: none !important; padding: 40px 0 41px }
					#header.header-01.header-02 #header-holder{ padding: 10px 0 41px 0; }	
					#header.header-01.header-02 .container:first-of-type { margin-bottom: 0 }				
				}';

/*	3rd Party - WooCommerce
	================================================= */	
	$output .= '.woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
				.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active{
					background: rgba( '.curly_hex2rgb($color_text).', .07) !important;
					color: '.$color_text.';
				}
				.woocommerce #reviews #comments ol.commentlist li .comment-text, .woocommerce-page #reviews #comments ol.commentlist li .comment-text{
					border-color: rgba('.curly_hex2rgb($color_text).', .2);
				}
				.woocommerce span.onsale, .woocommerce-page span.onsale{
					background: '.$color_primary.';
					color: '.curly_contrast($color_primary, '#000000', '#FFFFFF').';
				}
				.woocommerce .star-rating span{
					color: '.$color_primary.';
				}
				.woocommerce .star-rating:before, .woocommerce-page .star-rating:before{
					color: rgba('.curly_hex2rgb($color_text).', .2);
				}';
				

/*	3rd Party - Mailchimp
	================================================= */	
			

/*	Custom CSS
	================================================= */
	if(get_option(THEMEPREFIX.'_hover_menu', 'false') != 'false') {
		$output .= '#menu-overlay{ display: none !important }';
	}
			
	$output .= get_option(THEMEPREFIX.'_custom_css');
			
	// Return Output
	return $output;	

	}

/*	Header CSS Hook
    ================================================= */ 
	function curly_header_css(){
		
		$html = null;
		$header_img = null;
		$header_large = null;
		$slider = null;
		
		if (is_page() || is_single()) {
		
			global $post;
			
			$push_header = get_post_meta($post->ID, THEMEPREFIX.'header_push', true);
			
			
			$header_img 	= get_post_meta($post->ID, THEMEPREFIX.'page_settings_heading_image', true);
			$header_img_id 	= get_post_meta($post->ID, THEMEPREFIX.'page_settings_heading_image_id', true);
			$header_large 	= get_post_meta($post->ID, THEMEPREFIX.'large_header', true);
			
			$slider = get_post_meta($post->ID, 'slider', true);
			
			if($slider == 'ios-slider'){
			
				// Slider Settings
				$display_size   	 	= 	get_post_meta($post->ID, 'display', true);
				$slider_text_color   	= 	get_post_meta($post->ID, 'slider_text_color', true);
				$slider_color   	 	= 	get_post_meta($post->ID, 'slider_color', true);
				$display				= 	get_post_meta($post->ID, 'height', true);
				
				$html .= '.page-heading{ display:none }';
				
				if($display_size == "on") $html .= '.wrapper-header:after{display:block}';	
				if($slider_text_color) { 
					$html .= '.text1 h3, .text2 h4 { 
								color: '.$slider_text_color.' !important;
								border-left: 5px solid '.$slider_text_color.';
							 }
							 .text1 h3 a, .text2 h4 a{
							 	color: '.$slider_text_color.' !important;
							 }
							 .text1, .text2{
							 	background: rgba( '.hexToRgb($slider_color).', .85);
							 }
							 html.ie7 .text1, html.ie7 .text2,
							 html.ie8 .text1, html.ie8 .text2{
							 	background: '.$slider_color.';
							 }';
				}			 
				
			} elseif($slider == 'layer-slider'){
				$html .= 'header#header{ position:absolute; background: transparent; z-index: 3 }';
				$html .= '#page-heading, .page-heading{ display:none }';
			}
			
		} elseif (is_archive() || is_home()) {
			$header_img 	= get_post_meta(get_option( 'page_for_posts' ), THEMEPREFIX.'page_settings_heading_image', true);
			$header_large 	= get_post_meta(get_option( 'page_for_posts' ), THEMEPREFIX.'large_header', true);
		}
		
		if($header_large != null && $header_img != null && $slider != null && $slider == 'no-slider'){
			if ($header_img_id != null) {
				$details = wp_get_attachment_image_src($header_img_id, 'full');
				$height = $details[2];
			} else {
				list($width, $height, $type, $attr) = getimagesize(WP_CONTENT_DIR.preg_replace('/(http:\/\/.+)wp-content/','', $header_img));
			}
			
			$html .= '#page-heading, .page-heading{ display:none }';
			$html .= '#header{ min-height:'.$height.'px; background-size: cover!important}';
		}
       
		if(is_page_template('page-templates/contact.php') && get_option(THEMEPREFIX.'_general_email') != null){
			$html .= '#page-heading, .page-heading { display:none } #header{ background-position: center center !important}';
		}
		
		if(is_page_template('page-templates/-coming-soon.php') && $header_img != null){
			$html .= 'body { background: url('.$header_img.') no-repeat top center; background-attachement: fixed; background-size: cover ; }';
		}
		
		if (!$header_img) $header_img = get_header_image();
		
		$html .= '#header { background-image: url('.$header_img.'); background-size: cover; background-repeat: no-repeat; background-position: top center}';
		
		if (isset($push_header) && $push_header == 'on') {
			$html .= '@media (max-width: 767px) {header#header{position: static; background-color: '.get_option(THEMEPREFIX.'_header_shading_color', '#000000').'}}';
		}
		
		return $html;
       
    }

?>