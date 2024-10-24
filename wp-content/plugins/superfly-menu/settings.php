<?php

add_action( 'admin_init', 'sf_register_settings' );

/* Extension: Toolbar */
    include_once( dirname(__FILE__) . '/extensions/toolbar.php' );
/* /Extension: Toolbar */

$ext = function_exists('sf_extension_toolbar_settings');

function sf_register_settings() {
    $options = sf_get_options();
    $behaviour_vis = $options['sf_sidebar_style'] === 'side' || $options['sf_sidebar_style'] === 'skew' ? false : true;
    $skew_vis = $options['sf_sidebar_style'] !== 'skew';
    $btn_hidden = $options['sf_label_vis'] == 'no';
    $fade_full_hidden = $options['sf_sidebar_style'] === 'full' ? false : true;
    $opening_type_hidden = $options['sf_sidebar_style'] === 'toollbar' || $options['sf_sidebar_behaviour'] === '' ? false : true;
    $side_stroke_hidden = $options['sf_sidebar_style'] === 'toollbar' || $options['sf_sidebar_behaviour'] === '' ? false : true;
    $sf_license_tab = get_license() ? 'License' : '!Activate';
    $sf_license_label = get_license() ? 'Your Superfly copy activated' : 'Activate Superfly';

	register_setting( 'sf_options', 'sf_options', 'sf_options_validate' );

	add_settings_section('sf_source', '', 'sf_section', 'sf');
    add_settings_field('sf_learn_superfly', "Learn Superfly", 'sf_learn_superfly_str', 'sf', 'sf_source', array('chapter' => 'Source'));
    add_settings_field('sf_active_menu', "SUPERFLY MENUS", 'sf_active_menu_str', 'sf', 'sf_source');
    add_settings_field('sf_alternative_menu', "ALTERNATIVE MENU AS SOURCE ", 'sf_alternative_menu_str', 'sf', 'sf_source');
	add_settings_field('sf_test_mode', "", 'sf_test_mode_str', 'sf', 'sf_source', array('chapter' => 'Test mode during setup'));
	add_settings_field('sf_display', "", 'sf_display_str', 'sf', 'sf_source', array('chapter' => 'General display rules'));

	// add_settings_field('sf_hide_def', "Visibility of source menu:", 'sf_hide_def_str', 'sf', 'sf_source');
	// own HTML

	add_settings_section('sf_appearance', 'Menu Panel', 'sf_section', 'sf');
	add_settings_field('sf_sidebar_style', "Design", 'sf_sidebar_style_str', 'sf', 'sf_appearance', array('chapter' => 'General', 'subsection' => 'general'));
	add_settings_field('sf_sidebar_behaviour', "Behaviour", 'sf_sidebar_behaviour_str', 'sf', 'sf_appearance', array('subsection' => 'general', 'hidden' => $behaviour_vis));
	add_settings_field('sf_sidebar_pos', "Menu side", 'sf_sidebar_pos_str', 'sf', 'sf_appearance', array('subsection' => 'general'));
	add_settings_field('sf_skew_type', "Skew style", 'sf_skew_type_str', 'sf', 'sf_appearance', array('subsection' => 'general', 'hidden' => $skew_vis));
    add_settings_field('sf_fs_layout', "Fullscreen layout", 'sf_fs_layout_str', 'sf', 'sf_appearance', array('subsection' => 'general'));
    add_settings_field('sf_opening_type', "Button interface", 'sf_opening_type_str', 'sf', 'sf_appearance', array('subsection' => 'general', 'hidden' => $opening_type_hidden));
	add_settings_field('sf_sub_type', "Submenus appearance", 'sf_sub_type_str', 'sf', 'sf_appearance', array('subsection' => 'general'));
//	add_settings_field('sf_sub_mob_type', "Submenus on mobiles", 'sf_sub_mob_type_str', 'sf', 'sf_appearance', array('subsection' => 'general'));
	add_settings_field('sf_sub_opening_type', "Submenus interface", 'sf_sub_opening_type_str', 'sf', 'sf_appearance', array('subsection' => 'general'));
	add_settings_field('sf_fade_content', "Fade effect", 'sf_fade_content_str', 'sf', 'sf_appearance', array('subsection' => 'general'));
	add_settings_field('sf_fade_full', "Main background color", 'sf_fade_full_str', 'sf', 'sf_appearance', array('subsection' => 'general', 'hidden' => $fade_full_hidden));
	add_settings_field('sf_full_head', "Header background color", 'sf_full_head_str', 'sf', 'sf_appearance', array('subsection' => 'general', 'hidden' => $fade_full_hidden));
	add_settings_field('sf_full_sec', "Footer background color", 'sf_full_sec_str', 'sf', 'sf_appearance', array('subsection' => 'general', 'hidden' => $fade_full_hidden));
	add_settings_field('sf_full_x', "X button color", 'sf_full_x_str', 'sf', 'sf_appearance', array('subsection' => 'general', 'hidden' => $fade_full_hidden));
	add_settings_field('sf_blur_content', "Blur effect", 'sf_blur_content_str', 'sf', 'sf_appearance', array('subsection' => 'general'));
//	add_settings_field('sf_transparent_panel', "Semi-transparent background mode", 'sf_transparent_panel_str', 'sf', 'sf_appearance', array('subsection' => 'general'));
	add_settings_field('sf_transition', "Fading in/out for page transitions", 'sf_transition_str', 'sf', 'sf_appearance', array('subsection' => 'general'));

	add_settings_field('sf_width_panel_1', "Home level", 'sf_width_panel_1_str', 'sf', 'sf_appearance', array('chapter' => 'Styling', 'subsection' => 'styling'));
	add_settings_field('sf_bg_color_panel_1', "", 'sf_bg_color_panel_1_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_color_panel_1', "", 'sf_color_panel_1_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_scolor_panel_1', "", 'sf_scolor_panel_1_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_hover_panel_1', "", 'sf_hover_panel_1_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_chapter_1', "", 'sf_chapter_1_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_image_bg', "Custom background image", 'sf_image_bg_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_video_bg', "Background youtube video URL", 'sf_video_bg_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_video_preload', "", 'sf_video_preload_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_video_mob', "", 'sf_video_mob_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_width_panel_2', "Second level", 'sf_width_panel_2_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_bg_color_panel_2', "", 'sf_bg_color_panel_2_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_color_panel_2', "", 'sf_color_panel_2_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_scolor_panel_2', "", 'sf_scolor_panel_2_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_hover_panel_2', "", 'sf_hover_panel_2_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_chapter_2', "", 'sf_chapter_2_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_width_panel_3', "Third level", 'sf_width_panel_3_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_bg_color_panel_3', "", 'sf_bg_color_panel_3_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_color_panel_3', "", 'sf_color_panel_3_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_scolor_panel_3', "", 'sf_scolor_panel_3_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_hover_panel_3', "", 'sf_hover_panel_3_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_chapter_3', "", 'sf_chapter_3_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_width_panel_4', "Forth level", 'sf_width_panel_4_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_bg_color_panel_4', "", 'sf_bg_color_panel_4_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_color_panel_4', "", 'sf_color_panel_4_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_scolor_panel_4', "", 'sf_scolor_panel_4_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
    add_settings_field('sf_hover_panel_4', "", 'sf_hover_panel_4_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));
	add_settings_field('sf_chapter_4', "", 'sf_chapter_4_str', 'sf', 'sf_appearance', array('subsection' => 'styling'));

	add_settings_field('sf_tab_logo', "Top image", 'sf_tab_logo_str', 'sf', 'sf_appearance', array('chapter' => 'Identity', 'subsection' => 'identity'));
	add_settings_field('sf_logo_size', "Image size", 'sf_logo_size_str', 'sf', 'sf_appearance', array('subsection' => 'identity'));
	add_settings_field('sf_first_line', "SITE TITLE", 'sf_first_line_str', 'sf', 'sf_appearance', array('subsection' => 'identity'));
	add_settings_field('sf_sec_line', "TAGLINE", 'sf_sec_line_str', 'sf', 'sf_appearance', array('subsection' => 'identity'));

	add_settings_field('sf_facebook', "Facebook URL", 'sf_facebook_str', 'sf', 'sf_appearance', array('chapter' => 'Social', 'column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_dribbble', "Dribbble URL", 'sf_dribbble_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_twitter', "X/Twitter URL", 'sf_twitter_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_youtube', "Youtube URL", 'sf_youtube_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_linkedin', "Linkedin URL", 'sf_linkedin_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_vimeo', "Vimeo URL", 'sf_vimeo_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_gplus', "Google Plus URL", 'sf_gplus_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_soundcloud', "SoundCloud URL", 'sf_soundcloud_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_instagram', "Instagram URL", 'sf_instagram_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_email', "Email", 'sf_email_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_pinterest', "Pinterest URL", 'sf_pinterest_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_skype', "Skype", 'sf_skype_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_flickr', "Flickr URL", 'sf_flickr_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));
	add_settings_field('sf_rss', "RSS", 'sf_rss_str', 'sf', 'sf_appearance', array('column' => 1, 'subsection' => 'social'));

	add_settings_field('sf_social_style', "Symbols Style", 'sf_social_style_str', 'sf', 'sf_appearance', array('subsection' => 'social'));
	add_settings_field('sf_social_color', "Symbols Color", 'sf_social_color_str', 'sf', 'sf_appearance', array('subsection' => 'social'));
	add_settings_field('sf_social_align', "Symbols Alignment", 'sf_social_align_str', 'sf', 'sf_appearance', array('subsection' => 'social'));

    /* Extension: Toolbar */
	if (function_exists('sf_extension_toolbar_settings')) {
        sf_extension_toolbar_settings();
    }
    /* /Extension: Toolbar */

    add_settings_field('sf_search', "Search field", 'sf_search_str', 'sf', 'sf_appearance', array('chapter' => 'Extra', 'subsection' => 'extra'));
	add_settings_field('sf_search_bg', "Search field background fade", 'sf_search_bg_str', 'sf', 'sf_appearance', array('subsection' => 'extra'));
	add_settings_field('sf_above_logo', "Above logo content area", 'sf_above_logo_str', 'sf', 'sf_appearance', array('subsection' => 'extra'));
	add_settings_field('sf_under_logo', "Under logo content area", 'sf_under_logo_str', 'sf', 'sf_appearance', array('subsection' => 'extra'));
	add_settings_field('sf_copy', "Copyrights content area", 'sf_copy_str', 'sf', 'sf_appearance', array('subsection' => 'extra'));

	// MENU SECTION
	add_settings_section('sf_menu_items', 'Menu items', 'sf_section', 'sf');
	add_settings_field('sf_font', "", 'sf_font_str', 'sf', 'sf_menu_items', array('chapter' => 'Font settings'));
	add_settings_field('sf_font_size', "", 'sf_font_size_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_font_weight', "", 'sf_font_weight_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_alignment', "", 'sf_alignment_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_uppercase', "", 'sf_uppercase_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_spacing', "Letter spacing", 'sf_spacing_str', 'sf', 'sf_menu_items');
//	add_settings_field('sf_fs_dynamic', "Fullscreen mode dynamic font size", 'sf_fs_dynamic_str', 'sf', 'sf_menu_items');
    add_settings_field('sf_c_font', "", 'sf_c_font_str', 'sf', 'sf_menu_items', array('chapter' => 'Section headers styling'));
    add_settings_field('sf_c_fs', "", 'sf_c_fs_str', 'sf', 'sf_menu_items');
    add_settings_field('sf_c_weight', "", 'sf_c_weight_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_c_trans', "", 'sf_c_trans_str', 'sf', 'sf_menu_items');

	add_settings_field('sf_padding', "Padding of menu item (vertical)", 'sf_padding_str', 'sf', 'sf_menu_items', array('chapter' => 'Customizing items'));
	add_settings_field('sf_padding_h', "Percentage margin (horizontal)", 'sf_padding_h_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_icon_size', "Icons & images size", 'sf_icon_size_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_icon_color', "Icons color", 'sf_icon_color_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_ordered', "Numbers of Menu items order", 'sf_ordered_str', 'sf', 'sf_menu_items');
    add_settings_field('sf_ind', "Submenu indicators", 'sf_ind_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_ind_s', "Submenu indicators size", 'sf_ind_s_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_ind_st', "Submenu indicators width", 'sf_ind_st_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_separators', "Separators between menu items", 'sf_separators_str', 'sf', 'sf_menu_items');
	add_settings_field('sf_separators_color', "Separators color", 'sf_separators_color_str', 'sf', 'sf_menu_items', array('hidden' => $options['sf_separators'] == '' ? true : false,));
	add_settings_field('sf_separators_width', "Separators width", 'sf_separators_width_str', 'sf', 'sf_menu_items', array('hidden' => $options['sf_separators'] == '' ? true : false,));
	add_settings_field('sf_highlight', "Highlighting of menu items on hover", 'sf_highlight_str', 'sf', 'sf_menu_items');
    add_settings_field('sf_hover_style', "Shift on hover", 'sf_hover_style_str', 'sf', 'sf_menu_items');
    add_settings_field('sf_highlight_active', "Highlighting active page item", 'sf_highlight_active_str', 'sf', 'sf_menu_items');

	add_settings_section('sf_label', 'Button', 'sf_section', 'sf');
	add_settings_field('sf_label_vis', "Button visibility", 'sf_label_vis_str', 'sf', 'sf_label', array('chapter' => 'General', 'column' => 1));
	add_settings_field('sf_label_type', "Button type", 'sf_label_type_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('sf_fixed', "Button fixed on page", 'sf_fixed_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('sf_label_shift', "HORIZONTAL SHIFT", 'sf_label_shift_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('sf_label_shift_m', "HORIZONTAL SHIFT ON MOBILES", 'sf_label_shift_m_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('sf_label_top', "TOP MARGIN", 'sf_label_top_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('sf_label_top_mobile', "TOP MARGIN ON MOBILES", 'sf_label_top_mobile_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('sf_mob_nav', "Navbar for mobiles", 'sf_mob_nav_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 1));
	add_settings_field('sf_threshold_point', "Threshold point", 'sf_threshold_point_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 1));

	add_settings_field('sf_label_icon', "Icon", 'sf_label_icon_str', 'sf', 'sf_label', array('hidden' => $btn_hidden || $options['sf_label_type'] == 'default' ? true : false, 'chapter' => 'Stylings', 'column' => 2));
	add_settings_field('sf_label_size', "Icon Size", 'sf_label_size_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('sf_label_style', "Button style", 'sf_label_style_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('sf_label_width', "Icon lines width", 'sf_label_width_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('sf_label_gaps', "Icon lines gaps", 'sf_label_gaps_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('sf_label_color', "BUTTON BASE COLOR", 'sf_label_color_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('sf_label_icon_color', "Button Icon color", 'sf_label_icon_color_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('sf_label_text', "Show Button text", 'sf_label_text_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('sf_label_text_field', "", 'sf_label_text_field_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));
	add_settings_field('sf_label_text_color', "Button text color", 'sf_label_text_color_str', 'sf', 'sf_label', array('hidden' => $btn_hidden, 'column' => 2));

	add_settings_section('sf_advanced', 'Advanced', 'sf_section', 'sf');
	add_settings_field('sf_css', "Additional CSS", 'sf_css_str', 'sf', 'sf_advanced', array('chapter' => 'Advanced settings'));
    add_settings_field('sf_parent_ignore', "Ignore parent links", 'sf_parent_ignore_str', 'sf', 'sf_advanced');
    add_settings_field('sf_submenu_support', "Allow Submenu", 'sf_submenu_support_str', 'sf', 'sf_advanced');
	add_settings_field('sf_submenu_mob', "Allow Submenu on mobiles", 'sf_submenu_mob_str', 'sf', 'sf_advanced');
	add_settings_field('sf_submenu_classes', "Sub-menu classes list", 'sf_submenu_classes_str', 'sf', 'sf_advanced');
	add_settings_field('sf_interval', "Interval between mouse events", 'sf_interval_str', 'sf', 'sf_advanced');
	add_settings_field('sf_togglers', "Additional element to toggle menu", 'sf_togglers_str', 'sf', 'sf_advanced');
	add_settings_field('sf_dev', "Use non-minified JS script", 'sf_dev_str', 'sf', 'sf_advanced');

    add_settings_section('sf_icons', 'Icons', 'sf_section', 'sf');
    add_settings_field('sf_icons_manager', "", 'sf_icons_manager_str', 'sf', 'sf_icons',  array('chapter' => 'Icon Sets', 'header_hidden' => true));

	add_settings_section('sf_addons', 'Add-ons', 'sf_section_addons', 'sf');

    add_settings_section('sf_license', $sf_license_tab, 'sf_section', 'sf');
	add_settings_field('sf_license_text', "", 'sf_license_text_str', 'sf', 'sf_license', array('chapter' => $sf_license_label));
	add_settings_field('sf_license_fname', "First name", 'sf_license_fname_str', 'sf', 'sf_license');
	add_settings_field('sf_license_lname', "Last name", 'sf_license_lname_str', 'sf', 'sf_license');
	add_settings_field('sf_license_email', "Your email *", 'sf_license_email_str', 'sf', 'sf_license');
	add_settings_field('sf_license_code', "Purchase code *", 'sf_license_code_str', 'sf', 'sf_license');
	add_settings_field('sf_license_subscribe', "", 'sf_license_subscribe_str', 'sf', 'sf_license');
    add_settings_field('sf_license_valid', "", 'sf_license_valid_str', 'sf', 'sf_license', array('hidden' => true));

    add_settings_section('sf_feedback', 'Feedback', 'sf_section', 'sf');

}

function sf_section() {

}

function sf_section_addons() {
	global $ext;
	echo '<div class="settings-form-wrapper sf_icons">
	<h1>Available add-ons</h1>
	<div class="settings-form-row"><h6>Enhance Superfly functionality with great add-ons.</h6>
	<div class="extension">
            <div class="extension__item" id="extension-toolbar">
                <div class="extension__image"></div>
                <div class="extension__content">
                    <a class="extension__cta'. ($ext ? ' extension__cta--activated extension__cta--disabled': '') .'" target="_blank" href="https://goo.gl/e38225">' . ($ext ? 'Activated': 'Get') . '</a>
                    <h2 class="extension__title">Advanced Toolbar Extension</h2>
                    <p class="extension__text">This add-on contains three the most popular features according to customer suggestions. You will get new customisable toolbar which you can supply with shopping cart, site language switcher, sign in/sign out form or own custom link. Make your Superfly menu complete!
                 </div>

            </div>
        </div>
	</div>
	</div>';
}

global $sf_cached_opts;


function sf_get_default_options() {
    $options = array();
    $options['sf_test_mode'] = 'no';
    $options['sf_fixed'] = 'no';
    $options['sf_dev'] = 'no';
    $options['sf_fa_on'] = 'no';
    $options['sf_active_menu'] = '';

    $mappings = (object)array(
        "user" => (object)array(
            "everyone" => 1,
            "loggedin" => 0,
            "loggedout" => 0,
        ),
        "desktop" => (object)array(
            "yes" => 1,
            "no" => 0,
        ),
        "mobile" => (object)array(
            "yes" => 1,
            "no" => 0,
        ),
        "rule" => (object)array(
            "include" => 0,
            "exclude" => 1,
        ),
        "location" => (object)array(
            "pages" => (object)array(),
            "cposts" => (object)array(),
            "cats" => (object)array(),
            "taxes" => (object)array(),
            "langs" => (object)array(),
            "wp_pages" => (object)array(),
            "ids" => array(),
        ),
    );

    $options['sf_display'] =  json_encode( $mappings );

    $options['sf_label_width'] = '1';
    $options['sf_label_gaps'] = '8';
    $options['sf_threshold_point'] = '586';
    $options['sf_alternative_menu'] = '';
    $options['sf_hide_def'] = 'no';
    $options['sf_tab_logo'] = '';
    $options['sf_first_line'] = '';
    $options['sf_logo_size'] = '';
    $options['sf_sec_line'] = '';
    $options['sf_bg_color_panel_1'] = '#212121';
    $options['sf_skew_type'] = 'top';
    $options['sf_image_bg'] = '';
    $options['sf_bg_color_panel_2'] = '#767676';
    $options['sf_bg_color_panel_3'] = '#9e466b';
    $options['sf_bg_color_panel_4'] = '#36939e';
    $options['sf_chapter_1'] = '#00ffb8';
    $options['sf_chapter_2'] = '#ffffff';
    $options['sf_chapter_3'] = '#ffffff';
    $options['sf_chapter_4'] = '#ffffff';
    $options['sf_color_panel_1'] = '#aaaaaa';
    $options['sf_fade_full'] = 'rgba(0,0,0,0.9)';
    $options['sf_full_head'] = 'rgb(255, 255, 255)';
    $options['sf_full_sec'] = 'rgb(251, 101, 84)';
    $options['sf_full_x'] = 'rgb(128, 128, 128)';
    $options['sf_scolor_panel_1'] = '#eeeeee';
    $options['sf_scolor_panel_2'] = '#eeeeee';
    $options['sf_scolor_panel_3'] = '#eeeeee';
    $options['sf_scolor_panel_4'] = '#eeeeee';
    $options['sf_hover_panel_1'] = '#008feb';
    $options['sf_hover_panel_2'] = '#ffffff';
    $options['sf_hover_panel_3'] = '#ffffff';
    $options['sf_hover_panel_4'] = '#ffffff';
    $options['sf_color_panel_2'] = '#ffffff';
    $options['sf_color_panel_3'] = '#ffffff';
    $options['sf_color_panel_4'] = '#ffffff';
    $options['sf_custom_bg'] = '';
    $options['sf_fade_content'] = 'light';
    $options['sf_blur_content'] = 'no';
    $options['sf_selectors'] = 'no';
    $options['sf_sidebar_pos'] = 'left';
    $options['sf_fs_layout'] = 'multiple';
    $options['sf_iconbar'] = 'no';
    $options['sf_width_panel_1'] = '225';
    $options['sf_width_panel_2'] = '250';
    $options['sf_width_panel_3'] = '250';
    $options['sf_width_panel_4'] = '200';
    $options['sf_sidebar_style'] = 'side';
    $options['sf_sidebar_behaviour'] = 'slide';
    $options['sf_opening_type'] = 'hover';
    $options['sf_sub_type'] = 'flyout';
    $options['sf_sub_mob_type'] = 'dropdown';
    $options['sf_sub_opening_type'] = 'hover';
    $options['sf_transition'] = 'no';
    $options['sf_transparent_panel'] = 'none';
    $options['sf_search'] = 'yes';
    $options['sf_search_bg'] = 'light';
// Appearance
    $options['sf_font'] = 'inherit';
    $options['sf_c_font'] = 'inherit';
    $options['sf_font_size'] = '20';
    $options['sf_spacing'] = '0';
    $options['sf_c_fs'] = '15';
    $options['sf_font_weight'] = 'normal';
    $options['sf_c_weight'] = 'bold';
    $options['sf_padding'] = '25';
    $options['sf_padding_h'] = '10';
    $options['sf_icon_size'] = '40';
    $options['sf_icon_color'] = '#777';
    $options['sf_lh'] = '20';
    $options['sf_alignment'] = 'left';
    $options['sf_uppercase'] = 'no';
    $options['sf_c_trans'] = 'yes';
    $options['sf_separators'] = 'no';
    $options['sf_fs_dynamic'] = 'no';
    $options['sf_ind'] = 'yes';
    $options['sf_ordered'] = 'no';
    $options['sf_ind_s'] = '6';
    $options['sf_ind_st'] = '2';
    $options['sf_highlight'] = 'line';
    $options['sf_hover_style'] = 'text';
    $options['sf_highlight_active'] = 'no';
// button
    $options['sf_label_color'] = '#000000';
    $options['sf_label_icon_color'] = '#ffffff';
    $options['sf_label_invert'] = 'no';
    $options['sf_label_type'] = 'default';
    $options['sf_label_icon'] = 'Entypo+_####_menu';
    $options['sf_label_size'] = '53';
    $options['sf_label_style'] = 'metro';
    $options['sf_label_top'] = '0px';
    $options['sf_label_top_mobile'] = '0px';
    $options['sf_label_shift'] = '0px';
    $options['sf_label_shift_m'] = '0px';
    $options['sf_label_vis'] = 'yes';
    $options['sf_mob_nav'] = 'no';
    $options['sf_label_text'] = '';
    $options['sf_label_text_field'] = 'Menu';
    $options['sf_label_text_color'] = '#CA3C08';
    $options['sf_css'] = '';
    $options['sf_video_bg'] = '';
    $options['sf_video_preload'] = 'no';
    $options['sf_video_mob'] = 'no';
// SOCIAL
    $options['sf_facebook'] = '';
    $options['sf_twitter'] = '';
    $options['sf_pinterest'] = '';
    $options['sf_youtube'] = '';
    $options['sf_vimeo'] = '';
    $options['sf_soundcloud'] = '';
    $options['sf_instagram'] = '';
    $options['sf_linkedin'] = '';
    $options['sf_dribbble'] = '';
    $options['sf_flickr'] = '';
    $options['sf_skype'] = '';
    $options['sf_email'] = '';
    $options['sf_above_logo'] = '';
    $options['sf_under_logo'] = '';
    $options['sf_copy'] = '';
    $options['sf_gplus'] = '';
    $options['sf_rss'] = '';
    $options['sf_social_color'] = '#aaaaaa';
    $options['sf_social_style'] = 'icon';
    $options['sf_social_align'] = 'center';
    $options['sf_separators_color'] = 'rgba(0, 0, 0, 0.15)';
    $options['sf_separators_width'] = '100';
    $options['sf_submenu_support'] = 'yes';
    $options['sf_parent_ignore'] = 'yes';
    $options['sf_submenu_mob'] = 'yes';
    $options['sf_submenu_classes'] = 'sub-menu, children';
    $options['sf_interval'] = '51';
    $options['sf_togglers'] = '';
    $options['sf_license_valid'] = '';
    $options['sf_license_fname'] = '';
    $options['sf_license_lname'] = '';
    $options['sf_license_email'] = '';
    $options['sf_license_code'] = '';
    $options['sf_license_subscribe'] = '';

    return $options;
}

function sf_get_options()
{
	global $sf_cached_opts;

	if (isset($sf_cached_opts)) {return $sf_cached_opts;}

	$options = get_option('sf_options');
	$defaults = sf_get_default_options();

	$options['locations'] = sf_get_locations();

	// for old versions migration

    foreach ( $defaults as $optionName => $optionValue ) {
        // checking is we have current option set
        // if not get value from defaults
        // eg for checkboxes false value
        if ( empty( $options[ $optionName ] ) ) {
            $options[ $optionName ] = $defaults[ $optionName ];
        }
    }

    /* Extension: Toolbar */
    if(function_exists('sf_extension_toolbar_options')) {
        $options['sf_extension']['toolbar'] = sf_extension_toolbar_options($options);
    }
    /* /Extension: Toolbar */

	$sf_cached_opts = $options;

	return $options;
}

function sf_get_locations () {
	global $sf_locations;

	if (isset($sf_locations)) {return $sf_locations;}

	$locations = new stdClass();

	// pages on site
	$pages = array();
	$fields = array('post_title', 'ID');

	$posts = get_posts( array(
		'post_type' => 'page',
		'post_status' => 'publish',
		'numberposts' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'fields' => 'ids, titles'
	));

	foreach($posts as $post) {
		$newPost = new stdClass();
		foreach($fields as $field) {
			$newPost->$field = $post->$field;
		}
		$pages[] = $newPost;
	}

	$locations->pages = $pages;

	// custom post types
	$locations->cposts = get_post_types( array(
		'public' => true,
	), 'object');

	foreach ( array( 'revision', 'post', 'page', 'attachment', 'nav_menu_item' ) as $unset ) {
		unset($locations->cposts[$unset]);
	}

	foreach ( $locations->cposts as $c => $type ) {
		$post_taxes = get_object_taxonomies($c);
		foreach ( $post_taxes as $post_tax) {
			$locations->taxes[] = $post_tax;
		}
	}

	// categories
	$locations->cats = get_categories( array(
		'hide_empty'    => false,
		//'fields'        => 'id=>name', //added in 3.8
	) );

	// WPML languages
	if (function_exists('icl_get_languages') ) {
		//browser()->log('detect langs');
		$locations->langs = icl_get_languages('skip_missing=0&orderby=code');
	}

	foreach ( $locations as $key => $val ) {

		if (!empty($val)) {
			$length = count($val);
			for ($i = 0; $i <= $length; $i++) {
				if (isset($val[$i])) {
					//browser()->log  ( $val[$i] );
				}
			}
		}
	}

	$page_types = array(
		'front'     => __('Front', 'superfly-menu'),
		'home'      => __('Home/Blog', 'superfly-menu'),
		'archive'   => __('Archives'),
		'single'    => __('Single Post'),
		'forbidden' => '404',
		'search'    => __('Search'),
	);

	foreach ($page_types as $key => $label){
		//browser()->log  ( $key, $label );
		//$instance['page-'. $key] = isset($instance['page-'. $key]) ? $instance['page-'. $key] : false;
	}

	$locations->wp_pages = $page_types;

	$sf_locations = $locations;
	return $locations;
}

function sf_fa_on_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_fa_on'] ) && $options['sf_fa_on'] && $options['sf_submenu_support'] != 'no' ? 'checked="checked"' : '';

	echo "
  <h6>Load icon font if you don't have it already on site and want to use menu items special classes to add icons.</h6>
	<p><label for='sf_fa_on'><input id='sf_fa_on' name='sf_options[sf_fa_on]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}

function sf_iconbar_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_iconbar'] ) && $options['sf_iconbar'] ? 'checked="checked"' : '';

	echo "
  <h6>First you need to add icons/images to each menu item in <a href='/wp-admin/nav-menus.php'>Appearance/Menus</a>. Some settings are overridden or not applied in this mode.</h6>
	<p><label for='sf_iconbar'><input id='sf_iconbar' name='sf_options[sf_iconbar]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}

function sf_test_mode_str() {
	$options = sf_get_options();
	$style = $options['sf_test_mode'];
	$first_checked = isset( $options['sf_test_mode'] ) && $options['sf_test_mode'] ? 'checked="checked"' : '';

	echo "
  <h6>Menu will be visible in browsers where and when you are logged in.</h6>
	<p><label for='sf_test_mode'><input id='sf_test_mode' name='sf_options[sf_test_mode]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}function sf_fixed_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_fixed'] ) && $options['sf_fixed'] ? 'checked="checked"' : '';

	echo "
    <h6>Choose whether button should be fixed or float on page.</h6>
	<p><label for='sf_fixed'><input id='sf_fixed' name='sf_options[sf_fixed]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}function sf_dev_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_dev'] ) && $options['sf_dev'] ? 'checked="checked"' : '';

	echo "
  <h6>For debugging purposes.</h6>
	<p><label for='sf_dev'><input id='sf_dev' name='sf_options[sf_dev]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}
function sf_sub_type_str() {
	$options = sf_get_options();
	$style = $options['sf_sub_type'];


	echo "
    <h6>How submenu items will expand.</h6>
	<p>
    <select id='sf_sub_type' name='sf_options[sf_sub_type]'>
    <option value='flyout' " . ($style === 'flyout' ? 'selected="selected"' : '') . ">Flyout</option>
    <option value='dropdown' " . ($style === 'dropdown' ? 'selected="selected"' : '') . ">Dropdown</option>
    <option value='swipe' " . ($style === 'swipe' ? 'selected="selected"' : '') . ">Swipe</option>
    </select></p>
	";
}
function sf_fs_layout_str() {
	$options = sf_get_options();
	$style = $options['sf_fs_layout'];

	echo "
<h6>Choose between single and multiple sections layout.</h6>
	<p>
    <select id='sf_fs_layout' name='sf_options[sf_fs_layout]'>
    <option value='single' " . ($style === 'single' ? 'selected="selected"' : '') . ">Single column</option>
    <option value='multibox' " . ($style === 'multibox' ? 'selected="selected"' : '') . ">Multibox</option>
    </select></p>
	";
}
function sf_sub_mob_type_str() {
	$options = sf_get_options();
	$style = $options['sf_sub_mob_type'];

	echo "
    <h6>Submenu items appearance on mobiles. </h6>
	<p>
    <select id='sf_sub_mob_type' name='sf_options[sf_sub_mob_type]'>
    <option value='dropdown' " . ($style === 'dropdown' ? 'selected="selected"' : '') . ">Dropdown</option>
    <option value='swipe' " . ($style === 'swipe' ? 'selected="selected"' : '') . ">Swipe</option>
    </select></p>
	";
}
function sf_transition_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_transition'] ) && $options['sf_transition'] && $options['sf_transition'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><label for='sf_transition'><input id='sf_transition' name='sf_options[sf_transition]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>

	";
}

function sf_display_str() {
	$options = sf_get_options();
	$user_opts = json_decode($options['sf_display']);
	$locations = $options['locations'];
	//browser()->log('tab ' .$index . ' opts');
	//browser()->log($user_opts);

	?>
	<h6>Global settings <strong>for all</strong> Superfly menus.</h6>
	<p>
		<input id='sf_display' name='sf_options[sf_display]' type='hidden' value='<?php echo $options['sf_display']?>' />
	<div class='loc_popup'>
		<p>
			<label for="sf_user_status"><?php esc_html( _e('Show Superfly menu for:', 'superfly-menu') )?></label>
			<select name="display_user_status" id="sf_user_status" class="widefat">
				<option value="everyone" <?php echo selected( $user_opts->user->everyone, '1' ) ?>><?php esc_html(_e('Everyone', 'superfly-menu') )?></option>
				<option value="loggedout" <?php echo selected( $user_opts->user->loggedout, '1' ) ?>><?php esc_html( _e('Logged-out users', 'superfly-menu') )?></option>
				<option value="loggedin" <?php echo selected( $user_opts->user->loggedin, '1' ) ?>><?php esc_html( _e('Logged-in users', 'superfly-menu') )?></option>
			</select>
		</p>

		<p>
			<label for="sf_display_desktop"><?php esc_html(_e('Show on desktops:', 'superfly-menu')) ?></label>
			<select name="display_desktop" id="sf_display_desktop" class="widefat">
				<option value="yes" <?php echo selected( $user_opts->desktop->yes, '1' ) ?>><?php esc_html(_e('Show', 'superfly-menu')) ?></option>
				<option value="no" <?php echo selected( $user_opts->desktop->no, '1' ) ?>><?php esc_html(_e('Don\'t show', 'superfly-menu')) ?></option>
			</select>
		</p>

		<p>
			<label for="sf_display_mobile"><?php esc_html(_e('Show on mobiles:', 'superfly-menu')) ?></label>
			<select name="display_mobile" id="sf_display_mobile" class="widefat">
				<option value="yes" <?php echo selected( $user_opts->mobile->yes, '1' ) ?>><?php esc_html(_e('Show', 'superfly-menu') )?></option>
				<option value="no" <?php echo selected( $user_opts->mobile->no, '1' ) ?>><?php esc_html(_e('Don\'t show', 'superfly-menu')) ?></option>
			</select>
		</p>

		<p style="margin-top: 20px">
			<label style="margin-bottom: 5px !important;display: inline-block;" for="sf_user_status"><?php esc_html(_e('Hide on checked pages:', 'superfly-menu')) ?></label>

			<!--<select name="display_rule" id="display_rule" class="widefat">
				<option value="exclude" <?php /*echo selected( $user_opts->rule->exclude, '1' ) */?>><?php /*esc_html(_e('Hide on checked pages', 'superfly-menu')) */?></option>
				<option value="include" <?php /*echo selected( $user_opts->rule->include, '1' ) */?>><?php /*esc_html(_e('Show on checked pages', 'superfly-menu'))*/?></option>
			</select>-->
		</p>

		<div style="height:190px; overflow:auto; border:1px solid #dfdfdf; padding:5px; box-sizing:border-box;margin-bottom:5px;">
			<div class="dw_pages_wrap">
			<h4 class="dw_toggle" style="cursor:pointer;margin-top:0;"><?php esc_html(_e('Default WP pages', 'superfly-menu')) ?></h4>
			<div class="dw_collapse">
				<?php foreach ($locations->wp_pages as $key => $label){
					?>
					<p><input class="checkbox" class='switcher' type="checkbox" value="<?php echo $key?>" <?php checked(isset($user_opts->location->wp_pages->$key) ? $user_opts->location->wp_pages->$key : false, true) ?> id="display_wp_page_<?php echo $key?>" name="display_wp_page_<?php echo $key?>" />
						<label for="display_wp_page_<?php echo $key?>"><?php echo $label .' '. __('Page', 'superfly-menu') ?></label></p>
				<?php
				}
				?>
			</div>

			<h4 class="dw_toggle" style="cursor:pointer;"><?php esc_html(_e('Pages')) ?></h4>
			<div class="dw_collapse">
				<?php foreach ( $locations->pages as $page ) {
					//$instance['page-'. $page->ID] = isset($instance['page-'. $page->ID]) ? $instance['page-'. $page->ID] : false;
					$id = $page->ID;
					$p_title = apply_filters('the_title', $page->post_title, $page->ID);
					if ( isset($page->post_parent) ) {
						$parent = get_post($page->post_parent);

						$p_title .= ' ('. apply_filters('the_title', $parent->post_title, $parent->ID);

						if ( $parent->post_parent ) {
							$grandparent = get_post($parent->post_parent);
							$p_title .= ' - '. apply_filters('the_title', $grandparent->post_title, $grandparent->ID);
							unset($grandparent);
						}
						$p_title .= ')';

						unset($parent);
					}
					//browser()->log($p_title);

					?>
					<p><input class="checkbox" type="checkbox" value="<?php echo $id?>" <?php checked(isset($user_opts->location->pages->$id), true) ?> id="display_page_<?php echo $id ?>" name="display_page_<?php echo $id ?>" />
						<label for="display_page_<?php echo $id?>"><?php echo $p_title ?></label></p>
					<?php   unset($p_title);
				}  ?>
			</div>

			<?php if ( !empty($locations->cposts) ) { ?>
				<h4 class="dw_toggle" style="cursor:pointer;"><?php esc_html(_e('Custom Post Types', 'superfly-menu') )?> +/-</h4>
				<div class="dw_collapse">
					<?php foreach ( $locations->cposts as $post_key => $custom_post ) {
						?>
						<p><input class="checkbox" type="checkbox" value="<?php echo $post_key?>" <?php checked(isset($user_opts->location->cposts->$post_key), true) ?> id="display_cpost_<?php echo $post_key?>" name="display_cpost_<?php echo $post_key?>" />
							<label for="display_cpost_<?php echo $post_key?>"><?php echo stripslashes($custom_post->labels->name) ?></label></p>
						<?php
						unset($post_key);
						unset($custom_post);
					} ?>
				</div>

				<!--<h4 class="dw_toggle" style="cursor:pointer;"><?php /*esc_html(_e('Custom Post Type Archives', 'superfly-menu')) */?> +/-</h4>
				<div class="dw_collapse">
					<?php /*foreach ( $this->cposts as $post_key => $custom_post ) {
						if ( !$custom_post->has_archive ) {
							// don't give the option if there is no archive page
							continue;
						}
						$instance['type-'. $post_key .'-archive'] = isset($instance['type-'. $post_key .'-archive']) ? $instance['type-'. $post_key .'-archive'] : false;
						*/?>
						<p><input class="checkbox" type="checkbox" <?php /*checked($instance['type-'. $post_key.'-archive'], true) */?> id="<?php /*echo $widget->get_field_id('type-'. $post_key .'-archive'); */?>" name="<?php /*echo $widget->get_field_name('type-'. $post_key .'-archive'); */?>" />
							<label for="<?php /*echo $widget->get_field_id('type-'. $post_key .'-archive'); */?>"><?php /*echo stripslashes($custom_post->labels->name) */?> <?php /*esc_html(_e('Archive', 'superfly-menu')) */?></label></p>
					<?php /*} */?>
				</div>-->
			<?php } ?>

			<h4 class="dw_toggle" style="cursor:pointer;"><?php esc_html(_e('Categories')) ?></h4>
			<div class="dw_collapse">
				<?php foreach ( $locations->cats as $cat ) {
					$catid = $cat->cat_ID;
					?>
					<p><input class="checkbox" type="checkbox"  value="<?php echo $catid?>" <?php checked(isset($user_opts->location->cats->$catid), true) ?> id="display_cat_<?php echo $catid?>" name="display_cat_<?php echo $catid?>" />
						<label for="display_cat_<?php echo $catid?>"><?php echo $cat->cat_name ?></label></p>
					<?php
					unset($cat);
				}
				?>
			</div>

			<?php /*if ( !empty($this->taxes) ) { */?><!--
				<h4 class="dw_toggle" style="cursor:pointer;"><?php /*esc_html(_e('Taxonomies', 'superfly-menu') )*/?> +/-</h4>
				<div class="dw_collapse">
					<?php /*foreach ( $this->taxes as $tax ) {
						$instance['tax-'. $tax] = isset($instance['tax-'. $tax]) ? $instance['tax-'. $tax] : false;
						*/?>
						<p><input class="checkbox" type="checkbox" <?php /*checked($instance['tax-'. $tax], true) */?> id="<?php /*echo $widget->get_field_id('tax-'. $tax); */?>" name="<?php /*echo $widget->get_field_name('tax-'. $tax); */?>" />
							<label for="<?php /*echo $widget->get_field_id('tax-'. $tax); */?>"><?php /*echo str_replace(array('_','-'), ' ', ucfirst($tax)) */?></label></p>
						<?php
			/*						unset($tax);
								}
								*/?>
				</div>
			--><?php /*} */?>

			<?php if ( !empty($locations->langs) ) { ?>
				<h4 class="dw_toggle" style="cursor:pointer;" class="rule_lang"><?php esc_html(_e('Languages', 'superfly-menu')) ?></h4>
				<div class="dw_collapse"  class="rule_lang">
					<?php foreach ( $locations->langs as $lang ) {
						$key = $lang['language_code'];
						?>
						<p><input class="checkbox" type="checkbox" <?php checked(isset($user_opts->location->langs->$key), true) ?> id="display_lang_<?php echo $key?>" name="display_lang" value="<?php echo $key?>" />
							<label for="display_lang_<?php echo $key?>"><?php echo $lang['native_name'] ?></label></p>

						<?php
						unset($lang);
						unset($key);
					}
					?>
				</div>
			<?php } ?>



			<p class="display_ids_wrap"><label for="display_ids"><?php esc_html(_e('Comma Separated list of IDs of posts not listed above', 'superfly-menu')) ?>:</label>
				<input type="text" value="<?php echo implode(",", $user_opts->location->ids); ?>" name="display_ids" id="display_ids" />
			</p>
			</div>
		</div>

	</div>
	</p>
<?php
}

function sf_alternative_menu_str() {
	$options = sf_get_options();
	echo "<h6>Valid CSS selector for list element on page e.g. <em>#menu ul</em>.</h6>
	<input id='sf_alternative_menu' name='sf_options[sf_alternative_menu]' type='text' value='{$options['sf_alternative_menu']}' style='' />";
}

function sf_hide_def_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_hide_def'] ) && $options['sf_hide_def'] && $options['sf_hide_def'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><input id='sf_hide_def' name='sf_options[sf_hide_def]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='sf_hide_def'>Hide default menu when Superfly is generated</label></p>
	";
}

function sf_tab_logo_str() {
    $options = sf_get_options();
    echo '<h6>Logo or user profile photo. Recommended size 100x100</h6>';
	echo "
	<input placeholder='' type='hidden' size='100' id='sf_tab_logo' value='{$options['sf_tab_logo']}' name='sf_options[sf_tab_logo]'>";
    echo "<div class='image-preview'>";
    if (!empty($options['sf_tab_logo'])) {
        echo "<img src='{$options['sf_tab_logo']}' />";
    }
    echo "</div>";
    echo "<div><span class='sf-choose-image'>Select Image</span></div>";
    if (!empty($options['sf_tab_logo'])) {
        echo "<div><span class='sf-remove-image'>Remove Image</span></div>";
    }


	/*$options = sf_get_options();
	echo '<h6>Logo or user profile photo.</h6>';
	if (empty($options['sf_tab_logo'])) {
		echo "<input id='sf_tab_logo_file' type='file' name='sf_pic' value='{$options['sf_tab_logo']}' /> <input name='Submit' type='submit' class='button-primary' value='Upload' />";
	} else {
		echo '<div class="sf_tab_logo_holder"><img class="sf-tab-logo" src="' . $options['sf_tab_logo'] . '" alt=""/></div>';
		echo '<p><input  style="margin-top: 0;" type="submit" class="button-secondary" id="sf_remove_pic" value="Remove this pic"/></p>
                   <script>
                   jQuery("#sf_remove_pic").on("click keydown", function(){
                        jQuery("#sf_tab_logo").val("");
                   })
                   </script>
               ';
		echo "<span>...or upload new one</span><br><input id='sf_tab_logo_file' type='file' name='sf_pic' value='{$options['sf_tab_logo']}' /> <input name='Submit' type='submit' class='button-primary' value='Upload' />";
	}
	echo " <input id='sf_tab_logo' name='sf_options[sf_tab_logo]' size='100' type='hidden' value='{$options['sf_tab_logo']}' style='' />";*/
}

function sf_bg_color_panel_1_str() {
	$options = sf_get_options();

	echo "<input id='sf_bg_color_panel_1' data-color-format='rgba' name='sf_options[sf_bg_color_panel_1]' type='text' value='{$options['sf_bg_color_panel_1']}' style='' />
		<script>
				var opts = {
          previewontriggerelement: true,
          previewformat: 'hex',
          flat: false,
          color: '#3e98a8',
          customswatches: 'bg',
          swatches: colorscheme,
          order: {
              hsl: 1,
              preview: 2
          },
          onchange: function(container, color) {}
            };
				jQuery(function(){
				    var opts = jQuery.extend({}, opts);
				    opts.previewformat = 'rgba';
				    opts.order = {
                          hsl: 1,
                          opacity: 2,
                          preview: 3
                      }
					
					jQuery('#sf_bg_color_panel_1').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_bg_color_panel_2_str() {
		$options = sf_get_options();

    echo "<input id='sf_bg_color_panel_2' data-color-format='rgba' name='sf_options[sf_bg_color_panel_2]' type='text' value='{$options['sf_bg_color_panel_2']}' style='' />
		<script>

				jQuery(function(){
				    var opts = jQuery.extend({}, opts);
				    opts.previewformat = 'rgba';
				    opts.order = {
                          hsl: 1,
                          opacity: 2,
                          preview: 3
                      }
					jQuery('#sf_bg_color_panel_2').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_bg_color_panel_3_str() {
		$options = sf_get_options();

    echo "<input id='sf_bg_color_panel_3' data-color-format='rgba' name='sf_options[sf_bg_color_panel_3]' type='text' value='{$options['sf_bg_color_panel_3']}' style='' />
		<script>

				jQuery(function(){
				    				    var opts = jQuery.extend({}, opts);
				    				    opts.previewformat = 'rgba';
				    opts.order = {
                          hsl: 1,
                          opacity: 2,
                          preview: 3
                      }
					jQuery('#sf_bg_color_panel_3').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_bg_color_panel_4_str() {
		$options = sf_get_options();

    echo "<input id='sf_bg_color_panel_4' data-color-format='rgba' name='sf_options[sf_bg_color_panel_4]' type='text' value='{$options['sf_bg_color_panel_4']}' style='' />
		<script>

				jQuery(function(){
				    var opts = jQuery.extend({}, opts);
				    opts.previewformat = 'rgba';
				    opts.order = {
                          hsl: 1,
                          opacity: 2,
                          preview: 3
                      }
					jQuery('#sf_bg_color_panel_4').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_color_panel_1_str() {
	$options = sf_get_options();

	echo "<input id='sf_color_panel_1' data-color-format='hex' name='sf_options[sf_color_panel_1]' type='text' value='{$options['sf_color_panel_1']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#sf_color_panel_1').ColorPickerSliders(opts)
				});
	</script>
	";
}
function sf_scolor_panel_1_str() {
	$options = sf_get_options();

	echo "<input id='sf_scolor_panel_1' data-color-format='hex' name='sf_options[sf_scolor_panel_1]' type='text' value='{$options['sf_scolor_panel_1']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#sf_scolor_panel_1').ColorPickerSliders(opts)
				});
	</script>
	";
}

function sf_social_color_str() {
	$options = sf_get_options();

	//echo '<h6>Applies to icons that don\'t have brand color e.g. mail icon.</h6>';
	echo "<input id='sf_social_color' data-color-format='hex' name='sf_options[sf_social_color]' type='text' value='{$options['sf_social_color']}' style='' />
		<script>
            jQuery(function(){
                jQuery('#sf_social_color').ColorPickerSliders(opts)
            });
	    </script>
	";
}

function sf_separators_color_str() {
	$options = sf_get_options();

	echo "<input id='sf_separators_color' data-color-format='rgba' name='sf_options[sf_separators_color]' type='text' value='{$options['sf_separators_color']}'/>
		<script>

				jQuery(function(){
					var opts = {
	          previewontriggerelement: true,
	          previewformat: 'rgba',
	          flat: false,
	          color: '#3e98a8',
	          customswatches: 'bg',
	          swatches: colorscheme,
						order: {
							hsl: 1,
							opacity: 2,
							preview: 3
						},
	          onchange: function(container, color) {}
	        };
					jQuery('#sf_separators_color').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_skew_type_str() {
	$options = sf_get_options();
	$value = $options['sf_skew_type'];
	$first_checked = $value === 'top' ? 'checked' : '';
	$sec_checked = $value === 'bottom' ? 'checked' : '';

    echo "<div><input id='sf_skew_type_top' name='sf_options[sf_skew_type]' type='radio' {$first_checked} value='top' style='' /> <label for='sf_skew_type_top'></label></div>";
   	echo "<div><input id='sf_skew_type_bottom' name='sf_options[sf_skew_type]' type='radio' {$sec_checked} value='bottom' style='' /> <label for='sf_skew_type_bottom'></label></div>";
}

function sf_color_panel_2_str() {
		$options = sf_get_options();

    echo "<input id='sf_color_panel_2' data-color-format='hex' name='sf_options[sf_color_panel_2]' type='text' value='{$options['sf_color_panel_2']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#sf_color_panel_2').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_color_panel_3_str() {
		$options = sf_get_options();

    echo "<input id='sf_color_panel_3' data-color-format='hex' name='sf_options[sf_color_panel_3]' type='text' value='{$options['sf_color_panel_3']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#sf_color_panel_3').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_color_panel_4_str()
{
    $options = sf_get_options();

    echo "<input id='sf_color_panel_4' data-color-format='hex' name='sf_options[sf_color_panel_4]' type='text' value='{$options['sf_color_panel_4']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_color_panel_4').ColorPickerSliders(opts)
				});

	</script>
	";
}
function sf_hover_panel_1_str() {
	$options = sf_get_options();
	echo "<input id='sf_hover_panel_1' data-color-format='hex' name='sf_options[sf_hover_panel_1]' type='text' value='{$options['sf_hover_panel_1']}' />
		<script>
				jQuery(function(){
					jQuery('#sf_hover_panel_1').ColorPickerSliders(opts)
				});
	</script>
	";
}
function sf_hover_panel_2_str() {
	$options = sf_get_options();
	echo "<input id='sf_hover_panel_2' data-color-format='hex' name='sf_options[sf_hover_panel_2]' type='text' value='{$options['sf_hover_panel_2']}' />
		<script>
				jQuery(function(){
					jQuery('#sf_hover_panel_2').ColorPickerSliders(opts)
				});
	</script>
	";
}

function sf_hover_panel_3_str() {
	$options = sf_get_options();
	echo "<input id='sf_hover_panel_3' data-color-format='hex' name='sf_options[sf_hover_panel_3]' type='text' value='{$options['sf_hover_panel_3']}' />
		<script>
				jQuery(function(){
					jQuery('#sf_hover_panel_3').ColorPickerSliders(opts)
				});
	</script>
	";
}

function sf_hover_panel_4_str() {
	$options = sf_get_options();
	echo "<input id='sf_hover_panel_4' data-color-format='hex' name='sf_options[sf_hover_panel_4]' type='text' value='{$options['sf_hover_panel_4']}'/>
		<script>
				jQuery(function(){
					jQuery('#sf_hover_panel_4').ColorPickerSliders(opts)
				});
	</script>
	";
}

function sf_fade_full_str() {
	$options = sf_get_options();

	echo "<input id='sf_fade_full' data-color-format='rgba' name='sf_options[sf_fade_full]' type='text' value='{$options['sf_fade_full']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_fade_full').ColorPickerSliders({
         previewontriggerelement: true,
         previewformat: 'rgba',
         flat: false,
         color: 'rgba(0,0,0,0.9)',
         customswatches: 'label',
         swatches: colorscheme,
order: {
				hsl: 1,
				opacity: 2,
				preview: 3
			}
       })
				});

	</script>
	";
}

function sf_full_sec_str() {
	$options = sf_get_options();

	echo "<input id='sf_full_sec' data-color-format='rgba' name='sf_options[sf_full_sec]' type='text' value='{$options['sf_full_sec']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_full_sec').ColorPickerSliders({
         previewontriggerelement: true,
         previewformat: 'rgba',
         flat: false,
         color: 'rgb(251, 101, 84)',
         customswatches: 'label',
         swatches: colorscheme,
order: {
				hsl: 1,
				opacity: 2,
				preview: 3
			}
       })
				});

	</script>
	";
}
function sf_full_head_str() {
	$options = sf_get_options();

	echo "<input id='sf_full_head' data-color-format='rgba' name='sf_options[sf_full_head]' type='text' value='{$options['sf_full_head']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_full_head').ColorPickerSliders({
         previewontriggerelement: true,
         previewformat: 'rgba',
         flat: false,
         color: 'rgb(255, 255, 255)',
         customswatches: 'label',
         swatches: colorscheme,
order: {
				hsl: 1,
				opacity: 2,
				preview: 3
			}
       })
				});

	</script>
	";
}
function sf_full_x_str() {
	$options = sf_get_options();

	echo "<input id='sf_full_x' data-color-format='rgba' name='sf_options[sf_full_x]' type='text' value='{$options['sf_full_x']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_full_x').ColorPickerSliders({
         previewontriggerelement: true,
         previewformat: 'rgba',
         flat: false,
         color: 'rgb(128, 128, 128)',
         customswatches: 'label',
         swatches: colorscheme,
order: {
				hsl: 1,
				opacity: 2,
				preview: 3
			}
       })
				});

	</script>
	";
}

function sf_scolor_panel_2_str() {
		$options = sf_get_options();

    echo "<input id='sf_scolor_panel_2' data-color-format='hex' name='sf_options[sf_scolor_panel_2]' type='text' value='{$options['sf_scolor_panel_2']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#sf_scolor_panel_2').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_scolor_panel_3_str() {
		$options = sf_get_options();

    echo "<input id='sf_scolor_panel_3' data-color-format='hex' name='sf_options[sf_scolor_panel_3]' type='text' value='{$options['sf_scolor_panel_3']}' style='' />
		<script>
				jQuery(function(){
					jQuery('#sf_scolor_panel_3').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_scolor_panel_4_str() {
	$options = sf_get_options();

	echo "<input id='sf_scolor_panel_4' data-color-format='hex' name='sf_options[sf_scolor_panel_4]' type='text' value='{$options['sf_scolor_panel_4']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_scolor_panel_4').ColorPickerSliders(opts)
				});

	</script>
	";
}
function sf_chapter_1_str() {
	$options = sf_get_options();

	echo "
	<input id='sf_chapter_1' data-color-format='hex' name='sf_options[sf_chapter_1]' type='text' value='{$options['sf_chapter_1']}' style='' />
	<script>
		jQuery(function(){
			jQuery('#sf_chapter_1').ColorPickerSliders(opts)
		});
	</script>
	";
}
function sf_chapter_2_str() {
	$options = sf_get_options();

	echo "<input id='sf_chapter_2' data-color-format='hex' name='sf_options[sf_chapter_2]' type='text' value='{$options['sf_chapter_2']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_chapter_2').ColorPickerSliders(opts)
				});

	</script>
	";
}function sf_chapter_3_str() {
	$options = sf_get_options();

	echo "<input id='sf_chapter_3' data-color-format='hex' name='sf_options[sf_chapter_3]' type='text' value='{$options['sf_chapter_3']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_chapter_3').ColorPickerSliders(opts)
				});

	</script>
	";
}function sf_chapter_4_str() {
	$options = sf_get_options();

	echo "<input id='sf_chapter_4' data-color-format='hex' name='sf_options[sf_chapter_4]' type='text' value='{$options['sf_chapter_4']}' style='' />
		<script>

				jQuery(function(){
					jQuery('#sf_chapter_4').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_search_bg_str() {
	$options = sf_get_options();
	$size = $options['sf_search_bg'];


	echo "<select id='sf_search_bg' name='sf_options[sf_search_bg]'>
    <option value='light' " . ($size === 'light' ? 'selected="selected"' : '') . ">Light</option>
    <option value='dark' " . ($size === 'dark' ? 'selected="selected"' : '') . ">Dark</option>
    </select>
    ";
}

function sf_social_style_str() {
	$options = sf_get_options();
	$size = $options['sf_social_style'];


	echo "<select id='sf_social_style' name='sf_options[sf_social_style]'>
    <option value='icon' " . ($size === 'icon' ? 'selected="selected"' : '') . ">Icons</option>
    <option value='abbr' " . ($size === 'abbr' ? 'selected="selected"' : '') . ">Abbreviations</option>
    </select>
    ";
}


function sf_learn_superfly_str() {
	// Learn Superfly
	echo '<ul>';
	echo '<li><a href="http://superfly.looks-awesome.com/docs/Getting_Started/Creating_Your_First_Menu" title="Creating Your First Menu" target="_blank">Creating Your First Menu</a></li>';
	echo '<li><a href="http://superfly.looks-awesome.com/docs/Getting_Started/Setup_Multilevel_Menu_and_Add_Rich_Content" title="Setup Multilevel Menu and Add Rich Content" target="_blank">Setup Multilevel Menu and Add Rich Content</a></li>';
	echo '<li><a href="http://superfly.looks-awesome.com/docs/Getting_Started/Using_Multiple_Menus" title="Using Multiple Menus" target="_blank">Using Multiple Menus</a></li>';
	echo '<li><a href="http://superfly.looks-awesome.com/docs/Customize/Where_to_Setup_Menu_Items" title="Where to Setup Menu Items" target="_blank">Where to Setup Menu Items</a></li>';
	echo '</ul>';
}

function sf_active_menu_str() {
	$options = sf_get_options();

	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    $map = json_decode($options['sf_active_menu']);

	echo "<h6>
		Click menu labels that you added to edit location rules. Or click cross icon to remove it. 
		<a href='http://superfly.looks-awesome.com/docs/Getting_Started/Using_Multiple_Menus' title='Guide' target='_blank'>Guide</a>
	</h6>";
	if(!$menus){
		echo '<h6>Create at least one <a href="/wp-admin/nav-menus.php" title="Add WP Menu">WP menu</a> before adding it to Superfly.</h6>';
	}
    echo "<input id='sf_active_menu' name='sf_options[sf_active_menu]' type='hidden' value='{$options['sf_active_menu']}' />";

	echo "<script>";
	echo "var sf_menus=" . (isset($options['sf_active_menu']) && !empty($options['sf_active_menu']) ? $options['sf_active_menu'] : '{}') . ";";
	echo "</script>";

    echo '<ul class="sf-menu__list">';

    if (is_object($map) || is_array($map)) {
        foreach ( $map as $menu_object ) {
            echo '<li class="sf-menu__item" data-id="' . $menu_object->term_id . '">' . $menu_object->name . '<i class="flaticon-cross"></i></li>';
        }
    } else {
        // migration
        if (!empty($map)) {
            $menu_object = wp_get_nav_menu_object( $options['sf_active_menu'] );
            //echo 'sf_active_menu' . $options['sf_active_menu'];
            echo '<li class="sf-menu__item" data-id="' . $menu_object->term_id . '">'. $menu_object->name . '<i class="flaticon-cross"></i></li>';
        }
    }
    echo '</ul>';

    if (count($menus) > 0) {
        echo '<span class="sf-menu__add">+ Add new</span>';
        echo "<select id='sf-menu__select' name=''>";
        foreach ($menus as $menu_object) {
            echo "<option value='".$menu_object->term_id."'> ".$menu_object->name."</option>";
        }
        echo "</select>";
    }

}

function sf_width_panel_1_str()
{
	$options = sf_get_options();
	echo " <input id='sf_width_panel_1' name='sf_options[sf_width_panel_1]' size='10' type='text' value='{$options['sf_width_panel_1']}' style='' /> <span class='units'>px</span>";
}

function sf_width_panel_2_str()
{
	$options = sf_get_options();
	echo " <input id='sf_width_panel_2' name='sf_options[sf_width_panel_2]' size='10' type='text' value='{$options['sf_width_panel_2']}' style='' /> <span class='units'>px</span>";
}

function sf_width_panel_3_str()
{
	$options = sf_get_options();
	echo " <input id='sf_width_panel_3' name='sf_options[sf_width_panel_3]' size='10' type='text' value='{$options['sf_width_panel_3']}' style='' /> <span class='units'>px</span>";
}

function sf_width_panel_4_str()
{
	$options = sf_get_options();
	echo " <input id='sf_width_panel_4' name='sf_options[sf_width_panel_4]' size='10' type='text' value='{$options['sf_width_panel_4']}' style='' /> <span class='units'>px</span>";
}

function sf_sidebar_scale_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_sidebar_scale'] ) && $options['sf_sidebar_scale'] && $options['sf_sidebar_scale'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><input id='sf_sidebar_scale' name='sf_options[sf_sidebar_scale]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='sf_sidebar_scale'>Scale effect for sidebar content on opening</label></p>
	";
}

function sf_label_color_str() {
	$options = sf_get_options();

	echo "<h6>Not applicable if 'Just Icon' button style is selected.</h6>";
   	echo "<input id='sf_label_color' data-color-format='hex' name='sf_options[sf_label_color]' type='text' value='{$options['sf_label_color']}' style='' />
    <script>

    var preview = jQuery('#sf_label_preview');
    var previewColor = preview.find('.fa:not(.fa-inverse)');
            var opts = {
         previewontriggerelement: true,
         previewformat: 'hex',
         flat: false,
         color: '#c0392b',
         customswatches: 'label',
         swatches: colorscheme,
         order: {
             hsl: 1,
             preview: 2
         },
         onchange: function(container, color) {
            previewColor.css('color', color.tiny.toRgbString())
         }
       };
    jQuery(function(){
        jQuery('#sf_label_color').ColorPickerSliders(opts)
    });
    </script>";
}

function sf_label_icon_color_str() {
	$options = sf_get_options();
    echo "<input id='sf_label_icon_color' data-color-format='hex' name='sf_options[sf_label_icon_color]' type='text' value='{$options['sf_label_icon_color']}' style='' />
    <script>
        var preview = jQuery('#sf_label_preview');
        var previewColor = preview.find('.fa:not(.fa-inverse)');
                var opts = {
             previewontriggerelement: true,
             previewformat: 'hex',
             flat: false,
             color: '#c0392b',
             customswatches: 'label',
             swatches: colorscheme,
             order: {
                 hsl: 1,
                 preview: 2
             },
             onchange: function(container, color) {
                previewColor.css('color', color.tiny.toRgbString())
             }
           };
        jQuery(function(){
            jQuery('#sf_label_icon_color').ColorPickerSliders(opts)
        });
    </script>";
}

function sf_label_text_color_str() {
	$options = sf_get_options();

   echo "<input id='sf_label_text_color' data-color-format='hex' name='sf_options[sf_label_text_color]' type='text' value='{$options['sf_label_text_color']}' style='' />
	<script>

			var opts = {
         previewontriggerelement: true,
         previewformat: 'hex',
         flat: false,
         color: '#c0392b',
         customswatches: 'label',
         swatches: colorscheme,
         order: {
             hsl: 1,
             preview: 2
         }
       };
			jQuery(function(){
				jQuery('#sf_label_text_color').ColorPickerSliders(opts)
			});

</script>
";
}

function sf_label_invert_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_label_invert'] ) && $options['sf_label_invert'] && $options['sf_label_invert'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><input id='sf_label_invert' name='sf_options[sf_label_invert]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='sf_label_invert'>Invert colors</label></p>
	";
	echo "
	  <script>
	  jQuery('#sf_label_invert').change(function() {
	        var back = preview.find('i:first');
	        var fore = preview.find('i:last');
	        var color;

	  	    if(this.checked) {
	  	    		color = back.css('color');
	  	        fore.removeClass('fa-inverse').css('color', color);
	  	        back.addClass('fa-inverse').css('color', '');
	  	        previewColor = fore;

	  	    } else {
	  	    	  color = fore.css('color');
	  	        back.removeClass('fa-inverse').css('color', color);
	  	        fore.addClass('fa-inverse').css('color', '');
	  	        previewColor = back;
	  	    }
	  	}).change();

	   </script>
	   ";

}

function sf_selectors_str () {
	$options = sf_get_options();
	echo "<input type='text' id='sf_selectors' value='{$options['sf_selectors']}' name='sf_options[sf_selectors]' value>";
}
function sf_first_line_str () {
	$options = sf_get_options();
    $val = htmlentities($options['sf_first_line'], ENT_QUOTES);
    echo "<h6>You can show this text at the top of sidebar under image, eg. your name or your company name.</h6><input placeholder='' type='text' size='100' id='sf_first_line' value='{$val}' name='sf_options[sf_first_line]' value>";
}
function sf_logo_size_str () {
	$options = sf_get_options();
    $val = $options['sf_logo_size'];
    echo "<h6>Max height of image in menu header. Leave empty to use original image size.</h6><input placeholder='' type='text' size='3' id='sf_logo_size' value='{$val}' name='sf_options[sf_logo_size]' value> px";
}
function sf_image_bg_str () {
	$options = sf_get_options();
	echo "
	<input placeholder='' type='hidden' size='100' id='sf_image_bg' value='{$options['sf_image_bg']}' name='sf_options[sf_image_bg]' value>";
    echo "<div class='image-preview'>";
    if (!empty($options['sf_image_bg'])) {
        echo "<img src='{$options['sf_image_bg']}' />";
    }
    echo "</div>";
    echo "<div><span class='sf-choose-image'>Select Image</span></div>";
    if (!empty($options['sf_image_bg'])) {
        echo "<div><span class='sf-remove-image'>Remove Image</span></div>";
    }
}
function sf_sec_line_str () {
	$options = sf_get_options();
    $val = htmlentities($options['sf_sec_line'], ENT_QUOTES);
    echo "<h6>This is second line text. For example you can use first line for name and second line for your job title or company motto.</h6><input placeholder='' size='100' type='text' id='sf_sec_line' value='{$val}' name='sf_options[sf_sec_line]' value>";
}

function sf_label_no_anim_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_label_no_anim'] ) && $options['sf_label_no_anim'] && $options['sf_label_no_anim'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><input id='sf_label_no_anim' name='sf_options[sf_label_no_anim]' type='checkbox' value='yes' {$first_checked} style='' /> <label for='sf_label_no_anim'>Disable animation</label></p>
	";


}

function sf_label_type_str() {
    $options = sf_get_options();
	$style = $options['sf_label_type'];

    $first_checked = $style === 'default' ? 'checked' : '';
	$sec_checked = $style === 'custom' ? 'checked' : '';

    echo '<h6>A few effects and settings are only applicable to Default button type.</h6>';
	echo "
    <span id='sf_c_trans_chooser'  class='chooser'>
    	<input id='sf_label_type_default' name='sf_options[sf_label_type]'  type='radio' value='default' {$first_checked} style='' /><label for='sf_label_type_default'>Default</label>
    	<input id='sf_label_type_custom' name='sf_options[sf_label_type]' type='radio' value='custom' {$sec_checked} style='' /><label for='sf_label_type_custom'>Custom icon</label>
    </span>";
}

function sf_label_icon_str() {
    $options = sf_get_options();
	$icon = $options['sf_label_icon'];

    echo "<div id='sf_label_icon_select'></div>";
    echo "<input id='sf_label_icon'
                    name='sf_options[sf_label_icon]'
                    type='hidden'
                    value='{$icon}' style='' />";
	echo '
    <script type="text/javascript">
        jQuery(function($) {
            $(document).on("iconManagerCollectionLoaded", function(){
                window["la_icon_manager_select_0"] = new LAIconManager(
                    "0",
                    "#sf_label_icon_select",
                    window["la_icon_manager_collection"],
                    "#sf_label_icon"
                );
                window["la_icon_manager_select_0"].showIconSelect();
            });
        });
    </script>';
}

function sf_label_size_str() {
	$options = sf_get_options();

	echo " <input id='sf_label_size' name='sf_options[sf_label_size]' size='2' type='text' value='{$options['sf_label_size']}' style='' /> px";
}

function sf_label_style_str() {
	$options = sf_get_options();
	$val = $options['sf_label_style'];
	$first_checked = $val == 'none' ? 'checked="checked"' : '';
    $sec_checked = $val == 'square' ? 'checked="checked"' : '';
    $third_checked = $val == 'rsquare' ? 'checked="checked"' : '';
    $fourth_checked = $val == 'circle' ? 'checked="checked"' : '';
	$fifth_checked = $val == 'metro' ? 'checked="checked"' : '';


	echo "
	<p><input id='sf_label_style_none' name='sf_options[sf_label_style]' type='radio' value='none' {$first_checked} style='' /> <label for='sf_label_style_none'>Just icon</label></p>
	<p><input id='sf_label_style_metro' name='sf_options[sf_label_style]' type='radio' value='metro' {$fifth_checked} style='' /> <label for='sf_label_style_metro'>Metro-style icon</label></p>
	<p><input id='sf_label_style_square' name='sf_options[sf_label_style]' type='radio' value='square' {$sec_checked} style='' /> <label for='sf_label_style_square'>Icon in rectangle</label></p>
	<p><input id='sf_label_style_rsquare' name='sf_options[sf_label_style]' type='radio' value='rsquare' {$third_checked} style='' /> <label for='sf_label_style_rsquare'>Icon in rounded rectangle</label></p>
	<p><input id='sf_label_style_circle' name='sf_options[sf_label_style]' type='radio' value='circle' {$fourth_checked} style='' /> <label for='sf_label_style_circle'>Icon in circle</label></p>
	";
	echo "
    <script>
        jQuery('input[id*=sf_label_style]').change(function(){
        var val = jQuery(this).val();
        });
    </script>
   ";
}

function sf_label_top_str() {
	$options = sf_get_options();
	echo "<h6>Please enter valid CSS value for ex. '50%' or '200px'.</h6>";
	echo " <input id='sf_label_top' name='sf_options[sf_label_top]' size='6' type='text' value='{$options['sf_label_top']}' style='' />";
}

function sf_label_top_mobile_str() {
	$options = sf_get_options();
	echo " <input id='sf_label_top_mobile' name='sf_options[sf_label_top_mobile]' size='6' type='text' value='{$options['sf_label_top_mobile']}' style='' />";
}

function sf_label_shift_str() {
	$options = sf_get_options();
	echo "<h6>Please enter valid CSS value for ex. '50%' or '200px'.</h6>";
	echo " <input id='sf_label_shift' name='sf_options[sf_label_shift]' size='6' type='text' value='{$options['sf_label_shift']}' style='' />";
}

function sf_label_shift_m_str() {
	$options = sf_get_options();
	echo " <input id='sf_label_shift_m' name='sf_options[sf_label_shift_m]' size='6' type='text' value='{$options['sf_label_shift_m']}' style='' />";
}

function sf_sidebar_style_str() {
    $options = sf_get_options();
    $type = $options['sf_sidebar_style'];
    $first_checked = $type === 'side' ? 'checked' : '';
	$sec_checked = $type === 'toolbar' ? 'checked' : '';
	$third_checked = $type === 'full' ? 'checked' : '';
	$fourth_checked = $type === 'skew' ? 'checked' : '';

    echo "

    <span id='sf_sidebar_style_chooser'  class='chooser'>
    	<input id='sf_sidebar_style_side' name='sf_options[sf_sidebar_style]'  type='radio' value='side' {$first_checked} style='' /><label for='sf_sidebar_style_side'>Side panel</label>
    	<input id='sf_sidebar_style_toolbar' name='sf_options[sf_sidebar_style]' type='radio' value='toolbar' {$sec_checked} style='' /><label for='sf_sidebar_style_toolbar'>Navbar</label>
    	<input id='sf_sidebar_style_full' name='sf_options[sf_sidebar_style]' type='radio' value='full' {$third_checked} style='' /><label for='sf_sidebar_style_full'>Fullscreen</label>
    	<input id='sf_sidebar_style_skew' name='sf_options[sf_sidebar_style]' type='radio' value='skew' {$fourth_checked} style='' /><label for='sf_sidebar_style_skew'>Skewed Panel</label>
    </span>";
	echo "<h6 class='fs-disclaimer'>Fullscreen mode can ignore some settings to achieve better look.</h6>";
	echo "<h6 class='skew-disclaimer'>Skewed Panel design is for single level menus only.</h6>";
}

function sf_sidebar_behaviour_str() {
    $options = sf_get_options();
    $type = $options['sf_sidebar_behaviour'];
    $first_checked = $type === 'slide' ? 'checked' : '';
	$sec_checked = $type === 'push' ? 'checked' : '';
	$third_checked = $type === 'always' ? 'checked' : '';

    echo "
    <span id='sf_sidebar_behaviour_chooser'  class='chooser'>
    	<input id='sf_sidebar_behaviour_slide' name='sf_options[sf_sidebar_behaviour]'  type='radio' value='slide' {$first_checked} style='' /><label for='sf_sidebar_behaviour_slide'>Slide in</label>
    	<input id='sf_sidebar_behaviour_push' name='sf_options[sf_sidebar_behaviour]' type='radio' value='push' {$sec_checked} style='' /><label for='sf_sidebar_behaviour_push'>Push content</label>
    	<input id='sf_sidebar_behaviour_always' name='sf_options[sf_sidebar_behaviour]' type='radio' value='always' {$third_checked} style='' /><label for='sf_sidebar_behaviour_always'>Always visible</label>
    </span>";
}

function sf_opening_type_str() {
	$options = sf_get_options();
	$size = $options['sf_opening_type'];

	$first_checked = $size === 'hover' ? 'checked' : '';
	$sec_checked = $size === 'click' ? 'checked' : '';

    echo "
    <h6>How visitor opens menu. On mobiles it's always tap.</h6>
    <span id='sf_opening_type_chooser'  class='chooser'>
    	<input id='sf_opening_type_hover' name='sf_options[sf_opening_type]'  type='radio' value='hover' {$first_checked} style='' /><label for='sf_opening_type_hover'>Mouseover</label>
    	<input id='sf_opening_type_click' name='sf_options[sf_opening_type]' type='radio' value='click' {$sec_checked} style='' /><label for='sf_opening_type_click'>Click</label>
    </span>";
}

function sf_sub_opening_type_str() {
	$options = sf_get_options();
	$size = $options['sf_sub_opening_type'];

	$first_checked = $size === 'hover' ? 'checked' : '';
	$sec_checked = $size === 'click' ? 'checked' : '';

	echo "
    <h6>How visitor opens submenu. On mobiles it's always tap.</h6>
    <span id='sf_sub_opening_type_chooser'  class='chooser'>
    	<input id='sf_sub_opening_type_hover' name='sf_options[sf_sub_opening_type]'  type='radio' value='hover' {$first_checked} style='' /><label for='sf_sub_opening_type_hover'>Mouseover</label>
    	<input id='sf_sub_opening_type_click' name='sf_options[sf_sub_opening_type]' type='radio' value='click' {$sec_checked} style='' /><label for='sf_sub_opening_type_click'>Click</label>
    </span>";
}

function sf_transparent_panel_str() {
    $options = sf_get_options();
    $color = $options['sf_transparent_panel'];
    $first_checked = $color === 'none' ? 'checked' : '';
	$sec_checked = $color === 'dark' ? 'checked' : '';
	$third_checked = $color === 'light' ? 'checked' : '';

    echo "
    <h6>Use only with single-level menu or disable submenus under Advanced tab.</h6>
    <span id='sf_sidebar_behaviour_chooser'  class='chooser'>
    	<input id='sf_transparent_panel_none' name='sf_options[sf_transparent_panel]'  type='radio' value='none' {$first_checked} style='' /><label for='sf_transparent_panel_none'>Off</label>
    	<input id='sf_transparent_panel_dark' name='sf_options[sf_transparent_panel]' type='radio' value='dark' {$sec_checked} style='' /><label for='sf_transparent_panel_dark'>Dark</label>
    	<input id='sf_transparent_panel_light' name='sf_options[sf_transparent_panel]' type='radio' value='light' {$third_checked} style='' /><label for='sf_transparent_panel_light'>Light</label>
    </span>";
}

function sf_search_str() {
	$options = sf_get_options();
	$style = $options['sf_search'];
	$first_checked = $style === 'show' ? 'checked="checked"' : '';

	echo "
	<p><label for='sf_search'><input id='sf_search' name='sf_options[sf_search]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_font_str() {
	$options = sf_get_options();
	$fonts = plugin_dir_path(__FILE__) . 'includes/vendor/looks_awesome/google_fonts/google-fonts-fallback.json';
	$google_fonts = '[]';
	if(file_exists($fonts)){
        $google_fonts = file_get_contents($fonts);
	}

	echo "<h6 class='font-preview'>Tip: choose text color for each level in [MENU PANEL] / [STYLING]. Another tip: extend menu items with Superfly extra on <a href='/wp-admin/nav-menus.php'>menus page</a> or use WP Customizer.</h6>";
	echo "<div class='font-select-wrapper'><input type='text' id='sf_font' name='sf_options[sf_font]' value='{$options['sf_font']}' />";

	echo "
	  <script>
	  jQuery(function(){
	    jQuery('#sf_font').fontselect({
	        fonts: {$google_fonts},
	        placeholder: 'Site default font',
	        empty: 'inherit',
	        lookahead: 2
	    }).trigger('change');
	  });
    </script>
    ";
}

function sf_c_font_str() {
	$options = sf_get_options();
	$fonts = plugin_dir_path(__FILE__) . 'includes/vendor/looks_awesome/google_fonts/google-fonts-fallback.json';
	$google_fonts = '[]';
	if(file_exists($fonts)){
        $google_fonts = file_get_contents($fonts);
	}

    echo "<h6 class='font-preview-subheader'>Font settings for chapter headings. You can set up chapters on <a href='/wp-admin/nav-menus.php'>Appearance/Menus</a> page.</h6>";
    echo "<div class='font-select-wrapper'><input type='text' id='sf_c_font' name='sf_options[sf_c_font]' value='{$options['sf_c_font']}' />";

    echo "
	  <script>
	  jQuery(function(){
	    jQuery('#sf_c_font').fontselect({
	        fonts: {$google_fonts},
	        placeholder: 'Site default font',
	        empty: 'inherit',
	        lookahead: 2
	    }).trigger('change');
	    /*.change(function(){
          var font = $(this).val();
          if(font == 'inherit'){
               $('.font-preview-subheader').css({
                'font-family': 'Lato',
                'font-size': '14px',
                'line-height': '19px'
              });
          }else{
              $('.font-preview-subheader').css({
                'font-family': font,
                'font-size': '20px',
                'line-height': 'initial'
              });
          }
	    })*/
	  });
    </script>
    ";
}

function sf_c_fs_str() {
    $options = sf_get_options();

    echo " <input id='sf_c_fs' name='sf_options[sf_c_fs]' size='2' type='text' value='{$options['sf_c_fs']}' style='' /></div>";
}

function sf_font_size_str() {
	$options = sf_get_options();
	echo " <input id='sf_font_size' name='sf_options[sf_font_size]' size='2' type='text' value='{$options['sf_font_size']}' style='' /></div>";
}

function sf_spacing_str() {
	$options = sf_get_options();
	echo " 
 <h6>Can be negative for dense text or positive for spacy text. Default is 0.</h6>
 <p><input id='sf_spacing' name='sf_options[sf_spacing]' size='1' type='text' value='{$options['sf_spacing']}' style='' /> px</p>";
}

function sf_padding_str() {
	$options = sf_get_options();
	echo " <input id='sf_padding' name='sf_options[sf_padding]' size='2' type='text' value='{$options['sf_padding']}' style='' /> <span class='units'>px</span>";
}

function sf_padding_h_str() {
	$options = sf_get_options();
	echo " <input id='sf_padding_h' name='sf_options[sf_padding_h]' size='2' type='text' value='{$options['sf_padding_h']}' style='' /> <span class='units'>%</span>";
}
function sf_icon_size_str() {
	$options = sf_get_options();
	echo " <input id='sf_icon_size' name='sf_options[sf_icon_size]' size='2' type='text' value='{$options['sf_icon_size']}' style='' /> <span class='units'>px</span>";
}
function sf_icon_color_str() {
    $options = sf_get_options();
	echo "<input id='sf_icon_color' data-color-format='hex' name='sf_options[sf_icon_color]' type='text' value='{$options['sf_icon_color']}' style='' />
		<script>
				var opts = {
          previewontriggerelement: true,
          previewformat: 'hex',
          flat: false,
          color: '#3e98a8',
          customswatches: 'bg',
          swatches: colorscheme,
          order: {
              hsl: 1,
              preview: 2
          },
          onchange: function(container, color) {}
        };
				jQuery(function(){
					jQuery('#sf_icon_color').ColorPickerSliders(opts)
				});

	</script>
	";
}

function sf_lh_str() {
	$options = sf_get_options();
	echo " <input id='sf_lh' name='sf_options[sf_lh]' size='2' type='text' value='{$options['sf_lh']}' style='' /> <span class='units'>px</span>";
}

function sf_font_weight_str() {
	$options = sf_get_options();
	$style = $options['sf_font_weight'];

	$first_checked = $style === 'normal' ? 'checked' : '';
	$sec_checked = $style === 'bold' ? 'checked' : '';
	$third_checked = $style === 'lighter' ? 'checked' : '';

	echo "
    <span id='sf_font_weight_chooser' class='chooser weight_chooser'>
    	<input id='sf_font_weight_normal' name='sf_options[sf_font_weight]'  type='radio' value='normal' {$first_checked} style='' /><label for='sf_font_weight_normal' style='font-weight: normal'>Normal</label><input id='sf_font_weight_bold' name='sf_options[sf_font_weight]'  type='radio' value='bold' {$sec_checked} style='' /><label for='sf_font_weight_bold' style='font-weight: bold'>Bold</label><input id='sf_font_weight_lighter' name='sf_options[sf_font_weight]'  type='radio' value='lighter' {$third_checked} style='' /><label for='sf_font_weight_lighter' style='font-weight: 300'>Light</label>
    </span>";
}
function sf_c_weight_str() {
	$options = sf_get_options();
	$style = $options['sf_c_weight'];

	$first_checked = $style === 'normal' ? 'checked' : '';
	$sec_checked = $style === 'bold' ? 'checked' : '';
	$third_checked = $style === 'lighter' ? 'checked' : '';

	echo "
    <span id='sf_c_weight_chooser' class='chooser weight_chooser'>
    	<input id='sf_c_weight_normal' name='sf_options[sf_c_weight]'  type='radio' value='normal' {$first_checked} style='' /><label for='sf_c_weight_normal' style='font-weight: normal'>Normal</label><input id='sf_c_weight_bold' name='sf_options[sf_c_weight]'  type='radio' value='bold' {$sec_checked} style='' /><label for='sf_c_weight_bold' style='font-weight: bold'>Bold</label><input id='sf_c_weight_lighter' name='sf_options[sf_c_weight]'  type='radio' value='lighter' {$third_checked} style='' /><label for='sf_c_weight_lighter' style='font-weight: 300'>Light</label>
    </span>";
}

function sf_social_align_str() {
	$options = sf_get_options();
	$style = $options['sf_social_align'];
	$first_checked = $style === 'center' ? 'checked' : '';
	$sec_checked = $style === 'left' ? 'checked' : '';
	$third_checked = $style === 'right' ? 'checked' : '';

	echo "
    <span id='sf_social_align_chooser' class='chooser alignment_chooser'>
			<input id='sf_social_align_left' name='sf_options[sf_social_align]'  type='radio' value='left' {$sec_checked} style='' /><label for='sf_social_align_left'><i class='flaticon-align-left'></i></label><input id='sf_social_align_center' name='sf_options[sf_social_align]'  type='radio' value='center' {$first_checked} style='' /><label for='sf_social_align_center'><i class='flaticon-align-justify'></i></label><input id='sf_social_align_right' name='sf_options[sf_social_align]'  type='radio' value='right' {$third_checked} style='' /><label for='sf_social_align_right'><i class='flaticon-align-right'></i></label>
    </span>";
}

function sf_alignment_str() {
	$options = sf_get_options();
	$style = $options['sf_alignment'];
	$first_checked = $style === 'center' ? 'checked' : '';
	$sec_checked = $style === 'left' ? 'checked' : '';
	$third_checked = $style === 'right' ? 'checked' : '';

	echo "
    <span id='sf_alignment_chooser' class='chooser alignment_chooser'>
			<input id='sf_alignment_left' name='sf_options[sf_alignment]'  type='radio' value='left' {$sec_checked} style='' /><label for='sf_alignment_left'><i class='flaticon-align-left'></i></label><input id='sf_alignment_center' name='sf_options[sf_alignment]'  type='radio' value='center' {$first_checked} style='' /><label for='sf_alignment_center'><i class='flaticon-align-justify'></i></label><input id='sf_alignment_right' name='sf_options[sf_alignment]'  type='radio' value='right' {$third_checked} style='' /><label for='sf_alignment_right'><i class='flaticon-align-right'></i></label>
    </span>";
}

function sf_c_trans_str() {
	$options = sf_get_options();
	$style = $options['sf_c_trans'];
	$first_checked = $style === 'no' ? 'checked' : '';
	$sec_checked = $style === 'yes' ? 'checked' : '';

	echo "
    <span id='sf_c_trans_chooser'  class='chooser'>
    	<input id='sf_c_trans_no' name='sf_options[sf_c_trans]'  type='radio' value='no' {$first_checked} style='' /><label for='sf_c_trans_no'>Aa</label><input id='sf_c_trans_yes' name='sf_options[sf_c_trans]' type='radio' value='yes' {$sec_checked} style='' /><label for='sf_c_trans_yes'>AA</label>
    </span>";
}
function sf_uppercase_str() {
	$options = sf_get_options();
	$style = $options['sf_uppercase'];
	$first_checked = $style === 'no' ? 'checked' : '';
	$sec_checked = $style === 'yes' ? 'checked' : '';

	echo "
    <span id='sf_uppercase_chooser'  class='chooser'>
    	<input id='sf_uppercase_no' name='sf_options[sf_uppercase]'  type='radio' value='no' {$first_checked} style='' /><label for='sf_uppercase_no'>Aa</label><input id='sf_uppercase_yes' name='sf_options[sf_uppercase]' type='radio' value='yes' {$sec_checked} style='' /><label for='sf_uppercase_yes'>AA</label>
    </span>";
}

function sf_fs_dynamic_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_fs_dynamic'] ) && $options['sf_fs_dynamic'] && $options['sf_fs_dynamic'] != 'no' ? 'checked="checked"' : '';

	echo "
<h6>If enabled plugin tries to fit menu items into viewport, dynamically increasing/decreasing font size. Fullscreen only.</h6>
	<p><label for='sf_fs_dynamic'><input id='sf_fs_dynamic' name='sf_options[sf_fs_dynamic]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}
function sf_ind_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_ind'] ) && $options['sf_ind'] && $options['sf_ind'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><label for='sf_ind'><input id='sf_ind' name='sf_options[sf_ind]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}
function sf_ordered_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_ordered'] ) && $options['sf_ordered'] && $options['sf_ordered'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><label for='sf_ordered'><input id='sf_ordered' name='sf_options[sf_ordered]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_separators_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_separators'] ) && $options['sf_separators'] && $options['sf_separators'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><label for='sf_separators'><input id='sf_separators' name='sf_options[sf_separators]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_separators_width_str() {
	$options = sf_get_options();
	echo "
	 <h6>Relative to sidebar width in percentage.</h6>
	 <input id='sf_separators_width' name='sf_options[sf_separators_width]' size='3' type='text' value='{$options['sf_separators_width']}' style='' /> <span class='units'>%</span>";
}

function sf_highlight_str() {
	$options = sf_get_options();
	$style = $options['sf_highlight'];

	echo "
	    <h6>You can set colors in [MENU PANEL] / [STYLING].</h6>
<select id='sf_highlight' name='sf_options[sf_highlight]'>
	  <option value='line' " . ($style === 'line' ? 'selected="selected"' : '') . ">Line</option>
	  <option value='solid' " . ($style === 'solid' ? 'selected="selected"' : '') . ">Solid color highlighting</option>
	  <option value='semi' " . ($style === 'semi' ? 'selected="selected"' : '') . ">Semitransparent highlight</option>
	  <option value='semi-dark' " . ($style === 'semi-dark' ? 'selected="selected"' : '') . ">Semitransparent highlight (dark)</option>
	  <option value='text' " . ($style === 'text' ? 'selected="selected"' : '') . ">Text color</option>
	  <option value='strike' " . ($style === 'strike' ? 'selected="selected"' : '') . ">Strikethrough</option>
    </select>
    ";
}
function sf_hover_style_str() {
	$options = sf_get_options();
	$style = $options['sf_hover_style'];

	echo "
<select id='sf_hover_style' name='sf_options[sf_hover_style]'>
	  <option value='text' " . ($style === 'text' ? 'selected="selected"' : '') . ">Text</option>
	  <option value='arrow' " . ($style === 'arrow' ? 'selected="selected"' : '') . ">Submenu indicator</option>
	  <option value='none' " . ($style === 'none' ? 'selected="selected"' : '') . ">None</option>
    </select>
    ";
}
function sf_ind_st_str() {
    $options = sf_get_options();
    echo "
	 <input id='sf_ind_st' name='sf_options[sf_ind_st]' size='1' type='text' value='{$options['sf_ind_st']}' style='' /> <span class='units'>px</span>";
}
function sf_ind_s_str() {
    $options = sf_get_options();
    echo "
	 <input id='sf_ind_s' name='sf_options[sf_ind_s]' size='1' type='text' value='{$options['sf_ind_s']}' style='' /> <span class='units'>px</span>";
}

function sf_highlight_active_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_highlight_active'] ) && $options['sf_highlight_active'] && $options['sf_highlight_active'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><label for='sf_highlight_active'><input id='sf_highlight_active' name='sf_options[sf_highlight_active]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_label_vis_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_label_vis'] ) && $options['sf_label_vis'] && $options['sf_label_vis'] != 'no' ? 'checked="checked"' : '';

	echo "
    <h6>Turn it off to use your custom toggle element. <a href='http://superfly.looks-awesome.com/docs/Customize/Custom_Menu_Trigger' title='Guide' target='_blank'>Guide</a>.</h6>
	<p><label for='sf_label_vis'><input id='sf_label_vis' name='sf_options[sf_label_vis]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_mob_nav_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_mob_nav'] ) && $options['sf_mob_nav'] && $options['sf_mob_nav'] != 'no' ? 'checked="checked"' : '';

	echo "
    <h6>Overrides 'Top margin on mobiles' and 'Horisontal shift' settings.</h6>
	<p><label for='sf_mob_nav'><input id='sf_mob_nav' name='sf_options[sf_mob_nav]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}


function sf_label_width_str() {
	$options = sf_get_options();
	echo "
	 <input id='sf_label_width' name='sf_options[sf_label_width]' size='1' type='text' value='{$options['sf_label_width']}' style='' /> <span class='units'>px</span>";
}
function sf_label_gaps_str() {
	$options = sf_get_options();
	echo "
	 <input id='sf_label_gaps' name='sf_options[sf_label_gaps]' size='1' type='text' value='{$options['sf_label_gaps']}' style='' /> <span class='units'>px</span>";
}
function sf_threshold_point_str() {
	$options = sf_get_options();
	echo "
	 <h6>Navbar will appear if screen width is smaller than this point. On mobiles only.</h6>
	 <input id='sf_threshold_point' name='sf_options[sf_threshold_point]' size='3' type='text' value='{$options['sf_threshold_point']}' style='' /> <span class='units'>px</span>";
}

function sf_fade_content_str () {
    $options = sf_get_options();
    $value = $options['sf_fade_content'];
    $first_checked = $value === 'light' ? 'checked' : '';
	$sec_checked = $value === 'dark' ? 'checked' : '';
	$third_checked = $value === 'none' ? 'checked' : '';

    echo "
	<h6>For page content when menu is exposed.</h6>
    <span id='sf_sidebar_style_chooser'  class='chooser'>
    	<input id='sf_fade_content_light' name='sf_options[sf_fade_content]'  type='radio' value='light' {$first_checked} style='' /><label for='sf_fade_content_light'>Light</label>
    	<input id='sf_fade_content_dark' name='sf_options[sf_fade_content]' type='radio' value='dark' {$sec_checked} style='' /><label for='sf_fade_content_dark'>Dark</label>
    	<input id='sf_fade_content_none' name='sf_options[sf_fade_content]' type='radio' value='none' {$third_checked} style='' /><label for='sf_fade_content_none'>Don't fade</label>
    </span>";
}

function sf_blur_content_str () {
    $options = sf_get_options();
    $first_checked = $options['sf_blur_content'] === 'blur' ? 'checked="checked"' : '';

	echo "
    <h6>For page content when menu is exposed. Blur effect may slow down performance.</h6>
	<p><label for='sf_blur_content'><input id='sf_blur_content' name='sf_options[sf_blur_content]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_label_text_str () {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_label_text'] ) && $options['sf_label_text'] && $options['sf_label_text'] != 'no' ? 'checked="checked"' : '';

	echo "
    <h6>like 'Menu' and 'Close'.</h6>
	<p><label for='sf_label_text'><input id='sf_label_text' name='sf_options[sf_label_text]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_label_text_field_str () {
	$options = sf_get_options();

	echo "
	<p><input id='sf_label_text_field' name='sf_options[sf_label_text_field]' size='30' type='text' value='{$options['sf_label_text_field']}' style='' /></p>
	";
}
function sf_video_bg_str () {
	$options = sf_get_options();

	echo "
    <h6>Insert Youtube video URL or ID, for example AgI7OcZ9g60</h6>
	<p><input id='sf_video_bg' name='sf_options[sf_video_bg]' size='60' type='text' value='{$options['sf_video_bg']}' style='' /></p>
	";
}

function sf_sidebar_pos_str () {
    $options = sf_get_options();
    $left_checked = $options['sf_sidebar_pos'] == 'left' ? 'checked="checked"' : '';
    $right_checked = $options['sf_sidebar_pos'] == 'right' ? 'checked="checked"' : '';

	echo "<h6>For sidebar and/or button. </h6>";
   	echo "<div><input id='sf_sidebar_pos_left' name='sf_options[sf_sidebar_pos]' type='radio' {$left_checked} value='left' style='' /> <label for='sf_sidebar_pos_left'></label></div>";
   	echo "<div><input id='sf_sidebar_pos_right' name='sf_options[sf_sidebar_pos]' type='radio' {$right_checked} value='right' style='' /> <label for='sf_sidebar_pos_right'></label></div>";
}

function sf_css_str()
{
    $options = sf_get_options();
    echo "<textarea cols='100' rows='10' id='sf_css' name='sf_options[sf_css]' >" . $options['sf_css'] . "</textarea>";
}

function sf_facebook_str() {
	$options = sf_get_options();
	echo " <input id='sf_facebook' name='sf_options[sf_facebook]' size='100' type='text' value='{$options['sf_facebook']}' style='' />";
}

function sf_twitter_str() {
	$options = sf_get_options();
	echo " <input id='sf_twitter' name='sf_options[sf_twitter]' size='100' type='text' value='{$options['sf_twitter']}' style='' />";
}


function sf_pinterest_str() {
	$options = sf_get_options();
	echo " <input id='sf_pinterest' name='sf_options[sf_pinterest]' size='100' type='text' value='{$options['sf_pinterest']}' style='' />";
}
function sf_youtube_str() {
	$options = sf_get_options();
	echo " <input id='sf_youtube' name='sf_options[sf_youtube]' size='100' type='text' value='{$options['sf_youtube']}' style='' />";
}
function sf_instagram_str() {
	$options = sf_get_options();
	echo " <input id='sf_instagram' name='sf_options[sf_instagram]' size='100' type='text' value='{$options['sf_instagram']}' style='' />";
}
function sf_linkedin_str() {
	$options = sf_get_options();
	echo " <input id='sf_linkedin' name='sf_options[sf_linkedin]' size='100' type='text' value='{$options['sf_linkedin']}' style='' />";
}
function sf_dribbble_str() {
	$options = sf_get_options();
	echo " <input id='sf_dribbble' name='sf_options[sf_dribbble]' size='100' type='text' value='{$options['sf_dribbble']}' style='' />";
}
function sf_vimeo_str() {
	$options = sf_get_options();
	echo " <input id='sf_vimeo' name='sf_options[sf_vimeo]' size='100' type='text' value='{$options['sf_vimeo']}' style='' />";
}
function sf_soundcloud_str() {
	$options = sf_get_options();
	echo " <input id='sf_soundcloud' name='sf_options[sf_soundcloud]' size='100' type='text' value='{$options['sf_soundcloud']}' style='' />";
}
function sf_email_str() {
	$options = sf_get_options();
	echo " <input id='sf_email' name='sf_options[sf_email]' size='100' type='text' value='{$options['sf_email']}' style='' />";
}
function sf_flickr_str() {
	$options = sf_get_options();
	echo " <input id='sf_flickr' name='sf_options[sf_flickr]' size='100' type='text' value='{$options['sf_flickr']}' style='' />";
}
function sf_skype_str() {
	$options = sf_get_options();
	echo " <input id='sf_skype' name='sf_options[sf_skype]' size='100' type='text' value='{$options['sf_skype']}' style='' />";
}
function sf_above_logo_str() {
	$options = sf_get_options();
	wp_editor($options['sf_above_logo'], 'sf_above_logo', array(
        'textarea_name' => 'sf_options[sf_above_logo]',
        'textarea_rows' => 6,
        'quicktags' => true,
        'media_buttons' => true,
        'wpautop' => false,
    ) );
}
function sf_under_logo_str() {
	$options = sf_get_options();
	wp_editor($options['sf_under_logo'], 'sf_under_logo', array(
        'textarea_name' => 'sf_options[sf_under_logo]',
        'textarea_rows' => 6,
        'quicktags' => true,
        'media_buttons' => true,
        'wpautop' => false,
    ) );
}
function sf_copy_str() {
	$options = sf_get_options();
	wp_editor($options['sf_copy'], 'sf_copy', array(
        'textarea_name' => 'sf_options[sf_copy]',
        'textarea_rows' => 6,
        'quicktags' => true,
        'media_buttons' => true,
        'wpautop' => false,
    ) );
}


function sf_gplus_str() {
	$options = sf_get_options();
	echo " <input id='sf_gplus' name='sf_options[sf_gplus]' size='100' type='text' value='{$options['sf_gplus']}' style='' />";
}
function sf_rss_str() {
	$options = sf_get_options();
	echo " <input id='sf_rss' name='sf_options[sf_rss]' size='100' type='text' value='{$options['sf_rss']}' style='' />";
}

function sf_submenu_support_str() {
	$options = sf_get_options();
    $first_checked = isset( $options['sf_submenu_support'] ) && $options['sf_submenu_support'] && $options['sf_submenu_support'] != 'no' ? 'checked="checked"' : '';

	echo "
	<h6>Turn it on to enable submenu panels.</h6>
	<p><label for='sf_submenu_support'><input id='sf_submenu_support' name='sf_options[sf_submenu_support]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_video_preload_str() {
    $options = sf_get_options();
    $first_checked = isset( $options['sf_video_preload'] ) && $options['sf_video_preload'] && $options['sf_video_preload'] != 'no' ? 'checked="checked"' : '';

    echo "
	<label for='sf_video_preload'><input id='sf_video_preload' name='sf_options[sf_video_preload]' class='' type='checkbox' value='yes' {$first_checked} style='' /> Preload video (increases page load)</label></p>
	";
}
function sf_video_mob_str() {
    $options = sf_get_options();
    $first_checked = isset( $options['sf_video_mob'] ) && $options['sf_video_mob'] && $options['sf_video_mob'] != 'no' ? 'checked="checked"' : '';

    echo "
	<label for='sf_video_mob'><input id='sf_video_mob' name='sf_options[sf_video_mob]' class='' type='checkbox' value='yes' {$first_checked} style='' /> Desktops only</label></p>
	";
}
function sf_parent_ignore_str() {
	$options = sf_get_options();
    $first_checked = isset( $options['sf_parent_ignore'] ) && $options['sf_parent_ignore'] && $options['sf_parent_ignore'] != 'no' ? 'checked="checked"' : '';

    echo "<h6>If checked then clicking parent link will expand submenu (if any) instead of navigating to link. Also useful when parent menu items are not links.</h6>";
	echo "
	<p><label for='sf_parent_ignore'><input id='sf_parent_ignore' name='sf_options[sf_parent_ignore]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}
function sf_submenu_mob_str() {
	$options = sf_get_options();
	$first_checked = isset( $options['sf_submenu_mob'] ) && $options['sf_submenu_mob'] && $options['sf_parent_ignore'] != 'no' ? 'checked="checked"' : '';

	echo "
	<p><label for='sf_submenu_mob'><input id='sf_submenu_mob' name='sf_options[sf_submenu_mob]' class='switcher' type='checkbox' value='yes' {$first_checked} style='' /></label></p>
	";
}

function sf_submenu_classes_str()
{
	$options = sf_get_options();
	echo "<h6>Comma-separated if multiple without spaces(!).</h6>";
	echo "<input id='sf_submenu_classes' name='sf_options[sf_submenu_classes]' type='text' value='{$options['sf_submenu_classes']}' style='' />";
}

function sf_interval_str()
{
	$options = sf_get_options();
	echo "<h6>Try to adjust if you have submenus opening issues on mobiles (eg. set 200 or 350). In milliseconds</h6>";
	echo "<input id='sf_interval' name='sf_options[sf_interval]' type='text' value='{$options['sf_interval']}' style='' />";
}

function sf_togglers_str()
{
	$options = sf_get_options();
	echo "<h6>Enter valid CSS selector like #id or .class. <a href='http://superfly.looks-awesome.com/docs/Customize/Custom_Menu_Trigger' title='Guide' target='_blank'>Guide</a>.</h6>";
	echo "<input id='sf_togglers' name='sf_options[sf_togglers]' type='text' value='{$options['sf_togglers']}' style='' />";
}

function sf_icons_manager_str(){
    echo '<p class="hint">Learn more from <a href="http://superfly.looks-awesome.com/docs/Customize/Upload_Your_Icons" target="_blank">this guide</a>.</p>';
    echo '<div id="la_icon_manager_library"></div>';
    echo '<script type="text/javascript">
        jQuery(function($) {
            $(document).on("iconManagerCollectionLoaded", function(){
                window["la_icon_manager_library"] = new LAIconManager("library", "#la_icon_manager_library", window["la_icon_manager_collection"]);
                window["la_icon_manager_library"].showLibrary();
            });
        });
        </script>';
}

function sf_license_text_str(){
    $options = sf_get_options();
    $val = $options['sf_license_valid'];

    if($val){
        echo '<p class="hint">
        Thanks for choosing Superfly as your WordPress menu plugin! <br/>
        All the upcoming premium benefits will be unlocked for you automatically. <br/>
        You can still subscribe/unsubscribe for important updates by choosing checkbox below and clicking "save changes" button.
        </p>';
    }else{
        echo '<p class="hint">
        Fill the quick form below to register your copy of Superfly plugin. <br/>
        Activated copy of Superfly will provide you premium features like auto-updating in future. <br/> 
        We work on plugin improvements constantly. Thanks for using and activating Superfly plugin!
        </p>';
    }
}

function get_license()
{
    $options = sf_get_options();
    $val = $options['sf_license_valid'];
    $theme = wp_get_theme();

	if($options['sf_license_code'] == '' || $options['sf_license_email'] == ''){
		$val = '';
	}

    /*if($theme->get('Name') != 'X' && $theme->get('Author') != 'Themeco' && $options['sf_license_code'] == ''){
        $val = '';
    }
	if($theme->get('Name') == 'X' && $theme->get('Author') == 'Themeco' && $options['sf_license_email'] == ''){
		$val = '';
	}
	if($theme->get('Name') == 'X' && $theme->get('Author') == 'Themeco' && $options['sf_license_email'] != ''){
		$val = '1';
	}*/

    return $val;
}

function sf_license_valid_str(){
    $val = get_license();

    echo "<input type='hidden' id='sf_license_valid' value='{$val}' name='sf_options[sf_license_valid]' value>";
}

function sf_license_fname_str(){
	$options = sf_get_options();
	$val = $options['sf_license_fname'];
	echo "<input placeholder='Enter first name here' 
                type='text' 
                size='100' 
                id='sf_license_fname' 
                value='{$val}' 
                name='sf_options[sf_license_fname]' value>";
}

function sf_license_lname_str(){
    $options = sf_get_options();
    $val = $options['sf_license_lname'];
    echo "<input placeholder='Enter last name here' 
                type='text' 
                size='100' 
                id='sf_license_lname' 
                value='{$val}' 
                name='sf_options[sf_license_lname]' value>";
}

function sf_license_email_str(){
	$options = sf_get_options();
	$val = $options['sf_license_email'];

	echo "<input placeholder='Enter valid email here' type='text' size='100' id='sf_license_email' value='{$val}' name='sf_options[sf_license_email]' value>";
}

function sf_license_code_str(){
	$options = sf_get_options();
	$val = $options['sf_license_code'];
    $class = $options['sf_license_valid'] && $val ? 'validation-success' : '';
    $theme = wp_get_theme();
	$isX = $theme->get('Name') == 'X' && $theme->get('Author') == 'Themeco';

	if($isX){
        echo "<p class='hint validation-success'>Your copy of Superfly is validated with your X theme license</p>";
		echo "<input data-x='{$isX}' type='hidden' id='sf_license_code' value='{$val}' name='sf_options[sf_license_code]' value>";
    }else{
        echo "<p class='hint'>
			<a target='_blank' href=\"https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-\">
				Where's my purchase code?
			</a>
		</p>";
        echo '<div class="purchase-code">';
		echo "<input placeholder='Paste code here' class='{$class}' type='text' size='100' id='sf_license_code' value='{$val}' name='sf_options[sf_license_code]' value>";
        echo "<span class='code-error'>Invalid code</span>";
        echo '</div>';
	}
}

function sf_license_subscribe_str(){
	$options = sf_get_options();
	$val = $options['sf_license_subscribe'];
	$checked = $val == 'yep' ? 'checked' : '';
	echo "<input id='sf_license_subscribe' type='checkbox' name='sf_options[sf_license_subscribe]' value='yep' {$checked} />";
	echo "<label for='sf_license_subscribe'>Receive important announcements and updates on email. <strong>We won't spam you</strong>.</label>";
}

function sf_options_validate( $new_options ) {

        $default_options = sf_get_options();

		// Get the options array defined for the form
		foreach ( $default_options as $optionName => $optionValue ) {

            // first condition for unchecked checkbox
            if ( !isset( $new_options[ $optionName ] ) ) {

                // this is how we differentiate checkboxes in defaults
                if ( $default_options[ $optionName ] == 'yes' || $default_options[ $optionName ] == 'no' ) {
                    // we got unchecked and set it to 'no'
                    $new_options[ $optionName ] = 'no';
                    error_log( 'set to no' );
                    error_log( $optionName );
                }
            }
		}

	if (isset($_FILES['sf_pic']) && ($_FILES['sf_pic']['size'] > 0)) {

		// Get the type of the uploaded file. This is returned as "type/extension"
		$arr_file_type = wp_check_filetype(basename($_FILES['sf_pic']['name']));
		$uploaded_file_type = $arr_file_type['type'];

		// Set an array containing a list of acceptable formats
		$allowed_file_types = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');

		// If the uploaded file is the right format
		if (in_array($uploaded_file_type, $allowed_file_types)) {

			// Options array for the wp_handle_upload function. 'test_upload' => false
			$upload_overrides = array('test_form' => false);

			//delete previous
			//if (isset($new_options['sf_pic'])) unlink($new_options['sf_pic']);

			$uploaded_file = wp_handle_upload($_FILES['sf_pic'], $upload_overrides);

			// If the wp_handle_upload call returned a local path for the image
			if (isset($uploaded_file['file'])) {
				// The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
				$file_name_and_location = $uploaded_file['file'];
				$wp_upload_dir = wp_upload_dir();
				$new_options['sf_tab_logo'] = $wp_upload_dir['url'] . '/' . basename($file_name_and_location);
			} else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.
				$upload_feedback = 'There was a problem with your upload.';
			}

		} else { // wrong file type
			$upload_feedback = 'Please upload only image files (jpg, gif or png).';
		}

	} else { // No file was passed
		$upload_feedback = false;
	}
	return $new_options;
}