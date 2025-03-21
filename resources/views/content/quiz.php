<?php ob_start(); ?>

    <section class="flex flex-col md:flex-row md:items-start gap-12">
        <article class="w-full flex flex-row justify-between">
            <div class="md:w-1/2 mb-10">
                <h1 class="text-4xl text-gray-700 font-normal mb-4 leading-tight">Welcome to the<br><span class="font-bold text-gray-900">Frontend Quiz!</span></h1>
                <p class="text-lg text-gray-600">Pick a subject to get started.</p>
            </div>

            <div class="md:w-1/2 flex flex-col space-y-4">
                <?php
                $count = 1;
                foreach($quizz as $quiz):
                    ?>
                    <a href="quiz/<?php echo $quiz->getId(); ?>/1" class="bg-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 text-gray-900 font-medium">
                        <?php echo $quiz->getTitle(); ?>
                    </a>
                    <?php
                    $count++;
                endforeach;
                ?>
            </div>
        </article>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>