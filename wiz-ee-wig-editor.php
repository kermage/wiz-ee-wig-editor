<?php

/**
 * @package Wiz-Ee-Wig Editor
 * @since 0.1.0
 */

/**
 * Plugin Name: Wiz-Ee-Wig Editor
 * Plugin URI:  https://github.com/kermage/wiz-ee-wig-editor/
 * Author:      Gene Alyson Fortunado Torcende
 * Author URI:  mailto:genealyson.torcende@gmail.com
 * Description: A WYSIWYG widget using the wp_editor().
 * Version:     0.1.0
 * License:     GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wewe
 */

// Accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/* ==================================================
Global constants
================================================== */
define( 'WEWE_VERSION',  '0.1.0' );
define( 'WEWE_FILE',     __FILE__ );
define( 'WEWE_URL',      plugin_dir_url( WEWE_FILE ) );
define( 'WEWE_PATH',     plugin_dir_path( WEWE_FILE ) );

// Load the Wiz-Ee-Wig Editor plugin
require_once WEWE_PATH . 'class.' . basename( WEWE_FILE );
