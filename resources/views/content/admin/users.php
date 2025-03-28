<?php ob_start(); ?>

<div class="flex min-h-screen">
    <div class="flex-1  sm:p-0 lg:p-8">
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
                    <h2 class="text-2xl font-semibold">Users List</h2>
                    <a href="/dashboard/user/create" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">New user</a>
                </div>
                
                <?php if (empty($users)): ?>
                    <p class="text-gray-500 dark:text-gray-100">No users found.</p>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-[#3B4D66]">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Username</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Role</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Active</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Creation Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Details</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Update</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-[#3B4D66] divide-y divide-gray-200 dark:divide-gray-700">
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= $user->getId() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= $user->getEmail() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= $user->getUsername() ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= strtoupper($user->getRole()) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200"><?= $user->getIsActive() === 1 ? 'Yes' : 'No' ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">
                                            <?php 
                                                echo date('d M Y', strtotime($user->getCreatedAt()));
                                            ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="/content/admin/result/<?= $user->getId() ?>" class="text-green-500 hover:text-green-700 px-3 py-1 rounded bg-green-100 hover:bg-green-200">Details</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="/dashboard/user/edit/<?= $user->getId() ?>" class="text-indigo-600 hover:text-indigo-900 px-3 py-1 rounded bg-indigo-100 hover:bg-indigo-200">Update</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <?php if ($_SESSION['user']->getId() !== $user->getId()): ?>
                                                <form action="/dashboard/user/delete/<?= $user->getId() ?>" method="POST" class="inline" onsubmit="return confirmDelete(<?= $user->getId() ?>)">
                                                    <button type="submit" class="text-red-600 hover:text-red-900 px-3 py-1 rounded bg-red-100 hover:bg-red-200">Delete</button>
                                                </form>
                                            <?php else: ?>
                                                <span class="text-gray-400 px-3 py-1 rounded bg-gray-100">Delete</span>
                                            <?php endif; ?>
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
function confirmDelete(userId) {
    return confirm('Are you sure you want to delete this user?');
}
</script>

<?php 
$content = ob_get_clean();
require VIEWS . 'layout.php'; 
?>
