<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link
            href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
            rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900" style="background-color: #F4F6FA">
<div class="min-h-screen flex flex-col justify-center items-center sm:pt-0 bg-gray-100">
    <a href="/dashboard" class="fixed normal"><i class="ri-user-line dashboard"></i></a>
    <div>
        <img class="ellipse ellipse-1" src="{{ asset('img/ellipse1.svg') }}" alt="ellipse">
    </div>
    <div class=" flex flex-col justify-center items-center w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg form">
        <img style="z-index: 200;" src="{{ asset('img/404.png') }}" alt="profile">
        <h1>Looks like you've got lost...</h1>
        <a href="{{ url('/') }}"><button type="button" class="button">Back to home</button></a>
    </div>
    <div>
        <img class="ellipse ellipse-2" src="{{ asset('img/ellipse2.svg') }}" alt="ellipse">
    </div>
</div>
</body>
</html>