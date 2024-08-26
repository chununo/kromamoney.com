<?php if( get_theme_mod('bonfire_touchy_show_woo_button', '') !== '') { ?>
    <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>
        <div class="touchy-woo-button">
            <span class="touchy-woo-text-label-offset">
                
                <a class="touchy-cart-count" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart','bonfire'); ?>">
                    <div class="touchy-shopping-icon"></div>
                    <span><span><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></span>
                </a>
                
            </span>
        </div>
    <?php } ?>
<?php } ?>