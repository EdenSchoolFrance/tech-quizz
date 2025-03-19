<?php ob_start(); ?>

    <section>
        <article>
        <?php foreach ($questions as $question): ?>
            <div>
                <h2><?= $question->getTitle() ?></h2>
                <p><?= $question->getDescription() ?></p>   
        <?php endforeach ?>
        </article>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
