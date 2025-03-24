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
        <?php
        function debug($param){
            echo "<pre style='background-color: lightgray'>";
            var_dump($param);
            echo "</pre>";
        }
        debug($quiz);
        debug($nameQuiz);
        ?>
        <h1>{{ $nameQuiz }}</h1>
        <div>
            <p>Question {{ $quiz['nb_question'] }} of 10 </p>
            <h2>{{ $quiz['name_question'] }}</h2>

            <input type="range" name="range" min="0" max="10" value="{{ $quiz['nb_question'] }}">
        </div>
        <div>
            <form action="/quiz/{{ $quiz['id_quiz'] }}/{{ $quiz['nb_question'] }}/result">
                <div>
                    <label for="f_answer">{{ $quiz['f_answer'] }}</label>
                    <input type="radio" name="answer" id="f_answer" class="hidden">
                </div>
                <div>
                    <label for="s_answer">{{ $quiz['s_answer'] }}</label>
                    <input type="radio" name="answer" id="s_answer" class="hidden">
                </div>
                <div>
                    <label for="t_answer">{{ $quiz['t_answer'] }}</label>
                    <input type="radio" name="answer" id="t_answer" class="hidden">
                </div>
                <div>
                    <label for="fth-answer">{{ $quiz['fth-answer'] }}</label>
                    <input type="radio" name="answer" id="fth-answer" class="hidden">
                </div>
                <input type="submit" value="Submit Answer">
            </form>
        </div>


    </div>
    <div>
        <img class="ellipse ellipse-2" src="{{ asset('img/ellipse2.svg') }}" alt="ellipse">
    </div>
</div>
</body>
</html>

