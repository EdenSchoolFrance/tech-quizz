<?php ob_start(); ?>

<section class="container mx-auto p-6">
    <article>
        <?php foreach ($userResults as $userResult): ?>
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <p><?= $userResult->getScore() ?></p>
            </div>
        <?php endforeach; ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>