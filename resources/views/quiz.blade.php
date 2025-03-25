<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="{{asset("css/quiz.css")}}">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
        rel="stylesheet"
    />
</head>
<body class="font-sans text-gray-900" style="background-color: #F4F6FA">
<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <img class="ellipse ellipse-1" src="{{ asset('img/ellipse1.svg') }}" alt="ellipse">
    </div>

    <div class="form">
        <a href="/dashboard"  class="account-icon">
            <i class="ri-account-circle-fill"></i>
        </a>

        <div class="container">
            <div class="first-div">
                <h1>Welcome to the <span class="bold">Front-end Quiz !</span></h1>
                <p class="second-text">pick a subject to get started</p>
            </div>

            <div class="second-div">
                @foreach($quizzes as $quiz)

                    <a href="/quiz/{{$quiz->id_quiz}}/1" class="quiz-button">
                        <p>{{ $quiz->name_quiz }}</p>

                    </a>

                @endforeach
            </div>
        </div>

    </div>

    <div>
        <img class="ellipse ellipse-2" src="{{ asset('img/ellipse2.svg') }}" alt="ellipse">
    </div>
</div>
</body>

</html>

