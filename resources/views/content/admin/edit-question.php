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
                <h3 class="text-lg font-medium mb-2">Answers (4 required)</h3>
                <p class="text-sm text-gray-500 mb-3">Select one answer as correct.</p>
                
                <?php 
                $answers = $question->getAnswers();
                for ($i = 0; $i < 4; $i++): 
                    $answer = isset($answers[$i]) ? $answers[$i] : null;
                ?>
                <div class="mb-3 flex items-center">
                    <div class="flex-1">
                        <label for="answer_<?= $i+1 ?>" class="block text-sm font-medium text-gray-700 mb-1">Answer <?= $i+1 ?> *</label>
                        <input type="text" name="answers[<?= $i ?>][text]" id="answer_<?= $i+1 ?>" value="<?= $answer ? htmlspecialchars($answer->getAnswerText()) : '' ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="ml-4 flex items-center">
                        <input type="radio" name="correct_answer" value="<?= $i ?>" id="correct_<?= $i+1 ?>" <?= ($answer && $answer->getIsCorrect()) ? 'checked' : '' ?> class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <label for="correct_<?= $i+1 ?>" class="ml-2 text-sm text-gray-700">Correct</label>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Update Question</button>
                <a href="/quiz/<?= $quiz->getId() ?>/questions" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>
