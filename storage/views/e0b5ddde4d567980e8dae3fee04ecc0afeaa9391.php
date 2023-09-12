<?php
/*
    Template Name: Gutenberg Blocks Page
*/
?>



<?php $__env->startSection('content'); ?>
    <?php echo the_content(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wp-content/plugins/setup-plugin-gutenberg/src/resources/views/template-blocks.blade.php ENDPATH**/ ?>