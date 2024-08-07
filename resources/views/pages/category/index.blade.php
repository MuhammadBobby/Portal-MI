<x-layout_template title="{{ $title }}">
    <div class="min-h-screen">
        <x-elements.section_template id="Category">
            <header>
                <h1 class="mt-3 text-3xl font-bold tracking-tight md:text-5xl md:mt-0">Kategori<span
                        class="text-[{{ $category->color }}]">
                        {{ $category->name }}</span></h1>
                <p class=" font-light md:mt-2 text-[#004080] text-md md:text-base">
                    {{ $news->count() }} berita terbaru dengan kategori
                    {{ $category->name }}
                </p>
                <hr class="my-6 border-gray-300 sm:mx-auto lg:my-3" />
            </header>


            @if ($news->count() > 0)
                <a href="/news/{{ $news[0]->slug }}">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="/assets/images/{{ $news[0]->image }}" alt="berita"
                            class="object-cover w-full transition-all rounded-lg max-h-52 md:max-h-96 hover:scale-110">
                        <div
                            class="absolute z-10 p-4 mr-4 text-white bg-black bg-opacity-50 rounded-lg bottom-4 left-4">
                            <h1 class="mb-2 text-xl font-bold md:text-4xl">
                                {{ $news[0]->title }}
                            </h1>
                            <p class="text-xs md:text-sm">Portal MI -
                                {{ $news[0]->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </a>
            @else
                <h1 class="text-2xl font-bold text-center text-red-600">Tidak ada berita</h1>
                <div class="mx-auto mt-3 w-fit">
                    <x-elements.button_shadow href="/news">Back to all news</x-elements.button_shadow>
                </div>
            @endif


        </x-elements.section_template>

        <section class="relative px-5 md:px-32 md:py-2">
            @foreach ($news as $item)
                {{-- menampilkan berita kedua hingga terakhir --}}
                @if ($item->id != $news[0]->id)
                    <x-elements.article_news :item="$item" />
                    <hr class="my-6 border-gray-300 sm:mx-auto">
                @endif
            @endforeach
        </section>
    </div>
</x-layout_template>
