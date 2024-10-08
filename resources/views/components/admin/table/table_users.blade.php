@props(['data', 'field'])

<section class="sm:p-5 bg-['#eee']">
    <div class="mx-0 lg:mx-auto lg:px-4 max-w-screen-2xl ">
        <!-- Start coding here -->
        <div class="relative overflow-visible">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center" action="/admin/users/search" method="GET">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="search" name="search"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search" required="">
                        </div>
                    </form>
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
                        @if ($data->count() > 0)
                            @foreach ($data as $item)
                                <tr class="leading-relaxed text-center border-b">
                                    <td>{{ $no++ }}</td>
                                    <td scope="row"
                                        class="flex items-center gap-1 px-4 py-3 font-medium text-left text-gray-900 whitespace-nowrap dark:text-white">

                                        @if ($item->google_id == null)
                                            <img src="/uploads/users/{{ $item->image }}" alt="{{ $item->name }}"
                                                class="w-8 h-8 rounded-full">
                                        @else
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                                class="w-8 h-8 rounded-full">
                                        @endif

                                        <span>{{ Str::limit($item->name, 40) }}</span>
                                    </td>
                                    <td class="px-4 py-3">{{ $item->email }}</td>
                                    <td class="px-4 py-3 font-semibold">
                                        {{ $item->class }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $item->year_of_entry }}
                                    </td>
                                    <td
                                        class="px-4 py-3 {{ $item->role == 'admin' ? 'text-primary' : 'text-yellow-500' }}">
                                        {{ $item->role }}
                                    </td>
                                    <td class="flex items-center justify-end px-4 py-3">
                                        <button id="{{ $item->id }}-button"
                                            data-dropdown-toggle="{{ $item->id }}"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>

                                        <div id="{{ $item->id }}"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 ">
                                            <ul class="py-1 text-sm text-gray-700"
                                                aria-labelledby="{{ $item->id }}-button">
                                                {{-- <li>
                                                <button class="block w-full px-4 py-2 text-center hover:bg-gray-100"
                                                    onclick="showTokenPopup('{{ $item->remember_token }}')">Remember
                                                    Token</button>
                                            </li> --}}
                                                <li>
                                                    <a href="/admin/users/{{ $item->id }}/edit"
                                                        class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <form action="/admin/users/{{ $item->id }}" method="POST"
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
                        @else
                            <tr>
                                <td colspan="6" class="text-red-600">No Data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            {{ $data->links() }}
        </div>
    </div>
</section>
