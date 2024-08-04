<x-layout_template title="{{ $title }}">
    <x-elements.section_template id="News">
        <x-elements.header_center title="News Portal MI" subtitle="Berita hangat saat ini">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, accusantium!
        </x-elements.header_center>

        <div class="flex flex-wrap justify-center mt-6 drop-shadow-xl ">

            @foreach ($categories as $category)
                <a href="" class="block w-1/3 mt-3 text-center md:w-1/5">
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


    <div class="flex justify-center w-full p-3 bg-secondary rounded-t-3xl">
        <x-elements.section_template id="News">

            @foreach ($news as $item)
                <article>
                    <a href="/news/{{ $item->slug }}" class="flex items-start mb-6 cursor-pointer group">
                        <div class="w-1/3 overflow-hidden">
                            <img src="/assets/images/{{ $item->image }}" alt={{ $item->title }}
                                class="object-cover w-full transition-all rounded-lg max-h-40 md:max-h-36 group-hover:scale-110">
                        </div>
                        <div class="w-full pl-3">
                            <span
                                class="bg-white  text-[{{ $item->category->color }}] text-xs font-medium me-2 px-2.5 py-0.5 rounded md:mb-3">{{ $item->category->name }}</span>
                            <h2 class="text-2xl font-bold md:text-3xl">{{ $item->title }}</h2>
                            <p class="text-sm text-green-800 md:text-base md:pb-3">
                                {{ Str::limit($item->content, 200) }}
                            </p>
                            <div class="text-sm text-primary ">{{ $item->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                </article>

                <hr class="my-6 border-gray-50 sm:mx-auto lg:my-8" />
            @endforeach

            {{-- link pagination --}}
            {{ $news->links() }}

        </x-elements.section_template>
    </div>

    {{-- other --}}
    <div class="absolute bottom-10 hidden md:block right-0 w-[200px] h-[200px]"
        style="background-image: url(/assets/elements/circleDot.svg);">
    </div>
    <div class="absolute bottom-0 hidden md:block right-20 w-[200px] h-[200px]"
        style="background-image: url(/assets/elements/circleDot.svg);">
    </div>


</x-layout_template>
