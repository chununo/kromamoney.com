<?php

add_filter( 'ubermenu_menu_item_settings_panels' , 'ubermenu_pro_item_settings_panels' );
function ubermenu_pro_item_settings_panels( $panels ){

	$panels['row'] = array(
		'title'	=> __( 'Row', 'ubermenu' ),
		'icon'	=> 'cog',
		'order'	=> 10,
	);

	$panels['dynamic_terms'] = array(
		'title'	=> __( 'Dynamic Terms', 'ubermenu' ),
		'icon'	=> 'sitemap',	//bolt // magic
		'info'	=> __( 'Filter settings for the terms to be displayed.  Dynamic items can only be placed in a submenu.' , 'ubermenu' ),
		'order'	=> 20,
	);

	$panels['dynamic_posts'] = array(
		'title'	=> __( 'Dynamic Posts', 'ubermenu' ),
		'icon'	=> 'sitemap',	//bolt // magic
		'info'	=> __( 'Filter settings for the posts to be displayed.  Dynamic items can only be placed in a submenu.' , 'ubermenu' ),
		'order'	=> 30,
	);



	$panels['tabs'] = array(
		'title'	=> __( 'Tabs', 'ubermenu' ),
		'icon'	=> 'columns',
		'info'	=> __( 'This is a wrapper item, which does not produce any content on its own.  Add child items to this Tabs item to create the Tab Toggles.  Add child items to those Toggles to create the Content Panels that are revealed when those toggles are activated.' , 'ubermenu' ),
		'order'	=> 40,
	);

	$panels['menu_segment'] = array(
		'title'	=> __( 'Menu Segment', 'ubermenu' ),
		'icon'	=> 'paperclip',
		'order'	=> 50,
		'warning' => __( 'Make sure not to nest a menu segment within the same menu, or you\'ll create an infinite recursion' , 'ubermenu' ),
	);

	//General

	$panels['icon']	= array(
		'title'	=> __( 'Icon' , 'ubermenu' ),
		'icon'	=> 'plus-circle',
		'order'	=> 110,
	);

	$panels['image'] = array(
		'title'	=> __( 'Image', 'ubermenu' ),
		'icon'	=> 'image',
		'info'	=> __( 'Set an image for this menu item and control its size' , 'ubermenu' ),
		'order'	=> 120
	);

	$panels['badge'] = array(
		'title' => __( 'Badge', 'ubermenu' ),
		'icon' => 'certificate',
		'order' => 125,
	);


	//Layout


	//Submenu

	$panels['custom_content'] = array(
		'title'	=> __( 'Custom Content' , 'ubermenu' ),
		'icon'	=> 'cogs',
		'order'	=> 160,
	);
	$panels['custom_content_layout'] = array(
		'title'	=> __( 'Layout' , 'ubermenu' ),
		'icon'	=> 'columns',
		'order'	=> 170,
	);

	$panels['widgets'] = array(
		'title'	=> __( 'Widgets' , 'ubermenu' ),
		'icon'	=> 'puzzle-piece',
		'info'	=> __( 'Insert a widget area into your menu item.  The content of the Widget Area (widgets) are added via the standard WordPress Widgets Panel' , 'ubermenu' ),
		'tip'	=> __( 'Choose either the Custom Widget Area or Reusable Widget Area setting, but not both' , 'ubermenu' ),
		'warning'	=> __( 'Remember, if you want a widget to appear in a submenu, it should be attached to a submenu item, not a top level item.' , 'ubermenu' ),
		'order'	=> 180,
	);

	$panels['widget_layout'] = array(
		'title'	=> __( 'Layout' , 'ubermenu' ),
		'icon'	=> 'columns',
		'order'	=> 190,
	);

	$panels['customize'] = array(
		'title'	=> __( 'Customize Style', 'ubermenu' ),
		'icon'	=> 'eye', //'pencil',
		'info'	=> __( 'Set the styles for this specific menu item.' , 'ubermenu' ),
		'tip'	=> __( 'To style the menu more generally, visit the ' , 'ubermenu' ) . ' <a target="_blank" href="'.admin_url( 'customize.php' ). '">Customizer</a>',
		'order'	=> 200,
	);

	$panels['customize_column'] = array(
		'title'	=> __( 'Customize Style', 'ubermenu' ),
		'icon'	=> 'eye', //'pencil',
		'info'	=> __( 'Set the styles for this specific column.' , 'ubermenu' ),
		'tip'	=> __( 'To style the menu more generally, visit the ' , 'ubermenu' ) . ' <a target="_blank" href="'.admin_url( 'customize.php' ). '">Customizer</a>',
		'order'	=> 201,
	);

	$panels['responsive'] = array(
		'title'	=> __( 'Responsive', 'ubermenu' ),
		'icon'	=> 'mobile-alt',
		'info'	=> __( 'Control the display of this item (and its children) on mobile vs. desktop.', 'ubermenu' ),
		'order'	=> 210,
	);

	//Deprecated

	return $panels;
}



add_filter( 'ubermenu_menu_item_settings_panels_map' , 'ubermenu_pro_item_settings_panels_map' );
function ubermenu_pro_item_settings_panels_map( $map ){

	foreach( $map as $id => $panels ){


	}

	return $map;
}


add_filter( 'ubermenu_menu_item_settings' , 'ubermenu_pro_item_settings' );
function ubermenu_pro_item_settings( $settings ){

	$column_ops = ubermenu_get_item_column_ops();
	$admin_img_assets = UBERMENU_URL . 'admin/assets/images/';


	/** DYNAMIC POSTS **/
	$settings['dynamic_posts'][10] = array(
		'id'	=> 'dp_posts_per_page',
		'title'	=> __( 'Limit' , 'ubermenu' ),
		'desc'	=> __( 'Maximum number of posts to return.  Set to -1 for unlimited.', 'ubermenu' ),
		'type'	=> 'text',
		'default' => -1,
	);


	$settings['dynamic_posts'][20] = array(
		'id'	=> 'dp_post_type',
		'title'	=> __( 'Post Type' , 'ubermenu' ),
		'desc'	=> __( 'Type of posts to return.', 'ubermenu' ),
		'type'	=> 'multicheck',
		'default' => array( 'post' , 'page' ), // '_all_on',	//can also take array of enabled
		'ops'	=> 'ubermenu_get_post_type_ops',
	);

	$settings['dynamic_posts'][30] = array(
		'id'	=> 'dp_category',
		'title'	=> __( 'Category' , 'ubermenu' ),
		'desc'	=> __( 'The category to return posts from.  To inherit from a parent, it must be a Category taxonomy menu item, or a Dynamic Term Item that has returned a Category.', 'ubermenu' ),
		'type'	=> 'autocomplete',
		'default' => '', // '_all_on',	//can also take array of enabled
		'ops'	=> 'ubermenu_dp_category_ops',
		'tip'	=> __( 'For performance purposes, the number of autocomplete results is limited to 100 by default.  You can adjust this in the UberMenu Control Panel > General Settings > Advanced Menu Items, or just enter the ID in the ID field.', 'ubermenu' ),
	);

	$settings['dynamic_posts'][40] = array(
		'id'	=> 'dp_tag',
		'title'	=> __( 'Tag' , 'ubermenu' ),
		'desc'	=> __( 'The tag to return posts from.  To inherit from a parent, it must be a Tag taxonomy menu item, or a Dynamic Term Item that has returned a Tag.', 'ubermenu' ),
		'type'	=> 'autocomplete',
		'default' => '', // '_all_on',	//can also take array of enabled
		'ops'	=> 'ubermenu_dp_tag_ops',
		'tip'	=> __( 'For performance purposes, the number of autocomplete results is limited to 100 by default.  You can adjust this in the UberMenu Control Panel > General Settings > Advanced Menu Items, or just enter the ID in the ID field.', 'ubermenu' ),
	);

	$taxonomies = get_taxonomies( array(
		'public'	=> true,
		'_builtin'	=> false,
		) , 'objects' );

	$taxonomies = apply_filters( 'ubermenu_dp_custom_taxonomies' , $taxonomies );

	$taxonomy_weight = 41;

	//If we have more than 500 taxonomies, we'll move this to the end so we don't get index collisions
	if( count( $taxonomies ) > 500 ){
		$taxonomy_weight = 2000;
	}

	foreach( $taxonomies as $tax_id => $tax ){
		$settings['dynamic_posts'][$taxonomy_weight++] = array(
			'id'	=> 'dp_'.$tax_id,
			'title'	=> $tax->labels->singular_name . '<br/><small>[' . $tax_id . ']</small>',
			'desc'	=> __( 'Custom taxonomy slug', 'ubermenu' ) . ': <strong>' . $tax_id.'</strong>',
			'type'	=> 'autocomplete',
			'default' 	=> '', // '_all_on',	//can also take array of enabled
			'ops'		=> 'ubermenu_dp_custom_tax_ops',
			'ops_args' 	=> array(
						'tax_id'	=> $tax_id,
						'tax'		=> $tax,
					),
			'tip' 	=> __( 'For performance purposes, the number of autocomplete results is limited to 100 by default.  You can adjust this in the UberMenu Control Panel > General Settings > Advanced Menu Items, or just enter the ID in the ID field.', 'ubermenu' ),
		);

	}


	//Boost from 70 to 570 to allow up to 530 custom taxonomies
	$settings['dynamic_posts'][570] = array(
		'id'	=> 'dp_post_parent',
		'title'	=> __( 'Parent Post' , 'ubermenu' ),
		'desc'	=> __( 'Display children of this post from the post hierarchy.', 'ubermenu' ),
		'type'	=> 'autocomplete',
		'default' => '', // '_all_on',	//can also take array of enabled
		'ops'	=> 'ubermenu_dp_post_parent_ops',
		'tip'	=> __( 'For performance purposes, the number of autocomplete results is limited to 100 by default.  You can adjust this in the UberMenu Control Panel > General Settings > Advanced Menu Items, or just enter the ID in the ID field.', 'ubermenu' ),
	);


	$settings['dynamic_posts'][580] = array(
		'id'	=> 'dp_author',
		'title'	=> __( 'Post Author' , 'ubermenu' ),
		'desc'	=> __( 'Display posts by a specific author.  Check none to query all authors.', 'ubermenu' ),
		'type'	=> 'multicheck',
		'default' => '', // '_all_on',	//can also take array of enabled
		'ops'	=> 'ubermenu_get_author_ops',
	);


	//Exclude
	$settings['dynamic_posts'][585] = array(
		'id'	=> 'dp_exclude',
		'title'	=> __( 'Exclude' , 'ubermenu' ),
		'desc'	=> __( 'Comma separated list of post IDs to exclude.  For example, <em>25,67,152</em>', 'ubermenu' ),
		'type'	=> 'text',
		'default' => '',
	);



	$settings['dynamic_posts'][600] = array(
		'id'	=> 'dp_orderby',
		'title'	=> __( 'Sort by' , 'ubermenu' ),
		'desc'	=> __( 'Choose how to sort your post results', 'ubermenu' ),
		'type'	=> 'radio',
		'default' => 'title',
		'ops'	=> array(
			'group'	=> array(
				'ID'	=> array(
					'name'	=> __( 'Post ID', 'ubermenu' ),
				),
				'author'	=> array(
					'name'	=> __( 'Author', 'ubermenu' ),
				),
				'title'	=> array(
					'name'	=> __( 'Post Title', 'ubermenu' ),
				),
				'name'	=> array(
					'name'	=> __( 'Post Slug', 'ubermenu' ),
				),
				'date'	=> array(
					'name'	=> __( 'Publish Date', 'ubermenu' ),
				),
				'modified'	=> array(
					'name'	=> __( 'Last Modified Date', 'ubermenu' ),
				),
				'parent'	=> array(
					'name'	=> __( 'Parent', 'ubermenu' ),
				),
				'comment_count'	=> array(
					'name'	=> __( 'Comment Count', 'ubermenu' ),
				),
				'menu_order'	=> array(
					'name'	=> __( 'Page Order', 'ubermenu' ),
				),
				'none'	=> array(
					'name'	=> __( 'None', 'ubermenu' ),
				),
			)
		),

	);


	$settings['dynamic_posts'][610] = array(
		'id'	=> 'dp_order',
		'title'	=> __( 'Sort' , 'ubermenu' ),
		'desc'	=> __( 'Sort your items in normal order (ascending 1-10, A-Z) or reverse order (descending 10-1, Z-A)', 'ubermenu' ),
		'type'	=> 'radio',
		'default' => 'ASC',
		'ops'	=> array(
			'group'	=> array(
				'ASC'	=> array(
					'name'	=> __( 'Ascending', 'ubermenu' ),
				),
				'DESC'	=> array(
					'name'	=> __( 'Descending' , 'ubermenu' ),
				),
			)
		),

	);



	$settings['dynamic_posts'][620] = array(
		'id'	=> 'dp_autocolumns',
		'title'	=> __( 'Automatic Columns' , 'ubermenu' ),
		'desc'	=> __( 'Automatically divide posts evenly across columns.', 'ubermenu' ),
		'type'	=> 'radio',
		'ops'	=> array( 'group' => array(
			'disabled'	=> array(
				'name'	=> __( 'Disabled' , 'ubermenu' ),
			),
			1 	=> 1,
			2 	=> 2,
			3 	=> 3,
			4 	=> 4,
			5 	=> 5,
			6 	=> 6,
			7 	=> 7,
			8 	=> 8,
			9 	=> 9,
			10 	=> 10
		)),
		'default' => 'disabled',
	);


	$settings['dynamic_posts'][630] = array(
		'id'	=> 'dp_subcontent',
		'title'	=> __( 'Dynamic Subcontent' , 'ubermenu' ),
		'desc'	=> __( 'Subcontent will appear below the Dynamic Post title' , 'ubermenu' ),
		'type'	=> 'radio',
		'type_class'=> 'ubermenu-radio-blocks',
		'ops'	=> 'ubermenu_get_dp_subcontent_ops',
		'default'	=> 'none',
	);


	$settings['dynamic_posts'][631] = array(
		'id'	=> 'dp_view_all',
		'title'	=> __( 'View All Link' , 'ubermenu' ),
		'desc'	=> __( 'Include a View All Link for the term based on this taxonomy.  (You must have selected a term above for this taxonomy)' , 'ubermenu' ),
		'type'	=> 'select',
		//'type_class'=> 'ubermenu-radio-blocks',
		'ops'	=> 'ubermenu_get_dp_view_all_ops',
		'default'	=> 'none',
	);

	$settings['dynamic_posts'][632] = array(
		'id'	=> 'dp_view_all_text',
		'title'	=> __( 'View All Link Text' , 'ubermenu' ),
		'desc'	=> __( 'If you are using a View All Link, you can override the default text here' , 'ubermenu' ),
		'type'	=> 'text',
		'default'	=> '',
	);


	$settings['dynamic_posts'][635] = array(
		'id'	=> 'empty_results_message',
		'title'	=> __( 'Empty Results Message' , 'ubermenu' ),
		'desc'	=> __( 'Optional message to display to users if there are 0 results returned from your query' , 'ubermenu' ),
		'type'	=> 'text',
		'default'	=> '',
	);
	$settings['dynamic_posts'][636] = array(
		'id'	=> 'dp_ignore_empty_results',
		'title'	=> __( 'Ignore Empty Results' , 'ubermenu' ),
		'desc'	=> __( 'If enabled, no "No Results Found" admin notice will be generated.' , 'ubermenu' ),
		'type'	=> 'checkbox',
		'default'	=> 'off',
	);

	//NOTE: 2000+ is reserved for custom taxonomies




	/** DYNAMIC TERMS **/

	$settings['dynamic_terms'][10] = array(
		'id'	=> 'dt_taxonomy',
		'title'	=> __( 'Taxonomy' , 'ubermenu' ),
		'desc'	=> __( 'Check the taxonomies to pull terms from.  If you do not check any taxonomies, no terms will be displayed.  Hover over the taxonomy label to see the slug.', 'ubermenu' ),
		'type'	=> 'multicheck',
		'default' => '', //ubermenu_get_taxonomies(), // '_all_on',	//can also take array of enabled
		'ops'	=> 'ubermenu_get_taxonomy_ops',

	);

	//Number

	$settings['dynamic_terms'][20] = array(
		'id'	=> 'dt_number',
		'title'	=> __( 'Number' , 'ubermenu' ),
		'desc'	=> __( 'The maximum number of terms to display.  Blank for unlimited.', 'ubermenu' ),
		'type'	=> 'text',
		'default' => '',
	);

	//Parent -- include 'Item Parent'

	$settings['dynamic_terms'][30] = array(
		'id'	=> 'dt_parent',
		'title'	=> __( 'Parent Term' , 'ubermenu' ),
		'desc'	=> __( 'Select a term from the dropdown to use as a parent term.  Display direct children of this term only.' , 'ubermenu' ),
		'type'	=> 'autocomplete',
		'default' => '',
		'ops'	=> 'ubermenu_dt_parent_ops',
		'tip'	=> __( 'For performance purposes, the number of autocomplete results is limited to 100 by default.  You can adjust this in the UberMenu Control Panel > General Settings > Advanced Menu Items, or just enter the ID in the ID field.', 'ubermenu' ),
	);

	//Child of
	$settings['dynamic_terms'][40] = array(
		'id'	=> 'dt_child_of',
		'title'	=> __( 'Ancestor Term' , 'ubermenu' ),
		'desc'	=> __( 'Select a term from the dropdown to use as an ancestor term.  All descendants of this term well be displayed (child_of).  Overridden if Parent is set.' , 'ubermenu' ),
		'type'	=> 'autocomplete',
		'default' => '',
		'ops'	=> 'ubermenu_dt_child_of_ops',
		'tip'	=> __( 'For performance purposes, the number of autocomplete results is limited to 100 by default.  You can adjust this in the UberMenu Control Panel > General Settings > Advanced Menu Items, or just enter the ID in the ID field.', 'ubermenu' ),
	);

	//Exclude
	$settings['dynamic_terms'][45] = array(
		'id'	=> 'dt_exclude',
		'title'	=> __( 'Exclude' , 'ubermenu' ),
		'desc'	=> __( 'Comma separated list of term IDs to exclude.  For example, <em>25,67,152</em>', 'ubermenu' ),
		'type'	=> 'text',
		'default' => '',
	);

	//Exclude Tree
	// $settings['dynamic_terms'][46] = array(
	// 	'id'	=> 'dt_exclude_tree',
	// 	'title'	=> __( 'Exclude Tree' , 'ubermenu' ),
	// 	'desc'	=> __( 'Comma separated list of term IDs to exclude.  All descendants (subcategories) of these terms will also be excluded.  For example, <em>25,67,152</em>', 'ubermenu' ),
	// 	'type'	=> 'text',
	// 	'default' => '',
	// );


	//Sort
	$settings['dynamic_terms'][50] = array(
		'id'	=> 'dt_orderby',
		'title'	=> __( 'Sort by' , 'ubermenu' ),
		'desc'	=> __( 'Choose how to sort your terms results.', 'ubermenu' ),
		'type'	=> 'radio',
		'default' => 'name',
		'ops'	=> array(
			'group'	=> array(
				'id'	=> array(
					'name'	=> __( 'Term ID', 'ubermenu' ),
				),
				'count'	=> array(
					'name'	=> __( 'Count', 'ubermenu' ),
				),
				'name'	=> array(
					'name'	=> __( 'Term Name', 'ubermenu' ),
				),
				'slug'	=> array(
					'name'	=> __( 'Term Slug', 'ubermenu' ),
				),
				// 'term_order' => array(
				// 	'name'	=> __( 'Term Order' , 'ubermenu' ),
				// ),
				'meta_term_order' => array(
					'name' => __( 'Meta - Order (e.g. WooCommerce Product Categories)', 'ubermenu' ),
				),
				'none'	=> array(
					'name'	=> __( 'None', 'ubermenu' ),
				),
			)
		),

	);


	$settings['dynamic_terms'][60] = array(
		'id'	=> 'dt_order',
		'title'	=> __( 'Sort' , 'ubermenu' ),
		'desc'	=> __( 'Sort your items in normal order (ascending 1-10, A-Z) or reverse order (descending 10-1, Z-A)', 'ubermenu' ),
		'type'	=> 'radio',
		'default' => 'ASC',
		'ops'	=> array(
			'group'	=> array(
				'ASC'	=> array(
					'name'	=> __( 'Ascending', 'ubermenu' ),
				),
				'DESC'	=> array(
					'name'	=> __( 'Descending' , 'ubermenu' ),
				),
			)
		),

	);

	//Hide Empty
	$settings['dynamic_terms'][80] = array(
		'id'	=> 'dt_hide_empty',
		'title'	=> __( 'Hide Empty' , 'ubermenu' ),
		'desc'	=> __( 'Do not display terms that don\'t have any associated posts', 'ubermenu' ),
		'type'	=> 'checkbox',
		'default' => 'off',
	);


	//Hierarchical

	$settings['dynamic_terms'][90] = array(
		'id'	=> 'dt_hierarchical',
		'title'	=> __( 'Hierarchical' , 'ubermenu' ),
		'desc'	=> __( 'Display terms that have non-empty descendants (even if Hide Empty is enabled).', 'ubermenu' ),
		'type'	=> 'checkbox',
		'default' => 'on',
	);



	$settings['dynamic_terms'][100] = array(
		'id'	=> 'dt_autocolumns',
		'title'	=> __( 'Automatic Columns' , 'ubermenu' ),
		'desc'	=> __( 'Automatically divide terms evenly across columns.', 'ubermenu' ),
		'type'	=> 'radio',
		'ops'	=> array( 'group' => array(
			'disabled'	=> array(
				'name'	=> __( 'Disabled' , 'ubermenu' ),
			),
			1 	=> 1,
			2 	=> 2,
			3 	=> 3,
			4 	=> 4,
			5 	=> 5,
			6 	=> 6,
			7 	=> 7,
			8 	=> 8,
			9 	=> 9,
			10 	=> 10
		)),
		'default' => 'disabled',
	);


	$settings['dynamic_terms'][120] = array(
		'id'	=> 'dt_display_term_counts',
		'title'	=> __( 'Display Term Counts' , 'ubermenu' ),
		'desc'	=> __( 'Display the number of posts with this term after the term name.' , 'ubermenu' ),
		'type'	=> 'checkbox',
		'default' => 'off',
	);

	$settings['dynamic_terms'][125] = array(
		'id'	=> 'dt_display_term_description',
		'title'	=> __( 'Display Term Descriptions' , 'ubermenu' ),
		'desc'	=> __( 'Display the description for each term (set in the term edit screen).' , 'ubermenu' ),
		'type'	=> 'checkbox',
		'default' => 'off',
	);





	$settings['dynamic_terms'][131] = array(
		'id'	=> 'dt_view_all',
		'title'	=> __( 'View All Link' , 'ubermenu' ),
		'desc'	=> __( 'Include a View All Link for the term based on this taxonomy.  (You must have selected a parent or child term above for this taxonomy)' , 'ubermenu' ),
		'type'	=> 'select',
		//'type_class'=> 'ubermenu-radio-blocks',
		'ops'	=> 'ubermenu_get_dp_view_all_ops',
		'default'	=> 'none',
	);

	$settings['dynamic_terms'][132] = array(
		'id'	=> 'dt_view_all_text',
		'title'	=> __( 'View All Link Text' , 'ubermenu' ),
		'desc'	=> __( 'If you are using a View All Link, you can override the default text here' , 'ubermenu' ),
		'type'	=> 'text',
		'default'	=> '',
	);

	$settings['dynamic_terms'][135] = array(
		'id'	=> 'empty_results_message',
		'title'	=> __( 'Empty Results Message' , 'ubermenu' ),
		'desc'	=> __( 'Optional message to display to users if there are 0 results returned from your query' , 'ubermenu' ),
		'type'	=> 'text',
		'default'	=> '',
	);

	$settings['dynamic_terms'][136] = array(
		'id'	=> 'dt_ignore_empty_results',
		'title'	=> __( 'Ignore Empty Results' , 'ubermenu' ),
		'desc'	=> __( 'If enabled, no "No Results Found" admin notice will be generated.' , 'ubermenu' ),
		'type'	=> 'checkbox',
		'default'	=> 'off',
	);





	/** WIDGETS **/

	$settings['widgets'][10] = array(
		'id' 		=> 'auto_widget_area',
		'title'		=> __( 'Custom Widget Area' , 'ubermenu' ),
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( 'Enter a name for your Widget Area, and a widget area specifically for this menu item will be automatically be created in the ' , 'ubermenu' ) . '<a target="_blank" href="'.admin_url('widgets.php').'">'.__( 'Widgets Screen' , 'ubermenu' ).'</a>',
		'tip'		=> __( 'This is generally the simplest way to add widgets, assuming you don\'t intend to reuse this widget area' , 'ubermenu' ),
		'on_save'	=> 'create_auto_widget_area'
	);

	$settings['widgets'][20] = array(
		'id' 		=> 'widget_area',
		'title'		=> __( 'Reusable Widget Area' , 'ubermenu' ),
		'type'		=> 'select',
		'default' 	=> '',
		'ops'		=> 'ubermenu_get_widget_area_ops',
		'desc'		=> '<ul class="ubermenu-desc-list"><li>'.__( 'Select a reusable widget area to display in this menu item.  This will be overridden if you use the "Custom Widget Area" setting and assign a widget to it.' , 'ubermenu' ). ' </li>' .
						'<li>'.__( 'Create reusable widget areas via the ' , 'ubermenu' ) . '<a target="_blank" href="'.admin_url('themes.php?page=ubermenu-settings#ubermenu_general').'">UberMenu Control Panel</a>. </li>' .
						'<li>'.__( 'Assign widgets via the ' , 'ubermenu' ) . '<a target="_blank" href="'.admin_url('widgets.php').'">'.__( 'Widgets Screen' , 'ubermenu' ).'</a> </li>'.
						'</ul>',
	);

	$settings['widgets'][30] = array(
		'id' 		=> 'widget_area_columns',
		'title'		=> __( 'Widget Area Columns', 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'auto',
		'desc'		=> __( 'Automatic will divide the widgets into even columns.  So 5 widgets will produce 5 columns.' , 'ubermenu' ),
		'ops'		=> array(
			'group'	=> array(
				'auto'	=> array(
					'name' => __( 'Automatic' , 'ubermenu' ),
				),
				1 		=> array( 'name' => 1 ),
				2 		=> array( 'name' => 2 ),
				3 		=> array( 'name' => 3 ),
				4 		=> array( 'name' => 4 ),
				5 		=> array( 'name' => 5 ),
				6 		=> array( 'name' => 6 ),
				7 		=> array( 'name' => 7 ),
				8 		=> array( 'name' => 8 ),
				9 		=> array( 'name' => 9 ),
				10 		=> array( 'name' => 10 ),

			),
		),
	);

	/** WIDGET LAYOUT **/
	$settings['widget_layout'][10] = array(
		'id' 		=> 'columns',
		'title'		=> __( 'Columns Width', 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'auto',
		'desc'		=> __( 'This is the fraction of the submenu width that the widget area will occupy.  Auto will be full width by default.' , 'ubermenu' ),
		'ops'		=> $column_ops
	);


	$settings['widget_layout'][30] = array(
		'id' 		=> 'item_align',
		'title'		=> __( 'Alignment', 'ubermenu' ),
		'type'		=> 'select',
		'default' 	=> 'auto',
		'desc'		=> __( 'Alignment of this menu item within the menu bar' , 'ubermenu' ),
		'ops'		=> array(
			'auto'	=> __( 'Automatic' , 'ubermenu' ),
			'left'	=> __( 'Left' , 'ubermenu' ),
			'right'	=> __( 'Right', 'ubermenu' ),
		),
		'scenario'	=> __( 'Top Level Menu Items' , 'ubermenu' ),

	);






	/** ROW (core) **/






	/** GENERAL **/

	$settings['general'][30] = array(
		'id' 		=> 'item_align',
		'title'		=> __( 'Alignment', 'ubermenu' ),
		'type'		=> 'select',
		'default' 	=> 'auto',
		'desc'		=> __( 'Alignment of this menu item within the menu bar' , 'ubermenu' ),
		'ops'		=> array(
			'auto'	=> __( 'Automatic' , 'ubermenu' ),
			'left'	=> __( 'Left' , 'ubermenu' ),
			'right'	=> __( 'Right', 'ubermenu' ),
		),
		'scenario'	=> __( 'Top Level Menu Items' , 'ubermenu' ),

	);

	$settings['general'][35] = array(
		'id' 		=> 'mini_item',
		'title'		=> __( 'Mini Item', 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Makes the item narrower padding-wise than other items.  Useful for grouping icons.' , 'ubermenu' ),
		'scenario'	=> __( 'Top Level Menu Items' , 'ubermenu' ),
	);

	/*
	$settings['general'][40] = array(
		'id' 		=> 'button',
		'title'		=> __( 'Button Link', 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'off',
		'desc'		=> __( '', 'ubermenu' ),
		'ops'		=> ubermenu_get_item_button_ops()
	);
	*/

	$settings['general'][45] = array(
		'id' 		=> 'custom_url',
		'title'		=> 'Custom URL Override',
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( 'Override this item\'s URL.  Shortcodes in this field will be processed.' , 'ubermenu' ),
	);

	$settings['general'][50] = array(
		'id' 		=> 'scrollto',
		'title'		=> 'Scroll To',
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( 'The selector for an item to scroll to when clicked, if present.  Example: <code>#section-1</code>' , 'ubermenu' ),
	);

	$settings['general'][60] = array(
		'id' 		=> 'no_wrap',
		'title'		=> 'Don\'t wrap title/label text',
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Prevent the text from wrapping to a new line.' , 'ubermenu' ),
	);

	$settings['general'][70] = array(
		'id' 		=> 'item_trigger',
		'title'		=> __( 'Trigger Override', 'ubermenu' ),
		'type'		=> 'select',
		'default' 	=> 'auto',
		'desc'		=> __( 'Switch to something other than "Automatic" to trigger this item\'s submenu differently from other items.  The default Trigger for the menu can be configured in the Menu Settings.' , 'ubermenu' ),
		'ops'		=> array(
			'auto'	=> __( 'Automatic' , 'ubermenu' ),
			'hover'	=> __( 'Hover' , 'ubermenu' ),
			'hover_intent'	=> __( 'Hover Intent' , 'ubermenu' ),
			'click'	=> __( 'Click', 'ubermenu' ),
		),

	);

	$settings['general'][80] = array(
		'id' 		=> 'disable_submenu_indicator',
		'title'		=> __( 'Disable Submenu Indicator (Arrow)', 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Useful for items like a search dropdown.' , 'ubermenu' ),
	);

	$settings['general'][85] = array(
		'id' 		=> 'disable_current',
		'title'		=> __( 'Disable Current', 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Disable the current menu item classes for this item' , 'ubermenu' ),
	);

	$settings['general'][90] = array(
		'id' 		=> 'target_class',
		'title'		=> 'Anchor Class',
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( 'A class to be applied to the target/anchor/span element.' , 'ubermenu' ),
	);


	$settings['general'][100] = array(
		'id' 		=> 'target_id',
		'title'		=> 'Anchor ID',
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( 'An ID to be applied to the target/anchor/span element.' , 'ubermenu' ),
	);


	$settings['general'][110] = array(
		'id'		=> 'shiftnav_target',
		'title'		=> __( 'ShiftNav Toggle' , 'ubermenu' ),
		'type'		=> 'select',
		'ops'		=> 'ubermenu_get_shiftnav_instances',
		'default'	=> '',
		'desc'		=> __( 'Toggle a ShiftNav instance when clicking this item.  Note this will disable any other click functionality, including following this link.  Requires the ShiftNav plugin.  Learn more about ' , 'ubermenu' ) . '<a href="http://shiftnav.io" target="_blank">ShiftNav</a>',
	);



	/** ICONS **/
	$icon_desc = __( 'Select a font icon to use with this item.' , 'ubermenu' );
	if( !class_exists( 'UberMenu_Icons' ) ){
		$icon_desc.= ' '.__( 'This set of icons contains over 50 of the most commonly used icons.  Get over 500 Font Awesome Icons and the ability to independently change colors, icon sizes, and positions with the ', 'ubermenu' ). '<a target="_blank" href="http://wpmegamenu.com/icons">UberMenu Icons Extension</a>';
	}
	$settings['icon'][10] = array(
		'id' 		=> 'icon',
		'title'		=> __( 'Icon', 'ubermenu' ),
		'type'		=> 'icon',
		'default' 	=> '',
		'desc'		=> $icon_desc,
		'ops'		=> 'ubermenu_get_icon_ops'
	);
	$settings['icon'][11] = array(
		'id' 		=> 'icon_title',
		'title'		=> __( 'Icon Title', 'ubermenu' ),
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( 'This setting is for accessibility.  If your icon is purely decorative, leave this blank.  If your icon is semantic - especially if it is not accompanied by other text - it is important to set this field for screen readers.' , 'ubermenu' ),
	);

	/*
	$settings['icon'][20] = array(
		'id' 		=> 'icon_width',
		'title'		=> 'Icon Width',
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( '', 'Leave blank to use the default icon width' ),
	);
	*/





	/** LAYOUTS **/





	/** IMAGES **/


	$settings['image'][10] = array(
		'id'		=> 'item_image',
		'title'		=> __( 'Image' , 'ubermenu' ),
		'desc'		=> __( 'Click "Select" to upload or choose a new image.  Click "Remove" to remove the image.  Click "Edit" to edit the currently selected image. For Dynamic Posts, this image is the optional fallback for when a Post does not have a featured image.' , 'ubermenu' ),
		'type'		=> 'media',
		'default'	=> '',

	);

	$settings['image'][15] = array(
		'id'		=> 'inherit_featured_image',
		'title'		=> __( 'Inherit Featured Image' , 'ubermenu' ),
		'desc'		=> __( 'For Post Menu Items, automatically inherit the Post\'s featured image for this item.' , 'ubermenu' ),
		'type'		=> 'radio',
		'type_class'=> 'ubermenu-radio-blocks',
		'ops'		=> array(
			'group'	=> array(
				'off'	=> array(
					'name'	=> __( 'Disabled' , 'ubermenu' ),
					'desc'	=> __( 'Do not inherit the image' , 'ubermenu' )
				),
				'cache'	=> array(
					'name'	=> __( 'Assign Featured Image on Save' , 'ubermenu' ),
					'desc'	=> __( '[More efficient] When this item is saved, the current featured image from the post will be assigned.  It will not be updated until you save this item again.', 'ubermenu' )
				),
				'on'	=> array(
					'name'	=> __( 'Dynamically Inherit' , 'ubermenu' ),
					'desc'	=> __( '[Less efficient] Each time the menu item is displayed, dynamically find the item\'s featured image.' , 'ubermenu' )
				),
			)
		),
		'default'	=> 'off',
		'scenario'	=> __( 'Page/Post Menu Items' , 'ubermenu' ),
		'on_save'	=> 'inherit_featured_image',

	);

	$settings['image'][20] = array(
		'id'		=> 'image_size',
		'title'		=> __( 'Image Size' , 'ubermenu' ),
		'type'		=> 'radio',
		'type_class'=> 'ubermenu-radio-blocks',
		'default'	=> 'inherit',
		'ops'		=> 'ubermenu_get_image_size_ops',
		'desc'		=> __( 'This is the size of the actual file that will be served.  You can choose from any registered image size in your setup.  You can set a default to be inherited globally in the Control Panel.' , 'ubermenu' ),
	);


	$settings['image'][30] = array(
		'id'		=> 'image_dimensions',
		'title'		=> __( 'Image Dimensions' , 'ubermenu' ),
		'type'		=> 'radio',
		'type_class'=> 'ubermenu-radio-blocks',
		'default'	=> 'inherit',
		'ops'		=> array(
			'group'	=> array(
				'inherit'	=> array(
					'name'	=> __( 'Inherit' , 'ubermenu' ),
					'desc'	=> __( 'Inherit settings from the menu instance settings' , 'ubermenu' )
				),
				'natural'	=> array(
					'name'	=> __( 'Natural' , 'ubermenu' ),
					'desc'	=> __( 'Display image at natural dimensions' , 'ubermenu' )
				),
				'custom'	=> array(
					'name'	=> __( 'Custom' , 'ubermenu' ),
					'desc'	=> __( 'Use a custom size, defined below' )
				),
			)
		),
		'on_save'	=> 'image_dimensions',
	);

	$settings['image'][40] = array(
		'id'		=> 'image_width_custom',
		'title'		=> __( 'Custom Image Width' , 'ubermenu' ),
		'desc'		=> __( 'Image width attribute (px).  Do not include units.  Only valid if "Image Dimensions" is set to "Custom" above.' , 'ubermenu' ),
		'type'		=> 'text',
		'default'	=> '',
		'on_save'	=> 'image_width_custom',
	);

	$settings['image'][50] = array(
		'id'		=> 'image_height_custom',
		'title'		=> __( 'Custom Image Height' , 'ubermenu' ),
		'desc'		=> __( 'Image height attribute (px).  Do not include units.  Only valid if "Image Dimensions" is set to "Custom" above.  Leave blank to maintain aspect ratio.' , 'ubermenu' ),
		'type'		=> 'text',
		'default'	=> '',
	);

	$settings['image'][55] = array(
		'id'		=> 'image_text_top_padding',
		'title'		=> __( 'Image Text Top Padding' , 'ubermenu' ),
		'desc'		=> __( 'The top padding for the accompanying text when Image Left or Image Right layouts are displayed.  This allows control over the vertical alignment of the text relative to the image.', 'ubermenu' ),
		'type'		=> 'text',
		'default'	=> '',
		'on_save'	=> 'image_text_top_padding',
	);

	$settings['image'][60] = array(
		'id'		=> 'disable_padding',
		'title'		=> __( 'Disable Item Padding' , 'ubermenu' ),
		'desc'		=> __( 'Disable the padding on this item.  Useful for image-only menu items where the image should extend to the extents of the item.' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default'	=> 'off',
	);




	$settings['badge'][10] = array(
		'id' 		=> 'badge_content',
		'title'		=> __( 'Badge Content', 'ubermenu' ),
		'type'		=> 'textarea',
		'default' 	=> '',
		'desc'		=> __( 'HTML content to appear within the Badge.  Can contain shortcodes.' , 'ubermenu' ),
	);

	$settings['badge'][20] = array(
		'id' 		=> 'badge_position',
		'title'		=> __( 'Badge Position', 'ubermenu' ),
		'type'		=> 'radio',
		'ops'	=> array(
			'group'	=> array(
				'inline'	=> array(
					'name'	=> __( 'Inline', 'ubermenu' ),
				),
				'inline-absolute'	=> array(
					'name'	=> __( 'Inline (Absolute)', 'ubermenu' ),
				),
				'raised'	=> array(
					'name'	=> __( 'Raised', 'ubermenu' ),
				),
				'raised-absolute'	=> array(
					'name'	=> __( 'Raised (Absolute)', 'ubermenu' ),
				),
				'topright' => array(
					'name' => __( 'Top Right Corner (Absolute)', 'ubermenu' ),
				),
				'topleft' => array(
					'name' => __( 'Top Left Corner (Absolute)', 'ubermenu' ),
				),
				'bottomright' => array(
					'name' => __( 'Bottom Right Corner (Absolute)', 'ubermenu' ),
				),
				'bottomleft' => array(
					'name' => __( 'Bottom Left Corner (Absolute)', 'ubermenu' ),
				),
			)
		),
		'default' 	=> 'inline',
		'desc'		=> __( 'Where the badge should be positioned within the target (link).  Absolute positions do not take up space in the layout and may overlap other content.' , 'ubermenu' ),
	);

	$settings['badge'][30] = array(
		'id' 		=> 'badge_background_color',
		'title'		=> __( 'Badge Background Color', 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> __( 'The background color for this badge', 'ubermenu' ),
		'on_save'	=> 'badge_background_color'
	);

	$settings['badge'][40] = array(
		'id' 		=> 'badge_text_color',
		'title'		=> __( 'Badge Text Color', 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> __( 'The text color for this badge', 'ubermenu' ),
		'on_save'	=> 'badge_text_color'
	);




	/** RESPONSIVE **/

	$settings['responsive'][10]	= array(
		'id'		=> 'hide_on_mobile',
		'title'		=> __( 'Hide below breakpoint' , 'ubermenu' ),
		'desc'		=> __( 'Hides this item below the responsive breakpoint via CSS.' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default'	=> 'off',
	);

	$settings['responsive'][20]	= array(
		'id'		=> 'hide_on_desktop',
		'title'		=> __( 'Hide above breakpoint' , 'ubermenu' ),
		'desc'		=> __( 'Hides this item above the responsive breakpoint via CSS.' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default'	=> 'off',
	);

	$settings['responsive'][30]	= array(
		'id'		=> 'disable_on_mobile',
		'title'		=> __( 'Disable on mobile' , 'ubermenu' ),
		'desc'		=> __( 'Removes this item when mobile device is detected via wp_is_mobile().' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default'	=> 'off',
		'tip'		=> __( 'Please note that if you are using server-side caching, you will need to configure it properly to support a separate mobile cache for this setting to work' , 'ubermenu' ),
	);

	$settings['responsive'][40]	= array(
		'id'		=> 'disable_on_desktop',
		'title'		=> __( 'Disable on desktop' , 'ubermenu' ),
		'desc'		=> __( 'Removes this item when mobile device is NOT detected via wp_is_mobile().' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default'	=> 'off',
		'tip'		=> __( 'Please note that if you are using server-side caching, you will need to configure it properly to support a separate mobile cache for this setting to work' , 'ubermenu' ),
	);

	$settings['responsive'][50]	= array(
		'id'		=> 'disable_submenu_on_mobile',
		'title'		=> __( 'Disable submenu on mobile' , 'ubermenu' ),
		'desc'		=> __( 'Removes this item\'s submenu when mobile device is detected via wp_is_mobile().' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default'	=> 'off',
		'tip'		=> __( 'Please note that if you are using server-side caching, you will need to configure it properly to support a separate mobile cache for this setting to work' , 'ubermenu' ),
	);






	/** SUBMENU **/

	$settings['submenu'][65] = array(
		'id'		=> 'submenu_autocolumns',
		'title'		=> __( 'Submenu Automatic Columns' , 'ubermenu' ),
		'desc'		=> __( 'Automatically divide posts evenly across columns, organized vertically - top to bottom.  Useful for creating columns without headers when all submenu items are second level items.  Leave this disabled if you are using Column Headers (second and third level items), or if you want to use uneven columns, in which case you can use advanced [Column] items to organize your menu.', 'ubermenu' ),
		'tip'		=> __( 'How does this differ from "Submenu Column Default"? If you set "Submenu Automatic Columns" to 5, it\'ll create 5 even submenu columns and automatically divide the child items of this item into those columns, organized top to bottom.  If you set "Submenu Column Default" to 1/5, each child item will be 20% (1/5) of the submenu width and be organized left to right.  In practice, you\'d use "Submenu Automtic Columns" for submenus without column headers, and the "Submenu Column Default" setting for submenus with column headers', 'ubermenu' ),
		'type'		=> 'radio',
		'ops'		=> array( 'group' => array(
						'disabled'	=> array(
							'name'	=> __( 'Disabled' , 'ubermenu' ),
						),
						1 	=> 1,
						2 	=> 2,
						3 	=> 3,
						4 	=> 4,
						5 	=> 5,
						6 	=> 6,
						7 	=> 7,
						8 	=> 8,
						9 	=> 9,
						10 	=> 10
					)),
		'default' => 'disabled',

	);

	$settings['submenu'][67] = array(
		'id' 		=> 'submenu_item_layout',
		'title'		=> __( 'Submenu Item Layout', 'ubermenu' ),
		'type'		=> 'radio',
		'type_class'=> 'ubermenu-radio-blocks',
		'default' 	=> 'default',
		'desc'		=> __( 'This will set the default Item Layout for any children of this item.  Useful if all your children will be uniform in layout.' , 'ubermenu' ),
		'ops'		=> 'ubermenu_get_item_layout_ops'
	);

	$settings['submenu'][68] = array(
		'id' 		=> 'submenu_item_content_alignment',
		'title'		=> __( 'Submenu Item Content Alignment', 'ubermenu' ),
		'type'		=> 'radio',
		'scenario'	=> 'Vertically stacked layouts',
		'default' 	=> 'default',
		'desc'		=> __( 'This setting can be inherited by children of this item for the "Item Content Alignment" setting.  For example, setting this to "Center" will allow you to have a centered image stacked above the title on your submenu items when used in conjunction with the "Image Above" item layout' , 'ubermenu' ),
		'ops'		=> array(
			'group'	=> array(
				'default'	=> array(
					'name' 	=> __( 'Default' , 'ubermenu' ),
				),
				'left'		=> array(
					'name' 	=> __( 'Left' , 'ubermenu' ),
				),
				'center'		=> array(
					'name' 	=> __( 'Center' , 'ubermenu' ),
				),
				'right'		=> array(
					'name' 	=> __( 'Right' , 'ubermenu' ),
				),
			),
		),
	);

	$settings['submenu'][70] = array(
		'id'		=> 'submenu_column_dividers',
		'title'		=> __( 'Submenu Columns Dividers' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> __( 'The color of the border between each submenu column.  Note this only affects columns that are children of this item, not further descendants', 'ubermenu' ),
		'scenario'	=> __( 'Mega Submenu' , 'ubermenu' ),
		'tip'		=> __( 'You will likely want to set a Minimum Height below as well.' , 'ubermenu' ),
		'on_save'	=> 'submenu_column_divider_color'
	);
	$settings['submenu'][71] = array(
		'id'		=> 'submenu_column_min_height',
		'title'		=> __( 'Submenu Columns Minimum Height' , 'ubermenu' ),
		'type'		=> 'text',
		'default'	=> '',
		'desc'		=> __( 'Useful when using the Submenu Columns Dividers setting', 'ubermenu' ),
		'scenario'	=> __( 'Mega Submenu' , 'ubermenu' ),
		'on_save'	=> 'submenu_column_min_height'
	);

	$settings['submenu'][75] = array(
		'id' 		=> 'submenu_grid',
		'title'		=> __( 'Grid Submenu' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'scenario'	=> __( 'Mega Submenus' , 'ubermenu' ),
		'desc'		=> __( 'Useful for image grids.  Makes the space between the targets equal to the space on the submenu edges.' , 'ubermenu' ),
	);

	$settings['submenu'][90] = array(
		'id' 		=> 'show_current',
		'title'		=> __( 'Show submenu when current' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Show this submenu on page load by default when its parent is current.  Only relevant for submenu types that are hidden by default.' , 'ubermenu' ),
	);

	$settings['submenu'][95] = array(
		'id' 		=> 'show_default',
		'title'		=> __( 'Show submenu by default' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Show this submenu on page load by default on every page.  Only relevant for submenu types that are hidden by default.' , 'ubermenu' ),
	);


	$settings['submenu'][100] = array(
		'id' 		=> 'submenu_background_image',
		'title'		=> __( 'Submenu Background Image' , 'ubermenu' ),
		'type'		=> 'media',
		'default' 	=> '',
		'desc'		=> __( '' , 'ubermenu' ),
		'on_save'	=> 'submenu_background_image',
		'scenario'	=> __( 'Mega Submenus' , 'ubermenu' ),
	);

	$settings['submenu'][110] = array(
		'id' 		=> 'submenu_background_image_repeat',
		'title'		=> __( 'Repeat Background Image' , 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'no-repeat',
		'ops'		=> array(
			'group'	=> array(
				'no-repeat'	=> array(
					'name'	=> __( 'No Repeat' , 'ubermenu' ),
				),
				'repeat'	=> array(
					'name'	=> __( 'Repeat' , 'ubermenu' ),
				),
				'repeat-x'	=> array(
					'name'	=> __( 'Repeat X (Horizontal)' , 'ubermenu' ),
				),
				'repeat-y'	=> array(
					'name'	=> __( 'Repeat Y (Vertical)' , 'ubermenu' ),
				),
				'space'	=> array(
					'name'	=> __( 'Space' , 'ubermenu' ),
				),
				'round'	=> array(
					'name'	=> __( 'Round' , 'ubermenu' ),
				),

			),
		),
		'desc'		=> __( '' , 'ubermenu' ),
	);

	$settings['submenu'][120] = array(
		'id' 		=> 'submenu_background_position',
		'title'		=> __( 'Background Position' , 'ubermenu' ),
		'type'		=> 'text',
		'default' 	=> 'bottom right',
		'desc'		=> __( '' , 'ubermenu' ),
	);

	$settings['submenu'][130] = array(
		'id' 		=> 'submenu_background_size',
		'title'		=> __( 'Background Size' , 'ubermenu' ),
		'type'		=> 'text',
		'default' 	=> 'auto',
		'desc'		=> __( 'Try "cover" to cover the entire submenu.' , 'ubermenu' ),
	);

	$settings['submenu'][140] = array(
		'id' 		=> 'submenu_padding',
		'title'		=> __( 'Submenu Padding' , 'ubermenu' ),
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> '<code>0 0 50px 0</code> '.__( 'would add 50px of padding to the bottom of the submenu.' , 'ubermenu' ),
		'on_save'	=> 'submenu_padding',
		'scenario'	=> __( 'Mega Submenus' , 'ubermenu' ),
	);

	$settings['submenu'][150] = array(
		'id' 		=> 'submenu_footer_content',
		'title'		=> __( 'Submenu Footer Content' , 'ubermenu' ),
		'type'		=> 'textarea',
		'default' 	=> '',
		'desc'		=> __( 'Add HTML to the footer of the menu.' , 'ubermenu' ),
		'scenario'	=> __( 'Mega Submenus' , 'ubermenu' ),
	);

	/*
	$settings['submenu'][140] = array(
		'id' 		=> 'submenu_footer_content_align',
		'title'		=> __( 'Background Size' , 'ubermenu' ),
		'type'		=> 'text',
		'default' 	=> 'auto',
		'desc'		=> __( '' , 'ubermenu' ),
	);
	*/




	/** TABS **/

	$settings['tabs'][10] = array(
		'id'		=> 'tab_layout',
		'title'		=> __( 'Tab Layout', 'ubermenu' ),
		'type'		=> 'radio',
		'type_class'=> 'ubermenu-radio-blocks',
		'default'	=> 'left',
		'ops'		=> array(
						'group'	=> array(
							'left'	=> array(
								'name'	=> __( 'Left' , 'ubermenu' ),
								'img'	=> $admin_img_assets.'Tabs_left.png',
								'desc'	=> __( 'Tabs on the left, content panels on the right' , 'ubermenu' ),
							),
							'right'	=> array(
								'name'	=> __( 'Right' , 'ubermenu' ),
								'img'	=> $admin_img_assets.'Tabs_right.png',
								'desc'	=> __( 'Tabs on the right, content panels on the left' , 'ubermenu' ),
							),
							'top'	=> array(
								'name'	=> __( 'Top' , 'ubermenu' ),
								'img'	=> $admin_img_assets.'Tabs_top.png',
								'desc'	=> __( 'Tabs on the top, content panels on the bottom' , 'ubermenu' ),
							),
							'bottom'	=> array(
								'name'	=> __( 'Bottom' , 'ubermenu' ),
								'img'	=> $admin_img_assets.'Tabs_bottom.png',
								'desc'	=> __( 'Tabs on the bottom, content panels on the top' , 'ubermenu' ),
							),
						)
		),


	);

	$settings['tabs'][15] = array(
		'id' 		=> 'tab_block_columns',
		'title'		=> __( 'Tab Block Width', 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'full',
		'desc'		=> __( 'This is the width of the whole tab block.  In the majority of cases, you will leave this set to "Full Width"' , 'ubermenu' ),
		'ops'		=> $column_ops,
		'cue'		=> '<img src="'.$admin_img_assets.'TabsDiagram_block.png" />',
	);

	$settings['tabs'][20] = array(
		'id' 		=> 'tabs_group_layout',
		'title'		=> __( 'Tabs Toggles Layout Width', 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'auto',
		'desc'		=> __( 'The width of the tab toggles within the tab block.  If using Tab Layouts "Top" or "Bottom", set this to Full.' , 'ubermenu' ),
		'ops'		=> $column_ops,
		'tip'		=> __( 'If your Tab Layout is Left or Right, you\'ll want this to complement your Panels Layout Width.  If your Tab Layout is Top or Bottom, you\'ll want this to be set to Full', 'ubermenu' ),
		'cue'		=> '<img src="'.$admin_img_assets.'TabsDiagram_tabs.png" /> '.
						'<img src="'.$admin_img_assets.'TabsDiagram_tabs_top.png" />',
	);

	$settings['tabs'][30] = array(
		'id' 		=> 'panels_group_layout',
		'title'		=> __( 'Panels Layout Width' , 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'auto',
		'desc'		=> __( 'The width of the content panels within the tab block.   If using Tab Layouts "Top" or "Bottom", set this to Full.' , 'ubermenu' ),
		'ops'		=> $column_ops,
		'tip'		=> __( 'If your Tab Layout is Left or Right, you\'ll want this to complement your Tabs Toggles Layout Width.  If your Tab Layout is Top or Bottom, you\'ll want this to be set to Full', 'ubermenu' ),
		'cue'		=> '<img src="'.$admin_img_assets.'TabsDiagram_panels.png" /> '.
						'<img src="'.$admin_img_assets.'TabsDiagram_panels_bottom.png" />',
	);

	$settings['tabs'][33] = array(
		'id' 		=> 'submenu_column_default',
		'title'		=> __( 'Panels Columns Default' , 'ubermenu' ),
		'type'		=> 'radio',
		'default'	=> 'auto',
		'desc'		=> __( 'The number of columns per row that the content panel should be broken into by default.  Can be overridden on individual items', 'ubermenu' ),
		'ops'		=> $column_ops,
	);



	$settings['tabs'][34] = array(
		'id' 		=> 'panels_grid',
		'title'		=> __( 'Grid Panels' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Useful for image grids in the Tab Content Panel.  Makes the space between the targets equal to the space on the content panel edges.' , 'ubermenu' ),
	);

	$settings['tabs'][35] = array(
		'id' 		=> 'panels_padding',
		'title'		=> __( 'Panel Padding' , 'ubermenu' ),
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( 'Add padding to panels.  Useful if you need to make the spacing at the edges of a row equal to that between the columns (by doubling it).' , 'ubermenu' ),
		'on_save'	=> 'panels_padding',
	);

	/*
	$settings['tabs'][35] = array(
		'id' 		=> 'panels_padded',
		'title'		=> __( 'Pad Panels' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Add padding to panels (doubles the edge gutters).  Useful if you need to make the spacing at the edges of a row equal to that between the columns.' , 'ubermenu' ),
	);
	*/


	$settings['tabs'][40] = array(
		'id' 		=> 'show_default_panel',
		'title'		=> __( 'Show Default Panel' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'on',
		'desc'		=> __( 'Show the first tab\'s panel by default.  Otherwise a blank area will display.' , 'ubermenu' ),
	);
	$settings['tabs'][41] = array(
		'id' 		=> 'show_current_panel',
		'title'		=> __( 'Show Current Panel' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'on',
		'desc'		=> __( 'If there is a current item in the tabs block, display that panel by default.' , 'ubermenu' ),
	);

	$settings['tabs'][50] = array(
		'id' 		=> 'tabs_trigger',
		'title'		=> __( 'Trigger' , 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'mouseover',
		'desc'		=> __( 'You can override the standard trigger which is set in the Control Panel for this set of tabs.' , 'ubermenu' ),
		'ops'		=> array(
			'group'	=> array(
				'auto'		=> array(
					'name'	=> __( 'Automatic' , 'ubermenu' ),
				),
				'mouseover'	=> array(
					'name'	=> __( 'Hover' , 'ubermenu' ),
				),
				'click'	=> array(
					'name'	=> __( 'Click' , 'ubermenu' ),
				),
			)
		),
	);

	$settings['tabs'][60] = array(
		'id' 		=> 'dynamic_panel_sizing',
		'title'		=> __( 'Dynamic Panel Sizing (Experimental)' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'By default, all content panels within the tabs block will be given the height of the tallest tab.  Enable this setting to instead dynamically resize the tabs block to the height of the open tab panel.  Not intended for use on nested tabs.' , 'ubermenu' ),
	);
	$settings['tabs'][62] = array(
		'id' 		=> 'dynamic_panel_animation',
		'title'		=> __( 'Dynamic Panel Animation (Experimental)' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default' 	=> 'off',
		'desc'		=> __( 'Smoothly transition between tab content panel heights when using Dynamic Panel Sizing.' , 'ubermenu' ),
	);



	/** MENU SEGMENT **/

	$settings['menu_segment'][10] = array(
		'id'		=> 'menu_segment',
		'title'		=> __( 'Menu', 'ubermenu' ),
		'type'		=> 'select',
		'ops'		=> 'ubermenu_get_nav_menu_ops',
		'default'	=> '',
		'desc'		=> __( 'Select a menu to insert its items into the menu tree.' , 'ubermenu' ),

	);

	$settings['menu_segment'][15] = array(
		'id'		=> 'submenu_autocolumns',
		'title'		=> __( 'Automatic Columns' , 'ubermenu' ),
		'desc'		=> __( 'Automatically divide the first level of items in this menu segment evenly across columns, organized vertically - top to bottom.  Note that the Column Submenu Default can be inherited through Menu Segments from their parents, but this setting must be set on the Menu Segment.', 'ubermenu' ),
		//'tip'		=> __( 'How does this differ from "Submenu Column Default"? If you set "Submenu Automatic Columns" to 5, it\'ll create 5 even submenu columns and automatically divide the child items of this item into those columns, organized top to bottom.  If you set "Submenu Column Default" to 1/5, each child item will be 20% (1/5) of the submenu width and be organized left to right.  In practice, you\'d use "Submenu Automtic Columns" for submenus without column headers, and the "Submenu Column Default" setting for submenus with column headers', 'ubermenu' ),
		'type'		=> 'radio',
		'ops'		=> array( 'group' => array(
						'disabled'	=> array(
							'name'	=> __( 'Disabled' , 'ubermenu' ),
						),
						1 	=> 1,
						2 	=> 2,
						3 	=> 3,
						4 	=> 4,
						5 	=> 5,
						6 	=> 6,
						7 	=> 7,
						8 	=> 8,
						9 	=> 9,
						10 	=> 10
					)),
		'default' => 'disabled',

	);
	$settings['menu_segment'][20] = array(
		'id'		=> 'segment_transient_cache',
		'title'		=> __( 'Cache Segment (Experimental)', 'ubermenu' ),
		'type'		=> 'checkbox',
		'default'	=> 'off',
		'desc'		=> __( 'Cache this menu segment via transients.  Note that saving this menu item will flush the cache and the segment will be rebuilt the next time the menu is generated.' , 'ubermenu' ),
	);
	$settings['menu_segment'][30] = array(
		'id'		=> 'segment_transient_cache_expiry',
		'title'		=> __( 'Cache Expiration', 'ubermenu' ),
		'type'		=> 'text',
		'default'	=> '',
		'desc'		=> __( '(Hours) How long until the transient expires and the cache refreshes.  Defaults to 12 hours.' , 'ubermenu' ),
	);





	/** CUSTOM CONTENT **/

	$settings['custom_content'][10] = array(
		'id'		=> 'custom_content',
		'title'		=> __( 'Custom Content' , 'ubermenu' ),
		'type'		=> 'textarea',
		'default'	=> '',
		'desc'		=> __( 'Can contain HTML and shortcodes', 'ubermenu' ),
	);


	$settings['custom_content'][20] = array(
		'id'		=> 'pad_custom_content',
		'title'		=> __( 'Pad Custom Content' , 'ubermenu' ),
		'type'		=> 'checkbox',
		'default'	=> 'on',
		'desc'		=> __( 'Pad the content area so that it aligns similarly to other menu items', 'ubermenu' ),
	);

	$settings['custom_content'][30] = array(
		'id' 		=> 'custom_content_class',
		'title'		=> 'Custom Class',
		'type'		=> 'text',
		'default' 	=> '',
		'desc'		=> __( 'A class to be applied to the custom content wrapper.' , 'ubermenu' ),
	);



	/** CUSTOM CONTENT LAYOUT **/
	$settings['custom_content_layout'][10] = array(
		'id' 		=> 'columns',
		'title'		=> __( 'Columns Width', 'ubermenu' ),
		'type'		=> 'radio',
		'default' 	=> 'auto',
		'desc'		=> __( 'This is the fraction of the submenu width that the custom content area will occupy.' , 'ubermenu' ),
		'ops'		=> $column_ops
	);

	$settings['custom_content_layout'][30] = array(
		'id' 		=> 'item_align',
		'title'		=> __( 'Alignment', 'ubermenu' ),
		'type'		=> 'select',
		'default' 	=> 'auto',
		'desc'		=> __( 'Alignment of this menu item within the menu bar' , 'ubermenu' ),
		'ops'		=> array(
			'auto'	=> __( 'Automatic' , 'ubermenu' ),
			'left'	=> __( 'Left' , 'ubermenu' ),
			'right'	=> __( 'Right', 'ubermenu' ),
		),
		'scenario'	=> __( 'Top Level Menu Items' , 'ubermenu' ),

	);









	/** CUSTOMIZE **/

	$settings['customize'][10] = array(
		'id'		=> 'background_color',
		'title'		=> __( 'Background Color' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'background_color'

	);

	$settings['customize'][20] = array(
		'id'		=> 'font_color',
		'title'		=> __( 'Font Color' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'font_color'

	);

	$settings['customize'][25] = array(
		'id'		=> 'background_color_active',
		'title'		=> __( 'Background Color [Active]' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'background_color_active'

	);

	$settings['customize'][30] = array(
		'id'		=> 'font_color_active',
		'title'		=> __( 'Font Color [Active]' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'font_color_active'

	);

	$settings['customize'][35] = array(
		'id'		=> 'background_color_current',
		'title'		=> __( 'Background Color [Current]' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'background_color_current'

	);

	$settings['customize'][40] = array(
		'id'		=> 'font_color_current',
		'title'		=> __( 'Font Color [Current]' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'font_color_current'

	);

	$settings['customize'][50] = array(
		'id'		=> 'padding',
		'title'		=> __( 'Padding' , 'ubermenu' ),
		'type'		=> 'text',
		'default'	=> '',
		'desc'		=> __( 'Set the padding for this specific item' , 'ubermenu' ),
		'on_save'	=> 'padding'

	);

	$settings['customize'][60] = array(
		'id'		=> 'submenu_background_color',
		'title'		=> __( 'Submenu Background Color' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'submenu_background_color'

	);

	$settings['customize'][70] = array(
		'id'		=> 'submenu_color',
		'title'		=> __( 'Submenu Font Color' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'submenu_color'

	);

	$settings['customize'][80] = array(
		'id'		=> 'column_background_color',
		'title'		=> __( 'Column Background Color' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> 'Specific to Column Header items which surround a column',
		'on_save'	=> 'column_background_color'
	);


	/** CUSTOMIZE COLUMN **/

	$settings['customize_column'][10] = array(
		'id'		=> 'column_background_color',
		'title'		=> __( 'Background Color' , 'ubermenu' ),
		'type'		=> 'color',
		'default'	=> '',
		'desc'		=> '',
		'on_save'	=> 'column_background_color'
	);





	return $settings;

}

function ubermenu_get_dp_subcontent_ops(){
	$ops = array(
			'standard'	=> array(
				'none'	=> array(
					'name'	=> __( 'None' , 'ubermenu' ),
					'desc'	=> __( 'Dynamic subcontent disabled' , 'ubermenu' ),
				),
				'date' => array(
					'name'	=> __( 'Date' , 'ubermenu' ),
					'desc'	=> __( 'Display the post date.' , 'ubermenu' ),
				),
				'author' => array(
					'name'	=> __( 'Author' , 'ubermenu' ),
					'desc'	=> __( 'Display the post author.' , 'ubermenu' ),
				),
				'excerpt' => array(
					'name'	=> __( 'Excerpt' , 'ubermenu' ),
					'desc'	=> __( 'Display the excerpt from the post.  You must manually enter your excerpt on the Post page, it will not be generated automatically.' , 'ubermenu' ),
				),
				'custom'	=> array(
					'name'	=> __( 'Custom' , 'ubermenu' ),
					'desc'	=> __( 'Write a custom filter - ubermenu_dp_subcontent' , 'ubermenu' ),
				),
			),
		);
	return $ops;

	//return apply_filters( 'ubermenu_dp_subcontent_ops' , $ops );
}

function ubermenu_get_dp_view_all_ops(){
	$ops = array(
		'none'		=> __( 'None' , 'ubermenu' ),
		'category'	=> __( 'Category' , 'ubermenu' ),
		'tag'		=> __( 'Tag' , 'ubermenu' ),
	);

	$taxonomies = get_taxonomies( array(
		'public'	=> true,
		'_builtin'	=> false,
		) , 'objects' );

	$taxonomies = apply_filters( 'ubermenu_dp_custom_taxonomies' , $taxonomies );

	foreach( $taxonomies as $tax_id => $tax ){
		$ops[$tax_id] = $tax->labels->singular_name;
		// $settings['dynamic_posts'][$taxonomy_weight++] = array(
		// 	'id'	=> 'dp_'.$tax_id,
		// 	'title'	=> $tax->labels->singular_name . '<br/><small>[' . $tax_id . ']</small>',
		// 	'desc'	=> __( 'Custom taxonomy slug', 'ubermenu' ) . ': <strong>' . $tax_id.'</strong>',
		// 	'type'	=> 'autocomplete',
		// 	'default' 	=> '', // '_all_on',	//can also take array of enabled
		// 	'ops'		=> 'ubermenu_dp_custom_tax_ops',
		// 	'ops_args' 	=> array(
		// 				'tax_id'	=> $tax_id,
		// 				'tax'		=> $tax,
		// 			),
		// 	'tip' 	=> __( 'For performance purposes, the number of autocomplete results is limited to 100 by default.  You can adjust this in the UberMenu Control Panel > General Settings > Advanced Menu Items, or just enter the ID in the ID field.', 'ubermenu' ),
		// );
	}

	return $ops;

}


//Pro Layouts
function ubermenu_pro_item_layout_ops( $ops ){

	$admin_img_assets = UBERMENU_URL . 'admin/assets/images/';

	$ops['images']	= array(
		'group_title'	=> __( 'Image Layouts', 'ubermenu' ),

		'image_left' => array(
			'name'	=> __( 'Image Left', 'ubermenu' ),
			'img'	=> $admin_img_assets.'ItemLayout_ImageLeft.png',
		),
		'image_right' => array(
			'name' => __( 'Image Right', 'ubermenu' ),
			'img'	=> $admin_img_assets.'ItemLayout_ImageRight.png',
		),
		'image_above' => array(
			'name' => __( 'Image Above', 'ubermenu' ),
			'img'	=> $admin_img_assets.'ItemLayout_ImageAbove.png',
		),
		'image_below' => array(
			'name' => __( 'Image Below', 'ubermenu' ),
			'img'	=> $admin_img_assets.'ItemLayout_ImageBelow.png',
		),
		'image_only' => array(
			'name' => 'Image Only',
			'img'	=> $admin_img_assets.'ItemLayout_ImageOnly.png',
		),

	);

	return $ops;
}
add_filter( 'ubermenu_item_layout_ops' , 'ubermenu_pro_item_layout_ops' );



function ubermenu_get_shiftnav_instances(){

	$all = array(
		''				=> 'None (Disabled)',
		'shiftnav-main' => 'Main'
	);
	$menus = get_option( 'shiftnav_menus' , array() );
	foreach( $menus as $m ){
		$all[$m] = '+'.$m;
	}
	return $all;
}
