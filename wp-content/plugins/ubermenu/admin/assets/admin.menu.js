(function ($) {

	var ubermenu_admin_is_initialized = false;

	//jQuery( document ).ready( function($){
	jQuery(function ($) {
		initialize_ubermenu_admin('document.ready');
	});

	//Backup
	$(window).on('load', function () {
		initialize_ubermenu_admin('window.load');
	});

	function initialize_ubermenu_admin(init_point) {

		if (ubermenu_admin_is_initialized) return;

		ubermenu_admin_is_initialized = true;

		if ((typeof console != "undefined") && init_point == 'window.load') console.log('UberMenu admin initialized via ' + init_point);


		var $current_menu_item = null;
		var current_menu_item_id = '';	//menu-item-x
		var $current_panel = null;

		var $settingswrap = $('.ubermenu-menu-item-settings-wrapper');
		var $shiftwrap = $('.shiftnav-menu-item-settings-wrapper');
		var shiftnav = $shiftwrap.length > 0 ? true : false;

		//remove loading notice
		$('.ubermenu-js-check').remove();

		//Add View in Sandbox button
		//$( '.publishing-action' ).before( '<a href="#" class="button button-primary">View UberMenu in Sandbox</a>' );
		if (ubermenu_meta.sandbox_url) {
			$('.nav-tab-wrapper').append('<a target="_blank" href="' + ubermenu_meta.sandbox_url + '" class="nav-tab">View UberMenu in Sandbox</a>');
		}

		//handle adding the "Uber" button on each menu item upon first interaction
		$('#menu-management').on('mouseenter touchEnd MSPointerUp pointerup', '.menu-item:not(.ubermenu-processed)', function (e) {
			$(this).addClass('ubermenu-processed');
			$(this).find('.item-title').append('<span class="ubermenu-settings-toggle" data-uber-toggle="' + $(this).attr('id') + '"><i class="fas fa-cog"></i> Uber <span class="ubermenu-unsaved-alert"><i class="fas fa-exclamation-triangle"></i> <span class="ubermenu-unsaved-alert-message">Unsaved</span></span></span>');
			//console.log( $(this).find( '.item-title' ).text() );
		});

		//Close when ShiftNav is opened
		if (shiftnav) {
			$('#menu-management').on('click', '.shiftnav-settings-toggle', function (e) {
				$settingswrap.removeClass('ubermenu-menu-item-settings-open');
				$('body').removeClass('ubermenu-settings-panel-is-open');
			});
		}

		//Don't allow clicks to propagate when clicking the toggle button, to avoid drag-starts of the menu item
		$('#menu-management').on('mousedown', '.ubermenu-settings-toggle', function (e) {
			e.preventDefault();
			e.stopPropagation();

			return false;
		});

		$(document).on('keyup', function (e) {
			if (e.keyCode == 27) {
				if ($current_panel) {
					$settingswrap.toggleClass('ubermenu-menu-item-settings-open');
				}
			}
		});

		//Handle clicking the "Uber" button on each menu item - open settings
		$('#menu-management').on('click', '.ubermenu-settings-toggle', function (e) {

			var this_menu_item_id = $(this).attr('data-uber-toggle');
			var this_menu_item_id_num = this_menu_item_id.substr(10);

			$current_menu_item = $(this).parents('li.menu-item'); //closest?

			//Close ShiftNav
			if (shiftnav) {
				$shiftwrap.removeClass('shiftnav-menu-item-settings-open');
				$('body').removeClass('shiftnav-settings-panel-is-open');
			}

			//This is already the current item
			if (this_menu_item_id == current_menu_item_id) {
				$settingswrap.toggleClass('ubermenu-menu-item-settings-open');
				$('body').toggleClass('ubermenu-settings-panel-is-open');
			}
			//Switching to a different item
			else {
				$settingswrap.addClass('ubermenu-menu-item-settings-open');
				$('body').addClass('ubermenu-settings-panel-is-open');
				//$( '.ubermenu-menu-item-tab' ).click();
				//Update

				$current_panel = $settingswrap.find('.ubermenu-menu-item-panel-' + this_menu_item_id);

				//Create Panel if it doesn't exist
				if ($current_panel.length === 0) {
					$current_panel = $('.ubermenu-menu-item-panel-negative').clone();
					$current_panel.removeClass('ubermenu-menu-item-panel-negative');
					$current_panel.addClass('ubermenu-menu-item-panel-' + this_menu_item_id);
					$current_panel.attr('data-menu-item-target-id', this_menu_item_id_num);

					//If settings have loaded properly, remove the error notice
					if ($current_panel.find('.ubermenu-settings-completion-marker').length) {
						$current_panel.find('.ubermenu-menu-item-load-error-notice').remove();
					}

					var hash = '#' + this_menu_item_id;

					var item_type = $current_menu_item.find('.item-type:first').text();
					if ($current_menu_item.find('.item-type').length > 1 && typeof console != "undefined")
						console.warn('[UberMenu Notice] Multiple menu item types defined by custom nav walker.  If you are not seeing the proper settings, try enabling "Disable Custom Menus Panel Walker" in the UberMenu Control Panel > General Settings > Theme Integration');
					var item_type_class = item_type.replace('[', '').replace(']', '').replace(/ /g, '_').toLowerCase();
					//console.log( item_type + ' :: ' + item_type_class );
					$current_panel.addClass('ubermenu-menu-item-panel-type-' + item_type_class);

					var data_object_type = $current_menu_item.find('.menu-item-data-object').val();
					if (data_object_type == 'ubermenu-custom') data_object_type = item_type;

					// console.log( data_object_type );
					// console.log( item_type );
					// console.log( item_type_class );

					//Get the Title from the Menu Item
					var _title = $current_menu_item.find('.menu-item-title').text();
					if (!_title) {
						_title = $current_menu_item.find('.item-title').text();
						_title = _title.substring(0, _title.indexOf(' Uber'));
					}

					//Set Panel's Item Title, ID link, and Type
					$current_panel.find('.ubermenu-menu-item-title').html('<a href="' + hash + '"><i class="fas fa-location-arrow"></i> ' + _title + '</a>');
					$current_panel.find('.ubermenu-menu-item-id').html('<a href="' + hash + '">' + hash + '</a>');
					$current_panel.find('.ubermenu-menu-item-type').text(item_type);

					//Remove unneeded tabs based on ubermenu_get_menu_item_panels_map
					var item_panels = ubermenu_meta.item_panels['default'];
					if (typeof ubermenu_meta.item_panels[data_object_type] != 'undefined') {
						//item_panels = ubermenu_meta.item_panels[item_type];
						item_panels = ubermenu_meta.item_panels[data_object_type];
					}
					//console.log( item_panels );
					$current_panel.find('li.ubermenu-menu-item-tab').each(function () {
						if (item_panels.indexOf($(this).data('ubermenu-tab')) == -1) {
							$(this).remove();
							$current_panel.find('.ubermenu-menu-item-tab-content[data-ubermenu-tab-content=' + $(this).data('ubermenu-tab') + ']').remove();
						}
					});



					var item_data = ubermenu_menu_item_data[this_menu_item_id_num];
					if (item_data) {

						$current_panel.find('[data-ubermenu-setting]').each(function () {
							var _data_name = $(this).data('ubermenu-setting');

							//if( item_data[_data_name] ){
							if (item_data.hasOwnProperty(_data_name)) {

								//console.log( _data_name + ' :: ' +  $(this).attr('type') );
								switch ($(this).attr('type')) {

									case 'checkbox':

										//Multicheck
										if ($(this).hasClass('ubermenu-multicheckbox')) {
											//console.log( 'multicheck ' + $(this).parent('label').text() );
											if ($.isArray(item_data[_data_name])) {
												//console.log( 'an array' );
												if (0 <= $.inArray($(this).attr('value'), item_data[_data_name])) {
													//console.log( 'in array - check' );
													$(this).prop('checked', true);
												}
												else {
													//console.log( 'not in array' );
													$(this).prop('checked', false);
												}
											}
											else {
												//console.log( 'not an array - uncheck' );
												$(this).prop('checked', false);
											}
										}
										//Single Check
										else if (item_data[_data_name] == 'on') {
											$(this).prop('checked', true);
										}
										else {
											$(this).prop('checked', false);
										}
										break;

									case 'radio':

										if (item_data[_data_name] == $(this).val()) {
											$(this).prop('checked', true);
											$(this).closest('.ubermenu-menu-item-setting-input-wrap').find('.ubermenu-radio-label').removeClass('ubermenu-radio-label-selected');
											$(this).closest('.ubermenu-radio-label').addClass('ubermenu-radio-label-selected');
										}
										break;

									case 'text':

										$(this).val(item_data[_data_name]);	//the basics;

										//Now check for specific types of settings that use text inputs

										//Media
										if ($(this).hasClass('ubermenu-media-id')) {

											if (item_data.hasOwnProperty(_data_name + '_url')) {
												//console.log( 'media: ' + _data_name );
												$wrap = $(this).closest('.ubermenu-media-wrapper');
												$wrap.find('.media-preview-wrap')
													.html('<img src="' + item_data[_data_name + '_url'] + '" />');
												$wrap.find('.ubermenu-edit-media-button').css('display', 'block')
													.attr('href', item_data[_data_name + '_edit']);

											}
										}
										//Colorpicker
										else if ($(this).hasClass('ubermenu-colorpicker')) {
											//console.log( item_data[_data_name] );
											//$(this).attr( 'data-default-color' , item_data[_data_name] );
											//console.log( 'colorpicker' );
										}
										else if ($(this).hasClass('ubermenu-autocomplete-setting')) {
											var val = $(this).val();
											if (val) {
												if (!isNaN(val)) {
													var txt = $(this).closest('.ubermenu-autocomplete')
														.find('.ubermenu-autocomplete-op[data-val=' + val + '] .ubermenu-autocomplete-op-name')
														.text();
													$(this).prev('.ubermenu-autocomplete-input').val(txt);
												}
											}
										}

										break;


									default:

										//if( $(this).is( 'textarea' ) ){
										//	$(this).
										//}

										$(this).val(item_data[_data_name]);

								}
							}

							switch (_data_name) {

								case 'icon':
									var $icon_wrap = $(this).parents('.ubermenu-icon-settings-wrap'); // Wrapper for this setting
									var $selected_icon_el = $settingswrap.find('.ubermenu-icon-settings-wrap .ubermenu-icon[data-ubermenu-icon="' + item_data.icon + '"]').first();
									// console.log(item_data.icon, $selected_icon_el);
									$icon_wrap.find('.ubermenu-icon-selected .ubermenu-icon').replaceWith($selected_icon_el.clone());
									// if (item_data.icon.includes('::')) {
									// 	var groupandid = item_data.icon.split('::');
									// 	var group_id = groupandid[0];
									// 	var icon_id = groupandid[1];
									// 	console.log(group_id, icon_id);
									// 	switch (group_id) {
									// 		case 'ubermenu-svg':

									// 			break;
									// 		default:

									// 	}

									// }
									// // Old FA System
									// else {
									// 	$icon_wrap.find('.ubermenu-icon-selected i').attr('class', 'ubermenu-icon ' + item_data.icon); //This can stay as an <i> because it isn't processed into an SVG prior to this
									// }
									break;

							}
						});

						//for( _setting in item_data ){
						//console.log( _setting + ' :: ' + item_data[_setting] );
						//}

					}

					//Setup Colorpickers
					$current_panel.find('.ubermenu-colorpicker').wpColorPicker();



					$current_panel.find('.ubermenu-menu-item-tab-content').hide();

					$current_panel.on('click', '.ubermenu-menu-item-tab a', function (e) {
						e.preventDefault();
						e.stopPropagation();
						//console.log( $(this).data('ubermenu-tab') );
						//console.log( $current_panel.find( '[data-ubermenu-tab-content="'+$(this).data('ubermenu-tab') + '"]' ).length );
						//
						$current_panel.find('.ubermenu-menu-item-tab > a').removeClass('ubermenu-menu-item-tab-current');
						$(this).addClass('ubermenu-menu-item-tab-current');
						$current_panel.find('.ubermenu-menu-item-tab-content').slideUp();
						$current_panel.find('[data-ubermenu-tab-content="' + $(this).data('ubermenu-tab') + '"]').slideDown();

						return false;
					});

					$current_panel.find('.ubermenu-menu-item-tab > a').first().trigger('click');

					$settingswrap.append($current_panel);
				}

				//Set Depth
				var cmi_class = $current_menu_item.attr('class');
				var substrstart = cmi_class.indexOf('menu-item-depth-') + 16;
				var depth = cmi_class.substring(substrstart, substrstart + 1);
				$current_panel.attr('data-depth', depth);

				//Hide all other panels
				$settingswrap.find('.ubermenu-menu-item-panel').hide();
				$settingswrap.show();
				$current_panel.fadeIn();

			}

			current_menu_item_id = this_menu_item_id;

			return false;
		});

		//When a setting is changed, set the flag on the settings panel and on the menu item itself
		$settingswrap.on('change', '.ubermenu-menu-item-setting-input', function (e) {

			//Flag Settings Panel
			var $form = $(this).parents('form.ubermenu-menu-item-settings-form');
			$form.find('.ubermenu-menu-item-status').attr('class', 'ubermenu-menu-item-status ubermenu-menu-item-status-warning');
			$form.find('.ubermenu-status-message').html('Settings have changed.  Click <strong>Save Menu Item</strong> to preserve these changes.');

			//Flag Menu Item
			var item_id = $form.parents('.ubermenu-menu-item-panel').data('menu-item-target-id');
			$('#menu-item-' + item_id).addClass('ubermenu-unsaved');
		});

		//Highlight radio selections
		$settingswrap.on('click', '.ubermenu-radio-label', function () {
			$(this).closest('.ubermenu-menu-item-setting-input-wrap').find('.ubermenu-radio-label').removeClass('ubermenu-radio-label-selected');
			$(this).addClass('ubermenu-radio-label-selected');
		});


		//Save Settings Button
		$settingswrap.on('click', '.ubermenu-menu-item-save-button', function (e) {
			e.preventDefault();
			e.stopPropagation();

			var $form = $(this).parents('form.ubermenu-menu-item-settings-form');
			var serialized = $form.serialize();
			//console.log( 'serial: ' + serialized );

			//return;

			var data = {
				action: 'ubermenu_save_menu_item',
				settings: serialized,
				menu_item_id: current_menu_item_id,
				ubermenu_nonce: ubermenu_meta.nonce
			};

			$formStatus = $form.find('.ubermenu-menu-item-status');
			$formStatusMessage = $form.find('.ubermenu-status-message');
			$formStatus.attr('class', 'ubermenu-menu-item-status ubermenu-menu-item-status-working');
			$formStatusMessage.text('Processing save request...');

			$.post(ubermenu_meta.ajax_url, data, function (response) {
				//console.log('Got this from the server: ' , response );
				if (response == -1) {
					$formStatus.attr('class', 'ubermenu-menu-item-status ubermenu-menu-item-status-error');
					$formStatusMessage.html('<strong>Error encountered.  Settings could not be saved.</strong>  Your login/nonce may have expired.  Please try refreshing the page.');
					//console.log( response );
				}
				else {
					//$( '.ubermenu-menu-item-panel-' + response.menu_item_id )
					$formStatus.attr('class', 'ubermenu-menu-item-status ubermenu-menu-item-status-success');
					$formStatusMessage.text('Settings Saved');
					ubermenu_meta.nonce = response.nonce;	//update nonce

					//Remove flag on menu item
					var item_id = $form.parents('.ubermenu-menu-item-panel').data('menu-item-target-id');
					$('#menu-item-' + item_id).removeClass('ubermenu-unsaved');
				}

			}, 'json').fail(function (d) {
				$formStatus.attr('class', 'ubermenu-menu-item-status ubermenu-menu-item-status-error');
				$formStatusMessage.html('<strong>Error encountered.  Settings could not be saved.</strong>  Response Text: <br/><textarea>' + d.responseText + '</textarea>');
				//console.log( d.responseText );
				//console.log( d );
			});

			return false;
		});

		//Close Settings Button
		$settingswrap.on('click', '.ubermenu-menu-item-settings-close', function (e) {
			e.preventDefault();
			e.stopPropagation();

			$settingswrap.removeClass('ubermenu-menu-item-settings-open');
			$('body').removeClass('ubermenu-settings-panel-is-open');
		});

		//Scroll to the menu item when the ID is clicked
		$settingswrap.on('click', '.ubermenu-menu-item-id a, .ubermenu-menu-item-title a', function (e) {
			var $item = $($(this).attr('href'));
			//console.log( $item.offset() );
			var y = $item.offset().top - 50;
			$('html, body').animate({ scrollTop: y }, 'normal');
			return false;
		});

		//Show Icon Selection panel when icon is clicked
		$settingswrap.on('click', '.ubermenu-icon-selected', function (e) {
			// console.log( 'clicked' );
			// console.log( this );
			var $icon_set = $(this).closest('.ubermenu-icon-settings-wrap');
			$icon_set.find('.ubermenu-icons').fadeToggle(100);
			$icon_set.find('.ubermenu-icons-search').trigger('focus');
		});


		//Change selected icon when clicked
		$settingswrap.on('click', '.ubermenu-icon-settings-wrap .ubermenu-icon-wrap', function (e) {
			$icon = $(this).find('.ubermenu-icon'); //The icon that was clicked
			var $icon_set = $(this).closest('.ubermenu-icon-settings-wrap'); //The wrapper for this setting
			var icon_val = $icon.data('ubermenu-icon');
			// if (icon_val.includes('::')) {
			// 	var val_split = icon_val.split('::');
			// 	var group_id = val_split[0];
			// 	var icon_id = val_split[1];
			// 	console.log(group_id, icon_id);
			// 	if( group_id )
			// }


			//console.log( $icon.attr( 'class' ) + ' | ' + $icon.data( 'ubermenu-icon' )  );
			//$icon_set.find( '.ubermenu-icon-selected i' ).attr( 'class' , $icon.attr( 'class' ) ); //TODO

			//Change the SVG's data and Font Awesome will reload it - what about non-SVG or another standard?
			//$icon_set.find( '.ubermenu-icon-selected .ubermenu-icon' ).attr( 'data-prefix' , $icon.attr( 'data-prefix' ) ).attr( 'data-icon' , $icon.attr( 'data-icon' ) );
			// $icon_set.find('.ubermenu-icon-selected .ubermenu-icon').replaceWith('<i class="ubermenu-icon ' + $icon.attr('data-ubermenu-icon') + '"></i>');
			$icon_set.find('.ubermenu-icon-selected .ubermenu-icon').replaceWith($icon.clone());
			$icon_set.find('select').val(icon_val).trigger('change');
			$(this).parents('.ubermenu-icons').fadeOut();
		});

		/* Filter Icons */
		$settingswrap.on('keyup', '.ubermenu-icons-search', function (e) {
			var $icon_set = $(this).closest('.ubermenu-icon-settings-wrap').find('.ubermenu-icon-wrap');
			var val = $(this).val();
			if (val == '') {
				$icon_set.show();
			}
			else {
				$icon_set.filter(':not( [data-ubermenu-search-terms*="' + val + '"] )').hide();
				//console.log( 'not( [data-ubermenu-search-terms*=' +$(this).val().toLowerCase()+ '] )' );
			}
		});


		/* Filtering autocompletes */
		$settingswrap.on('click', '.ubermenu-autocomplete-clear', function (e) {
			var $wrap = $(this).closest('.ubermenu-autocomplete');

			$wrap.find('.ubermenu-menu-item-setting-input')
				.val('')
				.trigger('change');

			//Hide dropdown
			$wrap.find('.ubermenu-autocomplete-ops').hide();

			var $autocomp = $wrap.find('.ubermenu-autocomplete-input');
			$autocomp.val('');
			$autocomp.data('current-id', ''); //$(this).data( 'val' ) );
			$autocomp.data('current-name', ''); //$(this).text() );
			$autocomp.data('auto-set', 'true');
		});
		$settingswrap.on('click', '.ubermenu-autocomplete-toggle', function (e) {
			$(this).closest('.ubermenu-autocomplete').find('.ubermenu-autocomplete-ops').toggle();
		});
		$settingswrap.on('focus', '.ubermenu-autocomplete-input', function (e) {
			$(this).closest('.ubermenu-autocomplete').find('.ubermenu-autocomplete-ops').show();
		});
		$settingswrap.on('blur', '.ubermenu-autocomplete-input', function (e) {
			//console.log( 'blur ' + $(this).data('auto-set' ) + ' :: ' +  $(this).data( 'current-name' ) );

			if ($(this).data('auto-set') == 'true') {
				//$( this ).closest( '.ubermenu-autocomplete' ).find( '.ubermenu-autocomplete-ops' ).hide();
			}
			//If not set, revert val
			else {
				$(this).val($(this).data('current-name'));
			}

		});
		$settingswrap.on('keyup', '.ubermenu-autocomplete-input', function (e) {

			$(this).data('auto-set', 'false');

			$opwrap = $(this).closest('.ubermenu-autocomplete').find('.ubermenu-autocomplete-ops');
			$opwrap.show();

			var val = $(this).val().toLowerCase();
			$ops = $opwrap.find('.ubermenu-autocomplete-op');
			if (val == '') {
				$ops.show();
			}
			else {
				$ops.filter('[data-opname*=' + val + ']').show();
				$ops.filter(':not( [data-opname*=' + val + '] )').hide();
			}

		});
		$settingswrap.on('click', '.ubermenu-autocomplete-op', function (e) {

			//console.log( 'val = ' + $(this).data( 'val' ) );
			var $wrap = $(this).closest('.ubermenu-autocomplete');

			//Change actual setting val
			$wrap.find('.ubermenu-menu-item-setting-input')
				.val($(this).data('val'))
				.trigger('change');

			//Hide dropdown
			$wrap.find('.ubermenu-autocomplete-ops').hide();
		});
		$settingswrap.on('change', '.ubermenu-autocomplete .ubermenu-menu-item-setting-input', function (e) {

			var $wrap = $(this).closest('.ubermenu-autocomplete');

			var id = $(this).val();
			var name = '';

			if (id) {
				var $match = $wrap.find('.ubermenu-autocomplete-op[data-val=' + id + '] .ubermenu-autocomplete-op-name');
				if ($match.length > 0) {
					name = $match.text();
				}
			}

			var $autocomp = $wrap.find('.ubermenu-autocomplete-input');
			$autocomp.val(name);
			$autocomp.data('current-id', id); //$(this).data( 'val' ) );
			$autocomp.data('current-name', name); //$(this).text() );
			$autocomp.data('auto-set', 'true');


		});


		/* Tooltips */
		/*
		$( '[data-um-tooltip]' ).each( function(){
			$(this).append( '<span class="um-tooltip">' + $(this).data( 'um-tooltip' ) + '</span>' );
		});
		*/



		/* Image Selection */
		var file_frame;
		var $wrap;

		$settingswrap.on('click', '.ubermenu-media-wrapper .ubermenu-setting-button', function (event) {

			$wrap = $(this).closest('.ubermenu-media-wrapper');
			event.preventDefault();

			// If the media frame already exists, reopen it.
			if (file_frame) {
				file_frame.open();
				return;
			}

			// Create the media frame.
			file_frame = wp.media.frames.file_frame = wp.media({
				title: jQuery(this).data('uploader-title'),
				button: {
					text: jQuery(this).data('uploader-button-text'),
				},
				multiple: false  // Set to true to allow multiple files to be selected
			});

			// When an image is selected, run a callback.
			file_frame.on('select', function () {
				// We set multiple to false so only get one image from the uploader
				attachment = file_frame.state().get('selection').first().toJSON();

				// Do something with attachment.id and/or attachment.url here
				$wrap.find('.media-preview-wrap').html('<img src="' + attachment.url + '"/>');
				$wrap.find('input.ubermenu-menu-item-setting-input').val(attachment.id).trigger('change');

				//$wrap.find( '.ubermenu-edit-media-button' ).attr( 'href' , attachment.id );
				//wp-admin/post.php?post=274&action=edit
			});

			// Finally, open the modal
			file_frame.open();
		});

		$settingswrap.on('click', '.ubermenu-media-wrapper .ubermenu-remove-button', function (e) {
			var $wrap = $(this).parents('.ubermenu-media-wrapper');
			$wrap.find('.media-preview-wrap').html('');
			$wrap.find('input.ubermenu-menu-item-setting-input').val('').trigger('change');
			return false;
		});


		/* Reset Settings */
		$settingswrap.on('click', '.ubermenu-clear-settings', function (e) {

			//Find the settings panel
			$item_settings = $(this).parents('.ubermenu-menu-item-panel');

			//Get the menu item ID
			var menu_item_id = $item_settings.data('menu-item-target-id');

			//Remove the data that the panel settings are loaded from
			delete ubermenu_menu_item_data[menu_item_id];

			//Remove the settings panel from the DOM
			$item_settings.remove();

			//Close the settings panel
			$settingswrap.removeClass('ubermenu-menu-item-settings-open');
			$('body').removeClass('ubermenu-settings-panel-is-open');

			//Reset the current menu item ID
			current_menu_item_id = false;

			//Re-open the settings
			$('#menu-item-' + menu_item_id).find('.ubermenu-settings-toggle').click();

			//Flag as unsaved
			var $panel = $('.ubermenu-menu-item-panel-menu-item-' + menu_item_id);
			var $form = $panel.find('form.ubermenu-menu-item-settings-form');
			$form.find('.ubermenu-menu-item-status').attr('class', 'ubermenu-menu-item-status ubermenu-menu-item-status-warning');
			$form.find('.ubermenu-status-message').html('Settings have been cleared.  Click <strong>Save Menu Item</strong> to complete setting reset.');

			//Flag Menu Item
			$('#menu-item-' + menu_item_id).addClass('ubermenu-unsaved');


		});

	}

})(jQuery);
