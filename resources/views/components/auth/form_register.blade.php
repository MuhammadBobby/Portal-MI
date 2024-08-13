<div class="flex items-center justify-center min-h-screen px-4">
    <div class="flex flex-row-reverse items-center p-8 rounded-lg sm:p-12 md:space-x-10 md:p-16 md:gap-10">
        <!-- Form section -->
        <div class="w-full max-w-md">
            <div class="mb-6">
                <a href="/">
                    <img src="/assets/logo/logoMI.png" alt="Logo" class="w-12 h-12 mb-2"></a>
                <h2 class="text-2xl font-bold text-gray-800">Create Your Account</h2>
                <p class="text-gray-600">Start your website in seconds. Already have an account? <a
                        href="{{ route('login') }}" class="text-primary hover:underline">Login here. </a></p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        placeholder="Jhon Doe" required
                        class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                    @error('name')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="number" name="nim" id="nim" value="{{ old('nim') }}"
                        placeholder="1234567890" required
                        class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                    @error('nim')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="email@example.com" required
                        class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                    @error('email')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="********" required
                        class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                    @error('password')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror

                    {{-- lihat password --}}
                    <button type="button" id="togglePassword" class="absolute right-0 top-1/2">
                        👁️
                    </button>
                </div>

                <div class="relative">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password
                        Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="********" required
                        class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">

                    {{-- lihat password --}}
                    <button type="button" id="togglePasswordConfirmation" class="absolute right-0 top-1/2">
                        👁️
                    </button>
                </div>


                <div class="mt-3">
                    <button type="submit"
                        class="flex justify-center w-full px-4 py-2 mt-5 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Create
                        your account</button>
                </div>

            </form>
        </div>

        <!-- Illustration section -->
        <div class="hidden pt-3 border-t-2 rounded-lg md:block ps-3 border-s-2 border-secondary">
            <img src="{{ asset('assets/images/helloTech.webp') }}" alt="Illustration"
                class="w-full max-w-xs rounded-lg shadow-lg">
        </div>
    </div>
</div>
