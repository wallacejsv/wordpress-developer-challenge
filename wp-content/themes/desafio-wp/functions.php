<?php
    // Include your functions files here
    include('inc/enqueues.php');
    include('inc/post-types/index.php');

    //Remove Admin Bar
    function my_function_admin_bar(){
        return false;
    }
    add_filter( 'show_admin_bar' , 'my_function_admin_bar');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post', 'page', 'share'));

    //Menus
    register_nav_menus( array(
        'institucional' => __(  'Menu Institucional' , 'Play'),
        'mapa-do-site'  => __( 'Footer', 'Play')
    ) );

    /* ==========================================================================
    *  Adicionar Configuracões Gerais
    * ========================================================================== */
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Configurações do tema "Play"',
            'menu_title' => 'Opções do Tema',
            'menu_slug' => 'play-theme-options',
            'capability' => 'edit_posts',
            'position' => 4,
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Logo',
            'menu_title' => 'Logo',
            'parent_slug' => 'play-theme-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Header',
            'menu_title' => 'Header',
            'parent_slug' => 'play-theme-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Footer',
            'menu_title' => 'Footer',
            'parent_slug' => 'play-theme-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Scripts',
            'menu_title' => 'Scripts',
            'parent_slug' => 'play-theme-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Asset Version',
            'menu_title' => 'Asset Version',
            'parent_slug' => 'play-theme-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Página 404',
            'menu_title' => 'Página 404',
            'parent_slug' => 'play-theme-options',
        ]);
    }