<?php ob_start(); ?>

    <section>
        <h1>Welcome to the Frontend Quiz !</h1>
        <article>
        <?php foreach ($quizz as $quiz): ?>
            <div>
                <h2><?= $quiz->getTitle() ?></h2>
                <p><?= $quiz->getDescription() ?></p>   
        <?php endforeach ?>
        </article>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
