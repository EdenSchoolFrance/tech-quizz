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
            <li>
                <a href="login.php">Register</a>
            </li>
            <li>
                <a href="register.php">Login</a>
            </li>
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

