<div>

<!-- Вывод ошибок при импорте -->
@if($errors->any())
    <div id="alert_error" class="w-full p-4 my-6 bg-red-100 dark:bg-red-200 rounded-lg">
        <div class="flex mb-2.5">
            <div class="flex text-red-700 dark:text-red-800">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="-mt-0.5">
                    <span class="text-sm font-medium">Внимательно проверьте загружаемый файл:</span>
                </div>
            </div>
            <button id="close_alert_error"
                wire:click="close"
                type="button" class="ml-auto -mx-1.5 -my-1.5 duration-200 bg-red-100 hover:bg-red-200 text-red-500 rounded-lg focus:ring-2 p-1.5  inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="toast-default" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

        <ol class="text-xs ml-8 text-red-700 dark:text-red-800">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
        </ol>
    </div>

    <script>
        document.getElementById('close_alert_error').onclick = function() {
            document.getElementById('alert_error').style.display = 'none';
        }
    </script>
@endif

<!-- Уведомление при успешной операции -->
@if(session()->get('success'))
    <div id="alert_success" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ session()->get('success') }}
            </div>
        <button id="close_alert_success" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>

    <script>
        document.getElementById('close_alert_success').onclick = function() {
            document.getElementById('alert_success').style.display = 'none';
        }
    </script>
@endif

<div class="flex justify-between mb-8 mt-3">

    <div class="flex">
        <!-- Кнопка Добавить -->
        <form action="{{ route('admin.exhibits.create') }}" class="pr-6">
            <button
                    class="flex h-full items-center justify-between px-4 py-2 text-sm font-medium leading-5 bg-transparent text-purple-600 border border-purple-600 rounded-lg transition-colors duration-150 active:bg-purple-800 hover:bg-purple-700 hover:text-white focus:outline-none focus:shadow-outline-purple">
                Добавить
                <span class="ml-2 pl-4" aria-hidden="true">+</span>
            </button>
        </form>

        <!-- Фильтр Количество выведенных записей -->
        <select
            wire:model="displayedRecords"
            id="displayed records"
            class="block mr-4 pl-2 pr-8 py-2 w-auto text-sm text-gray-500  dark:text-gray-300 bg-gray-50 rounded-lg border border-purple-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
            <ul class="py-1 text-sm" aria-labelledby="displayed records">
                <option class="hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    value="10">10
                </option>
                <option class="hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    value="25">25
                </option>
                <option class="hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    value="50">50
                </option>
            </ul>
        </select>
    </div>

    <div class="flex">

        <!-- Фильтр Коллекция -->
        <select
            wire:model="filterCollection"
            id="dropdownCollection"
            class="block mr-4 pl-6 pr-8 py-2 w-auto text-sm text-gray-500 dark:text-gray-300 bg-gray-50 rounded-lg border border-purple-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">

            <option value="" default>Коллекция</option>
            @foreach ($collections as $collection)
                <ul class="py-1 text-sm" aria-labelledby="dropdownCollection">
                    <option class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        value="{{ $collection->id }}">{{ $collection->title }}
                    </option>
                </ul>
            @endforeach
        </select>

        <!-- Фильтр Ключевое слово -->
        <select
            wire:model="filterKeyword"
            id="dropdownKeyword"
            class="block mr-4 pl-6 pr-9 py-2 w-auto text-sm border-purple-300 text-gray-500 dark:text-gray-300 bg-gray-50 rounded-lg border  focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">

            <option value="" default>Ключевое слово</option>
            @foreach ($keywords as $keyword)
                <ul class="py-1 text-sm" aria-labelledby="dropdownKeyword">
                    <option class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        value="{{ $keyword->id }}">{{ $keyword->title }}
                    </option>
                </ul>
            @endforeach
        </select>

        <!-- Поиск -->
        <form class="flex items-center">
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-purple-500 dark:text-purple-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input
                    wire:model="search" value=""
                    type="text" id="simple-search" class="bg-gray-50 border border-purple-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Поиск...">
            </div>
        </form>

    </div>

</div>

@if($countSelected != null)
    <p class="text-xs -mt-3 mb-3 text-gray-600 dark:text-gray-400">
        Выделено экспонатов: <strong>{{ $countSelected }}</strong>
    </p>
@endif

<!-- Таблица -->
<div class="w-full overflow-hidden rounded-lg shadow-xs mb-10">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-400 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <label
                                class="flex items-center dark:text-gray-400">
                              <input
                                    wire:model="selectAllRows"
                                    type="checkbox"
                                    class="border-gray-300 text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                />
                              </span>
                            </label>
                        </div>
                    </th>
                    <th class="px-4 py-3">Наименование</th>
                    <th class="px-4 py-3">Инвентарный номер</th>
                    <th class="px-4 py-3">Коллекция</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @foreach ($exhibits as $exhibit)

                    <tr class="text-gray-700 dark:text-gray-400 transition-colors hover:bg-gray-100 dark:hover:bg-gray-700">

                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <label for="{{ $exhibit->id }}" class="flex items-center dark:text-gray-400">
                                    <input
                                        wire:model="selectRow"
                                        value="{{ $exhibit->id }}"
                                        id="{{ $exhibit->id }}"
                                        type="checkbox"
                                        class="border-gray-300 text-purple-600 form-checkbox dark:placeholder-gray-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    />
                                  </span>
                                </label>
                            </div>
                        </td>

                        <td
                            wire:click="show({{ $exhibit->id }})"
                            class="px-4 py-3" id="show" style="cursor: pointer">
                            <div class="flex items-center text-sm">
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="{{ asset('storage/images/'.$exhibit->image) }}"
                                        onerror="this.src='../img/photo.jpg';"
                                        loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                        aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">{{ $exhibit->title }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ $exhibit->keyword->title }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td
                            wire:click="show({{ $exhibit->id }})"
                            class="px-4 py-3 text-sm" id="show" style="cursor: pointer">
                            {{ $exhibit->inventory_number }}
                        </td>

                        <td
                            wire:click="show({{ $exhibit->id }})"
                            class="px-4 py-3 text-xs" id="show" style="cursor: pointer">
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-white dark:bg-orange-600">
                                {{ $exhibit->collection->title }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex place-content-end text-sm">

                                <!-- Кнопка редактирования -->
                                <a href="{{ route('admin.exhibits.edit', $exhibit->id) }}"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray transition-colors hover:text-purple-800 dark:hover:text-gray-200"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>

                                <!-- Кнопка удаления -->
                                <a wire:click="confirmDeletion({{ $exhibit->id }})"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray transition-colors hover:text-purple-800 dark:hover:text-gray-200"
                                    aria-label="Delete" style="cursor: pointer">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>

                            </div>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>

        <!-- Массовое удаление -->
        @if($selectRow != [])
            <div
            class="px-3.5 py-3 border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <button
                    wire:click="confirmDeletionSelected"
                    class="flex items-center justify-betweentext-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray transition-colors hover:text-purple-800 dark:hover:text-gray-200"
                    aria-label="Delete" style="cursor: pointer">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @else
            <div style="transition: 0.3s"></div>
        @endif

        <!-- Пагинация -->
        {{ $exhibits->links('livewire.pagination-links') }}

        <!-- Модальное окно Подтверждение массового удаления -->
        @if($confirmDeletionSelected)
            @include('components.modal-deleteSelected')
        @endif

        <!-- Модальное окно Подтверждение удаления -->
        @if($confirmDeletion)
            @include('components.modal-delete')
        @endif

        <!-- Модальное окно Вывод информации -->
        @if($showInfo)
            @include('components.modal-show')
        @endif

    </div>
</div>

<div class="flex mb-12" id="export_import">

    <!-- Кнопка Экспорт -->
    <div class="mr-4">
        <button
            wire:click.prevent="export"
            class="flex items-center justify-between px-4 py-2.5 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            <span>Экспорт</span>
        </button>
    </div>

    <!-- Кнопка Импорт -->
    <form action="exhibits/import" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="relative flex">
            <input
                type="file"
                accept=".xlsx,.xls,.csv"
                class="border-purple-400 pr-4 focus:outline-none focus:shadow-outline-purple block w-full text-xs overflow-hidden cursor-pointer border text-gray-600 bg-gray-50 rounded-l-md focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                aria-describedby="view_model_avatar_help" id="view_model_avatar" name="exhibit_file"
                required>

            <div>
                <button type="submit"
                    class="flex items-center p-2.5 justify-between -ml-1 inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span>Импорт</span>
                </button>
            </div>
        </div>
    </form>
</div>

</div>
