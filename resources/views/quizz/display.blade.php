@extends('layouts.quizz')
<main class="size-full flex justify-center items-center">
    <div class="w-[50%] flex justify-center items-center">
        <div class="w-[50%]">
            <h1>Welcome to the <span>Frontend Quiz!</span></h1>
            <p>Pick a subject to get started.</p>
        </div>
        <div class="w-[50%]">
            @foreach ($quizz as $subject)
                <a href="{{ route('quiz.start', $subject->id) }}" class="button mt-10 bg-white">
                    <img class="w-[15px] h-[15px]" src="/public/img/quizz/{{ $subject->img }}">{{ $subject->name }}
                </a>
            @endforeach
        </div>
    </div>
</main>