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

    <form action="{{ route('admin.exhibits.create') }}" class="pr-6 mb-6 mt-3">
        <button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 bg-transparent text-purple-600 border border-purple-600 rounded-lg transition-colors duration-150 active:bg-purple-800 hover:bg-purple-700 hover:text-white focus:outline-none focus:shadow-outline-purple"
        >
            Добавить
            <span class="ml-2 pl-4" aria-hidden="true">+</span>
        </button>
    </form>

    <livewire:exhibit-index />

</div>
@endsection
