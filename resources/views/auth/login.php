<?php ob_start(); ?>

<section>
    <h1>This is the login page</h1>
</section>

<form action="/postLogin" method="post">
    <div>
        <label for="username">username : </label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="password">password : </label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <input type="submit" value="Login">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
