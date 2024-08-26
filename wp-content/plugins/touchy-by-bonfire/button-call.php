<?php if( get_theme_mod('bonfire_touchy_hide_call_button', '') === '') { ?>
    <a <?php if( get_theme_mod('bonfire_touchy_call_new_tab', '') !== '') { ?>target="_blank" <?php } ?>href="<?php if( get_theme_mod('bonfire_touchy_call_link', '') !== '') { ?><?php echo get_theme_mod('bonfire_touchy_call_link'); ?><?php } else { ?>tel:<?php echo get_theme_mod('bonfire_touchy_phone_number'); ?><?php } ?>" class="touchy-call-button">
        <span class="touchy-call-text-label-offset">
            <?php if( get_theme_mod('bonfire_touchy_call_icon', '') === '') { ?>

                <?php if( get_theme_mod('bonfire_touchy_alt_call_button', '') === '') { ?>
                    <div class="touchy-default-call-one"></div><div class="touchy-default-call-two"></div><div class="touchy-default-call-three"></div>
                <?php } else { ?>
                    <span class="touchy-icon-call"></span>
                <?php } ?>
            
            <?php } else { ?>

                <i class="<?php echo get_theme_mod('bonfire_touchy_call_icon'); ?>"></i>
                
            <?php } ?>
            
        </span>
    </a>
<?php } ?>