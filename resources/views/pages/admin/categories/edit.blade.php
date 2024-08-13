 <x-admin.layout_template_admin title="{{ $title }}" mini_title="Category" href="/admin/categories" action="update">
     <div class="w-full max-w-2xl mx-auto my-10">
         <x-admin.form.form_news :values="$category" action="/admin/categories/{{ $category->slug }}" method="PATCH" />
     </div>
 </x-admin.layout_template_admin>
