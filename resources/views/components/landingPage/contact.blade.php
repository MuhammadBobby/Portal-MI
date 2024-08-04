<x-elements.section_template id="contact">
    <x-elements.header_center title="Contact Us" subtitle="Hubungi Kami">
        Kamu memiliki berita terbaru yang ingin dibagikan? Hubungi kami sekarang. Sampakan juga saran dan kritik kamu
        disini.
    </x-elements.header_center>

    <div class="relative mx-auto main md:w-2/3 w-[90%]">
        <div
            class="absolute rounded-sm bg-opacity-70 top-3 -bottom-3 left-3 -right-3 -z-10 bg-secondary md:top-5 md:-bottom-5 md:left-5 md:-right-5">
        </div>
        <div class="flex items-center justify-between w-full gap-3 p-3 px-5 bg-white border rounded-sm">
            <a href="mailto:m.bobbyoktaviano@gmail.com" target="_blank" rel="noopener"
                class="text-sm text-gray-500 md:text-lg hover:text-primary hover:underline active:text-secondary">m.bobbyoktaviano@gmail.com</a>
            <a href="mailto:m.bobbyoktaviano@gmail.com" target="_blank" rel="noopener"
                class="px-3 py-2 text-xs text-center text-white transition-all rounded-sm bg-primary md:text-base hover:scale-110 hover:shadow-xl hover:shadow-gray-400 hover:bg-opacity-90">Send
                message</a>
        </div>
    </div>

    {{-- other --}}
    <div class="absolute top-10 hidden md:block left-24 w-[200px] h-[200px]"
        style="background-image: url(/assets/elements/circleDot.svg);">
    </div>
    <div class="absolute top-24 hidden md:block left-0 w-[200px] h-[200px]"
        style="background-image: url(/assets/elements/circleDot.svg);">
    </div>
</x-elements.section_template>
