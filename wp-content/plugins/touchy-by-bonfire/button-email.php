<?php if( get_theme_mod('bonfire_touchy_hide_email_button', '') === '') { ?>
    <a <?php if( get_theme_mod('bonfire_touchy_email_new_tab', '') !== '') { ?>target="_blank" <?php } ?>href="<?php if( get_theme_mod('bonfire_touchy_email_link', '') !== '') { ?><?php echo get_theme_mod('bonfire_touchy_email_link'); ?><?php } else { ?>mailto:<?php echo get_theme_mod('bonfire_touchy_email_address'); ?><?php if( get_theme_mod('bonfire_touchy_email_subject', '') !== '') { ?>?subject=<?php echo get_theme_mod('bonfire_touchy_email_subject'); ?><?php } ?><?php } ?>" class="touchy-email-button">
        <span class="touchy-email-text-label-offset">
            <?php if( get_theme_mod('bonfire_touchy_email_icon', '') === '') { ?>
                
                <?php if( get_theme_mod('bonfire_touchy_alt_email_button', '') === '') { ?>
                    <div class="touchy-default-email-outer">
                        <div class="touchy-default-email-inner"></div>
                    </div>
                <?php } else { ?>
                    <span class="touchy-icon-email"></span>
                <?php } ?>

            <?php } else { ?>

                <i class="<?php echo get_theme_mod('bonfire_touchy_email_icon'); ?>"></i>

            <?php } ?>

        </span>
    </a>
<?php } ?>