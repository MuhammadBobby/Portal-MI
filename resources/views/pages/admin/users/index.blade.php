<x-admin.layout_template_admin title="{{ $title }}" mini_title="Users" href="/admin/users">

    <x-admin.table.table_users :data="$users" :field="$field" />

</x-admin.layout_template_admin>
