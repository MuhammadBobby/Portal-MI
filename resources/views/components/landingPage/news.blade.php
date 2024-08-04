@props(['news'])

<x-elements.section_template id="news">
    <header class="mb-10">
        <h1 class="text-3xl font-bold tracking-tight md:text-5xl text-primary">News Portal</h1>
        <p class="max-w-2xl font-light text-gray-500 text-md md:text-base">Lorem ipsum, dolor sit amet
            consectetur
            adipisicing
            elit. Mollitia facilis suscipit, nulla vitae eos voluptate atque officiis dicta aut, ex a dolorum in.
            Nobis sit facilis, dolor molestiae ratione dicta.
        </p>
    </header>

    <div class="relative main">
        <div class="flex gap-3 overflow-x-scroll scrollbar-hide">
            @foreach ($news as $item)
                <x-elements.card_news :item="$item" />
            @endforeach
        </div>

        <div class="w-32 mx-auto mt-10 text-center">
            <a href="/news"
                class="block px-5 py-3 font-bold text-white transition-all rounded-lg shadow-sm bg-primary hover:shadow-2xl hover:shadow-gray-400 hover:scale-110 hover:bg-opacity-90">All
                news</a>
        </div>

        <!-- Slider controls -->
        <button id="scrollLeftBtn" type="button"
            class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none"
            data-carousel-prev data-aos="fade-right">
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-primary rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" data-aos="fade-up" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button id="scrollRightBtn" type="button"
            class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none"
            data-carousel-next data-aos="fade-left">
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-primary rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" data-aos="fade-up" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    {{-- other --}}
    <div class="absolute -top-10 hidden md:block right-24 w-[200px] h-[200px]"
        style="background-image: url(/assets/elements/circleDot.svg);">
    </div>
    <div class="absolute top-8 hidden md:block right-0 w-[200px] h-[200px]"
        style="background-image: url(/assets/elements/circleDot.svg);">
    </div>
</x-elements.section_template>
