<?php ob_start(); ?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Edit Question for Quiz: <?= $quiz->getTitle() ?></h1>
    
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

    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Edit Question</h2>
        
        <form action="/quiz/<?= $quiz->getId() ?>/questions/update/<?= $question->getId() ?>" method="POST">
            <div class="mb-4">
                <label for="question_text" class="block text-sm font-medium text-gray-700 mb-1">Question Text *</label>
                <input type="text" name="question_text" id="question_text" value="<?= htmlspecialchars($question->getQuestionText()) ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div class="mb-6">
                <h3 class="text-lg font-medium mb-2">Answers</h3>
                <p class="text-sm text-gray-500 mb-3">Add at least 2 answers and select one or more as correct for QCM.</p>
                
                <div id="answers-container">
                    <?php 
                    $answers = $question->getAnswers();
                    $answerCount = count($answers);
                    if ($answerCount < 2) $answerCount = 2;
                    
                    for ($i = 0; $i < $answerCount; $i++): 
                        $answer = isset($answers[$i]) ? $answers[$i] : null;
                    ?>
                    <div class="mb-3 flex items-center answer-row">
                        <div class="flex-1">
                            <label for="answer_<?= $i+1 ?>" class="block text-sm font-medium text-gray-700 mb-1">Answer <?= $i+1 ?> *</label>
                            <input type="text" name="answers[<?= $i ?>][text]" id="answer_<?= $i+1 ?>" value="<?= $answer ? htmlspecialchars($answer->getAnswerText()) : '' ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="ml-4 flex items-center">
                            <input type="checkbox" name="correct_answers[]" value="<?= $i ?>" id="correct_<?= $i+1 ?>" <?= ($answer && $answer->getIsCorrect()) ? 'checked' : '' ?> class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <label for="correct_<?= $i+1 ?>" class="ml-2 text-sm text-gray-700">Correct</label>
                        </div>
                        <?php if ($i >= 2): ?>
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
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Update Question</button>
                <a href="/quiz/<?= $quiz->getId() ?>/questions" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    let answerCount = <?= $answerCount ?>;
    
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
                <label for="answer_${answerCount}" class="block text-sm font-medium text-gray-700 mb-1">Answer ${answerCount} *</label>
                <input type="text" name="answers[${answerCount-1}][text]" id="answer_${answerCount}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="ml-4 flex items-center">
                <input type="checkbox" name="correct_answers[]" value="${answerCount-1}" id="correct_${answerCount}" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                <label for="correct_${answerCount}" class="ml-2 text-sm text-gray-700">Correct</label>
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
