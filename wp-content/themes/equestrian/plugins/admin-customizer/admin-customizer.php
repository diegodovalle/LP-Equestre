<?php 

add_action( 'login_enqueue_scripts', 'curly_login_page' );

function curly_login_page() { ?>
    <style type="text/css">
     <?php  
     		if(get_option(THEMEPREFIX.'_admin_logo', null)) :
     		list($width, $height, $type, $attr) = getimagesize(get_option(THEMEPREFIX.'_admin_logo'));
     ?>
        	body.login div#login h1 a {
        	    background-image: url(<?php echo get_option(THEMEPREFIX.'_admin_logo') ?>);
        	    width: <?php echo($width) ?>px;
        	    height: <?php echo($height) ?>px;
        	    background-size: <?php echo($width) ?>px <?php echo($height) ?>px;
        	    padding-bottom: 50px;
        	}
        	
     <?php endif; ?>
     
     <?php if(get_option(THEMEPREFIX.'_login_box_position', 'center')) : ?>
     	#login{
     		<?php
     			switch (get_option(THEMEPREFIX.'_login_box_position', 'center')) {
					case 'center' 	: echo 'margin: 0 auto'; break;
					case 'left'		: echo 'margin: 0 auto 0 200px'; break;
					case 'right'	: echo 'margin: 0 200px 0 auto'; break;
				}
     		?>
     	}
     <?php endif; ?>
     
     <?php if(get_option(THEMEPREFIX.'_admin_bg', null)) : ?>
     	
     	html{
     		background: url(<?php echo get_option(THEMEPREFIX.'_admin_bg', null) ?>) no-repeat top center;
     		background-size: cover;
     		
     	}
     	
     	<?php  
     		switch (get_option(THEMEPREFIX.'_admin_shading_pattern', 0)) {
				case 0 : $pattern = null; break;
				case 1 : $pattern = 'url('.get_stylesheet_directory_uri().'/images/header/bg-header.png)'; break;
				case 2 : $pattern = 'url('.get_stylesheet_directory_uri().'/images/header/bg-header-02.png)'; break;
				case 3 : $pattern = 'url('.get_stylesheet_directory_uri().'/images/header/bg-header-03.png)'; break;
				case 4 : $pattern = 'url('.get_stylesheet_directory_uri().'/images/header/bg-header-04.png)'; break;
			}
     	?>
     	
     	body.login{
     		background: rgba(<?php echo curly_hex2rgb(get_option(THEMEPREFIX.'_admin_shading_color', '#FBFBFB')) ?>, <?php echo get_option(THEMEPREFIX.'_admin_shading_opacity', null) / 100 ?>) <?php echo $pattern ?>;
     	}
     	
     	.login form{
     		box-shadow: none;
     		-webkit-box-shadow: none;
     	}
     	.login #nav{
     		margin-top: 50px;
     	}
     	
     	.login #nav a, .login #backtoblog a{ 
     		text-shadow: none;
     		color: rgba(<?php echo curly_hex2rgb(curly_contrast(get_option(THEMEPREFIX.'_admin_shading_color', '#FBFBFB'), '#000000', '#ffffff')); ?>, .3) !important;
     		text-decoration: none;
     	}
     	.login #backtoblog{
     		display: none;
     	}
     <?php endif; ?>	
     	
    </style>
<?php } ?>