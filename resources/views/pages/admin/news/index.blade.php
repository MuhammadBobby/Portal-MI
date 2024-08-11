<x-admin.layout_template_admin title="{{ $title }}" mini_title="News" href="/admin/news">
    <x-admin.table.table_news :data="$news" :field="$field" />
</x-admin.layout_template_admin>
