@vite(['resources/css/app.css', 'resources/css/style.css'])
<x-guest-layout>
    <div class="flex p-10 flex-col items-center">
        <img src="/build/assets/img/404.svg" alt="404 image">
        <p class="errorMessage font-[700] text-[25px] mt-[4rem]">Looks like you've got lost...</p>
        <button class="btn404 w-full p-3 rounded-md text-white mt-[2rem]">Back to home</button>
    </div>
</x-guest-layout>
