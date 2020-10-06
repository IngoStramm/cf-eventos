<?php

function cfe_debug($debug)
{
    echo '<pre>';
    var_dump($debug);
    echo '</pre>';
}

add_action('elementor_pro/forms/new_record', function ($record, $ajax_handler) {

    $raw_fields = $record->get('fields');
    $fields = [];
    $evento_id = '';

    foreach ($raw_fields as $id => $field) {
        $fields[$id] = $field['value'];
        if ($id == 'evento_id')
            $evento_id = $field['value'];
    }

    if (!$evento_id) return;

    $vagas_ocupadas = get_post_meta($evento_id, 'cfe_vagas_ocupadas', true);
    $update_evento = update_post_meta($evento_id, 'cfe_vagas_ocupadas', $vagas_ocupadas + 1);

    // cfe_debug($update_evento);

}, 10, 2);
