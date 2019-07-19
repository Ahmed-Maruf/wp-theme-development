<?php

//
// ────────────────────────────────────────────────────────────── I ──────────
//   :::::: T H E M E   S E T U P : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────
//


function luncher_setup_theme()
{
    load_theme_textdomain(
        $domain = "luncher"
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
    $function_to_add = 'luncher_setup_theme'
);



//
// ────────────────────────────────────────────────────────────────── I ──────────
//   :::::: A S S E T S   L O A D E R : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────
//

function luncher_assets()
{

    //
    // ─────────────────────────────────────────────────────────────── STYLESHEET ─────
    //    
    wp_enqueue_style(
        $handle = 'luncher',
        $src = get_stylesheet_uri()
    );

    wp_enqueue_style(
        $handle = 'animate-css',
        $src = get_theme_file_uri($path = "/assets/css/bootstrap.css")
    );

    wp_enqueue_style(
        $handle = 'animate-css',
        $src = get_theme_file_uri($path = "/assets/css/animate.css")
    );

    wp_enqueue_style(
        $handle = 'icomoon-css',
        $src = get_theme_file_uri($path = "/assets/css/icomoon.css")
    );

    wp_enqueue_style(
        $handle = 'style-css',
        $src = get_theme_file_uri($path = "/assets/css/style.css")
    );

    //
    // ────────────────────────────────────────────────────────────────── SCRIPTS ─────
    //

    wp_enqueue_script(
        $handle = 'easing-jquery-js',
        $src = get_theme_file_uri($file = "/assets/js/jquery.easing.1.3.js"),
        $dep = array('jquery'),
        $var = null,
        $in_footer = true
    );

    wp_enqueue_script(
        $handle = 'bootstrap-min-js',
        $src = get_theme_file_uri($file = "/assets/js/bootstrap.min.js"),
        $dep = array('jquery'),
        $var = null,
        $in_footer = true
    );

    wp_enqueue_script(
        $handle = 'jquery-waypoint-js',
        $src = get_theme_file_uri($file = "/assets/js/jquery.waypoints.min.js"),
        $dep = array('jquery'),
        $var = null,
        $in_footer = true
    );

    wp_enqueue_script(
        $handle = 'countdown-js',
        $src = get_theme_file_uri($file = "/assets/js/simplyCountdown.js"),
        $dep = array('jquery'),
        $var = null,
        $in_footer = true
    );

    wp_enqueue_script(
        $handle = 'main-js',
        $src = get_theme_file_uri($file = "/assets/js/main.js"),
        $dep = array('jquery'),
        $var = null,
        $in_footer = true
    );
}
add_action(
    $tag = 'wp_enqueue_scripts',
    $function_to_add = 'luncher_assets'
);

//
// ────────────────────────────────────────────────────── I ──────────
//   :::::: W I D G E T S : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────
//

function luncher_sidebars()
{
    register_sidebar(
        $args = array(
            'name'          => __('Footer Left', 'launcher'),
            'id'            => 'footer-left',
            'description'   => __('Footer Left sidebar', 'launcher'),
            'class'         => '',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );

    register_sidebar(
        $args = array(
            'name'          => __('Footer right', 'launcher'),
            'id'            => 'footer-right',
            'description'   => __('Footer Right sidebar', 'launcher'),
            'class'         => '',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );
}
add_action(
    $tag = "widgets_init",
    $function_to_add = "luncher_sidebars"
);

//
// ────────────────────────────────────────────────────────────────── I ──────────
//   :::::: A S S E R T S   S T Y L E : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────
//


function luncher_styles(){
    if(is_page()){
        $thumbnail_image = get_the_post_thumbnail_url(null,"large");
        $style = <<<EOD
        <style>
        #fh5co-aside{
            background-image:url({$thumbnail_image})
        }
        </style>
EOD;
        echo $style;
    }

}
add_action(
    $tag = "wp_head", 
    $function_to_add = "luncher_styles", $priority = 1000
);
