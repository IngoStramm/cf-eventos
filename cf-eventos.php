<?php

/**
 * Plugin Name:     Cf Eventos
 * Plugin URI:      https://agencialaf.com
 * Description:     Sistema de Eventos do Converte Fácil
 * Author:          Ingo Stramm
 * Author URI:      https://agencialaf.com
 * Text Domain:     cfe
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Cf_Eventos
 */


defined('ABSPATH') or die('No script kiddies please!');

define('CFE_DIR', plugin_dir_path(__FILE__));
define('CFE_URL', plugin_dir_url(__FILE__));

require_once CFE_DIR . 'tgm/tgm.php';
require_once CFE_DIR . 'classes/class-post-type.php';
require_once CFE_DIR . 'functions.php';
require_once CFE_DIR . 'post-type.php';
require_once CFE_DIR . 'cmb.php';
require_once CFE_DIR . 'shortcode.php';
require_once CFE_DIR . 'scripts.php';


require 'plugin-update-checker-4.10/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/cf-eventos/master/info.json',
    __FILE__,
    'cf-eventos'
);
