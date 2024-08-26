<?php

/**
 * Handles plugin premium settings panels.
 *
 * @link       https://boomdevs.com/
 * @since      1.0.0
 *
 * @package    Wp_Bnav_Pro
 * @subpackage Wp_Bnav_Pro/includes
 */

/**
 * Register plugin premium settings panels.
 *
 * @since      1.0.0
 * @package    Wp_Bnav_Pro
 * @subpackage Wp_Bnav_Pro/includes
 * @author     BOOM DEVS <contact@boomdevs.com>
 */
class Wp_Bnav_Pro_Settings {

    /**
     * Settings ID;
     *
     * @var string
     */
    public static $option_key = 'wp-bnav';

    public static $default_settings = array(
        'show-global-search-box' => 1,
        'show-search-icon' => 1,
        'icon-search-mode' => 1,
        'search-icon' => 'fas fa-search',
        'icon-search-position' => 'left',
        'sub-nav-item-icon-visibility' => 'show',
        'sub-nav-item-icon-position' => 'top',
        'sub-nav-item-icon-offset' => array(
            'top'=> 0,
            'righ' => 0,
            'bottm' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'sub-nav-item-icon-typography' => array(
            'font-weight' => '',
            'font-style' => '',
            'subset' => '',
            'font-size' => 14,
            'color' => '#898989',
            'type' => '',
            'unit' => 'px',
        ),

        'sub-nav-active-item-icon-typography' => array(
            'font-weight' => '',
            'font-style' => '',
            'subset' => '',
            'font-size' => 20,
            'color' => '#7c7c7c',
            'type' => '',
            'unit' => 'px'
        ),

        'sub-nav-item-text-visibility' => 'show',
        'sub-nav-item-typography' => array(
            'font-family' => 'Arial Black',
            'font-weight' => '',
            'font-style' => 'italic',
            'subset' => '',
            'text-align' => 'center',
            'text-transform' => 'uppercase',
            'font-size' => 12,
            'line-height' => 15,
            'letter-spacing' => 2,
            'color' => '#7c7c7c',
            'type' => 'safe',
            'unit' => 'px',
        ),

        'sub-nav-active-item-typography' => array(
            'font-family' => 'Helvetica',
            'font-weight' => 700,
            'font-style' => 'italic',
            'subset' => '',
            'text-align' => 'left',
            'text-transform' => 'uppercase',
            'font-size' => 20,
            'line-height' => 25,
            'letter-spacing' => 2,
            'color' => '#ffffff',
            'type' => 'safe',
            'unit' => 'px',
        ),

        'child-nav-grid' => 5,
        'child-nav-active-item-icon-typography' => array(
            'font-weight' => '',
            'font-style' => '',
            'subset' => '',
            'font-size' => 25,
            'color' => '#eeee22',
            'type' => '',
            'unit' => 'px',
        ),
        'child-nav-item-typography' => array(
            'font-family' => 'Times New Roman',
            'font-weight' => 700,
            'font-style' => '',
            'subset' => '',
            'text-align' => 'center',
            'text-transform' => 'capitalize',
            'font-size' => 23,
            'line-height' => 30,
            'letter-spacing' => 2,
            'color' => '#cccccc',
            'type' => 'safe',
            'unit' => 'px',
        ),

        'child-nav-active-item-typography' => array(
            'font-family' => 'Times New Roman',
            'font-weight' => 700,
            'font-style' => '',
            'subset' => '',
            'text-align' => 'center',
            'text-transform' => 'uppercase',
            'font-size' => 12,
            'line-height' => 15,
            'letter-spacing' => 2,
            'color' => '#9b9b9b',
            'type' => 'safe',
            'unit' => 'px',
        ),

        'child-nav-item-icon-offset'=> array(
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'child-nav-item-icon-typography' => array(
            'font-weight' => '',
            'font-style' => '',
            'subset' => '',
            'font-size' => 20,
            'color' => '#dd9933',
            'type' => '',
            'unit' => 'px'
        ),

        'search-box-bg' => array(
            'background-color' => '#939393'
        ),

        'search-box-bg-blur' => 2,
        'search-box-focus-bg' => array(
            'background-color' => '#dd3333'
        ),

        'search-box-focus-bg-blur' => 2,
        'search-box-typography' => array(
            'font-family' => 'Arial Black',
            'font-weight' => '',
            'font-style' => 'italic',
            'subset' => '',
            'text-align' => 'left',
            'text-transform' => 'capitalize',
            'font-size' => 30,
            'line-height' => 20,
            'letter-spacing' => 2,
            'color' => '#afafaf',
            'type' => 'safe',
            'unit' => 'px',
        ),

        'search-box-focus-typography' => array(
            'font-family' => 'Arial Black',
            'font-weight' => '',
            'font-style' => 'italic',
            'subset' => '',
            'text-align' => 'left',
            'text-transform' => 'capitalize',
            'font-size' => 30,
            'line-height' => 20,
            'letter-spacing' => 2,
            'color' => '#afafaf',
            'type' => 'safe',
            'unit' => 'px',
        ),

        'search-box-border' => array(
            'top' => 2,
            'right' => 2,
            'bottom' => 2,
            'left' => 2,
            'style' => 'solid',
            'color' => '#999999',
        ),

        'search-box-focus-border' => array(
            'top' => 2,
            'right' => 2,
            'bottom' => 2,
            'left' => 2,
            'style' => 'solid',
            'color' => '#c4c4c4',
        ),

        'search-box-border-radius' => array(
            'top' => 5,
            'right' => 5,
            'bottom' => 5,
            'left' => 5,
            'unit' => 'px',
        ),

        'search-box-shadow' => array(
            'enable-search-box-shadow' => 0,
            'search-box-shadow-horizontal' => 0,
            'search-box-shadow-vertical' => 0,
            'search-box-shadow-blur' => 0,
            'search-box-shadow-spread' => 0,
            'search-box-shadow-color' => 'rgba(229,229,229,0.1)'
        ),

        'search-boxfocus--shadow' => array (
            'enable-search-box-shadow' => 0,
            'search-box-shadow-horizontal' => 0,
            'search-box-shadow-vertical' => 0,
            'search-box-shadow-blur' => 0,
            'search-box-shadow-spread' => 0,
            'search-box-shadow-color' => 'rgba(229,229,229,0.1)'
        ),

        'search-box-offset' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'search-box-padding' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'child-nav-item-icon-visibility' => 'show',
        'sub-nav-grid' => 3,
        'child-nav-item-text-visibility' => 'show',
        'child-nav-item-icon-position' => 'left',
        'sub-nav-alignment' => 'center',
        'sub-menu-nav-bg' => array(
            'background-color' => '#dd9933'
        ),

        'sub-nav-wrap-padding' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'sub-nav-wrap-margin' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'sub-menu-border' => array(
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'style' => 'solid',
            'color' => '#efefef'
        ),

        'sub-menu-border-radius' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'sub-nav-item-padding' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'sub-nav-item-margin' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'sub-nav-item-border' => array(
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'style' => 'solid',
            'color' => '#ffffff'
        ),

        'sub-nav-active-item-border' => array(
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'style' => 'solid',
            'color' => '#f7f7f7'
        ),

        'sub-nav-item-border-radius' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'sub-nav-item-bg' => array(
            'background-color' => '#ffffff'
        ),

        'sub-nav-active-item-bg' => array(
            'background-color' => '#f9f9f9'
        ),

        'child-menu-nav-bg' => array(
            'background-color' => '#fcfcfc'
        ),

        'main-nav-wrap-padding' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'main-nav-wrap-margin' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'child-menu-border' => array(
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'style' => 'solid',
            'color' => '#f9f9f9'
        ),

        'child-menu-border-radius' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'child-nav-item-padding' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'child-nav-item-margin' => array(
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'child-nav-item-border' => array(
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'left' => '-1',
            'style' => 'solid',
            'color' => '#f9f9f9'
        ),

        'child-nav-active-item-border' => array(
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'style' => 'solid',
            'color' => '#f9f9f9'
        ),

        'child-nav-item-border-radius' => array(
            'top' => 10,
            'right' => 0,
            'bottom' => 0,
            'left' => 0,
            'unit' => 'px',
        ),

        'child-nav-item-bg' => array(
            'background-color' => '#ffffff'
        ),

        'child-nav-active-item-bg' => array(
            'background-color' => '#ffffff'
        )
    );
    public static $default_menu_meta_settings = array(
        'custom-content' =>'',
        'woocommerce-cart' => false,
        'wishlist-cart' => false,
        'search-trigger' =>false,
        'display-mode' => 'all-users',
        'roles' => ''
    );

    public function __construct() {
        add_filter( 'wp_bnav_register_options_panel', array( $this, 'register_options_panel' ), 2, 2 );
        add_filter( 'wp_bnav_register_menu_hide_premium_settings', array( $this, 'register_menu_hide_premium_settings' ), 1, 1 );
        add_filter( 'wp_bnav_register_menu_premium_settings', array( $this, 'register_menu_premium_settings' ), 1, 1 );
        add_filter( 'wp_bnav_register_sub_menu_settings', array( $this, 'register_sub_menu_settings' ), 10, 1 );
        add_filter( 'wp_bnav_register_child_menu_settings', array( $this, 'register_child_menu_settings' ), 1, 1 );
        add_filter( 'wp_bnav_register_search_box_settings', array( $this, 'register_search_box_settings' ), 1, 1 );
        add_filter( 'wp_bnav_register_cart_menu_settings', array( $this, 'register_cart_menu_settings' ), 1, 1 );
        add_filter( 'wp_bnav_register_wishlist_menu_settings', array( $this, 'register_wishlist_menu_settings' ), 1, 1 );
        add_filter( 'wp_bnav_register_hide_bottom_menu_page_settings',array( $this, 'register_hide_bottom_menu_page_settings' ));
        add_filter( 'wp_bnav_get_skins', array( $this, 'add_skins' ), 1, 1 );
        add_filter( 'wp_bnav_get_skins_data', array( $this, 'add_skins_data' ), 1, 1 );
    }

    /**
     * Convert existing settings panel to customizer based panel.
     *
     * @param $options_panel_func string Settings panel function name.
     * @param $options_panel_config array Settings panel configurations.
     *
     * @return array
     */
    public function register_options_panel( $options_panel_func, $options_panel_config ) {
        $options_panel_func = 'createCustomizeOptions';
        return array(
            'func' => $options_panel_func,
            'config' => $options_panel_config
        );
        
    }

    /**
     * Register hide bottom menu page settings.
     * @return array[]
     */
    public function register_hide_bottom_menu_page_settings(){

        // Retrieve all pages
        $pages = get_pages();

        // Create an array to store page options
        $page_options = array();

        // Loop through pages and add them to the options array
        foreach ($pages as $page) {
            $page_options[$page->ID] = $page->post_title;
        }
        return array(
            array(
                'id'          => 'select_page',
                'type'        => 'select',
                'chosen'      => true,
                'title'       => __('Hide Bottom Menu on Page', 'wp-bnav'),
                'options'     => $page_options,
                'multiple'    => true,
            ),

	        array(
		        'id'          => 'show_selected_page',
		        'type'        => 'select',
		        'chosen'      => true,
		        'title'       => __( 'Show Bottom Menu on Page', 'wp-bnav'),
		        'options'     => $page_options,
		        'multiple'    => true,
		        'help'        => __( 'If you leave this option empty, the bottom menu shows all pages.', 'wp-bnav' ),
	        ),
        );
    }

    /**
     * Register Cart menu settings.
     * @return array[]
     */
    public function register_cart_menu_settings() {
        return array(
            array(
                'id' => 'cart-menu-counter-bg',
                'type' => 'background',
                'title' => __( 'Background', 'wp-bnav' ),
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .cart_total',
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'background_gradient' => false,
                'background_origin' => false,
                'background_clip' => false,
                'background_blend_mode' => false,
                'background_image_preview' => false
            ),
            array(
                'id'    => 'cart-menu-counter-icon-typography',
                'type'  => 'typography',
                'title' => __( 'Text Typography', 'wp-bnav' ),
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .cart_total',
                'font_family' => false,
                'font_style' => false,
                'line_height' => false,
                'letter_spacing' => false,
                'text_align' => false,
                'text_transform' => false,
            ),
            array(
                'id'    => 'cart-menu-wrap-margin',
                'type'  => 'spacing',
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .cart_total',
                'output_mode' => 'margin',
                'title' => __( 'Margin', 'wp-bnav' ),
            ),
            array(
                'id'    => 'cart-menu-counter-padding',
                'type'  => 'spacing',
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .cart_total',
                'output_mode' => 'padding',
                'title' => __( 'Padding', 'wp-bnav' ),
            ),
            array(
                'id'    => 'cart-menu-counter-border',
                'type'  => 'border',
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .cart_total',
                'title' => __( 'Border', 'wp-bnav' ),
            ),
            array(
                'id'    => 'cart-menu-counter-border-radius',
                'type'  => 'spacing',
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .cart_total',
                'output_mode' => 'border-radius',
                'title' => __( 'Border radius', 'wp-bnav' ),
            ),

        );
    }

    /**
     * Register Wishlist menu settings.
     * @return array[]
     */
    public function register_wishlist_menu_settings() {
        return array(
            array(
                'id' => 'wishlist-menu-counter-bg',
                'type' => 'background',
                'title' => __( 'Background', 'wp-bnav' ),
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .bnav_wishlist_counter',
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'background_gradient' => false,
                'background_origin' => false,
                'background_clip' => false,
                'background_blend_mode' => false,
                'background_image_preview' => false
            ),
            array(
                'id'    => 'wishlist-menu-counter-icon-typography',
                'type'  => 'typography',
                'title' => __( 'Text Typography', 'wp-bnav' ),
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .bnav_wishlist_counter',
                'font_family' => false,
                'font_style' => false,
                'line_height' => false,
                'letter_spacing' => false,
                'text_align' => false,
                'text_transform' => false,
            ),
            array(
                'id'    => 'wishlist-menu-wrap-margin',
                'type'  => 'spacing',
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .bnav_wishlist_counter',
                'output_mode' => 'margin',
                'title' => __( 'Margin', 'wp-bnav' ),
            ),
            array(
                'id'    => 'wishlist-menu-counter-padding',
                'type'  => 'spacing',
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .bnav_wishlist_counter',
                'output_mode' => 'padding',
                'title' => __( 'Padding', 'wp-bnav' ),
            ),
            array(
                'id'    => 'wishlist-menu-counter-border',
                'type'  => 'border',
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .bnav_wishlist_counter',
                'title' => __( 'Border', 'wp-bnav' ),
            ),
            array(
                'id'    => 'wishlist-menu-counter-border-radius',
                'type'  => 'spacing',
                'output'      => '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .bnav_wishlist_counter',
                'output_mode' => 'border-radius',
                'title' => __( 'Border radius', 'wp-bnav' ),
            ),

        );
    }

    /**
     * Register sub menu settings.
     * @return array[]
     */
    public function register_sub_menu_settings() {
        return array(
            array(
                'id'    => 'sub-nav-grid',
                'type'  => 'number',
                'title' => __('Number of grids', 'wp-bnav' ),
                'default' => 6
            ),
            array(
                'id'          => 'sub-nav-alignment',
                'type'        => 'select',
                'title'       => __( 'Alignment', 'wp-bnav' ),
                'options'     => array(
                    'center'  => 'Center',
                    'flex-start'  => 'Left',
                    'end'  => 'Right',
                ),
                'default'     => 'flex-start'
            ),
            array(
                'id'          => 'sub-menu-background-type',
                'type'        => 'select',
                'title'       => __('Background type', 'wp-bnav'),
                'options'     => array(
                    'background'  => __('Background color', 'wp-bnav'),
                    'gradiant'  => __('Gradiant', 'wp-bnav'),
                    'background-image'  => __('Background image', 'wp-bnav'),
                ),
                'default'     => 'background'
            ),
            array(
                'id' => 'sub-menu-nav-bg',
                'type' => 'background',
                'title' => __( 'Background color', 'wp-bnav' ),
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'output' =>  array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0'),
                'default'               => '#2d2d3b',
                'dependency' => ['sub-menu-background-type', '==', 'background'],
            ),
            array(
                'id' => 'sub-nav-gradiant-bg',
                'type' => 'background',
                'title' => __( 'Gradiant', 'wp-bnav' ),
                'background_gradient' => true,
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'output' =>  array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0'),
                'dependency' => ['sub-menu-background-type', '==', 'gradiant'],
            ),
            array(
                'id' => 'main-nav-bg-image',
                'type' => 'background',
                'title' => __( 'Background image', 'wp-bnav' ),
                'background_color' => false,
                'background_gradient' => false,
                'background_origin' => true,
                'background_clip' => true,
                'background_blend_mode' => true,
                'output' =>  array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0'),
                'dependency' => ['sub-menu-background-type', '==', 'background-image'],
            ),
            array(
                'id'    => 'sub-nav-blur',
                'type'    => 'number',
                'title' => __('Blur', 'wp-bnav'),
                'default' => 0,
                'unit'        => 'px',
            ),
            array(
                'id'    => 'sub-nav-wrap-padding',
                'type'  => 'spacing',
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0',
                'output_mode' => 'padding',
                'title' => __( 'Padding', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-nav-wrap-margin',
                'type'  => 'spacing',
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0',
                'output_mode' => 'margin',
                'title' => __( 'Margin', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-menu-border',
                'type'  => 'border',
                'output'      => array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0'),
                'title' => __( 'Border', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-menu-border-radius',
                'type'  => 'spacing',
                'output_mode' => 'border-radius',
                'output'      => array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0'),
                'title' => __( 'Border radius', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-nav-item-padding',
                'type'  => 'spacing',
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items',
                'output_mode' => 'padding',
                'title' => __( 'Item padding', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-nav-item-margin',
                'type'  => 'spacing',
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items',
                'output_mode' => 'margin',
                'title' => __( 'Item offset', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-nav-item-border',
                'type'  => 'border',
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items',
                'title' => __( 'Item border', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-nav-active-item-border',
                'type'  => 'border',
                'output'      => array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items:hover'),
                'title' => __( 'Item active border', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-nav-item-border-radius',
                'type'  => 'spacing',
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items',
                'output_mode' => 'border-radius',
                'title' => __( 'Item border radius', 'wp-bnav' ),
            ),
            array(
                'id' => 'sub-nav-item-bg',
                'type' => 'background',
                'title' => __( 'Item background', 'wp-bnav' ),
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items',
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'background_gradient' => false,
                'background_origin' => false,
                'background_clip' => false,
                'background_blend_mode' => false,
                'background_image_preview' => false
            ),
            array(
                'id' => 'sub-nav-active-item-bg',
                'type' => 'background',
                'title' => __( 'Item active background', 'wp-bnav' ),
                'output'      => array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items:hover', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li.current_page_item a .bnav_menu_items', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li.current_page_parent a .bnav_menu_items'),
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'background_gradient' => false,
                'background_origin' => false,
                'background_clip' => false,
                'background_blend_mode' => false,
                'background_image_preview' => false
            ),
            array(
                'id'          => 'sub-nav-item-icon-visibility',
                'type'        => 'select',
                'title'       => __( 'Icon visibility', 'wp-bnav' ),
                'options'     => array(
                    'show'  => __( 'Show', 'wp-bnav' ),
                    'hide'  => __( 'Hide', 'wp-bnav' ),
                    'active'  => __( 'Show when active', 'wp-bnav' ),
                    'hide-active'  => __( 'Hide when active', 'wp-bnav' ),
                ),
                'default'     => 'show',
            ),
            array(
                'id'          => 'sub-nav-item-icon-position',
                'type'        => 'select',
                'title'       => __( 'Icon position', 'wp-bnav' ),
                'options'     => array(
                    'top'  => __( 'Top', 'wp-bnav' ),
                    'right'  => __( 'Right', 'wp-bnav' ),
                    'bottom'  => __( 'Bottom', 'wp-bnav' ),
                    'left'  => __( 'Left', 'wp-bnav' ),
                ),
                'default'     => 'top',
            ),
            array(
                'id'    => 'sub-nav-item-icon-offset',
                'type'  => 'spacing',
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .icon_wrapper',
                'output_mode' => 'margin',
                'title' => __( 'Icon offset', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-nav-item-icon-typography',
                'type'  => 'typography',
                'title' => __( 'Icon typography', 'wp-bnav' ),
                'output'      => '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .icon_wrapper i',
                'font_family' => false,
                'font_style' => false,
                'line_height' => false,
                'letter_spacing' => false,
                'text_align' => false,
                'text_transform' => false,
            ),
            array(
                'id'    => 'sub-nav-active-item-icon-typography',
                'type'  => 'typography',
                'title' => __( 'Active icon typography', 'wp-bnav' ),
                'output'      => array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items:hover .icon_wrapper i', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li.current_page_item a .icon_wrapper i', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li.current_page_parent a .icon_wrapper i'),
                'font_family' => false,
                'font_style' => false,
                'line_height' => false,
                'letter_spacing' => false,
                'text_align' => false,
                'text_transform' => false,
            ),
            array(
                'id'          => 'sub-nav-item-text-visibility',
                'type'        => 'select',
                'title'       => __( 'Text visibility', 'wp-bnav' ),
                'options'     => array(
                    'show'  => __( 'Show', 'wp-bnav' ),
                    'hide'  => __( 'Hide', 'wp-bnav' ),
                    'active'  => __( 'Show when active', 'wp-bnav' ),
                    'hide-active'  => __( 'Hide when active', 'wp-bnav' ),
                ),
                'default'     => 'show',
            ),
            array(
                'id'    => 'sub-nav-item-typography',
                'type'  => 'typography',
                'output'      => array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .text_wrapper', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items .cart_total', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items .bnav_wishlist_counter'),
                'title' => __( 'Text typography', 'wp-bnav' ),
            ),
            array(
                'id'    => 'sub-nav-active-item-typography',
                'type'  => 'typography',
                'output'      => array('.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li a .bnav_menu_items:hover .text_wrapper', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li.current_page_item a .text_wrapper', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li.current_page_parent a .text_wrapper', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li.current_page_item a .bnav_menu_items .cart_total', '.bnav_sub_menu_wrapper ul.sub-menu.depth-0 li.current_page_item a .bnav_menu_items .bnav_wishlist_counter'),
                'title' => __( 'Active text typography', 'wp-bnav' ),
            ),
        );
    }

    /**
     * Register child menu settings.
     *
     * @return array[]
     */
    public function register_child_menu_settings() {
        return array(
            array(
                'id'    => 'child-nav-grid',
                'type'  => 'number',
                'title' => __('Number of grids', 'wp-bnav' ),
                'default' => 6
            ),
            array(
                'id'          => 'child-nav-alignment',
                'type'        => 'select',
                'title'       => __( 'Alignment', 'wp-bnav' ),
                'options'     => array(
                    'center'  => 'Center',
                    'flex-start'  => 'Left',
                    'end'  => 'Right',
                ),
                'default'     => 'flex-start'
            ),
            array(
                'id'          => 'child-menu-background-type',
                'type'        => 'select',
                'title'       => __('Background type', 'wp-bnav'),
                'options'     => array(
                    'background'  => __('Background color', 'wp-bnav'),
                    'gradiant'  => __('Gradiant', 'wp-bnav'),
                    'background-image'  => __('Background image', 'wp-bnav'),
                ),
                'default'     => 'background'
            ),
            array(
                'id' => 'child-menu-nav-bg',
                'type' => 'background',
                'title' => __( 'Background color', 'wp-bnav' ),
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'output' =>  array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu'),
                'default'               => '#2d2d3b',
                'dependency' => ['child-menu-background-type', '==', 'background'],
            ),
            array(
                'id' => 'child-nav-gradiant-bg',
                'type' => 'background',
                'title' => __( 'Gradiant', 'wp-bnav' ),
                'background_gradient' => true,
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'output' =>  array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu'),
                'default'               => array(
                    'background-color' => '#2d2d3b',
                ),
                'dependency' => ['child-menu-background-type', '==', 'gradiant'],
            ),
            array(
                'id' => 'child-nav-bg-image',
                'type' => 'background',
                'title' => __( 'Background image', 'wp-bnav' ),
                'background_color' => false,
                'background_gradient' => false,
                'background_origin' => true,
                'background_clip' => true,
                'background_blend_mode' => true,
                'output' =>  array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu'),
                'dependency' => ['child-menu-background-type', '==', 'background-image'],
            ),
            array(
                'id'    => 'child-nav-blur',
                'type'    => 'number',
                'title' => __('Blur', 'wp-bnav'),
                'default' => 0,
                'unit'        => 'px',
            ),
            array(
                'id'    => 'main-nav-wrap-padding',
                'type'  => 'spacing',
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu',
                'output_mode' => 'padding',
                'title' => __( 'Padding', 'wp-bnav' ),
            ),
            array(
                'id'    => 'main-nav-wrap-margin',
                'type'  => 'spacing',
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu',
                'output_mode' => 'margin',
                'title' => __( 'Margin', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-menu-border',
                'type'  => 'border',
                'output'      => array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu'),
                'title' => __( 'Border', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-menu-border-radius',
                'type'  => 'spacing',
                'output_mode' => 'border-radius',
                'output'      => array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu'),
                'title' => __( 'Border radius', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-nav-item-padding',
                'type'  => 'spacing',
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items',
                'output_mode' => 'padding',
                'title' => __( 'Item padding', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-nav-item-margin',
                'type'  => 'spacing',
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items',
                'output_mode' => 'margin',
                'title' => __( 'Item offset', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-nav-item-border',
                'type'  => 'border',
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items',
                'title' => __( 'Item border', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-nav-active-item-border',
                'type'  => 'border',
                'output'      => array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items:hover'),
                'title' => __( 'Item active border', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-nav-item-border-radius',
                'type'  => 'spacing',
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items',
                'output_mode' => 'border-radius',
                'title' => __( 'Item border radius', 'wp-bnav' ),
            ),
            array(
                'id' => 'child-nav-item-bg',
                'type' => 'background',
                'title' => __( 'Item background', 'wp-bnav' ),
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items',
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'background_origin' => false,
                'background_clip' => false,
                'background_blend_mode' => false,
                'background_image_preview' => false
            ),

            array(
                'id' => 'child-nav-active-item-bg',
                'type' => 'background',
                'title' => __( 'Item active background', 'wp-bnav' ),
                'output'      => array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items:hover', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li.current_page_item a .bnav_menu_items', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li.current_page_parent a .bnav_menu_items'),
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'background_origin' => false,
                'background_clip' => false,
                'background_blend_mode' => false,
                'background_image_preview' => false
            ),
            array(
                'id'          => 'child-nav-item-icon-visibility',
                'type'        => 'select',
                'title'       => __( 'Icon visibility', 'wp-bnav' ),
                'options'     => array(
                    'show'  => __( 'Show', 'wp-bnav' ),
                    'hide'  => __( 'Hide', 'wp-bnav' ),
                    'active'  => __( 'Show when active', 'wp-bnav' ),
                    'hide-active'  => __( 'Hide when active', 'wp-bnav' ),
                ),
                'default'     => 'show',
            ),
            array(
                'id'          => 'child-nav-item-icon-position',
                'type'        => 'select',
                'title'       => __( 'Icon position', 'wp-bnav' ),
                'options'     => array(
                    'top'  => __( 'Top', 'wp-bnav' ),
                    'right'  => __( 'Right', 'wp-bnav' ),
                    'bottom'  => __( 'Bottom', 'wp-bnav' ),
                    'left'  => __( 'Left', 'wp-bnav' ),
                ),
                'default'     => 'top',
            ),
            array(
                'id'    => 'child-nav-item-icon-offset',
                'type'  => 'spacing',
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .icon_wrapper',
                'output_mode' => 'margin',
                'title' => __( 'Icon offset', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-nav-item-icon-typography',
                'type'  => 'typography',
                'title' => __( 'Icon typography', 'wp-bnav' ),
                'output'      => '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .icon_wrapper i',
                'font_family' => false,
                'font_style' => false,
                'line_height' => false,
                'letter_spacing' => false,
                'text_align' => false,
                'text_transform' => false,
            ),
            array(
                'id'    => 'child-nav-active-item-icon-typography',
                'type'  => 'typography',
                'title' => __( 'Active icon typography', 'wp-bnav' ),
                'output'      => array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li > a .bnav_menu_items:hover .icon_wrapper i', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li.current_page_item a .icon_wrapper i', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li.current_page_parent a .icon_wrapper i'),
                'font_family' => false,
                'font_style' => false,
                'line_height' => false,
                'letter_spacing' => false,
                'text_align' => false,
                'text_transform' => false,
            ),
            array(
                'id'          => 'child-nav-item-text-visibility',
                'type'        => 'select',
                'title'       => __( 'Text visibility', 'wp-bnav' ),
                'options'     => array(
                    'show'  => __( 'Show', 'wp-bnav' ),
                    'hide'  => __( 'Hide', 'wp-bnav' ),
                    'active'  => __( 'Show when active', 'wp-bnav' ),
                    'hide-active'  => __( 'Hide when active', 'wp-bnav' ),
                ),
                'default'     => 'show',
            ),
            array(
                'id'    => 'child-nav-item-typography',
                'type'  => 'typography',
                'output'      => array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .text_wrapper', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items .cart_total', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items .bnav_wishlist_counter'),
                'title' => __( 'Text typography', 'wp-bnav' ),
            ),
            array(
                'id'    => 'child-nav-active-item-typography',
                'type'  => 'typography',
                'output'      => array('.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li a .bnav_menu_items:hover .text_wrapper', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li.current_page_item a .text_wrapper', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li.current_page_parent a .text_wrapper', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li.current_page_item a .bnav_menu_items .cart_total', '.bnav_bottom_nav_wrapper .bnav_sub_menu_wrapper ul.bnav_child_sub_menu li.current_page_item a .bnav_menu_items .bnav_wishlist_counter'),
                'title' => __( 'Active text typography', 'wp-bnav' ),
            ),
        );
    }

    /**
     * Register menu general premium settings.
     *
     * @return array[]
     */
    public function register_menu_hide_premium_settings() {
        return array(
            array(
                'id'    => 'scroll_hide_menu',
                'type'  => 'switcher',
                'title' => __( 'Hide Menu On Footer', 'wp-bnav' ),
                'default' => false,
                'class' => 'bnav_scroll_hide_menu'
            ),
        );
    }

    /**
     * Register menu premium settings.
     *
     * @return array[]
     */
    public function register_menu_premium_settings() {
        return array(
            array(
                'id'       => 'custom-content',
                'type'     => 'wp_editor',
                'title'    => __( 'Custom content', 'wp-bnav' ),
                'sanitize' => false,
                'default' => '',
            ),
            array(
                'id'    => 'woocommerce-cart',
                'type'  => 'switcher',
                'title' => __( 'Use as WooCommerce cart', 'wp-bnav' ),
                'default' => false
            ),
            array(
                'id'    => 'wishlist-cart',
                'type'  => 'switcher',
                'title' => __( 'Use as Wishlist cart', 'wp-bnav' ),
                'default' => false
            ),
            array(
                'id'    => 'search-trigger',
                'type'  => 'switcher',
                'title' => __( 'Use as search trigger', 'wp-bnav' ),
                'default' => false
            ),
            array(
                'id'          => 'display-mode',
                'type'        => 'select',
                'title'       => __( 'Display mode', 'wp-bnav' ),
                'options'     => array(
                    'all-users'  => __( 'All users', 'wp-bnav' ),
                    'logged-out-users'  => __( 'Logged out users', 'wp-bnav' ),
                    'logged-in-users'  => __( 'Logged in users', 'wp-bnav' ),
                    'by-role'  => __( 'By role', 'wp-bnav' ),
                ),
                'default'     => 'all-users'
            ),
            array(
                'id'          => 'roles',
                'type'        => 'checkbox',
                'title'       => __( 'Roles', 'wp-bnav' ),
                'options'     => 'roles',
                'dependency' => ['display-mode', '==', 'by-role'],
            ),
        );
    }

    /**
     * Register search box settings.
     *
     * @return array[]
     */
    public function register_search_box_settings() {
        return array(
            array(
                'id'    => 'show-global-search-box',
                'type'  => 'switcher',
                'title' => __( 'Append search box with sub menu', 'wp-bnav' ),
                'default' => true,
            ),
            array(
                'id'          => 'search-box-background-type',
                'type'        => 'select',
                'title'       => __('Background type', 'wp-bnav'),
                'options'     => array(
                    'background'  => __('Background color', 'wp-bnav'),
                    'gradiant'  => __('Gradiant', 'wp-bnav'),
                    'background-image'  => __('Background image', 'wp-bnav'),
                ),
                'default'     => 'background'
            ),
            array(
                'id' => 'search-box-bg',
                'type' => 'background',
                'title' => __( 'Background color', 'wp-bnav' ),
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'output' =>  array('.bnav_sub_menu_search .bnav_search_input'),
                'default'               => '#2d2d3b',
                'dependency' => ['search-box-background-type', '==', 'background'],
            ),
            array(
                'id' => 'search-box-gradiant-bg',
                'type' => 'background',
                'title' => __( 'Gradiant', 'wp-bnav' ),
                'background_gradient' => true,
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'output' =>  array('.bnav_sub_menu_search .bnav_search_input'),
                'default'               => array(
                    'background-color' => '#2d2d3b',
                ),
                'dependency' => ['search-box-background-type', '==', 'gradiant'],
            ),
            array(
                'id' => 'search-box-bg-image',
                'type' => 'background',
                'title' => __( 'Background image', 'wp-bnav' ),
                'background_color' => false,
                'background_gradient' => false,
                'background_origin' => true,
                'background_clip' => true,
                'background_blend_mode' => true,
                'output' =>  array('.bnav_sub_menu_search .bnav_search_input'),
                'dependency' => ['search-box-background-type', '==', 'background-image'],
            ),
            array(
                'id'    => 'search-box-bg-blur',
                'type'    => 'number',
                'title' => __('Blur', 'wp-bnav'),
                'default' => 0,
                'unit'        => 'px',
            ),

            array(
                'id'          => 'search-box-focus-background-type',
                'type'        => 'select',
                'title'       => __('Background type', 'wp-bnav'),
                'options'     => array(
                    'background'  => __('Background color', 'wp-bnav'),
                    'gradiant'  => __('Gradiant', 'wp-bnav'),
                    'background-image'  => __('Background image', 'wp-bnav'),
                ),
                'default'     => 'background'
            ),
            array(
                'id' => 'search-box-focus-bg',
                'type' => 'background',
                'title' => __( 'Focused background color', 'wp-bnav' ),
                'output_mode' => 'background-color',
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'output' =>  array('.bnav_sub_menu_search .bnav_search_input.input_focused'),
                'default'               => '#2d2d3b',
                'dependency' => ['search-box-focus-background-type', '==', 'background'],
            ),
            array(
                'id' => 'search-box-focus-gradiant-bg',
                'type' => 'background',
                'title' => __( 'Gradiant', 'wp-bnav' ),
                'background_gradient' => true,
                'background_image' => false,
                'background_position' => false,
                'background_attachment' => false,
                'background_repeat' => false,
                'background_size' => false,
                'output' =>  array('.bnav_sub_menu_search .bnav_search_input.input_focused'),
                'default'               => array(
                    'background-color' => '#2d2d3b',
                ),
                'dependency' => ['search-box-focus-background-type', '==', 'gradiant'],
            ),
            array(
                'id' => 'search-focus-box-bg-image',
                'type' => 'background',
                'title' => __( 'Background image', 'wp-bnav' ),
                'background_color' => false,
                'background_gradient' => false,
                'background_origin' => true,
                'background_clip' => true,
                'background_blend_mode' => true,
                'output' =>  array('.bnav_sub_menu_search .bnav_search_input.input_focused'),
                'dependency' => ['search-box-focus-background-type', '==', 'background-image'],
            ),
            array(
                'id'    => 'search-box-focus-bg-blur',
                'type'    => 'number',
                'title' => __('Blur', 'wp-bnav'),
                'default' => 0,
                'unit'        => 'px',
            ),
            array(
                'id'    => 'search-box-typography',
                'type'  => 'typography',
                'title' => __( 'Typography', 'wp-bnav' ),
                'output' => array('.bnav_sub_menu_search .bnav_search_input input'),
            ),
            array(
                'id'    => 'search-box-focus-typography',
                'type'  => 'typography',
                'title' => __( 'Focus typography', 'wp-bnav' ),
                'output' => '.bnav_sub_menu_search .bnav_search_input.input_focused input',
            ),
            array(
                'id'     => 'search-box-border',
                'type'   => 'border',
                'title'  => __( 'Border', 'wp-bnav' ),
                'output' => '.bnav_sub_menu_search .bnav_search_input',
            ),
            array(
                'id'     => 'search-box-focus-border',
                'type'   => 'border',
                'title'  => __( 'Focus border', 'wp-bnav' ),
                'output' => '.bnav_sub_menu_search .bnav_search_input.input_focused',
            ),
            array(
                'id'    => 'search-box-border-radius',
                'type'  => 'spacing',
                'output_mode' => 'border-radius',
                'title' => __( 'Border radius', 'wp-bnav' ),
                'output' => '.bnav_sub_menu_search .bnav_search_input',
            ),
            array(
                'id'    => 'show-search-icon',
                'type'  => 'switcher',
                'title' => __( 'Show icon', 'wp-bnav' ),
                'default' => true,
            ),
            array(
                'id'    => 'icon-search-mode',
                'type'  => 'switcher',
                'title' => __( 'Icon mode', 'wp-bnav' ),
                'text_on' => __( 'Icon', 'wp-bnav'),
                'text_off' => __( 'Image', 'wp-bnav'),
                'text_width' => 80,
                'default' => true,
                'dependency' => ['show-search-icon', '==', 'true'],
            ),
            array(
                'id'          => 'icon-search-position',
                'type'        => 'select',
                'title'       => __( 'Icon position', 'wp-bnav' ),
                'options'     => array(
                    'right'  => __( 'Right', 'wp-bnav' ),
                    'left'  => __( 'Left', 'wp-bnav' ),
                ),
                'default'     => 'left',
                'dependency' => ['show-search-icon', '==', 'true'],
            ),
            array(
                'id'    => 'search-icon',
                'type'  => 'icon',
                'title' => __( 'Icon', 'wp-bnav' ),
                'dependency' => [
                    ['show-search-icon', '==', 'true'],
                    ['icon-search-mode', '==', 'true'],
                ],
            ),
            array(
                'id'      => 'search-image',
                'type'    => 'media',
                'title'   => __( 'Image', 'wp-bnav' ),
                'library' => 'image',
                'dependency' => [
                    ['show-search-icon', '==', 'true'],
                    ['icon-search-mode', '==', 'false'],
                ],
            ),
            array(
                'id'     => 'search-box-shadow',
                'type'   => 'fieldset',
                'title'  => __( 'Shadow', 'wp-bnav'),
                'fields' => array(
                    array(
                        'id'    => 'enable-search-box-shadow',
                        'type'  => 'switcher',
                        'title' => __( 'Enabled', 'wp-bnav' ),
                        'default' => false,
                    ),
                    array(
                        'id'      => 'search-box-shadow-horizontal',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '0',
                        'title'   => __( 'Horizontal', 'wp-bnav' ),
                    ),
                    array(
                        'id'      => 'search-box-shadow-vertical',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '0',
                        'title'   => __( 'Vertical', 'wp-bnav' ),
                    ),
                    array(
                        'id'      => 'search-box-shadow-blur',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '5',
                        'title'   => __( 'Blur', 'wp-bnav' ),
                    ),
                    array(
                        'id'      => 'search-box-shadow-spread',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '0',
                        'title'   => __( 'Spread', 'wp-bnav' ),
                    ),
                    array(
                        'id'      => 'search-box-shadow-color',
                        'type'    => 'color',
                        'title'   => __( 'Color', 'wp-bnav' ),
                        'default' => 'rgba(0, 0, 0, 0.1)'
                    ),
                ),
            ),
            array(
                'id'     => 'search-boxfocus--shadow',
                'type'   => 'fieldset',
                'title'  => __( 'Focus shadow', 'wp-bnav'),
                'fields' => array(
                    array(
                        'id'    => 'enable-search-boxfocus--shadow',
                        'type'  => 'switcher',
                        'title' => __( 'Enabled', 'wp-bnav' ),
                        'default' => false,
                    ),
                    array(
                        'id'      => 'search-box-focus-shadow-horizontal',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '0',
                        'title'   => __( 'Horizontal', 'wp-bnav' ),
                    ),
                    array(
                        'id'      => 'search-box-focus-shadow-vertical',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '0',
                        'title'   => __( 'Vertical', 'wp-bnav' ),
                    ),
                    array(
                        'id'      => 'search-box-focus-shadow-blur',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '5',
                        'title'   => __( 'Blur', 'wp-bnav' ),
                    ),
                    array(
                        'id'      => 'search-box-focus-shadow-spread',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '0',
                        'title'   => __( 'Spread', 'wp-bnav' ),
                    ),
                    array(
                        'id'      => 'search-box-focus-shadow-color',
                        'type'    => 'color',
                        'title'   => __( 'Color', 'wp-bnav' ),
                        'default' => 'rgba(0, 0, 0, 0.1)'
                    ),
                ),
            ),
            array(
                'id'    => 'search-box-offset',
                'type'  => 'spacing',
                'output_mode' => 'margin',
                'title' => __( 'Offset', 'wp-bnav' ),
                'output' => '.bnav_sub_menu_search .bnav_search_input',
            ),
            array(
                'id'    => 'search-box-padding',
                'type'  => 'spacing',
                'output_mode' => 'padding',
                'title' => __( 'Padding', 'wp-bnav' ),
                'output' => '.bnav_sub_menu_search .bnav_search_input',
            ),
        );
    }

    /**
     * Add skins options.
     *
     * @param $skins array Premium skins.
     *
     * @return mixed
     */
    public function add_skins( $skins ) {
        $skins['skin_two'] = WP_BNAV_PRO_URL . 'admin/img/preview_layout_skin_two.png';
        $skins['skin_three'] = WP_BNAV_PRO_URL . 'admin/img/preview_layout_skin_three.png';
        $skins['skin_four'] = WP_BNAV_PRO_URL . 'admin/img/preview_layout_skin_four.png';
        $skins['skin_five'] = WP_BNAV_PRO_URL . 'admin/img/preview_layout_skin_five.png';
        $skins['skin_six'] = WP_BNAV_PRO_URL . 'admin/img/preview_layout_skin_six.png';
        $skins['skin_seven'] = WP_BNAV_PRO_URL . 'admin/img/preview_layout_skin_seven.png';
        $skins['skin_eight'] = WP_BNAV_PRO_URL . 'admin/img/preview_layout_skin_eight.png';
        $skins['skin_nine'] = WP_BNAV_PRO_URL . 'admin/img/preview_layout_skin_nine.png';

        return $skins;
    }

    /**
     * Add premium skins data.
     *
     * @param $skins_data array Skins data
     *
     * @return mixed
     */
    public function add_skins_data($skins_data ) {
        $skins_data['skin_two'] = unserialize('a:107:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.95)";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:3:"7.5";s:16:"main-wrap-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:2:"30";s:5:"right";s:2:"30";s:6:"bottom";s:2:"30";s:4:"left";s:2:"30";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:2:"10";s:21:"main-wrap-shadow-blur";s:2:"34";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:16:"rgba(0,0,0,0.12)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"15";s:6:"bottom";s:2:"30";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:6:"center";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:2:"18";s:5:"right";s:1:"0";s:6:"bottom";s:2:"18";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"30";s:6:"bottom";s:0:"";s:4:"left";s:2:"30";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:0:"";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:3:"top";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#99a7bb";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:4:"hide";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#0a1c36";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:8:"skin_two";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:4:"left";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#818797";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#818797";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591a1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591a1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:2:"30";s:5:"right";s:2:"30";s:6:"bottom";s:2:"30";s:4:"left";s:2:"30";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:30:"enable-search-boxfocus--shadow";s:0:"";s:34:"search-box-focus-shadow-horizontal";s:1:"0";s:32:"search-box-focus-shadow-vertical";s:1:"0";s:28:"search-box-focus-shadow-blur";s:1:"0";s:30:"search-box-focus-shadow-spread";s:1:"0";s:29:"search-box-focus-shadow-color";s:18:"rgba(0, 0, 0, 0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:1:"0";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:4:"left";s:17:"sub-nav-alignment";s:10:"flex-start";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:16:"rgba(40,40,49,0)";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"20";s:6:"bottom";s:2:"15";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"15";s:6:"bottom";s:2:"10";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"3";s:6:"bottom";s:1:"0";s:4:"left";s:1:"3";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"1";s:6:"bottom";s:1:"1";s:4:"left";s:1:"1";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(255,255,255,0)";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"1";s:6:"bottom";s:1:"1";s:4:"left";s:1:"1";s:5:"style";s:5:"solid";s:5:"color";s:7:"#d5ee9b";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:2:"30";s:5:"right";s:2:"30";s:6:"bottom";s:2:"30";s:4:"left";s:2:"30";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:22:"rgba(213,238,155,0.15)";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:2:"15";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#3a3b44";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"18";s:5:"right";s:2:"13";s:6:"bottom";s:2:"18";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";i:0;s:5:"right";i:0;s:6:"bottom";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:0:"";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:1:"0";s:26:"child-menu-background-type";s:10:"background";s:21:"child-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}}');
        $skins_data['skin_three'] = unserialize('a:107:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:22:"rgba(255,255,255,0.95)";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:3:"7.5";s:16:"main-wrap-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:2:"30";s:5:"right";s:2:"30";s:6:"bottom";s:2:"30";s:4:"left";s:2:"30";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:1:"4";s:21:"main-wrap-shadow-blur";s:2:"15";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:16:"rgba(0,0,0,0.03)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"15";s:6:"bottom";s:2:"30";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:6:"center";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:2:"18";s:5:"right";s:1:"0";s:6:"bottom";s:2:"18";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"30";s:6:"bottom";s:0:"";s:4:"left";s:2:"30";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:0:"";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:3:"top";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"28";s:5:"color";s:7:"#99A7BB";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"28";s:5:"color";s:7:"#608EE9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:4:"hide";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#99a7bb";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#608ee9";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:10:"skin_three";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:4:"left";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#99a7bb";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#608ee9";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#608ee9";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#939fb0";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591A1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591A1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:2:"30";s:5:"right";s:2:"30";s:6:"bottom";s:2:"30";s:4:"left";s:2:"30";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:30:"enable-search-boxfocus--shadow";s:0:"";s:34:"search-box-focus-shadow-horizontal";s:1:"0";s:32:"search-box-focus-shadow-vertical";s:1:"0";s:28:"search-box-focus-shadow-blur";s:1:"0";s:30:"search-box-focus-shadow-spread";s:1:"0";s:29:"search-box-focus-shadow-color";s:18:"rgba(0, 0, 0, 0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:1:"0";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:4:"left";s:17:"sub-nav-alignment";s:10:"flex-start";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:16:"rgba(40,40,49,0)";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"20";s:6:"bottom";s:2:"10";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"15";s:6:"bottom";s:2:"10";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"3";s:6:"bottom";s:1:"0";s:4:"left";s:1:"3";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"1";s:6:"bottom";s:1:"1";s:4:"left";s:1:"1";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(255,255,255,0)";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"1";s:6:"bottom";s:1:"1";s:4:"left";s:1:"1";s:5:"style";s:5:"solid";s:5:"color";s:7:"#608ee9";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:2:"30";s:5:"right";s:2:"30";s:6:"bottom";s:2:"30";s:4:"left";s:2:"30";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:20:"rgba(96,142,233,0.1)";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:2:"15";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"18";s:5:"right";s:2:"13";s:6:"bottom";s:2:"18";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";i:0;s:5:"right";i:0;s:6:"bottom";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:0:"";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:1:"0";s:26:"child-menu-background-type";s:10:"background";s:21:"child-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}}');
        $skins_data['skin_four'] = unserialize('a:107:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:19:"rgba(45,45,59,0.95)";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:3:"7.5";s:16:"main-wrap-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"12";s:6:"bottom";s:2:"12";s:4:"left";s:2:"12";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"0";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:1:"4";s:21:"main-wrap-shadow-blur";s:2:"15";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:16:"rgba(0,0,0,0.03)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"15";s:6:"bottom";s:2:"30";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:10:"flex-start";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:1:"8";s:5:"right";s:1:"0";s:6:"bottom";s:1:"8";s:4:"left";s:1:"8";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"16";s:6:"bottom";s:2:"12";s:4:"left";s:2:"16";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"30";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"12";s:6:"bottom";s:2:"12";s:4:"left";s:2:"12";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:13:"rgba(0,0,0,0)";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:7:"#d5ee9b";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:4:"left";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"8";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#818797";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#1a1a1a";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:6:"active";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#1a1a1a";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:9:"skin_four";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:4:"left";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#818799";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"5";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#818797";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591A1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591A1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#3a3b44";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:30:"enable-search-boxfocus--shadow";s:0:"";s:34:"search-box-focus-shadow-horizontal";s:1:"0";s:32:"search-box-focus-shadow-vertical";s:1:"0";s:28:"search-box-focus-shadow-blur";s:1:"0";s:30:"search-box-focus-shadow-spread";s:1:"0";s:29:"search-box-focus-shadow-color";s:18:"rgba(0, 0, 0, 0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:2:"10";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:3:"top";s:17:"sub-nav-alignment";s:10:"flex-start";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"20";s:6:"bottom";s:2:"10";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"15";s:6:"bottom";s:2:"10";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:1:"6";s:5:"right";s:1:"6";s:6:"bottom";s:1:"6";s:4:"left";s:1:"6";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:2:"10";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"1";s:6:"bottom";s:1:"0";s:4:"left";s:1:"1";s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"6";s:5:"right";s:1:"6";s:6:"bottom";s:1:"6";s:4:"left";s:1:"6";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:1:"0";s:26:"child-menu-background-type";s:10:"background";s:21:"child-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}}');
        $skins_data['skin_five'] = unserialize('a:107:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:22:"rgba(255,255,255,0.95)";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:3:"7.5";s:16:"main-wrap-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"12";s:6:"bottom";s:2:"12";s:4:"left";s:2:"12";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:1:"4";s:21:"main-wrap-shadow-blur";s:2:"15";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:19:"rgba(0, 0, 0, 0.03)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"15";s:6:"bottom";s:2:"30";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:10:"flex-start";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:1:"8";s:5:"right";s:1:"0";s:6:"bottom";s:1:"8";s:4:"left";s:1:"8";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"16";s:6:"bottom";s:2:"12";s:4:"left";s:2:"16";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"30";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"12";s:6:"bottom";s:2:"12";s:4:"left";s:2:"12";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:13:"rgba(0,0,0,0)";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:7:"#608ee9";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:4:"left";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"8";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"28";s:5:"color";s:7:"#99a7bb";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"28";s:5:"color";s:7:"#FFFFFF";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:6:"active";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#99a7bb";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#ffffff";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:9:"skin_five";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:4:"left";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#939fb0";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#608ee9";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#608ee9";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"5";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#939fb0";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591A1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591A1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"1";s:5:"right";s:1:"1";s:6:"bottom";s:1:"1";s:4:"left";s:1:"1";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:30:"enable-search-boxfocus--shadow";s:0:"";s:34:"search-box-focus-shadow-horizontal";s:1:"0";s:32:"search-box-focus-shadow-vertical";s:1:"0";s:28:"search-box-focus-shadow-blur";s:1:"0";s:30:"search-box-focus-shadow-spread";s:1:"0";s:29:"search-box-focus-shadow-color";s:18:"rgba(0, 0, 0, 0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:2:"10";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:3:"top";s:17:"sub-nav-alignment";s:10:"flex-start";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"20";s:6:"bottom";s:2:"10";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"15";s:6:"bottom";s:2:"10";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:1:"6";s:5:"right";s:1:"6";s:6:"bottom";s:1:"6";s:4:"left";s:1:"6";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:20:"rgba(96,142,233,0.1)";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:2:"10";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"1";s:6:"bottom";s:1:"0";s:4:"left";s:1:"1";s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"6";s:5:"right";s:1:"6";s:6:"bottom";s:1:"6";s:4:"left";s:1:"6";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:20:"rgba(96,142,233,0.1)";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:1:"0";s:26:"child-menu-background-type";s:10:"background";s:21:"child-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}}');
        $skins_data['skin_six'] = unserialize('a:107:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.95)";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:3:"7.4";s:16:"main-wrap-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:1:"0";s:21:"main-wrap-shadow-blur";s:1:"5";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:18:"rgba(0, 0, 0, 0.1)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"15";s:6:"bottom";s:2:"30";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:10:"flex-start";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.95)";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.4";s:17:"main-menu-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:1:"5";s:6:"bottom";s:2:"15";s:4:"left";s:1:"5";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"10";s:6:"bottom";s:2:"10";s:4:"left";s:2:"10";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"20";s:6:"bottom";s:0:"";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:13:"rgba(0,0,0,0)";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:7:"#d5ee9b";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:3:"top";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#818799";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#1a1a1a";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:4:"hide";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#FFFFFF";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:8:"skin_six";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:4:"left";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#818797";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#1a1a1a";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#1a1a1a";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#1a1a1a";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#ffffff";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#818797";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.95)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.95)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818799";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818799";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:4:"left";s:17:"sub-nav-alignment";s:10:"flex-start";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:2:"15";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"20";s:6:"bottom";s:2:"15";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"15";s:6:"bottom";s:2:"10";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"3";s:6:"bottom";s:1:"0";s:4:"left";s:1:"3";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:7:"#d5ee9b";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:2:"10";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:1:"0";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"12";s:6:"bottom";s:2:"10";s:4:"left";s:2:"12";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";i:0;s:5:"right";i:0;s:6:"bottom";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:3:"7.4";s:26:"child-menu-background-type";s:10:"background";s:21:"child-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}}');
        $skins_data['skin_seven'] = unserialize('a:107:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:22:"rgba(255,255,255,0.95)";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:3:"7.4";s:16:"main-wrap-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:1:"0";s:21:"main-wrap-shadow-blur";s:1:"5";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:18:"rgba(0, 0, 0, 0.1)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"15";s:6:"bottom";s:2:"30";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:10:"flex-start";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:13:"rgba(0,0,0,0)";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:1:"5";s:6:"bottom";s:2:"15";s:4:"left";s:1:"5";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"10";s:6:"bottom";s:2:"10";s:4:"left";s:2:"10";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"20";s:6:"bottom";s:0:"";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:13:"rgba(0,0,0,0)";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:7:"#608ee9";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:3:"top";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#99a7bb";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#ffffff";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:4:"hide";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#FFFFFF";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:10:"skin_seven";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:4:"left";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#939fb0";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#ffffff";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#ffffff";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#0a1c36";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#0a1c36";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#939fb0";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818799";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818799";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:4:"left";s:17:"sub-nav-alignment";s:10:"flex-start";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:2:"15";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"20";s:6:"bottom";s:2:"15";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"15";s:6:"bottom";s:2:"10";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"3";s:6:"bottom";s:1:"0";s:4:"left";s:1:"3";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:2:"15";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:7:"#608ee9";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:0:"";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:2:"15";s:5:"right";s:2:"15";s:6:"bottom";s:1:"0";s:4:"left";s:2:"15";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"10";s:5:"right";s:2:"12";s:6:"bottom";s:2:"10";s:4:"left";s:2:"12";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";i:0;s:5:"right";i:0;s:6:"bottom";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:3:"7.4";s:26:"child-menu-background-type";s:10:"background";s:21:"child-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}}');
        $skins_data['skin_eight'] = unserialize('a:105:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:7:"#1e1e1e";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:1:"0";s:16:"main-wrap-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:1:"0";s:21:"main-wrap-shadow-blur";s:1:"5";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:18:"rgba(0, 0, 0, 0.1)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:10:"flex-start";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:19:"rgba(45,45,59,0.95)";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:1:"5";s:6:"bottom";s:2:"35";s:4:"left";s:1:"5";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"18";s:6:"bottom";s:0:"";s:4:"left";s:2:"18";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:0:"";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:3:"top";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:2:"10";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#818799";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:4:"show";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#FFFFFF";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:10:"skin_eight";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:3:"top";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";i:0;s:4:"righ";i:0;s:5:"bottm";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#818797";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#ffffff";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#d5ee9b";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818797";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#ffffff";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#818799";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:22:"rgba(40, 40, 49, 0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818799";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#818799";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:4:"left";s:17:"sub-nav-alignment";s:6:"center";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:22:"rgba(40, 40, 49, 0.95)";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#3a3b44";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"13";s:6:"bottom";s:2:"12";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"1";s:6:"bottom";s:1:"0";s:4:"left";s:1:"1";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"3";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(255,255,255,0)";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"3";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#d5ee9b";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(40,40,49,0.85)";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:7:"#fcfcfc";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#3a3b44";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"18";s:5:"right";s:2:"13";s:6:"bottom";s:2:"18";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";i:0;s:5:"right";i:0;s:6:"bottom";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"2";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"2";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#d5ee9b";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:3:"7.5";}');
        $skins_data['skin_nine'] = unserialize('a:107:{s:7:"enabled";s:1:"1";s:10:"breakpoint";s:3:"768";s:20:"wrap-background-type";s:10:"background";s:12:"main-wrap-bg";a:1:{s:16:"background-color";s:22:"rgba(255,255,255,0.95)";}s:21:"main-wrap-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:18:"main-wrap-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:9:"wrap-blur";s:3:"7.5";s:16:"main-wrap-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-wrap-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-wrap-shadow";a:6:{s:23:"enable-main-wrap-shadow";s:1:"1";s:27:"main-wrap-shadow-horizontal";s:1:"0";s:25:"main-wrap-shadow-vertical";s:2:"10";s:21:"main-wrap-shadow-blur";s:2:"34";s:23:"main-wrap-shadow-spread";s:1:"0";s:22:"main-wrap-shadow-color";s:16:"rgba(0,0,0,0.12)";}s:16:"main-wrap-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:17:"main-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:13:"main-nav-grid";s:1:"6";s:18:"main-nav-alignment";s:10:"flex-start";s:25:"main-menu-background-type";s:10:"background";s:16:"main-menu-nav-bg";a:1:{s:16:"background-color";s:22:"rgba(255,255,255,0.95)";}s:20:"main-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:17:"main-nav-bg-image";a:8:{s:16:"background-image";a:8:{s:3:"url";s:0:"";s:2:"id";s:0:"";s:5:"width";s:0:"";s:6:"height";s:0:"";s:9:"thumbnail";s:0:"";s:3:"alt";s:0:"";s:5:"title";s:0:"";s:11:"description";s:0:"";}s:19:"background-position";s:0:"";s:17:"background-repeat";s:0:"";s:21:"background-attachment";s:0:"";s:15:"background-size";s:0:"";s:17:"background-origin";s:0:"";s:15:"background-clip";s:0:"";s:21:"background-blend-mode";s:0:"";}s:13:"main-nav-blur";s:3:"7.5";s:17:"main-menu-padding";a:5:{s:3:"top";s:2:"15";s:5:"right";s:1:"5";s:6:"bottom";s:2:"35";s:4:"left";s:1:"5";s:4:"unit";s:2:"px";}s:16:"main-menu-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-menu-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"main-menu-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:21:"main-nav-item-padding";a:5:{s:3:"top";s:0:"";s:5:"right";s:2:"18";s:6:"bottom";s:0:"";s:4:"left";s:2:"18";s:4:"unit";s:2:"px";}s:20:"main-nav-item-margin";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:20:"main-nav-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-active-item-border";a:6:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:27:"main-nav-item-border-radius";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:16:"main-nav-item-bg";a:1:{s:16:"background-color";s:0:"";}s:23:"main-nav-active-item-bg";a:1:{s:16:"background-color";s:0:"";}s:29:"main-nav-item-icon-visibility";s:4:"show";s:27:"main-nav-item-icon-position";s:3:"top";s:25:"main-nav-item-icon-offset";a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:2:"10";s:4:"left";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#99a7bb";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:36:"main-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"24";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:29:"main-nav-item-text-visibility";s:4:"show";s:24:"main-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:31:"main-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:3:"500";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:0:"";s:14:"text-transform";s:0:"";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:3:".48";s:5:"color";s:7:"#0a1c36";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:13:"premade_skins";a:1:{s:12:"premade_skin";s:9:"skin_nine";}s:22:"show-global-search-box";i:1;s:16:"show-search-icon";i:1;s:16:"icon-search-mode";i:1;s:11:"search-icon";s:13:"fas fa-search";s:20:"icon-search-position";s:4:"left";s:28:"sub-nav-item-icon-visibility";s:4:"show";s:26:"sub-nav-item-icon-position";s:3:"top";s:24:"sub-nav-item-icon-offset";a:5:{s:3:"top";i:0;s:4:"righ";i:0;s:5:"bottm";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:28:"sub-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#939fb0";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:35:"sub-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"15";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:28:"sub-nav-item-text-visibility";s:4:"show";s:23:"sub-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:30:"sub-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:6:"center";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#0a1c36";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:14:"child-nav-grid";s:1:"6";s:37:"child-nav-active-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#608ee9";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:25:"child-nav-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#939fb0";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:32:"child-nav-active-item-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"12";s:11:"line-height";s:2:"15";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#0a1c36";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:26:"child-nav-item-icon-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"5";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-typography";a:7:{s:11:"font-weight";s:0:"";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:9:"font-size";s:2:"16";s:5:"color";s:7:"#99a7bb";s:4:"type";s:0:"";s:4:"unit";s:2:"px";}s:13:"search-box-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:18:"search-box-bg-blur";s:1:"0";s:19:"search-box-focus-bg";a:1:{s:16:"background-color";s:22:"rgba(245,245,245,0.85)";}s:24:"search-box-focus-bg-blur";s:1:"0";s:21:"search-box-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591a1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:27:"search-box-focus-typography";a:12:{s:11:"font-family";s:5:"Inter";s:11:"font-weight";s:6:"normal";s:10:"font-style";s:0:"";s:6:"subset";s:0:"";s:10:"text-align";s:4:"left";s:14:"text-transform";s:10:"capitalize";s:9:"font-size";s:2:"14";s:11:"line-height";s:2:"17";s:14:"letter-spacing";s:4:"-0.5";s:5:"color";s:7:"#8591a1";s:4:"type";s:6:"google";s:4:"unit";s:2:"px";}s:17:"search-box-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:23:"search-box-focus-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:0:"";}s:24:"search-box-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"search-box-shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:23:"search-boxfocus--shadow";a:6:{s:24:"enable-search-box-shadow";i:0;s:28:"search-box-shadow-horizontal";i:0;s:26:"search-box-shadow-vertical";i:0;s:22:"search-box-shadow-blur";i:0;s:24:"search-box-shadow-spread";i:0;s:23:"search-box-shadow-color";s:21:"rgba(229,229,229,0.1)";}s:17:"search-box-offset";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:18:"search-box-padding";a:5:{s:3:"top";s:2:"20";s:5:"right";s:2:"25";s:6:"bottom";s:2:"20";s:4:"left";s:2:"25";s:4:"unit";s:2:"px";}s:30:"child-nav-item-icon-visibility";s:4:"show";s:12:"sub-nav-grid";s:1:"6";s:30:"child-nav-item-text-visibility";s:4:"show";s:28:"child-nav-item-icon-position";s:4:"left";s:17:"sub-nav-alignment";s:6:"center";s:15:"sub-menu-nav-bg";a:1:{s:16:"background-color";s:16:"rgba(40,40,49,0)";}s:20:"sub-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:19:"sub-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:22:"sub-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:20:"sub-nav-item-padding";a:5:{s:3:"top";s:2:"12";s:5:"right";s:2:"13";s:6:"bottom";s:2:"12";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"1";s:6:"bottom";s:1:"0";s:4:"left";s:1:"1";s:4:"unit";s:2:"px";}s:19:"sub-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"3";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(255,255,255,0)";}s:26:"sub-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"3";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#608ee9";}s:26:"sub-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:15:"sub-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:22:"sub-nav-active-item-bg";a:1:{s:16:"background-color";s:22:"rgba(240,245,255,0.85)";}s:17:"child-menu-nav-bg";a:1:{s:16:"background-color";s:19:"rgba(252,252,252,0)";}s:21:"main-nav-wrap-padding";a:5:{s:3:"top";s:1:"0";s:5:"right";s:2:"20";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:4:"unit";s:2:"px";}s:20:"main-nav-wrap-margin";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-menu-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"1";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#f1f1f1";}s:24:"child-menu-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:22:"child-nav-item-padding";a:5:{s:3:"top";s:2:"18";s:5:"right";s:2:"13";s:6:"bottom";s:2:"18";s:4:"left";s:2:"13";s:4:"unit";s:2:"px";}s:21:"child-nav-item-margin";a:5:{s:3:"top";i:0;s:5:"right";i:0;s:6:"bottom";i:0;s:4:"left";i:0;s:4:"unit";s:2:"px";}s:21:"child-nav-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"2";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:19:"rgba(249,249,249,0)";}s:28:"child-nav-active-item-border";a:6:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"2";s:4:"left";s:1:"0";s:5:"style";s:5:"solid";s:5:"color";s:7:"#608ee9";}s:28:"child-nav-item-border-radius";a:5:{s:3:"top";s:1:"0";s:5:"right";s:1:"0";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:4:"unit";s:2:"px";}s:17:"child-nav-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:24:"child-nav-active-item-bg";a:1:{s:16:"background-color";s:19:"rgba(255,255,255,0)";}s:26:"search-box-background-type";s:10:"background";s:22:"search-box-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:32:"search-box-focus-background-type";s:10:"background";s:28:"search-box-focus-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}s:12:"sub-nav-blur";s:3:"7.5";s:26:"child-menu-background-type";s:10:"background";s:21:"child-nav-gradiant-bg";a:3:{s:16:"background-color";s:0:"";s:25:"background-gradient-color";s:0:"";s:29:"background-gradient-direction";s:0:"";}}');
        return $skins_data;
    }

    public static function get_settings() {
        return get_option( Wp_Bnav_Pro_Settings::$option_key );
    }
}