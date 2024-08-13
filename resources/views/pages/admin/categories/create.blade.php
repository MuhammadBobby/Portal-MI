<x-admin.layout_template_admin title="{{ $title }}" mini_title="Categories" href="/admin/categories" action="create">
    <div class="w-full max-w-2xl mx-auto my-10">
        <x-admin.form.form_categories :values="[]" action="/admin/categories" method="POST" />
    </div>
</x-admin.layout_template_admin>
