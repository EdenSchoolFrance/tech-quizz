<?php ob_start(); ?>

    <section>
        <h1>Hello <?=user('username')?></h1>
        <p>Sorry, but you can't access to the incredible Quiz, your account has been suspended, try to come back later !</p>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
