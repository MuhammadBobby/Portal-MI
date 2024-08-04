@props(['categories'])


<x-elements.section_template id="category">
    <x-elements.header_center title="News Category" subtitle="Kategori Berita Saat Ini">
        Temukan berbagai kategori berita yang ingin anda cari hanya dengan satu kali klik.
    </x-elements.header_center>

    <div
        class="relative pb-3 overflow-hidden border-b-2 rounded-lg md:overflow-visible border-primary pe-3 border-e-2 lg:mx-16 md:pe-5 md:pb-5">
        <div id="category-container"
            class="flex items-stretch gap-5 p-5 py-10 overflow-scroll rounded-lg shadow-xl md:justify-center md:flex-wrap md:gap-10 md:flex-row main bg-secondary scrollbar-hide">
            @foreach ($categories as $category)
                <div
                    class="flex flex-col justify-between min-w-[60%] p-3 text-center transition-all bg-white rounded-md shadow-lg md:min-w-0 md:max-w-[25%] hover:scale-105 hover:bg-gray-100 -z-0">
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

            <!-- Slider controls -->
            <button id="categoryLeftBtn" type="button"
                class="absolute top-0 z-10 flex items-center justify-center h-full px-4 cursor-pointer md:hidden start-0 group focus:outline-none"
                data-carousel-prev data-aos="fade-right">
                <span
                    class="inline-flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full group-hover:bg-gray-200 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" data-aos="fade-up" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button id="categoryRightBtn" type="button"
                class="absolute top-0 z-10 flex items-center justify-center h-full px-4 cursor-pointer md:hidden end-0 group focus:outline-none"
                data-carousel-next data-aos="fade-left">
                <span
                    class="inline-flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full group-hover:bg-gray-200 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" data-aos="fade-up" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
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
