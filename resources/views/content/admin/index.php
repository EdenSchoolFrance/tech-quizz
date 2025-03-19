<?php ob_start(); ?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
    
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
        <h2 class="text-2xl font-semibold mb-4">Create a new Quiz</h2>
        
        <form action="/quiz/store" method="POST">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Quiz Title *</label>
                <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required 
                       value="<?= isset($_SESSION['old']['title']) ? $_SESSION['old']['title'] : '' ?>">
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="5"><?= isset($_SESSION['old']['description']) ? $_SESSION['old']['description'] : '' ?></textarea>
            </div>
            
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Create Quiz</button>
                <a href="/quiz" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
    
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Manage Your Quizzes</h2>
        
        <?php if (empty($quizzes)): ?>
            <p class="text-gray-500">You haven't created any quizzes yet.</p>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($quizzes as $quiz): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $quiz->getTitle() ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= substr($quiz->getDescription(), 0, 50) . (strlen($quiz->getDescription()) > 50 ? '...' : '') ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $quiz->getCreatedAt() ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="/quiz/<?= $quiz->getId() ?>" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="/quiz/edit/<?= $quiz->getId() ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                    <form id="delete-form-<?= $quiz->getId() ?>" action="/quiz/delete/<?= $quiz->getId() ?>" method="POST" class="hidden">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Manage Your Users</h2>
        
        <?php if (empty($quizzes)): ?>
            <p class="text-gray-500">You haven't have any users.</p>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">password</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">role</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">created_at</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $user->getUsername() ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= substr($user->getEmail())?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $user->getPassword() ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $user->getRole() ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $user->getCreated_at() ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="/quiz/<?= $user->getId() ?>" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="/quiz/edit/<?= $user->getId() ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                    <form id="delete-form-<?= $user->getId() ?>" action="/quiz/delete/<?= $user->getId() ?>" method="POST" class="hidden">
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

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>
