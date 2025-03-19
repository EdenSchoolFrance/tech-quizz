<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— YOUR_NAME —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="min-h-screen bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 -z-10">
        <img src="/assets/circle-top.png" alt="Background circle" class="w-full max-w-md opacity-10">
    </div>
    
    <div class="absolute bottom-0 right-0 -z-10">
        <img src="/assets/circle-bottom.png" alt="Background circle" class="w-full max-w-md opacity-10">
    </div>
    
    <header class="py-4 px-6">
        <ul class="flex gap-6 justify-end">
            <?php if(!auth()): ?>
            <li>
                <a href="/register" class="hover:text-blue-600">Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-blue-600">Login</a> 
            </li>
            <?php elseif(user('role') == 'admin'): ?>
            <li>
                <a href="/dashboard" class="hover:text-blue-600">Dashboard</a>
            </li>
            <?php else: ?>
            <li>
                <a href="/quiz" class="hover:text-blue-600">Quizz</a>
            </li>
            <li>
                <a href="/logout" class="hover:text-blue-600">Logout</a>
            </li>
            <?php endif; ?>
        </ul>
    </header>
    <main class="container mx-auto px-4 py-8">
        <?php echo $content; ?>
    </main>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);