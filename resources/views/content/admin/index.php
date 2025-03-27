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
                            <tbody class="bg-white dark:bg-[#3B4D66] divide-y divide-gray-200 dark:divide-gray-700">
                                <?php foreach ($quizzes as $quiz): ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= $quiz->getId() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= $quiz->getTitle() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">
                                            <?php 
                                                $date = new DateTime($quiz->getCreatedAt());
                                                if (class_exists('IntlDateFormatter')) {
                                                    $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'd MMMM Y');
                                                    echo $formatter->format($date);
                                                } else {
                                                    $months = [
                                                        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
                                                        5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
                                                        9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
                                                    ];
                                                    echo $date->format('d') . ' ' . $months[(int)$date->format('m')] . ' ' . $date->format('Y');
                                                }
                                            ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="/quiz/<?= $quiz->getId() ?>/questions" class="text-green-500 hover:text-green-700 px-3 py-1 rounded bg-green-100 hover:bg-green-200">Details</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="/dashboard/quiz/edit/<?= $quiz->getId() ?>" class="text-indigo-600 hover:text-indigo-900 px-3 py-1 rounded bg-indigo-100 hover:bg-indigo-200">Update</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <form action="/quiz/delete/<?= $quiz->getId() ?>" method="POST" class="inline" onsubmit="return confirmDelete(<?= $quiz->getId() ?>)">
                                                <button type="submit" class="text-red-600 hover:text-red-900 px-3 py-1 rounded bg-red-100 hover:bg-red-200">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(quizId) {
    return confirm('Are you sure you want to delete this quiz?');
}
</script>

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>