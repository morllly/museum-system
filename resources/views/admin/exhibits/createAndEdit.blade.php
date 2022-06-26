@extends('layouts.admin')

@section('title', isset($exhibit) ? 'Редактирование данных об экспонате' : 'Добавление экспоната')
@section('content')

<div class="container grid px-12 py-10 mx-auto">

    <!-- Кнопка Назад -->
    <div class="flex flex-row mb-5 mt-3">
        <a href="{{ route('admin.exhibits.index') }}"
                class="flex items-center justify-between px-3 py-2 text-sm font-medium leading-5 bg-transparent text-purple-600 border border-purple-600 rounded-lg transition-colors duration-150 active:bg-purple-800 hover:bg-purple-700 hover:text-white focus:outline-none focus:shadow-outline-purple">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
            </svg>
        </a>

        <h4 class="ml-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            {{ isset($exhibit) ? 'Редактирование' : 'Добавление' }} данных об экспонате
        </h4>
    </div>

    <div class="px-8 py-10 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <form method="POST" enctype="multipart/form-data" action="{{ isset($exhibit) ? route('admin.exhibits.update', $exhibit->id) : route('admin.exhibits.store') }}">
        @csrf
        @if(isset($exhibit))
            @method('PUT')
        @endif

            <div class="grid gap-6 mb-6 lg:grid-cols-2">

                <!-- Инвентарный номер -->
                <div>
                    <label for="inventory_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Инвентарный номер
                    </label>
                    <input type="text" name="inventory_number" id="inventory_number" class="bg-white border border-gray-300
                        @error('inventory_number') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror
                        text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                        placeholder="ЕМ. КП 1/1 ОФ. Э.1"
                        value="{{ isset($exhibit) ? $exhibit->inventory_number : old('inventory_number') }}">

                    @error('inventory_number')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Наименование -->
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Наименование
                    </label>
                    <input type="text" name="title" id="title" class="bg-white border border-gray-300
                        @error('title') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror
                        text-gray-900 text-sm rounded-lg focus:rin-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                        placeholder="Маслобойка"
                        value="{{ isset($exhibit) ? $exhibit->title : old('title') }}">

                    @error('title')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="grid grid-cols-6 gap-6 mb-6">

                <!-- Коллекция -->
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="collection_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        Коллекция
                    </label>
                    <select name="collection_id" id="collection_id" class="bg-white border border-gray-300
                        @error('collection_id') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror
                        text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
                        <option selected disabled hidden>Выберите...</option>

                        @if (isset($exhibit))
                            @foreach ($collections as $collection)
                                <option value="{{ $collection->id }}" {{ $exhibit->collection_id == $collection->id ? 'selected' : '' }}>{{ $collection->title }}</option>
                            @endforeach
                        @else
                            @foreach ($collections as $collection)
                                <option value="{{ $collection->id }}">{{ $collection->title }}</option>
                            @endforeach
                        @endif

                    </select>

                    @error('collection_id')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Ключевое слово-->
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="keyword_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        Ключевое слово
                    </label>
                    <select name="keyword_id" id="keyword_id" class="bg-white border border-gray-300
                        @error('keyword_id') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror
                        text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
                        <option selected disabled hidden>Выберите...</option>

                        @if (isset($exhibit))
                            @foreach ($keywords as $keyword)
                                <option value="{{ $keyword->id }}" {{ $exhibit->keyword_id == $keyword->id ? 'selected' : '' }}>{{ $keyword->title }}</option>
                            @endforeach
                        @else
                            @foreach ($keywords as $keyword)
                                <option value="{{ $keyword->id }}">{{ $keyword->title }}</option>
                            @endforeach
                        @endif

                    </select>

                    @error('keyword_id')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Дата поступления -->
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="receipt_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Дата поступления
                    </label>
                    <input name="receipt_date" type="date" id="receipt_date" class="bg-white border border-gray-300
                        @error('receipt_date') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror
                        text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                        value="{{ isset($exhibit) ? $exhibit->receipt_date : old('receipt_date') }}">

                    @error('receipt_date')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Способ поступления-->
            <div class="mb-6">
                <label for="entry_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Способ поступления</label>
                <textarea name="entry_method" id="entry_method" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500
                    @error('entry_method') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror "
                    placeholder="Начните писать..."
                    >{{ isset($exhibit) ? $exhibit->entry_method : old('entry_method') }}</textarea>

                    @error('entry_method')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
            </div>

            <!-- Автор, изготовитель -->
            <div class="mb-6">
                <label for="creator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Автор, изготовитель
                </label>
                <input name="creator" type="text" id="creator" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500
                    @error('creator') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror"
                    placeholder="Не установлен"
                    value="{{ isset($exhibit) ? $exhibit->creator : old('creator') }}">

                    @error('creator')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
            </div>

            <!-- Время создания -->
            <div class="mb-6">
                <label for="creation_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Время создания
                </label>
                <input name="creation_time" type="text" id="creation_time" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500
                    @error('creation_time') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror "
                    placeholder="Начало ХХ века"
                    value="{{ isset($exhibit) ? $exhibit->creation_time : old('creation_time') }}">

                    @error('creation_time')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
            </div>

            <!-- Характеристики -->
            <div class="mb-6">
                <label for="characteristics" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Характеристики</label>
                <textarea name="characteristics" id="characteristics" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500
                    @error('characteristics') border-red-600  focus:border-red-400 dark:border-red-600 @enderror "
                    placeholder="Размер, материал, техника..."
                    >{{ isset($exhibit) ? $exhibit->characteristics : old('characteristics') }}</textarea>

                    @error('characteristics')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
            </div>

            <!-- Краткое описание -->
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Описание</label>
                <textarea name="description" id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500
                    @error('description') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror "
                    placeholder="Начните писать..."
                    >{{ isset($exhibit) ? $exhibit->description : old('description') }}</textarea>

                    @error('description')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
            </div>

            <!-- Сохранность -->
            <div class="mb-6">
                <label for="safety" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Сохранность
                </label>
                <input name="safety" type="text" id="safety" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500
                    @error('safety') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror "
                    placeholder="В сохранности"
                    value="{{ isset($exhibit) ? $exhibit->safety : old('safety') }}">

                    @error('safety')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
            </div>

            <!-- Изображение -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Изображение
                </label>
                <div class="relative">
                  <input
                    accept=".jpeg,.jpg,.png"
                    class="border-gray-300 focus:ring-purple-600 block w-full overflow-hidden cursor-pointer border text-gray-500 text-sm bg-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400
                    @error('image') border-red-600  focus:border-red-400 dark:border-red-600  dark:focus:border-red-400 @enderror "
                    aria-describedby="view_model_avatar_help" id="view_model_avatar" name="image" type="file"
                    value="{{ isset($exhibit) ? $exhibit->image : old('image') }}">
                </div>

                @error('image')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                @enderror
            </div>

            @if(isset($exhibit) && $exhibit->image)
                <div class="max-w-xs overflow-hidden rounded-lg mb-6">
                    <img class="object-cover w-full h-60"
                        src="{{ asset('storage/images/'.$exhibit->image) }}"/>
                </div>
            @endif


            <!-- Отправить форму -->
            <button type="submit" class="my-3 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                Сохранить
            </button>
        </form>
    </div>
</div>

@endsection
