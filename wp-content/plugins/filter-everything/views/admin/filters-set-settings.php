<?php

if ( ! defined('ABSPATH') ) {
    exit;
}

?><div class="wpc-filters-set-settings-wrapper">
    <table class="wpc-form-fields-table">
        <?php
            $set_settings_fields = flrt_get_set_settings_fields( $post->ID );

            // Allows you to manipulate fields before show them
            do_action_ref_array( 'wpc_before_filter_set_settings_fields', array( &$set_settings_fields ) );

            foreach ( $set_settings_fields as $key => $attributes ) {

                if( isset( $attributes['skip_view'] ) && $attributes['skip_view'] ){
                    do_action_ref_array( 'wpc_cycle_filter_set_settings_fields', array( &$set_settings_fields ) );
                }else{
                    flrt_include_admin_view('filter-field', array(
                            'field_key'  => $key,
                            'attributes' => $attributes
                        )
                    );
                }
            }
        ?>
    </table>
</div>