<?php ob_start(); ?>

<section>
    <h1>This is the register page</h1>

    <form action="/register" method="post" class="flex flex-col gap-5 bg-gray-100 py-15 px-20 rounded-3xl shadow-xl">
            <div class="flex flex-col">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" value="<?=old('nom')?>" >
                <span class="error"><?=error('nom')?></span>
            </div>
            <div class="flex flex-col">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" value="<?=old('prenom')?>" >
                <span class="error"><?=error('prenom')?></span>
            </div>
            <div class="flex flex-col">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <span class="error"><?=error('password')?></span>
            </div>
            <div class="flex flex-col">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
                <span class="error"><?=error('password_confirmation')?></span>
            </div>
            <button type="submit" class="p-2 bg-gray-700 text-white rounded-xl border border-transparent  hover:border-gray-400  hover:bg-gray-100 hover:text-black transition-colors duration-150 cursor-pointer">Register</button>
        </form>
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
