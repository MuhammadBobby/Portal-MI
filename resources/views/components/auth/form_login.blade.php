<div class="flex items-center justify-center min-h-screen px-4">
    <div class="flex flex-col items-center p-8 rounded-lg sm:p-12 md:flex-row md:space-x-10 md:p-16 md:gap-10">
        <!-- Form section -->
        <div class="w-full max-w-md">
            <div class="mb-6 text-center">
                <a href="/">
                    <img src="/assets/logo/logoMI.png" alt="Logo" class="w-12 h-12 mx-auto mb-2"></a>
                <h2 class="text-2xl font-bold text-gray-800">Welcome back</h2>
                <p class="text-gray-600">Sign in to your account. Don't have an account? <a
                        href="{{ route('register') }}" class="text-primary hover:underline">Sign up.</a></p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        placeholder="email@example.com"
                        class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                    @error('email')
                        <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required placeholder="********"
                        class="block w-full mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-primary focus:ring-primary sm:text-sm">
                    {{-- lihat password --}}
                    <button type="button" id="togglePassword" class="absolute right-0 top-1/2">
                        👁️
                    </button>
                </div>
                @error('password')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="w-4 h-4 bg-white border-gray-300 rounded text-primary focus:ring-primary">
                        <label for="remember" class="block ml-2 text-sm text-gray-600">Remember me</label>
                    </div>

                    <div class="text-sm">
                        <a href="/forgot-password" class="font-medium text-primary hover:underline">Forgot password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Sign
                        in to your account</button>
                </div>

                <div class="flex items-center justify-center mt-6 space-x-4">
                    <span class="w-full h-px bg-gray-300"></span>
                    <span class="text-sm font-medium text-gray-600">or</span>
                    <span class="w-full h-px bg-gray-300"></span>
                </div>

                <div class="flex mt-6 space-x-4">
                    <a href="#"
                        class="flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <img src="{{ asset('images/google.svg') }}" class="w-5 h-5 mr-2" alt="Google"> Sign in
                        with
                        Google
                    </a>
                </div>
            </form>
        </div>

        <!-- Illustration section -->
        <div class="hidden pb-3 border-b-2 rounded-lg md:block pe-3 border-e-2 border-secondary">
            <img src="{{ asset('assets/images/jurnalTech.webp') }}" alt="Illustration"
                class="w-full max-w-xs rounded-lg shadow-lg">
        </div>
    </div>
</div>
