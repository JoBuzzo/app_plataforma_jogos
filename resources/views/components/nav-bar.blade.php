
<nav class="bg-white border dark:border-0 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 relative" x-data="{ mobile: false }">

    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="#" class="flex items-center space-x-1 hover:animate-pulse">
            <img src="{{ url('img/logo.png') }}" class="r-3 hover sm:h-9" alt="Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"><span class="text-blue-500">Game</span>Comm</span>
        </a>
        <div class="relative flex items-center space-x-3 md:order-2" x-data="{ user: false }">
            <x-dark-mode-button />
            <button @click="user = ! user" class="flex text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                <img class="w-8 h-8 rounded-full" src="data:image/jpeg;base64,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" alt="user photo">
            </button>
            
            <div x-show="user" x-transition class="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">João Buzzo</span>
                    <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">joao@gmail.com</span>
                </div>
                <ul class="py-2">
                    <li>
                        <a href="#">Profile</a>
                    </li>
                    <li>
                        <a href="#">Settings</a>
                    </li>
                    <li>
                        <a href="#">Sign out</a>
                    </li>
                </ul>
            </div>
            {{-- mobile --}}
            <button @click="mobile = ! mobile"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button> 
        </div>

        <div class="hidden md:block">
            <ul
                class="flex p-4 space-x-8 text-sm font-medium dark:bg-gray-900">
                <li>
                    <a href="{{ route('welcome') }}" class="link-active">Feed</a>
                </li>
                <li>
                    <a href="#" class="link-no-active">Jogos</a>
                </li>
                <li>
                    <a href="#" class="link-no-active">Comunidades</a>
                </li>
            </ul>
        </div>

    </div>
    <div x-show="mobile" class="absolute py-4 right-1 top-12 h-96">
        <ul class="w-48 text-sm font-medium bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600">
            <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <a href="{{ route('welcome') }}" class="link-active">Feed</a>
            </li>
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">
                <a href="#" class="link-no-active">Jogos</a>
            </li>
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">
                <a href="#" class="link-no-active">Comunidades</a>
            </li>
            <li class="w-full px-4 py-2 rounded-b-lg">
                <a href="#" class="link-no-active">Amigos</a>
            </li>
        </ul>
    </div>
</nav>
