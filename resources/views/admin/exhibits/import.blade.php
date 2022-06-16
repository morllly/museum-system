<form action="exhibits/import" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="relative flex">
        <input
            type="file"
            accept=".xlsx,.xls,.csv"
            class="border-purple-400 focus:outline-none focus:shadow-outline-purple block pr-4 w-full text-xs overflow-hidden cursor-pointer border text-gray-600 bg-gray-50 rounded-l-md focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
            aria-describedby="view_model_avatar_help" id="view_model_avatar" name="exhibit_file"
            required
        >

        <div class="mr-5">
            <button type="submit"
                class="absolute flex items-center justify-between -ml-1 inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span>Импорт</span>
            </button>
        </div>
</form>

