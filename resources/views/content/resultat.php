<?php ob_start(); ?>
    <h1 class="text-3xl font-bold mb-6 max-[376px]:hidden">My Results</h1>
    <section class="w-full mx-auto">

        <article>
            <?php if (empty($results)): ?>
                <p class="text-gray-500">This user haven't done any quiz yet.</p>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-[#3B4D66] ">
                            <tr class="grid grid-cols-4">
                                <th scope="col" class="xs:px-6 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-neutral-50 flex flex-col justify-between">
                                    <div class="sort desc">Id</div>
                                    <input class="max-[376px]:w-2/3 search" type="text" name="id">
                                </th>
                                <th scope="col" class="xs:px-6 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-neutral-50 flex flex-col justify-between">
                                    <div class="sort desc">Date</div>
                                    <input class="max-[376px]:w-2/3 search" type="date" name="date">
                                </th>
                                <th scope="col" class="xs:px-6 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-neutral-50 flex flex-col justify-between">
                                    <div class="sort desc">Quiz name</div>
                                    <input class="max-[376px]:w-2/3 search" type="text" name="quiz-name">
                                </th>
                                <th scope="col" class=" xs:px-6 px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-neutral-50 flex flex-col justify-between">
                                    <div class="sort desc">Score</div>
                                    <input class="max-[376px]:w-2/3 search" type="text" pattern="\d+/\d+" name="score">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-[#3B4D66]">
                        <?php foreach ($results as $result): ?>
                            <tr class="grid grid-cols-4">
                                <td class="xs:px-6 px-4 py-4 whitespace-normal break-words text-sm text-gray-500 dark:text-neutral-50"><?= $result->getId() ?></td>
                                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50"><?= date('d M Y', strtotime($result->getCompletedAt()) ) ?>
                                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50"><?= $result->getTitle() ?></td>
                                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50"><?= $result->getScore() ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php endif; ?>
        </article>
    </section>
    <script>
        document.querySelector('input[name="score"]').addEventListener('input', function (e) {
            const value = e.target.value;
            if (!/^\d*\/?\d*$/.test(value)) {
                e.target.value = value.slice(0, -1);
            }
        });
        $('.search').on('input', function () {
            const searchParams = {
                id: $('input[name="id"]').val(),
                date: $('input[name="date"]').val(),
                quizName: $('input[name="quiz-name"]').val(),
                score: $('input[name="score"]').val(),
                userId: '<?= user('id') ?>'
            };

            $.ajax({
                url: 'http://localhost:8001/sort.php',
                type: 'GET',
                data: searchParams,
                success: function (data) {
                    $('tbody').empty();
                    data = Array.isArray(data) ? data : JSON.parse(data);
                    data.forEach(function (item) {
                        $('tbody').append(
                        `<tr class="grid grid-cols-4">
                        <td class="xs:px-6 px-4 py-4 whitespace-normal break-words text-sm text-gray-500 dark:text-neutral-50">${item.id}</td>
                        <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50">${new Date(item.completed_at).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' })}</td>
                        <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50">${item.title}</td>                        <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50">${item.score}</td>
                        </tr>`);
                    });

                },
                error: function (xhr, status, error) {
                    console.error('Error fetching results:', error);
                }
            });
        });

        $('.sort').on('click', function () {
            const column = $(this).text().toLowerCase();
            const order = $(this).hasClass('desc') ? 'asc' : 'desc';
            $(this).toggleClass('desc asc');

            const searchParams = {
                id: $('input[name="id"]').val(),
                date: $('input[name="date"]').val(),
                quizName: $('input[name="quiz-name"]').val(),
                score: $('input[name="score"]').val(),
                userId: '<?= user('id') ?>',
                orderBy: column,
                order: order
            };

            $.ajax({
                url: 'http://localhost:8001/sort.php',
                type: 'GET',
                data: searchParams,
                success: function (data) {
                    $('tbody').empty();
                    data = Array.isArray(data) ? data : JSON.parse(data);
                    data.forEach(function (item) {
                        $('tbody').append(
                            `<tr class="grid grid-cols-4">
                <td class="xs:px-6 px-4 py-4 whitespace-normal break-words text-sm text-gray-500 dark:text-neutral-50">${item.id}</td>
                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50">${new Date(item.completed_at).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' })}</td>
                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50">${item.title}</td>
                <td class="xs:px-6 px-4 py-4 whitespace-normal text-sm text-gray-500 dark:text-neutral-50">${item.score}</td>
                </tr>`);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching results:', error);
                }
            });
        });



    </script>



<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>