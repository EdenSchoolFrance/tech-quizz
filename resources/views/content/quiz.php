<?php ob_start(); ?>

    <section class="flex flex-col md:flex-row md:items-start gap-12">
        <article class="w-full grid md:grid-cols-2 md:justify-items-center">
            <div class="mb-10">
                <h1 class="md:text-4xl text-5xl text-gray-700 dark:text-gray-400 font-normal mb-4 leading-tight">Welcome to the<br><span class="font-bold text-gray-900 dark:text-gray-200">Frontend Quiz!</span></h1>
                <p class="md:text-lg text-xl text-gray-600 dark:text-gray-300">Pick a subject to get started.</p>
            </div>

            <div class="flex flex-col space-y-4 2xl overflow-y-auto h-76 md:w-2/3">
                <?php
                foreach($quizz as $quiz):
                    ?>
                    <a href="quiz/<?php echo $quiz->getId(); ?>" class="bg-white dark:bg-[#3B4D66] rounded-xl p-5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 text-gray-900 dark:text-gray-200 font-medium">
                        <?php echo $quiz->getTitle(); ?>
                    </a>
                    <?php
                endforeach;
                    ?>
            </div>
        </article>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>