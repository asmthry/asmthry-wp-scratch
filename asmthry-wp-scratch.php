<?php
/**
 * Plugin Name:          ASMTHRY WP Scratch
 * Plugin URI:           https://github.com/ASMTHRY/asmthry-wp-scratch
 * Description:          This is the basic plugin for WordPress code simplifying
 * Version:              1.0.0
 * Requires at least:    5.4
 * Requires PHP:         7.4
 * Author:               ASMTHRY
 * License:              GPL v2 or later
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package ASMTHRY WP Scratch
 */

defined( 'ABSPATH' ) || die( 'What are you doing here? No direct access allowed.' );

/** Define Constructors For ASMTHRY WP Scratch plugin */
define( 'ASMTHRY_PLUGIN_VERSION', '1.0.0' );
define( 'ASMTHRY_PLUGIN_NAME', 'ASMTHRY WP Scratch' );
define( 'ASMTHRY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ASMTHRY_THEME_URL', get_template_directory_uri() . '/' );
define( 'ASMTHRY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) . '/' );
define( 'ASMTHRY_THEME_PATH', get_template_directory() );
define( 'ASMTHRY_INCLUDE_PATH', ASMTHRY_PLUGIN_PATH . 'includes/' );

/** Including Files For ASMTHRY WP Scratch Plugin Support */

/**Plugin Activate */
require_once ASMTHRY_PLUGIN_PATH . 'class-asmthry-activate.php';
register_activation_hook( __FILE__, array( 'Asmthry_Activate', 'activate' ) );

/** Load base class */
require_once ASMTHRY_PLUGIN_PATH . 'class-asmthry-base.php';

/** Load files include class */
require_once ASMTHRY_PLUGIN_PATH . 'class-asmthry-load-resource.php';

/** Load global/user functions file */
require_once ASMTHRY_PLUGIN_PATH . 'global-functions.php';

/**Plugin Deactivate */
require_once ASMTHRY_PLUGIN_PATH . 'class-asmthry-deactivate.php';
register_deactivation_hook( __FILE__, array( 'Asmthry_Deactivate', 'deactivate' ) );
