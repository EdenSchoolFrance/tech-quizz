<?php
ob_start();
?>

<div class="flex items-center justify-center min-h-[70vh]">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-md w-full text-center">
        <div class="bg-blue-100 rounded-lg p-2 mb-4 inline-block">
            <div class="bg-purple-600 rounded-lg p-6">
                <h1 class="text-6xl font-bold text-yellow-400">404</h1>
            </div>
        </div>
        
        <h2 class="text-xl font-semibold mb-6">Looks like you've got lost....</h2>
        
        <a href="/" class="block w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-4 rounded-lg transition-colors">
            Back to Home
        </a>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
