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
        <div class="flex flex-wrap justify-between md:flex-column">
            @foreach($question as $questions)
                <div class="w-[45%] flex flex-col justify-between">
                    <div class="textDiv">
                        <p class="text-[20px] text-gray-500 italic">
                            Question {{ $questions->order }} of 10
                        </p>
                        <p class="text-[36px] text-[#313E51] font-bold">
                            {{ $questions->question_text }}
                        </p>
                    </div>
                    <progress class="w-full bg-white text-white w-56" value="{{ $questions->order }}"
                              max="10"></progress>
                </div>
            @endforeach
            <div class="w-[45%]">
                <form class="h-full mb-0 flex justify-between flex-col gap-8" method="POST">
                    @foreach($responses as $response)
                        <label for="response_{{ $response->id }}" class="block">
                            <input type="radio" id="response_{{ $response->id }}" name="response"
                                   value="{{ $response->response_text }}" class="hidden peer">
                            <div
                                class="flex text-[24px] items-center h-full p-5 bg-white rounded-[20px] shadow-sm hover:shadow-md border cursor-pointer transition peer-checked:bg-blue-500 peer-checked:text-white">
                                <span
                                    class="flex items-center justify-center p-5 w-6 h-6 mr-4 bg-gray-200 text-gray-700 font-bold rounded">{{ $response->order }} </span>
                                <span class="text-lg font-semibold">{{ $response->response_text }}</span>
                            </div>
                        </label>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</main>
