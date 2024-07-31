<section class="flex flex-wrap justify-center h-screen gap-5 p-16 md:items-center md:px-16 md:py-20">
    <div class="w-full md:w-[40%]">
        <div class="flex items-center gap-2">
            <img src="/assets/elements/load.svg" alt="Load Icon" class="w-10">
            <span class="text-sm font-semibold text-secondary md:text-base">Portal MI</span>
        </div>
        <h1 class="pb-3 text-4xl font-bold md:text-7xl md:font-extrabold">Selamat Datang di <span
                class="text-primary">Portal MI</span>,
        </h1>
        <p class="font-light tracking-wide md:text-lg">portal berita
            dan informasi terkini dari
            Prodi Manajemen
            Informatika.</p>

        <div class="flex items-center gap-5 my-5 md:my-8">
            <x-elements.buttonShadow href="#">Read article</x-elements.buttonShadow>
        </div>

        <a href="#" class="flex items-center gap-2 group">
            <img src="/assets/elements/arrowBottom.svg" alt="Arrrow Bottom Icon" class="w-5">
            <span class="text-xs font-semibold md:text-sm group-hover:underline">Scroll down to explore</span>
        </a>
    </div>

    {{-- image --}}
    <div class="w-full md:w-[50%] relative h-full">
        <div
            class="w-[80%] top-10 left-5 absolute pb-2 border-b-2 border-e-2 border-white pe-2 rounded-lg md:w-[47%] md:top-20 md:left-10">
            <img src="/assets/images/helloTech.webp" alt="Hello Tech Image" class="w-full rounded-lg">
        </div>
        <div
            class="absolute top-0 hidden w-1/2 pb-2 border-b-2 border-white rounded-lg md:block left-1/3 border-e-2 pe-2 ">
            <img src="/assets/images/jurnalTech.webp" alt="Hello Tech Image" class="w-full rounded-lg">
        </div>
        <div
            class="h-96 md:h-full absolute right-0 w-[80%] bottom-[20%] md:top-10 md:bottom-0 rounded-lg bg-secondary -z-10">
        </div>
        <div class="absolute bottom-10 -right-10 md:-bottom-32 md:right-10 w-[200px] h-[200px]"
            style="background-image: url(/assets/elements/circleDot.svg);">
        </div>
        <div class="absolute -bottom-10 hidden md:block -right-20 w-[200px] h-[200px]"
            style="background-image: url(/assets/elements/circleDot.svg);">
        </div>
    </div>
    </div>
</section>
