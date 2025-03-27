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
    
    <?php 
    $currentPath = $_SERVER['REQUEST_URI'];
    $isAdminDashboardRoute = false;
    
    $adminRoutes = [
        '/dashboard',
        '/content/admin',
        '/quiz/*/questions',
        '/quiz/create',
        '/dashboard/user'
    ];
    
    foreach ($adminRoutes as $route) {
        $pattern = str_replace('*', '.*', $route);
        if (preg_match('#^' . $pattern . '#', $currentPath)) {
            $isAdminDashboardRoute = true;
            break;
        }
    }
    
    if(user('role') == 'admin' && $isAdminDashboardRoute): 
    ?>
    <div class="flex flex-col md:flex-row min-h-screen">
        <div class="md:hidden bg-white dark:bg-[#3B4D66] p-4 flex justify-between items-center shadow-md">
            <h1 class="text-xl font-bold text-blue-600">DashQuiz</h1>
            <button id="sidebar-toggle" class="text-gray-700 dark:text-white">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>

        <div id="sidebar" class="hidden md:flex fixed md:static inset-0 z-40 md:z-auto bg-white dark:bg-[#3B4D66] dark:text-white flex-col w-64 h-screen md:h-auto transition-all duration-300 ease-in-out">
            <div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700 md:p-6">
                <h1 class="text-xl font-bold text-blue-600">DashQuiz</h1>
                <button id="sidebar-close" class="md:hidden text-gray-700 dark:text-white">
                    <i class="fas fa-times fa-lg"></i>
                </button>
            </div>
            
            <div class="flex flex-col h-[80%] justify-between">
                <div class="py-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="/" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-blue-500 hover:text-white rounded-md mx-2">
                                <i class="fas fa-home w-5 h-5 mr-3"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-blue-500 hover:text-white rounded-md mx-2 <?= strpos($_SERVER['REQUEST_URI'], '/dashboard') === 0 && !strpos($_SERVER['REQUEST_URI'], '/dashboard/user') ? 'bg-blue-500 text-white' : '' ?>">
                                <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>
                                <span>Quiz</span>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/user" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-blue-500 hover:text-white rounded-md mx-2 <?= strpos($_SERVER['REQUEST_URI'], '/dashboard/user') === 0 ? 'bg-blue-500 text-white' : '' ?>">
                                <i class="fas fa-users w-5 h-5 mr-3"></i>
                                <span>Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="mt-auto p-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="/logout" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-red-500 hover:text-white rounded-md">
                        <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                        <span>Logout</span>
                    </a>
                    <div class="flex items-center mt-4 px-6">
                        <i class="fas fa-moon fa-lg"></i>
                        <div class="bg-purple-600 w-16 h-8 rounded-2xl p-1 mx-2 hover:cursor-pointer theme-switch flex justify-start transition-all duration-100">
                            <div class="w-6 h-6 rounded-[50%] bg-white transition-all duration-100"></div>
                        </div>
                        <i class="fas fa-sun fa-xl"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <main class="flex-grow p-4 md:p-6 md:ml-0 transition-all duration-300 overflow-auto">
            <?php echo $content; ?>
        </main>
    </div>
    <?php else: ?>
    <header class="py-8 px-6 bg-white shadow-lg flex flex-row justify-between dark:bg-[#3B4D66]">
        <ul class="flex gap-6 justify-start font-[600] text-gray-700 dark:text-white items-center">
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
                <?php if(user('role') == 'admin'): ?>
                <li>
                    <a href="/dashboard" class="aLink">Dashboard</a>
                </li>
                <?php endif; ?>
                <li>
                    <a href="/logout" class="aLink">Logout</a>
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
    <main class="w-full px-4 py-8 grow flex flex-col justify-center">
        <?php echo $content; ?>
    </main>
    <?php endif; ?>
    
    <script>
        $(document).ready(function() {
            if(localStorage.theme === 'dark' || localStorage.theme === 'light') {
                if (localStorage.theme === 'light') {
                    $('html').attr('data-theme', 'light');
                    $('.theme-switch div').addClass('translate-x-4/3');
                } else {
                    $('html').attr('data-theme', 'dark');
                }
            }
            else {
                localStorage.theme = 'light';
            }


            $('.theme-switch').on('click', function ()  {
                const theme = localStorage.theme;
                if (theme === 'dark') {
                    $('html').attr('data-theme', 'light');
                    $('.theme-switch div').addClass('translate-x-4/3');
                    localStorage.theme = 'light';
                } else {
                    $('html').attr('data-theme', 'dark');
                    $('.theme-switch div').removeClass('translate-x-4/3');
                    localStorage.theme = 'dark';
                }
            });
        });
        
        $('#sidebar-toggle').click(function() {
            $('#sidebar').removeClass('hidden');
        });
        
        $('#sidebar-close').click(function() {
            $('#sidebar').addClass('hidden');
        });
        
        $(document).click(function(event) {
            const $target = $(event.target);
            if(!$target.closest('#sidebar').length && 
               !$target.closest('#sidebar-toggle').length && 
               $('#sidebar').is(':visible') &&
               window.innerWidth < 768) {
                $('#sidebar').addClass('hidden');
            }
        });
        
        $(window).resize(function() {
            if(window.innerWidth >= 768) {
                $('#sidebar').removeClass('hidden');
            } else if(!$('#sidebar-toggle').is(':visible')) {
                $('#sidebar').addClass('hidden');
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
