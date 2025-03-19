<?php ob_start(); ?>

    <section class="flex flex-col md:flex-row md:items-start gap-12">
        <div class="md:w-1/2">
            <p class="text-gray-600 mb-4">Question 1</p>
            <h1 class="text-3xl font-bold text-gray-800 mb-8"><?php echo escape($question->getQuestionText()) ?></h1>

            <!-- Barre de progression -->
            <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
                <div class="bg-purple-600 h-2 rounded-full" style="width: 20%"></div>
            </div>
        </div>

        <div class="md:w-1/2 flex flex-col space-y-4">
<!--            <form action="process_answer.php" method="POST">-->
<!--                <input type="hidden" name="quiz_id" value="--><?php //echo $quiz_id; ?><!--">-->
<!--                <input type="hidden" name="question_id" value="--><?php //echo $question->id; ?><!--">-->
<!--                <input type="hidden" name="question_num" value="--><?php //echo $question_num; ?><!--">-->

                <?php
                $options = ['A', 'B', 'C', 'D'];
                foreach($question->getAnswers() as $index => $answer):
                    if ($index < 4): // Limiter à 4 réponses maximum
                        ?>
                        <div class="option-container">
                            <input type="radio" name="answer" id="option<?php echo $options[$index]; ?>" value="<?php echo $answer->getId(); ?>" class="hidden peer">
                            <label for="option<?php echo $options[$index]; ?>" class="bg-white w-full rounded-xl p-5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 text-gray-900 font-medium flex justify-between items-center cursor-pointer border-2 border-transparent peer-checked:border-purple-600">
                                <div class="flex items-center">
                                    <span class="mr-3"><?php echo $options[$index]; ?></span>
                                    <span><?php echo htmlspecialchars($answer->getAnswerText()); ?></span>
                                </div>
                            </label>
                        </div>
                    <?php
                    endif;
                endforeach;
                ?>

                <button type="submit" class="w-full bg-purple-600 text-white font-medium py-4 px-6 rounded-xl mt-8 hover:bg-purple-700 transition-colors">
                    Submit Answer
                </button>
            </form>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>