<?php

//
// ────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: A L P H A   B O O T S T R A P P I N G : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────────────────
//


function alpha_bootstrapping(){
    load_theme_textdomain(
        $domain = 'alpha'
    );
    add_theme_support(
        $feature = 'post-thumbnails'
    );
    add_theme_support(
        $feature = 'title-tag'
    );
}
add_action(
    $tag = 'after_setup_theme', 
    $function_to_add = 'alpha_bootstrapping'
);

//
// ──────────────────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: I N C L U D E   S C R I P T S   A N D   S T Y L E S : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────────────────
//


function alpha_assets(){
    wp_enqueue_style(
        $handle = 'bootstrap', 
        $src = '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
    );
    wp_enqueue_style(
        $handle = 'main', 
        $src = get_stylesheet_uri()
    );
}
add_action(
    $tag = 'wp_enqueue_scripts', 
    $function_to_add = 'alpha_assets'
);