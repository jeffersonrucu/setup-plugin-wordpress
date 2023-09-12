<?php

namespace App;

/**
 * Class Setup
 *
 * This class manages theme setup and asset registration.
 */
class Setup
{
    /**
     * Initialize theme assets.
     *
     * @return void
     */
    public function initThemeAssets(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'registerThemeAssets'], 100);
    }

    /**
     * Initialize editor assets.
     *
     * @return void
     */
    public function initEditorAssets(): void
    {
        add_action('enqueue_block_editor_assets', [$this, 'registerEditorAssets'], 100);
    }

    /**
     * Initialize admin assets.
     *
     * @return void
     */
    public function initAdminAssets(): void
    {
        add_action('admin_enqueue_scripts', [$this, 'registerAdminAssets'], 100);
    }

    /**
     * Initialize theme support.
     *
     * @return void
     */
    public function initThemeSupport(): void
    {
        add_action('after_setup_theme', [$this, 'setupThemeSupport'], 20);
    }

    /**
     * Register the theme assets.
     *
     * @return void
     */
    public function registerThemeAssets(): void
    {
        wp_enqueue_script(
            'setup-plugin-gutenberg-script',
            PLUGIN_SETUP_GUTENBERG_PUBLIC_SCRIPTS_URL . 'app.js',
            [],
            null,
            true
        );

        wp_enqueue_style(
            'setup-plugin-gutenberg-style',
            PLUGIN_SETUP_GUTENBERG_PUBLIC_STYLES_URL . 'app.css',
            [],
            null,
            'all'
        );
    }

    /**
     * Register the editor assets.
     *
     * @return void
     */
    public function registerEditorAssets(): void
    {
        wp_enqueue_script(
            'setup-plugin-gutenberg-script',
            PLUGIN_SETUP_GUTENBERG_PUBLIC_SCRIPTS_URL . 'editor.js',
            [],
            null,
            true
        );

        wp_enqueue_style(
            'setup-plugin-gutenberg-style',
            PLUGIN_SETUP_GUTENBERG_PUBLIC_STYLES_URL . 'editor.css',
            [],
            null,
            'all'
        );
    }

    /**
     * Register the admin assets.
     *
     * @return void
     */
    public function registerAdminAssets(): void
    {
        wp_enqueue_script(
            'setup-plugin-gutenberg-script',
            PLUGIN_SETUP_GUTENBERG_PUBLIC_SCRIPTS_URL . 'admin.js',
            [],
            null,
            true
        );

        wp_enqueue_style(
            'setup-plugin-gutenberg-style',
            PLUGIN_SETUP_GUTENBERG_PUBLIC_STYLES_URL . 'admin.css',
            [],
            null,
            'all'
        );
    }

    /**
     * Register the initial theme setup.
     *
     * @return void
     */
    public function setupThemeSupport(): void
    {
        remove_theme_support('core-block-patterns');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('responsive-embeds');
        add_theme_support('html5', [
            'caption',
            'comment-form',
            'comment-list',
            'gallery',
            'search-form',
            'script',
            'style',
        ]);
    }

    /**
     * Register custom templates from the plugin directory.
     *
     * This method scans a specified directory within the plugin for custom template files.
     * It extracts the "Template Name" information from each file's metadata and integrates
     * these templates into the WordPress theme's available page templates.
     * Additionally, it ensures that the custom template is applied when necessary.
     *
     * @return void
     */
    public function registerCustomTemplates(): void
    {
        $templateDirectory = PLUGIN_SETUP_GUTENBERG_PATH . 'src/resources/views/';
        $templateFiles = glob($templateDirectory . 'template-*.php');

        foreach ($templateFiles as $template) {
            $templateName = get_file_data($template, array('Template Name' => 'Template Name'));
            $templateName = $templateName['Template Name'];

            $nameFile = explode("views/", $template);
            $nameFile = $nameFile[1];

            // register model
            add_filter('theme_page_templates', function ($templates) use ($nameFile, $templateName) {
                $templates[$nameFile] = $templateName;
                return $templates;
            });

            // use model
            add_filter('page_template', function ($template) use ($nameFile, $templateDirectory) {
                $post = get_post();
                $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

                if ($nameFile == basename($pageTemplate)) {
                    $nameBlade = explode('.blade.php', $nameFile)[0];
                    \blade($nameBlade);
                }

                return $template;
            });
        }
    }
}
