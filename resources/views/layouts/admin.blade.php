<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Система учета музейных фондов</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}"/>
    @livewireStyles
</head>
<body>
<div
        class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen }"
        id="html">

    <!-- Меню -->
    @include('includes.desktop-sidebar')

    <!-- Мобильное мюню -->
    @include('includes.mobile-sidebar')

    <div class="flex flex-col flex-1 w-full ">
        @include('includes.header')
        <main class="h-full overflow-y-auto bg-gray-50 dark:bg-gray-900"">
            @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset("js/app.js") }}" defer></script>
<script src="{{ asset("assets/js/alpine.min.js") }}" defer></script>
<script src="{{ asset("assets/js/init-alpine.js") }}"></script>
@livewireScripts
</body>
</html>
