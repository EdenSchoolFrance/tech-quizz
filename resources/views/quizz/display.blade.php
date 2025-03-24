@extends('layouts.quizz')
<main class="size-full flex justify-center items-center">
    <div class="w-[50%] flex justify-center">
        <div class="w-[50%]">
            <h1 class="text-5xl">Welcome to the <span class="font-bold">Frontend Quiz!</span></h1>
            <p class="mt-8 text-gray-500 italic">Pick a subject to get started.</p>
        </div>
        <div class="w-[50%]">
            @foreach ($quizzes as $quizz)
                <a href="/quizz/{{ $quizz->id }}/question/1" class="bg-white mb-4 w-[20rem] rounded-xl flex items-center p-2">
                    <img class="w-[40px] h-[40px] me-8" src="/build/assets/{{ $quizz->img_url }}">{{ $quizz->title }}
                </a>
            @endforeach
        </div>
    </div>
</main>
