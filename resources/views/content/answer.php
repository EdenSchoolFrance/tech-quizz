<?php ob_start(); ?>

    <section>
        <article>
        <?php foreach ($answers as $answer): ?>
            <div>
                <h2><?= $answer->getTitle() ?></h2>
                <p><?= $answer->getDescription() ?></p>   
        <?php endforeach ?>
        </article>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
