<?php
	

/* 	Shortnames
	================================================= */
	$shortname = THEMEPREFIX;
	$themename = THEMENAME;

/* 	File Paths
	================================================= */
	$bgurl 		=  get_template_directory_uri() . '/images/bg/';
	$bgheadurl 	=  get_template_directory_uri() . '/images/header/';
	$defurl 	=  get_template_directory_uri() . '/images/defaults/';
	$colorsurl 	=  get_template_directory_uri() . '/images/colors/';
	
	

/*	Start Admin Options 
	================================================= */
	$options = array();

/*	General
	================================================= */
	

	$options[] = array( "name" => __('General','CURLYTHEME'),
						"type" => "section");
						
	$options[] = array( "name" => __('Site Name','CURLYTHEME'),
				"desc" => __("Don't have a logo? No Problem just type your website name", 'CURLYTHEME'),
				"id" => $shortname."_title",
				"class" => 'medium first',
				"std" => get_bloginfo('name'),
				"type" => "text");
	
	$options[] = array("type" => "divider");			
				
	$options[] = array( "name" => __('Site Logo','CURLYTHEME'),
				"desc" => __('Maximum width is 520px, but don\'t worry, this is responsive anyway','CURLYTHEME'),
				'class' => 'medium first',
				"id" => $shortname."_logo",
				"std" => '',
				"type" => "upload");					
	
	$options[] = array( "name" => __('Favicon','CURLYTHEME'),
				"desc" => __("Upload 16px * 16px favicon", 'CURLYTHEME'),
				"id" => $shortname."_general_favicon",
				'class' => 'medium last',
				"std" => $defurl.'equestrian-favicon.png',
				"type" => "upload");
	
	$options[] = array("type" => "divider");				
						
	$options[] = array( "name" => __('Enable Wide Layout','CURLYTHEME'),
				"desc" => __("Check this if you want your website to be wide. Uncheking this option will make your website boxed", 'CURLYTHEME'),
				"id" => $shortname."_general_wide",
				'class' => 'medium first',
				"std" => "true",
				"type" => "switch");
	
	$options[] = array( "name" => __('Left-Aligned Layout','CURLYTHEME'),
				"desc" => __("Check this if you want your website to be aligned to the left side of the screen. <strong>Note: This option is only available if Wide Layout is enabled</strong>", 'CURLYTHEME'),
				"id" => $shortname."_general_align",
				'class' => 'medium last',
				"std" => "false",
				"type" => "switch");
	
	$options[] = array("type" => "divider");						
	
	$options[] = array( "name" => __('Enable Responsive Layout','CURLYTHEME'),
				"desc" => __("Check this if you want your website to be responsive (Recommended)", 'CURLYTHEME'),
				"id" => $shortname."_general_responsive",
				'class' => 'medium first',
				"std" => "true",
				"type" => "switch");
	
	$options[] = array( "name" => __('Disable CSS3 Animations','CURLYTHEME'),
				"desc" => __("Check this if you want to disable all CSS3 animations on your website ", 'CURLYTHEME'),
				"id" => $shortname."_general_animations",
				'class' => 'medium last',
				"std" => "false",
				"type" => "switch");
	
	$options[] = array("type" => "divider");	
	
	$options[] = array( "name" => __('Hide Comments on Pages','CURLYTHEME'),
				"desc" => __("Check this if you want to hide the comments on pages.", 'CURLYTHEME'),
				"id" => $shortname."_general_comments_pages",
				"class" => "medium first",
				"std" => "false",
				"type" => "switch");									
	
	$options[] = array( "name" => __('Hide Sharing Box on Pages','CURLYTHEME'),
				"desc" => __("Check this if you want to hide the sharing box on pages.", 'CURLYTHEME'),
				"id" => $shortname."_general_sharing_box_pages",
				"class" => "medium last",
				"std" => "true",
				"type" => "switch");
	
	$options[] = array("type" => "divider");								
	
	$options[] = array( "name" => __('Contact Form Email Address','CURLYTHEME'),
				"desc" => __("All contact enquiries will be sent to this email. <strong>Note: if left empty, the contact form will be disabled</strong>", 'CURLYTHEME'),
				"id" => $shortname."_general_email",
				'class' => 'medium first',
				"std" => null,
				"type" => "text");
	
	$options[] = array( "name" => __('Sharing Box Title','CURLYTHEME'),
				"desc" => __("This text is used in the sharing box, before the icons", 'CURLYTHEME'),
				"id" => $shortname."_general_sharing_box_text",
				'class' => 'medium last',
				"std" => "Share us! Choose you social Network",
				"type" => "text");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Theme Forest Username','CURLYTHEME'),
				"desc" => __("Enter your Theme Forest username. Fill up this field to get future automatic theme updates. <strong>Note: Key Sensitive</strong>", 'CURLYTHEME'),
				"id" => $shortname."_theme_options_username",
				'class' => 'medium first',
				"std" => null,
				"type" => "text");	
	
	$options[] = array( "name" => __('Theme Forest API Key','CURLYTHEME'),
				"desc" => __("Enter your Theme Forest secret API key. Fill up this field to get future automatic theme updates. <strong>Note: Key Sensitive</strong>", 'CURLYTHEME'),
				"id" => $shortname."_theme_options_api",
				'class' => 'medium last',
				"std" => null,
				"type" => "text");
	
	$options[] = array("type" => "divider");							
	
	$options[] = array( "name" => __('404 Page Content','CURLYTHEME'),
				"desc" => __("This text is used in the 404 Page. Shortcodes are accepted.", 'CURLYTHEME'),
				"id" => $shortname."_404_text",
				'class' => 'full_textarea',
				"std" => "",
				"type" => "editor");								

/*	Header
	================================================= */	

	$options[] = array( "name" => __('Header','CURLYTHEME'),
						"type" => "section");				
					
	$options[] = array( "name" => __('Header Style','CURLYTHEME'),
				"desc" => 'Choose your header style',
				"id" => $shortname."_header_style",
				"class" => "medium first",
				"std" => 0,
				"type" => "buttons",
				"options" => array(
					0 => __('Header Style 1','CURLYTHEME'),
					1 => __('Header Style 2','CURLYTHEME'),
					2 => __('Header Style 3 ','CURLYTHEME')
				));
	
	$options[] = array( "name" => __('Logo Alignment','CURLYTHEME'),
				"desc" => __("Default is center. Only applies to Default Header Style.",'CURLYTHEME'),
				"id" => $shortname."_logo_alignment",
				"class" => "medium last",
				"std" => "center",
				"type" => "buttons",
				"options" => array(
					'left' => 'Left',
					'center' => 'Center',
					'right' => 'Right'));
	
	$options[] = array("type" => "divider");												
	
	$options[] = array( "name" => __('Margin Top','CURLYTHEME'),
				"desc" => __("Default value: 55px", 'CURLYTHEME'),
				"id" => $shortname."_header_margin_top",
				"class" => "medium first",
				"std" => "55",
				"type" => "number",
				'prefix' => '',
				'suffix' => 'px',
				'min' => 0,
				'max' => 300);
	
	$options[] = array( "name" => __('Margin Bottom','CURLYTHEME'),
				"desc" => __("Default value: 75px", 'CURLYTHEME'),
				"id" => $shortname."_header_margin_bottom",
				"class" => "medium last",
				"std" => "75",
				"type" => "number",
				'prefix' => '',
				'suffix' => 'px',
				'min' => 0,
				'max' => 300);
	
	$options[] = array("type" => "divider");	
				
	$options[] = array( "name" => __('Header Texts / Left Text','CURLYTHEME'),
				"id" => $shortname."_header_1st_text_line",
				"desc" => __('Shortcodes can be used','CURLYTHEMES'),
				"class" => "medium first",
				"std" => "",
				"type" => "text");
	
	$options[] = array( "name" => __('Header Texts / Right Text','CURLYTHEME'),
				"id" => $shortname."_header_2nd_text_line",
				"desc" => __('Shortcodes can be used','CURLYTHEMES'),
				"class" => "medium last",
				"std" => "",
				"type" => "text");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Disable Sticky Menu','CURLYTHEME'),
				"desc" => __("Disable sticky menu" , 'CURLYTHEME'),
				"id" => $shortname."_sticky_menu",
				"class" => "medium first",
				"std" => "false",
				"type" => "switch");
	
	$options[] = array( "name" => __('Disable Menu Enhanced Hover Effect','CURLYTHEME'),
				"desc" => __("Disable menu hover effect (dark shading)" , 'CURLYTHEME'),
				"id" => $shortname."_hover_menu",
				"class" => "medium last",
				"std" => "false",
				"type" => "switch");			
	
	$options[] = array("type" => "divider");	
	
	$options[] = array("type" => "title",
				'name' => __('Header Coloring Options','CURLYTHEME'));				
	
	$options[] = array( "name" => __('Text Color','CURLYTHEME'),
				"desc" => __("Header Text Color", 'CURLYTHEME'),
				"id" => $shortname."_header_text_color",
				"class" => "tiny first",
				"std" => "#ffffff",
				"type" => "color");				
	
	$options[] = array( "name" => __('Background Color','CURLYTHEME'),
				"desc" => __("Header Background Color", 'CURLYTHEME'),
				"id" => $shortname."_header_shading_color",
				"class" => "tiny",
				"std" => "#000000",
				"type" => "color");			
	
	$options[] = array( "name" => __('Header Opacity','CURLYTHEME'),
				"desc" => __("Default value: 55%", 'CURLYTHEME'),
				"id" => $shortname."_header_shading_opacity",
				'class' => 'medium last',
				"std" => "55",
				"type" => "number",
				'prefix' => '',
				'suffix' => '%',
				'increment' => 0.1,
				'min' => 0,
				'max' => 100);		
	
	$options[] = array( "name" => __('Header Background Pattern','CURLYTHEME'),
				"desc" => __('Are you feeling creative? Choose your own shading pattern. ','CURLYTHEME'),
				"id" => $shortname."_header_shading_pattern",
				"std" => "1",
				"type" => "images",
				"options" => array(
					0 	=> $bgheadurl . 'btn-bg-00.png',
					1 	=> $bgheadurl . 'btn-bg-01.png',
					2 	=> $bgheadurl . 'btn-bg-02.png',
					3 	=> $bgheadurl . 'btn-bg-03.png',
					4 	=> $bgheadurl . 'btn-bg-04.png',
					5 	=> $bgheadurl . 'btn-bg-05.png',
					6 	=> $bgheadurl . 'btn-bg-06.png',
					7 	=> $bgheadurl . 'btn-bg-07.png',
					8 	=> $bgheadurl . 'btn-bg-08.png',
					9 	=> $bgheadurl . 'btn-bg-09.png',
					10 	=> $bgheadurl . 'btn-bg-10.png'
					));				
							

/*	Footer
	================================================= */

	$options[] = array( "name" => __('Footer','CURLYTHEME'),
						"type" => "section");
						
	$options[] = array( "name" => __('Footer Top Margin','CURLYTHEME'),
				"desc" => __("Default is 40px", 'CURLYTHEME'),
				"id" => $shortname."_footer_margin",
				"class" => "medium first",
				"std" => "40",
				"type" => "number",
				'prefix' => '',
				'suffix' => 'px',
				'min' => 0,
				'max' => 100);
	
	$options[] = array( "name" => __('Footer Bottom Margin','CURLYTHEME'),
				"desc" => __("Default is 60px", 'CURLYTHEME'),
				"id" => $shortname."_footer_margin_bottom",
				"class" => "medium last",
				"std" => "60",
				"type" => "number",
				'prefix' => '',
				'suffix' => 'px',
				'min' => 0,
				'max' => 100);
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Footer Logo','CURLYTHEME'),
				"desc" => __('Max. width is 200px, but be cool, this is responsive anyway','CURLYTHEME'),
				"id" => $shortname."_logo_footer",
				"class" => "medium first",
				"type" => "upload");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array("type" => "title",
				'name' => __('Footer Background Options','CURLYTHEME'),
				'desc' => __('Choosing a footer background color or background image will eliminate the grass & dirt','CURLYTHEMES'));			

	$options[] = array( "name" => __('Background Image','CURLYTHEME'),
				"desc" => __("Upload image and use it as background of the website", 'CURLYTHEME'),
				"id" => $shortname."_bg_footer_image",
				"class" => "medium first",
				"std" => "",
				"type" => "upload");	
	
	$options[] = array( "name" => __('Background Color','CURLYTHEME'),
				"id" => $shortname."_footer_bg_color",
				"class" => "medium last",
				"desc" => __('Choose a footer background color','CURLYTHEME'),
				"std" => "",
				"type" => "color");									
	
			
	
	$options[] = array( "name" => __('Background Image Repeat','CURLYTHEME'),
				"desc" => __('Background image tile method','CURLYTHEME'),
				"id" => $shortname."_bg_footer_repeat",
				"class" => "medium first",
				"std" => "no-repeat",
				"type" => "select",
				"options" => array(
					'no-repeat' => 'No Repeat',
					'repeat' => 'Repeat',
					'repeat-x' => 'Repeat Horizontaly',
					'repeat-y' => 'Repeat Verticaly',
					));
	
	$options[] = array( "name" => __('Background Image Position','CURLYTHEME'),
				"id" => $shortname."_bg_footer_position",
				"class" => "medium last",
				"desc" => __('Background image position','CURLYTHEME'),
				"std" => "left top",
				"type" => "select",
				"options" => array(
					'left top' => 'Top Left',
					'center top' => 'Top Center',
					'right top' => 'Top Right', 
					'left center' => 'Middle Left',
					'center center' => 'Middle Center',
					'right center' => 'Middle Right',
					'left bottom' => 'Bottom Left',
					'center bottom' => 'Bottom Center',
					'right bottom' => 'Bottom Right'));								

/*	Background
	================================================= */
					
	$options[] = array( "name" => __('Background','CURLYTHEME'),
						"type" => "section");
	
	$options[] = array( "name" => __('Background Color','CURLYTHEME'),
				"desc" => __("Background color of the website", 'CURLYTHEME'),
				"class" => 'tiny first',
				"id" => $shortname."_bg_color",
				"std" => "#faf6f0",
				"type" => "color");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Background Pattern','CURLYTHEME'),
				"desc" => __('Are you feeling creative? Choose your own background pattern. <br><strong>NOTE:</strong> Choosing a background pattern will override all other background settings except individual page settings.','CURLYTHEME'),
				"id" => $shortname."_bg_pattern",
				"std" => "11",
				"type" => "images",
				"options" => array(
					0 	=> $bgurl . 'btn-bg-00.png',
					1 	=> $bgurl . 'btn-bg-01.png',
					2 	=> $bgurl . 'btn-bg-02.png',
					3 	=> $bgurl . 'btn-bg-03.png',
					4 	=> $bgurl . 'btn-bg-04.png',
					5 	=> $bgurl . 'btn-bg-05.png',
					6 	=> $bgurl . 'btn-bg-06.png',
					7 	=> $bgurl . 'btn-bg-07.png',
					8 	=> $bgurl . 'btn-bg-08.png',
					9 	=> $bgurl . 'btn-bg-09.png',
					10 	=> $bgurl . 'btn-bg-10.png',
					11 	=> $bgurl . 'btn-bg-11.jpg'
					));	
	
	$options[] = array("type" => "divider");				
				
	$options[] = array( "name" => __('Background Image','CURLYTHEME'),
				"desc" => __("Upload image and use it as background of the website", 'CURLYTHEME'),
				"id" => $shortname."_bg_image",
				'class' => 'medium first',
				"std" => "",
				"type" => "upload");
	
	$options[] = array( "name" => __('Background Image is Fixed','CURLYTHEME'),
				"desc" => __('Check this if you want the background image to be fixed','CURLYTHEME'),
				"id" => $shortname."_bg_fixed",
				"class" => "medium last",
				"std" => "false",
				"type" => "switch");	
	
	$options[] = array("type" => "divider");									
	
	$options[] = array( "name" => __('Background Image Repeat','CURLYTHEME'),
				"desc" => __('Background image tile method','CURLYTHEME'),
				"id" => $shortname."_bg_repeat",
				"class" => "medium first",
				"std" => "no-repeat",
				"type" => "select",
				"options" => array(
					'no-repeat' => 'No Repeat',
					'repeat' => 'Repeat',
					'repeat-x' => 'Repeat Horizontaly',
					'repeat-y' => 'Repeat Verticaly',
					));
	
	$options[] = array( "name" => __('Background Image Position','CURLYTHEME'),
				"id" => $shortname."_bg_position",
				"desc" => __('Background image position','CURLYTHEME'),
				"class" => "medium last",
				"std" => "top left",
				"type" => "select",
				"options" => array(
					'left top' => 'Top Left',
					'center top' => 'Top Center',
					'right top' => 'Top Right', 
					'left center' => 'Middle Left',
					'center center' => 'Middle Center',
					'right center' => 'Middle Right',
					'left bottom' => 'Bottom Left',
					'center bottom' => 'Bottom Center',
					'right bottom' => 'Bottom Right'));					

/*	Typography
	================================================= */
	
	$options[] = array( "name" => __('Typography','CURLYTHEME'),
						"type" => "section");
						
	$options[] = array( "name" => __('General Typography (all texts)','CURLYTHEME'),
				"id" => $shortname."_fonts_body",
				"std" => array(get_option($shortname."_fonts_body",29), get_option($shortname."_fonts_size_body",14), get_option($shortname."_fonts_style_body",0), 0),
				'min' => 10,
				'max' => 18,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array( "name" => __('Include Special Characters','CURLYTHEME'),
				"desc" => __('Subsets for languages with special characters.','CURLYTHEME'),
				"id" => $shortname."_fonts_subset",
				"class" => "medium first",
				"std" => "0",
				"type" => "select",
				"options" => array('No Subset - Standard Latin','Cyrillic Extended (cyrillic-ext)', 'Greek Extended (greek-ext)', 'Greek (greek)', 'Vietnamese (vietnamese)' , 'Latin Extended (latin-ext)' , 'Cyrillic (cyrillic)'));			
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('H1 Typography','CURLYTHEME'),
				"id" => $shortname."_fonts_h1",
				"std" => array(get_option($shortname."_fonts_h1",53), get_option($shortname."_fonts_size_h1",36), get_option($shortname."_fonts_style_h1",3), get_option($shortname."_fonts_variant_h1",0)),
				'min' => 30,
				'max' => 68,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('H2 Typography','CURLYTHEME'),
				"id" => $shortname."_fonts_h2",
				"std" => array(get_option($shortname."_fonts_h2",53), get_option($shortname."_fonts_size_h2",36), get_option($shortname."_fonts_style_h2",0), get_option($shortname."_fonts_variant_h2",0)),
				'min' => 20,
				'max' => 58,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('H3 Typography','CURLYTHEME'),
				"id" => $shortname."_fonts_h3",
				"std" => array(get_option($shortname."_fonts_h3",53), get_option($shortname."_fonts_size_h3",24), get_option($shortname."_fonts_style_h3",3), get_option($shortname."_fonts_variant_h3",0)),
				'min' => 15,
				'max' => 48,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('H4 Typography','CURLYTHEME'),
				"id" => $shortname."_fonts_h4",
				"std" => array(get_option($shortname."_fonts_h4",53), get_option($shortname."_fonts_size_h4",18), get_option($shortname."_fonts_style_h4",2), get_option($shortname."_fonts_variant_h4",2)),
				'min' => 14,
				'max' => 30,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array("type" => "divider");													
	
	$options[] = array( "name" => __('H5 Typography','CURLYTHEME'),
				"id" => $shortname."_fonts_h5",
				"std" => array(get_option($shortname."_fonts_h5",53), get_option($shortname."_fonts_size_h5",15), get_option($shortname."_fonts_style_h5",3), get_option($shortname."_fonts_variant_h5",0)),
				'min' => 14,
				'max' => 30,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('H6 Typography','CURLYTHEME'),
				"id" => $shortname."_fonts_h6",
				"std" => array(get_option($shortname."_fonts_h6",53), get_option($shortname."_fonts_size_h6",15), get_option($shortname."_fonts_style_h6",3), get_option($shortname."_fonts_variant_h6",0)),
				'min' => 14,
				'max' => 30,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Blockquote Typography','CURLYTHEME'),
				"id" => $shortname."_fonts_blockquote",
				"std" => array(29, 14, 4, 0),
				'min' => 10,
				'max' => 18,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Menu Typography','CURLYTHEME'),
				"id" => $shortname."_fonts_menu",
				"std" => array(53, 16, 3, 2),
				'min' => 10,
				'max' => 18,
				'suffix' => 'px',
				"type" => "font",
				"options" => curly_get_fonts());
	
	$options[] = array("type" => "divider");									
	
	$options[] = array( "name" => __('Upload Custom Fonts - Needs page refresh after upload','CURLYTHEME'),
				"desc" => __('Before the custom font to be activated you need to upload all formats','CURLYTHEMES'),
				"id" => $shortname."_inf",
				"std" => "Upload Custom Fonts - Needs page refresh after upload",
				"type" => "title");
	
	$options[] = array( "name" => __('Custom Fonts - .woff','CURLYTHEME'),
				"desc" => __('Upload font file .woff','CURLYTHEME'),
				"id" => $shortname."_font_upload_woff",
				"class" => "tiny first",
				"type" => "upload_min");
	
	$options[] = array( "name" => __('Custom Fonts - .ttf','CURLYTHEME'),
				"desc" => __('Upload font file .ttf','CURLYTHEME'),
				"id" => $shortname."_font_upload_ttf",
				"class" => "tiny",
				"type" => "upload_min");			
	
	$options[] = array( "name" => __('Custom Fonts - .svg','CURLYTHEME'),
				"desc" => __('Upload font file .svg','CURLYTHEME'),
				"id" => $shortname."_font_upload_svg",
				"class" => "tiny",
				"type" => "upload_min");
	
	$options[] = array( "name" => __('Custom Fonts - .eot','CURLYTHEME'),
				"desc" => __('Upload font file .eot','CURLYTHEME'),
				"id" => $shortname."_font_upload_eot",
				"class" => "tiny last",
				"type" => "upload_min");


/*	Colors
	================================================= */

	$options[] = array( "name" => __('Colors','CURLYTHEME'),
						"type" => "section");
	
	$options[] = array( "name" => __('Predefined Color Schemes','CURLYTHEME'),
				"desc" => __('Choose a color scheme that you prefer','CURLYTHEME'),
				"id" => $shortname."_color_scheme",
				"std" => 'default',
				"type" => "images",
				"options" => array(
					'default' => $colorsurl.'btn-red.png',
					'style1'  => $colorsurl.'btn-blue.png',
					'style2'  => $colorsurl.'btn-green.png',
					'style3'  => $colorsurl.'btn-amethyst.png',
					'style4'  => $colorsurl.'btn-orange.png',
					'style5'  => $colorsurl.'btn-royal-blue.png'
					));
	
	$options[] = array("type" => "divider");				
					
	$options[] = array( "name" => __('Text Color','CURLYTHEME'),
				"desc" => "Text main color",
				"id" => $shortname."_color_text",
				"class" => "tiny first",
				"std" => "#1E1E1E",
				"type" => "color");
				
	$options[] = array( "name" => __('Primary Color','CURLYTHEME'),
				"desc" => "Theme main color",
				"id" => $shortname."_color_primary",
				"class" => "tiny",
				"std" => "#c0392b",
				"type" => "color");		
	
	$options[] = array( "name" => __('Links','CURLYTHEME'),
				"desc" => __("Text link color", 'CURLYTHEME'),
				"id" => $shortname."_color_links",
				"class" => "tiny ",
				"std" => "#c0392b",
				"type" => "color");
	
	$options[] = array( "name" => __('Links Hover','CURLYTHEME'),
				"desc" => __("Text link hover color",'CURLYTHEME'),
				"id" => $shortname."_color_links_hover",
				"class" => "tiny last",
				"std" => "#1E1E1E",
				"type" => "color");		
	
	$options[] = array("type" => "divider");				
	
	$options[] = array( "name" => __('Heading Colors H1 - H6','CURLYTHEME'),
				"id" => $shortname."_inf",
				"std" => "Heading Colors H1 - H6",
				"type" => "title");
	
	$options[] = array( "name" => __('H1 Titles','CURLYTHEME'),
				"id" => $shortname."_color_h1",
				"class" => "tiny first",
				"std" => "#1E1E1E",
				"type" => "color");
	
	$options[] = array( "name" => __('H2 Titles','CURLYTHEME'),
				"id" => $shortname."_color_h2",
				"class" => "tiny",
				"std" => "#1E1E1E",
				"type" => "color");
	
	$options[] = array( "name" => __('H3 Titles','CURLYTHEME'),
				"id" => $shortname."_color_h3",
				"class" => "tiny",
				"std" => "#1E1E1E",
				"type" => "color");
	
	$options[] = array( "name" => __('H4 Titles','CURLYTHEME'),
				"id" => $shortname."_color_h4",
				"class" => "tiny last",
				"std" => "#1E1E1E",
				"type" => "color");
				
	$options[] = array( "name" => __('H5 Titles','CURLYTHEME'),
				"id" => $shortname."_color_h5",
				"class" => "tiny first",
				"std" => "#1E1E1E",
				"type" => "color");
	
	$options[] = array( "name" => __('H6 Titles','CURLYTHEME'),
				"id" => $shortname."_color_h6",
				"class" => "tiny last",
				"std" => "#1E1E1E",
				"type" => "color");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Menu Colors','CURLYTHEME'),
				"desc" => "",
				"id" => $shortname."_inf",
				"std" => "Menu Colors",
				"type" => "title");
	
	$options[] = array( "name" => __('Links','CURLYTHEME'),
				"id" => $shortname."_color_menu_text",
				"class" => "tiny first",
				"std" => "#FFFFFF",
				"type" => "color");
	
	$options[] = array( "name" => __('Links Hover','CURLYTHEME'),
				"id" => $shortname."_color_menu_hover_text",
				"class" => "tiny",
				"std" => "#E09C95",
				"type" => "color");
	
	$options[] = array( "name" => __('Background','CURLYTHEME'),
				"id" => $shortname."_color_menu_bg_top",
				"class" => "tiny last",
				"std" => "#C0392B",
				"type" => "color");
	
	$options[] = array( "name" => __('Submenu Links','CURLYTHEME'),
				"id" => $shortname."_color_submenu_text",
				"class" => "tiny first",
				"std" => "#33332E",
				"type" => "color");
	
	$options[] = array( "name" => __('Submenu Links Hover','CURLYTHEME'),
				"id" => $shortname."_color_submenu_hover_text",
				"class" => "tiny",
				"std" => "#c0392b",
				"type" => "color");
	
	$options[] = array( "name" => __('Submenu Background','CURLYTHEME'),
				"id" => $shortname."_color_menu_submenu",
				"class" => "tiny last",
				"std" => "#ffffff",
				"type" => "color");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Footer Colors','CURLYTHEME'),
				"desc" => "",
				"id" => $shortname."_inf",
				"std" => "Footer Colors",
				"type" => "title");
	
	$options[] = array( "name" => __('Footer Text Color','CURLYTHEME'),
				"id" => $shortname."_footer_text_color",
				"class" => "tiny first",
				"std" => "#9C9996",
				"type" => "color");
	
	$options[] = array( "name" => __('Footer Link Color','CURLYTHEME'),
				"id" => $shortname."_footer_link_color",
				"class" => "tiny",
				"std" => "#9C9996",
				"type" => "color");
	
	$options[] = array( "name" => __('Footer Titles Color','CURLYTHEME'),
				"id" => $shortname."_footer_title_color",
				"class" => "tiny last",
				"std" => "#FFFFFF",
				"type" => "color");

/*	Page Heading
	================================================= */
																				
	$options[] = array( "name" => __('Page Heading','CURLYTHEME'),
						"type" => "section");												
	
	$options[] = array( "name" => __('Enable Page Heading','CURLYTHEME'),
				"id" => $shortname."_page_heading",
				"desc" => __('Check this to enable the page heading (title & breadcrumbs)','CURLYTHEME'),
				"class" => "medium first",
				"std" => "true",
				"type" => "switch");		
				
	$options[] = array( "name" => __('Enable Breadcrumbs','CURLYTHEME'),
				"id" => $shortname."_bc",
				"desc" => __('Check this to enable the default theme breadcrumbs','CURLYTHEME'),
				"class" => "medium last",
				"std" => "true",
				"type" => "switch");	
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Text Before Breadcrumbs','CURLYTHEME'),
				"id" => $shortname."_bc_text_before",
				"class" => "medium first",
				"std" => "",
				"type" => "text");	
	
	$options[] = array( "name" => __('Breadcrumbs Separator','CURLYTHEME'),
				"id" => $shortname."_bc_separator",
				"class" => "medium last",
				"std" => "&nbsp;&nbsp;/&nbsp;&nbsp;",
				"type" => "text");				
	
	$options[] = array("type" => "divider");			
				
	$options[] = array( "name" => __('Home Link Text','CURLYTHEME'),
				"id" => $shortname."_bc_text_home",
				"class" => "medium first",
				"std" => "Home",
				"type" => "text");	
	
	$options[] = array( "name" => __('Category Text','CURLYTHEME'),
				"id" => $shortname."_bc_text_category",
				"class" => "medium last",
				"std" => "Archive by Category '%s'",
				"type" => "text");	
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Search Text','CURLYTHEME'),
				"id" => $shortname."_bc_text_search",
				"class" => "medium first",
				"std" => "Search Results for '%s' Query",
				"type" => "text");
	
	$options[] = array( "name" => __('Tag Text','CURLYTHEME'),
				"class" => "medium last",
				"id" => $shortname."_bc_text_tag",
				"std" => "Posts Tagged '%s'",
				"type" => "text");		
	
	$options[] = array("type" => "divider");
	
	$options[] = array( "name" => __(' Author Text','CURLYTHEME'),
				"class" => "medium first",
				"id" => $shortname."_bc_text_author",
				"std" => "Articles Posted by '%s'",
				"type" => "text");	
	
	$options[] = array( "name" => __('404 Page Text','CURLYTHEME'),
				"class" => "medium last",
				"id" => $shortname."_bc_text_404",
				"std" => "Error 404",
				"type" => "text");	
			
/*	Blog
	================================================= */
	
	$options[] = array( "name" => __('Blog','CURLYTHEME'),
						"type" => "section");			
	
	$options[] = array( "name" => __('Description Excerpt Size','CURLYTHEME'),
				"desc" => "Choose the number of words you want to display",
				"id" => $shortname."_blog_listing_excerpt",
				"class" => "medium first",
				"std" => 20,
				"min" => 0,
				"max" => 100,
				"suffix" => " words",
				"type" => "number");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Date Format','CURLYTHEME'),
				"desc" => __("Choose the date format. <a href='http://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>Date Formatting</a>", 'CURLYTHEME'),
				"id" => $shortname."_blog_date_format",
				"class" => "medium first",
				"std" => "F jS, Y",
				"type" => "text");
	
	$options[] = array( "name" => __('Show Featured Image','CURLYTHEME'),
				"desc" => __('Check this to show the featured image','CURLYTHEME'),
				"id" => $shortname."_blog_single_image",
				"class" => "medium last",
				"std" => "true",
				"type" => "switch");	
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Hide Sharing Box ','CURLYTHEME'),
				"desc" => __("Check this to hide the sharing box", 'CURLYTHEME'),
				"id" => $shortname."_general_sharing_box",
				"class" => "medium first",
				"std" => "false",
				"type" => "switch");	
					
	$options[] = array( "name" => __('Hide Author Box','CURLYTHEME'),
				"desc" => __("Check this to hide the author box", 'CURLYTHEME'),
				"id" => $shortname."_hide_author",
				"class" => "medium last",
				"std" => "false",
				"type" => "switch");
	
	$options[] = array("type" => "divider");			
				
	$options[] = array( "name" => __('Use Facebook Comments','CURLYTHEME'),
				"desc" => __('Check this if you want to replace the classic Wordpress Comments with Facebook Comments','CURLYTHEME'),
				"id" => $shortname."_fb_comments",
				"class" => "medium first",
				"std" => "false",
				"type" => "switch");
	
	$options[] = array( "name" => __('Facebook Profile ID','CURLYTHEME'),
				"desc" => "Enter your Facebook User ID. <a href='http://findmyfacebookid.com/' target='_blank'>Find your FB User ID</a>",
				"class" => "medium last",
				"id" => $shortname."_fb_id",
				"std" => "",
				"type" => "text");					


/*	SEO
	================================================= */	

	$options[] = array( "name" => __('SEO Pro Panel','CURLYTHEME'),
						"type" => "section");
	
	$options[] = array( "name" => __('Disable the Built-in SEO','CURLYTHEME'),
				"desc" => __('Disable the built-in SEO','CURLYTHEME'),
				"id" => $shortname."_seo",
				"class" => "medium first",
				"std" => "false",
				"type" => "switch");		
	
	$options[] = array( "name" => __('Disable Titles Rewrite','CURLYTHEME'),
				"desc" => __('Disable the built-in SEO','CURLYTHEME'),
				"id" => $shortname."_seo_title_rewrite",
				"class" => "medium last",
				"std" => "false",
				"type" => "switch");	
	
	$options[] = array("type" => "divider");
	
	$options[] = array( "name" => __('Post Title Format','CURLYTHEME'),
				"desc" => __('Choose the title format for the post pages','CURLYTHEME'),
				"id" => $shortname."_seo_title_post",
				"class" => "medium first",
				"std" => "1",
				"type" => "select",
				"options" => array('Post Title', 'Post Title | Blog Title', 'Post Title | Blog Description'));
	
	$options[] = array( "name" => __('Page Title Format','CURLYTHEME'),
				"desc" => __('Choose the title format for the pages','CURLYTHEME'),
				"id" => $shortname."_seo_title_page",
				"class" => "medium last",
				"std" => "1",
				"type" => "select",
				"options" => array('Page Title', 'Page Title | Blog Title', 'Page Title | Blog Description'));			
	
	$options[] = array( "name" => __('Category Title Format','CURLYTHEME'),
				"desc" => __('Choose the title format for the categories pages','CURLYTHEME'),
				"id" => $shortname."_seo_title_category",
				"class" => "medium first",
				"std" => "1",
				"type" => "select",
				"options" => array('Category Title', 'Category Title | Blog Title', 'Category Title | Blog Description', 'Category Title | Category Description'));
	
	$options[] = array( "name" => __('Archive Title Format','CURLYTHEME'),
				"desc" => __('Choose the title format for the archive pages','CURLYTHEME'),
				"id" => $shortname."_seo_title_archive",
				"class" => "medium last",
				"std" => "1",
				"type" => "select",
				"options" => array('Date', 'Date | Blog Title', 'Date | Blog Description'));		
	
	$options[] = array( "name" => __('Tag Title Format','CURLYTHEME'),
				"desc" => __('Choose the title format for the tag pages','CURLYTHEME'),
				"id" => $shortname."_seo_title_tag",
				"class" => "medium first",
				"std" => "1",
				"type" => "select",
				"options" => array('Tag', 'Tag | Blog Title', 'Tag | Blog Description'));
	
	$options[] = array( "name" => __('Search Title Format','CURLYTHEME'),
				"desc" => __('Choose the title format for the search page','CURLYTHEME'),
				"id" => $shortname."_seo_title_search",
				"class" => "medium last",
				"std" => "1",
				"type" => "select",
				"options" => array('Search', 'Search | Blog Title', 'Search | Blog Description'));
	
	$options[] = array( "name" => __('404 Page Title Format','CURLYTHEME'),
				"desc" => __('Choose the title format for the 404 page','CURLYTHEME'),
				"id" => $shortname."_seo_title_search",
				"class" => "medium first",
				"std" => "The page you are looking for, could not be found",
				"type" => "text");
	
	$options[] = array("type" => "divider");			
				
	$options[] = array( "name" => __('Google Services Integration','CURLYTHEME'),
				"type" => "title");
	
	$options[] = array( "name" => __('Google Plus Publisher ID','CURLYTHEME'),
				"desc" => __('Enter the Google Plus Publisher ID','CURLYTHEME'),
				"id" => $shortname."_seo_publisher",
				"class" => "medium first",
				"std" => "",
				"type" => "text");	
				
	$options[] = array( "name" => __('Google Analytics ID','CURLYTHEME'),
				"desc" => __('Enter the Google Analytics ID. e.g. UA-XXXXX-Y or UA-XXXXX-YY.','CURLYTHEME'),
				"id" => $shortname."_seo_analytics",
				"class" => "medium last",
				"std" => "",
				"type" => "text");	
	
	$options[] = array( "name" => __('Google Webmaster Tools Site Verification','CURLYTHEME'),
				"desc" => __('Please insert verification code for Webmaster tools in here','CURLYTHEME'),
				"id" => $shortname."_seo_webmaster",
				"class" => "medium first",
				"std" => "",
				"type" => "text");
			
/*	More Options
	================================================= */	

	$options[] = array( "name" => __('Retina &amp; Icons','CURLYTHEME'),
						"type" => "section");			
	
	$options[] = array( "name" => __('Retina Logo','CURLYTHEME'),
				"desc" => __('Be sure that this complies with the retina standards','CURLYTHEME'),
				"id" => $shortname."_logo_retina",
				"class" => "medium first",
				"std" => '',
				"type" => "upload");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('iPhone Retina Icon Upload','CURLYTHEME'),
				"desc" => __("Upload 114px * 114px icon", 'CURLYTHEME'),
				"id" => $shortname."_general_iphone_favicon_retina",
				"class" => "medium first",
				"std" => $defurl.'equestrian-iphone-114.png',
				"type" => "upload");						
							
	$options[] = array( "name" => __('iPhone Icon Upload','CURLYTHEME'),
					"desc" => __("Upload 57px * 57px icon", 'CURLYTHEME'),
					"id" => $shortname."_general_iphone_favicon",
					"class" => "medium last",
					"std" => $defurl.'equestrian-iphone-57.png',
					"type" => "upload");			
	
	$options[] = array("type" => "divider");
	
	$options[] = array( "name" => __('iPad Retina Icon Upload','CURLYTHEME'),
				"desc" => __("Upload 144px * 144px icon.", 'CURLYTHEME'),
				"id" => $shortname."_general_ipad_favicon_retina",
				"class" => "medium first",
				"std" => $defurl.'equestrian-ipad-144.png',
				"type" => "upload");				
	
	$options[] = array( "name" => __('iPad Icon Upload','CURLYTHEME'),
					"desc" => __("Upload 72px * 72px icon", 'CURLYTHEME'),
					"id" => $shortname."_general_ipad_favicon",
					"class" => "medium last",
					"std" => $defurl.'equestrian-ipad-72.png',
					"type" => "upload");									

/*	Advanced Options
	================================================= */	

	$options[] = array( "name" => __('Advanced Options','CURLYTHEME'),
						"type" => "section");
	
	$options[] = array( "name" => __('Theme Options Name','CURLYTHEME'),
				"desc" => __("Default name: Equestrian Options", 'CURLYTHEME'),
				"id" => $shortname."_theme_options_name",
				"class" => "medium first",
				"std" => 'Equestrian Options',
				"type" => "text");
	
	$options[] = array( "name" => __('Login Box Position','CURLYTHEME'),
				"desc" => __('Choose the position of the Login Box','CURLYTHEME'),
				"id" => $shortname."_login_box_position",
				"class" => "medium last",
				"std" => "center",
				"type" => "buttons",
				"options" => array(
					'center' => 'Center',
					'left' => 'Left',
					'right' => 'Right'
					));
	
	$options[] = array("type" => "divider");				
	
	$options[] = array( "name" => __('Admin Logo','CURLYTHEME'),
				"desc" => null,
				"class" => "medium first",
				"id" => $shortname."_admin_logo",
				"std" => null,
				"type" => "upload");
	
	$options[] = array("type" => "divider");			
	
	$options[] = array( "name" => __('Admin Background Image','CURLYTHEME'),
				"desc" => null,
				"class" => "medium first",
				"id" => $shortname."_admin_bg",
				"std" => null,
				"type" => "upload");
	
	$options[] = array( "name" => __('Admin Shading Pattern','CURLYTHEME'),
				"desc" => __('Are you feeling creative? Choose your own shading pattern. ','CURLYTHEME'),
				"id" => $shortname."_admin_shading_pattern",
				"class" => "medium last",
				"std" => "1",
				"type" => "images",
				"options" => array(
					0 	=> $bgheadurl . 'btn-bg-00.png',
					1 	=> $bgheadurl . 'btn-bg-01.png',
					2 	=> $bgheadurl . 'btn-bg-02.png',
					3 	=> $bgheadurl . 'btn-bg-03.png',
					4 	=> $bgheadurl . 'btn-bg-04.png'
					));	
	
	$options[] = array("type" => "divider");						
	
	$options[] = array( "name" => __('Admin Background Shading Color','CURLYTHEME'),
				"desc" => __("Admin Shading Color", 'CURLYTHEME'),
				"id" => $shortname."_admin_shading_color",
				"class" => "medium first",
				"std" => "#FBFBFB",
				"type" => "color");			
	
	$options[] = array( "name" => __('Admin Shading Opacity','CURLYTHEME'),
				"desc" => __("Default value: 55%", 'CURLYTHEME'),
				"id" => $shortname."_admin_shading_opacity",
				"class" => "medium last",
				"std" => 55,
				"min" => 0,
				"max" => 100,
				"suffix" => "%",
				"increment" => 0.1,
				"type" => "number");
	
	$options[] = array("type" => "divider");						
	
	$options[] = array( "name" => __('Additional Code','CURLYTHEME'),
				"desc" => "",
				"id" => $shortname."_inf",
				"std" => "Aditional Code",
				"type" => "title");				
	
	$options[] = array( "name" => __('Custom CSS','CURLYTHEME'),
				"desc" => __('This code will be the last CSS code applied. This will be inserted inline in <head> tag','CURLYTHEME'),
				"id" => $shortname."_custom_css",
				'class' => 'full_textarea',
				"std" => "",
				"type" => "textarea");
	
	$options[] = array( "name" => __('Code before closing <head> tag','CURLYTHEME'),
				"id" => $shortname."_custom_head",
				"desc" => __('This code will be inserted right before closing the </head> tag','CURLYTHEME'),
				'class' => 'full_textarea',
				"std" => "",
				"type" => "textarea");		
	
	$options[] = array( "name" => __('Code before closing <body> tag','CURLYTHEME'),
				"desc" => __('This code will be inserted right before closing the </body> tag','CURLYTHEME'),
				"id" => $shortname."_custom_body",
				'class' => 'full_textarea',
				"std" => "",
				"type" => "textarea");
	
	$options[] = array( "name" => __('Back-up & Reset','CURLYTHEMES'),
						"type" => "section");
	
	// Backup Field					
	$options[] = array( "name" => __("Backup Options","CURLYTHEMES"),
				"desc" => __("It is recommended that you backup your options before updates", "CURLYTHEMES"),
				"class" => "medium first",
				"type" => "backup");
	
	// Reset					
	$options[] = array( "name" => __("Reset Theme Options","CURLYTHEMES"),
				"desc" => __("Reset all theme options to default options.", "CURLYTHEMES"),
				"class" => "medium first",
				"type" => "reset");								
					
	$options[] = array( "name" => __('Live Documentation','CURLYTHEME'),
						"type" => "section");
	
	$options[] = array( "name" => __('Theme Options Name','CURLYTHEME'),
				"desc" => __("Default name: Equestrian Options", 'CURLYTHEME'),
				"id" => $shortname."_doc",
				"source" => 'http://docs.curlythemes.com/equestrian-doc/iframe.php?color=gray',
				"type" => "iframe");
	
	$options[] = array( "name" => __('Resources','CURLYTHEME'),
						"type" => "section");
	
	$options[] = array( "name" => __('Theme Options Name','CURLYTHEME'),
				"desc" => __("Default name: Equestrian Options", 'CURLYTHEME'),
				"id" => $shortname."_resources",
				"source" => 'http://docs.curlythemes.com/resources/?color=gray',
				"type" => "iframe");
				
?>