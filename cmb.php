<?php

add_action('cmb2_admin_init', 'cfe_evento_metabox');
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function cfe_evento_metabox()
{
    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_evento = new_cmb2_box(array(
        'id'            => 'cfe_evento_metabox',
        'title'         => esc_html__('Dados', 'cfe'),
        'object_types'  => array('evento'), // Post type
    ));

    $cmb_evento->add_field(array(
        'name'    => esc_html__('Data e Horário', 'cfe'),
        'desc'    => esc_html__('Data e Horário do evento (mês/dia/ano)', 'cfe'),
        'id'      => 'cfe_data_horario',
        'type'    => 'text_datetime_timestamp',
        // 'date_format' => 'd/m/Y',
    ));

    $cmb_evento->add_field(array(
        'name' => esc_html__('Total de vagas', 'cfe'),
        'id'   => 'cfe_total_vagas',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
            'min' => 0
        ),
        'sanitization_cb' => 'absint',
        'escape_cb'       => 'absint',
    ));

    $cmb_evento->add_field(array(
        'name' => esc_html__('Vagas ocupadas', 'cfe'),
        'id'   => 'cfe_vagas_ocupadas',
        'type' => 'text',
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
            'min' => 0
        ),
        'sanitization_cb' => 'absint',
        'escape_cb'       => 'absint',
        'default' => 0
    ));

    $cmb_evento->add_field(array(
        'name' => esc_html__('Formulário', 'cfe'),
        'id'   => 'cfe_formulario',
        'type' => 'text',
    ));

}
