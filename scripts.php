<?php

add_action('wp_enqueue_scripts', 'cfe_frontend_scripts');

function cfe_frontend_scripts()
{

    if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) :
        wp_enqueue_script('cfe-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
    endif;

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1','::1', '10.0.0.3'))) ? '' : '.min';

    // wp_enqueue_style( 'cfe-style', CFE_URL . 'assets/css/style.css', array(), false, 'all' );

    // wp_enqueue_script( 'jquery-mask', CFE_URL . 'assets/lib/jquery.mask' . $min . '.js', array( 'jquery' ), '1.14.16', true );

    wp_register_script('cf-eventos', CFE_URL . 'assets/js/cf-eventos' . $min . '.js', array('jquery'), '1.0.1', true);

    wp_enqueue_script('cf-eventos');

    wp_localize_script('cf-eventos', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

// add_action('admin_enqueue_scripts', 'cfe_admin_scripts');

function cfe_admin_scripts()
{

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) ? '' : '.min';

    wp_enqueue_style('cfe-admin- style', CFE_URL . 'assets/css/admin-style.css', array(), false, 'all');

    // wp_enqueue_script( 'jquery-mask', CFE_URL . 'assets/lib/jquery.mask' . $min . '.js', array( 'jquery' ), '1.14.16', true );

    wp_register_script('cfe-admin-script', CFE_URL . 'assets/js/cfe-admin-script' . $min . '.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('cfe-admin-script');

    wp_localize_script('cfe-admin-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
