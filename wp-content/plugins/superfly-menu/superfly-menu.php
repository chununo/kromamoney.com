<?php
    global $current_page_sf_menu;
    global $sf_menu_data;
    $label_text = $options['sf_label_text'] == 'yes' ? ' sfm-label-text' : '';
    $fixed =  $options['sf_fixed'] === 'yes' ? 'sfm-fixed' : '';
    $theme = $options['sf_sidebar_style'] == 'skew' ? $options['sf_skew_type'] : 'none';

    if ( !class_exists( 'LA_IconManager' ) ) {
        // for all kinds of previews
        return;
    }
?>
<div class="sfm-rollback sfm-color1 sfm-theme-<?php echo $theme; ?> sfm-label-<?php echo $options['sf_label_vis'] == 'yes' ? 'visible' : 'hidden'; ?> sfm-label-<?php echo $options['sf_label_style']; ?> <?php echo $label_text; ?> <?php echo $fixed; ?>" style="">
    <?php


        $type = $options['sf_label_type'];
        $icon = $options['sf_label_icon'];
        $set = LA_IconManager::getSet($icon);
        $class1 = $type == 'default' ? 'sf_label_default' : 'sf_label_custom';
        $class2 = $set == '####' ? 'la_icon_manager_custom_wrapper' : '';
        echo "<div role='button' tabindex='0' aria-haspopup=\"true\" class='sfm-navicon-button x {$class1} {$class2}'>";
        if($type == 'default'){
            echo '<div class="sfm-navicon"></div>';
        }else if($type == 'custom'){
            if ($set === '####') {
                $icon = LA_IconManager::getIcon($icon);
                echo '<div style="background: url('.$icon.')" class="la_icon_manager_custom sf_label_icon"></div>';
            }else{
                $icon = LA_IconManager::getIconClass($icon);
                echo '<div class="'.$icon.' sf_label_icon"></div>';
            }
        }
    ?>
    </div>
</div>
<div id="sfm-sidebar" style="opacity:0" data-wp-menu-id="<?php echo $current_page_sf_menu;?>" class="sfm-theme-<?php echo $theme;?><?php if (!empty($options['sf_copy'])) echo ' sfm-widget-bottom' ?> sfm-hl-<?php echo $options['sf_highlight']; if($options['sf_sidebar_style'] == 'full') echo ' sfm-full-' . $options['sf_fs_layout']; if ($options['sf_ind'] == 'yes') echo ' sfm-indicators'; if ($options['sf_sidebar_style'] == 'toolbar' && !wp_is_mobile()) echo ' sfm-iconbar'; if ( !empty( $options['sf_video_bg'] ) ) echo ' sfm-video-bg'?>">
    <div class="sfm-scroll-wrapper sfm-scroll-main">
        <div class="sfm-scroll">
            <div class="sfm-sidebar-close"></div>
            <div class="sfm-logo<?php if(empty($options['sf_tab_logo'])) echo ' sfm-no-image';?>">
                <?php if(!empty($options['sf_above_logo'])): ?>
                    <div class="sfm-widget sfm-widget-top">
                        <?php echo do_shortcode($options['sf_above_logo']); ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($options['sf_tab_logo'])): ?>
                    <?php $logo = is_ssl() ? str_replace('http:', 'https:', $options['sf_tab_logo']) : str_replace('https:', 'http:', $options['sf_tab_logo']); ?>
                    <a href="<?php echo home_url() ?>">
                        <img src="<?php echo  $logo; ?>" alt="">
                    </a>
                <?php endif; ?>
                <?php if(!empty($options['sf_under_logo'])): ?>
                    <div class="sfm-widget sfm-widget-bottom">
                        <?php echo do_shortcode($options['sf_under_logo']); ?>
                    </div>
                <?php endif; ?>
                <div class="sfm-title"><?php if(!empty($options['sf_first_line'])) echo '<h3>'. apply_filters('sf_convert_symbols', $options['sf_first_line'] ).'</h3>'; if(!empty($options['sf_sec_line'])) echo '<h4>'.$options['sf_sec_line'].'</h4>';?></div>
            </div>
            <nav class="sfm-nav">
                <div class="sfm-va-middle">
                    <?php
                    $defaults = array(
                        'theme_location'  => '',
                        'menu'            => $current_page_sf_menu,
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => 'sfm-nav',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu( $defaults );
                    ?>
                    <div class="sfm-widget-area"><?php dynamic_sidebar('sf_sidebar_widget_area');?></div>
                </div>
            </nav>
            <ul class="sfm-social sfm-social-<?php echo $options['sf_social_style'] == 'icon' ? 'icons' : 'abbr'; ?>"></ul>
            <?php if(!empty($options['sf_copy'])): ?>
                <div class="sfm-widget sfm-widget-bottom sfm-copy">
                    <?php echo do_shortcode($options['sf_copy']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="sfm-sidebar-bg">
        <!-- eg. https://www.youtube.com/watch?v=AgI7OcZ9g60 or https://www.youtube.com/watch?v=gU10ALRQ0ww -->
        <?php if ( !empty( $options['sf_video_bg'] ) ) : ?>
            <div id="sfm-video" class="sfm-video" data-property="{
                    videoURL:'<?php esc_attr_e( $options['sf_video_bg'] );?>',
                    mobileFallbackImage: '',
                    containment:'#sfm-video',
                    showControls:false,
                    anchor: 'center,center',
                    autoPlay: 1,
                    loop: 1,
                    mute: 1,
                    startAt:0,
                    opacity:1,
                    addRaster:false,
                    stopMovieOnBlur:0,
                    playOnlyIfVisible: 1,
                    onReady: function(){jQuery(document).trigger('sfm-video-player-ready');},
                    onError: function(){jQuery(document).trigger('sfm-video-player-error');},
                    quality:'default'}">
            </div>
        <?php endif; ?>
    </div>
    <div class="sfm-view sfm-view-level-custom">
        <span class="sfm-close"></span>
        <?php
        if( count( $sf_menu_data ) > 0 ){
            foreach ( $sf_menu_data as $key => $val ) {
                $curr = sfm_deparam( $val );
                if ( empty( $curr['content'] ) ) continue;
                echo '<div class="sfm-custom-content" id="sfm-cc-' . $key . '"><div class="sfm-content-wrapper">' . do_shortcode( urldecode( $curr['content'] ) ) . '</div></div>';
            }
        }
        ?>
    </div>
</div>
<?php
    if ($options['sf_mob_nav'] === 'yes') {
        echo '<div id="sfm-mob-navbar"><div class="sfm-navicon-button x"><div class="sfm-navicon"></div></div>';
        if (!empty($options['sf_tab_logo'])) {
            echo '<a href="' . home_url() . '"><img src="'. $options['sf_tab_logo'] . '" alt=""></a>';
        }
        echo '</div>';
    }
?>
<div id="sfm-overlay-wrapper"><div id="sfm-overlay"></div><div class="sfm-nav-bg_item -top"></div><div class="sfm-nav-bg_item -bottom"></div></div>