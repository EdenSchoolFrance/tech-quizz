<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link rel="stylesheet" href="{{ asset('css/result.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

</body>
<body class="font-sans text-gray-900" style="background-color: #F4F6FA">
<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <img class="ellipse ellipse-1" src="{{ asset('img/ellipse1.svg') }}" alt="ellipse">
    </div>
    <div class="form">
        <h1>{{$nameQuiz}}</h1>
        <div class="flex">
            <div>
                <p class="quiz-completed">Quiz completed</p>
                <p class="you-scored">You scored...</p>
            </div>
            <div class="right">
                <div class="container-scored">
                    <p class="name-quiz">{{$nameQuiz}}</p>
                    <p class="scored">8</p>
                    <p class="out-of">out of 10</p>
                </div>
                <a href="/all" class="play-again">Play Again</a>
            </div>
        </div>
    </div>
    <div>
        <img class="ellipse ellipse-2" src="{{ asset('img/ellipse2.svg') }}" alt="ellipse">
    </div>
</div>
</body>
</html>
