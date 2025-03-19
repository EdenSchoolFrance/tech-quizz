<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— YOUR_NAME —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <header>
        <ul>
            <?php if(!auth()): ?>
            <li>
                <a href="/register">Register</a>
            </li>
            <li>
                <a href="/login">Login</a>
            </li>
            <?php else: ?>
            <li>
                <a href="/quiz">Quizz</a>
            </li>
            <li>
                <a href="/logout">Logout</a>
            </li>
            <?php endif; ?>
        </ul>
    </header>
<main>
    <?php echo $content; ?>
</main>
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);

