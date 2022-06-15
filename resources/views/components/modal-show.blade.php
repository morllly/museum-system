<div
    wire:model='exhibitInfo'
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-30 sm:items-center sm:justify-center">

    <div class="w-full px-5 py-5 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">

        <header class="flex justify-end z-50">
            <button
                wire:click="close"
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close">
                <svg class="w-4 h-4 z-50" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>

        <div class="flex flex-col xl:flex-row w-full -mt-5 bg-white rounded-lg overflow-hidden dark:bg-gray-800">

            <div class="relative p-4">
                <p class="font-semibold mb-1 text-gray-800 dark:text-gray-200">
                    {{ $exhibitInfo->title }} - {{ $exhibitInfo->inventory_number }}
                </p>

                <p class="text-sm mb-3 text-gray-600 dark:text-gray-400">
                    {{ $exhibitInfo->keyword->title }}
                </p>

                <p class="text-xs mb-1 text-gray-600 dark:text-gray-400">
                    <strong>Коллекция: </strong>{{ $exhibitInfo->collection->title }}
                </p>

                <p class="text-xs mb-1 text-gray-600 dark:text-gray-400">
                    <strong>Дата и способ поступления: </strong>{{ $exhibitInfo->receipt_date }}. {{ $exhibitInfo->entry_method }}
                </p>

                <p class="text-xs mb-1 text-gray-600 dark:text-gray-400">
                    <strong>Автор, изготовитель: </strong>{{ $exhibitInfo->creator }}
                </p>

                <p class="text-xs mb-1 text-gray-600 dark:text-gray-400">
                    <strong>Характеристики: </strong>{{ $exhibitInfo->characteristics }}
                </p>

                <p class="text-xs mb-1 text-gray-600 dark:text-gray-400">
                    <strong>Описание: </strong>{{ $exhibitInfo->description }}
                </p>

                <p class="text-xs mb-1 text-gray-600 dark:text-gray-400">
                    <strong>Сохранность: </strong>{{ $exhibitInfo->safety }}
                </p>

            </div>

        </div>


     </div>
</div>

