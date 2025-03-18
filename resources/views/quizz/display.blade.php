@extends('layouts.quizz')
<main class="size-full flex justify-center items-center">
    <div class="w-[50%] flex justify-center items-center">
        <div class="w-[50%]">
            <h1>Welcome to the <span>Frontend Quiz!</span></h1>
            <p>Pick a subject to get started.</p>
        </div>
        <div class="w-[50%]">
            @foreach ($quizzes as $quizz)
                <a href="/quizz/{{ $quizz->id }}" class="bg-white my-4 w-[20rem] rounded-xl flex items-center p-2">
                    <img class="w-[40px] h-[40px] me-8" src="/build/assets/{{ $quizz->img_url }}">{{ $quizz->title }}
                </a>
            @endforeach
        </div>
    </div>
</main>
