<?php

function buildweek_theme_support()
{
    //Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'buildweek_theme_support');

function buildweek_menus() {
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items",

    );

    register_nav_menus($locations);

}
 add_action('init', 'buildweek_menus');





function buildweek_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('buildweek-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '5.3.2', 'all');
    wp_enqueue_style('buildweek-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), '5.13.0', 'all');
    wp_enqueue_style('buildweek-style', get_template_directory_uri() .  "/style.css", array('buildweek-bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'buildweek_register_styles');

function buildweek_register_scripts()
{
    wp_enqueue_script('buildweek-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script('buildweek-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    wp_enqueue_script('buildweek-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '5.3.2', true);
    wp_enqueue_script('buildweek-main', get_template_directory_uri() . "/assets/js/main.js", array(), '3.4.1', true);
}

add_action('wp_enqueue_scripts', 'buildweek_register_scripts');

function buildweek_widget_areas() {
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => ' <ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>', 
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',
        )
        );



    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '', 
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area',
        )
        );

        register_sidebar(
            array(
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '',
                'after_widget' => '', 
                'name' => 'General Widget Area',
                'id' => 'widget-1',
                'description' => 'General Widget Area',
            )
            );

};


add_action('widgets_init', 'buildweek_widget_areas');

?>