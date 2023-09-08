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
}
