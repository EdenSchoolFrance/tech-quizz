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

    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Add a New Question</h2>
        
        <form action="/quiz/<?= $quiz->getId() ?>/questions/store" method="POST">
            <div class="mb-4">
                <label for="question_text" class="block text-sm font-medium text-gray-700 mb-1">Question Text *</label>
                <input type="text" name="question_text" id="question_text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div class="mb-6">
                <h3 class="text-lg font-medium mb-2">Answers (4 required)</h3>
                <p class="text-sm text-gray-500 mb-3">Select one answer as correct.</p>
                
                <?php for ($i = 1; $i <= 4; $i++): ?>
                <div class="mb-3 flex items-center">
                    <div class="flex-1">
                        <label for="answer_<?= $i ?>" class="block text-sm font-medium text-gray-700 mb-1">Answer <?= $i ?> *</label>
                        <input type="text" name="answers[<?= $i-1 ?>][text]" id="answer_<?= $i ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="ml-4 flex items-center">
                        <input type="radio" name="correct_answer" value="<?= $i-1 ?>" id="correct_<?= $i ?>" <?= $i === 1 ? 'checked' : '' ?> class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <label for="correct_<?= $i ?>" class="ml-2 text-sm text-gray-700">Correct</label>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Add Question</button>
            </div>
        </form>
    </div>
    
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Existing Questions</h2>
        
        <?php if (empty($questions)): ?>
            <p class="text-gray-500">No questions have been added to this quiz yet.</p>
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
                        
                        <div class="mt-3 flex">
                            <a href="/quiz/<?= $quiz->getId() ?>/questions/delete/<?= $question->getId() ?>" onclick="return confirm('Are you sure you want to delete this question?')" class="text-red-600 hover:text-red-900 text-sm">Delete Question</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>