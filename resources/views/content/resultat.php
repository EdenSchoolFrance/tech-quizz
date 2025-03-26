<?php ob_start(); ?>

<section class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">My results</h1>
    <article>
    <?php if (empty($results)): ?>
            <p class="text-gray-500">This user haven't done any quiz yet.</p>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quiz Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($results as $result): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $result->getId() ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $result->getCompletedAt() ?>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $result->getTitle() ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $result->getScore() ?></td>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php endif; ?>
    </article>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>