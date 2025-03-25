{{ var_dump($_POST) }}
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
        <h1>{{ $nameQuiz }}</h1>
        <div>
            <p>Question {{ $quiz['nb_question'] }} of 10 </p>
            <h2>{{ $quiz['name_question'] }}</h2>

            <input type="range" name="range" min="0" max="10" value="{{ $quiz['nb_question'] }}" disabled>
        </div>
        <div>
            <form action="" method="post">
                @csrf
                <div class="input">
                    <label for="f_answer">{{ $quiz['f_answer'] }}</label>
                    <input class="hidden" type="radio" name="answer" id="f_answer" value="{{ $quiz['f_answer'] }}">
                </div>
                <div class="input">
                    <label for="s_answer">{{ $quiz['s_answer'] }}</label>
                    <input class="hidden" type="radio" name="answer" id="s_answer" value="{{ $quiz['s_answer'] }}">
                </div>
                <div class="input">
                    <label for="t_answer">{{ $quiz['t_answer'] }}</label>
                    <input class="hidden" type="radio" name="answer" id="t_answer" value="{{ $quiz['t_answer'] }}">
                </div>
                <div class="input">
                    <label for="fth-answer">{{ $quiz['fth-answer'] }}</label>
                    <input class="hidden" type="radio" name="answer" id="fth-answer" value="{{ $quiz['fth-answer'] }}">
                </div>
                <input type="hidden" id="goodAnswer" value="{{ $quiz['real_answer'] }}">
                <input class="button" type="submit" value="Submit Answer">
            </form>
        </div>


    </div>
    <div>
        <img class="ellipse ellipse-2" src="{{ asset('img/ellipse2.svg') }}" alt="ellipse">
    </div>
</div>
<script>
    document.querySelector('form').addEventListener('submit', (e) => {
        e.preventDefault();

        const selectedAnswer = document.querySelector('input[name="answer"]:checked').value;
        const goodAnswer = document.querySelector('#goodAnswer').value;
        if (selectedAnswer === goodAnswer) {
            console.log('good answer')
        } else {
            console.log('bad answer')
        }
    })
</script>

</body>
</html>

