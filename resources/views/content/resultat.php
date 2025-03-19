<?php ob_start(); ?>

    <section class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Welcome to the result page !</h1>
        <article>
        <?php foreach ($results as $result): ?>
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h2 class="text-2xl font-semibold mb-2"><?= $result->getTitle() ?></h2>
                <p class="text-gray-700"><?= $result->getScore() ?> / 10</p>   
        <?php endforeach ?>
        </article>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
