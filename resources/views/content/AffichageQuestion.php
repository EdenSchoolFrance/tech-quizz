<?php ob_start(); ?>
    <?php $limit = $limit[0]?>
    <section class="flex flex-col md:flex-row md:items-start gap-12 w-3/4 mx-auto">
        <div class="md:w-1/2 h-[400px] flex flex-col justify-between">
            <div>
                <p class="text-gray-600 mb-4 italic question-num"></p>
                <h1 class="text-3xl font-bold text-gray-800 mb-8 question-text"></h1>
            </div>

            <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
                <div class="bg-purple-600 h-2 rounded-full progress-bar" style="width: 0"></div>
            </div>
        </div>

        <div class="md:w-1/2 flex flex-col space-y-4">
            <form action="/quiz/<?=$id?>/<?=$limit+1?>" method="GET">

                    <div class="option-container space-y-4">

                    </div>

                <button type="submit" class="w-full bg-purple-600 text-white font-medium py-4 px-6 rounded-xl mt-8 hover:bg-purple-700 transition-colors ">
                    Submit Answer
                </button>
            </form>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../api/fetch.php?id=<?=$id?>&limit=<?=$limit?>',
                method: 'GET',
                success: function(data) {
                    const optionsContainer = $('.option-container');

                    const questionText = $('.question-text');
                    questionText.append(data[0].question_text);

                    const questionNum = $('.question-num');
                    questionNum.append('Question <?=$limit?> of ' + data[4]);

                    const progressBar = $('.progress-bar');
                    progressBar.css({'transition': 'width ease 1s', 'width': (<?=$limit?> / data[4]) * 100 + '%'});

                    optionsContainer.empty();
                    const LetterArray = ['A', 'B', 'C', 'D']
                    data.forEach(function(item, index) {
                        if (index === 4) return;
                        const optionId = 'option' + index;

                        const optionHtml = `
                    <div class="option-containers">
                        <input type="radio" name="answer" id="${optionId}" value="${item.Id_reponse}" class="hidden peer">
                        <label for="${optionId}" class="bg-white w-full rounded-xl p-5 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 text-gray-900 font-medium flex justify-between items-center cursor-pointer border-2 border-transparent peer-checked:border-purple-600">
                            <div class="flex items-center">
                                <span class="mr-3 px-4 py-2 rounded-xl bg-[#F4F6FA]">${LetterArray[index]}</span>
                                <span>${item.answer_text}</span>
                            </div>
                        </label>
                    </div>
                `;

                        optionsContainer.append(optionHtml);
                    });

                    // Disable the submit button initially
                    const submitButton = $('button[type="submit"]');
                    submitButton.prop('disabled', true);

                    // Enable the submit button when an answer is selected
                    $('input[name="answer"]').on('change', function() {
                        submitButton.prop('disabled', false);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                }
            });
        });
    </script>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>