<?php

namespace App;

/**
 * Class Filters
 *
 * This class manages filters for the plugin.
 */
class Filters
{
    public function __construct()
    {
        add_filter('blade/view/paths', array($this, 'bladeViewPaths'));
    }

    /**
	 * bladeViewPaths Set base path to blade views
	 *
	 * @return string New path to blade views
	 */
	public function bladeViewPaths(): string
    {
		// Set theme base path
		return PLUGIN_SETUP_GUTENBERG_VIEWS_PATH;
	}
}
