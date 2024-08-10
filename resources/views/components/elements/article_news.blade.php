@props(['item'])

<article id="{{ $item->slug }}">
    <a href="/news/{{ $item->slug }}" class="flex items-start mb-6 cursor-pointer group">
        <div class="w-1/3 overflow-hidden rounded-lg">
            <img src="/uploads/news/{{ $item->image }}" alt={{ $item->title }}
                class="object-cover w-full transition-all rounded-lg max-h-40 md:max-h-36 group-hover:scale-110">
        </div>
        <div class="w-full pl-3">
            <x-elements.badges_category
                color="{{ $item->category->color }}">{{ $item->category->name }}</x-elements.badges_category>
            <h2 class="text-2xl font-bold md:text-3xl">{{ $item->title }}</h2>
            <p class="text-sm text-green-800 md:text-base md:pb-3">
                {{ Str::limit($item->content, 200) }}
            </p>
            <div class="text-sm text-primary ">{{ $item->created_at->diffForHumans() }}</div>
        </div>
    </a>
</article>

<hr class="my-6 border-gray-50 sm:mx-auto lg:my-8" />
