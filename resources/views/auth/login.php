<?php ob_start(); ?>

<section>
    <h1>This is the login page</h1>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
