<x-layout_template title="{{ $title }}">
    <x-elements.section_template id="News">
        @if (isset($mini_title))
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold tracking-tight md:text-5xl">Result: <span
                        class="italic font-light text-primary">"{{ $mini_title }}"</span></h1>
            </div>
        @else
            <x-elements.header_center title="News Portal MI" subtitle="Berita hangat saat ini">
                Temukan berita terbaru dan terkini di Prodi Manajemen Informatika. Temukan dan ketahui berbagai
                informasi
                dan terus mengupdate informasinya di Portal MI.
            </x-elements.header_center>
        @endif


        {{-- search bar --}}
        <x-elements.search_bar />

        {{-- categories --}}
        <div class="flex flex-wrap justify-center mt-6 drop-shadow-xl ">
            @foreach ($categories as $category)
                <a href="/category/{{ $category->slug }}" class="block w-1/3 mt-3 text-center md:w-1/5">
                    <div class="flex flex-col items-center mx-2 md:mx-5">
                        <div
                            class="flex items-center justify-center w-16 h-16 p-4 rounded-full bg-[{{ $category->color }}] md:p-6 md:w-24 md:h-24 group hover:bg-opacity-70">
                            <img src="/assets/category/{{ $category->logo }}" alt={{ $category->name }}
                                class="w-full transition-all group-hover:scale-125">
                        </div>
                        <h2 class="mt-4 text-sm font-bold md:text-xl hover:text-primary">{{ $category->name }}</h2>
                    </div>
                </a>
            @endforeach
        </div>
    </x-elements.section_template>


    {{-- routes pages news --}}
    @if (isset($mini_title))
        <span class="inline-block mx-10 text-sm font-semibold md:text-base text-primary">Pages:
            <a href="/" class="text-gray-700 hover:underline">Portal MI</a> /
            <a href="/news" class="text-gray-700 hover:underline">News</a>
        </span>
    @endif

    {{-- news --}}
    <div class="flex justify-center w-full p-3 bg-secondary rounded-t-3xl">
        <x-elements.section_template id="News">

            @if (count($news) > 0)
                @foreach ($news as $item)
                    <x-elements.article_news :item="$item" />
                @endforeach
            @else
                <div class="mx-auto text-center">
                    <h2 class="p-3 text-5xl font-bold text-center text-red-600 bg-white rounded-lg">News Not Found!
                    </h2>
                    <a href="/news"
                        class="p-3 text-3xl font-bold text-center text-white transition-all bg-red-600 rounded-lg hover:bg-red-500 hover:underline">Back
                        to all news</a>
                </div>
            @endif


            {{-- link pagination --}}
            {{ $news->links() }}

        </x-elements.section_template>
    </div>

    {{-- other --}}
    <div class="absolute -bottom-32 hidden md:block right-0 w-[200px] h-[200px]"
        style="background-image: url(/assets/elements/circleDot.svg);">
    </div>
    <div class="absolute -bottom-48 hidden md:block right-20 w-[200px] h-[200px]"
        style="background-image: url(/assets/elements/circleDot.svg);">
    </div>


</x-layout_template>
