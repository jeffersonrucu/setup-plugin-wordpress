
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>

    <body <?php echo e(body_class()); ?> >
        <?php
            wp_body_open();
            do_action('get_header');
        ?>

        <?php echo $__env->make('sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main id="app">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <?php echo $__env->make('sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php
            do_action('get_footer');
            wp_footer();
        ?>
    </body>
</html>
<?php /**PATH /var/www/html/wp-content/plugins/setup-plugin-gutenberg/src/resources/views/layouts/app.blade.php ENDPATH**/ ?>