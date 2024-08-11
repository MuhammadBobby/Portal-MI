@php
    use Carbon\Carbon;
@endphp
@props(['data', 'field'])

<section class="sm:p-5 bg-['#eee']">
    <div class="mx-0 lg:mx-auto lg:px-4 max-w-screen-2xl ">
        <!-- Start coding here -->
        <div class="relative overflow-hidden">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <a href="/admin/news/create"
                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add product
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 table-striped">
                    <thead class="text-xs text-center text-gray-700 uppercase bg-secondary">
                        <tr>
                            @foreach ($field as $f)
                                <th scope="col" class="px-4 py-3">{{ $f }}</th>
                            @endforeach
                            <th scope="col" class="px-4 py-3">
                                <span>Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr class="leading-relaxed text-center border-b">
                                <td>{{ $no++ }}</td>
                                <td scope="row"
                                    class="px-4 py-3 font-medium text-left text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ Str::limit($item->title, 40) }}</td>
                                <td class="px-4 py-3">{{ $item->author->name }}</td>
                                <td class="px-4 py-3 text-[{{ $item->category->color }}] font-semibold">
                                    {{ $item->category->name }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ Carbon::parse($item->created_at)->translatedFormat('l, j F Y H:i') . ' WIB' }}
                                </td>
                                <td class="flex items-center justify-end px-4 py-3">
                                    <button id="{{ $item->slug }}-button" data-dropdown-toggle="{{ $item->slug }}"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>

                                    <div id="{{ $item->slug }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 ">
                                        <ul class="py-1 text-sm text-gray-700"
                                            aria-labelledby="{{ $item->slug }}-button">
                                            <li>
                                                <a href="/admin/news/{{ $item->slug }}?callbackUrl={{ urlencode(url()->full()) }}"
                                                    class="block px-4 py-2 hover:bg-gray-100">Show</a>
                                            </li>
                                            <li>
                                                <a href="/admin/news/{{ $item->slug }}/edit"
                                                    class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="/admin/news/{{ $item->slug }}" method="POST"
                                                class="flex items-center justify-center w-full hover:bg-gray-100 deleteForm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700"
                                                    onclick="deleteConfirm(event)">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $data->links() }}
        </div>
    </div>
</section>
