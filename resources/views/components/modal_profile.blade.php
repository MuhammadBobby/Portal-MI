<button id="{{ Auth::user()->name }}" data-dropdown-toggle="dropdownNavbarUser"
    class="flex items-center justify-between w-full px-3 py-2">
    <img src="/uploads/users/{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}"
        class="w-10 h-10 border-2 rounded-full border-secondary">
</button>
<!-- Dropdown menu -->
<div id="dropdownNavbarUser" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow min-w-44">
    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
        @if (Auth::user()->role == 'admin')
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
            </li>
        @endif
        <li>
            <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:text-white">Profile</a>
        </li>
    </ul>
    <div class="py-1">
        <!-- Formulir Logout -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>

        <!-- Tombol Logout -->
        <button onclick="confirmLogout();"
            class="block w-full px-4 py-2 mx-auto text-sm text-white bg-red-600 rounded-lg hover:text-white hover:bg-red-800">Logout</button>
    </div>
</div>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out of your account!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
