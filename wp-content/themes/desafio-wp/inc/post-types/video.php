<?php

function type_video() {
    $labels = array(
        'name'               => 'Vídeos',
        'singular_name'      => 'Vídeo',
        'menu_name'          => 'Vídeos',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Vídeo',
        'edit'               => 'Editar',
        'edit_item'          => 'Editar Vídeo',
        'new_item'           => 'Novo Vídeo',
        'view'               => 'Ver',
        'view_item'          => 'Ver Vídeo',
        'search_items'       => 'Procurar Vídeos',
        'not_found'          => 'Nenhum Vídeo Encontrado',
        'not_found_in_trash' => 'Nenhum Vídeo Encontrado na Lixeira',
        'parent'             => 'Vídeo Pai'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'video' ),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 5,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
    );

    register_post_type( 'video', $args );
}

add_action( 'init', 'type_video' );

function tax_video_type() {
    $labels = array(
        'name' => 'Vídeo Type',
        'singular_name' => 'Vídeo Type',
        'menu_name' => 'Vídeo Type',
        'all_items' => 'Todos os Types',
        'edit_item' => 'Editar Type',
        'view_item' => 'Ver Type',
        'update_item' => 'Atualizar Type',
        'add_new_item' => 'Adicionar Novo Type',
        'new_item_name' => 'Nome do Novo Type',
        'search_items' => 'Procurar Types',
        'popular_items' => 'Type Populares',
        'separate_items_with_commas' => 'Separe os types com vírgulas',
        'add_or_remove_items' => 'Adicionar ou Remover Types',
        'choose_from_most_used' => 'Escolher dos Mais Usados',
        'not_found' => 'Nenhum Type Encontrado',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true, // Mude para 'false' se desejar uma taxonomia não hierárquica, como tags
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'video_type'),
    );

    register_taxonomy('video_type', array('video'), $args);
}

add_action('init', 'tax_video_type');