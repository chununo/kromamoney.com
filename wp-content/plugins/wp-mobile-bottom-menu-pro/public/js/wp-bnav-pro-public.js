(function( $ ) {
	'use strict';
	let main_wrapper = $('.bnav_bottom_nav_wrapper'),
	search_dom = $('.bnav_sub_menu_search'),
	sub_menu_placeholder = $('.bnav_sub_menu_wrapper'),
	main_menu_overlay = $('.bnav_main_menu_overlay'),
	bnav_main_menu_container = $('.bnav_main_menu_container'),
	coloned_sub_menu = $('.bnav_sub_menu_wrapper .sub-menu.show');

	$('.bnav_bottom_nav_wrapper > .bnav_main_menu_container ul li a').click(function (e) {

		let children_exist = $(this).parent().find('ul.sub-menu');

		if(children_exist.length > 0) {
			e.preventDefault();
		}

		$('.bnav_overlay_close_all').show();

		let menu_name = $(this).text();
		let filtered_menu_name = menu_name.toLowerCase().replaceAll(' ', '');

		sub_menu_placeholder.empty();

		if(sub_menu_placeholder.children('ul.'+filtered_menu_name).length > 0) {
			$('.bnav_sub_menu_wrapper ul.'+filtered_menu_name).remove();
			search_dom.fadeOut();
		} else {
			if (!search_dom.hasClass( "bnav_search_hide" )) {
				search_dom.fadeIn();
			}
			handle_megamenu($(this), filtered_menu_name);
			let sub_menu = $(this).parent().children('ul');
			sub_menu.addClass('show');
			sub_menu.addClass(filtered_menu_name);
			sub_menu.clone().appendTo(".bnav_sub_menu_wrapper");
			coloned_sub_menu.slideUp();
		}
	});

	let parent_class = [];

	$(document).on('click', '.bnav_sub_menu_wrapper ul li a', (function (e) {
		let children_exist = $(this).parent().find('ul.sub-menu');
		// e.preventDefault();

		let menu_name = $(this).text();
		let filtered_menu_name = menu_name.toLowerCase().replaceAll(' ', '');

		if(children_exist.length > 0) {
			e.preventDefault();
		}

		if(sub_menu_placeholder.children('ul.'+filtered_menu_name).length > 0) {
			let parents_classes = $(this).parents('.bnav_sub_menu_wrapper').find('ul.'+filtered_menu_name);
			let total_dom = parents_classes.length;
			for(let i = 0; i < parents_classes.length; i++) {
				if(i === total_dom - 1) {
					let delete_class_array = parents_classes[i].className.split(' ');
					const namesToDeleteSet = new Set(delete_class_array);
					const newArr = parent_class.filter((name) => {
						return !namesToDeleteSet.has(name);
					});
					parent_class = newArr;
					$(this).parents('.bnav_sub_menu_wrapper').find('ul.'+filtered_menu_name).remove();
				}

			}
		}else {
			handle_megamenu($(this), filtered_menu_name);
			let sub_menu = $(this).parent().children('ul');
			sub_menu.clone().appendTo(".bnav_sub_menu_wrapper").addClass(filtered_menu_name + ' bnav_child_sub_menu '+ parent_class.join(' ')).fadeIn('slow');
			$('.bnav_sub_menu_wrapper .sub-menu.bnav_child_menu').slideDown();

			if(children_exist.length > 0) {
				parent_class = [...parent_class, filtered_menu_name];
			}
		}
	}));

	// Search focus functionality
	$('.bnav_sub_menu_search input').focus(function () {
		$('.bnav_main_menu_container').fadeOut();
		$(this).parent().removeClass('input_focused');
		$(this).parent().addClass('input_focused');
	});

	$('.bnav_search_toggle').on('click', function (e) {
		e.preventDefault();
		$('.bnav_sub_menu_search').fadeIn();
	});

	// Remove sub menu from placeholder
	$(document).on('click', '.bnav_main_menu_overlay', function () {
		sub_menu_placeholder.empty();
		search_dom.fadeOut();
		main_menu_overlay.fadeOut();
		$(this).fadeOut();
		parent_class = [];
	});

	// Manage megamenu
	function handle_megamenu($this, filtered_menu_name) {
		console.log($this.children('ul.bnav_mega_menu_wrapper.sub-menu').length > 0);

		if($this.children('ul.bnav_mega_menu_wrapper.sub-menu').length > 0) {
			$this.children('ul.bnav_mega_menu_wrapper.sub-menu').clone().appendTo(".bnav_sub_menu_wrapper").addClass(filtered_menu_name + ' bnav_child_sub_menu '+ parent_class.join(' ')).fadeIn('slow');
			$('.bnav_sub_menu_wrapper .sub-menu.bnav_child_menu').slideDown();
		}
	}

	$('.bnav_overlay_close_all').click( function() {
		$('.bnav_search_input').removeClass('input_focused');
		$('.bnav_main_menu_container').fadeIn();
		sub_menu_placeholder.empty();
		search_dom.fadeOut();
		main_menu_overlay.fadeOut();
		parent_class = [];
		$(this).hide();
	});

})( jQuery );
