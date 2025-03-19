<?php ob_start(); ?>

    <section>
        <h1>This is the resultat</h1>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
