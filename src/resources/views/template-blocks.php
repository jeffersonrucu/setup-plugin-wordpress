<?php
/*
    Template Name: Gutenberg Blocks Page
*/
?>

<?php
    use App\Providers\Helpers;

    $helpers = new Helpers;
?>

<?php echo $helpers->templateRenderer('layouts/app-init'); ?>
    <?php the_content(); ?>
<?php echo $helpers->templateRenderer('layouts/app-end'); ?>
