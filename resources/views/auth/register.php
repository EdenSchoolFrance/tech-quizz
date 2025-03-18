<?php ob_start(); ?>

<section>
    <h1>This is the register page</h1>
</section>

<form action="/postRegister" method="post">
    <div>
        <label for="username">username : </label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="email">email : </label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">password : </label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <input type="submit" value="Register">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
