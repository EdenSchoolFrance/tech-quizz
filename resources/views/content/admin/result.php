<?php ob_start(); ?>
    <h1 class="text-3xl font-bold mb-6 max-[376px]:hidden">User's result</h1>
    <section class="w-full mx-auto rounded-3xl">

        <article>
            <?php if (empty($userResults)): ?>
            <p class="text-gray-500">This user haven't done any quiz yet.</p>
        <?php else: ?>
            <div class="overflow-x-auto ">
                <table class="min-w-full divide-y divide-gray-200  ">
                    <thead class="bg-gray-50 dark:bg-[#3B4D66]  ">
                        <tr class="grid grid-cols-4">
                            <th scope="col" class="xs:px-6 px-4 py-3 text-left text-xs font-medium text-gray-500 tracking-wider dark:text-neutral-50">ID</th>
                            <th scope="col" class="xs:px-6 px-4 py-3 text-left text-xs font-medium text-gray-500 tracking-wider dark:text-neutral-50">Date</th>
                            <th scope="col" class="xs:px-6 px-4 py-3 text-left text-xs font-medium text-gray-500 tracking-wider dark:text-neutral-50">Quiz Name</th>
                            <th scope="col" class="xs:px-6 px-4 py-3 text-left text-xs font-medium text-gray-500 tracking-wider dark:text-neutral-50">Score</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-[#3B4D66]">
                        <?php foreach ($userResults as $userResult): ?>
                            <tr class="grid grid-cols-4">
                                <td class="xs:px-6 px-4 py-4 whitespace-normal break-words text-sm text-gray-500 dark:text-neutral-50"><?= $userResult->getId() ?></td>
                                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50"><?= date('d M Y', strtotime($userResult->getCompletedAt()) ) ?>
                                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50"><?= $userResult->getTitle() ?></td>
                                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50"><?= $userResult->getScore() ?></td>

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