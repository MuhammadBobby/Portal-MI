<x-admin.layout_template_admin title="{{ $title }}" mini_title="News" href="/admin/news" action="update">
    <div class="w-full max-w-2xl mx-auto my-10">
        <x-admin.form_news :values="$news" :categories="$categories" :authors="$authors" action="/admin/news/{{ $news->id }}"
            method="PATCH" />
    </div>
</x-admin.layout_template_admin>
