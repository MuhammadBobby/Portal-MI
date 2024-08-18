<x-layout_template title="{{ $title }}">
    <x-elements.section_template id="edit-profile">


        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="flex flex-row-reverse items-center w-full p-8 rounded-lg sm:p-12 md:p-16 md:gap-10">
                <!-- Form section -->
                <div class="w-full md:w-1/2">
                    <div class="mb-6">
                        <a href="/">
                            <img src="/assets/logo/logoMI.png" alt="Logo" class="w-12 h-12 mb-2"></a>
                        <h2 class="text-2xl font-bold text-gray-800">Update Your Profile</h2>

                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <div class="flex items-center justify-center space-x-6">
                            <div class="relative group">
                                <img id="image" src="/uploads/users/{{ Auth::user()->image }}"
                                    class="object-cover w-24 h-24 border-4 rounded-full border-secondary "
                                    alt="Profile Image">
                                <input type="file" id="profileImageInput" name="image" accept="image/*"
                                    class="hidden">
                                <div class="absolute inset-0 transition-opacity bg-black opacity-0 cursor-pointer"
                                    onclick="document.getElementById('profileImageInput').click();"></div>

                                {{-- pen icon --}}
                                <svg class="absolute w-6 h-6 transition-all cursor-pointer text-primary bottom-1 right-1 group-hover:scale-110"
                                    onclick="document.getElementById('profileImageInput').click();" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg>
                            </div>
                        </div>
                        @error('image')
                            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                        @enderror

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name') ?? Auth::user()->name }}" placeholder="Jhon Doe" required
                                class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                            @error('name')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                            <input type="number" name="nim" id="nim"
                                value="{{ old('nim') ?? Auth::user()->nim }}" placeholder="1234567890" required
                                class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                            @error('nim')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                value="{{ old('email') ?? Auth::user()->email }}" placeholder="email@example.com"
                                required
                                class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                            @error('email')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
                            <input type="text" name="class" id="class"
                                value="{{ old('nim') ?? Auth::user()->class }}" placeholder="MI-5C" required
                                class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                            @error('class')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700">Year of Entry</label>
                            <input type="number" name="year" id="year"
                                value="{{ old('nim') ?? Auth::user()->year_of_entry }}" placeholder="2022"
                                min="2010"
                                class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                            @error('year')
                                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="flex gap-2 mt-3">
                            <button type="submit"
                                class="flex justify-center px-4 py-2 mt-5 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Upgarde
                                Your Profile</button>
                            <a href="/profile"
                                class="flex justify-center px-4 py-2 mt-5 text-sm font-medium text-white bg-gray-400 border border-transparent rounded-md shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Cancel</a>
                        </div>

                    </form>
                </div>

                <!-- Illustration section -->
                <div class="hidden pt-3 border-t-2 rounded-lg md:block ps-3 border-s-2 border-secondary">
                    <img src="{{ asset('assets/images/helloTech.webp') }}" alt="Illustration"
                        class="h-full max-w-xs rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </x-elements.section_template>


    <script>
        document.getElementById('profileImageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-layout_template>
