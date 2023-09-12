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

use App\Filters;
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
define('PLUGIN_SETUP_GUTENBERG_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_SETUP_GUTENBERG_URL', plugin_dir_url(__FILE__));
define('PLUGIN_SETUP_GUTENBERG_PUBLIC_SCRIPTS_URL', PLUGIN_SETUP_GUTENBERG_URL . 'public/scripts/');
define('PLUGIN_SETUP_GUTENBERG_PUBLIC_SCRIPTS_PATH', PLUGIN_SETUP_GUTENBERG_PATH . 'public/scripts/');
define('PLUGIN_SETUP_GUTENBERG_PUBLIC_STYLES_URL', PLUGIN_SETUP_GUTENBERG_URL . 'public/styles/');
define('PLUGIN_SETUP_GUTENBERG_PUBLIC_STYLES_PATH', PLUGIN_SETUP_GUTENBERG_PATH . 'public/styles/');
define('PLUGIN_SETUP_GUTENBERG_FIELDS_URL', PLUGIN_SETUP_GUTENBERG_URL . 'app/Classes/Libs/Acf/Fields/');
define('PLUGIN_SETUP_GUTENBERG_FIELDS_PATH', PLUGIN_SETUP_GUTENBERG_PATH . 'app/Classes/Libs/Acf/Fields/');
define('PLUGIN_SETUP_GUTENBERG_ADMIN_PAGES_URL', PLUGIN_SETUP_GUTENBERG_URL . 'app/Controllers/Admin/Pages/');
define('PLUGIN_SETUP_GUTENBERG_ADMIN_PAGES_PATH', PLUGIN_SETUP_GUTENBERG_PATH . 'app/Controllers/Admin/Pages/');
define('PLUGIN_SETUP_GUTENBERG_ADMIN_VIEWS_URL', PLUGIN_SETUP_GUTENBERG_URL . 'src/resources/views/admin/');
define('PLUGIN_SETUP_GUTENBERG_ADMIN_VIEWS_PATH', PLUGIN_SETUP_GUTENBERG_PATH . 'src/resources/views/admin/');
define('PLUGIN_SETUP_GUTENBERG_VIEWS_PATH', PLUGIN_SETUP_GUTENBERG_PATH . 'src/resources/views/');
define('PLUGIN_SETUP_GUTENBERG_VIEWS_URL', PLUGIN_SETUP_GUTENBERG_URL . 'src/resources/views/');
define('PLUGIN_SETUP_GUTENBERG_BLOCKS_URL', PLUGIN_SETUP_GUTENBERG_URL . 'app/Blocks/');
define('PLUGIN_SETUP_GUTENBERG_BLOCKS_PATH', PLUGIN_SETUP_GUTENBERG_PATH . 'app/Blocks/');

/**
 * Initialize the Setup class.
 */
$setup = new Setup();
$setup->initThemeAssets();
$setup->initEditorAssets();
$setup->initAdminAssets();
$setup->initThemeSupport();
$setup->registerCustomTemplates();


/**
 * Initialize the Filters class.
 */
new Filters();
