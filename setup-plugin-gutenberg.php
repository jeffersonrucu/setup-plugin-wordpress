<?php
/**
 * Setup Plugin
 *
 * @package           setup-plugin
 * @author            Jefferson Oliveira
 * @copyright         2023 Jefferson Oliveira
 * @license           MIT
 *
 * @wordpress-plugin
 * Plugin Name:       Setup Plugin
 * Plugin URI:
 * Description:
 * Version:           1.0.0
 * Requires at least: 6.2
 * Requires PHP:      8.0
 * Author:            Jefferson Oliveira
 * Author URI:        https://github.com/jeffersonrucu
 * Text Domain:       setup-plugin
 * License:           MIT
 * License URI:
 * Update URI:
 */

use App\Providers\PluginConstants;
use App\Setup;

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__(
        "Error locating autoloader. Please run inside plugin-plugin-gutenberg <code>composer install</code>.",
        'sage'
    ));
}

require $composer;

/**
 * Initialize the WP functions used in the plugin
 */
require_once ( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Initializes plugin constants.
 */
(new PluginConstants())->setConstants();

/**
 * Initialize the Setup class.
 */
$setup = new Setup();
$setup->initThemeAssets();
$setup->initEditorAssets();
$setup->initThemeSupport();
