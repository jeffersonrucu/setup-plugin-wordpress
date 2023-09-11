<?php
    use App\Providers\Helpers;

    $helpers = new Helpers;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <?php do_action('get_header'); ?>

        <?php echo $helpers->templateRenderer('sections/header'); ?>

        <main id="app">
