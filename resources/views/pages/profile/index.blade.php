<x-layout_template title="{{ $title }}">
    <x-elements.section_template id="Profile">
        <div class="w-full mx-auto my-10 md:w-1/2">
            <header class="text-center">
                @if (Auth::user()->google_id == null)
                    <img src="/uploads/users/{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}"
                        class="w-32 mx-auto rounded-full">
                @else
                    <img src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}" class="w-32 mx-auto rounded-full">
                @endif
                <h2 class="text-2xl font-bold text-capitalize">{{ Auth::user()->name }}</h2>
                <p class="font-light text-gray-600">{{ Auth::user()->email }}</p>
                <p class="font-light text-secondary">{{ Auth::user()->role }}</p>
            </header>

            <hr class="my-6 border-gray-300 sm:mx-auto">

            <div class="my-5 group">
                <h3 class="text-lg font-semibold ps-3 md:text-xl">Account</h3>


                <div class="pb-2 border-b-2 rounded-lg pe-2 border-secondary border-e-2">
                    <a href="/profile/edit" class="block w-full">
                        <div
                            class="flex items-center justify-between p-2 bg-white rounded-md shadow-md cursor-pointer text-primary hover:bg-gray-100 md:p-4">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/logo/updateProfile.svg') }}" alt="Update Profile"
                                    class="w-8 md:w-10">
                                <p class="font-medium group-hover:text-secondary">Update
                                    Profile</p>
                            </div>
                            <p>
                                <x-elements.pen_icon />
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="my-5 group">
                <h3 class="text-lg font-semibold ps-3 md:text-xl">Security</h3>

                <div class="pb-2 border-b-2 rounded-lg pe-2 border-secondary border-e-2">
                    <a href="/profile/changePassword" class="block w-full">
                        <div
                            class="flex items-center justify-between p-2 bg-white rounded-md shadow-md cursor-pointer text-primary hover:bg-gray-100 md:p-4">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/logo/changePassword.svg') }}" alt="Update Password"
                                    class="w-8 md:w-10">
                                <p class="font-medium group-hover:text-secondary">Update Password</p>
                            </div>
                            <p>
                                <x-elements.pen_icon />
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="my-10 group">
                <!-- Formulir Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <button onclick="confirmLogout();"
                    class="w-full pb-2 border-b-2 rounded-lg pe-2 border-secondary border-e-2">
                    <div
                        class="flex items-center justify-between p-2 text-white bg-red-500 rounded-md shadow-md cursor-pointer hover:bg-red-800 md:p-4">
                        <label for="logout" class="text-xl font-extrabold">Sign Out</label>
                        <div>
                            <img src="{{ asset('assets/logo/signOut.svg') }}" alt="Sign Out" class="h-16">
                        </div>
                    </div>
                </button>
            </div>


            <p class="font-semibold text-center text-gray-400">Telah bergabung sejak
                <span class="text-primary">{{ Auth::user()->created_at->format('d F Y') }}</span>
            </p>
        </div>

    </x-elements.section_template>

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
</x-layout_template>
