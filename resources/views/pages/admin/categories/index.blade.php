<x-admin.layout_template_admin title="{{ $title }}" mini_title="Categories" href="/admin/categories">
    <x-admin.table.table_categories :data="$categories" :field="$field" />
</x-admin.layout_template_admin>
