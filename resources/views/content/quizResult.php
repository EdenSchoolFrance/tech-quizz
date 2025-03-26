<?php

ob_start();
if (isset($_SESSION['result'])) {
    unset($_SESSION['result']);
}

?>

<section class="flex flex-col md:flex-row md:items-start gap-12 xs:w-3/4 xs:mx-auto w-full  ">
    <div class="md:w-1/2">
        <h1 class=" text-5xl  text-gray-800 mb-4">Quiz completed</h1>
        <p class="text-5xl font-bold text-gray-700">You scored...</p>
    </div>

    <div class="md:w-1/2">
        <div class="bg-white rounded-xl p-8 shadow-sm mb-6">
            <div class="flex items-center justify-center mb-4">
                <span class="text-lg font-medium text-gray-800"><?=$quiz->getTitle()?></span>
            </div>

            <div class="text-center">
                <span class="text-8xl font-bold text-gray-800 block"><?php echo $_SESSION['score'][0]; ?></span>
                <span class="text-lg text-gray-500">out of <?php echo $_SESSION['score'][1]; ?></span>
            </div>
        </div>

        <a href="/quiz/<?=$quiz->getId()?>" class="block w-full bg-purple-600 text-white font-medium py-4 px-6 rounded-xl text-center hover:bg-purple-700 transition-colors">
            Play Again
        </a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>
