<?php

add_filter( 'pc_filter_display_header_inner', '__return_true', 10 );
add_filter( 'pc_filter_header_nav_dialog', '__return_true', 10 );
add_filter( 'pc_filter_display_footer_inner', '__return_true', 10 );


/*----------  Home  ----------*/

add_filter( 'pc_filter_card_image', 'pc_edit_card_image', 10, 3 );

    function pc_edit_card_image( $display, $pc_post, $params ) {

        if ( defined('NEWS_POST_SLUG') && is_front_page() && $pc_post->type == NEWS_POST_SLUG ) {
            if ( $params['key'] > 0 ) { $display = false; }
        }
        return $display;

    }