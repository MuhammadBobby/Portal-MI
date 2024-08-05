@php
    use Carbon\Carbon;
@endphp

<x-layout_template title="{{ $title }}">
    <div class="w-full mx-auto my-24 md:w-1/2">
        <article>
            <p class="mx-3 my-2 text-xs font-semibold font-gray-900">
                <a href="/" class="hover:underline">Portal MI</a> /
                <a href="/news#{{ $news->slug }}" class="hover:underline">News</a> /
                <span class="text-primary">{{ Str::limit($news->title, 20) }}</span>
            </p>

            <header class="flex flex-col gap-2 mx-3 my-5 text-center md:mx-8 md:my-10">
                <h1 class="text-2xl font-bold leading-6 text-primary md:text-3xl lg:text-4xl">{{ $news->title }}</h1>
                <p class="text-sm font-semibold text-gray-600 md:text-base">{{ $news->author->name }} - <span
                        class=" text-secondary">Portal MI</span></p>
                <span
                    class="text-xs font-light md:text-sm">{{ Carbon::parse($news->created_at)->translatedFormat('l, j F Y H:i') . ' WIB' }}</span>
            </header>

            <img src="/assets/images/{{ $news->image }}" alt="{{ $news->title }}"
                class="object-cover w-full max-h-48 md:max-h-72">

            <div
                class="flex flex-col gap-3 mx-5 my-5 text-sm font-semibold text-justify md:text-base md:tracking-normal md:mx-8 md:leading-5 md:font-normal">
                <p class="tracking-wide "><span class="font-extrabold">POLMED - </span>{{ $news->content }}</p>
                <p class="tracking-wide">{{ $news->content }}</p>
                <p class="tracking-wide">{{ $news->content }}</p>

                <hr class="my-6 border border-gray-400" />
                <div class="mx-auto scale-150">
                    <x-elements.badges_category
                        color="{{ $news->category->color }}">{{ $news->category->name }}</x-elements.badges_category>
                </div>
            </div>
        </article>
    </div>
</x-layout_template>
