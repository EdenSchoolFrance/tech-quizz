<?php ob_start(); ?>

<div class="flex min-h-screen">
    <div class="flex-1 p-8">
        <div class="container mx-auto">
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
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">Quiz List</h2>
                    <a href="/quiz/create" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">New quiz</a>
                </div>
                
                <?php if (empty($quizzes)): ?>
                    <p class="text-gray-500 dark:text-gray-100">No quizzes found.</p>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-[#3B4D66]">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Creation Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Details</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Update</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-[#3B4D66] divide-y divide-gray-200">
                                <?php foreach ($quizzes as $quiz): ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100"><?= $quiz->getId() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= $quiz->getTitle() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= $quiz->getCreatedAt() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/quiz/<?= $quiz->getId() ?>/questions" class="inline-block px-4 py-2 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition-colors">Details</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/dashboard/quiz/edit/<?= $quiz->getId() ?>" class="inline-block px-4 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition-colors">Update</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="#" onclick="confirmDelete('<?= $quiz->getId() ?>')" class="inline-block px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition-colors">Delete</a>
                                            <form id="delete-form-<?= $quiz->getId() ?>" action="/quiz/delete/<?= $quiz->getId() ?>" method="POST" class="hidden"></form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex justify-between items-center text-sm text-gray-600 dark:text-gray-300">
                        <div>Showing 1-<?= min(count($quizzes), 10) ?> of <?= count($quizzes) ?></div>
                        <div class="flex space-x-2">
                            <button class="px-2 py-1 border border-gray-300 rounded-md dark:border-gray-600" disabled>&lt;</button>
                            <button class="px-2 py-1 border border-gray-300 rounded-md dark:border-gray-600">&gt;</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(quizId) {
    if (confirm('Are you sure you want to delete this quiz?')) {
        document.getElementById('delete-form-' + quizId).submit();
    }
}
</script>

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>