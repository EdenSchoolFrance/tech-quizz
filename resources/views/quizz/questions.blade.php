@extends('layouts.quizz')

<main class="w-full min-h-screen flex justify-center items-center px-4">
    <div class="w-full max-w-6xl flex flex-col md:flex-row justify-between gap-8">
        <div class="w-full flex flex-col justify-between md:w-1/2">
            <div class="flex items-center mb-6">
                <img class="w-[56px] h-[56px] me-4" src="/build/assets/{{ $quizz->img_url }}" alt="Quiz Image">
                <p class="font-bold text-[#313E51] text-[28px]">{{ $quizz->title }}</p>
            </div>
            @foreach($question as $questions)
                <p class="mt-[5rem] text-[20px] text-gray-500 italic">
                    Question {{ $questions->order }} of 10
                </p>
                <p class="text-[36px] text-[#313E51] font-bold">
                    {{ $questions->question_text }}
                </p>
                <progress value="{{ $questions->id }}" max="10"></progress>
            @endforeach
        </div>
        <div class="w-full md:w-1/2">
            <form class="h-full mb-0 flex justify-between flex-col" method="POST">
                @foreach($responses as $response)
                    <label for="response_{{ $response->id }}" class="block">
                        <input type="radio" id="response_{{ $response->id }}" name="response"
                               value="{{ $response->response_text }}" class="hidden peer">
                        <div class="flex text-[24px] items-center p-6 mt-4 bg-white rounded-lg shadow-sm hover:shadow-md border cursor-pointer transition peer-checked:bg-blue-100">
                            <span class="flex items-center justify-center p-5 w-6 h-6 mr-4 bg-gray-200 text-gray-700 font-bold rounded">{{ $response->id }} </span>
                            <span class="text-lg font-semibold text-gray-800">{{ $response->response_text }}</span>
                        </div>
                    </label>
                @endforeach
            </form>
        </div>

    </div>
</main>
