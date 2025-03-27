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
                <h2 class="text-2xl font-semibold mb-6">Create New User</h2>
                <form action="/dashboard/user/store" method="POST">
                    <div class="mb-6">
                        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Username *</label>
                        <input type="text" name="username" id="username" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required 
                               value="<?= isset($_SESSION['old']['username']) ? $_SESSION['old']['username'] : '' ?>">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email *</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required 
                               value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password *</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>
                    <div class="mb-6">
                        <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Role *</label>
                        <select name="role" id="role" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                            <option value="user" <?= isset($_SESSION['old']['role']) && $_SESSION['old']['role'] === 'user' ? 'selected' : '' ?>>User</option>
                            <option value="admin" <?= isset($_SESSION['old']['role']) && $_SESSION['old']['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Create User</button>
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
