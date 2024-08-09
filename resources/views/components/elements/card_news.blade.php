@props(['item'])

<div
    class="bg-white border border-gray-200 rounded-lg shadow  min-w-[80%] md:min-w-[30%] -z-0 hover:bg-gray-100 flex flex-col justify-between group">
    <div>
        <a href="/news/{{ $item->slug }}?callbackUrl={{ urlencode(url()->full()) }}" class="block overflow-hidden">
            <img src="/assets/images/{{ $item->image }}" alt={{ $item->title }} loading="lazy"
                class="object-cover w-full transition-all rounded-t-lg max-h-56 group-hover:scale-110" />
        </a>
        <div class="p-5">
            <div class="mb-3">
                <p class="text-sm text-gray-500">{{ $item->created_at->diffForHumans() }} | By <a href="#"
                        class="text-primary hover:underline">{{ $item->author->name }}</a></p>

                <x-elements.badges_category
                    color="{{ $item->category->color }}">{{ $item->category->name }}</x-elements.badges_category>
            </div>

            <a href="/news/{{ $item->slug }}?callbackUrl={{ urlencode(url()->full()) }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ $item->title }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 ">{{ Str::limit($item->content, 100) }}</p>
        </div>
    </div>

    <div class="p-5">
        <div class="relative mb-3 max-w-32">
            <x-elements.button_shadow href="/news/{{ $item->slug }}?callbackUrl={{ urlencode(url()->full()) }}">Read
                more</x-elements.button_shadow>
        </div>
    </div>
</div>
