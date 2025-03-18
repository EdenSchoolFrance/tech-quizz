<x-guest-layout>
    <div>
        <div>
            <p>Welcome to the</p>
            <h1>Frontend Quiz!</h1>
        </div>
        <p>Pick a subject to get started</p>
    </div>
    <div>
        @foreach($quizzes as $quiz)
            <a href='quiz/{{ $quiz->id }}'><div class="flex">
                    <div class="bg-[#F6E7FF] h-8 w-1/12"></div><p>fds</p>
                </div>
            </a>

        @endforeach
    </div>


</x-guest-layout>
