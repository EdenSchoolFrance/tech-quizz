<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— TechQuiz —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="min-h-screen bg-[#F4F6FB] relative flex flex-col">
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
                <a href="/register" class="aLink">Register</a>
            </li>
            <li>
                <a href="/login" class="aLink">Login</a>
            </li>
            <?php else: ?>
                <li>
                    <a href="/quiz" class="aLink">Quizz</a>
                </li>
                <li>
                    <a href="/logout" class="aLink">Logout</a>
                </li>
            <?php endif; ?>
            <?php if(user('role') == 'admin'): ?>
            <li>
                <a href="/dashboard" class="aLink">Dashboard</a>
            </li>
            <?php endif; ?>

        </ul>
    </header>
    <main class="container mx-auto px-4 py-8 grow flex flex-col justify-center">
        <?php echo $content; ?>
    </main>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
?>