<?php
ob_start();
$_SESSION['result'] = true;

$tryId = uniqid();

?>
    <section class="flex flex-col md:flex-row md:items-start gap-12 xs:w-3/4 w-full mx-auto ">
        <div class="md:w-1/2 md:h-[400px] flex flex-col justify-between">
            <div>
                <h1 class="xs:text-3xl text-xl font-bold text-gray-800 dark:text-gray-200 mb-8 quizz-text"></h1>
            </div>
            <div>
                <p class="text-gray-600 dark:text-gray-300 mb-4 italic question-num"></p>
                <h1 class="xs:text-3xl text-xl font-bold text-gray-800 dark:text-gray-200 mb-8 question-text" ></h1>
            </div>

            <div class="w-full bg-gray-200 dark:bg-[#3B4D66] rounded-full h-2 mb-6">
                <div class="bg-purple-600 h-2 rounded-full progress-bar" style="width: 0"></div>
            </div>
        </div>

        <div class="md:w-1/2 flex flex-col space-y-4">
            <form class="quiz-form" action="" method="GET">

                <div class="option-container space-y-4">

                </div>

                <button type="submit" name="submit-button" class="w-full bg-purple-600 text-white font-medium py-4 px-6 rounded-xl mt-8 hover:bg-purple-700 transition-colors ">
                    Submit Answer
                </button>
                <div class="text-center mt-4 text-red-500 submit-error hidden">
                    Please select an answer
                </div>
            </form>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            let limit = 1;
            let max;
            function store(answer) {
                const id = $('.question-text').attr('id');
                $.ajax({
                    url: `http://localhost:8001/store.php?result=${answer}&questionId=${id}&userId=<?=user('id')?>&tryId=<?=$tryId?>`,
                    method: 'GET',
                });
            }
            function fetchAnswers() {
                $.ajax({
                    url: `http://localhost:8001/fetch.php?id=<?=$id?>&limit=${limit-1}&answers=true`,
                    method: 'GET',
                    success: function(data) {
                        const answer = $('input[name="answer"]:checked').val();
                        let correct = false;
                        const answers = $('label')
                        $('input[name="answer"]').prop('disabled', true);
                        answers.removeClass('hover:shadow-md');
                        answers.removeClass('hover:-translate-y-1');
                        answers.removeClass('cursor-pointer');

                        data.forEach(function(item) {
                            if (item.Id_reponse === answer && item.is_correct === 1) {
                                correct = true;
                                let id = $('input[name="answer"]:checked').attr('id');
                                $(`label[for=${id}]`).removeClass('peer-checked:border-purple-600');
                                $(`label[for=${id}]`).removeClass('border-transparent');
                                $(`label[for=${id}]`).addClass('border-green-500');
                            }
                        });
                        if (!correct) {
                            let id = $('input[name="answer"]:checked').attr('id');
                            $(`label[for=${id}]`).removeClass('peer-checked:border-purple-600');
                            $(`label[for=${id}]`).removeClass('border-transparent');
                            $(`label[for=${id}]`).addClass('border-red-500');
                            data.forEach(function (item) {
                                if (item.is_correct == 1) {
                                    id = $(`input[value=${item.Id_reponse}]`).attr('id');
                                    $(`label[for=${id}]`).removeClass('peer-checked:border-purple-600');
                                    $(`label[for=${id}]`).removeClass('border-transparent');
                                    $(`label[for=${id}]`).addClass('border-green-500');
                                }
                            });
                        }
                        const button = $('button[type="submit"]');
                        if(limit-1 === max) {
                            button.text('View Results');
                            button.prop('name', 'results-button');
                        }
                        else {
                            button.text('Next Question');
                            button.prop('name', 'next-button');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching data:', textStatus, errorThrown);
                    }
                });
            }
            function fetch() {
                $.ajax({
                    url: `http://localhost:8001/fetch.php?id=<?=$id?>&limit=${limit}`,
                    method: 'GET',
                    success: function(data) {
                        max = data[4];
                        const quizzText = $('.quizz-text');
                        quizzText.empty()
                        quizzText.append(data[5]);

                        const optionsContainer = $('.option-container');
                        optionsContainer.empty()

                        const questionText = $('.question-text');
                        questionText.empty()
                        questionText.append(data[0].question_text);
                        questionText.attr('id', data[0].Id_question);

                        const questionNum = $('.question-num');
                        questionNum.empty()
                        questionNum.append(`Question ${limit} of ` + data[4]);

                        const progressBar = $('.progress-bar');
                        progressBar.css({'transition': 'width ease 1s', 'width': (limit / data[4]) * 100 + '%'});

                        optionsContainer.empty();
                        const LetterArray = ['A', 'B', 'C', 'D']
                        data.forEach(function(item, index) {
                            if (index > 3) return;
                            const optionId = 'option' + index;

                            const optionHtml = `
                                <div class="option-containers">
                                    <input type="radio" name="answer" id="${optionId}" value="${item.Id_reponse}" class="hidden peer">
                                    <label for="${optionId}" class="bg-white dark:bg-[#3B4D66] dark:text-gray-300 w-full rounded-xl p-5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 text-gray-900 font-medium flex justify-between items-center cursor-pointer border-2 border-transparent peer-checked:border-purple-600">
                                        <div class="flex items-center">
                                            <span class="mr-3 px-4 py-2 rounded-xl bg-[#F4F6FA] dark:bg-[#626C7F] dark:text-gray-300">${LetterArray[index]}</span>
                                            <span>${item.answer_text}</span>
                                        </div>
                                    </label>
                                </div>`;

                            optionsContainer.append(optionHtml);
                        });
                        limit++;

                        // Disable the submit button initially
                        const submitButton = $('button[type="submit"]');
                        submitButton.addClass('disabled');
                        submitButton.removeClass('cursor-pointer')
                        submitButton.removeClass('hover:bg-purple-700');
                        submitButton.prop('name', 'submit-button');
                        submitButton.text('Submit Answer');

                        // Enable the submit button when an answer is selected
                        $('input[name="answer"]').on('change', function() {
                            submitButton.removeClass('disabled');
                            submitButton.addClass('cursor-pointer');
                            submitButton.addClass('hover:bg-purple-700');

                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching data:', textStatus, errorThrown);
                    }
                });
            }
            $('.quiz-form').on('submit', function(e) {
                e.preventDefault();
                if ($('button[type="submit"]').hasClass('disabled')) {
                    $('.submit-error').removeClass('hidden');
                }
                else {
                    if(e.originalEvent.submitter.name === 'submit-button') {
                        $('.submit-error').addClass('hidden')
                        store($('input[name="answer"]:checked').val());
                        fetchAnswers();
                    }
                    else {
                        if (limit-1 === max) {
                            window.location.href = '/quiz/<?=$id?>/result/<?=$tryId?>';
                            return;
                        }
                        fetch();
                    }
                }
            });
            fetch();
        });
    </script>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>