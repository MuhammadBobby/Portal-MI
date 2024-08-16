<x-layout_template title="{{ $title }}">
    <x-elements.section_template id="Profile">
        <div class="w-full mx-auto my-10 md:w-1/2">
            <header class="text-center">
                <img src="/uploads/users/{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}" class="w-32 mx-auto">
                <h2 class="text-2xl font-bold text-capitalize">{{ Auth::user()->name }}</h2>
                <p class="font-light text-gray-600">{{ Auth::user()->email }}</p>
            </header>
        </div>
    </x-elements.section_template>
</x-layout_template>
