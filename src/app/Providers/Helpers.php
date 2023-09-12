<?php

namespace App\Providers;

class Helpers
{
    public static function templateRenderer($filePath, $variables = [])
    {
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include PLUGIN_SETUP_GUTENBERG_VIEWS_PATH . $filePath . '.php';


        // End buffering and return its contents
        $output = ob_get_clean();

        return $output;
    }
}
