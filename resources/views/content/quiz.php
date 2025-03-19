<?php ob_start(); ?>

<section class="container mx-auto p-6">
    <a href="quiz/create" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-6 hover:bg-blue-600 transition-all duration-100">Nouveau Quiz</a>

    <article>
        <?php foreach ($quizz as $quiz): ?>
            <a href="quiz/<?= $quiz->getId() ?>" class="block bg-white shadow-md rounded-lg p-6 mb-4 hover:bg-gray-100 transition">
                <h2 class="text-2xl font-semibold mb-2"><?= $quiz->getTitle() ?></h2>
                <p class="text-gray-700"><?= $quiz->getDescription() ?></p>
            </a>
        <?php endforeach ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>