<!DOCTYPE html>
<html lang="fr" data-theme="dark" class="font-rubik">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— TechQuiz —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>

<body class="min-h-screen bg-[#F4F6FB] relative flex flex-col dark:bg-[#313E51] dark:text-neutral-50">
    <div class="absolute top-0 left-0 -z-10">
        <img src="/assets/circle-top.png" alt="Background circle" class="w-full max-w-md opacity-10">
    </div>
    
    <div class="absolute bottom-0 right-0 -z-10">
        <img src="/assets/circle-bottom.png" alt="Background circle" class="w-full max-w-md opacity-10">
    </div>
    
    <header class="py-8 px-6 bg-white shadow-lg flex flex-row justify-between">
        <ul class="flex gap-6 justify-start font-[600] text-gray-700 items-center">
            <?php if(!auth()): ?>
            <li>
                <a href="/register" class="aLink">Register</a>
            </li>
            <li>
                <a href="/login" class="aLink">Login</a>
            </li>
            <?php else: ?>
                <li>
                    <a href="/quiz" class="aLink">Quiz</a>
                </li>
                <li>
                    <a href="/result" class="aLink">Result</a>
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
        <div class="flex flex-row items-center">
            <i class="fas fa-moon fa-lg" ></i>
            <div class="bg-purple-600 w-16 h-8 rounded-2xl p-1 mx-2 hover:cursor-pointer theme-switch flex justify-start transition-all duration-100">
                <div class="w-6 h-6 rounded-[50%] bg-white transition-all duration-100"></div>
            </div>
            <i class="fas fa-sun fa-xl" ></i>
        </div>
    </header>
    <main class=" w-full px-4 py-8 grow flex flex-col justify-center">
        <?php echo $content; ?>
    </main>
    <script>
        $('.theme-switch').click(function() {
            console.log('hello')
            const theme = $('html').attr('data-theme');
            if (theme === 'dark') {
                $('html').attr('data-theme', 'light');
            } else {
                $('html').attr('data-theme', 'dark');
            }
            if($('.theme-switch').hasClass('justify-start')) {
                $('.theme-switch').removeClass('justify-start');
                $('.theme-switch').addClass('justify-end');
            } else {
                $('.theme-switch').removeClass('justify-end');
                $('.theme-switch').addClass('justify-start');
            }
        });
    </script>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
?>

