@extends('layouts.quizz')
<main class="w-full min-h-screen flex justify-center items-center px-4">
    <div class="w-full max-w-6xl flex flex-col justify-between gap-8">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <img class="w-[56px] h-[56px] me-4" src="/build/assets/{{ $quizz->img_url }}" alt="Quiz Image">
                <p class="font-bold text-[#313E51] text-[28px]">{{ $quizz->title }}</p>
            </div>
            <a href="/dashboard">
                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M3.91797 2.10547C4.86328 1.16016 5.99479 0.6875 7.3125 0.6875C8.63021 0.6875 9.76172 1.16016 10.707 2.10547C11.6523 3.05078 12.125 4.18229 12.125 5.5C12.125 6.30208 11.9245 7.0612 11.5234 7.77734C11.151 8.49349 10.6354 9.06641 9.97656 9.49609C11.237 10.0404 12.2539 10.8854 13.0273 12.0312C13.8008 13.1484 14.1875 14.4089 14.1875 15.8125H12.8125C12.8125 14.2943 12.2682 13.0052 11.1797 11.9453C10.1198 10.8568 8.83073 10.3125 7.3125 10.3125C5.79427 10.3125 4.49089 10.8568 3.40234 11.9453C2.34245 13.0052 1.8125 14.2943 1.8125 15.8125H0.4375C0.4375 14.4089 0.824219 13.1484 1.59766 12.0312C2.37109 10.8854 3.38802 10.0404 4.64844 9.49609C3.98958 9.06641 3.45964 8.49349 3.05859 7.77734C2.6862 7.0612 2.5 6.30208 2.5 5.5C2.5 4.18229 2.97266 3.05078 3.91797 2.10547ZM9.71875 3.09375C9.0599 2.40625 8.25781 2.0625 7.3125 2.0625C6.36719 2.0625 5.55078 2.40625 4.86328 3.09375C4.20443 3.7526 3.875 4.55469 3.875 5.5C3.875 6.44531 4.20443 7.26172 4.86328 7.94922C5.55078 8.60807 6.36719 8.9375 7.3125 8.9375C8.25781 8.9375 9.0599 8.60807 9.71875 7.94922C10.4062 7.26172 10.75 6.44531 10.75 5.5C10.75 4.55469 10.4062 3.7526 9.71875 3.09375Z"
                            fill="#202224"/>
                </svg>
            </a>
        </div>
        <div class="flex flex-wrap justify-between">
            <div class="w-[45%] flex flex-col justify-between">
                <div class="textDiv">
                    <p class="text-[20px] text-gray-500 italic">
                        Question {{ $question->order }} of 10
                    </p>
                    <p class="text-[36px] text-[#313E51] font-bold">
                        {{ $question->question_text }}
                    </p>
                </div>
                <progress class="w-full" value="{{ $question->order }}"
                          max="10"></progress>
            </div>

            <div class="w-[45%]">
                <p class="text-red-500" id="errorMessage"></p>
                <form class="answerForm h-full mb-0 flex justify-between flex-col gap-8" method="POST">
                    <input type="hidden" id="questionId" value="{{ $question->id }}">
                    @csrf

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500"> {{ $error }}</p>
                        @endforeach
                    @endif

                    @foreach($responses as $response)
                        <label for="response_{{ $response->id }}" class="block">
                            <div class="answerDiv flex text-[24px] items-center h-full p-5 bg-white rounded-[20px] shadow-sm hover:shadow-md border cursor-pointer justify-between transition">
                                <div class="flex items-center">
                                    <span class="order flex items-center justify-center p-5 w-6 h-6 mr-4 bg-gray-200 text-gray-700 font-bold rounded">{{ $response->order }} </span>
                                    <span class="text-lg font-semibold">{{ $response->response_text }}</span>
                                </div>
                                <i class="fa-solid hidden mark fa-xmark"></i>
                                <i class="fa-solid hidden check fa-check"></i>
                                <input type="radio" id="response_{{ $response->id }}" name="response"
                                       value="{{ $response->id }}" class="response hidden">
                            </div>
                        </label>
                    @endforeach
                    <button type="submit" id="submitBtn"
                            class="bg-indigo-700 text-white p-4 rounded-[1rem] cursor-pointer"
                    >Submit answer
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const answerDivs = document.querySelectorAll('.answerDiv');

        answerDivs.forEach(div => {
            div.addEventListener('click', function () {
                const input = div.querySelector('input[type="radio"]');
                if (input.disabled) {
                    return;
                }
                answerDivs.forEach(d => d.classList.remove('active'));
                div.classList.add('active');
            });
        });

        // Sélectionner le formulaire
        const form = document.querySelector(".answerForm");

        // Ajouter un écouteur d'événement pour intercepter l'envoi du formulaire
        form.addEventListener("submit", function (e) {
            e.preventDefault(); // Empêcher l'envoi normal du formulaire

            // Récupérer les valeurs des champs
            let questionId = document.querySelector("#questionId").value;
            let selectedAnswer = document.querySelector('input[name="response"]:checked');

            if (!selectedAnswer) {
                document.getElementById('errorMessage').textContent = "Please select an answer.";
                return;
            }

            document.getElementById('errorMessage').textContent = "";

            let selectedAnswerId = selectedAnswer.value;
            let submitBtn = document.querySelector("#submitBtn");

            let currentQuestion = {{ $question->order }};

            // Créer un nouvel objet XMLHttpRequest pour envoyer une requête AJAX
            const xhr = new XMLHttpRequest();

            // Configurer la requête (type, URL et si elle est asynchrone)
            xhr.open("POST", "http://127.0.0.1:8000/api/checkAnswer", true);

            // Définir le type de contenu de la requête
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = function () {
                const response = JSON.parse(xhr.responseText);
                const correctAnswer = response.correctAnswer[0].id;

                if (correctAnswer) {
                    const allInputs = document.querySelectorAll("input.response");
                    allInputs.forEach((input) => {
                        if (input.value == correctAnswer) {
                            const check = input.closest('.answerDiv').querySelector(".check");
                            if (check) {
                                check.classList.remove("hidden");
                                check.classList.add("checkSuccess");
                            }
                        }
                    })
                }

                document.querySelectorAll('input[type="radio"]').forEach(input => {
                    input.disabled = true;
                    const div = input.closest('.answerDiv');
                    div.classList.add("disabledInputs");
                });

                let selectedInput = document.querySelector('input[name="response"]:checked');
                let answerDiv = selectedInput.closest('.answerDiv');
                let orderElement = answerDiv.querySelector('span.order');
                let check = answerDiv.querySelector(".check");
                let mark = answerDiv.querySelector(".mark");

                const parentElement = selectedInput.parentElement;

                document.querySelectorAll('.answerDiv').forEach(div => {
                    div.classList.remove('border-error');
                });

                document.querySelectorAll("span.order").forEach(order => {
                    order.classList.remove('order-error');
                })

                if (!response.success) {
                    if (selectedInput) {
                        console.log(parentElement)
                        if (parentElement) {
                            parentElement.classList.remove('active');
                            mark.classList.remove("hidden");
                            mark.classList.add("markError");
                            parentElement.classList.add('border-error');
                            orderElement.classList.add('order-error');
                        }
                    }

                    if (currentQuestion === 10) {
                        submitBtn.textContent = "Check my Score";
                        submitBtn.addEventListener("click", function () {
                            window.location.href = "/score";
                        })
                        return;
                    }
                    submitBtn.textContent = "Next Question";
                    submitBtn.addEventListener("click", function () {
                        window.location.href = `${currentQuestion + 1}`;
                    })
                    return;
                }

                parentElement.classList.remove("active");
                orderElement.classList.add('order-success');
                parentElement.classList.add('border-success');
                check.classList.add("checkSuccess");

                submitBtn.textContent = "Next Question";
                submitBtn.addEventListener("click", function () {
                    window.location.href = `${currentQuestion + 1}`;
                })

                if (currentQuestion === 10) {
                    submitBtn.textContent = "Check my score";
                    submitBtn.addEventListener("click", function () {
                        window.location.href = "/score";
                    })
                }
            };

            const data = JSON.stringify({
                questionId,
                selectedAnswerId
            })

            xhr.send(data);
        });
    });
</script>
<script src="https://kit.fontawesome.com/56470d45d0.js" crossorigin="anonymous"></script>
