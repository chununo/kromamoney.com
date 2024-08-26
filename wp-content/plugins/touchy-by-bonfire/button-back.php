<?php if( get_theme_mod('bonfire_touchy_hide_back_button', '') === '') { ?>
    <?php if( get_theme_mod('bonfire_touchy_back_link', '') !== '') { ?>
    
            <a <?php if( get_theme_mod('bonfire_touchy_back_new_tab', '') !== '') { ?>target="_blank" <?php } ?>href="<?php echo get_theme_mod('bonfire_touchy_back_link'); ?>" class="touchy-back-button">
                <span class="touchy-back-text-label-offset">
                    <?php if( get_theme_mod('bonfire_touchy_back_icon', '') === '') { ?>
                        
                        <?php if( get_theme_mod('bonfire_touchy_alt_back_button', '') === '') { ?>
                            <div class="touchy-default-back"></div>
                        <?php } else { ?>
                            <span class="touchy-icon-back"></span>
                        <?php } ?>

                    <?php } else { ?>

                        <i class="<?php echo get_theme_mod('bonfire_touchy_back_icon'); ?>"></i>

                    <?php } ?>

                </span>
            </a>
    
    <?php } else { ?>

        <?php if(is_front_page() ) { ?><?php } else { ?>
            <div class="touchy-back-button" onClick="history.back()">
                <span class="touchy-back-text-label-offset">
                    <?php if( get_theme_mod('bonfire_touchy_back_icon', '') === '') { ?>
                        
                        <?php if( get_theme_mod('bonfire_touchy_alt_back_button', '') === '') { ?>
                            <div class="touchy-default-back"></div>
                        <?php } else { ?>
                            <span class="touchy-icon-back"></span>
                        <?php } ?>

                    <?php } else { ?>

                        <i class="<?php echo get_theme_mod('bonfire_touchy_back_icon'); ?>"></i>

                    <?php } ?>

                </span>
            </div>
        <?php } ?>
    <?php } ?>
<?php } ?>
