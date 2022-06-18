@extends('layouts.admin')
@section('content')

<div class="container px-6 mx-auto grid">
    <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Рабочий стол
    </h2>

    <!-- Карточки -->
    <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-8">

        <!-- Количество экспонатов -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg
                    class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <p
                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Экспонаты
                </p>
                <p
                class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $sumExhibits }}
                </p>
            </div>
        </div>


        <!-- Количество коллекций -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Коллекции
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $sumCollections }}
                </p>
            </div>
        </div>


        <div class="col-span-2 flex items-center min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
            <div
                class="p-3 mr-4 text-purple-500 bg-white rounded-full dark:bg-gray-800 dark:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <p>
                С помощью АИС вы можете добавлять, редактировать, просматривать и удалять данные об экспонатах.
            </p>
        </div>


        <div class="col-span-2 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Возможности
            </h4>
            <div class="mb-2 text-gray-600 dark:text-gray-400">
                • При работе с базой данных вы можете осуществлять фильтрацию по коллекциям и ключевым словам,
                а также поиск по всем полям, в том числе и скрытым.
            </div>
            <div class="mb-2 text-gray-600 dark:text-gray-400">
                • На одной странице можно отображать одновременно 10/25/50 записей.
            </div>
            <div class="mb-2 text-gray-600 dark:text-gray-400">
                • Возможно массовое удаление, для активации функции необходимо выбрать, как минимум, один экспонат.
            </div>
            <div class="px-5 mt-7 mb-5">
                <img
                    src="{{ asset('img/data_points.svg') }}"/>
            </div>

        </div>

        <div class="col-span-2 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Импорт и экспорт
            </h4>
            <div class="mb-2 text-gray-600 dark:text-gray-400">
                Функция импорта позволяет быстро и удобно загружать данные об экспонатах из Excel в базу данных.
                Чтобы операция прошла успешно, файл должен быть без заголовков и соответствовать правилам валидации,
                а также учитывать расположение колонок. Пример корректно заполненной таблицы можно скачать
                <a href="" class="text-purple-600 hover:text-purple-800">здесь</a>.
            </div>
            <div class="text-gray-600 dark:text-gray-400">
                Осуществлять экспорт можно как всей базы в целом, так и отдельно выбранных экспанатов.
            </div>
            <div class="px-10 my-5">
                <img
                    src="{{ asset('img/import_excel.svg') }}"/>
            </div>
            <a class="flex items-center justify-between px-4 py-2 mb-2 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="{{ route('admin.exhibits.index').'#export_import' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>Начать</span>
                </div>
                <span>Клик &RightArrow;</span>
            </a>
        </div>

    </div>
































</div>

@endsection
