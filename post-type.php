<?php

add_action('init', 'cfe_evento_cpt', 1);

function cfe_evento_cpt()
{
    $evento = new Cfe_Post_Type(
        'Evento', // Nome (Singular) do Post Type.
        'evento' // Slug do Post Type.
    );

    $evento->set_labels(
        array(
            'name'               => __('Eventos', 'cfe'),
            'singular_name'      => __('Evento', 'cfe'),
            'view_item'          => __('Ver Evento', 'cfe'),
            'edit_item'          => __('Editar Evento', 'cfe'),
            'search_items'       => __('Pesquisar Evento', 'cfe'),
            'update_item'        => __('Atualizar Evento', 'cfe'),
            'parent_item_colon'  => __('Pai Evento:', 'cfe'),
            'menu_name'          => __('Eventos', 'cfe'),
            'add_new'            => __('Adicionar Novo', 'cfe'),
            'add_new_item'       => __('Adicionar Novo Evento', 'cfe'),
            'new_item'           => __('Novo Evento', 'cfe'),
            'all_items'          => __('Todos Eventos', 'cfe'),
            'not_found'          => __('Nenhum Evento encontrado', 'cfe'),
            'not_found_in_trash' => __('Nenhum Evento encontrado na Lixeira', 'cfe')
        )
    );

    $evento->set_arguments(
        array(
            'supports' => array('title'),
            'menu_icon'    => 'dashicons-calendar-alt'
        )
    );
}
