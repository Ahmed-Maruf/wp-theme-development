<?php

//
// ────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: A L P H A   B O O T S T R A P P I N G : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────────────────
//


function alpha_bootstrapping()
{
    load_theme_textdomain(
        $domain = 'alpha'
    );
    add_theme_support(
        $feature = 'post-thumbnails'
    );
    add_theme_support(
        $feature = 'title-tag'
    );
    register_nav_menu(
        $location = 'topmenu', 
        $description = __("Top Menu","alpha")
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


function alpha_assets()
{
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

//
// ────────────────────────────────────────────────────── I ──────────
//   :::::: W I D G E T S : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────
//
function alpha_widgets()
{
    register_sidebar(
        $args = array(
            'name'          => __( 'Left Sidebar', 'alpha' ),
            'id'            => 'footer-left',    // ID should be LOWERCASE  ! ! !
            'description'   => 'Left Sidebar for the theme',
            'class'         => '',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>' 
            )
    );
}
add_action(
    $tag = 'widgets_init',
    $function_to_add = 'alpha_widgets'
);

function alpha_the_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }
    else{
        echo get_the_password_form();
    }
}
add_filter(
    $tag = 'the_excerpt', 
    $function_to_add = 'alpha_the_excerpt'
);

function alpha_protected_title_format(){
    return "%s";
}
add_filter(
    $tag = 'protected_title_format', 
    $function_to_add = 'alpha_protected_title_format'
);

function alpha_nav_items_css($classes, $item){
    $classes[] = "nav-item";
    return $classes; 
}
add_filter(
    $tag = 'nav_menu_css_class', 
    $function_to_add = 'alpha_nav_items_css',
    $priority = 10,
    $args = 2
);

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
 }
 add_filter('wp_nav_menu','add_menuclass');