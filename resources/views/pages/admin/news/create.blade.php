<x-admin.layout_template_admin title="{{ $title }}" mini_title="News" href="/admin/news" action="create">
    <div class="w-full max-w-2xl mx-auto my-10">
        <x-admin.form_news :values="[]" :categories="$categories" :authors="$authors" />
    </div>
</x-admin.layout_template_admin>
