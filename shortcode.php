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

            $cfe_total_vagas = get_post_meta(get_the_ID(), 'cfe_total_vagas', true);
            $cfe_vagas_ocupadas = get_post_meta(get_the_ID(), 'cfe_vagas_ocupadas', true);
            $cfe_data_horario = get_post_meta(get_the_ID(), 'cfe_data_horario', true);
            $current_date = date('m/d/Y');
            // cfe_debug($current_date);
            // cfe_debug(date('m/d/Y', $cfe_data_horario));
            if ($current_date >= date('m/d/Y', $cfe_data_horario)) {
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
