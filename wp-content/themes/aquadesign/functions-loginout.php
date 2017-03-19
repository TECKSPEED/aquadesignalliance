<?php

add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
function add_loginout_link( $items, $args ) {
    If (($args->theme_location == 'utility' || $args->theme_location == 'mobile') && !is_user_logged_in())
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'. site_url('/registration') .'">Register</a></li>';

    if (is_user_logged_in() && ($args->theme_location == 'utility' || $args->theme_location == 'mobile')) {
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'. wp_logout_url( home_url() ) .'">Log Out</a></li>';
    }
    elseif (!is_user_logged_in() && ($args->theme_location == 'utility' || $args->theme_location == 'mobile')) {
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'. site_url('/login') .'">Log In</a></li>';
    }

    return $items;
}