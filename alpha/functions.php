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
    $alpha_custom_header_details = array(
        'header-text'           => true,
        'default-text-color'    => '#222'
    );
    add_theme_support(
        $feature = 'custom-header',
        $alpha_custom_header_details
    );
    $defaults = array(
        "height"      => '100',
        "width"       => '100'
    );
    add_theme_support('custom-logo', $defaults);
    add_theme_support($feature = 'custom-background');
    register_nav_menu(
        $location = 'topmenu',
        $description = __("Top Menu", "alpha")
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
            'name'          => __('Left Sidebar', 'alpha'),
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

function alpha_the_excerpt($excerpt)
{
    if (!post_password_required()) {
        return $excerpt;
    } else {
        echo get_the_password_form();
    }
}
add_filter(
    $tag = 'the_excerpt',
    $function_to_add = 'alpha_the_excerpt'
);

function alpha_protected_title_format()
{
    return "%s";
}
add_filter(
    $tag = 'protected_title_format',
    $function_to_add = 'alpha_protected_title_format'
);

function alpha_nav_items_css($classes, $item)
{
    $classes[] = "nav-item";
    return $classes;
}
add_filter(
    $tag = 'nav_menu_css_class',
    $function_to_add = 'alpha_nav_items_css',
    $priority = 10,
    $args = 2
);

function add_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu', 'add_menuclass');

function alpha_about_template_banner()
{
    if (is_page()) {
        $alpha_featured_image = get_the_post_thumbnail_url(null, "large");
        $style = <<<EOD
        <style>
        .page-header{
            background-image: url({$alpha_featured_image});
        }
        </style>
EOD;
        echo $style;
    }

    if (is_front_page()) {
        if (current_theme_supports($feature = 'custom-header')) {
            $header_image = get_header_image();
            $header_text = "block";
            $header_text_color = get_header_textcolor();
            if (!display_header_text()) {
                $header_text = "none";
            }
            $style = <<<EOD
            <style>
            .header{
                background-image: url({$header_image});
                background-size:cover;
                margin-botton:50px;
            }
            .header h1.heading a, h3.tagline{
                color: #{$header_text_color};
                display:{$header_text}
            }
            </style>
EOD;
            echo $style;
        }
    }
}
add_action(
    $tag = 'wp_head',
    $function_to_add = 'alpha_about_template_banner',
    $priority = 1000
);

// Header section customize field
function alpha_customize($wp_customize)
{
    $wp_customize->add_setting('header_bg_color', array(
        'default' => "#4285f4",
        'transport' => 'refresh'
    ));

    $wp_customize->add_section('alpha_color_theme_section', array(
        'title' => __('Color', 'alpha'),
        'priority' => 30
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_color', array(
        'label' => __('Header Color', 'alpha'),
        'section' => 'alpha_color_theme_section',
        'settings' => 'header_bg_color'
    )));
}
add_action('customize_register', 'alpha_customize');

// Change and reflect value accordingly
function alpha_example_head()
{
    $header_color = get_theme_mod('header_bg_color', '#4285f4');
    $style = <<<EOD
    <style>
    .header h1.heading a, h3.tagline{
        color:{$header_color};
    }
    </style>
EOD;
    echo $style;
}

add_action('wp_head', 'alpha_example_head', 1100);



// Header section customize field
function alpha_header($wp_customize)
{
    // Save settings to database
    $wp_customize->add_setting('alpha_header_headline', array(
        'default' => 'Hello, I\'m',
        'transport' => 'refresh'
    ));


    //Add a section for you settings in customizer option
    $wp_customize->add_section('alpha_header_section', array(
        'title' => __('Header title', 'alpha'),
        'priority' => 30 //the lowest the number the highest the input field will get preference
    ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'header-text',
            array(
                'label'          => __( 'Header Title', 'alpha' ),
                'section'        => 'alpha_header_section',
                'settings'       => 'alpha_header_headline',
                'type'           => 'text'
            )
        )
    );
}
add_action('customize_register', 'alpha_header');
