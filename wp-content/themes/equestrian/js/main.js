jQuery(document).ready(function(){
	"use strict";
	
	if(jQuery('.video-container').length > 0) {
		jQuery(".video-container").fitVids();
    }
    
    // Navigation
    if(jQuery(window).width() > 758){
    	jQuery('#navigation > div > ul').dropdown_menu({
    		init : function() { window.menuCheck = true; }
    	});
    }
    
    jQuery(window).resize(function () {
    	if (jQuery(this).width() < 758 ) {
    		jQuery('#navigation li').off();
    		jQuery('#navigation *').removeAttr('style');
    		window.menuCheck = false;
    	} else if (window.menuCheck !== true) {
    		window.menuCheck = true;
    		jQuery('#navigation > div > ul').dropdown_menu();
    		jQuery('#navigation .nav-click i').removeClass('fa fa-flip-vertical');
    	}
    });
    
    jQuery('.collapse').live('show', function(){
		jQuery(this).parent().find('a').addClass('open'); //add active state to button on open
    });
    
    jQuery('.collapse').live('hide', function(){
		jQuery(this).parent().find('a').removeClass('open'); //remove active state to button on close
    });
    
    jQuery('.panel-group').find('.in').siblings().find('a').addClass('open');
    
    jQuery('.carousel').carousel({
		interval: 5000
    });
    
    jQuery('.container.page-content').find('.col-lg-12').each(function(){
		if (jQuery(this).html() === 0) {
			jQuery(this).parent().parent().remove();
		}
    });
    
    jQuery('.testimonials .carousel-inner').equalize('height');
        
    jQuery('#mc_mv_EMAIL').attr('placeholder', jQuery('label.mc_var_label').html());
    jQuery('#mc_signup_submit').addClass('btn');
    
    jQuery(function() {
		jQuery('.gallery-icon a').attr('data-lightbox', 'lightbox');
    });
    
    // hide #back-top first
	jQuery("#back-top").hide();
	
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		jQuery('#back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	
	fit_header();
	
	// Waypoints
	if(jQuery(window).width() > 758){
		jQuery('.pre-footer').waypoint(function() {
			jQuery(this).find('.pre-footer-widget:first-child').addClass('animated fadeInLeftBig');
			jQuery(this).find('.pre-footer-widget:last-child').addClass('animated fadeInRightBig');
			},{
				offset: '100%'
		});
		
		jQuery('footer').waypoint(function() {
			jQuery(this).find('.footer-widget').addClass('animated fadeInUp');
			setTimeout(function () {jQuery('footer').find('.absolute-footer').addClass('animated fadeInUp');}, 200);
			},{
				offset: '100%'
		});
		
		jQuery('.row.page-content div[class*="span"]').waypoint(function() {
			jQuery(this).children().addClass('animated fadeInUp');
			},{
				offset: '100%'
		});
		
		jQuery('.photo-frame').waypoint(function() {
			jQuery(this).addClass('animated fadeInUp');
			},{
				offset: '100%'
		});
		
		jQuery('.person').waypoint(function() {
			jQuery(this).addClass('animated fadeInUp');
			},{
			offset: '100%'
		});
		
		// Fade in the overlay when the primary menu is the focus.
		jQuery('.person').hoverIntent({
			over : function() {
				jQuery(this).find('img').addClass( 'animated tada' );
			},
			out : function() {
				jQuery(this).find('img').removeClass( 'tada' );
			},
			timeout : 5
		});
	}
	
	if(jQuery('.zoom-picture').length != 0) { jQuery('.zoom-picture').zoom(); }
	
	if (data.menu_hover != 'true') {
		
		var overlay = jQuery('#menu-overlay');
		overlay.height(jQuery(document).height());
		
		// Fade in the overlay when the primary menu is the focus.
		if(jQuery(window).width() > 758){
			jQuery('#navigation').hoverIntent({
				over : function() {
					overlay.fadeIn( 'fast' );
				},
				out : function() {
					overlay.fadeOut('fast');
				},
				timeout : 250
			});	
		}
	
		jQuery('#navigation > div > ul > li > a').mouseover(function(){
			if(jQuery(window).width() > 758 ){
				jQuery(this).css('color', data.color_menu_text);
				jQuery(this).parent().siblings().children('a').css('color', data.color_menu_text_hover);
			}
		});
		
		jQuery('#navigation > div > ul > li > a').mouseout(function(){
			if(jQuery(window).width() > 758 ){
				jQuery(this).removeAttr('style');
				jQuery(this).parent().siblings().children('a').css('color', data.color_menu_text);
				jQuery(this).parent().siblings('.current-menu-item').children('a').css('color', data.color_menu_text_hover);
				jQuery(this).parent().siblings('.current_page_ancestor').children('a').css('color', data.color_menu_text_hover);
				jQuery(this).parent().siblings('.current_page_parent').children('a').css('color', data.color_menu_text_hover);
			}
		});
	}
	
	if (data.sticky_menu != 'true' && jQuery(document).width() > 758) {
		jQuery('#navigation').waypoint('sticky');
	}	
});

jQuery(function( jQuery ){
	"use strict";
	
});

function fit_header() {
	"use strict";
	jQuery('#header-bg').css('height', jQuery('#header').outerHeight());
}

jQuery(window).resize(function (){
	"use strict";
	fit_header();
});

;(function($) {
	// DOM ready
	$(function() {
		
		// Append the mobile icon nav
		$('#navigation').append($('<div id="nav-toggle" class="visible-xs"><i class="fa fa-bars fa-lg"></i></div>'));
		
		// Add a <span> to every .nav-item that has a <ul> inside
		$('.menu-item').has('ul').prepend('<span class="visible-xs nav-click"><i class="fa fa-angle-down"></i></span>');
		
		// Click to reveal the nav
		$('#nav-toggle').click(function(){
			$('.menu').toggle();
		});
	
		// Dynamic binding to on 'click'
		$('.menu').on('click', '.nav-click', function(){
		
			// Toggle the nested nav
			$(this).siblings('.sub-menu').toggle();
			
			// Toggle the arrow using CSS3 transforms
			$(this).children('.fa-angle-down').toggleClass('fa-flip-vertical');
			
		});
	    
	});
	
})(jQuery);

;(function($) {
	// DOM ready
	$(function() {
		// Append the mobile icon nav
		$('.page-heading').append($('<div class="visible-xs">'+ $('.page-heading div').html() +'</div>'));
	});
	
})(jQuery);

jQuery(window).load(function() {
	"use strict";
	
	jQuery('.logo img.logo-retina').attr('width', jQuery('.logo img.logo-nonretina').width());
	jQuery('.logo img.logo-retina').attr('height', jQuery('.logo img.logo-nonretina').height());
	 
});
