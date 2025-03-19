<?php ob_start(); ?>

    <section>
        <h1>Coucous les admins</h1>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
