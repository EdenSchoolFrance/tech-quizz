<?php ob_start(); ?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Manage Questions for Quiz: <?= $quiz->getTitle() ?></h1>
    
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
            <?= $_SESSION['success'] ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error']) && is_string($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
            <?= $_SESSION['error'] ?>
        </div>
    <?php endif; ?>

    <div class="bg-white dark:bg-[#3B4D66] dark:text-neutral-50 shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Add a New Question</h2>
        
        <form action="/quiz/<?= $quiz->getId() ?>/questions/store" method="POST">
            <div class="mb-4">
                <label for="question_text" class="block text-sm font-medium text-gray-700 dark:text-neutral-50 mb-1">Question Text *</label>
                <input type="text" name="question_text" id="question_text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?=old('question_text')?>" required>
            </div>
            
            <div class="mb-6 ">
                <h3 class="text-lg font-medium mb-2 dark:text-neutral-50">Answers</h3>
                <p class="text-sm text-gray-500 dark:text-neutral-50 mb-3">Add at least 2 answers and select one or more as correct for QCM.</p>
                
                <div id="answers-container">
                    <?php for ($i = 1; $i <= 2; $i++): ?>
                    <div class="mb-3 flex items-center answer-row">
                        <div class="flex-1">
                            <label for="answer_<?= $i ?>" class="block text-sm font-medium text-gray-700 dark:text-neutral-50 mb-1">Answer <?= $i ?> *</label>
                            <input type="text" name="answers[<?= $i-1 ?>][text]" id="answer_<?= $i ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?=old('answers['. $i-1 .'][text]')?>" required>
                        </div>
                        <div class="ml-4 flex items-center">
                            <input type="checkbox" name="correct_answers[]" value="<?= $i-1 ?>" id="correct_<?= $i ?>" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <label for="correct_<?= $i ?>" class="ml-2 text-sm text-gray-700 dark:text-neutral-50">Correct</label>
                        </div>
                        <?php if ($i > 2): ?>
                        <button type="button" class="ml-2 text-red-500 remove-answer" onclick="removeAnswer(this)">
                            <i class="fas fa-times"></i>
                        </button>
                        <?php endif; ?>
                    </div>
                    <?php endfor; ?>
                </div>
                
                <button type="button" id="add-answer" class="mt-2 px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">
                    <i class="fas fa-plus mr-1"></i> Add Another Answer
                </button>
            </div>
            
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Add Question</button>
            </div>
        </form>
    </div>
    
    <div class=" shadow-md rounded-lg p-6 dark:bg-[#3B4D66] dark:text-white">
        <h2 class="text-2xl font-semibold mb-4">Existing Questions</h2>
        
        <?php if (empty($questions)): ?>
            <p class="text-gray-500 dark:text-neutral-50">No questions have been added to this quiz yet.</p>
        <?php else: ?>
            <div class="space-y-6">
                <?php foreach ($questions as $index => $question): ?>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-medium mb-2">Question <?= $index + 1 ?>: <?= $question->getQuestionText() ?></h3>
                        
                        <div class="pl-4 mt-2 space-y-1">
                            <?php foreach ($question->getAnswers() as $answer): ?>
                                <div class="flex items-center">
                                    <span class="w-6 h-6 flex items-center justify-center rounded-full <?= $answer->getIsCorrect() ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?> mr-2 text-sm">
                                        <?= $answer->getIsCorrect() ? '✓' : '' ?>
                                    </span>
                                    <p><?= $answer->getAnswerText() ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="mt-3 flex space-x-4">
                            <a href="/quiz/<?= $quiz->getId() ?>/questions/edit/<?= $question->getId() ?>" class="text-blue-600 hover:text-blue-900 text-sm">Edit Question</a>
                            <a href="/quiz/<?= $quiz->getId() ?>/questions/delete/<?= $question->getId() ?>" onclick="return confirm('Are you sure you want to delete this question?')" class="text-red-600 hover:text-red-900 text-sm">Delete Question</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    let answerCount = 2;
    
    document.getElementById('add-answer').addEventListener('click', function() {
        // Check if we already have 4 answers
        const currentAnswers = document.querySelectorAll('.answer-row');
        if (currentAnswers.length >= 4) {
            alert('Maximum 4 answers allowed');
            return;
        }
        
        answerCount++;
        const container = document.getElementById('answers-container');
        
        const newRow = document.createElement('div');
        newRow.className = 'mb-3 flex items-center answer-row';
        
        newRow.innerHTML = `
            <div class="flex-1">
                <label for="answer_${answerCount}" class="block text-sm font-medium text-gray-700 dark:text-neutral-50 mb-1">Answer ${answerCount} *</label>
                <input type="text" name="answers[${answerCount-1}][text]" id="answer_${answerCount}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="ml-4 flex items-center">
                <input type="checkbox" name="correct_answers[]" value="${answerCount-1}" id="correct_${answerCount}" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                <label for="correct_${answerCount}" class="ml-2 text-sm text-gray-700 dark:text-neutral-50">Correct</label>
            </div>
            <button type="button" class="ml-2 text-red-500 remove-answer" onclick="removeAnswer(this)">
                <i class="fas fa-times"></i>
            </button>
        `;
        
        container.appendChild(newRow);
    });
    
    function removeAnswer(button) {
        const row = button.closest('.answer-row');
        row.remove();
        
        // Renumber the remaining answers
        const rows = document.querySelectorAll('.answer-row');
        rows.forEach((row, index) => {
            const label = row.querySelector('label');
            label.textContent = `Answer ${index + 1} *`;
            label.setAttribute('for', `answer_${index + 1}`);
            
            const input = row.querySelector('input[type="text"]');
            input.setAttribute('id', `answer_${index + 1}`);
            input.setAttribute('name', `answers[${index}][text]`);
            
            const checkbox = row.querySelector('input[type="checkbox"]');
            checkbox.setAttribute('id', `correct_${index + 1}`);
            checkbox.setAttribute('value', index);
            
            const checkboxLabel = row.querySelector('label:nth-child(2)');
            checkboxLabel.setAttribute('for', `correct_${index + 1}`);
        });
    }
</script>

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>