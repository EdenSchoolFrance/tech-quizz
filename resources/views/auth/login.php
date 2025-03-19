<?php ob_start(); ?>

<section>
    <h1>This is the login page</h1>
</section>

<form action="/login" method="post" class="flex flex-col gap-5 bg-gray-100 py-15 px-20 rounded-3xl shadow-xl mx-auto w-1/3">

    <div class="flex flex-col">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?=old('email')?>" >
        <span class="error"><?=error('email')?></span>
    </div>
    <div class="flex flex-col">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <span class="error"><?=error('password')?></span>
    </div>
    <button type="submit" class="p-2 bg-gray-700 text-white rounded-xl border border-transparent  hover:border-gray-400  hover:bg-gray-100 hover:text-black transition-colors duration-150 cursor-pointer">Login</button>
</form>
</section>
<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
