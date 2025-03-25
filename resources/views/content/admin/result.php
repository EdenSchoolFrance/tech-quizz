<?php ob_start(); ?>

<section class="container mx-auto p-6">
    <article>
    <?php if (empty($userResults)): ?>
            <p class="text-gray-500">This user haven't done quiz yet.</p>
        <?php else: ?>
            <?php foreach ($userResults as $userResult): ?>
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <p>Quiz number : <?= $userResult->getQuizzId() ?></p>
                <p>Score : <?= $userResult->getScore() ?></p>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>