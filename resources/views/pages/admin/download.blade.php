@php
    use Carbon\Carbon;
@endphp

<x-layout_not_navbar title="{{ $title }}">
    <x-elements.section_template id="download">

        <div class="mx-0 lg:mx-auto lg:px-4 max-w-screen-2xl ">
            <x-elements.header_center title="Report News" subtitle="PDF Report">
                Laporan Berita terkini di Portal MI
            </x-elements.header_center>

            <div class="py-5 font-semibold text-gray-700">
                <p>Total Data: <span class="font-normal">{{ count($news) }}</span></p>
                <p>Last Updated: <span
                        class="font-normal">{{ Carbon::parse($news[0]->created_at)->translatedFormat('l, j F Y H:i') . ' WIB' }}
                    </span>
                </p>
                <p>Date Printed: <span
                        class="font-normal">{{ Carbon::parse(now())->translatedFormat('l, j F Y H:i') . ' WIB' }}</span>
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 table-striped">
                    <thead class="text-xs text-center text-gray-700 uppercase bg-secondary">
                        <tr>
                            @foreach ($field as $f)
                                <th scope="col" class="px-4 py-3">{{ $f }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @if (count($news) > 0)
                            @foreach ($news as $item)
                                <tr class="leading-relaxed text-center border-b">
                                    <td>{{ $no++ }}</td>
                                    <td scope="row"
                                        class="flex items-center gap-1 px-4 py-3 font-medium text-left text-gray-900 whitespace-nowrap dark:text-white">
                                        <img src="/uploads/news/{{ $item->image }}" alt="not found"
                                            class="w-10 h-10 rounded-full">
                                        <span>{{ Str::limit($item->title, 40) }}</span>
                                    </td>
                                    <td class="px-4 py-3">{{ $item->author->name }}</td>
                                    <td class="px-4 py-3 text-[{{ $item->category->color }}] font-semibold">
                                        {{ $item->category->name }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ Carbon::parse($item->created_at)->translatedFormat('l, j F Y H:i') . ' WIB' }}
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

            <div class="flex justify-between mx-10 my-24">
                <div>
                    <p>Menyetujui</p>
                    <h3 class="font-bold">Pimpinan Portal MI</h3>
                    <br><br>
                    <hr>
                    <p class="font-semibold">(Muhammad Bobby)</p>
                </div>

                <div class="text-right" style="text-align: right">
                    <p>{{ Carbon::parse(now())->translatedFormat('l, j F Y') }}</p>
                    <h3 class="font-bold">Admin Portal MI</h3>
                    <br><br>
                    <hr>
                    <p class="font-semibold">({{ Auth::user()->name }})</p>
                </div>
            </div>
        </div>


        <script>
            // Fungsi untuk otomatis membuka dialog cetak
            window.onload = function() {
                window.print();
            };
        </script>
    </x-elements.section_template>
</x-layout_not_navbar>
