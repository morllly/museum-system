@extends('layouts.admin')
@section('content')
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Экспонаты
    </h2>

    <!-- Таблица -->
    {{--<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Всего:
    </h4> --}}

    <livewire:exhibit-index />

</div>
@endsection
