<?php

function theme_enqueues_styles_scripts() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '1.0.0');
    wp_enqueue_style('theme-css', get_template_directory_uri() . '/dist/css/style.min.css', [], '1.0.0');
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.min.css', [], '1.0.0' );

    wp_enqueue_script('jquery');

    wp_enqueue_script('main-js', get_template_directory_uri() . '/dist/js/main.min.js', [], '', true);
    wp_script_add_data('main-js', 'async', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueues_styles_scripts');