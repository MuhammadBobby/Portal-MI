@props(['data', 'field'])

<section class="sm:p-5 bg-['#eee']">
    <div class="mx-0 lg:mx-auto lg:px-4 max-w-screen-2xl ">
        <!-- Start coding here -->
        <div class="relative overflow-visible">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <a href="/admin/categories/create"
                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Category
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
                                    class="flex items-center gap-1 px-4 py-3 font-medium text-left text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="/assets/category/{{ $item->logo }}" alt="{{ $item->name }}"
                                        class="w-8 h-8 rounded-full">
                                    <span>{{ Str::limit($item->name, 40) }}</span>
                                </td>
                                <td class="px-4 py-3">{{ $item->description }}</td>

                                <td class="flex items-center justify-end px-4 py-3">
                                    <button id="{{ $item->slug }}-button" data-dropdown-toggle="{{ $item->slug }}"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none"
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
                                                <a href="/admin/categories/{{ $item->slug }}/edit"
                                                    class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="/admin/categories/{{ $item->slug }}" method="POST"
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

        </div>
    </div>
</section>
