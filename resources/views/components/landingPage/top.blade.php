<div class="mt-72 md:mt-10">
    <x-elements.section_template id="top">
        <x-elements.header_center subtitle="Berita Terpopuler Saat Ini" title="Top News">
            Lihat berita terpopuler saat ini di Prodi Manajemen Informatika. Temukan dan ketahui berbagai informasi
            terbaru dan terpopuler yang sedang hangat diperbincangkan disini.
        </x-elements.header_center>

        <div class="main">
            <div class="mt-10 md:mt-16 lg:flex lg:space-x-5">
                <!-- top news 1 -->
                <div
                    class="flex flex-col p-3 my-3 transition-all rounded-md lg:w-1/2 md:flex-col md:p-7 lg:p-6 lg:my-3 hover:bg-white hover:scale-105">
                    <a href="/news/{{ $top[0]->slug }}">
                        <img src="/assets/images/{{ $top[0]->image }}" loading="lazy" alt={{ $top[0]->title }}
                            class="w-full h-auto mb-3 rounded-md md:w-full md:mb-2 md:max-h-[48rem] object-cover" />
                    </a>
                    <div class="md:w-full">
                        <h1
                            class="mt-1 text-lg font-bold leading-5 text-primary font-montserrat md:text-xl lg:text-2xl">
                            <a href="/news/{{ $top[0]->slug }}" class="hover:text-secondary-yellow"><span
                                    class="text-gray-700">#Top 1
                                    : </span>{{ $top[0]->title }}</a>
                        </h1>
                        <p class="mt-3 text-sm font-light md:mt-5 md:text-base">
                            {{ Str::limit($top[0]->content, 200) }}
                        </p>
                        <!-- info -->
                        <p class="mt-3 text-sm font-bold">Published on: <span
                                class="font-normal text-secondary-yellow">{{ $top[0]->created_at->format('F j, Y') }}</span>
                        </p>
                    </div>
                </div>

                <!-- top news 2 and 3 container -->
                <div class="flex flex-col lg:w-1/2">
                    <!-- top news 2 -->
                    <div
                        class="flex flex-col p-3 my-3 transition-all rounded-md md:flex-col md:p-7 lg:p-6 md:my-3 hover:bg-white hover:scale-105">
                        <a href="/news/{{ $top[1]->slug }}">
                            <img src="/assets/images/{{ $top[1]->image }}" loading="lazy" alt={{ $top[1]->title }}
                                class="object-cover w-full h-auto mb-3 rounded-md md:mb-2 lg:h-56" />
                        </a>
                        <div class="md:w-full">
                            <h1
                                class="mt-1 text-lg font-bold leading-5 text-primary font-montserrat md:text-xl lg:text-2xl">
                                <a href="/news/{{ $top[1]->slug }}" class="hover:text-secondary-yellow"><span
                                        class="text-gray-700">#Top 2
                                        : </span>{{ $top[1]->title }}</a>
                            </h1>
                            <p class="mt-3 text-sm font-light md:mt-5 md:text-base">
                                {{ Str::limit($top[1]->content, 100) }}
                            </p>
                            <!-- info -->
                            <p class="mt-3 text-sm font-bold">Published on: <span
                                    class="font-normal text-secondary-yellow">{{ $top[1]->created_at->format('F j, Y') }}</span>
                            </p>
                        </div>
                    </div>

                    <!-- top news 3 -->
                    <div
                        class="flex flex-col p-3 my-3 transition-all rounded-md md:flex-col md:p-7 lg:flex-row lg:p-6 hover:bg-white hover:scale-105">
                        <a href="/news/{{ $top[2]->slug }}" class="inline-block w-full h-full lg:me-5">
                            <img src="/assets/images/{{ $top[2]->image }}" loading="lazy" alt={{ $top[2]->title }}
                                class="object-cover w-full mb-3 rounded-md md:h-96 md:mb-2 lg:h-full lg:mb-0 lg:mr-5" />
                        </a>
                        <div class="w-2/3">
                            <h1 class="mt-1 text-lg font-bold leading-5 text-primary font-montserrat lg:text-2xl">
                                <a href="/news/{{ $top[2]->slug }}" class="hover:text-secondary-yellow"><span
                                        class="text-gray-700">#Top 3
                                        : </span>{{ $top[2]->title }}</a>
                            </h1>
                            <p class="mt-3 text-sm font-light lg:text-base">{{ Str::limit($top[2]->content, 100) }}</p>
                            <!-- info -->
                            <p class="mt-3 text-sm font-bold">Published on: <span
                                    class="font-normal text-secondary-yellow">{{ $top[2]->created_at->format('F j, Y') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-elements.section_template>
</div>
