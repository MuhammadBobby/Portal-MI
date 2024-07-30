<nav id="navbar"
    class="fixed top-0 z-20 w-full bg-white border-b border-gray-200 shadow-md bg-opacity-30 backdrop-blur-sm md:bg-transparent md:backdrop-blur-0 md:border-0 md:shadow-none">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-3 mx-auto md:px-8">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/assets/logo/logoMI.png" class="h-10" alt="Logo Manajemen Informatika">
            <span class="self-center text-2xl font-bold text-primary whitespace-nowrap">Portal MI</span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            <x-elements.buttonShadow href="#">Masuk</x-elements.buttonShadow>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-white rounded bg-primary md:bg-transparent md:text-primary md:p-0"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">News</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Category</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
