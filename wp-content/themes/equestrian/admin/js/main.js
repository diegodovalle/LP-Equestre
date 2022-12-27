(function($) {
  	"use strict";
  	
  	// Tabs
  	$(function() {
  	    $( "#theme-options" ).tabs();
  	});
  	
  	// Clear Buttons
  	$('.image-clear-button').click( function (e) {
  		$(this).siblings('input[type=text]').val(null);
  		$(this).siblings('input[type=hidden]').val(null);
  		$(this).siblings('.image-preview').remove();
  	});
  	
  	// Switch
  	$('.js-switch').each(function () {
  		var input = $(this);
  		var el 	  = $(this).parent();
  		if ($(input).is(':checked')) {
  			var newSwitch = '<div class="switch on"><div class="handle"></div></div>';
  		} else {
  			var newSwitch = '<div class="switch"><div class="handle"></div></div>';
  		}
  		
  		$(newSwitch).insertAfter(input).click(function () { 
  			$(this).toggleClass("on"); 
  			if (!$(input).is(':checked')) {
  				input.prop( "checked", true );
  			} else {
  				input.prop( "checked", false );
  			}
  		});
  		$('label.name', el).click(function () {
  			$('div.switch', el).toggleClass("on"); 
  		});
  	});
  	
  	// Save Button Position
  	$('#save-options-top').attr('style','right:'+ $('#wp-admin-bar-my-account').width() +'px');
  	
  	// Color Schemes
  	$('input[name*=eque_color_scheme]').on('change', function () {

  		// Get Color Theme
  		var theme = $(this).val();
  		
  		// Set Element Color
  		change_color($('#eque_color_text'), js_data[0][theme]['text']);
  		change_color($('#eque_color_primary'), js_data[0][theme]['primary']);
  		change_color($('#eque_color_links'), js_data[0][theme]['link']);
  		change_color($('#eque_color_links_hover'), js_data[0][theme]['linkHover']);
  		change_color($('#eque_color_h1'), js_data[0][theme]['h1']);
  		change_color($('#eque_color_h2'), js_data[0][theme]['h2']);
  		change_color($('#eque_color_h3'), js_data[0][theme]['h3']);
  		change_color($('#eque_color_h4'), js_data[0][theme]['h4']);
  		change_color($('#eque_color_h5'), js_data[0][theme]['h5']);
  		change_color($('#eque_color_h6'), js_data[0][theme]['h6']);
  		change_color($('#eque_color_menu_text'), js_data[0][theme]['menuLink']);
  		change_color($('#eque_color_menu_hover_text'), js_data[0][theme]['menuHover']);
  		change_color($('#eque_color_menu_bg_top'), js_data[0][theme]['menuBg']);
  		change_color($('#eque_color_submenu_text'), js_data[0][theme]['submenuLink']);
  		change_color($('#eque_color_submenu_hover_text'), js_data[0][theme]['submenuHover']);
  		change_color($('#eque_color_submenu'), js_data[0][theme]['submenuBg']);
  		change_color($('#eque_footer_text_color'), js_data[0][theme]['footerText']);
  		change_color($('#eque_footer_link_color'), js_data[0][theme]['footerLink']);
  		change_color($('#eque_footer_title_color'), js_data[0][theme]['footerTitle']);
  		change_color($('#eque_bg_color'), js_data[0][theme]['background']);
  		
  		// Change Color
  		function change_color( element, color ) {
  			$(element).attr('value', color);
  			$(element).parent().siblings('.wp-color-result').attr('style','background-color:' + color);
  		}
  	});
  	
  	// Save Form
  	$('#save-options-bottom, #save-options-top').click(function (e) {
  		
  		// Get TinyMCE Value
  		tinyMCE.triggerSave();
  		
  		// Data String Array
  		var dataString = new Array();
  		
  		// Data String Array - Populate
  		$('#theme-options [id^=eque_]').each(function () {
  			if ($(this).is('input[type=text]') || $(this).is('input[type=hidden]') || $(this).is('textarea') || $(this).is('select')) {
  				var value = $(this).val();
  				dataString.push(new Array($(this).attr('id'), value));
  			} else if ($(this).is('input[type=checkbox]:checked')) {
  				var value = 'true';
  				dataString.push(new Array($(this).attr('id'), value));
  			} else if ($(this).is('input[type=radio]:checked')) {
  				var value = $(this).val();
  				dataString.push(new Array($(this).attr('name'), value));
  			} else if ($(this).is('input[type=checkbox]')){
  				var value = 'false';
  				dataString.push(new Array($(this).attr('id'), value));
  			}
  		});
  		
  		// AJax
  		$.ajax({ 
  			type: "POST",  
  			url: js_data[1] + '/admin/ajax_save.php',  
  			data: {data:dataString},
  			async: false,  
  			success: function(msg) {

  				// Disable Elements
  				$('input, textarea').each(function () {
  					$(this).attr('disabled', 'disabled');
  				});
  				
  				// Disable Main Wrapper 
  				$('#theme-options-wrapper').attr('style', 'opacity: 0.35');
  				
  				// Save Confirmation
  				if (msg != 'false') {
  					$('#options-saved').fadeIn();
  				} else {
  					$('#options-error').fadeIn();
  				}
  				
  				
  				// Save Buttons Disable
  				$("#save-options-bottom, #save-options-top").addClass('disabled').text(js_data[2]);
  				
  				// Timeout Actions
  				setTimeout(function () {
  				
  					// No Accident - Allow Leave
  					$(window).off('beforeunload');
  					
  					// Save Confirmation Fade Out
  					if (msg != 'false') {
	  					$('#options-saved').fadeOut();
  					} else {
  						$('#options-error').fadeOut();
  					}
  					
  					// Enable Elements
  					$('input, textarea').each(function () {
  						$(this).removeAttr('disabled');
  					});
  					
  					// Enable Main Wrapper
  					$('#theme-options-wrapper').removeAttr('style');
  					
  					// Enable Save Buttonss
  					$("#save-options-bottom, #save-options-top").each(function () {
  						$(this).removeClass('disabled').text($(this).attr('title'));
  					});
  					
  				}, 1500)
  			} 
  		});
  		return false;
  	});
  	
  	// Reset Options
  	$('#reset-options-bottom').click(function (e) {
  		
  		if (confirm(js_data[4])) {
  		
  			// Data String Array
  			var dataString = new Array();
  			
  			// Data String Array - Populate
  			$('#theme-options [id^='+ js_data[5] +']').each(function () {
  				if ($(this).is('input[type=radio]')) {
  					dataString.push(new Array($(this).attr('name')));
  				} else {
  					dataString.push(new Array($(this).attr('id')));
  				}
  			});
  			
  			// Ajax
  			$.ajax({ 
  				type: "POST",  
  				url: js_data[1] + '/admin/ajax_reset.php',  
  				data: {data:dataString},
  				async: false,  
  				success: function(msg) {
  					location.reload();
  				} 
  			});
  		}
  		e.preventDefault();
  	});
  	
  	// Backup Options
  	$('#backup').click(function (e) {
  		
  		if (confirm(js_data[8])) {
  			var container = $(this).parents('.message');
  			var dataString = new Array();
  			var data = [];
  			
  			
  			var options_count = 0;
  			
  			// Data String Array - Populate
  			$('#theme-options [id^='+ js_data[5] +']').each(function () {
  				if ($(this).is('input[type=text]') || $(this).is('textarea') || $(this).is('input[type=hidden]') || $(this).is('select')) {
  					
  					var value = $(this).val();
  					
  					if ($.isArray(value)) {
  						value = value.toString();
  					}
  					
  					data[ options_count ] = {
  						'option'	: $(this).attr('id'),
  						'value'		: value
  					};
  				} else if ($(this).is('input[type=checkbox]:checked')) {
  					data[ options_count ] = {
  						'option'	: $(this).attr('id'),
  						'value'		: 'true'
  					};
  				} else if ($(this).is('input[type=radio]:checked')) {
  					data[ options_count ] = {
  						'option'	: $(this).attr('name'),
  						'value'		: $(this).val()
  					};
  				} else if ($(this).is('input[type=checkbox]')) {
  					data[ options_count ] = {
  						'option'	: $(this).attr('id'),
  						'value'		: null
  					};
  				}
  				options_count++; 
  			});
  			
  			dataString.push(new Array(js_data[5] + '_theme_options_backup_list'));
  			dataString.push(new Array(js_data[5] + '_theme_options_backup_', JSON.stringify(data)));
  			
  			// Ajax
  			$.ajax({ 
  				type: "POST",  
  				url: js_data[1] + '/admin/ajax_backup.php',  
  				data: {data:dataString},
  				async: false,  
  				success: function(msg) {
  					$(window).off("beforeunload");
  					location.reload();
  				} 
  			});
  		}
  		e.preventDefault();
  	});
  	
  	// Delete Back-up
  	$('.delete-backup').click(function (e) {
  		
  		if (confirm(js_data[7])) {
  			var container = $(this).parents('.message');
  			var parent = $(this).parent();
  			var list = $(this).parents('.backup-list');
  			var dataString = new Array();
  			
  			dataString.push(new Array(js_data[5] + '_theme_options_backup_' + $(this).data('backup'), $(this).data('backup')));
  			
  			// Ajax
  			$.ajax({ 
  				type: "POST",  
  				url: js_data[1] + '/admin/ajax_reset.php',  
  				async: false, 
  				data: {data:dataString}, 
  				success: function(msg) {
  					if ($('li',list).length == 1) {
  						container.removeClass('with-list').addClass('no-list');
  						parent.remove();
  					} else {
  						parent.remove();
  					}
  				} 
  			});
  		}
  		e.preventDefault();
  	});
  	
  	// Restore Back-up
  	$('.restore-backup').click(function (e) {
  		if (confirm(js_data[6])) {
  			var dataString = new Array();
  			
  			dataString.push(new Array(js_data[5] + '_theme_options_backup_' + $(this).data('backup')));
  			
  			// Ajax
  			$.ajax({ 
  				type: "POST",  
  				url: js_data[1] + '/admin/ajax_restore.php',  
  				async: false,
  				data: {data:dataString},
  				success: function(msg) {
  					$(window).off("beforeunload");
  					location.reload();
  				} 
  			});
  		}
  		e.preventDefault();
  	});
  	
  	// Fancy Select Boxes
    $(".select-chosen").chosen({width : '100%'});
    $('select.select-style').selectric({maxHeight: 170});
  	 
  	// Accident Prevent
  	$('input, textarea').on('change', function () {
  		$(window).on("beforeunload", function(event) {
  		    return js_data[3];
  		});
  	});
  	
  	$(document).ready( function() {
  		
  		// Buttonset
	  	$(function() {
	  	    $( ".buttons" ).buttonset();
	  	  });
		
		// Color Picker	
		$('.color-picker').wpColorPicker();
	
		// Function Upload Media
		$('.image-upload-button').click(function (e) {
			var el = $(this).parent();
			var button = $(this);
			e.preventDefault();
			var uploader = wp.media({
				title : button.data('upload-title'),
				button : {
					text : button.data('upload-button')
				},
				multiple : false
			})
			.on('select', function () {
				var selection = uploader.state().get('selection');
				var attachment = selection.first().toJSON();
				$('input[type=text]', el).val(attachment.url);
				$('input[type=hidden]', el).val(attachment.id);
				if (!el.hasClass('upload_file')) {
					if ($('img', el).length > 0) {
						$('.image-preview', el).attr('src', attachment.url);
					} else {
						$('<img src="'+ attachment.url +'" class="image-preview">').insertBefore($(':last-child', el));
						$('.image-clear-button', el).attr('style', 'display:inline-block');
					}
				}
			})
			.open();
		});
 	
  	});
  	
	 
})(jQuery);  