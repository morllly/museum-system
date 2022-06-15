<div>

<div class="flex justify-between mb-8 mt-3">

    <div class="flex">
    <!-- Кнопка Добавить -->
        <form action="{{ route('admin.exhibits.create') }}" class="pr-6">
            <button
                    class="flex h-full items-center justify-between px-4 py-2 text-sm font-medium leading-5 bg-transparent text-purple-600 border border-purple-600 rounded-lg transition-colors duration-150 active:bg-purple-800 hover:bg-purple-700 hover:text-white focus:outline-none focus:shadow-outline-purple"
            >
                Добавить
                <span class="ml-2 pl-4" aria-hidden="true">+</span>
            </button>
        </form>

        Выделено экспонатов: <strong></strong>
    </div>

    <div class="flex">

        <!-- Фильтр Коллекция -->
        <select
            wire:model="filterCollection"
            id="dropdownCollection"
            class="block mr-4 pl-6 pr-8 py-2 w-auto text-sm text-gray-500  dark:text-gray-300 bg-gray-50 rounded-lg border border-purple-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">

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
            class="block mr-4 pl-6 pr-9 p-2 w-auto text-sm border-purple-300 text-gray-500 dark:text-gray-300 bg-gray-50 rounded-lg border  focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">

            <option value="" default>Ключевое слово</option>
            @foreach ($keywords as $keyword)
                    <option class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        value="{{ $keyword->id }}">{{ $keyword->title }}
                    </option>
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

<!-- Таблица -->
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <label
                                class="flex items-center dark:text-gray-400">
                              <input
                                    wire:model="selectAllRows"
                                    type="checkbox"
                                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
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
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
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
                                        alt="" loading="lazy" />
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

        <!-- Подтверждение массового удаления -->
        @if($confirmDeletionSelected)
            @include('components.modal-deleteSelected')
        @endif

        <!-- Подтверждение удаления -->
        @if($confirmDeletion)
            @include('components.modal-delete')
        @endif

        <!-- Вывод информации -->
        @if($showInfo)
            @include('components.modal-show')
        @endif

    </div>
</div>

<div class="flex mt-10">
    <div class="mr-5">
        <button
            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            <span>Импорт</span>
        </button>
    </div>

    <div class="mr-4">
        <button
            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            <span>Экспорт</span>
        </button>
    </div>
</div>

</div>
