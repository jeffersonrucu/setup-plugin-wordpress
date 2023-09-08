<?php

namespace App\Providers;

/**
 * Class PluginConstants
 *
 * This class defines constants and paths related to the plugin.
 */
class PluginConstants
{
    /**
     * Prefix for all constants defined by this plugin.
     */
    private const PLUGIN_PREFIX = 'PLUGIN_SETUP_GUTENBERG';

    /**
     * Initializes a new instance of the PluginConstants class.
     */
    public function setConstants(): void
    {
        // Define the constant PLUGIN_SETUP_GUTENBERG_INDEX_URL with the URL of the current plugin directory
        $this->defineConstantUrl('INDEX_URL', '');

        // Define the constant PLUGIN_SETUP_GUTENBERG_PATH with the path to the root directory of the plugin
        $this->defineConstantPath('INDEX_PATH', '');

        // Define the constant PLUGIN_SETUP_GUTENBERG_ASSETS_URL with the path to the assets directory
        $this->defineConstantUrl('ASSETS_URL', 'resources/assets/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_ASSETS_PATH with the path to the assets directory
        $this->defineConstantPath('ASSETS_PATH', 'resources/assets/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_PUBLIC_SCRIPTS_URL with the path to the scripts directory
        $this->defineConstantUrl('PUBLIC_SCRIPTS_URL', 'public/scripts/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_PUBLIC_SCRIPTS_PATH with the path to the scripts directory
        $this->defineConstantPath('PUBLIC_SCRIPTS_PATH', 'public/scripts/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_PUBLIC_STYLES_URL with the path to the styles directory
        $this->defineConstantUrl('PUBLIC_STYLES_URL', 'public/styles/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_PUBLIC_STYLES_PATH with the path to the styles directory
        $this->defineConstantPath('PUBLIC_STYLES_PATH', 'public/styles/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_LIBS_URL with the path to the libs directory
        $this->defineConstantUrl('LIBS_URL', 'resources/assets/libs/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_LIBS_PATH with the path to the libs directory
        $this->defineConstantPath('LIBS_PATH', 'resources/assets/libs/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_FIELDS_URL with the path to the fields directory
        $this->defineConstantUrl('FIELDS_URL', 'app/Classes/Libs/Acf/Fields/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_FIELDS_PATH with the path to the fields directory
        $this->defineConstantPath('FIELDS_PATH', 'app/Classes/Libs/Acf/Fields/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_ADMIN_PAGES_URL with the path to the admin pages directory
        $this->defineConstantUrl('ADMIN_PAGES_URL', 'app/Controllers/Admin/Pages/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_ADMIN_PAGES_PATH with the path to the admin pages directory
        $this->defineConstantPath('ADMIN_PAGES_PATH', 'app/Controllers/Admin/Pages/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_ADMIN_VIEWS_URL with the path to the admin views directory
        $this->defineConstantUrl('ADMIN_VIEWS_URL', 'resources/views/admin/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_ADMIN_VIEWS_PATH with the path to the admin views directory
        $this->defineConstantPath('ADMIN_VIEWS_PATH', 'resources/views/admin/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_BLOCKS_URL with the path to the blocks directory
        $this->defineConstantUrl('BLOCKS_URL', 'app/Blocks/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_BLOCKS_PATH with the path to the blocks directory
        $this->defineConstantPath('BLOCKS_PATH', 'app/Blocks/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_BLOCKS_VIEWS_URL with the path to the blocks views directory
        $this->defineConstantPath('BLOCKS_VIEWS_URL', 'resources/views/blocks/');

        // Define the constant PLUGIN_SETUP_GUTENBERG_BLOCKS_VIEWS with the path to the blocks views directory
        $this->defineConstantUrl('BLOCKS_VIEWS', 'resources/views/blocks/');
    }

    /**
     * Define a constant with a given name and value as a path.
     *
     * @param string $name   The constant name.
     * @param string $suffix The path suffix to append to the plugin's root directory.
     * @return void
     */
    private function defineConstantPath($name, $suffix): void
    {
        define(self::PLUGIN_PREFIX . '_' . $name, PLUGIN_SETUP_GUTENBERG_PATH . $suffix);
    }

    /**
     * Define a constant with a given name and value as a URL.
     *
     * @param string $name   The constant name.
     * @param string $suffix The URL suffix to append to the plugin's root URL.
     * @return void
     */
    private function defineConstantUrl($name, $suffix): void
    {
        define(self::PLUGIN_PREFIX . '_' . $name, PLUGIN_SETUP_GUTENBERG_URL . $suffix);
    }
}
