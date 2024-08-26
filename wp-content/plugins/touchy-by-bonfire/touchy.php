<?php
/*
Plugin Name: Touchy, by Bonfire 
Plugin URI: http://bonfirethemes.com/
Description: Mobile Menu and Header for WordPress. Customize under Appearance → Customize → Touchy Plugin
Version: 4.8
Author: Bonfire Themes
Author URI: http://bonfirethemes.com/
Text Domain: touchy-menu
Domain Path: /languages
License: GPL2
*/

    //
	// WORDPRESS LIVE CUSTOMIZER
	//
	function touchy_theme_customizer( $wp_customize ) {
	
        //
        // ADD "TOUCHY" PANEL TO LIVE CUSTOMIZER 
        //
        $wp_customize->add_panel('touchy_panel', array('title' => esc_html__('Touchy Plugin', 'touchy-menu'),'priority' => 10,));

        //
        // ADD "LOGO & LOGO AREA" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_logo_section',array('title' => esc_html__('Logo & Logo Area','touchy-menu'),'panel' => 'touchy_panel','priority' => 9));
        
        /* hide logo area */
        $wp_customize->add_setting('bonfire_touchy_hide_logo_area',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_logo_area',));
        function sanitize_bonfire_touchy_hide_logo_area( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_logo_area',array('type' => 'checkbox','label' => esc_html__('Hide logo area','touchy-menu'),'description' => esc_html__('If selected, the entire logo area will be hidden on all pages.','touchy-menu'),'section' => 'touchy_logo_section',));
        
        /* hide logo area background */
        $wp_customize->add_setting('bonfire_touchy_hide_logo_background',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_logo_background',));
        function sanitize_bonfire_touchy_hide_logo_background( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_logo_background',array('type' => 'checkbox','label' => esc_html__('Hide logo area background','touchy-menu'),'description' => esc_html__('If selected, the logo area background will be transparent.','touchy-menu'),'section' => 'touchy_logo_section',));
        
        /* hide logo area background shadow */
        $wp_customize->add_setting('bonfire_touchy_hide_logo_background_shadow',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_logo_background_shadow',));
        function sanitize_bonfire_touchy_hide_logo_background_shadow( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_logo_background_shadow',array('type' => 'checkbox','label' => esc_html__('Hide logo area background shadow','touchy-menu'),'description' => esc_html__('If selected, the logo area background shadow will be hidden.','touchy-menu'),'section' => 'touchy_logo_section',));
        
        /* logo area background color */
        $wp_customize->add_setting( 'bonfire_touchy_logo_area_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_logo_area_background_color',array(
            'label' => esc_html__('Background','touchy-menu'), 'settings' => 'bonfire_touchy_logo_area_background_color', 'section' => 'touchy_logo_section' )
        ));
        
        /* logo color */
        $wp_customize->add_setting( 'bonfire_touchy_logo_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_logo_color',array(
            'label' => esc_html__('Logo','touchy-menu'), 'settings' => 'bonfire_touchy_logo_color', 'section' => 'touchy_logo_section' )
        ));
        
        /* logo hover color */
        $wp_customize->add_setting( 'bonfire_touchy_logo_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_logo_hover_color',array(
            'label' => esc_html__('Logo hover','touchy-menu'), 'settings' => 'bonfire_touchy_logo_hover_color', 'section' => 'touchy_logo_section' )
        ));
        
        /* logo alignment */
        $wp_customize->add_setting('bonfire_touchy_logo_align',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('bonfire_touchy_logo_align',array(
            'type' => 'select',
            'label' => esc_html__('Logo alignment','touchy-menu'),
            'section' => 'touchy_logo_section',
            'choices' => array(
                'left' => esc_html__('Left','touchy-menu'),
                'center' => esc_html__('Center','touchy-menu'),
                'right' => esc_html__('Right','touchy-menu'),
        ),
        ));
        
        /* logo image */
        $wp_customize->add_setting('bonfire_touchy_logo_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bonfire_touchy_logo_image',
            array(
                'label' => esc_html__('Logo image','touchy-menu'),
                'description' => wp_kses( __('<strong>How to add retina logo:</strong> Enable retina script in Misc section, then upload both the regular and retina logo files and make sure they are named correctly. If retina logo is uploaded, it will be shown on retina screens with no further setup necessary. <br><br> Example:<br> my-logo.png and my-logo@2x.png (note that the retina logo must have "@2x" at the end. @3x images work as well.).<br><br>','touchy-menu'), $allowed_html_array ),
                'settings' => 'bonfire_touchy_logo_image',
                'section' => 'touchy_logo_section',
        )
        ));

        /* logo image height */
        $wp_customize->add_setting('bonfire_touchy_logo_image_height',array('sanitize_callback' => 'sanitize_bonfire_touchy_logo_image_height',));
        function sanitize_bonfire_touchy_logo_image_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_logo_image_height',array(
            'type' => 'text',
            'label' => esc_html__('Logo height (in pixels)','touchy-menu'),
            'description' => esc_html__('Fine-tune logo size. Example: 30. If empty, defaults to 40.','touchy-menu'),
            'section' => 'touchy_logo_section',
        ));
        
        /* logo area background image */
        $wp_customize->add_setting('bonfire_touchy_logo_area_bg_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bonfire_touchy_logo_area_bg_image',
            array(
                'label' => esc_html__('Logo area background image','touchy-menu'),
                'settings' => 'bonfire_touchy_logo_area_bg_image',
                'section' => 'touchy_logo_section',
        )
        ));
        
        /* logo area background image full size */
        $wp_customize->add_setting('bonfire_touchy_logo_area_bg_image_cover',array('sanitize_callback' => 'sanitize_bonfire_touchy_logo_area_bg_image_cover',));
        function sanitize_bonfire_touchy_logo_area_bg_image_cover( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_logo_area_bg_image_cover',array('type' => 'checkbox','label' => esc_html__('Full background','touchy-menu'),'description' => esc_html__('By default, the background image will be shown as a pattern. If this option is selected, it will be displayed as a full background instead.','touchy-menu'),'section' => 'touchy_logo_section',));
        
        /* logo area background image opacity */
        $wp_customize->add_setting('bonfire_touchy_logo_area_bg_image_opacity',array('sanitize_callback' => 'sanitize_bonfire_touchy_logo_area_bg_image_opacity',));
        function sanitize_bonfire_touchy_logo_area_bg_image_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_logo_area_bg_image_opacity',array(
            'type' => 'text',
            'label' => esc_html__('Logo area background image opacity','touchy-menu'),
            'description' => esc_html__('Example: 0.5 or 0.75. If empty, defaults to 0.1','touchy-menu'),
            'section' => 'touchy_logo_section',
        ));

        //
        // ADD "MENUBAR" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_menubar_section',array('title' => esc_html__('Menubar','touchy-menu'),'panel' => 'touchy_panel','priority' => 9));
        
        /* menubar background color */
        $wp_customize->add_setting( 'bonfire_touchy_menubar_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menubar_background_color',array(
            'label' => esc_html__('Menubar background','touchy-menu'), 'settings' => 'bonfire_touchy_menubar_background_color', 'description' => 'When color chosen, individual button background colors get overridden.', 'section' => 'touchy_menubar_section' )
        ));

        /* FA font size */
        $wp_customize->add_setting('bonfire_touchy_fa_icon_font_size',array('sanitize_callback' => 'sanitize_bonfire_touchy_fa_icon_font_size',));
        function sanitize_bonfire_touchy_fa_icon_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_fa_icon_font_size',array(
            'type' => 'text',
            'label' => esc_html__('Font/Line Awesome icon size (in pixels)','touchy-menu'),
            'description' => esc_html__('Applied when Font Awesome or Line Awesome icons are used instead of default menubar buttons. If empty, defaults to 22','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));

        /* text label font size */
        $wp_customize->add_setting('bonfire_touchy_text_label_font_size',array('sanitize_callback' => 'sanitize_bonfire_touchy_text_label_font_size',));
        function sanitize_bonfire_touchy_text_label_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_text_label_font_size',array(
            'type' => 'text',
            'label' => esc_html__('Text label font size (in pixels)','touchy-menu'),
            'description' => esc_html__('If empty, defaults to 10','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));
        
        /* menubar button dividers margin */
        $wp_customize->add_setting('bonfire_touchy_button_separator_margin',array('sanitize_callback' => 'sanitize_bonfire_touchy_button_separator_margin',));
        function sanitize_bonfire_touchy_button_separator_margin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_button_separator_margin',array(
            'type' => 'text',
            'label' => esc_html__('Menu button dividers margin (in pixels)','touchy-menu'),
            'description' => esc_html__('Changes the top and bottom margins for the menubar dividers. If empty, defaults to 5','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));
        
        /* menubar button dividers */
        $wp_customize->add_setting( 'bonfire_touchy_button_separator_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_button_separator_color',array(
            'label' => esc_html__('Menu button dividers','touchy-menu'), 'settings' => 'bonfire_touchy_button_separator_color', 'section' => 'touchy_menubar_section' )
        ));
        
        /* bottom position */
        $wp_customize->add_setting('bonfire_touchy_bottom_position',array('sanitize_callback' => 'sanitize_bonfire_touchy_bottom_position',));
        function sanitize_bonfire_touchy_bottom_position( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_bottom_position',array('type' => 'checkbox','label' => esc_html__('Bottom positioning','touchy-menu'),'description' => esc_html__('If selected, menu buttons will be placed at the bottom of the screen.','touchy-menu'), 'section' => 'touchy_menubar_section',));
        
        /* hide menubar dividers */
        $wp_customize->add_setting('bonfire_touchy_hide_menubar_separators',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_menubar_separators',));
        function sanitize_bonfire_touchy_hide_menubar_separators( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_menubar_separators',array('type' => 'checkbox','label' => esc_html__('Hide menu button dividers','touchy-menu'),'description' => esc_html__('If you want an even cleaner look, this option hides the vertical dividers between the menubar menu buttons.','touchy-menu'), 'section' => 'touchy_menubar_section',));

        /* increase menubar shadow size on scroll */
        $wp_customize->add_setting('bonfire_touchy_scroll_shadow',array('sanitize_callback' => 'sanitize_bonfire_touchy_scroll_shadow',));
        function sanitize_bonfire_touchy_scroll_shadow( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_scroll_shadow',array('type' => 'checkbox','label' => esc_html__('Increase menubar shadow on scroll','touchy-menu'),'description' => esc_html__('When page is scrolled down, menubar shadow size is subtly increased for effect. Note: Only applies when bottom positioning not selected.','touchy-menu'), 'section' => 'touchy_menubar_section',));
        
        /* hide menubar shadow */
        $wp_customize->add_setting('bonfire_touchy_hide_shadow',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_shadow',));
        function sanitize_bonfire_touchy_hide_shadow( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_shadow',array('type' => 'checkbox','label' => esc_html__('Hide menubar shadow','touchy-menu'),'description' => esc_html__('Note: Shadow size increase on scroll option can still be applied.','touchy-menu'), 'section' => 'touchy_menubar_section',));
        
        /* menubar border top placement */
        $wp_customize->add_setting('bonfire_touchy_bar_border',array('sanitize_callback' => 'sanitize_bonfire_touchy_bar_border',));
        function sanitize_bonfire_touchy_bar_border( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_bar_border',array('type' => 'checkbox','label' => esc_html__('Show menubar borders at the top','touchy-menu'),'description' => esc_html__('When enabled, the colored menubar borders will appear at the bottom (border colors are set in individual button sections).','touchy-menu'), 'section' => 'touchy_menubar_section',));
        
        /* menubar height */
        $wp_customize->add_setting('bonfire_touchy_menu_height',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_height',));
        function sanitize_bonfire_touchy_menu_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_height',array(
            'type' => 'text',
            'label' => esc_html__('Menubar height (in pixels)','touchy-menu'),
            'description' => esc_html__('Example: 75. If emtpy, defaults to 50.','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));
        
        /* menubar transparency */
        $wp_customize->add_setting('bonfire_touchy_menu_transparency',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_transparency',));
        function sanitize_bonfire_touchy_menu_transparency($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_transparency',array(
            'type' => 'text',
            'label' => esc_html__('Menubar transparency (from 0-1)','touchy-menu'),
            'description' => esc_html__('Example: 0.9 or 0.95. If emtpy, defaults to 1. You probably want to keep this at 0.95 and above, to have that very subtle see-through effect. Depending on how you color customize your menu though, you could go lower.','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));

        /* menubar left/right padding */
        $wp_customize->add_setting('bonfire_touchy_menu_paddings',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_paddings',));
        function sanitize_bonfire_touchy_menu_paddings($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_paddings',array(
            'type' => 'text',
            'label' => esc_html__('Menubar left/right padding (in pixels)','touchy-menu'),
            'description' => esc_html__('Adds extra space before the first and after the last menubar button. Example: 25. If emtpy, defaults to 0.','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));

        /* menu distance from edges */
        $wp_customize->add_setting('bonfire_touchy_menu_margins',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_margins',));
        function sanitize_bonfire_touchy_menu_margins($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_margins',array(
            'type' => 'text',
            'label' => esc_html__('Menubar margin (in pixels)','touchy-menu'),
            'description' => esc_html__('Sets custom menubar distance from edges of screen. Example: 5 or 10. If emtpy, defaults to 0.','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));

        /* menubar top corner roundness */
        $wp_customize->add_setting('bonfire_touchy_menu_top_corner',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_top_corner',));
        function sanitize_bonfire_touchy_menu_top_corner($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_top_corner',array(
            'type' => 'text',
            'label' => esc_html__('Menubar top corner roundness (in pixels)','touchy-menu'),
            'description' => esc_html__('Example: 5 or 50. If emtpy, defaults to 0.','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));

        /* menubar bottom corner roundness */
        $wp_customize->add_setting('bonfire_touchy_menu_bottom_corner',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_bottom_corner',));
        function sanitize_bonfire_touchy_menu_bottom_corner($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_bottom_corner',array(
            'type' => 'text',
            'label' => esc_html__('Menubar bottom corner roundness (in pixels)','touchy-menu'),
            'description' => esc_html__('Example: 5 or 50. If emtpy, defaults to 0.','touchy-menu'),
            'section' => 'touchy_menubar_section',
        ));

        //
        // ADD "BACK BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_back_button_section',array('title' => esc_html__('Back Button','touchy-menu'),'panel' => 'touchy_panel','priority' => 10));
        
        /* hide Back button */
        $wp_customize->add_setting('bonfire_touchy_hide_back_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_back_button',));
        function sanitize_bonfire_touchy_hide_back_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_back_button',array('type' => 'checkbox','label' => esc_html__('Hide back button','touchy-menu'),'description' => esc_html__('If selected, the Back button will be hidden on all pages.','touchy-menu'),'section' => 'touchy_back_button_section',));
        
        /* show alternate back button */
        $wp_customize->add_setting('bonfire_touchy_alt_back_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_alt_back_button',));
        function sanitize_bonfire_touchy_alt_back_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_alt_back_button',array('type' => 'checkbox','label' => esc_html__('Alternate back icon','touchy-menu'),'description' => esc_html__('Display an alternate call icon design.','touchy-menu'),'section' => 'touchy_back_button_section',));

        /* display Back button to logged in users only */
        $wp_customize->add_setting('bonfire_touchy_back_button_loggedin',array('sanitize_callback' => 'sanitize_bonfire_touchy_back_button_loggedin',));
        function sanitize_bonfire_touchy_back_button_loggedin( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_back_button_loggedin',array('type' => 'checkbox','label' => esc_html__('Display only when logged in','touchy-menu'),'description' => esc_html__('When ticked, only users who have logged in will see this button.','touchy-menu'), 'section' => 'touchy_back_button_section',));
        
        /* back button color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_color',array(
            'label' => esc_html__('Button background','touchy-menu'), 'settings' => 'bonfire_touchy_back_button_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_hover_color',array(
            'label' => esc_html__('Button background hover','touchy-menu'), 'settings' => 'bonfire_touchy_back_button_hover_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_icon_color',array(
            'label' => esc_html__('Button icon','touchy-menu'), 'settings' => 'bonfire_touchy_back_button_icon_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_icon_hover_color',array(
            'label' => esc_html__('Button icon hover','touchy-menu'), 'settings' => 'bonfire_touchy_back_button_icon_hover_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button label */
        $wp_customize->add_setting('bonfire_touchy_back_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_back_icon_label',));
        function sanitize_bonfire_touchy_back_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_back_icon_label',array(
            'type' => 'text',
            'label' => esc_html__('Text label','touchy-menu'),
            'description' => esc_html__('A text label to be shown below icon','touchy-menu'),
            'section' => 'touchy_back_button_section',
        ));
        
        /* back button label color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_label_color',array(
            'label' => esc_html__('Text label','touchy-menu'), 'settings' => 'bonfire_touchy_back_button_label_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_label_hover_color',array(
            'label' => esc_html__('Text label hover','touchy-menu'), 'settings' => 'bonfire_touchy_back_button_label_hover_color', 'section' => 'touchy_back_button_section' )
        ));
        
        /* back button bottom border color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_border_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_border_color',array(
            'label' => esc_html__('Border','touchy-menu'), 'settings' => 'bonfire_touchy_back_button_border_color', 'section' => 'touchy_back_button_section' )
        ));

        /* back button bottom border hover color */
        $wp_customize->add_setting( 'bonfire_touchy_back_button_border_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_back_button_border_hover_color',array(
            'label' => esc_html__('Border hover','touchy-menu'), 'settings' => 'bonfire_touchy_back_button_border_hover_color', 'section' => 'touchy_back_button_section' )
        ));

        /* custom Back icon */
        $wp_customize->add_setting('bonfire_touchy_back_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_back_icon',));
        function sanitize_bonfire_touchy_back_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_back_icon',array(
            'type' => 'text',
            'label' => esc_html__('Custom icon','touchy-menu'),
            'description' => wp_kses( __('<strong>Font Awesome</strong> icons can be viewed <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-solid fa-heart-pulse</strong>, <strong>fa-regular fa-calendar</strong> etc). <strong>Line Awesome</strong> icons can be viewed <a href="https://icons8.com/line-awesome" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>las la-coffee</strong>, <strong>las la-address-book</strong> etc). Please find detailed information in the Touchy documentation. When empty, default icon is shown.','touchy-menu'), $allowed_html_array ),
            'section' => 'touchy_back_button_section',
        ));
        
        /* Back link override */
        $wp_customize->add_setting('bonfire_touchy_back_link',array('sanitize_callback' => 'sanitize_bonfire_touchy_back_link',));
        function sanitize_bonfire_touchy_back_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_back_link',array(
            'type' => 'text',
            'label' => esc_html__('Link override','touchy-menu'),
            'description' => esc_html__('If you would like to override the back button function with a custom link, enter it below. Combined with a custom icon (set above), this allows you to give the back button a completely different function. If left empty, defaults to back function.','touchy-menu'),
            'section' => 'touchy_back_button_section',
        ));
        
        /* Back link new window */
        $wp_customize->add_setting('bonfire_touchy_back_new_tab',array('sanitize_callback' => 'sanitize_bonfire_touchy_back_new_tab',));
        function sanitize_bonfire_touchy_back_new_tab( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_back_new_tab',array('type' => 'checkbox','label' => esc_html__('Open in new tab/window','touchy-menu'),'section' => 'touchy_back_button_section',));
        
        //
        // ADD "CALL BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_call_button_section',array('title' => esc_html__('Call Button','touchy-menu'),'panel' => 'touchy_panel','priority' => 11));
        
        /* hide Call button */
        $wp_customize->add_setting('bonfire_touchy_hide_call_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_call_button',));
        function sanitize_bonfire_touchy_hide_call_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_call_button',array('type' => 'checkbox','label' => esc_html__('Hide call button','touchy-menu'),'description' => esc_html__('If selected, the Call button will be hidden on all pages.','touchy-menu'),'section' => 'touchy_call_button_section',));
        
        /* show alternate call button */
        $wp_customize->add_setting('bonfire_touchy_alt_call_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_alt_call_button',));
        function sanitize_bonfire_touchy_alt_call_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_alt_call_button',array('type' => 'checkbox','label' => esc_html__('Alternate call icon','touchy-menu'),'description' => esc_html__('Display an alternate call icon design.','touchy-menu'),'section' => 'touchy_call_button_section',));
        
        /* display call button to logged in users only */
        $wp_customize->add_setting('bonfire_touchy_call_button_loggedin',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_button_loggedin',));
        function sanitize_bonfire_touchy_call_button_loggedin( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_call_button_loggedin',array('type' => 'checkbox','label' => esc_html__('Display only when logged in','touchy-menu'),'description' => esc_html__('When ticked, only users who have logged in will see this button.','touchy-menu'), 'section' => 'touchy_call_button_section',));
        
        /* phone number */
        $wp_customize->add_setting('bonfire_touchy_phone_number',array('sanitize_callback' => 'sanitize_bonfire_touchy_phone_number',));
        function sanitize_bonfire_touchy_phone_number($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_phone_number',array(
            'type' => 'text',
            'label' => esc_html__('Phone number','touchy-menu'),
            'description' => esc_html__('Enter your phone number','touchy-menu'),
            'section' => 'touchy_call_button_section',
        ));
        
        /* call button color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_color',array(
            'label' => esc_html__('Button background','touchy-menu'), 'settings' => 'bonfire_touchy_call_button_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_hover_color',array(
            'label' => esc_html__('Button background hover','touchy-menu'), 'settings' => 'bonfire_touchy_call_button_hover_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_icon_color',array(
            'label' => esc_html__('Button icon','touchy-menu'), 'settings' => 'bonfire_touchy_call_button_icon_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_icon_hover_color',array(
            'label' => esc_html__('Button icon hover','touchy-menu'), 'settings' => 'bonfire_touchy_call_button_icon_hover_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button label */
        $wp_customize->add_setting('bonfire_touchy_call_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_icon_label',));
        function sanitize_bonfire_touchy_call_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_call_icon_label',array(
            'type' => 'text',
            'label' => esc_html__('Text label','touchy-menu'),
            'description' => esc_html__('A text label to be shown below icon','touchy-menu'),
            'section' => 'touchy_call_button_section',
        ));
        
        /* call button label color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_label_color',array(
            'label' => esc_html__('Text label','touchy-menu'), 'settings' => 'bonfire_touchy_call_button_label_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* call button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_label_hover_color',array(
            'label' => esc_html__('Text label hover','touchy-menu'), 'settings' => 'bonfire_touchy_call_button_label_hover_color', 'section' => 'touchy_call_button_section' )
        ));

        /* call button bottom border color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_border_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_border_color',array(
            'label' => esc_html__('Border','touchy-menu'), 'settings' => 'bonfire_touchy_call_button_border_color', 'section' => 'touchy_call_button_section' )
        ));

        /* call button bottom border hover color */
        $wp_customize->add_setting( 'bonfire_touchy_call_button_border_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_call_button_border_hover_color',array(
            'label' => esc_html__('Border hover','touchy-menu'), 'settings' => 'bonfire_touchy_call_button_border_hover_color', 'section' => 'touchy_call_button_section' )
        ));
        
        /* custom Call icon */
        $wp_customize->add_setting('bonfire_touchy_call_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_icon',));
        function sanitize_bonfire_touchy_call_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_call_icon',array(
            'type' => 'text',
            'label' => esc_html__('Custom icon','touchy-menu'),
            'description' => wp_kses( __('<strong>Font Awesome</strong> icons can be viewed <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-solid fa-heart-pulse</strong>, <strong>fa-regular fa-calendar</strong> etc). <strong>Line Awesome</strong> icons can be viewed <a href="https://icons8.com/line-awesome" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>las la-coffee</strong>, <strong>las la-address-book</strong> etc). Please find detailed information in the Touchy documentation. When empty, default icon is shown.','touchy-menu'), $allowed_html_array ),
            'section' => 'touchy_call_button_section',
        ));
        
        /* Call link override */
        $wp_customize->add_setting('bonfire_touchy_call_link',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_link',));
        function sanitize_bonfire_touchy_call_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_call_link',array(
            'type' => 'text',
            'label' => esc_html__('Link override','touchy-menu'),
            'description' => esc_html__('If you would like to override the call button function with a custom link, enter it below. Combined with a custom icon (set above), this allows you to give the call button a completely different function. If left empty, defaults to call function.','touchy-menu'),
            'section' => 'touchy_call_button_section',
        ));
        
        /* Call link new window */
        $wp_customize->add_setting('bonfire_touchy_call_new_tab',array('sanitize_callback' => 'sanitize_bonfire_touchy_call_new_tab',));
        function sanitize_bonfire_touchy_call_new_tab( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_call_new_tab',array('type' => 'checkbox','label' => esc_html__('Open in new tab/window','touchy-menu'),'section' => 'touchy_call_button_section',));
        
        //
        // ADD "EMAIL BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_email_button_section',array('title' => esc_html__('Email Button','touchy-menu'),'panel' => 'touchy_panel','priority' => 12));
        
        /* hide Email button */
        $wp_customize->add_setting('bonfire_touchy_hide_email_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_email_button',));
        function sanitize_bonfire_touchy_hide_email_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_email_button',array('type' => 'checkbox','label' => esc_html__('Hide email button','touchy-menu'),'description' => esc_html__('If selected, the Email button will be hidden on all pages.','touchy-menu'),'section' => 'touchy_email_button_section',));
        
        /* show alternate email button */
        $wp_customize->add_setting('bonfire_touchy_alt_email_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_alt_email_button',));
        function sanitize_bonfire_touchy_alt_email_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_alt_email_button',array('type' => 'checkbox','label' => esc_html__('Alternate email icon','touchy-menu'),'description' => esc_html__('Display an alternate email icon design.','touchy-menu'),'section' => 'touchy_email_button_section',));
        
        /* display Email button to logged in users only */
        $wp_customize->add_setting('bonfire_touchy_email_button_loggedin',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_button_loggedin',));
        function sanitize_bonfire_touchy_email_button_loggedin( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_email_button_loggedin',array('type' => 'checkbox','label' => esc_html__('Display only when logged in','touchy-menu'),'description' => esc_html__('When ticked, only users who have logged in will see this button.','touchy-menu'), 'section' => 'touchy_email_button_section',));
        
        /* Email address */
        $wp_customize->add_setting('bonfire_touchy_email_address',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_address',));
        function sanitize_bonfire_touchy_email_address($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_address',array(
            'type' => 'text',
            'label' => esc_html__('Email address','touchy-menu'),
            'description' => esc_html__('Enter your email address','touchy-menu'),
            'section' => 'touchy_email_button_section',
        ));
        
        /* Email subject */
        $wp_customize->add_setting('bonfire_touchy_email_subject',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_subject',));
        function sanitize_bonfire_touchy_email_subject($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_subject',array(
            'type' => 'text',
            'label' => esc_html__('Email subject','touchy-menu'),
            'description' => esc_html__('Enter the default email subject. If empty, subject will be left to the user to fill.','touchy-menu'),
            'section' => 'touchy_email_button_section',
        ));
        
        /* email button color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_color',array(
            'label' => esc_html__('Button background','touchy-menu'), 'settings' => 'bonfire_touchy_email_button_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_hover_color',array(
            'label' => esc_html__('Button background hover','touchy-menu'), 'settings' => 'bonfire_touchy_email_button_hover_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_icon_color',array(
            'label' => esc_html__('Button icon','touchy-menu'), 'settings' => 'bonfire_touchy_email_button_icon_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_icon_hover_color',array(
            'label' => esc_html__('Button icon hover','touchy-menu'), 'settings' => 'bonfire_touchy_email_button_icon_hover_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button label */
        $wp_customize->add_setting('bonfire_touchy_email_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_icon_label',));
        function sanitize_bonfire_touchy_email_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_icon_label',array(
            'type' => 'text',
            'label' => esc_html__('Text label','touchy-menu'),
            'description' => esc_html__('A text label to be shown below icon','touchy-menu'),
            'section' => 'touchy_email_button_section',
        ));
        
        /* email button label color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_label_color',array(
            'label' => esc_html__('Text label','touchy-menu'), 'settings' => 'bonfire_touchy_email_button_label_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* email button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_label_hover_color',array(
            'label' => esc_html__('Text label hover','touchy-menu'), 'settings' => 'bonfire_touchy_email_button_label_hover_color', 'section' => 'touchy_email_button_section' )
        ));

        /* email button bottom border color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_border_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_border_color',array(
            'label' => esc_html__('Border','touchy-menu'), 'settings' => 'bonfire_touchy_email_button_border_color', 'section' => 'touchy_email_button_section' )
        ));

        /* email button bottom border hover color */
        $wp_customize->add_setting( 'bonfire_touchy_email_button_border_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_email_button_border_hover_color',array(
            'label' => esc_html__('Border hover','touchy-menu'), 'settings' => 'bonfire_touchy_email_button_border_hover_color', 'section' => 'touchy_email_button_section' )
        ));
        
        /* custom Email icon */
        $wp_customize->add_setting('bonfire_touchy_email_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_icon',));
        function sanitize_bonfire_touchy_email_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_icon',array(
            'type' => 'text',
            'label' => esc_html__('Custom icon','touchy-menu'),
            'description' => wp_kses( __('<strong>Font Awesome</strong> icons can be viewed <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-solid fa-heart-pulse</strong>, <strong>fa-regular fa-calendar</strong> etc). <strong>Line Awesome</strong> icons can be viewed <a href="https://icons8.com/line-awesome" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>las la-coffee</strong>, <strong>las la-address-book</strong> etc). Please find detailed information in the Touchy documentation. When empty, default icon is shown.','touchy-menu'), $allowed_html_array ),
            'section' => 'touchy_email_button_section',
        ));
        
        /* Email address override */
        $wp_customize->add_setting('bonfire_touchy_email_link',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_link',));
        function sanitize_bonfire_touchy_email_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_email_link',array(
            'type' => 'text',
            'label' => esc_html__('Email address override','touchy-menu'),
            'description' => esc_html__('If you would like to override the email button function with a custom link, enter it below. Combined with a custom icon (set above), this allows you to give the email button a completely different function. If left empty, defaults to email function.','touchy-menu'),
            'section' => 'touchy_email_button_section',
        ));
        
        /* Email link new window */
        $wp_customize->add_setting('bonfire_touchy_email_new_tab',array('sanitize_callback' => 'sanitize_bonfire_touchy_email_new_tab',));
        function sanitize_bonfire_touchy_email_new_tab( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_email_new_tab',array('type' => 'checkbox','label' => esc_html__('Open in new tab/window','touchy-menu'),'section' => 'touchy_email_button_section',));
        
        //
        // ADD "SEARCH BUTTON" SECTION TO "TOUCHY" PANEL
        //
        $wp_customize->add_section('touchy_search_button_section',array('title' => esc_html__('Search Button','touchy-menu'),'panel' => 'touchy_panel','priority' => 13));
        
        /* hide search button */
        $wp_customize->add_setting('bonfire_touchy_hide_search_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_search_button',));
        function sanitize_bonfire_touchy_hide_search_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_search_button',array('type' => 'checkbox','label' => esc_html__('Hide search button','touchy-menu'),'description' => esc_html__('If selected, the Search button will be hidden on all pages.','touchy-menu'),'section' => 'touchy_search_button_section',));
        
        /* show alternate search button */
        $wp_customize->add_setting('bonfire_touchy_alt_search_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_alt_search_button',));
        function sanitize_bonfire_touchy_alt_search_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_alt_search_button',array('type' => 'checkbox','label' => esc_html__('Alternate search icon','touchy-menu'),'description' => esc_html__('Display an alternate search icon design.','touchy-menu'),'section' => 'touchy_search_button_section',));
        
        /* display Search button to logged in users only */
        $wp_customize->add_setting('bonfire_touchy_search_button_loggedin',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_button_loggedin',));
        function sanitize_bonfire_touchy_search_button_loggedin( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_search_button_loggedin',array('type' => 'checkbox','label' => esc_html__('Display only when logged in','touchy-menu'),'description' => esc_html__('When ticked, only users who have logged in will see this button.','touchy-menu'), 'section' => 'touchy_search_button_section',));
        
        /* search button color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_color',array(
            'label' => esc_html__('Button background','touchy-menu'), 'settings' => 'bonfire_touchy_search_button_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_hover_color',array(
            'label' => esc_html__('Button background hover','touchy-menu'), 'settings' => 'bonfire_touchy_search_button_hover_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_icon_color',array(
            'label' => esc_html__('Button icon','touchy-menu'), 'settings' => 'bonfire_touchy_search_button_icon_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_icon_hover_color',array(
            'label' => esc_html__('Button icon hover','touchy-menu'), 'settings' => 'bonfire_touchy_search_button_icon_hover_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button label */
        $wp_customize->add_setting('bonfire_touchy_search_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_icon_label',));
        function sanitize_bonfire_touchy_search_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_icon_label',array(
            'type' => 'text',
            'label' => esc_html__('Text label','touchy-menu'),
            'description' => esc_html__('A text label to be shown below icon','touchy-menu'),
            'section' => 'touchy_search_button_section',
        ));
        
        /* search button label color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_label_color',array(
            'label' => esc_html__('Text label','touchy-menu'), 'settings' => 'bonfire_touchy_search_button_label_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* search button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_label_hover_color',array(
            'label' => esc_html__('Text label hover','touchy-menu'), 'settings' => 'bonfire_touchy_search_button_label_hover_color', 'section' => 'touchy_search_button_section' )
        ));

        /* search button bottom border color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_border_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_border_color',array(
            'label' => esc_html__('Border','touchy-menu'), 'settings' => 'bonfire_touchy_search_button_border_color', 'section' => 'touchy_search_button_section' )
        ));

        /* search button bottom border hover color */
        $wp_customize->add_setting( 'bonfire_touchy_search_button_border_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_button_border_hover_color',array(
            'label' => esc_html__('Border hover','touchy-menu'), 'settings' => 'bonfire_touchy_search_button_border_hover_color', 'section' => 'touchy_search_button_section' )
        ));
        
        /* custom Search icon */
        $wp_customize->add_setting('bonfire_touchy_search_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_icon',));
        function sanitize_bonfire_touchy_search_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_icon',array(
            'type' => 'text',
            'label' => esc_html__('Custom icon','touchy-menu'),
            'description' => wp_kses( __('<strong>Font Awesome</strong> icons can be viewed <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-solid fa-heart-pulse</strong>, <strong>fa-regular fa-calendar</strong> etc). <strong>Line Awesome</strong> icons can be viewed <a href="https://icons8.com/line-awesome" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>las la-coffee</strong>, <strong>las la-address-book</strong> etc). Please find detailed information in the Touchy documentation. When empty, default icon is shown.','touchy-menu'), $allowed_html_array ),
            'section' => 'touchy_search_button_section',
        ));
        
        /* search link override */
        $wp_customize->add_setting('bonfire_touchy_search_link',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_link',));
        function sanitize_bonfire_touchy_search_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_link',array(
            'type' => 'text',
            'label' => esc_html__('Search link override','touchy-menu'),
            'description' => esc_html__('If you would like to override the search button function with a custom link, enter it below. Combined with a custom icon (set above), this allows you to give the search button a completely different function. If left empty, defaults to search function.','touchy-menu'),
            'section' => 'touchy_search_button_section',
        ));
        
        /* search link new window */
        $wp_customize->add_setting('bonfire_touchy_search_new_tab',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_new_tab',));
        function sanitize_bonfire_touchy_search_new_tab( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_search_new_tab',array('type' => 'checkbox','label' => esc_html__('Open in new tab/window','touchy-menu'),'section' => 'touchy_search_button_section',));

        //
        // ADD "WooCommerce BUTTON" SECTION TO "TOUCHY" PANEL
        //
        $wp_customize->add_section('touchy_woo_button_section',array('title' => esc_html__('WooCommerce Button','touchy-menu'),'panel' => 'touchy_panel','priority' => 13));
        
        /* show woocommerce button */
        $wp_customize->add_setting('bonfire_touchy_show_woo_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_show_woo_button',));
        function sanitize_bonfire_touchy_show_woo_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_show_woo_button',array('type' => 'checkbox','label' => esc_html__('Show WooCommerce button','touchy-menu'),'description' => esc_html__('When enabled, icon will be shown when WooCommerce also activated.','touchy-menu'),'section' => 'touchy_woo_button_section',));
        
        /* display woocommerce button to logged in users only */
        $wp_customize->add_setting('bonfire_touchy_woo_button_loggedin',array('sanitize_callback' => 'sanitize_bonfire_touchy_woo_button_loggedin',));
        function sanitize_bonfire_touchy_woo_button_loggedin( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_woo_button_loggedin',array('type' => 'checkbox','label' => esc_html__('Display only when logged in','touchy-menu'),'description' => esc_html__('When ticked, only users who have logged in will see this button.','touchy-menu'), 'section' => 'touchy_woo_button_section',));

        /* woo icon select */
        $wp_customize->add_setting('touchy_woo_icon_select',array(
            'default' => 'cart',
        ));
        $wp_customize->add_control('touchy_woo_icon_select',array(
            'type' => 'select',
            'label' => 'Icon',
            'section' => 'touchy_woo_button_section',
            'choices' => array(
                'cart' => 'Cart',
                'bag' => 'Bag',
        ),
        ));

        /* woo icon color */
        $wp_customize->add_setting( 'touchy_woo_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'touchy_woo_icon_color',array(
            'label' => 'Icon color', 'settings' => 'touchy_woo_icon_color', 'section' => 'touchy_woo_button_section' )
        ));

        /* woo icon hover color */
        $wp_customize->add_setting( 'touchy_woo_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'touchy_woo_icon_hover_color',array(
            'label' => 'Icon color (hover)', 'settings' => 'touchy_woo_icon_hover_color', 'section' => 'touchy_woo_button_section' )
        ));

        /* woo item count color */
        $wp_customize->add_setting( 'touchy_woo_item_count_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'touchy_woo_item_count_color',array(
            'label' => 'Item count color', 'settings' => 'touchy_woo_item_count_color', 'section' => 'touchy_woo_button_section' )
        ));

        /* woo item count background color */
        $wp_customize->add_setting( 'touchy_woo_item_count_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'touchy_woo_item_count_background_color',array(
            'label' => 'Item count background color', 'settings' => 'touchy_woo_item_count_background_color', 'section' => 'touchy_woo_button_section' )
        ));

        /* woocommerce button color */
        $wp_customize->add_setting( 'bonfire_touchy_woo_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_woo_button_color',array(
            'label' => esc_html__('Button background','touchy-menu'), 'settings' => 'bonfire_touchy_woo_button_color', 'section' => 'touchy_woo_button_section' )
        ));
        
        /* woocommerce button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_woo_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_woo_button_hover_color',array(
            'label' => esc_html__('Button background hover','touchy-menu'), 'settings' => 'bonfire_touchy_woo_button_hover_color', 'section' => 'touchy_woo_button_section' )
        ));

        /* woocommerce button label */
        $wp_customize->add_setting('bonfire_touchy_woo_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_woo_icon_label',));
        function sanitize_bonfire_touchy_woo_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_woo_icon_label',array(
            'type' => 'text',
            'label' => esc_html__('Text label','touchy-menu'),
            'description' => esc_html__('A text label to be shown below icon','touchy-menu'),
            'section' => 'touchy_woo_button_section',
        ));
        
        /* woocommerce button label color */
        $wp_customize->add_setting( 'bonfire_touchy_woo_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_woo_button_label_color',array(
            'label' => esc_html__('Text label','touchy-menu'), 'settings' => 'bonfire_touchy_woo_button_label_color', 'section' => 'touchy_woo_button_section' )
        ));
        
        /* woocommerce button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_woo_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_woo_button_label_hover_color',array(
            'label' => esc_html__('Text label hover','touchy-menu'), 'settings' => 'bonfire_touchy_woo_button_label_hover_color', 'section' => 'touchy_woo_button_section' )
        ));

        /* woocommerce button bottom border color */
        $wp_customize->add_setting( 'bonfire_touchy_woo_button_border_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_woo_button_border_color',array(
            'label' => esc_html__('Border','touchy-menu'), 'settings' => 'bonfire_touchy_woo_button_border_color', 'section' => 'touchy_woo_button_section' )
        ));

        /* woocommerce button bottom border hover color */
        $wp_customize->add_setting( 'bonfire_touchy_woo_button_border_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_woo_button_border_hover_color',array(
            'label' => esc_html__('Border hover','touchy-menu'), 'settings' => 'bonfire_touchy_woo_button_border_hover_color', 'section' => 'touchy_woo_button_section' )
        ));

        //
        // ADD "MENU BUTTON" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_menu_button_section',array('title' => esc_html__('Menu Button','touchy-menu'),'panel' => 'touchy_panel','priority' => 14));
        
        /* hide Menu button */
        $wp_customize->add_setting('bonfire_touchy_hide_menu_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_menu_button',));
        function sanitize_bonfire_touchy_hide_menu_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_menu_button',array('type' => 'checkbox','label' => esc_html__('Hide menu button','touchy-menu'),'description' => esc_html__('Useful if you would like to show only the email and call buttons for example','touchy-menu'), 'section' => 'touchy_menu_button_section',));
        
        /* display Menu button to logged in users only */
        $wp_customize->add_setting('bonfire_touchy_menu_button_loggedin',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_button_loggedin',));
        function sanitize_bonfire_touchy_menu_button_loggedin( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_menu_button_loggedin',array('type' => 'checkbox','label' => esc_html__('Display only when logged in','touchy-menu'),'description' => esc_html__('When ticked, only users who have logged in will see this button.','touchy-menu'), 'section' => 'touchy_menu_button_section',));
        
        /* animate Menu button */
        $wp_customize->add_setting('bonfire_touchy_menu_button_animation',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_button_animation',));
        function sanitize_bonfire_touchy_menu_button_animation( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_menu_button_animation',array('type' => 'checkbox','label' => esc_html__('Animate menu button','touchy-menu'),'description' => esc_html__('When enabled, menu button icon will animate into X symbol when menu is opened','touchy-menu'), 'section' => 'touchy_menu_button_section',));
        
        /* alternate Menu button animation */
        $wp_customize->add_setting('bonfire_touchy_menu_button_animation_altx',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_button_animation_altx',));
        function sanitize_bonfire_touchy_menu_button_animation_altx( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_menu_button_animation_altx',array('type' => 'checkbox','label' => esc_html__('Animate menu button (alternate)','touchy-menu'),'description' => esc_html__('When enabled, menu button icon will use an alternate X symbol animation when menu is opened','touchy-menu'), 'section' => 'touchy_menu_button_section',));

        /* menu button color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_color',array(
            'label' => esc_html__('Button background','touchy-menu'), 'settings' => 'bonfire_touchy_menu_button_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* menu button hover color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_hover_color',array(
            'label' => esc_html__('Button background hover','touchy-menu'), 'settings' => 'bonfire_touchy_menu_button_hover_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* menu button icon color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_icon_color',array(
            'label' => esc_html__('Button icon','touchy-menu'), 'settings' => 'bonfire_touchy_menu_button_icon_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* email button icon hover color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_icon_hover_color',array(
            'label' => esc_html__('Button icon hover','touchy-menu'), 'settings' => 'bonfire_touchy_menu_button_icon_hover_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* menu button label */
        $wp_customize->add_setting('bonfire_touchy_menu_icon_label',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_icon_label',));
        function sanitize_bonfire_touchy_menu_icon_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_icon_label',array(
            'type' => 'text',
            'label' => esc_html__('Text label','touchy-menu'),
            'description' => esc_html__('A text label to be shown below icon','touchy-menu'),
            'section' => 'touchy_menu_button_section',
        ));
        
        /* menu button label color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_label_color',array(
            'label' => esc_html__('Text label','touchy-menu'), 'settings' => 'bonfire_touchy_menu_button_label_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* menu button label hover color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_label_hover_color',array(
            'label' => esc_html__('Text label hover','touchy-menu'), 'settings' => 'bonfire_touchy_menu_button_label_hover_color', 'section' => 'touchy_menu_button_section' )
        ));

        /* menu button bottom border color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_border_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_border_color',array(
            'label' => esc_html__('Border','touchy-menu'), 'settings' => 'bonfire_touchy_menu_button_border_color', 'section' => 'touchy_menu_button_section' )
        ));

        /* menu button bottom border hover color */
        $wp_customize->add_setting( 'bonfire_touchy_menu_button_border_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_button_border_hover_color',array(
            'label' => esc_html__('Border hover','touchy-menu'), 'settings' => 'bonfire_touchy_menu_button_border_hover_color', 'section' => 'touchy_menu_button_section' )
        ));
        
        /* custom Menu icon */
        $wp_customize->add_setting('bonfire_touchy_menu_icon',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_icon',));
        function sanitize_bonfire_touchy_menu_icon($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_icon',array(
            'type' => 'text',
            'label' => esc_html__('Custom icon','touchy-menu'),
            'description' => wp_kses( __('<strong>Font Awesome</strong> icons can be viewed <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>fa-solid fa-heart-pulse</strong>, <strong>fa-regular fa-calendar</strong> etc). <strong>Line Awesome</strong> icons can be viewed <a href="https://icons8.com/line-awesome" target="_blank" style="text-decoration:underline;">here</a> (the icon names are <strong>las la-coffee</strong>, <strong>las la-address-book</strong> etc). Please find detailed information in the Touchy documentation. When empty, default icon is shown.','touchy-menu'), $allowed_html_array ),
            'section' => 'touchy_menu_button_section',
        ));
        
        /* menu button link override */
        $wp_customize->add_setting('bonfire_touchy_menu_button_link',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_button_link',));
        function sanitize_bonfire_touchy_menu_button_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_menu_button_link',array(
            'type' => 'text',
            'label' => esc_html__('Menu button link override','touchy-menu'),
            'description' => esc_html__('If you would like to override the menu button function with a custom link, enter it below. Combined with a custom icon (set above), this allows you to give the menu button a completely different function. If left empty, defaults to menu button function.','touchy-menu'),
            'section' => 'touchy_menu_button_section',
        ));
        
        /* menu button link new window */
        $wp_customize->add_setting('bonfire_touchy_menu_button_new_tab',array('sanitize_callback' => 'sanitize_bonfire_touchy_menu_button_new_tab',));
        function sanitize_bonfire_touchy_menu_button_new_tab( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_menu_button_new_tab',array('type' => 'checkbox','label' => esc_html__('Open in new tab/window','touchy-menu'),'section' => 'touchy_menu_button_section',));
        
        //
        // ADD "Button Order" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_button_order_section',array('title' => esc_html__('Button Order','touchy-menu'),'description' => esc_html__('Please note: The menu button can not be re-positioned due to the more complex positioning properties of the multi-level drop-down menu.','touchy-menu'),'panel'  => 'touchy_panel','priority' => 17));
        
        /* 1st button */
        $wp_customize->add_setting('bonfire_touchy_1st_button',array(
            'default' => 'back',
        ));
        $wp_customize->add_control('bonfire_touchy_1st_button',array(
            'type' => 'select',
            'label' => esc_html__('1st button','touchy-menu'),
            'section' => 'touchy_button_order_section',
            'choices' => array(
                'back' => esc_html__('Back button','touchy-menu'),
                'call' => esc_html__('Call button','touchy-menu'),
                'email' => esc_html__('Email button','touchy-menu'),
                'search' => esc_html__('Search button','touchy-menu'),
                'woo' => esc_html__('WooCommerce button','touchy-menu'),
        ),
        ));
        
        /* 2nd button */
        $wp_customize->add_setting('bonfire_touchy_2nd_button',array(
            'default' => 'call',
        ));
        $wp_customize->add_control('bonfire_touchy_2nd_button',array(
            'type' => 'select',
            'label' => esc_html__('2nd button','touchy-menu'),
            'section' => 'touchy_button_order_section',
            'choices' => array(
                'back' => esc_html__('Back button','touchy-menu'),
                'call' => esc_html__('Call button','touchy-menu'),
                'email' => esc_html__('Email button','touchy-menu'),
                'search' => esc_html__('Search button','touchy-menu'),
                'woo' => esc_html__('WooCommerce button','touchy-menu'),
        ),
        ));
        
        /* 3rd button */
        $wp_customize->add_setting('bonfire_touchy_3rd_button',array(
            'default' => 'email',
        ));
        $wp_customize->add_control('bonfire_touchy_3rd_button',array(
            'type' => 'select',
            'label' => esc_html__('3rd button','touchy-menu'),
            'section' => 'touchy_button_order_section',
            'choices' => array(
                'back' => esc_html__('Back button','touchy-menu'),
                'call' => esc_html__('Call button','touchy-menu'),
                'email' => esc_html__('Email button','touchy-menu'),
                'search' => esc_html__('Search button','touchy-menu'),
                'woo' => esc_html__('WooCommerce button','touchy-menu'),
        ),
        ));
        
        /* 4th button */
        $wp_customize->add_setting('bonfire_touchy_4th_button',array(
            'default' => 'search',
        ));
        $wp_customize->add_control('bonfire_touchy_4th_button',array(
            'type' => 'select',
            'label' => esc_html__('4th button','touchy-menu'),
            'section' => 'touchy_button_order_section',
            'choices' => array(
                'back' => esc_html__('Back button','touchy-menu'),
                'call' => esc_html__('Call button','touchy-menu'),
                'email' => esc_html__('Email button','touchy-menu'),
                'search' => esc_html__('Search button','touchy-menu'),
                'woo' => esc_html__('WooCommerce button','touchy-menu'),
        ),
        ));

        /* 5th button */
        $wp_customize->add_setting('bonfire_touchy_5th_button',array(
            'default' => 'woo',
        ));
        $wp_customize->add_control('bonfire_touchy_5th_button',array(
            'type' => 'select',
            'label' => esc_html__('5th button','touchy-menu'),
            'section' => 'touchy_button_order_section',
            'choices' => array(
                'back' => esc_html__('Back button','touchy-menu'),
                'call' => esc_html__('Call button','touchy-menu'),
                'email' => esc_html__('Email button','touchy-menu'),
                'search' => esc_html__('Search button','touchy-menu'),
                'woo' => esc_html__('WooCommerce button','touchy-menu'),
        ),
        ));
        
        //
        // ADD "SEARCH FIELD" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_search_field_section',array('title' => esc_html__('Search Field','touchy-menu'),'panel' => 'touchy_panel','priority' => 15));
        
        /* full-screen search */
        $wp_customize->add_setting('bonfire_touchy_fullscreen_search',array('sanitize_callback' => 'sanitize_bonfire_touchy_fullscreen_search',));
        function sanitize_bonfire_touchy_fullscreen_search( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_fullscreen_search',array('type' => 'checkbox','label' => esc_html__('Full-screen search','touchy-menu'),'description' => esc_html__('If selected, an alternate full-screen search layout will be displayed.','touchy-menu'),'section' => 'touchy_search_field_section',));
        
        /* custom search field placeholder text */
        $wp_customize->add_setting('bonfire_touchy_search_placeholder',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_placeholder',));
        function sanitize_bonfire_touchy_search_placeholder($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_placeholder',array(
            'type' => 'text',
            'label' => esc_html__('Placeholder text','touchy-menu'),
            'description' => esc_html__('Enter custom search field placeholder text. If empty, will default to "Enter search term..."','touchy-menu'),
            'section' => 'touchy_search_field_section',
        ));
        
        /* custom search button text */
        $wp_customize->add_setting('bonfire_touchy_search_button_text',array('sanitize_callback' => 'sanitize_bonfire_touchy_search_button_text',));
        function sanitize_bonfire_touchy_search_button_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_search_button_text',array(
            'type' => 'text',
            'label' => esc_html__('Button text','touchy-menu'),
            'description' => esc_html__('Enter custom search button text. If empty, will default to "Search"','touchy-menu'),
            'section' => 'touchy_search_field_section',
        ));
        
        /* hide clear field function */
        $wp_customize->add_setting('bonfire_touchy_hide_clear_function',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_clear_function',));
        function sanitize_bonfire_touchy_hide_clear_function( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_clear_function',array('type' => 'checkbox','label' => esc_html__('Hide clear field option','touchy-menu'),'description' => esc_html__('If selected, the clear field option on the search field will be hidden.','touchy-menu'),'section' => 'touchy_search_field_section',));
        
        /* hide search field button */
        $wp_customize->add_setting('bonfire_touchy_hide_search_field_button',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_search_field_button',));
        function sanitize_bonfire_touchy_hide_search_field_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_hide_search_field_button',array('type' => 'checkbox','label' => esc_html__('Hide "Search" button','touchy-menu'),'description' => esc_html__('If selected, the "Search" button will be hidden.','touchy-menu'),'section' => 'touchy_search_field_section',));
        
        /* disable search field auto-focus */
        $wp_customize->add_setting('bonfire_touchy_disable_search_field_focus',array('sanitize_callback' => 'sanitize_bonfire_touchy_disable_search_field_focus',));
        function sanitize_bonfire_touchy_disable_search_field_focus( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_disable_search_field_focus',array('type' => 'checkbox','label' => esc_html__('Disable auto-focus','touchy-menu'),'section' => 'touchy_search_field_section',));

        /* search field placeholder text color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_placeholder_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_placeholder_color',array(
            'label' => esc_html__('Search field placeholder text','touchy-menu'), 'settings' => 'bonfire_touchy_search_field_placeholder_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search field text color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_text_color',array(
            'label' => esc_html__('Search field text','touchy-menu'), 'settings' => 'bonfire_touchy_search_field_text_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search field 'clear field' button color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_clear_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_clear_color',array(
            'label' => esc_html__('"Clear field" button','touchy-menu'), 'settings' => 'bonfire_touchy_search_field_clear_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search field background color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_background_color',array(
            'label' => esc_html__('Search field background','touchy-menu'), 'settings' => 'bonfire_touchy_search_field_background_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search button text color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_search_button_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_search_button_text_color',array(
            'label' => esc_html__('Search button text','touchy-menu'), 'settings' => 'bonfire_touchy_search_field_search_button_text_color', 'section' => 'touchy_search_field_section' )
        ));
        
        /* search button background color */
        $wp_customize->add_setting( 'bonfire_touchy_search_field_search_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_search_field_search_button_color',array(
            'label' => esc_html__('Search button background','touchy-menu'), 'settings' => 'bonfire_touchy_search_field_search_button_color', 'section' => 'touchy_search_field_section' )
        ));

        /* full-screen search background color */
        $wp_customize->add_setting( 'bonfire_touchy_fullscreen_search_bg_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_fullscreen_search_bg_color',array(
            'label' => esc_html__('Full-screen search background','touchy-menu'), 'settings' => 'bonfire_touchy_fullscreen_search_bg_color', 'section' => 'touchy_search_field_section' )
        ));

        /* full-screen search background image */
        $wp_customize->add_setting('bonfire_touchy_fullscreen_search_bg_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bonfire_touchy_fullscreen_search_bg_image',
            array(
                'label' => esc_html__('Full-screen search background image','touchy-menu'),
                'settings' => 'bonfire_touchy_fullscreen_search_bg_image',
                'section' => 'touchy_search_field_section',
        )
        ));

        /* full-screen search background image as pattern */
        $wp_customize->add_setting('bonfire_touchy_fullscreen_search_bg_image_pattern',array('sanitize_callback' => 'sanitize_bonfire_touchy_fullscreen_search_bg_image_pattern',));
        function sanitize_bonfire_touchy_fullscreen_search_bg_image_pattern( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_fullscreen_search_bg_image_pattern',array('type' => 'checkbox','label' => esc_html__('Display background image as pattern','touchy-menu'),'section' => 'touchy_search_field_section',));
        
        //
        // ADD "DROP-DOWN MENU" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_menu_dropdown_section',array('title' => esc_html__('Drop-Down Menu','touchy-menu'),'panel' => 'touchy_panel','priority' => 16));
        
        /* dropdown arrow animation */
        $wp_customize->add_setting('bonfire_touchy_submenu_arrow_animation',array(
            'default' => 'down',
        ));
        $wp_customize->add_control('bonfire_touchy_submenu_arrow_animation',array(
            'type' => 'select',
            'label' => esc_html__('Sub-menu arrow animation','touchy-menu'),
            'section' => 'touchy_menu_dropdown_section',
            'choices' => array(
                'down' => esc_html__('Down arrow','touchy-menu'),
                'x' => esc_html__('X sign','touchy-menu'),
        ),
        ));
        
        /* close menu after click */
        $wp_customize->add_setting('touchy_close_menu_on_click',array('sanitize_callback' => 'sanitize_touchy_close_menu_on_click',));
        function sanitize_touchy_close_menu_on_click( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('touchy_close_menu_on_click',array('type' => 'checkbox','label' => esc_html__('Close menu after click','touchy-menu'),'description' => esc_html__('Close menu when menu item is clicked/tapped (useful on one-page websites where menu links lead to anchors, not new pages).','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));
        
        /* alternate submenu activation */
        $wp_customize->add_setting('touchy_alternate_submenu_activation',array('sanitize_callback' => 'sanitize_touchy_alternate_submenu_activation',));
        function sanitize_touchy_alternate_submenu_activation( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('touchy_alternate_submenu_activation',array('type' => 'checkbox','label' => 'Alternate submenu activation','description' => 'Make entire top-level menu item open the submenu. If unchecked, only the arrow icon opens submenu','section' => 'touchy_menu_dropdown_section',));
        
        /* enable RTL */
        $wp_customize->add_setting('touchy_enable_rtl',array('sanitize_callback' => 'sanitize_touchy_enable_rtl',));
        function sanitize_touchy_enable_rtl( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('touchy_enable_rtl',array('type' => 'checkbox','label' => 'Enable RTL','section' => 'touchy_menu_dropdown_section',));
        
        /* fade menu into view */
        $wp_customize->add_setting('touchy_fade_menu_into_view',array('sanitize_callback' => 'sanitize_touchy_fade_menu_into_view',));
        function sanitize_touchy_fade_menu_into_view( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('touchy_fade_menu_into_view',array('type' => 'checkbox','label' => esc_html__('Fade menu into view','touchy-menu'),'description' => esc_html__('When enabled, dropdown menu will have a slight fade-in animation when menu button is pressed.','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));

        /* hide tooltip */
        $wp_customize->add_setting('touchy_hide_tooltip',array('sanitize_callback' => 'sanitize_touchy_hide_tooltip',));
        function sanitize_touchy_hide_tooltip( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('touchy_hide_tooltip',array('type' => 'checkbox','label' => 'Hide tooltip','section' => 'touchy_menu_dropdown_section',));
        
        /* menu font size */
        $wp_customize->add_setting('touchy_menu_font_size',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_font_size',));
        function sanitize_touchy_menu_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_font_size',array('type' => 'text','label' => esc_html__('Menu item font size (in pixels)','touchy-menu'),'description' => esc_html__('If empty, defaults to 13','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));

        /* menu line height */
        $wp_customize->add_setting('touchy_menu_line_height',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_line_height',));
        function sanitize_touchy_menu_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_line_height',array('type' => 'text','label' => esc_html__('Menu item line height (in pixels)','touchy-menu'),'description' => esc_html__('If empty, defaults to 16','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));
        
        /* menu description font size */
        $wp_customize->add_setting('touchy_menu_description_top_margin',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_description_top_margin',));
        function sanitize_touchy_menu_description_top_margin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_description_top_margin',array('type' => 'text','label' => esc_html__('Menu description top margin (in pixels)','touchy-menu'),'description' => esc_html__('The space between a menu item and its description (if one is entered). If empty, defaults to 4','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));
        
        /* menu description font size */
        $wp_customize->add_setting('touchy_menu_description_font_size',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_description_font_size',));
        function sanitize_touchy_menu_description_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_description_font_size',array('type' => 'text','label' => esc_html__('Menu description font size (in pixels)','touchy-menu'),'description' => esc_html__('If empty, defaults to 13','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));

        /* menu description line height */
        $wp_customize->add_setting('touchy_menu_description_line_height',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_description_line_height',));
        function sanitize_touchy_menu_description_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_description_line_height',array('type' => 'text','label' => esc_html__('Menu description line height (in pixels)','touchy-menu'),'description' => esc_html__('If empty, defaults to 16','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));
        
        /* menu theme font */
        $wp_customize->add_setting('touchy_menu_theme_font',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_theme_font',));
        function sanitize_touchy_menu_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','touchy-menu'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));
        
        /* menu icon size */
        $wp_customize->add_setting('touchy_menu_icon_size',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_icon_size',));
        function sanitize_touchy_menu_icon_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_icon_size',array('type' => 'text','label' => esc_html__('Menu item icon size (in pixels)','touchy-menu'),'description' => esc_html__('If empty, defaults to 12','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));
        
        /* menu border radius */
        $wp_customize->add_setting('touchy_menu_border_radius',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_border_radius',));
        function sanitize_touchy_menu_border_radius($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_border_radius',array('type' => 'text','label' => esc_html__('Corner roundness (in pixels)','touchy-menu'),'description' => esc_html__('If empty, defaults to 2','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));
        
        /* menu end marker thickness */
        $wp_customize->add_setting('touchy_menu_end_marker_thickness',array('default' => '','sanitize_callback' => 'sanitize_touchy_menu_end_marker_thickness',));
        function sanitize_touchy_menu_end_marker_thickness($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('touchy_menu_end_marker_thickness',array('type' => 'text','label' => esc_html__('Menu end marker thickness (in pixels)','touchy-menu'),'description' => esc_html__('If empty, defaults to 3','touchy-menu'),'section' => 'touchy_menu_dropdown_section',));
        
        /* menu background */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_background_color',array(
            'label' => esc_html__('Menu background','touchy-menu'), 'settings' => 'bonfire_touchy_dropdown_background_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* tooltip color */
        $wp_customize->add_setting( 'bonfire_touchy_tooltip_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_tooltip_color',array(
            'label' => esc_html__('Tooltip','touchy-menu'), 'settings' => 'bonfire_touchy_tooltip_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* submenu background */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_sub_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_sub_background_color',array(
            'label' => esc_html__('Sub-menu background','touchy-menu'), 'settings' => 'bonfire_touchy_dropdown_sub_background_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu end marker */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_end_marker_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_end_marker_color',array(
            'label' => esc_html__('Menu end marker','touchy-menu'), 'settings' => 'bonfire_touchy_dropdown_end_marker_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* horizontal menu item divider */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_horizontal_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_horizontal_divider_color',array(
            'label' => esc_html__('Horizontal menu item divider','touchy-menu'), 'settings' => 'bonfire_touchy_dropdown_horizontal_divider_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* horizontal menu item divider (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_submenu_horizontal_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_submenu_horizontal_divider_color',array(
            'label' => esc_html__('Horizontal menu item divider (sub-menu)','touchy-menu'), 'settings' => 'bonfire_touchy_dropdown_submenu_horizontal_divider_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* sub-menu arrow separator */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_menu_item_separator_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_menu_item_separator_color',array(
            'label' => esc_html__('Sub-menu arrow separator','touchy-menu'), 'settings' => 'bonfire_touchy_dropdown_menu_item_separator_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* sub-menu arrow separator (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_dropdown_submenu_item_separator_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_dropdown_submenu_item_separator_color',array(
            'label' => esc_html__('Sub-menu arrow separator (sub-menu)','touchy-menu'), 'settings' => 'bonfire_touchy_dropdown_submenu_item_separator_color', 'section' => 'touchy_menu_dropdown_section' )
        ));

        /* expand icon */
        $wp_customize->add_setting( 'bonfire_touchy_expand_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_expand_icon_color',array(
            'label' => esc_html__('Expand icon','touchy-menu'), 'settings' => 'bonfire_touchy_expand_icon_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* expand icon hover */
        $wp_customize->add_setting( 'bonfire_touchy_expand_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_expand_icon_hover_color',array(
            'label' => esc_html__('Expand icon hover','touchy-menu'), 'settings' => 'bonfire_touchy_expand_icon_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* expand icon (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_expand_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_expand_icon_color',array(
            'label' => esc_html__('Expand icon (sub-menu)','touchy-menu'), 'settings' => 'bonfire_touchy_submenu_expand_icon_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* expand icon hover (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_expand_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_expand_icon_hover_color',array(
            'label' => esc_html__('Expand icon hover (sub-menu)','touchy-menu'), 'settings' => 'bonfire_touchy_submenu_expand_icon_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_color',array(
            'label' => esc_html__('Menu item','touchy-menu'), 'settings' => 'bonfire_touchy_menu_item_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item hover */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_hover_color',array(
            'label' => esc_html__('Menu item hover','touchy-menu'), 'settings' => 'bonfire_touchy_menu_item_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item icon */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_icon_color',array(
            'label' => esc_html__('Menu item icon','touchy-menu'), 'settings' => 'bonfire_touchy_menu_item_icon_color', 'section' => 'touchy_menu_dropdown_section' )
        ));

        /* menu item icon hover */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_icon_hover_color',array(
            'label' => esc_html__('Menu item icon hover','touchy-menu'), 'settings' => 'bonfire_touchy_menu_item_icon_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* sub-menu item */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_item_color',array(
            'label' => esc_html__('Sub-menu item','touchy-menu'), 'settings' => 'bonfire_touchy_submenu_item_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* sub-menu item hover */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_item_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_item_hover_color',array(
            'label' => esc_html__('Sub-menu item hover','touchy-menu'), 'settings' => 'bonfire_touchy_submenu_item_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item icon (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_item_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_item_icon_color',array(
            'label' => esc_html__('Menu item icon (sub-menu)','touchy-menu'), 'settings' => 'bonfire_touchy_submenu_item_icon_color', 'section' => 'touchy_menu_dropdown_section' )
        ));

        /* menu item icon hover (sub-menu) */
        $wp_customize->add_setting( 'bonfire_touchy_submenu_item_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_submenu_item_icon_hover_color',array(
            'label' => esc_html__('Menu item icon hover (sub-menu)','touchy-menu'), 'settings' => 'bonfire_touchy_submenu_item_icon_hover_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* current menu item */
        $wp_customize->add_setting( 'bonfire_touchy_current_menu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_current_menu_item_color',array(
            'label' => esc_html__('Current menu item','touchy-menu'), 'settings' => 'bonfire_touchy_current_menu_item_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item description */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_description_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_description_color',array(
            'label' => esc_html__('Menu item description','touchy-menu'), 'settings' => 'bonfire_touchy_menu_item_description_color', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        /* menu item highlight */
        $wp_customize->add_setting( 'bonfire_touchy_menu_item_highlight', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_menu_item_highlight',array(
            'label' => esc_html__('Highlighted menu item','touchy-menu'), 'description' => esc_html__('You can highlight a menu item by adding the "marker" class to the desired menu item in the WordPress menu builder.','touchy-menu'), 'settings' => 'bonfire_touchy_menu_item_highlight', 'section' => 'touchy_menu_dropdown_section' )
        ));
        
        //
        // ADD "MISC" SECTION TO "TOUCHY" PANEL 
        //
        $wp_customize->add_section('touchy_misc_section',array('title' => esc_html__('Misc','touchy-menu'),'panel'  => 'touchy_panel','priority' => 17));

        /* absolute position */
        $wp_customize->add_setting('bonfire_touchy_absolute_position',array('sanitize_callback' => 'sanitize_bonfire_touchy_absolute_position',));
        function sanitize_bonfire_touchy_absolute_position( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_absolute_position',array('type' => 'checkbox','label' => esc_html__('Absolute positioning','touchy-menu'),'description' => esc_html__('Note: Only applied when menubar bottom positioning not selected.','touchy-menu'), 'section' => 'touchy_misc_section',));
        
        /* slide-in menu on load */
        $wp_customize->add_setting('bonfire_touchy_slidein',array('sanitize_callback' => 'sanitize_bonfire_touchy_slidein',));
        function sanitize_bonfire_touchy_slidein( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_slidein',array('type' => 'checkbox','label' => esc_html__('Slide-in on load','touchy-menu'),'description' => esc_html__('When enabled, a slide-in animation is applied to the menubar upon page load.','touchy-menu'), 'section' => 'touchy_misc_section',));
        
        /* don't load Font Awesome */
        $wp_customize->add_setting('bonfire_touchy_disable_fontawesome',array('sanitize_callback' => 'sanitize_bonfire_touchy_disable_fontawesome',));
        function sanitize_bonfire_touchy_disable_fontawesome( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_touchy_disable_fontawesome',array('type' => 'checkbox','label' => esc_html__('Do not load FontAwesome icon set','touchy-menu'),'description' => esc_html__('Useful if you only use the default menubar icons or if your theme or another plugin already loads it, to prevent it from being loaded twice unnecessarily.','touchy-menu'), 'section' => 'touchy_misc_section',));
        
        /* don't load Line Awesome */
        $wp_customize->add_setting('touchy_no_lineawesome',array('sanitize_callback' => 'sanitize_touchy_no_lineawesome',));
        function sanitize_touchy_no_lineawesome( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('touchy_no_lineawesome',array('type' => 'checkbox','label' => esc_html__('Do not load Line Awesome icon set','taptap'),'description' => esc_html__('Useful if you do not use any icons or if your theme or another plugin already loads it, to prevent it from being loaded twice unnecessarily.','touchy-menu'),'section' => 'touchy_misc_section',));
        
        /* don't load retina.js */
        $wp_customize->add_setting('touchy_no_retina',array('sanitize_callback' => 'sanitize_touchy_no_retina',));
        function sanitize_touchy_no_retina( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('touchy_no_retina',array('type' => 'checkbox','label' => esc_html__('Enable retina image support','touchy-menu'),'description' => esc_html__('Please note: can potentially cause a conflict with some elements in some themes. To display image as retina when this script is disabled, simply upload the image twice as large (example: if image file height is 150, set the height value as 75).','touchy-menu'),'section' => 'touchy_misc_section',));
        
        /* overlay color */
        $wp_customize->add_setting( 'bonfire_touchy_overlay_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_overlay_color',array(
            'label' => esc_html__('Overlay','touchy-menu'), 'settings' => 'bonfire_touchy_overlay_color', 'section' => 'touchy_misc_section' )
        ));
        
        /* overlay transparency */
        $wp_customize->add_setting('bonfire_touchy_overlay_transparency',array('sanitize_callback' => 'sanitize_bonfire_touchy_overlay_transparency',));
        function sanitize_bonfire_touchy_overlay_transparency($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_overlay_transparency',array(
            'type' => 'text',
            'label' => esc_html__('Overlay transparency (from 0-1)','touchy-menu'),
            'description' => esc_html__('Example: 0.5 or 0.75. If emtpy, defaults to 0.2.','touchy-menu'),
            'section' => 'touchy_misc_section',
        ));
        
        /* widget are background */
        $wp_customize->add_setting( 'bonfire_touchy_widget_area_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_touchy_widget_area_color',array(
            'label' => esc_html__('Widget area background','touchy-menu'), 'description' => esc_html__('Add widgets under Appearance > Widgets','touchy-menu'), 'settings' => 'bonfire_touchy_widget_area_color', 'section' => 'touchy_misc_section' )
        ));
        
        /* smaller than */
        $wp_customize->add_setting('bonfire_touchy_smaller_than',array('sanitize_callback' => 'sanitize_bonfire_touchy_smaller_than',));
        function sanitize_bonfire_touchy_smaller_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_smaller_than',array(
            'type' => 'text',
            'label' => esc_html__('Hide at certain width/resolution','touchy-menu'),
            'description' => wp_kses( __('<strong>Example #1:</strong> If you want to show Touchy on desktop only, enter the values as 0 and 500. <br><br> <strong>Example #2:</strong> If you want to show Touchy on mobile only, enter the values as 500 and 5000. <br><br> Feel free to experiment with your own values to get the result that is right for you. If fields are empty, Touchy will be visible at all browser widths and resolutions. <br><br> Hide Touchy menu if browser width or screen resolution (in pixels) is between...','touchy-menu'), $allowed_html_array ),
            'section' => 'touchy_misc_section',
        ));
        
        /* larger than */
        $wp_customize->add_setting('bonfire_touchy_larger_than',array('sanitize_callback' => 'sanitize_bonfire_touchy_larger_than',));
        function sanitize_bonfire_touchy_larger_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_larger_than',array(
            'type' => 'text',
            'description' => esc_html__('..and:','touchy-menu'),
            'section' => 'touchy_misc_section',
        ));
        
        /* hide theme menu */
        $wp_customize->add_setting('bonfire_touchy_hide_theme_menu',array('sanitize_callback' => 'sanitize_bonfire_touchy_hide_theme_menu',));
        function sanitize_bonfire_touchy_hide_theme_menu($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_touchy_hide_theme_menu',array(
            'type' => 'text',
            'label' => esc_html__('Advanced: Hide theme menu','touchy-menu'),
            'description' => esc_html__('If you have set Touchy to show only at a certain resolution, know the class/ID of your theme menu and would like to hide it when Touchy is visible, enter the class/ID into this field (example: "#my-theme-menu"). Multiple classes/IDs can be entered (separate with comma as you would in a stylesheet).','touchy-menu'),
            'section' => 'touchy_misc_section',
        ));

	}
	add_action('customize_register', 'touchy_theme_customizer');

	//
	// Add menu to theme
	//
	
	function bonfire_touchy_footer() {
	?>

        <!-- BEGIN LOGO AREA -->
        <?php if( get_theme_mod('bonfire_touchy_hide_logo_area', '') === '') { ?>
        <div class="touchy-logo-wrapper">
            <!-- BEGIN BACKGROUND IMAGE -->
            <div class="touchy-logo-wrapper-bg"></div>
            <!-- END BACKGROUND IMAGE -->
            <!-- BEGIN LOGO -->
            <?php if ( get_theme_mod( 'bonfire_touchy_logo_image' ) ) : ?>
                <!-- BEGIN LOGO IMAGE -->
                <div class="touchy-logo-image">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'bonfire_touchy_logo_image' ); ?>" data-rjs="2" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                </div>
                <!-- END LOGO IMAGE -->
            <?php else : ?>
                <!-- BEGIN LOGO -->
                <div class="touchy-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </div>
                <!-- END LOGO -->
            <?php endif; ?>
            <!-- END LOGO -->
        </div>
        <?php } ?>
        <!-- END LOGO AREA -->

		<!-- BEGIN MENU BAR -->
		<div class="touchy-wrapper">

            <div class="touchy-wrapper-inner">

                <!-- BEGIN BACK BUTTON -->
                <?php $touchy_1st_button = get_theme_mod( 'bonfire_touchy_1st_button', '' ); if( $touchy_1st_button === '' ) { ?>

                    <?php if( get_theme_mod('bonfire_touchy_back_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                    <?php } ?>
                    
                <?php } else if( $touchy_1st_button !== '' ) { switch ( $touchy_1st_button ) { case 'back': ?>
                    
                    <?php if( get_theme_mod('bonfire_touchy_back_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                    <?php } ?>
                    
                <?php break; case 'call': ?>
                
                    <?php if( get_theme_mod('bonfire_touchy_call_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                    <?php } ?>
                
                <?php break; case 'email': ?>

                    <?php if( get_theme_mod('bonfire_touchy_email_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                    <?php } ?>
                
                <?php break; case 'search': ?>
                
                    <?php if( get_theme_mod('bonfire_touchy_search_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                    <?php } ?>
                
                <?php break; case 'woo': ?>

                    <?php if( get_theme_mod('bonfire_touchy_woo_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                    <?php } ?>
                
                <?php break; }} ?>
                <!-- END BACK BUTTON -->
                
                <!-- BEGIN CALL BUTTON -->
                <?php $bonfire_touchy_2nd_button = get_theme_mod( 'bonfire_touchy_2nd_button', '' ); if( $bonfire_touchy_2nd_button === '' ) { ?>

                    <?php if( get_theme_mod('bonfire_touchy_call_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                    <?php } ?>
                    
                <?php } else if( $bonfire_touchy_2nd_button !== '' ) { switch ( $bonfire_touchy_2nd_button ) { case 'back': ?>
                    
                    <?php if( get_theme_mod('bonfire_touchy_back_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                    <?php } ?>
                    
                <?php break; case 'call': ?>
                
                    <?php if( get_theme_mod('bonfire_touchy_call_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                    <?php } ?>
                
                <?php break; case 'email': ?>

                    <?php if( get_theme_mod('bonfire_touchy_email_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                    <?php } ?>
                
                <?php break; case 'search': ?>
                
                    <?php if( get_theme_mod('bonfire_touchy_search_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                    <?php } ?>

                <?php break; case 'woo': ?>

                    <?php if( get_theme_mod('bonfire_touchy_woo_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                    <?php } ?>
                
                <?php break; }} ?>
                <!-- END CALL BUTTON -->
                
                <!-- BEGIN EMAIL BUTTON -->
                <?php $bonfire_touchy_3rd_button = get_theme_mod( 'bonfire_touchy_3rd_button', '' ); if( $bonfire_touchy_3rd_button === '' ) { ?>

                    <?php if( get_theme_mod('bonfire_touchy_email_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                    <?php } ?>
                    
                <?php } else if( $bonfire_touchy_3rd_button !== '' ) { switch ( $bonfire_touchy_3rd_button ) { case 'back': ?>
                    
                    <?php if( get_theme_mod('bonfire_touchy_back_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                    <?php } ?>
                    
                <?php break; case 'call': ?>
                
                    <?php if( get_theme_mod('bonfire_touchy_call_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                    <?php } ?>
                
                <?php break; case 'email': ?>

                    <?php if( get_theme_mod('bonfire_touchy_email_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                    <?php } ?>
                
                <?php break; case 'search': ?>
                
                    <?php if( get_theme_mod('bonfire_touchy_search_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                    <?php } ?>
                
                <?php break; case 'woo': ?>

                    <?php if( get_theme_mod('bonfire_touchy_woo_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                    <?php } ?>
                
                <?php break; }} ?>
                <!-- END EMAIL BUTTON -->
                
                <!-- BEGIN SEARCH BUTTON -->
                <?php $bonfire_touchy_4th_button = get_theme_mod( 'bonfire_touchy_4th_button', '' ); if( $bonfire_touchy_4th_button === '' ) { ?>

                    <?php if( get_theme_mod('bonfire_touchy_search_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                    <?php } ?>
                    
                <?php } else if( $bonfire_touchy_4th_button !== '' ) { switch ( $bonfire_touchy_4th_button ) { case 'back': ?>
                    
                    <?php if( get_theme_mod('bonfire_touchy_back_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                    <?php } ?>
                    
                <?php break; case 'call': ?>
                
                    <?php if( get_theme_mod('bonfire_touchy_call_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                    <?php } ?>
                
                <?php break; case 'email': ?>

                    <?php if( get_theme_mod('bonfire_touchy_email_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                    <?php } ?>
                
                <?php break; case 'search': ?>
                
                    <?php if( get_theme_mod('bonfire_touchy_search_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                    <?php } ?>

                <?php break; case 'woo': ?>

                    <?php if( get_theme_mod('bonfire_touchy_woo_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                    <?php } ?>
                
                <?php break; }} ?>
                <!-- END SEARCH BUTTON -->

                <!-- BEGIN WOO BUTTON -->
                <?php $bonfire_touchy_5th_button = get_theme_mod( 'bonfire_touchy_5th_button', '' ); if( $bonfire_touchy_5th_button === '' ) { ?>

                    <?php if( get_theme_mod('bonfire_touchy_woo_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                    <?php } ?>

                <?php } else if( $bonfire_touchy_5th_button !== '' ) { switch ( $bonfire_touchy_5th_button ) { case 'back': ?>

                    <?php if( get_theme_mod('bonfire_touchy_back_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-back.php'); ?>
                    <?php } ?>

                <?php break; case 'call': ?>

                    <?php if( get_theme_mod('bonfire_touchy_call_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-call.php'); ?>
                    <?php } ?>

                <?php break; case 'email': ?>

                    <?php if( get_theme_mod('bonfire_touchy_email_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-email.php'); ?>
                    <?php } ?>

                <?php break; case 'search': ?>

                    <?php if( get_theme_mod('bonfire_touchy_search_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-search.php'); ?>
                    <?php } ?>
                
                <?php break; case 'woo': ?>

                    <?php if( get_theme_mod('bonfire_touchy_woo_button_loggedin', '') !== '') { ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-woo.php'); ?>
                    <?php } ?>

                <?php break; }} ?>
                <!-- END WOO BUTTON -->

                <!-- BEGIN MENU BUTTON -->
                <?php if( get_theme_mod('bonfire_touchy_menu_button_loggedin', '') !== '') { ?>
                    <?php if ( is_user_logged_in() ) { ?>
                        <?php include( plugin_dir_path( __FILE__ ) . 'button-menu.php'); ?>
                    <?php } ?>
                <?php } else { ?>
                    <?php include( plugin_dir_path( __FILE__ ) . 'button-menu.php'); ?>
                <?php } ?>
                <!-- END MENU BUTTON -->

            </div>
        
		</div>
		<!-- END MENU BAR -->
		
		<!-- BEGIN ACCORDION MENU -->
        <div class="touchy-by-bonfire-wrapper">
            <div class="touchy-overlay"><div class="touchy-overlay-inner"></div></div>
            <div class="touchy-by-bonfire smooth-scroll">
                <!-- BEGIN WIDGETS -->
                <?php if ( is_active_sidebar( 'touchy-widgets-top' ) ) { ?>
                    <div class="touchy-widgets-wrapper">
                        <?php dynamic_sidebar( 'touchy-widgets-top' ); ?>
                    </div>
                <?php } ?>	
                <!-- END WIDGETS -->
                <?php $walker = new Touchy_Menu_Description; ?>
                <?php wp_nav_menu( array( 'theme_location' => 'touchy-by-bonfire', 'walker' => $walker, 'fallback_cb' => '' ) ); ?>
                <!-- BEGIN WIDGETS -->
                <?php if ( is_active_sidebar( 'touchy-widgets' ) ) { ?>
                    <div class="touchy-widgets-wrapper">
                        <?php dynamic_sidebar( 'touchy-widgets' ); ?>
                    </div>
                <?php } ?>	
                <!-- END WIDGETS -->
            </div>
        </div>
		<!-- END ACCORDION MENU -->
        
        <!-- BEGIN SEARCH FIELD -->
        <?php if( get_theme_mod('bonfire_touchy_hide_search_button', '') === '') { ?>

            <?php if( get_theme_mod('bonfire_touchy_fullscreen_search', '') === '') { ?>

                <div class="touchy-search-wrapper">
                    <form method="get" id="searchform" action="<?php echo esc_url( home_url('') ); ?>/">
                        <input type="text" name="s" class="touchy-search-field" placeholder="<?php if( get_theme_mod('bonfire_touchy_search_placeholder', '') === '') { ?><?php esc_html_e( 'Enter search term...' , 'bonfire' ) ?><?php } else { ?><?php echo get_theme_mod('bonfire_touchy_search_placeholder'); ?><?php } ?>">
                        <div class="touchy-clear-search-wrapper">
                            <?php if( get_theme_mod('bonfire_touchy_hide_clear_function', '') === '') { ?><div class="touchy-clear-search"></div><?php } ?>
                            <?php if( get_theme_mod('bonfire_touchy_hide_search_field_button', '') === '') { ?>
                                <input type="submit" name="submit" class="touchy-search" value="<?php if( get_theme_mod('bonfire_touchy_search_button_text', '') === '') { ?><?php esc_html_e( 'Search' , 'bonfire' ) ?><?php } else { ?><?php echo get_theme_mod('bonfire_touchy_search_button_text'); ?><?php } ?>" />
                            <?php } ?>
                        </div>
                    </form>
                </div>

            <?php } else { ?>

                <div class="touchy-fullscreen-search-wrapper">
                    <div class="touchy-search-wrapper">
                        <form method="get" id="searchform" action="<?php echo esc_url( home_url('') ); ?>/">
                            <input type="text" name="s" class="touchy-search-field" placeholder="<?php if( get_theme_mod('bonfire_touchy_search_placeholder', '') === '') { ?><?php esc_html_e( 'Enter search term...' , 'bonfire' ) ?><?php } else { ?><?php echo get_theme_mod('bonfire_touchy_search_placeholder'); ?><?php } ?>">
                            <div class="touchy-clear-search-wrapper">
                                <?php if( get_theme_mod('bonfire_touchy_hide_clear_function', '') === '') { ?><div class="touchy-clear-search"></div><?php } ?>
                            </div>
                        </form>
                    </div>
                </div>

            <?php } ?>

        <?php } ?>
        <!-- END SEARCH FIELD -->
        
        <!-- BEGIN MENUBAR STICKY (if logo location not hidden) -->
        <?php if( get_theme_mod('bonfire_touchy_hide_logo_area', '') === '' && get_theme_mod('bonfire_touchy_absolute_position', '') === '' && get_theme_mod('bonfire_touchy_bottom_position', '') === '') { ?>
        <script>
        jQuery(document).on('scroll', function(){
        'use strict';
            if( jQuery(this).scrollTop() > 60){
                jQuery('.touchy-wrapper').addClass('touchy-wrapper-top');
                jQuery('.touchy-search-wrapper, .touchy-fullscreen-search-wrapper').addClass('touchy-search-wrapper-scrolled');
                jQuery('.touchy-by-bonfire-wrapper').addClass('touchy-by-bonfire-wrapper-scrolled');
            } else {
                jQuery('.touchy-wrapper').removeClass('touchy-wrapper-top');
                jQuery('.touchy-search-wrapper, .touchy-fullscreen-search-wrapper').removeClass('touchy-search-wrapper-scrolled');
                jQuery('.touchy-by-bonfire-wrapper').removeClass('touchy-by-bonfire-wrapper-scrolled');
            }
        });
        </script>
        <?php } ?>
        <!-- END MENUBAR STICKY (if logo location not hidden) -->
        
        <!-- BEGIN SLIDE-IN ON LOAD -->
        <?php if( get_theme_mod('bonfire_touchy_slidein', '') !== '') { ?>

            <style>
            .touchy-wrapper {
                -webkit-transform:translateY(<?php if( get_theme_mod('bonfire_touchy_bottom_position', '') === '') { ?>-<?php } ?>100%) !important;
                transform:translateY(<?php if( get_theme_mod('bonfire_touchy_bottom_position', '') === '') { ?>-<?php } ?>100%) !important;
            }
            .touchy-slidein {
                -webkit-transform:translateY(0%) !important;
                transform:translateY(0%) !important;
                
                -webkit-transition:transform .65s ease .2s !important;
                transition:transform .65s ease .2s !important;
            }
            </style>

            <script>
            jQuery(document).ready(function ($) {
            'use strict';
                jQuery(".touchy-wrapper").addClass("touchy-slidein");
            });
            </script>

        <?php } ?>
        <!-- END SLIDE-IN ON LOAD -->

        <!-- BEGIN FADE OUT LOGO ON SCROLL -->
        <script>
        jQuery(window).scroll(function(){
        'use strict';
            jQuery(".touchy-logo, .touchy-logo-image").css("opacity", 1 - jQuery(window).scrollTop() / 50);
        });
        </script>
        <!-- END FADE OUT LOGO ON SCROLL -->
        
        <!-- BEGIN MENUBAR SHADOW SIZE INCREASE ON SCROLL (unless absolute or bottom positioning selected) -->
        <?php if( get_theme_mod('bonfire_touchy_absolute_position', '') === '' && get_theme_mod('bonfire_touchy_bottom_position', '') === '' && get_theme_mod('bonfire_touchy_scroll_shadow', '') !== '') { ?>
        <script>
        jQuery(window).scroll(function() {    
        'use strict'; 
            var scroll = jQuery(window).scrollTop();
            if (scroll > 60) {
                jQuery(".touchy-wrapper").addClass("touchy-wrapper-shadow-active");
            }
            else {
                jQuery(".touchy-wrapper").removeClass("touchy-wrapper-shadow-active");
            }
        });
        </script>
        <?php } ?>
        <!-- END MENUBAR SHADOW SIZE INCREASE ON SCROLL (unless absolute or bottom positioning selected) -->
        
        <!-- BEGIN RETINA IMAGE SUPPORT (for logo image only) -->
        <?php if( get_theme_mod('touchy_no_retina', '') !== '') { ?>
        <script>
        retinajs( jQuery('.touchy-logo-image img') );
        </script>
        <?php } ?>
        <!-- END RETINA LOGO IMAGE SUPPORT (for logo image only) -->

        <!-- BEGIN SEARCH FIELD AUTO-FOCUS (unless disabled) -->
        <?php if( get_theme_mod('bonfire_touchy_disable_search_field_focus', '') === '') { ?>
        <script>
        jQuery(".touchy-toggle-search").on('click', function(e) {
        'use strict';
        e.preventDefault();
            if(jQuery('.touchy-search-wrapper').hasClass('touchy-search-wrapper-active'))
            {
                /* un-focus search field */
                jQuery('input.touchy-search-field:text').blur();
            } else {
                /* focus search field */
                jQuery('input.touchy-search-field:text').focus();
            }
        });
        </script>
        <?php } ?>
        <!-- END SEARCH FIELD AUTO-FOCUS (unless disabled) -->

	<?php
	}
    add_action('wp_footer','bonfire_touchy_footer');
    
    //
	// WooCommerce cart AJAX
    //
    add_filter( 'woocommerce_add_to_cart_fragments', 'bonfire_touchy_woocommerce_header_add_to_cart_fragment' );

    function bonfire_touchy_woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;

        ob_start();

        ?>
        <a class="touchy-cart-count" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'bonfire'); ?>"><div class="touchy-shopping-icon"></div><span><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'bonfire'), $woocommerce->cart->cart_contents_count);?></span></span></a>
        <?php
        $fragments['a.touchy-cart-count'] = ob_get_clean();
        return $fragments;
    }

	//
	// ENQUEUE touchy.css
	//
	function bonfire_touchy_css() {
		wp_register_style( 'bonfire-touchy-css', plugins_url( '/touchy.css', __FILE__ ) . '', array(), '1', 'all' );
		wp_enqueue_style( 'bonfire-touchy-css' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_touchy_css' );

	//
	// ENQUEUE touchy.js
	//
	function bonfire_touchy_js() {
		wp_register_script( 'bonfire-touchy-js', plugins_url( '/touchy.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
		wp_enqueue_script( 'bonfire-touchy-js' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_touchy_js' );
    
    //
	// ENQUEUE touchy-accordion-full-link.js
	//
	function bonfire_touchy_accordion_full() {
        if(get_theme_mod('touchy_alternate_submenu_activation')) {
            wp_register_script( 'bonfire-touchy-accordion-full-link', plugins_url( '/touchy-accordion-full-link.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-touchy-accordion-full-link' );
        }
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_touchy_accordion_full' );
    
    //
	// ENQUEUE touchy-close-on-click.js
	//
    if(get_theme_mod('touchy_close_menu_on_click')) {
		function bonfire_touchy_close_on_click_js() {
            if(get_theme_mod('touchy_alternate_submenu_activation')) {
                wp_register_script( 'bonfire-touchy-close-on-click-js-full-link', plugins_url( '/touchy-close-on-click-full-link.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
                wp_enqueue_script( 'bonfire-touchy-close-on-click-js-full-link' );
            } else {
                wp_register_script( 'bonfire-touchy-close-on-click-js', plugins_url( '/touchy-close-on-click.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
                wp_enqueue_script( 'bonfire-touchy-close-on-click-js' );
            }
		}
		add_action( 'wp_enqueue_scripts', 'bonfire_touchy_close_on_click_js' );
	}
    
    //
	// ENQUEUE retina.min.js
	//
    if(get_theme_mod('touchy_no_retina', '') !== '') {
        function bonfire_touchy_retina_js() {
            wp_register_script( 'bonfire-touchy-retina-js', plugins_url( '/retina.min.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-touchy-retina-js' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_touchy_retina_js' );
    }

	//
	// ENQUEUE Font Awesome (unless disabled)
	//
	if( get_theme_mod('bonfire_touchy_disable_fontawesome', '') === '') {
        function bonfire_touchy_fontawesome() {
            wp_register_style( 'touchy-fontawesome', plugins_url( '/fonts/font-awesome/css/all.min.css', __FILE__ ) . '', array(), '1', 'all' );  
            wp_enqueue_style( 'touchy-fontawesome' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_touchy_fontawesome' );
    }

    //
	// Enqueue Line Awesome (unless disabled)
	//
    if(get_theme_mod('touchy_no_lineawesome', '') === '') {
		function bonfire_touchy_lineawesome() {
            wp_register_style( 'touchy-lineawesome', plugins_url( '/fonts/line-awesome/css/line-awesome.min.css', __FILE__ ) . '', array(), '1', 'all' );  
            wp_enqueue_style( 'touchy-lineawesome' );
		}
		add_action( 'wp_enqueue_scripts', 'bonfire_touchy_lineawesome' );
	}

	//
	// ENQUEUE Google WebFonts
	//
    function touchy_fonts_url() {
		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'touchy' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Roboto:400' ), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	}
	function touchy_scripts() {
		wp_enqueue_style( 'touchy-fonts', touchy_fonts_url(), array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'touchy_scripts' );

	//
	// Register Custom Menu Function
	//
	if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'touchy-by-bonfire' => ( 'Touchy, by Bonfire' ),
		) );
	}
    
    //
	// Translation-ready
	//
    function touchy_load_plugin_textdomain() {
        load_plugin_textdomain( 'touchy-menu', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    add_action( 'plugins_loaded', 'touchy_load_plugin_textdomain' );
    
    //
	// Add the walker class (for menu descriptions)
	//
	
	class Touchy_Menu_Description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '<div class="touchy-menu-item-description">' . $item->description . '</div>';
			$item_output .= '</a>';
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		}
	}
    
    //
	// Add 'Settings' link to plugin page
	//
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'touchy_add_action_links' );
    function touchy_add_action_links ( $links ) {
        $mylinks = array(
        '<a href="' . admin_url( 'customize.php?autofocus[panel]=touchy_panel' ) . '">Settings</a>',
        );
    return array_merge( $links, $mylinks );
    }

	//
	// Register Widgets
	//
	function bonfire_touchy_widgets_init() {

		register_sidebar( array(
		'name' => esc_html__( 'Touchy Widgets (above menu)', 'bonfire' ),
		'id' => 'touchy-widgets-top',
		'description' => esc_html__( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
        
        register_sidebar( array(
		'name' => esc_html__( 'Touchy Widgets (below menu)', 'bonfire' ),
		'id' => 'touchy-widgets',
		'description' => esc_html__( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));

	}
	add_action( 'widgets_init', 'bonfire_touchy_widgets_init' );
    
    //
	// Allow Shortcodes in Text Widget
	//
	add_filter('widget_text', 'do_shortcode');

	//
	// Insert customization options into the header
	//
	function bonfire_touchy_customize() {
	?>
		<style>
        /* logo location */
        .touchy-logo-wrapper { background-color:<?php echo get_theme_mod('bonfire_touchy_logo_area_background_color'); ?>; }
        .touchy-logo-wrapper { background-color:<?php if( get_theme_mod('bonfire_touchy_hide_logo_background', '') !== '') { ?>transparent<?php } ?>; }
        .touchy-logo a { color:<?php echo get_theme_mod('bonfire_touchy_logo_color'); ?>; }
        .touchy-logo a:hover { color:<?php echo get_theme_mod('bonfire_touchy_logo_hover_color'); ?>; }
        .touchy-logo-wrapper {
            <?php $touchy_logo_align = get_theme_mod( 'bonfire_touchy_logo_align' ); if( $touchy_logo_align === '' ) { 
                echo '
                text-align:center;
                ';
            }
            else if( $touchy_logo_align !== '' ) { switch ( $touchy_logo_align ) {
            case 'left':
            echo '
                text-align:left;
            ';
            break; case 'center':
            echo '
                text-align:center;
            ';
            break; case 'right':
            echo '
                text-align:right;
            ';
            break; }} ?>
        }
        .touchy-logo-wrapper-bg {
            <?php if( get_theme_mod('bonfire_touchy_logo_area_bg_image', '') !== '') { ?>
            background-image:url('<?php echo get_theme_mod( 'bonfire_touchy_logo_area_bg_image' ); ?>');
            <?php } ?>
            opacity:<?php echo get_theme_mod( 'bonfire_touchy_logo_area_bg_image_opacity' ); ?>;
            <?php if( get_theme_mod('bonfire_touchy_logo_area_bg_image_cover', '') !== '') { ?>
            background-size:cover;
            background-repeat:no-repeat;
            background-position:top left;
            <?php } ?>
        }
        .touchy-logo-image img { max-height:<?php echo get_theme_mod( 'bonfire_touchy_logo_image_height' ); ?>px; }

        /* if logo location hidden*/
        <?php if( get_theme_mod('bonfire_touchy_hide_logo_area', '') !== '') { ?>
        .touchy-wrapper { position:fixed; top:0; }
        .touchy-search-wrapper { position:fixed; top:0; }
        .touchy-by-bonfire-wrapper { position:fixed; top:65px; }
        <?php } ?>
        
        /* text labels */
        .touchy-wrapper .touchy-back-button::before {
            content:'<?php echo get_theme_mod('bonfire_touchy_back_icon_label'); ?>';
            color:<?php echo get_theme_mod('bonfire_touchy_back_button_label_color'); ?>;
        }
        .touchy-wrapper .touchy-call-button::before {
            content:'<?php echo get_theme_mod('bonfire_touchy_call_icon_label'); ?>';
            color:<?php echo get_theme_mod('bonfire_touchy_call_button_label_color'); ?>;
            margin-left:-2px;
        }
        .touchy-wrapper .touchy-email-button::before {
            content:'<?php echo get_theme_mod('bonfire_touchy_email_icon_label'); ?>';
            color:<?php echo get_theme_mod('bonfire_touchy_email_button_label_color'); ?>;
        }
        .touchy-wrapper .touchy-search-button::before {
            content:'<?php echo get_theme_mod('bonfire_touchy_search_icon_label'); ?>';
            color:<?php echo get_theme_mod('bonfire_touchy_search_button_label_color'); ?>;
        }
        .touchy-wrapper .touchy-woo-button::before {
            content:'<?php echo get_theme_mod('bonfire_touchy_woo_icon_label'); ?>';
            color:<?php echo get_theme_mod('bonfire_touchy_woo_button_label_color'); ?>;
        }
        .touchy-wrapper .touchy-menu-button::before {
            content:'<?php echo get_theme_mod('bonfire_touchy_menu_icon_label'); ?>';
            color:<?php echo get_theme_mod('bonfire_touchy_menu_button_label_color'); ?>;
        }
        
        /* text label hovers (on touch devices only) */
        <?php if ( wp_is_mobile() ) { } else { ?>
        .touchy-wrapper .touchy-back-button:hover::before { color:<?php echo get_theme_mod('bonfire_touchy_back_button_label_hover_color'); ?>; }
        .touchy-wrapper .touchy-call-button:hover::before { color:<?php echo get_theme_mod('bonfire_touchy_call_button_label_hover_color'); ?>; }
        .touchy-wrapper .touchy-email-button:hover::before { color:<?php echo get_theme_mod('bonfire_touchy_email_button_label_hover_color'); ?>; }
        .touchy-wrapper .touchy-search-button:hover::before { color:<?php echo get_theme_mod('bonfire_touchy_search_button_label_hover_color'); ?>; }
        .touchy-wrapper .touchy-woo-button:hover::before { color:<?php echo get_theme_mod('bonfire_touchy_woo_button_label_hover_color'); ?>; }
        .touchy-wrapper .touchy-menu-button:hover::before { color:<?php echo get_theme_mod('bonfire_touchy_menu_button_label_hover_color'); ?>; }
        <?php } ?>
        /* text label colors for search and menu button active states */
        .touchy-wrapper .touchy-search-button-active::before { color:<?php echo get_theme_mod('bonfire_touchy_search_button_label_hover_color'); ?>; }
        .touchy-wrapper .touchy-menu-button-active::before { color:<?php echo get_theme_mod('bonfire_touchy_menu_button_label_hover_color'); ?>; }
        
        /* button borders */
        .touchy-wrapper .touchy-back-button,
        .touchy-wrapper .touchy-call-button,
        .touchy-wrapper .touchy-email-button,
        .touchy-wrapper .touchy-search-button,
        .touchy-wrapper .touchy-woo-button,
        .touchy-wrapper .touchy-menu-button {
            border-width:0;
        }

        <?php if( get_theme_mod('bonfire_touchy_back_button_border_color', '') !== '') { ?>
        .touchy-wrapper .touchy-back-button {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_back_button_border_color'); ?>;
        }
        <?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_back_button_border_hover_color', '') !== '') { ?>
        .touchy-wrapper .touchy-back-button:hover {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_back_button_border_hover_color'); ?>;
        }
        <?php } ?>

        <?php if( get_theme_mod('bonfire_touchy_call_button_border_color', '') !== '') { ?>
        .touchy-wrapper .touchy-call-button {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_call_button_border_color'); ?>;
        }
        <?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_call_button_border_hover_color', '') !== '') { ?>
        .touchy-wrapper .touchy-call-button:hover {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_call_button_border_hover_color'); ?>;
        }
        <?php } ?>

        <?php if( get_theme_mod('bonfire_touchy_email_button_border_color', '') !== '') { ?>
        .touchy-wrapper .touchy-email-button {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_email_button_border_color'); ?>;
        }
        <?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_email_button_border_hover_color', '') !== '') { ?>
        .touchy-wrapper .touchy-email-button:hover {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_email_button_border_hover_color'); ?>;
        }
        <?php } ?>

        <?php if( get_theme_mod('bonfire_touchy_search_button_border_color', '') !== '') { ?>
        .touchy-wrapper .touchy-search-button {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_search_button_border_color'); ?>;
        }
        <?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_search_button_border_hover_color', '') !== '') { ?>
        .touchy-wrapper .touchy-search-button:hover {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
        }
        .touchy-wrapper .touchy-search-button-active {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_search_button_border_hover_color'); ?>;
        }
        <?php } ?>

        <?php if( get_theme_mod('bonfire_touchy_woo_button_border_color', '') !== '') { ?>
        .touchy-wrapper .touchy-woo-button {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_woo_button_border_color'); ?>;
        }
        <?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_woo_button_border_hover_color', '') !== '') { ?>
        .touchy-wrapper .touchy-woo-button:hover {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_woo_button_border_hover_color'); ?>;
        }
        <?php } ?>

        <?php if( get_theme_mod('bonfire_touchy_menu_button_border_color', '') !== '') { ?>
        .touchy-wrapper .touchy-menu-button {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_border_color'); ?>;
        }
        <?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_menu_button_border_hover_color', '') !== '') { ?>
        .touchy-wrapper .touchy-menu-button:hover {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
        }
        .touchy-wrapper .touchy-menu-button-active {
            <?php if( get_theme_mod('bonfire_touchy_bar_border', '') === '') { ?>border-bottom-width:2px;<?php } else { ?>border-top-width:2px;<?php } ?>
            border-style:solid;
            border-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_border_hover_color'); ?>;
        }
        <?php } ?>

        /* icon positioning if text label entered */
        <?php if( get_theme_mod('bonfire_touchy_back_icon_label', '') !== '') { ?>
        .touchy-back-text-label-offset > div { margin-top:-7px; }
        .touchy-back-text-label-offset span,
        .touchy-back-text-label-offset i { position:relative; top:-5px; }
        <?php } ?>
        
        <?php if( get_theme_mod('bonfire_touchy_call_icon_label', '') !== '') { ?>
        .touchy-call-text-label-offset > div { position:relative; top:-9px; }
        .touchy-call-text-label-offset span,
        .touchy-call-text-label-offset i { position:relative; top:-5px; }
        <?php } ?>
        
        <?php if( get_theme_mod('bonfire_touchy_email_icon_label', '') !== '') { ?>
        .touchy-email-text-label-offset > div { margin-top:-9px; }
        .touchy-email-text-label-offset span,
        .touchy-email-text-label-offset i { position:relative; top:-5px; }
        <?php } ?>
        
        <?php if( get_theme_mod('bonfire_touchy_search_icon_label', '') !== '') { ?>
        .touchy-search-text-label-offset > div { margin-top:-11px; }
        .touchy-search-text-label-offset span,
        .touchy-search-text-label-offset i { position:relative; top:-5px; }
        <?php } ?>

        <?php if( get_theme_mod('bonfire_touchy_woo_icon_label', '') !== '') { ?>
        .touchy-woo-text-label-offset > a { top:-4px; }
        .touchy-cart-count > span {	top:-4px; }
        <?php } ?>
        
        <?php if( get_theme_mod('bonfire_touchy_menu_icon_label', '') !== '') { ?>
        .touchy-menu-text-label-offset > div { margin-top:-8px; }
        .touchy-menu-text-label-offset i { position:relative; top:-8px; }
        <?php } else { ?>
        .touchy-menu-text-label-offset i { position:relative; top:-3px; }
        <?php } ?>
        
        /* custom text label font size */
        .touchy-wrapper .touchy-back-button::before,
        .touchy-wrapper .touchy-call-button::before,
        .touchy-wrapper .touchy-email-button::before,
        .touchy-wrapper .touchy-search-button::before,
        .touchy-wrapper .touchy-woo-button::before,
        .touchy-wrapper .touchy-menu-button::before {
            font-size:<?php echo get_theme_mod('bonfire_touchy_text_label_font_size'); ?>px;
        }

        /* FontAwesome icon font size */
        <?php if( get_theme_mod('bonfire_touchy_fa_icon_font_size', '') !== '') { ?>
        .touchy-wrapper i {
            margin-top:2px;
            font-size:<?php echo get_theme_mod('bonfire_touchy_fa_icon_font_size'); ?>px;
        }
        <?php } ?>
        
		/* BACK button */
		.touchy-wrapper .touchy-back-button { color:<?php echo get_theme_mod('bonfire_touchy_back_button_icon_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_back_button_color'); ?>; }
		/* CALL button */
		.touchy-wrapper .touchy-call-button { color:<?php echo get_theme_mod('bonfire_touchy_call_button_icon_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_call_button_color'); ?>; }
		/* EMAIL button */
		.touchy-wrapper .touchy-email-button { color:<?php echo get_theme_mod('bonfire_touchy_email_button_icon_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_email_button_color'); ?>; }
		/* SEARCH button */
		.touchy-wrapper .touchy-search-button { color:<?php echo get_theme_mod('bonfire_touchy_search_button_icon_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_search_button_color'); ?>; }
        /* WOO button */
		.touchy-wrapper .touchy-woo-button { color:<?php echo get_theme_mod('bonfire_touchy_woo_button_icon_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_woo_button_color'); ?>; }
        /* when search button active */
        .touchy-search-button-active { color:<?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color'); ?> !important; background-color:<?php echo get_theme_mod('bonfire_touchy_search_button_hover_color'); ?> !important; }
        .touchy-search-button-active .touchy-default-search-outer {            
            -webkit-box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color'); ?> !important;
            box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color'); ?> !important;
        }
        .touchy-search-button-active .touchy-default-search-outer:after,
        .touchy-search-button-active .touchy-default-search-inner,
        .touchy-search-button-active .touchy-default-search-inner:before,
        .touchy-search-button-active .touchy-default-search-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color'); ?> !important; }
        /* MENU button */
		.touchy-menu-button { color:<?php echo get_theme_mod('bonfire_touchy_menu_button_icon_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_color'); ?>; }
        .touchy-default-menu,
        .touchy-default-menu:before,
        .touchy-default-menu:after,
        .touchy-default-menu .touchy-menu-button-middle { background-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_icon_color'); ?>; }
        /* when menu button active */
        .touchy-menu-button-active { color:<?php echo get_theme_mod('bonfire_touchy_menu_button_icon_hover_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_hover_color'); ?>; }
        .touchy-menu-button-active .touchy-default-menu,
        .touchy-menu-button-active .touchy-default-menu:before,
        .touchy-menu-button-active .touchy-default-menu:after { background-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_icon_hover_color'); ?>; }
        /* menu button animation */
        <?php if( get_theme_mod('bonfire_touchy_menu_button_animation_altx', '') !== '') { ?>

            /* main menu button top bar animation */
            .touchy-default-menu::before {
                position:relative;
                transform-origin:top left;
                
                animation-duration:.35s;
                animation-timing-function:ease-in-out;
                animation-iteration-count:1;
                animation-fill-mode:forwards;
            }
            @keyframes touchy-menu-button-top-in {
                0% { width:23px; transform:rotate(0); }
                50% { width:0; transform:rotate(0); }
                51% { width:0; transform:rotate(45deg) translateY(-3px) translateX(3px); }
                100% { width:23px; transform:rotate(45deg) translateY(-3px) translateX(3px); }
            }
            @keyframes touchy-menu-button-top-out {
                0% { width:23px; transform:rotate(45deg) translateY(-3px) translateX(3px); }
                50% { width:0; transform:rotate(45deg) translateY(-3px) translateX(3px); }
                51% { width:0; transform:rotate(0); }
                100% { width:23px; transform:rotate(0); }
            }
            .touchy-menu-button-active .touchy-default-menu::before {
                animation-name:touchy-menu-button-top-in;
            }
            .touchy-menu-button-inactive .touchy-default-menu::before {
                animation-name:touchy-menu-button-top-out;
            }
            /* main menu button bottom bar animation */
            .touchy-default-menu::after {
                position:relative;
                transform-origin:top left;
                
                animation-duration:.5s;
                animation-timing-function:ease-in-out;
                animation-iteration-count:1;
                animation-fill-mode:forwards;
            }
            @keyframes touchy-menu-button-bottom-in {
                0% { width:23px; transform:rotate(0); }
                50% { width:0; transform:rotate(0); }
                51% { width:0; transform:rotate(-45deg) translateY(3px); }
                100% { width:23px; transform:rotate(-45deg) translateY(3px); }
            }
            @keyframes touchy-menu-button-bottom-out {
                0% { width:23px; transform:rotate(-45deg) translateY(3px); }
                50% { width:0; transform:rotate(-45deg) translateY(3px); }
                51% { width:0; transform:rotate(0); }
                1000% { width:23px; transform:rotate(0); }
            }
            .touchy-menu-button-active .touchy-default-menu::after {
                animation-name:touchy-menu-button-bottom-in;
            }
            .touchy-menu-button-inactive .touchy-default-menu::after {
                animation-name:touchy-menu-button-bottom-out;
            }
            /* main menu button middle bar animation */
            .touchy-default-menu,
            .touchy-menu-button:hover .touchy-default-menu { background-color:transparent !important; }
            .touchy-menu-button-middle {
                transform-origin:top right;

                content:'';
                position:absolute;
                display:block;
                top:1px;
                width:23px;
                height:2px;
                background-color:#C2C2C6;

                -webkit-transition:all .25s ease;
                transition:all .25s ease;
            }
            .touchy-menu-button-active .touchy-menu-button-middle {
                transform:scaleX(0);
                
                -webkit-transition:transform .25s ease, background-color .25s ease;
                transition:transform .25s ease, background-color .25s ease;
            }
            /* give version of animated menu button rounded corners */
            .touchy-default-menu::before,
            .touchy-default-menu::after,
            .touchy-menu-button-middle {
                border-radius:5px;
            }
        
        <?php } else { ?>

            <?php if( get_theme_mod('bonfire_touchy_menu_button_animation', '') !== '') { ?>
            .touchy-menu-button-active .touchy-default-menu {
                background-color:transparent !important;
            }
            .touchy-menu-button-active .touchy-default-menu:before {
                top:0;
                transform:rotate(135deg);
            }
            .touchy-menu-button-active .touchy-default-menu:after {
                top:0;
                transform:rotate(45deg);
            }
            <?php } ?>
            
        
        <?php } ?>

        /* menubar background color */
        <?php if( get_theme_mod('bonfire_touchy_menubar_background_color', '') !== '') { ?>
        .touchy-wrapper-inner {
            background-color:<?php echo get_theme_mod('bonfire_touchy_menubar_background_color'); ?>;
        }
        .touchy-wrapper .touchy-back-button,
        .touchy-wrapper .touchy-call-button,
        .touchy-wrapper .touchy-email-button,
        .touchy-wrapper .touchy-search-button,
        .touchy-wrapper .touchy-woo-button,
        .touchy-wrapper .touchy-menu-button { background-color:transparent; }
        <?php } ?>

        /* show top button hovers on non-touch devices only */
        <?php if ( wp_is_mobile() ) { } else { ?>
        .touchy-back-button:hover { color:<?php echo get_theme_mod('bonfire_touchy_back_button_icon_hover_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_back_button_hover_color'); ?>; }
        .touchy-call-button:hover { color:<?php echo get_theme_mod('bonfire_touchy_call_button_icon_hover_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_call_button_hover_color'); ?>; }
        .touchy-email-button:hover { color:<?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_email_button_hover_color'); ?>; }
        .touchy-search-button:hover { color:<?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color'); ?>; border-color:<?php echo get_theme_mod('bonfire_touchy_search_button_border_hover_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_search_button_hover_color'); ?>; }
        .touchy-woo-button:hover { background-color:<?php echo get_theme_mod('bonfire_touchy_woo_button_hover_color'); ?>; }
        .touchy-woo-button:hover .touchy-shopping-icon { background-color:<?php echo get_theme_mod('touchy_woo_icon_hover_color'); ?>; }
        .touchy-menu-button:hover { color:<?php echo get_theme_mod('bonfire_touchy_menu_button_icon_hover_color'); ?>; border-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_border_hover_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_hover_color'); ?>; }

        /* default back button */
        .touchy-back-button:hover .touchy-default-back,
        .touchy-back-button:hover .touchy-default-back:before,
        .touchy-back-button:hover .touchy-default-back:after { background-color:<?php echo get_theme_mod('bonfire_touchy_back_button_icon_hover_color'); ?>; }

        /* default call icon hovers */
        .touchy-call-button:hover .touchy-default-call-one,
        .touchy-call-button:hover .touchy-default-call-two,
        .touchy-call-button:hover .touchy-default-call-three,
        .touchy-call-button:hover .touchy-default-call-one:before,
        .touchy-call-button:hover .touchy-default-call-two:before,
        .touchy-call-button:hover .touchy-default-call-three:before,
        .touchy-call-button:hover .touchy-default-call-one:after,
        .touchy-call-button:hover .touchy-default-call-two:after,
        .touchy-call-button:hover .touchy-default-call-three:after { background-color:<?php echo get_theme_mod('bonfire_touchy_call_button_icon_hover_color'); ?>; }

        /* default email icon hovers */
        .touchy-email-button:hover .touchy-default-email-outer {
            -webkit-box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color'); ?>;
            box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color'); ?>;
        }
        .touchy-email-button:hover .touchy-default-email-outer:before,
        .touchy-email-button:hover .touchy-default-email-outer:after,
        .touchy-email-button:hover .touchy-default-email-outer .touchy-default-email-inner:before,
        .touchy-email-button:hover .touchy-default-email-outer .touchy-default-email-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_email_button_icon_hover_color'); ?>; }
        
        /* default search icon hovers */
        .touchy-search-button:hover .touchy-default-search-outer {
            -webkit-box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color'); ?>;
            box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color'); ?>;
        }
        .touchy-search-button:hover .touchy-default-search-outer:after,
        .touchy-search-button:hover .touchy-default-search-outer .touchy-default-search-inner,
        .touchy-search-button:hover .touchy-default-search-outer .touchy-default-search-inner:before,
        .touchy-search-button:hover .touchy-default-search-outer .touchy-default-search-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_search_button_icon_hover_color'); ?>; }
        
        /* default menu icon hover */
        .touchy-menu-button:hover .touchy-default-menu,
        .touchy-menu-button:hover .touchy-default-menu:before,
        .touchy-menu-button:hover .touchy-default-menu:after,
        .touchy-menu-button:hover .touchy-menu-button-middle { background-color:<?php echo get_theme_mod('bonfire_touchy_menu_button_icon_hover_color'); ?>; }
        <?php } ?>
        
        /* default back button */
        .touchy-default-back,
        .touchy-default-back:before,
        .touchy-default-back:after { background-color:<?php echo get_theme_mod('bonfire_touchy_back_button_icon_color'); ?>; }
        
        /* default call button */
        .touchy-default-call-one,
        .touchy-default-call-two,
        .touchy-default-call-three,
        .touchy-default-call-one:before,
        .touchy-default-call-two:before,
        .touchy-default-call-three:before,
        .touchy-default-call-one:after,
        .touchy-default-call-two:after,
        .touchy-default-call-three:after { background-color:<?php echo get_theme_mod('bonfire_touchy_call_button_icon_color'); ?>; }
        
        /* default email button */
        .touchy-email-button .touchy-default-email-outer {
            -webkit-box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_email_button_icon_color'); ?>;
            box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_email_button_icon_color'); ?>;
        }
        .touchy-email-button .touchy-default-email-outer:before,
        .touchy-email-button .touchy-default-email-outer:after,
        .touchy-email-button .touchy-default-email-outer .touchy-default-email-inner:before,
        .touchy-email-button .touchy-default-email-outer .touchy-default-email-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_email_button_icon_color'); ?>; }
        
        /* default search button */
        .touchy-search-button .touchy-default-search-outer {
            -webkit-box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_color'); ?>;
            box-shadow:0px 0px 0px 2px <?php echo get_theme_mod('bonfire_touchy_search_button_icon_color'); ?>;
        }
        .touchy-search-button .touchy-default-search-outer:after,
        .touchy-search-button .touchy-default-search-outer .touchy-default-search-inner,
        .touchy-search-button .touchy-default-search-outer .touchy-default-search-inner:before,
        .touchy-search-button .touchy-default-search-outer .touchy-default-search-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_search_button_icon_color'); ?>; }

        /* menu bar dividers */
        <?php if( get_theme_mod('bonfire_touchy_button_separator_margin', '') !== '') { ?>
		.touchy-wrapper .touchy-back-button:after,
        .touchy-wrapper .touchy-call-button:after,
        .touchy-wrapper .touchy-email-button:after,
        .touchy-wrapper .touchy-search-button:after,
        .touchy-wrapper .touchy-woo-button:after {
            top:<?php echo get_theme_mod('bonfire_touchy_button_separator_margin'); ?>px;
            bottom:<?php echo get_theme_mod('bonfire_touchy_button_separator_margin'); ?>px;
            height:auto;
        }
        <?php } ?>
        
		/* menu bar dividers */
		.touchy-back-button:after,
        .touchy-call-button:after,
        .touchy-email-button:after,
        .touchy-search-button:after,
        .touchy-woo-button:after { background-color:<?php if( get_theme_mod('bonfire_touchy_hide_menubar_separators', '') !== '') { ?>transparent<? } else { ?><?php if( get_theme_mod('bonfire_touchy_button_separator_color', '') !== '') { ?><?php echo get_theme_mod('bonfire_touchy_button_separator_color'); ?><? } else { ?>#EBEBEB<?php } ?><?php } ?>; }
        
        /* hide button dividers on button hover when hover button background color selected (on non-touch devices only) */
        <?php if ( wp_is_mobile() ) { } else { ?>
        <?php if( get_theme_mod('bonfire_touchy_back_button_hover_color', '') !== '') { ?>.touchy-back-button:hover:after { opacity:0; }<?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_call_button_hover_color', '') !== '') { ?>.touchy-call-button:hover:after { opacity:0; }<?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_email_button_hover_color', '') !== '') { ?>.touchy-email-button:hover:after { opacity:0; }<?php } ?>
        <?php if( get_theme_mod('bonfire_touchy_search_button_hover_color', '') !== '') { ?>.touchy-search-button:hover:after, .touchy-search-button-active:after { opacity:0; }<?php } ?>
        <?php } ?>

        /* search field placeholder color */
        input.touchy-search-field::-webkit-input-placeholder { color:<?php echo get_theme_mod('bonfire_touchy_search_field_placeholder_color'); ?> !important; }
        input.touchy-search-field:-moz-placeholder { color:<?php echo get_theme_mod('bonfire_touchy_search_field_placeholder_color'); ?> !important; }
        input.touchy-search-field::-moz-placeholder { color:<?php echo get_theme_mod('bonfire_touchy_search_field_placeholder_color'); ?> !important; }
        /* search field text color */
        .touchy-search-wrapper input.touchy-search-field { color:<?php echo get_theme_mod('bonfire_touchy_search_field_text_color'); ?>; }
        /* search field 'clear field' button color */
        .touchy-clear-search::before,
        .touchy-clear-search::after { background-color:<?php echo get_theme_mod('bonfire_touchy_search_field_clear_color'); ?> !important; }
        /* search field background color */
        .touchy-search-wrapper input.touchy-search-field { background-color:<?php echo get_theme_mod('bonfire_touchy_search_field_background_color'); ?>; }
        /* search button text + background color */
        .touchy-search-wrapper input.touchy-search { color:<?php echo get_theme_mod('bonfire_touchy_search_field_search_button_text_color'); ?>; background-color:<?php echo get_theme_mod('bonfire_touchy_search_field_search_button_color'); ?>; }
        /* full-screen search background color */
        .touchy-fullscreen-search-wrapper {
            background-color:<?php echo get_theme_mod('bonfire_touchy_fullscreen_search_bg_color'); ?>;
            
            <?php if( get_theme_mod('bonfire_touchy_fullscreen_search_bg_image', '') !== '') { ?>
                background-image:url('<?php echo get_theme_mod('bonfire_touchy_fullscreen_search_bg_image'); ?>');
                <?php if( get_theme_mod('bonfire_touchy_fullscreen_search_bg_image_pattern', '') === '') { ?>
                    background-size:cover;
                <?php } else { ?>
                    background-repeat:repeat;
                <?php } ?>
            <?php } ?>
        }

        /* WOO BUTTON */
        /* woocommerce icon select */
        <?php $bonfire_touchy_woo_icon_select = get_theme_mod('touchy_woo_icon_select'); if($bonfire_touchy_woo_icon_select !== '') { switch ($bonfire_touchy_woo_icon_select) { case 'bag': ?>
            .touchy-shopping-icon {
                -webkit-mask-image:url(<?php echo plugin_dir_url( __FILE__ ). 'icons/touchy-shopping-bag.svg' ?>);
                mask-image:url(<?php echo plugin_dir_url( __FILE__ ). 'icons/touchy-shopping-bag.svg' ?>);
            }
        <?php break; } } ?>
        /* woocommerce icon colors */
        .touchy-shopping-icon {
            background-color:<?php echo get_theme_mod('touchy_woo_icon_color'); ?>;
        }
        a.touchy-cart-count:hover .touchy-shopping-icon {
            
        }
        .touchy-cart-count > span {
            color:<?php echo get_theme_mod('touchy_woo_item_count_color'); ?>;
            background-color:<?php echo get_theme_mod('touchy_woo_item_count_background_color'); ?>;
        }

        /* accordion + tooltip background, corner radius, menu end marker */
        .touchy-by-bonfire {
            border-radius:<?php echo get_theme_mod('touchy_menu_border_radius'); ?>px;
            border-bottom-width:<?php echo get_theme_mod('touchy_menu_end_marker_thickness'); ?>px;
        }
		.touchy-menu-tooltip:before { border-bottom-color:<?php echo get_theme_mod('bonfire_touchy_dropdown_background_color'); ?>; }
		.touchy-by-bonfire { background:<?php echo get_theme_mod('bonfire_touchy_dropdown_background_color'); ?>; border-color:<?php echo get_theme_mod('bonfire_touchy_dropdown_end_marker_color'); ?>; }
        /* if tooltip color overridden */
        .touchy-menu-tooltip:before { border-bottom-color:<?php echo get_theme_mod('bonfire_touchy_tooltip_color'); ?>; }
        
        /* sub-menu background */
        .touchy-by-bonfire ul.sub-menu { background:<?php echo get_theme_mod('bonfire_touchy_dropdown_sub_background_color'); ?>; }

        /* horizontal menu item divider */
        .touchy-by-bonfire .menu > li,
        .touchy-by-bonfire ul.sub-menu > li:first-child { border-color:<?php echo get_theme_mod('bonfire_touchy_dropdown_horizontal_divider_color'); ?>; }
        /* horizontal menu item divider (sub-menu) */
        .touchy-by-bonfire ul li ul li:after { background-color:<?php echo get_theme_mod('bonfire_touchy_dropdown_submenu_horizontal_divider_color'); ?>; }

		/* accordion menu separator */
		.touchy-by-bonfire .menu li span { border-color:<?php echo get_theme_mod('bonfire_touchy_dropdown_menu_item_separator_color'); ?>; }
        /* accordion menu separator (sub-menu) */
		.touchy-by-bonfire .sub-menu li span { border-color:<?php echo get_theme_mod('bonfire_touchy_dropdown_submenu_item_separator_color'); ?>; }
        
		/* submenu arrow animation */
        <?php $touchy_submenu_arrow_animation = get_theme_mod( 'bonfire_touchy_submenu_arrow_animation' ); if( $touchy_submenu_arrow_animation === '' ) { 
            echo '
            .touchy-by-bonfire span.touchy-submenu-active span::before {
                -webkit-transform:rotate(-45deg);
                transform:rotate(-45deg);
            }
            .touchy-by-bonfire span.touchy-submenu-active span::after {
                -webkit-transform:rotate(45deg);
                transform:rotate(45deg);
            }
            ';
        }
        else if( $touchy_submenu_arrow_animation !== '' ) { switch ( $touchy_submenu_arrow_animation ) {
        case 'down':
        echo '
            .touchy-by-bonfire span.touchy-submenu-active span::before {
                -webkit-transform:rotate(-45deg);
                transform:rotate(-45deg);
            }
            .touchy-by-bonfire span.touchy-submenu-active span::after {
                -webkit-transform:rotate(45deg);
                transform:rotate(45deg);
            }
        ';
        break; case 'x':
        echo '
            .touchy-by-bonfire span.touchy-submenu-active span::before {
                -webkit-transform:translateX(1px) rotate(45deg);
                transform:translateX(1px) rotate(45deg);
            }
            .touchy-by-bonfire span.touchy-submenu-active span::after {
                -webkit-transform:translateX(-3px) rotate(135deg);
                transform:translateX(-3px) rotate(135deg)
            }
            .touchy-by-bonfire span.touchy-submenu-active .touchy-sub-arrow-inner::before,
            .touchy-by-bonfire span.touchy-submenu-active .touchy-sub-arrow-inner::after { width:9px; }
        ';
        break; }} ?>
        /* accordion menu item */
		.touchy-by-bonfire .menu a {
            font-size:<?php echo get_theme_mod('touchy_menu_font_size'); ?>px;
            line-height:<?php echo get_theme_mod('touchy_menu_line_height'); ?>px;
            font-family:<?php echo get_theme_mod('touchy_menu_theme_font'); ?>;
            color:<?php echo get_theme_mod('bonfire_touchy_menu_item_color'); ?>;
        }
        .touchy-by-bonfire ul li.current-menu-item > a,
        .touchy-by-bonfire .sub-menu .current-menu-item > a { color:<?php echo get_theme_mod('bonfire_touchy_current_menu_item_color'); ?>; }
		.touchy-by-bonfire .menu a:hover,
        .touchy-by-bonfire ul li.current-menu-item a:hover,
        .touchy-by-bonfire .menu a:active { color:<?php echo get_theme_mod('bonfire_touchy_menu_item_hover_color'); ?>; }
        
        /* menu icons */
        .touchy-by-bonfire .menu a i {
            font-size:<?php echo get_theme_mod('touchy_menu_icon_size'); ?>px;
            color:<?php echo get_theme_mod('bonfire_touchy_menu_item_icon_color'); ?>;
        }
        .touchy-by-bonfire .menu a:hover i {
            color:<?php echo get_theme_mod('bonfire_touchy_menu_item_icon_hover_color'); ?>;
        }
        .touchy-by-bonfire .sub-menu a i {
            font-size:<?php echo get_theme_mod('touchy_menu_icon_size'); ?>px;
            color:<?php echo get_theme_mod('bonfire_touchy_submenu_item_icon_color'); ?>;
        }
        .touchy-by-bonfire .sub-menu a:hover i {
            color:<?php echo get_theme_mod('bonfire_touchy_submenu_item_icon_hover_color'); ?>;
        }

		/* menu description */
		.touchy-menu-item-description {
            font-size:<?php echo get_theme_mod('touchy_menu_description_font_size'); ?>px;
            line-height:<?php echo get_theme_mod('touchy_menu_description_line_height'); ?>px;
            margin-top:<?php echo get_theme_mod('touchy_menu_description_top_margin'); ?>px;
            font-family:<?php echo get_theme_mod('touchy_menu_theme_font'); ?>;
            color:<?php echo get_theme_mod('bonfire_touchy_menu_item_description_color'); ?>;
        }

		/* accordion sub-menu item */
		.touchy-by-bonfire .sub-menu a { color:<?php echo get_theme_mod('bonfire_touchy_submenu_item_color'); ?>; }
		.touchy-by-bonfire .sub-menu a:hover, .touchy-by-bonfire .sub-menu a:active { color:<?php echo get_theme_mod('bonfire_touchy_submenu_item_hover_color'); ?>; }
		
        /* highlighted menu item */
        .touchy-by-bonfire ul li.marker > a { border-color:<?php echo get_theme_mod('bonfire_touchy_menu_item_highlight'); ?>; }
        
		/* content overlay color + transparency */
		.touchy-overlay { background-color:<?php echo get_theme_mod('bonfire_touchy_overlay_color'); ?>; }
        .touchy-overlay-active { opacity:<?php echo get_theme_mod('bonfire_touchy_overlay_transparency'); ?>; }
        
        /* menu height */
        .touchy-wrapper { height:<?php echo get_theme_mod('bonfire_touchy_menu_height'); ?>px; }

		/* menu transparency */
        .touchy-wrapper { opacity:<?php echo get_theme_mod('bonfire_touchy_menu_transparency'); ?>; }
        
        /* menubar border roundness */
        .touchy-wrapper-inner {
            border-top-left-radius:<?php echo get_theme_mod('bonfire_touchy_menu_top_corner'); ?>px;
            border-top-right-radius:<?php echo get_theme_mod('bonfire_touchy_menu_top_corner'); ?>px;
            border-bottom-left-radius:<?php echo get_theme_mod('bonfire_touchy_menu_bottom_corner'); ?>px;
            border-bottom-right-radius:<?php echo get_theme_mod('bonfire_touchy_menu_bottom_corner'); ?>px;
        }
        .touchy-wrapper a:first-child {
            border-top-left-radius:<?php echo get_theme_mod('bonfire_touchy_menu_top_corner'); ?>px;
            border-bottom-left-radius:<?php echo get_theme_mod('bonfire_touchy_menu_bottom_corner'); ?>px;
        }
        <?php if( get_theme_mod('bonfire_touchy_hide_menu_button', '') === '') { ?>
        .touchy-menu-button {
            border-top-right-radius:<?php echo get_theme_mod('bonfire_touchy_menu_top_corner'); ?>px;
            border-bottom-right-radius:<?php echo get_theme_mod('bonfire_touchy_menu_bottom_corner'); ?>px;
        }
        <?php } else { ?>
        .touchy-wrapper a:last-child {
            border-top-right-radius:<?php echo get_theme_mod('bonfire_touchy_menu_top_corner'); ?>px;
            border-bottom-right-radius:<?php echo get_theme_mod('bonfire_touchy_menu_bottom_corner'); ?>px;
        }
        .touchy-wrapper a:last-child:after {
            display:none;
        }
        <?php } ?>

        /* hide menubar shadow */
        <?php if( get_theme_mod('bonfire_touchy_hide_shadow', '') !== '') { ?>
        .touchy-wrapper {
            -webkit-box-shadow:none;
            box-shadow:none;
        }
		<?php } ?>
        
        /* widget area background */
        .touchy-widgets-wrapper { background-color:<?php echo get_theme_mod('bonfire_touchy_widget_area_color'); ?>; }
        
        /* absolute positioning */
        <?php if( get_theme_mod('bonfire_touchy_absolute_position', '') !== '') { ?>
        .touchy-wrapper,
        .touchy-by-bonfire-wrapper,
        .touchy-search-wrapper { position:absolute !important; }
        .touchy-by-bonfire {
            overflow:visible;
            max-height:none;
        }
        <?php } ?>
        
        /* bottom positioning */
        <?php if( get_theme_mod('bonfire_touchy_bottom_position', '') !== '') { ?>
        .touchy-logo-wrapper {
            z-index:99992 !important;
            <?php if( get_theme_mod('bonfire_touchy_hide_logo_background', '') === '') { ?>
            -webkit-box-shadow:0 0 2px 0 rgba(0,0,0,0.14);
            box-shadow:0 0 2px 0 rgba(0,0,0,0.14);
            <?php } ?>
        }
        .touchy-wrapper {
            position:fixed !important;
            top:auto;
            bottom:0;
        }
        .touchy-by-bonfire-wrapper {
            position:fixed !important;
            top:20px;
            bottom:65px;
        }
        .touchy-search-wrapper {
            position:fixed !important;
            top:auto;
            bottom:0;
        }
        .touchy-fullscreen-search-wrapper .touchy-search-wrapper {
            position:fixed !important;
            top:0;
            bottom:auto;
        }
        .touchy-search-wrapper.touchy-search-wrapper-active {
            -webkit-transform:translateY(-51px);
            transform:translateY(-51px);
        }
        .touchy-fullscreen-search-wrapper .touchy-search-wrapper {
            -webkit-transform:translateY(-51px);
            transform:translateY(-51px);
        }
        .touchy-fullscreen-search-wrapper.touchy-search-wrapper-active .touchy-search-wrapper {
            -webkit-transform:translateY(0);
            transform:translateY(0);
        }
        .touchy-menu-tooltip:before {
            top:-17px;
            border-bottom:0;
            border-top:6px solid #fff;
            border-top-color:<?php echo get_theme_mod('bonfire_touchy_tooltip_color'); ?>;
        }
        .touchy-by-bonfire {
            position:absolute;
            top:auto;
            bottom:0;
            border-width:3px 0 0 0;

            -webkit-transform:translateY(10px);
            transform:translateY(10px);

            border-top-width:<?php echo get_theme_mod('touchy_menu_end_marker_thickness'); ?>px;
        }
        <?php } ?>
        
        /* hide logo area background shadow */
        <?php if( get_theme_mod('bonfire_touchy_hide_logo_background_shadow', '') !== '') { ?>
        .touchy-logo-wrapper {
            -webkit-box-shadow:none;
            box-shadow:none;
        }
		<?php } ?>
        
        /* accordion expand icon */
		.touchy-by-bonfire .touchy-sub-arrow-inner:before,
        .touchy-by-bonfire .touchy-sub-arrow-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_expand_icon_color'); ?>; }
        /* accordion expand icon (sub-menu) */
        .touchy-by-bonfire .sub-menu li .touchy-sub-arrow-inner:before,
        .touchy-by-bonfire .sub-menu li .touchy-sub-arrow-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_submenu_expand_icon_color'); ?>; }
        
        /* show sub-menu arrow hover colors on non-touch devices only */
        <?php if ( wp_is_mobile() ) { } else { ?>
        .touchy-by-bonfire .touchy-sub-arrow:hover .touchy-sub-arrow-inner:before,
        .touchy-by-bonfire .touchy-sub-arrow:hover .touchy-sub-arrow-inner:after { background-color:#777; }
        /* accordion expand icon hover */
        .touchy-by-bonfire .touchy-sub-arrow:hover .touchy-sub-arrow-inner:before,
        .touchy-by-bonfire .touchy-sub-arrow:hover .touchy-sub-arrow-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_expand_icon_hover_color'); ?>; }
        /* accordion expand icon hover (sub-menu) */
        .touchy-by-bonfire .sub-menu li .touchy-sub-arrow:hover .touchy-sub-arrow-inner:before,
        .touchy-by-bonfire .sub-menu li .touchy-sub-arrow:hover .touchy-sub-arrow-inner:after { background-color:<?php echo get_theme_mod('bonfire_touchy_submenu_expand_icon_hover_color'); ?>; }
        <?php } ?>
        
        /* full menu item menu */
        .touchy-by-bonfire .menu .full-item-arrow-hover > .touchy-sub-arrow .touchy-sub-arrow-inner::before,
        .touchy-by-bonfire .menu .full-item-arrow-hover > .touchy-sub-arrow .touchy-sub-arrow-inner::after,
        .touchy-by-bonfire .menu > li > span.touchy-submenu-active .touchy-sub-arrow-inner::before,
        .touchy-by-bonfire .menu > li > span.touchy-submenu-active .touchy-sub-arrow-inner::after { background-color:<?php echo get_theme_mod('bonfire_touchy_expand_icon_hover_color'); ?>; }
        /* full menu item sub-menu */
        .touchy-by-bonfire .sub-menu .full-item-arrow-hover > .touchy-sub-arrow .touchy-sub-arrow-inner::before,
        .touchy-by-bonfire .sub-menu .full-item-arrow-hover > .touchy-sub-arrow .touchy-sub-arrow-inner::after,
        .touchy-by-bonfire .sub-menu > li > span.touchy-submenu-active .touchy-sub-arrow-inner::before,
        .touchy-by-bonfire .sub-menu > li > span.touchy-submenu-active .touchy-sub-arrow-inner::after { background-color:<?php echo get_theme_mod('bonfire_touchy_submenu_expand_icon_hover_color'); ?>; }

        /* enable RTL */
        <?php if(get_theme_mod('touchy_enable_rtl')) { ?>
        .touchy-sub-arrow {
            right:auto;
            left:0;
        }
        .touchy-sub-arrow-inner {
            border-left:none;
            border-right-width:1px;
            border-right-style:solid;
        }
        .touchy-sub-arrow-inner::before {
            left:14px;
        }
        .touchy-sub-arrow-inner::after {
            left:18px;
        }
        .touchy-by-bonfire ul li {
            text-align:right;
        }
        .touchy-by-bonfire ul li a i,
        .touchy-by-bonfire .sub-menu a i {
            float:right;
            margin:2px 0 0 8px;
        }
        .touchy-menu-item-description {
            padding-right:0;
            padding-left:20px;
        }
        <?php } ?>

        /* fade dropdown menu into view */
        <?php if(get_theme_mod('touchy_fade_menu_into_view')) { ?>
        .touchy-by-bonfire,
        .touchy-menu-tooltip {
            opacity:0;
        }
        .touchy-menu-active .touchy-by-bonfire,
        .touchy-menu-button-active .touchy-menu-tooltip {
            opacity:1;
        }
        .touchy-menu-tooltip {
            display:block;
            -webkit-transition:all 0s ease 0s;
            transition:all 0s ease 0s;
        }
        .touchy-menu-button-active .touchy-menu-tooltip {
            -webkit-transition:all .25s ease .15s;
            transition:all .25s ease .15s;
        }
        <?php } ?>

        /* if submenu arrow divider is hidden */
        <?php if(get_theme_mod('touchy_alternate_submenu_activation')) { ?>
        .touchy-sub-arrow-inner { border:none; }
        <?php } ?>

        /* left/right menubar button padding */
        .touchy-wrapper-inner {
            width:calc(100% - 2 * <?php echo get_theme_mod('bonfire_touchy_menu_paddings'); ?>px);
            padding-left:<?php echo get_theme_mod('bonfire_touchy_menu_paddings'); ?>px;
            padding-right:<?php echo get_theme_mod('bonfire_touchy_menu_paddings'); ?>px;
        }

        /* if custom menu margin is entered */
        <?php if( get_theme_mod('bonfire_touchy_menu_margins', '') !== '') { ?>
        .touchy-wrapper {
            opacity:<?php echo get_theme_mod('bonfire_touchy_menu_transparency'); ?>;
            width:calc(100% - <?php echo get_theme_mod('bonfire_touchy_menu_margins'); ?>px * 2);
            left:<?php echo get_theme_mod('bonfire_touchy_menu_margins'); ?>px;
            margin:<?php echo get_theme_mod('bonfire_touchy_menu_margins'); ?>px 0;
        }
        .touchy-search-wrapper {
            <?php if( get_theme_mod('bonfire_touchy_bottom_position', '') !== '') { ?>
                bottom:<?php echo get_theme_mod('bonfire_touchy_menu_margins'); ?>px;
            <?php } else { ?>
                top:<?php echo get_theme_mod('bonfire_touchy_menu_margins'); ?>px;
            <?php } ?>
        }
        .touchy-by-bonfire-wrapper {
            <?php if( get_theme_mod('bonfire_touchy_bottom_position', '') !== '') { ?>
                bottom:calc(65px + <?php echo get_theme_mod('bonfire_touchy_menu_margins'); ?>px);
            <?php } else { ?>
                top:calc(65px + <?php echo get_theme_mod('bonfire_touchy_menu_margins'); ?>px);
            <?php } ?>
        }
        <?php } ?>
        
        /* push down Touchy if WordPress toolbar is active */
        <?php if ( is_admin_bar_showing() ) { ?>
        .touchy-logo-wrapper,
        .touchy-wrapper,
        .touchy-by-bonfire-wrapper,
        .touchy-search-wrapper { margin-top:32px; }
        @media screen and (max-width:782px) {
            .touchy-logo-wrapper,
            .touchy-wrapper,
            .touchy-by-bonfire-wrapper,
            .touchy-search-wrapper { margin-top:46px; }
        }
        <?php } ?>
        
		/* hide touchy between resolutions */
		@media ( min-width:<?php echo get_theme_mod('bonfire_touchy_smaller_than'); ?>px) and (max-width:<?php echo get_theme_mod('bonfire_touchy_larger_than'); ?>px) {
			.touchy-logo-wrapper,
            .touchy-search-wrapper,
            .touchy-fullscreen-search-wrapper,
            .touchy-wrapper,
			.touchy-overlay,
			.touchy-by-bonfire { display:none !important; }
		}
		/* hide theme menu */
		<?php if( get_theme_mod('bonfire_touchy_hide_theme_menu', '') !== '') { ?>
		@media screen and (max-width:<?php echo get_theme_mod('bonfire_touchy_smaller_than'); ?>px) {
			<?php echo get_theme_mod('bonfire_touchy_hide_theme_menu'); ?> { display:none !important; }
		}
		@media screen and (min-width:<?php echo get_theme_mod('bonfire_touchy_larger_than'); ?>px) {
			<?php echo get_theme_mod('bonfire_touchy_hide_theme_menu'); ?> { display:none !important; }
		}
		<?php } ?>
		</style>
		<!-- END CUSTOM COLORS (WP THEME CUSTOMIZER) -->
	
	<?php
	}
	add_action('wp_head','bonfire_touchy_customize');

    //
	// Insert customization options into the footer
	//
	function bonfire_touchy_customize_footer() {
	?>
    
        <?php if( get_theme_mod('bonfire_touchy_bottom_position', '') !== '') { ?>
            <style>
            /* add padding to ensure that whatever content may be at the top of the site doesn't get hidden behind the menu */
            <?php if( get_theme_mod('bonfire_touchy_hide_logo_area', '') === '') { ?>
                html {
                    <?php if ( is_admin_bar_showing() ) { ?>
                        margin-top:92px !important;
                    <?php } else { ?>
                        margin-top:60px !important;
                    <?php } ?>
                }
                <?php if ( is_admin_bar_showing() ) { ?>
                @media screen and (max-width:782px) {
                    html { margin-top:106px !important; }
                }
                <?php } ?>
            <?php } ?>
            html { padding-bottom:50px; }
            </style>
        <?php } else { ?>
            <style>
            /* add margin to ensure that whatever content may be at the top of the site doesn't get hidden behind the menu */
            <?php if( get_theme_mod('bonfire_touchy_hide_logo_area', '') === '') { ?>
                html {
                <?php if ( is_admin_bar_showing() ) { ?>
                    margin-top:143px !important;
                <?php } else { ?>
                    margin-top:111px;
                <?php } ?>
                }
                <?php if ( is_admin_bar_showing() ) { ?>
                @media screen and (max-width:782px) {
                    html { margin-top:157px !important; }
                }
                <?php } ?>
            <?php } else { ?>
                html {
                <?php if ( is_admin_bar_showing() ) { ?>
                    margin-top:83px !important;
                <?php } else { ?>
                    margin-top:51px;
                <?php } ?>
                }
                <?php if ( is_admin_bar_showing() ) { ?>
                @media screen and (max-width:782px) {
                    html { margin-top:97px !important; }
                }
                <?php } ?>
            <?php } ?>

<?php if( get_theme_mod('bonfire_touchy_menu_height', '') !== '') { ?>
    html { padding-top:calc(<?php echo get_theme_mod('bonfire_touchy_menu_height'); ?>px - 51px); }
<?php } ?>


            </style>
        <?php } ?>
        
        
        <style>
        /* hide touchy between resolutions */
		@media ( min-width:<?php echo get_theme_mod('bonfire_touchy_smaller_than'); ?>px) and (max-width:<?php echo get_theme_mod('bonfire_touchy_larger_than'); ?>px) {
            html {
            <?php if ( is_admin_bar_showing() ) { ?>
                margin-top:32px !important;
            <?php } else { ?>
                margin-top:0 !important;
            <?php } ?>
            }
            <?php if ( is_admin_bar_showing() ) { ?>
            @media screen and (max-width:782px) {
                html { margin-top:46px !important; }
            }
            <?php } ?>
			<?php if( get_theme_mod('bonfire_touchy_bottom_position', '') !== '') { ?>
				/* add padding to ensure that whatever content may be at the top of the site doesn't get hidden behind the menu */
				html { padding-bottom:0px !important; }
			<?php } ?>
		}
        </style>
    
    <?php
	}
	add_action('wp_footer','bonfire_touchy_customize_footer');

?>