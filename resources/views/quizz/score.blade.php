@extends('layouts.quizz')
<main class="my-20 mx-72">
    <div class="flex justify-between">
        <div class="flex items-center">
            <img src="/build/assets/img/quizz/accessibility.svg"
                 alt="quizz icon"
                 class="me-4">
            <p class="font-rubik text-[22px] font-[500]">Accessibility</p>
        </div>
        <div>
            <a href="/dashboard"><img src="/build/assets/img/quizz/accountIcon.svg"
                                      alt=""></a>
        </div>
    </div>

    <div class="flex justify-between mt-24">
        <div>
            <p class="font-rubik font-[300] text-[60px]">Quiz completed</p>
            <p class="font-rubik font-[500] text-[60px] -mt-6">You scored...</p>
        </div>

        <div class="">
            <div class="py-12 bg-white w-[560px] flex flex-col items-center rounded-[24px] mb-6">
                <div class="flex items-center">
                    <img src="/build/assets/img/quizz/accessibility.svg"
                         alt="quizz icon"
                         class="me-4">
                    <p class="font-rubik text-[22px] font-[500]">Accessibility</p>
                </div>

                <p class="font-[500] text-[122px] font-rubik text-deepl-blue h-40 mt-4">{{ $score }}</p>
                <p class="font-rubik text-deep-grey text-[20px]">out of 10</p>
            </div>

            <a href="/quizzes">
                <div class="bg-purple text-center py-6 rounded-[24px]">
                    <p class="font-rubik text-white text-[22px]">Play again</p>
                </div>
            </a>
        </div>
    </div>
</main>
