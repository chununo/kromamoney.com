<?php if( get_theme_mod('bonfire_touchy_hide_menu_button', '') === '') { ?>
<<?php if( get_theme_mod('bonfire_touchy_menu_button_link', '') !== '') { ?>a<?php } else { ?>div<?php } ?> <?php if( get_theme_mod('bonfire_touchy_menu_button_new_tab', '') !== '') { ?>target="_blank" <?php } ?>href="<?php if( get_theme_mod('bonfire_touchy_menu_button_link', '') !== '') { ?><?php echo get_theme_mod('bonfire_touchy_menu_button_link'); ?><?php } ?>" class="touchy-menu-button<?php if( get_theme_mod('bonfire_touchy_menu_button_link', '') === '') { ?> touchy-toggle-menu<?php } ?>">
    <?php if( get_theme_mod('touchy_hide_tooltip', '') === '') { ?>
    <div class="touchy-menu-tooltip"></div>
    <?php } ?>
    <span class="touchy-menu-text-label-offset">
        <?php if( get_theme_mod('bonfire_touchy_menu_icon', '') === '') { ?>
            <div class="touchy-default-menu">
                <?php if( get_theme_mod('bonfire_touchy_menu_button_animation_altx', '') !== '') { ?>
                    <div class="touchy-menu-button-middle"></div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <i class="<?php echo get_theme_mod('bonfire_touchy_menu_icon'); ?>"></i>
        <?php } ?>
    </span>
</<?php if( get_theme_mod('bonfire_touchy_menu_button_link', '') !== '') { ?>a<?php } else { ?>div<?php } ?>>
<?php } ?>