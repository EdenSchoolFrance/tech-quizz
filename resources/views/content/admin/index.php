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

            <?php if (isset($editQuiz)): ?>
                <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">Edit Quiz</h2>
                    <form action="/dashboard/quiz/update/<?= $editQuiz->getId() ?>" method="POST">
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Quiz Title *</label>
                            <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required 
                                   value="<?= isset($_SESSION['old']['title']) ? $_SESSION['old']['title'] : $editQuiz->getTitle() ?>">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="description" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="5"><?= isset($_SESSION['old']['description']) ? $_SESSION['old']['description'] : $editQuiz->getDescription() ?></textarea>
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Update Quiz</button>
                            <a href="/dashboard" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">Cancel</a>
                        </div>
                    </form>
                </div>
            <?php elseif (isset($editUser)): ?>
                <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
                    <form action="/dashboard/user/update/<?= $editUser->getId() ?>" method="POST">
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username *</label>
                            <input type="text" name="username" id="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required 
                                   value="<?= isset($_SESSION['old']['username']) ? $_SESSION['old']['username'] : $editUser->getUsername() ?>">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required 
                                   value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : $editUser->getEmail() ?>">
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role *</label>
                            <select name="role" id="role" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="user" <?= (isset($_SESSION['old']['role']) && $_SESSION['old']['role'] === 'user') || (!isset($_SESSION['old']['role']) && $editUser->getRole() === 'user') ? 'selected' : '' ?>>User</option>
                                <option value="admin" <?= (isset($_SESSION['old']['role']) && $_SESSION['old']['role'] === 'admin') || (!isset($_SESSION['old']['role']) && $editUser->getRole() === 'admin') ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Update User</button>
                            <a href="/dashboard" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">Cancel</a>
                        </div>
                    </form>
                </div>
            <?php elseif (isset($createUser)): ?>
                <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">Create New User</h2>
                    <form action="/dashboard/user/store" method="POST">
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username *</label>
                            <input type="text" name="username" id="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required 
                                   value="<?= isset($_SESSION['old']['username']) ? $_SESSION['old']['username'] : '' ?>">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required 
                                   value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password *</label>
                            <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role *</label>
                            <select name="role" id="role" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="user" <?= isset($_SESSION['old']['role']) && $_SESSION['old']['role'] === 'user' ? 'selected' : '' ?>>User</option>
                                <option value="admin" <?= isset($_SESSION['old']['role']) && $_SESSION['old']['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Create User</button>
                            <a href="/dashboard" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">Cancel</a>
                        </div>
                    </form>
                </div>
            <?php else: ?>
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
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <div class="bg-white shadow-md rounded-lg p-6 mb-8">
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
                                            <a href="/quiz/<?= $quiz->getId() ?>/questions" class="text-green-600 hover:text-green-900 mr-3">Add Questions</a>
                                            <a href="/dashboard/quiz/edit/<?= $quiz->getId() ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <a href="#" onclick="confirmDelete('<?= $quiz->getId() ?>')" class="text-red-600 hover:text-red-900">Delete</a>
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
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold">Manage Users</h2>
                    <a href="/dashboard/user/create" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">Create New User</a>
                </div>
                <?php if (empty($users)): ?>
                    <p class="text-gray-500">No users found.</p>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $user->getUsername() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $user->getEmail()?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $user->getRole() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $user->getCreatedAt() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="/content/admin/result/<?= $user->getId() ?>" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                            <a href="/dashboard/user/edit/<?= $user->getId() ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                            <a href="#" onclick="confirmUserDelete('<?= $user->getId() ?>')" class="text-red-600 hover:text-red-900">Delete</a>
                                            <form id="user-delete-form-<?= $user->getId() ?>" action="/dashboard/user/delete/<?= $user->getId() ?>" method="POST" class="hidden">
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
    if (confirm('Are you sure you want to delete this quiz?')) {
        document.getElementById('delete-form-' + quizId).submit();
    }
}

function confirmUserDelete(userId) {
    if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
        document.getElementById('user-delete-form-' + userId).submit();
    }
}
</script>

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>