@props(['categories'])


<x-elements.section_template id="category">
    <x-elements.header_center title="News Category" subtitle="Kategori Berita Saat Ini">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur facere natus vitae illo officia.
    </x-elements.header_center>

    <div class="relative pb-3 border-b-2 rounded-lg border-primary pe-3 border-e-2 md:mx-16 md:pe-5 md:pb-5">
        <div
            class="flex flex-col flex-wrap justify-center gap-5 p-5 py-10 rounded-lg shadow-xl md:gap-10 md:flex-row main bg-secondary">
            @foreach ($categories as $category)
                <div
                    class="flex flex-col justify-between w-2/3 p-3 text-center transition-all bg-white rounded-md shadow-lg md:w-1/4 hover:scale-105 hover:bg-gray-100 -z-0">
                    <div>
                        <a href="/category/{{ $category->slug }}">

                            <div
                                class="mx-auto w-16 h-16 p-4 rounded-full bg-[{{ $category->color }}] md:p-6 md:w-24 md:h-24 group hover:bg-opacity-70">
                                <img src="/assets/category/{{ $category->logo }}" alt={{ $category->name }}
                                    class="w-full transition-all group-hover:scale-125">
                            </div>

                            <h3 class="mt-3 text-lg font-bold">{{ $category->name }}</h3>
                            <p class="mt-1 text-sm font-light">{{ $category->description }}</p>
                    </div>
                    <div>
                        <div class="w-2/3 mx-auto mt-5">
                            <x-elements.button_shadow href="/category/{{ $category->slug }}">All
                                news</x-elements.button_shadow>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        {{-- other --}}
        <div class="absolute -top-32 hidden md:block right-0 w-[200px] h-[200px]"
            style="background-image: url(/assets/elements/circleDot.svg);">
        </div>
        <div class="absolute -top-10 hidden md:block -right-24 w-[200px] h-[200px]"
            style="background-image: url(/assets/elements/circleDot.svg);">
        </div>
    </div>
</x-elements.section_template>
