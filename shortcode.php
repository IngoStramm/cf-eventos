<?php

add_shortcode('cfe_evento', 'cfe_evento_shortcode');

function cfe_evento_shortcode($atts)
{
    $a = shortcode_atts(array(
        'id' => null
    ), $atts);
    $output = '';
    $evento_id = $a['id'];
    $args = array(
        'post_type' => 'evento',
        'posts_per_page' => -1
    );

    $the_query = new WP_Query($args);

    while ($the_query->have_posts()) {
        $the_query->the_post();

        if ($evento_id == get_the_ID()) {

            $timezone = new DateTimeZone('America/Sao_Paulo');
            $current_date = new DateTime('now', $timezone);
            $cfe_total_vagas = get_post_meta(get_the_ID(), 'cfe_total_vagas', true);
            $cfe_vagas_ocupadas = get_post_meta(get_the_ID(), 'cfe_vagas_ocupadas', true);
            $cfe_data_horario = get_post_meta(get_the_ID(), 'cfe_data_horario', true);
            $data_evento = new DateTime(null);
            $data_evento->setTimestamp($cfe_data_horario);
            $dateTimestamp1 = strtotime($current_date->format('M-d-Y H:i'));
            $dateTimestamp2 = strtotime($data_evento->format('M-d-Y H:i'));
            if ($dateTimestamp1 >= $dateTimestamp2) {
                $output .= '<h3>' . __('Encerrado!', 'cfe') . '</h3>';
                $output .= '<p>' . __('O evento já ocorreu.', 'cfe') . '</p>';
            } elseif ($cfe_vagas_ocupadas >= $cfe_total_vagas) {
                // cfe_debug($cfe_vagas_ocupadas);
                // cfe_debug($cfe_total_vagas);
                $output .= '<h3>' . __('Encerrado!', 'cfe') . '</h3>';
                $output .= '<p>' . __('As vagas para', 'cfe') . ' ' . date('d/m/Y, \à\s H\h:i', $cfe_data_horario) . ', ' . __('já se esgotaram.', 'cfe') . '</p>';
            } else {
                $output .=
                \Elementor\Plugin::$instance->frontend->get_builder_content(get_the_ID(), true);
            }
        }
    }
    wp_reset_postdata();

    return $output;
}
