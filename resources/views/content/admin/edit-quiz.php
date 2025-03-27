<?php ob_start(); ?>

<div class="flex min-h-screen">
    <div class="flex-1 p-8">
        <div class="container mx-auto max-w-4xl">
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

            <div class="bg-white dark:bg-[#3B4D66] shadow-md rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-semibold mb-6">Update Quiz</h2>
                <form action="/dashboard/quiz/update/<?= $quiz->getId() ?>" method="POST">
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Quiz Title *</label>
                        <input type="text" name="title" id="title" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required 
                               value="<?= isset($_SESSION['old']['title']) ? $_SESSION['old']['title'] : $quiz->getTitle() ?>">
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <textarea name="description" id="description" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" rows="5"><?= isset($_SESSION['old']['description']) ? $_SESSION['old']['description'] : $quiz->getDescription() ?></textarea>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Update now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>
