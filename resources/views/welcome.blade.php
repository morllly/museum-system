<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Система учета музейных фондов</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="h-screen flex bg-gray-50 dark:bg-gray-800">

        <div class="flex self-center container px-6 py-16 mx-auto">
            <div class="items-center lg:flex mx-16">
                <div class="flex justify-end w-full lg:w-1/2">
                    <div class="lg:max-w-lg">
                        <h1 class="text-2xl font-semibold text-gray-800 uppercase dark:text-white lg:text-3xl">
                            Автоматизированная информационная <br>система
                        </h1>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            учета музейных фондов Ембаевского сельского музея
                        </p>
                        <a class="flex max-w-xs items-center justify-between px-4 py-2 mt-10 mb-2 text-sm font-semibold text-purple-100 bg-purple-600 hover:bg-purple-700 active:br-purple-800 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                            href="{{ route('login') }}">
                            <div class="flex items-center">
                                <span>Приступить</span>
                            </div>
                            <span>&RightArrow;</span>
                        </a>
                    </div>
                </div>

                <div class="flex items-center justify-center w-full ml-5 mt-6 lg:mt-0 lg:w-1/2">
                    <img class="w-full h-full lg:max-w-2xl"
                    src="{{ asset('img/hero.svg') }}">
                </div>
            </div>
        </div>


<script src="{{ asset("js/app.js") }}" defer></script>
</body>
</html>
