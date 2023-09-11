<?php
    use App\Providers\Helpers;

    $helpers = new Helpers;
?>

        </main>

        <?php echo $helpers->templateRenderer('sections/footer'); ?>

        <?php do_action('get_footer'); ?>
        <?php wp_footer(); ?>
    </body>
</html>
