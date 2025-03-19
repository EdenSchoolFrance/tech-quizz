<?php ob_start(); ?>

    <section>
        <h1>This is the Base homepage</h1>
        <p>Hello <?=user('username')?></p>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
