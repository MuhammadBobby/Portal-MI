<x-layout_template title="{{ $title }}">
    <x-elements.section_template id="News">
        <x-elements.header_center title="News Portal MI" subtitle="Berita hangat saat ini">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, accusantium!
        </x-elements.header_center>

        <div class="flex flex-col md:flex-row justify-center md:space-x-4 mt-6 space-y-4 md:space-y-0">
            <a href="#category1"
                class="block bg-secondary rounded-lg p-6 w-full md:w-1/5 text-center shadow-md hover:bg-gray-300">
                <h2 class="text-xl font-bold">Pemrograman</h2>
            </a>
            <a href="#category2"
                class="block bg-secondary rounded-lg p-6 w-full md:w-1/5 text-center shadow-md hover:bg-gray-300">
                <h2 class="text-xl font-bold">Pemrograman</h2>
            </a>
            <a href="#category3"
                class="block bg-secondary rounded-lg p-6 w-full md:w-1/5 text-center shadow-md hover:bg-gray-300">
                <h2 class="text-xl font-bold">Pemrograman</h2>
            </a>
        </div>
    </x-elements.section_template>

    <section class="bg-secondary rounded-t-3xl p-3 w-full flex justify-center">
        <x-elements.section_template id="News">
            <div class="flex mb-6">
                <div class="w-1/3">
                    <img src="/assets/images/helloTech.webp" alt="News Image 1"
                        class="object-cover w-full rounded-t-lg max-h-40 md:max-h-36">
                </div>
                <div class="w-full pl-3">
                    <div class="text-sm md:text-base md:pb-1 text-primary">Pemrograman</div>
                    <h2 class="text-base md:text-xl font-bold">Judul Berita 1</h2>
                    <p class="text-base md:text-lg md:pb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Repudiandae
                        ratione
                        accusantium vel? Autem assumenda eius nobis dolorem quos voluptates tempora.</p>
                    <div class="text-sm text-primary">Dipublikasikan pada 01 Januari 2024</div>
                </div>
            </div>

            <div class="flex mb-6">
                <div class="w-1/3">
                    <img src="/assets/images/helloTech.webp" alt="News Image 1"
                        class="object-cover w-full rounded-t-lg max-h-40 md:max-h-36">
                </div>
                <div class="w-full pl-3">
                    <div class="text-sm md:text-base md:pb-1 text-primary">Pemrograman</div>
                    <h2 class="text-base md:text-xl font-bold">Judul Berita 1</h2>
                    <p class="text-base md:text-lg md:pb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Repudiandae
                        ratione
                        accusantium vel? Autem assumenda eius nobis dolorem quos voluptates tempora.</p>
                    <div class="text-sm text-primary">Dipublikasikan pada 01 Januari 2024</div>
                </div>
            </div>

            <div class="flex mb-6">
                <div class="w-1/3">
                    <img src="/assets/images/helloTech.webp" alt="News Image 1"
                        class="object-cover w-full rounded-t-lg max-h-40 md:max-h-36">
                </div>
                <div class="w-full pl-3">
                    <div class="text-sm md:text-base md:pb-1 text-primary">Pemrograman</div>
                    <h2 class="text-base md:text-xl font-bold">Judul Berita 1</h2>
                    <p class="text-base md:text-lg md:pb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Repudiandae
                        ratione
                        accusantium vel? Autem assumenda eius nobis dolorem quos voluptates tempora.</p>
                    <div class="text-sm text-primary">Dipublikasikan pada 01 Januari 2024</div>
                </div>
            </div>
        </x-elements.section_template>
    </section>



</x-layout_template>
