<div>
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <label class="flex items-center dark:text-gray-400">
                              <input
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
                                <label class="flex items-center dark:text-gray-400">
                                  <input
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

        {{ $exhibits->links('livewire.pagination-links') }}

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




</div>
