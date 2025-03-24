@vite(['resources/css/app.css', 'resources/css/style.css'])
@extends("layouts.quizz")
<div class="h-full flex items-center">
    <div class="bg-white w-[30%] rounded-lg shadow-md mx-auto flex p-10 flex-col items-center">
        <div>
            <img src="/build/assets/img/404.svg" alt="404 image">
            <p class="errorMessage text-center text font-[700] text-[28px] mt-[4rem] mb-[2rem]">Looks like you've got lost...</p>
            <a href="/" class="inline-block text-[18px] btn404 w-full p-3 rounded-md text-white text-center">Back to home</a>
        </div>
    </div>
</div>
