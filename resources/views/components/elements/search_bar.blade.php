<form class="max-w-lg pb-10 mx-auto" action="/search" method="POST">
    @csrf
    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
            <svg class="w-4 h-4 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="search" id="search" name="search"
            class="block w-full p-4 text-sm border border-gray-300 rounded-lg text-primary ps-10 bg-gray-50 focus:ring-primary focus:border-primary"
            placeholder="Search news..." required />
        <button type="submit"
            class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-secondary hover:text-primary focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
    </div>
</form>
