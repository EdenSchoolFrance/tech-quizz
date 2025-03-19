<?php ob_start(); ?>

<section class="container mx-auto p-6">
    <article>
        <?php if (is_array($questions) || is_object($questions)): ?>
            <?php foreach ($questions as $question): ?>
                <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                    <h2 class="text-2xl font-semibold mb-2"><?= $question->getQuestionText() ?></h2>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <p>No questions found.</p>
        <?php endif; ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>