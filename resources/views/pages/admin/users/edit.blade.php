 <x-admin.layout_template_admin title="{{ $title }}" mini_title="Users" href="/admin/users" action="update">

     <div class="w-full max-w-2xl mx-auto my-10">
         <x-admin.form.form_users :values="$user" />
     </div>

 </x-admin.layout_template_admin>
