<?php
/**
 * Plugin Name:          ASMTHRY
 * Plugin URI:           https://github.com/ASMTHRY/ASMTHRY.git
 * Description:          This is the basic plugin for WordPress code simplifying
 * Version:              1.0.0
 * Requires at least:    5.4
 * Requires PHP:         7.4
 * Author:               ASMTHRY
 * License:              GPL v2 or later
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package ASMTHRY
 */

defined( 'ABSPATH' ) || die( 'What are you doing here? No direct access allowed.' );

/** Define Constructors For Asmthry plugin */
define( 'ASMTHRY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ASMTHRY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) . '/' );

/** Including Files For ASMTHRY Plugin Support */

/**Plugin Activate */
require_once ASMTHRY_PLUGIN_PATH . 'class-asmthry-activate.php';
register_activation_hook( __FILE__, array( 'Asmthry_Activate', 'activate' ) );

/**Plugin Deactivate */
require_once ASMTHRY_PLUGIN_PATH . 'class-asmthry-deactivate.php';
register_deactivation_hook( __FILE__, array( 'Asmthry_Deactivate', 'deactivate' ) );
